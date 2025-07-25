# Desafios do Projeto Tasksmith

Este documento detalha os desafios enfrentados durante o desenvolvimento do projeto Tasksmith, as abordagens utilizadas para superá-los e as lições aprendidas.

## 1. Decisão e Planejamento do Projeto de TCC

### 1.1 Descrição do Desafio

Inicialmente, a ideia para o projeto de TCC era uma plataforma de gerenciamento de projetos e gestão de tempo para freelancers. No entanto, essa ideia foi abandonada devido a um planejamento inadequado, falta de motivação e a necessidade de conhecimentos não-técnicos que seriam difíceis de adquirir no tempo disponível.

Posteriormente, surgiu a ideia de transformar um projeto pessoal em andamento – uma aplicação de lista/gerenciamento de tarefas gamificada e temática – no projeto de TCC. Embora o Habitica seja um representante notável nesse nicho, ele carece de imersão. Comecei a conceber recursos e outras necessidades para a aplicação, mas de forma desorganizada e com um escopo muito amplo, sem clareza sobre como implementar essas ideias no programa.

### 1.2 Como Foi Lidar com o Desafio

As ideias foram sendo construídas ao longo do tempo de forma dispersa. Somente mais recentemente, houve um esforço para um planejamento mais centrado e organizado do Produto Mínimo Viável (MVP), incluindo um cronograma de execução para acelerar a finalização do projeto.

### 1.3 Lições Aprendidas

* A importância de um planejamento detalhado e realista desde o início do projeto.
* A necessidade de definir um escopo claro e gerenciável para evitar a dispersão e o desânimo.
* A vantagem de alinhar o projeto acadêmico com interesses pessoais para manter a motivação.
* A relevância de um cronograma de execução para garantir o progresso e a conclusão dentro do prazo.

## 2. Reestruturação Completa da Arquitetura do Projeto

### 2.1 Descrição do Desafio

Durante o desenvolvimento inicial, o projeto estava estruturado de forma inadequada, com separação entre frontend e backend que não se adequava à abordagem monolítica, posteriormente escolhida. A estrutura original incluía diretórios separados para frontend e backend, com dependências desnecessárias como React e Vite, que contradiziam a decisão de usar tecnologias "puras".

### 2.2 Como Foi Lidar com o Desafio

Foi realizada uma reestruturação completa do projeto, migrando de uma estrutura frontend/backend separada para uma arquitetura monolítica tradicional em PHP. Isso envolveu:

* **Reorganização de Diretórios:** Criação da estrutura `src/` para código PHP, `public/` para arquivos acessíveis pelo navegador, e `config/` para configurações.
* **Remoção de Dependências Desnecessárias:** Eliminação do React, Vite e outras dependências que não se alinhavam com a filosofia do projeto.
* **Configuração do Tailwind CSS:** Implementação adequada do Tailwind para trabalhar com PHP puro ao invés de um ambiente React.
* **Criação de Sistema de Roteamento:** Desenvolvimento de um roteador personalizado em PHP para gerenciar as rotas da aplicação.

### 2.3 Lições Aprendidas

* A importância de definir claramente a arquitetura desde o início do projeto.
* A necessidade de alinhar todas as tecnologias e dependências com a filosofia escolhida.
* O valor de uma estrutura de projeto bem organizada para facilitar o desenvolvimento futuro.
* A flexibilidade de refatorar completamente quando necessário, mesmo que isso signifique reescrever partes significativas do código.

## 3. Implementação de Sistema de Roteamento Personalizado

### 3.1 Descrição do Desafio

A necessidade de implementar um sistema de roteamento funcional sem utilizar frameworks existentes apresentou desafios técnicos significativos. Era necessário criar URLs amigáveis, gerenciar diferentes tipos de requisições, e implementar redirecionamentos adequados, tudo isso mantendo a simplicidade e o controle total sobre o código.

### 3.2 Como Foi Lidar com o Desafio

O desafio foi abordado através de uma implementação incremental:

* **Desenvolvimento do Routes.php:** Criação de uma classe Routes personalizada para mapear URLs para views correspondentes.
* **Configuração do .htaccess:** Implementação de regras de reescrita para URLs amigáveis e redirecionamento de todas as requisições para o index.php.
* **Sistema de Front Controller:** Implementação do padrão Front Controller para centralizar o processamento de requisições.
* **Tratamento de Erros:** Configuração de páginas de erro personalizadas (404, 403, 500) integradas ao sistema de roteamento.

### 3.3 Lições Aprendidas

* A compreensão de algums mecanismos de roteamento web.
* A importância da configuração adequada do servidor web (.htaccess) para o funcionamento correto da aplicação.
* O valor de implementar funcionalidades básicas do zero para entender completamente seu funcionamento.
* A necessidade de planejamento cuidadoso ao criar sistemas que serão a base para funcionalidades futuras.

## 4. Erro de Conexão com Banco de Dados SQLite

### 4.1 Descrição do Desafio

O projeto enfrentou um erro de conexão com o banco de dados SQLite, manifestado pela mensagem `SQLSTATE[HY000] [14] unable to open database file`. Este problema impedia a aplicação de persistir ou recuperar dados, sendo um bloqueio crítico para o desenvolvimento.

### 4.2 Como Foi Lidar com o Desafio

A solução foi identificada e implementada através da modificação da string de conexão no arquivo `database/conn.php`. O problema foi resolvido utilizando a constante mágica `__DIR__` para construir um caminho absoluto correto para o arquivo do banco de dados (`tasksmith.db`). Além disso, foi crucial garantir que o diretório `database/` e o arquivo `tasksmith.db` tivessem as permissões de escrita adequadas para o usuário do servidor web.

### 4.3 Lições Aprendidas

* A importância de utilizar caminhos absolutos para arquivos de banco de dados, especialmente em ambientes de servidor, para evitar problemas de localização.
* A necessidade de verificar e configurar corretamente as permissões de arquivo e diretório para que o servidor web possa acessar e manipular o banco de dados.
* A utilidade de blocos `try-catch` para depuração de erros de conexão, fornecendo mensagens claras sobre a causa do problema.

## 5. Erro de Sintaxe de Chaves Estrangeiras (FOREIGN KEY)

### 5.1 Descrição do Desafio

Durante a definição do esquema do banco de dados, foi encontrado um erro de sintaxe na declaração de chaves estrangeiras (FOREIGN KEY) para as tabelas `characters` e `tasks`, que referenciam a tabela `users`. A sintaxe inicial estava incorreta, impedindo a correta aplicação das restrições de integridade referencial. Adicionalmente, houve confusão sobre o uso de restrições `MIN` e `MAX` para colunas.

### 5.2 Como Foi Lidar com o Desafio

A sintaxe da declaração de chave estrangeira foi corrigida para o formato padrão do SQLite, que exige uma declaração `FOREIGN KEY` separada no final da definição da tabela, e não inline com a definição da coluna. Por exemplo, `FOREIGN KEY (user_id) REFERENCES users(id)`. Para as restrições de valor mínimo e máximo, foi esclarecido que o SQLite não possui as palavras-chave `MIN` e `MAX` nativas para esse propósito; a funcionalidade desejada foi implementada utilizando a cláusula `CHECK` (ex: `CHECK (level >= 1 AND level <= 3)`). Foi também reforçada a necessidade de habilitar o `PRAGMA foreign_keys = ON;` após a conexão com o banco de dados para que as chaves estrangeiras sejam impostas.

### 5.3 Lições Aprendidas

* A importância de conhecer a sintaxe específica de SQL para o SGBD utilizado (SQLite), pois pode haver variações em relação a outros bancos de dados.
* A necessidade de habilitar explicitamente o suporte a chaves estrangeiras no SQLite via `PRAGMA foreign_keys = ON;` para garantir a integridade referencial.
* A flexibilidade da cláusula `CHECK` no SQLite para impor restrições de valor em colunas, substituindo a ausência de `MIN`/`MAX` nativos.
* A garantia da integridade referencial é fundamental para a consistência e confiabilidade dos dados da aplicação.

## 6. Proteção do Arquivo de Banco de Dados

### 6.1 Descrição do Desafio

O desafio consistia em garantir a segurança do arquivo de banco de dados SQLite (`tasksmith.db`), evitando sua exposição direta no repositório Git e protegendo-o contra acesso indevido via web.

### 6.2 Como Foi Lidar com o Desafio

Foram implementadas e/ou sugeridas as seguintes abordagens:

* **Exclusão do Git:** O arquivo `tasksmith.db` foi adicionado ao `.gitignore` para evitar que seja versionado, prevenindo riscos de segurança e conflitos de merge.
* **Variáveis de Ambiente:** Foi recomendada a utilização de variáveis de ambiente para armazenar configurações de conexão sensíveis, embora a implementação atual possa ainda não refletir isso completamente.
* **Scripts de Inicialização:** A criação de um arquivo `schema.sql` (com a estrutura do banco) e um script `init_db.php` (para inicializar o banco de dados) foi proposta para garantir a reproducibilidade do ambiente sem a necessidade de versionar o arquivo `.db`.
* **Proteção de Acesso Web:** Foi reforçada a necessidade de configurar o servidor web (via `.htaccess` no diretório `database/`) para negar acesso direto ao arquivo do banco de dados, garantindo que ele não possa ser baixado por usuários mal-intencionados.

### 6.3 Lições Aprendidas

* A segurança de dados é primordial; arquivos de banco de dados nunca devem ser expostos em repositórios públicos ou acessíveis via web.
* A importância do `.gitignore` para gerenciar arquivos sensíveis e binários no controle de versão.
* A prática de usar variáveis de ambiente para configurações sensíveis melhora a segurança e a flexibilidade da implantação.
* Scripts de inicialização de banco de dados são essenciais para a reproducibilidade do ambiente de desenvolvimento e produção.

## 7. Validação de Página Atual em Requisições GET

### 7.1 Descrição do Desafio

O problema abordado foi como otimizar a experiência do usuário, evitando o recarregamento desnecessário de uma página quando o usuário já está nela e uma requisição GET não implica em navegação para uma nova URL.

### 7.2 Como Foi Lidar com o Desafio

Foram discutidas e sugeridas diversas abordagens para lidar com este desafio:

* **Comparação de URL:** Verificar se a URL solicitada é a mesma da página atual no lado do servidor (no roteador ou Front Controller).
* **Variáveis de Sessão/HTTP Referer:** Utilizar variáveis de sessão para rastrear a última página visitada ou verificar o cabeçalho `HTTP Referer` para inferir a origem da requisição.
* **Parâmetros de Consulta:** Adicionar parâmetros de consulta específicos para identificar navegação interna ou ações que não exigem recarregamento completo.
* **JavaScript (Frontend):** A abordagem mais eficaz para uma experiência moderna, interceptando cliques em links e usando `history.pushState` ou `fetch` para carregar conteúdo dinamicamente sem recarregar a página inteira.
* **Sistema de Histórico de Navegação:** Implementar um controle mais granular do histórico de navegação para gerenciar o estado da aplicação.

### 7.3 Lições Aprendidas

* A otimização da experiência do usuário vai além da funcionalidade, incluindo a fluidez da navegação e a minimização de recarregamentos desnecessários.
* Existem múltiplas estratégias para lidar com a validação de página atual, desde abordagens simples no servidor até soluções mais complexas no frontend com JavaScript.
* A escolha da abordagem depende do nível de interatividade e da experiência de "Single Page Application" (SPA) desejada para o projeto.

## 8. Conversão de String para Classe em PHP

### 8.1 Descrição do Desafio

O desafio técnico consistia em como converter dinamicamente uma string (ex: `'HomeController@index'`) em uma chamada de método real em uma classe PHP, uma funcionalidade crucial para sistemas de roteamento e controladores dinâmicos.

### 8.2 Como Foi Lidar com o Desafio

Foram explicadas e discutidas duas maneiras principais de realizar essa conversão:

* **Chamada Direta com String de Classe:** Utilizando a sintaxe `$controllerName::$actionName()` para métodos estáticos, onde `$controllerName` e `$actionName` são strings.
* **`call_user_func`:** Uma abordagem mais flexível e recomendada, utilizando `call_user_func([$controllerInstance, $methodName])`. Esta função permite chamar métodos de instância (não estáticos) e é mais robusta para cenários onde o controlador precisa ser instanciado e pode ter dependências.

### 8.3 Lições Aprendidas

* A capacidade de resolver dinamicamente classes e métodos a partir de strings é fundamental para a implementação de um Front Controller e um sistema de roteamento flexível.
* `call_user_func` é uma ferramenta poderosa em PHP para chamadas dinâmicas, oferecendo maior flexibilidade em comparação com chamadas estáticas diretas.
* A implementação dessa funcionalidade requer atenção ao autoloading de classes (garantindo que as classes dos controladores sejam carregadas) e ao tratamento de erros (verificando a existência da classe e do método antes da chamada).
* Esta técnica é um pilar para a evolução da arquitetura do Tasksmith em direção a um padrão MVC mais completo, permitindo que o roteador despache requisições para controladores específicos e seus métodos.

## 9. Refatoração do Método `select` em `QueryBuilder.php`

### 9.1 Descrição do Desafio

O método `select` na classe `QueryBuilder` (`src/Db/QueryBuilder.php`) foi inicialmente implementado pelo usuário, que é relativamente iniciante em PHP, SQL e PDO. O objetivo era criar uma funcionalidade de construção de queries flexível, lidando com cláusulas como `DISTINCT`, `WHERE`, `LIKE` e `ORDER BY`.

Apesar de ser uma primeira tentativa robusta, o usuário reconheceu que o código poderia não ser a melhor abordagem e buscou orientação para refatoração, focando em tratamento de erros e limpeza de código, sem descaracterizar a originalidade da sua implementação.

Os principais desafios e limitações de conhecimento identificados na implementação inicial incluíam:

* **Segurança:** A concatenação direta de variáveis na string SQL (`$condition`, `$search_pattern`) abria uma brecha para ataques de SQL Injection.
* **Tratamento de Erros:** O uso de uma variável para acumular mensagens de erro de validação tornava o fluxo de controle menos explícito e o retorno de strings de erro dificultava o tratamento programático.
* **Clareza do Código:** A lógica de construção da query, embora funcional, poderia ser simplificada para melhor legibilidade.
* **Conhecimento sobre PDO:** A falta de familiaridade com conceitos como Prepared Statements, Bindings e métodos de `fetch` era uma limitação natural para um iniciante.

### 9.2 Como Foi Lidar com o Desafio

O desafio foi abordado através de um processo iterativo de refatoração e feedback:

1. **Plano Inicial:** Foi proposto um plano focado em implementar Prepared Statements, refatorar a lógica de validação e melhorar o tratamento de erro de execução.
2. **Primeira Implementação:** As alterações foram aplicadas, focando em segurança e tratamento de erros.
3. **Feedback do Usuário:** O usuário indicou que o código resultante, embora funcional e mais seguro, estava "poluído" com muitos comentários e a lógica não era imediatamente compreensível.
4. **Segunda Implementação:** O código foi refatorado novamente para ser mais conciso e legível, removendo comentários excessivos e simplificando a lógica, mantendo as melhorias de segurança e tratamento de erros.

### 9.3 Lições Aprendidas

* A importância de **Prepared Statements** para prevenir SQL Injection e garantir a segurança das aplicações.
* A necessidade de um **tratamento de erros** claro e programático, retornando valores que indiquem sucesso ou falha (ex: `true`/`false`) em vez de strings de erro.
* A relevância de **logar erros** internamente (`error_log()`) para depuração, sem expor informações sensíveis ao usuário final.
* A diferença entre `query()` e `prepare() + execute()` e quando usar cada um para otimizar segurança e performance.
* A importância da **legibilidade e concisão do código**, mesmo ao implementar melhorias de segurança e robustez.
* O valor do **feedback iterativo** no processo de desenvolvimento e refatoração.
* Apesar do código final do método ter sido refatorado com auxílio de IA, a lógica inicial foi concebida e implementada pelo usuário, demonstrando um esforço significativo de aprendizado e aplicação prática.
* **Aprendizado Contínuo e Implementação de `insert`:** Após assistir a um vídeo tutorial sobre CRUD com PHP e SQL, o usuário aprofundou seu entendimento sobre Prepared Statements e bindings, e implementou uma função `execute` privada para centralizar a execução de queries, além de desenvolver o método `insert`. Este esforço demonstrou a capacidade do usuário de aplicar novos conhecimentos de forma prática.
* **Refinamento e Boas Práticas:** A avaliação do código atualizado revelou a necessidade de ajustes finos para garantir o uso correto dos bindings no método `select` (passando os parâmetros corretos para `execute` e tratando o retorno do `PDOStatement`), e para refinar a lógica do método `insert` (garantindo a correta concatenação dos placeholders e o tratamento do retorno de `lastInsertId()`). Essas interações reforçaram a importância da precisão na manipulação de queries e na gestão de retornos de funções.
* **Expansão do CRUD e Refinamento:** A implementação dos métodos `update` e `delete` pelo usuário, seguindo os princípios de Prepared Statements e a função `execute` centralizada, marcou a expansão das funcionalidades de CRUD. As interações subsequentes focaram no refinamento desses métodos, incluindo a correção da sintaxe da cláusula `SET` no `update` (removendo a vírgula extra) e a padronização do uso de `$this->table` e dos retornos (`true`/`false`) em ambos os métodos. Embora a implementação de bindings para as condições de `WHERE` tenha sido adiada para um momento posterior (para não sobrecarregar o aprendizado), o processo destacou a importância da precisão na construção de queries e na consistência dos retornos.

### 9.4 Próximos Passos do Usuário

Considerando o prazo de entrega do TCC, o usuário decidiu priorizar a conclusão das outras partes do backend, aproveitando as melhorias de segurança já implementadas (especialmente para `LIKE`). No entanto, o compromisso é de, após a entrega do TCC, aprofundar o conhecimento em Prepared Statements e aplicar essa prática de forma consistente em todas as consultas que envolvem entrada de usuário, garantindo a robustez e segurança da aplicação a longo prazo.

## 10. Migração para Configuração com Variáveis de Ambiente

### 10.1 Descrição do Desafio

Inicialmente, a conexão com o banco de dados e outras configurações estavam definidas diretamente no código PHP (ex: `database/conn.php`). Essa abordagem, conhecida como "hardcoding", apresentava dois problemas principais:

1. **Segurança:** Expor credenciais de banco de dados diretamente no código é uma prática insegura, especialmente em repositórios versionados.
2. **Portabilidade:** Dificultava a configuração do projeto em diferentes ambientes (desenvolvimento, produção) sem alterar o código-fonte.

O desafio era refatorar o sistema para carregar configurações de um local externo e seguro, alinhado com as melhores práticas de desenvolvimento.

### 10.2 Como Foi Lidar com o Desafio

A solução foi implementar a biblioteca `vlucas/phpdotenv`, uma padrão de mercado em projetos PHP.

1. **Criação do `.env`:** Um arquivo `.env` foi criado na raiz do projeto para armazenar todas as variáveis de ambiente, como `DB_HOST`, `DB_USER`, `DB_PASS`, etc.
2. **Adição ao `.gitignore`:** O arquivo `.env` foi imediatamente adicionado ao `.gitignore` para garantir que nunca fosse enviado ao repositório.
3. **Carregamento das Variáveis:** O arquivo `config/settings.php` foi modificado para usar o `phpdotenv` e carregar as variáveis no início da aplicação.
4. **Consumo das Variáveis:** Arquivos como `database/conn.php` foram atualizados para consumir as variáveis globais `$_ENV` em vez de usar valores "hardcoded".

### 10.3 Lições Aprendidas

* A importância de separar configuração de código para aumentar a segurança e a flexibilidade.
* O uso de arquivos `.env` é a forma padrão da indústria para gerenciar credenciais e configurações específicas de cada ambiente.
* A utilidade do Composer para gerenciar dependências de bibliotecas externas como `phpdotenv`.

## 11. Refatoração do `QueryBuilder` com Injeção de Dependência e Segurança Aprimorada

### 11.1 Descrição do Desafio

A classe `QueryBuilder` (`src/Db/QueryBuilder.php`), embora funcional, apresentava duas oportunidades de melhoria arquitetônica:

1. **Acoplamento:** A classe era responsável por criar sua própria instância de conexão PDO, acoplando-a diretamente ao arquivo `database/conn.php`. Isso dificultava a reutilização e os testes.
2. **Segurança:** Os métodos `update` e `delete` construíam a cláusula `WHERE` por concatenação de strings, o que abria uma potencial vulnerabilidade a SQL Injection se não fosse manuseado com extremo cuidado na chamada do método.

O desafio era refatorar a classe para torná-la mais desacoplada, segura e alinhada com os princípios de design de software.

### 11.2 Como Foi Lidar com o Desafio

Foram aplicadas duas mudanças principais:

1. **Injeção de Dependência (Dependency Injection):** O construtor da classe foi modificado para **receber** a conexão PDO como um parâmetro (`public function __construct(PDO $database, string $table)`). A responsabilidade de criar a conexão foi movida para fora da classe, que agora apenas depende de uma conexão PDO válida para funcionar.
2. **Segurança nos Métodos `update` e `delete`:** Os métodos foram renomeados (`db_update`, `db_delete`) e suas assinaturas foram alteradas para aceitar um array de valores (`$condition_values`) correspondentes aos placeholders na cláusula `WHERE`. Isso permite que a execução da query utilize *prepared statements* com *bindings*, eliminando a vulnerabilidade.

### 11.3 Lições Aprendidas

* **Injeção de Dependência** é uma técnica poderosa para escrever código mais limpo, testável e de fácil manutenção, pois inverte o controle sobre as dependências.
* A segurança contra SQL Injection deve ser uma preocupação em **todas** as partes de uma query que envolvem dados externos, incluindo a cláusula `WHERE`.
* A refatoração contínua do código não é apenas para corrigir bugs, mas também para melhorar a arquitetura e a qualidade do software a longo prazo.
