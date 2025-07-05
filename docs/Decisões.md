# Decisões Fundamentais e Planejamento Estratégico do Tasksmith

Este documento detalha o processo de planejamento estratégico e as decisões fundamentais tomadas durante o desenvolvimento do Tasksmith, abrangendo aspectos de arquitetura, funcionalidades, priorização e roadmap.

## 1. Processo de Planejamento Estratégico

O planejamento estratégico do Tasksmith foi guiado por uma abordagem **iterativa e incremental**, com foco principal na entrega de um **Produto Mínimo Viável (MVP)** robusto e funcional para o Trabalho de Conclusão de Curso (TCC). A metodologia adotada enfatizou o **aprendizado prático** e a **resolução de problemas**, com cada etapa de implementação de funcionalidade sendo acompanhada de:

* **Registro de Decisões:** Documentação das escolhas técnicas e de design.
* **Identificação de Desafios:** Análise dos obstáculos encontrados durante o desenvolvimento.
* **Soluções Implementadas:** Detalhamento de como os desafios foram superados, incluindo pesquisa e aquisição de novos conhecimentos.
* **Reflexão:** Avaliação do aprendizado em cada etapa e sua contribuição para o conhecimento geral do desenvolvedor.

Este processo garantiu que o projeto não fosse apenas a criação de um produto, mas também um relato detalhado da jornada de desenvolvimento e aprendizado.

## 2. Decisões Fundamentais Tomadas

As seguintes decisões foram cruciais para moldar o Tasksmith e seu desenvolvimento:

### 2.1. Arquitetura Monolítica

* **Justificativa:** A escolha de uma arquitetura monolítica foi feita para **otimizar o desenvolvimento e a entrega do MVP** dentro do prazo do TCC. Esta abordagem simplifica a gestão do projeto, a depuração e a implantação inicial, permitindo um foco maior na implementação das funcionalidades essenciais. Além disso, facilita a compreensão dos fundamentos de uma aplicação web completa sem a complexidade adicional de múltiplos serviços.
* **Alternativas Consideradas:** Arquiteturas baseadas em microsserviços foram consideradas, mas descartadas para o escopo do MVP devido à sua maior complexidade de desenvolvimento, orquestração e implantação, o que poderia desviar o foco do objetivo principal do TCC.
* **Impacto Esperado:** Desenvolvimento ágil, menor curva de aprendizado inicial, facilidade de manutenção e implantação para o MVP.
* **Implementação Realizada:** A estrutura final adotada organiza o projeto em diretórios claros: `src/` para código PHP, `public/` para arquivos acessíveis pelo navegador, e `config/` para configurações, mantendo a simplicidade monolítica desejada.

### 2.2. Tecnologias "Puras" (PHP puro, JavaScript vanilla, Tailwind CSS)

* **Justificativa:** A decisão de utilizar PHP puro, JavaScript vanilla e Tailwind CSS visa demonstrar a capacidade de construir uma aplicação web robusta e funcional sem a dependência excessiva de frameworks complexos. Esta escolha promove um **aprendizado aprofundado das linguagens e tecnologias base**, permitindo um controle mais granular sobre o código e uma compreensão mais clara dos mecanismos internos da aplicação. Adicionalmente, a **curva de aprendizado menor** dessas tecnologias contribui para a otimização do tempo de entrega do projeto.
* **Alternativas Consideradas:** Frameworks populares como Laravel (PHP), React/Vue/Angular (JavaScript) e Bootstrap/Materialize (CSS) foram consideradas. No entanto, a prioridade foi dada à compreensão dos fundamentos e à minimização de abstrações para o contexto do TCC.
* **Impacto Esperado:** Maior controle sobre o código, otimização potencial de performance para o MVP, e um conhecimento mais sólido das tecnologias subjacentes.
* **Implementação Realizada:** O Tailwind CSS foi configurado com sucesso para compilação automática, permitindo estilização moderna e responsiva. O sistema de roteamento foi implementado em PHP puro, demonstrando controle total sobre o fluxo da aplicação.

### 2.3. Foco na Gamificação com Tema RPG Medieval

* **Justificativa:** O cerne do Tasksmith é transformar a gestão de tarefas em uma **experiência envolvente e motivadora**. A aplicação de elementos de RPG medieval (XP, Ouro, Níveis, Customização de Personagem, Mapa de Jornada) foi escolhida para criar um ambiente lúdico que incentive a conclusão de tarefas e o engajamento do usuário. Este tema é amplamente reconhecido e oferece um vasto campo para a criatividade no design. Além disso, a escolha do tema fantasia medieval é motivada pela **paixão pessoal**, o que proporciona um **maior engajamento** e, consequentemente, uma **dedicação aprimorada** ao desenvolvimento do projeto.
* **Alternativas Consideradas:** Outros temas de gamificação (ex: ficção científica, esportes) ou abordagens mais abstratas foram possíveis, mas o tema medieval foi selecionado por sua riqueza visual e narrativa, que se alinha bem com a proposta de transformar tarefas em "aventuras".
* **Impacto Esperado:** Aumento significativo da motivação e produtividade do usuário, diferenciação do Tasksmith no mercado de aplicativos de gestão de tarefas. Embora um nicho possa ter um alcance inicial mais restrito, a qualidade da execução tem o potencial de fomentar uma **comunidade robusta e engajada**.

### 2.4. Utilização do GamifyPHP para Implementação da Gamificação

* **Justificativa:** A decisão de utilizar a biblioteca GamifyPHP foi tomada para **acelerar o desenvolvimento das mecânicas de gamificação** e garantir uma implementação robusta e bem estruturada dos elementos de RPG no Tasksmith. O GamifyPHP oferece uma **base sólida e testada** para sistemas de pontuação, níveis, conquistas e recompensas, permitindo que o foco do desenvolvimento seja direcionado para a **experiência do usuário e a integração temática** ao invés da criação de algoritmos básicos de gamificação do zero. Além disso, a biblioteca é **compatível com PHP puro**, alinhando-se perfeitamente com a decisão de utilizar tecnologias "puras" no projeto.
* **Alternativas Consideradas:** Foram avaliadas três principais alternativas: (1) **Implementação própria completa** dos sistemas de gamificação, que demandaria tempo significativo e poderia introduzir bugs desnecessários; (2) **Integração com APIs externas** como Habitica ou Todoist, que limitaria o controle sobre a experiência do usuário e criaria dependências externas; (3) **Frameworks de gamificação mais complexos**, que introduziriam overhead desnecessário para o escopo do MVP.
* **Impacto Esperado:** Redução significativa do tempo de desenvolvimento das funcionalidades de gamificação, maior confiabilidade dos sistemas de XP e níveis, possibilidade de implementar funcionalidades avançadas (como conquistas e badges) de forma mais eficiente, e manutenção da filosofia de controle total sobre o código através de uma biblioteca leve e bem documentada.

### 2.5. Definição do Escopo do Produto Mínimo Viável (MVP)

* **Justificativa:** Para garantir a conclusão do projeto dentro do prazo do TCC, foi essencial definir um escopo claro e limitado para o MVP. As funcionalidades selecionadas (Página Inicial, Autenticação, Painel do Usuário, Gestão de Tarefas CRUD, Sistema de XP e Níveis, Política de Penalidades) representam o conjunto mínimo necessário para demonstrar o conceito central de gamificação e produtividade.
* **Alternativas Consideradas:** Funcionalidades mais avançadas, como WebSockets para notificações em tempo real, sistemas de clãs, ou uma variedade maior de itens e customizações, foram identificadas como "Trabalhos Futuros" ou "Oportunidades Futuras", mas conscientemente excluídas do MVP para evitar a diluição do foco e o atraso na entrega.
* **Impacto Esperado:** Entrega de um produto funcional e demonstrável dentro do cronograma, validação dos princípios de gamificação aplicados.

### 2.6. Implementação de Sistema de Roteamento Personalizado

* **Justificativa:** A decisão de implementar um sistema de roteamento próprio ao invés de utilizar frameworks existentes foi tomada para **demonstrar compreensão dos mecanismos de roteamento web** e manter o controle total sobre o fluxo da aplicação. Esta abordagem permite um aprendizado mais aprofundado sobre como as requisições HTTP são processadas e direcionadas.
* **Alternativas Consideradas:** Frameworks como Laravel ou Slim PHP foram considerados, mas descartados para manter a filosofia de "tecnologias puras" e maximizar o aprendizado.
* **Impacto Esperado:** Maior compreensão dos fundamentos web, controle total sobre o roteamento, e flexibilidade para implementações futuras.
* **Implementação Realizada:** Foi desenvolvido um sistema de roteamento em PHP puro com suporte a URLs amigáveis através de .htaccess, permitindo navegação intuitiva entre as páginas da aplicação.

### 2.7. Evolução do Front Controller e Organização dos Controllers

* **Justificativa:** A decisão de evoluir o Front Controller e refinar a organização dos Controllers surgiu da necessidade de aprimorar a separação de responsabilidades e a capacidade de processar lógica de negócios antes da renderização das views. Inicialmente, o roteador mapeava URLs diretamente para views, o que gerava acoplamento e limitava a complexidade da lógica. A evolução visa uma arquitetura MVC mais completa, onde o Front Controller instancia controladores e chama seus métodos.
* **Abordagens Consideradas:**
* **Controllers Baseados em Modelos vs. Funcionalidades:** Foi discutida a transição de uma abordagem puramente baseada em modelos para uma abordagem híbrida com foco em funcionalidades (ex: `AuthController`, `TaskController`, `GameController`). Esta escolha visa equilibrar a coesão funcional, o tamanho gerenciável dos arquivos e a responsabilidade única de cada controller.
* **Despacho Dinâmico:** A necessidade de converter strings (ex: `'HomeController@index'`) em chamadas de classe e método reais foi abordada, com a exploração de técnicas como `call_user_func` para flexibilidade.
* **Impacto Esperado:** Maior separação de responsabilidades, melhor processamento de formulários e preparação de dados para views, maior flexibilidade para implementar lógica de negócios complexa, e preparação para a escalabilidade futura do projeto.
* **Implementação Realizada (em andamento/sugerida):** A migração para um Front Controller que instancia controllers e chama seus métodos está sendo considerada como uma evolução gradual. Para CRUDs (como tarefas), a decisão é manter todas as operações em um único controller para coesão.

### 2.9. Refatoração do Método `select` e Implementação de `insert` em `QueryBuilder.php`

* **Justificativa:** A refatoração do método `select` foi motivada pela necessidade de aprimorar a **segurança** (prevenção de SQL Injection), a **clareza do código** e o **tratamento de erros** em uma implementação inicial feita pelo usuário. O objetivo era aplicar as melhores práticas sem descaracterizar a lógica original. A implementação do método `insert` e a criação de uma função `execute` privada também foram passos importantes para centralizar a lógica de persistência de dados.
* **Decisões Tomadas:**
  * **Adoção de Prepared Statements:** Priorização do uso de `prepare()` e `execute()` com bindings para todas as variáveis que poderiam ser injetadas na query (especialmente em cláusulas `WHERE` e `LIKE`), garantindo a segurança.
  * **Tratamento de Erros Programático:** Substituição do retorno de strings de erro por valores booleanos (`false`) em caso de falha de validação ou `PDOException`, facilitando o tratamento de erros pelo código chamador. Erros de execução são logados internamente via `error_log()`.
  * **Simplificação da Lógica e Concisão:** O código foi iterativamente simplificado, removendo comentários excessivos e otimizando a construção da query para melhorar a legibilidade, atendendo ao feedback do usuário.
  * **Centralização da Execução de Queries:** Criação de um método `private function execute()` para encapsular a lógica de preparação e execução de queries, promovendo a reutilização de código e a consistência no tratamento de erros.
  * **Implementação do Método `insert`:** Desenvolvimento de um método para inserção de dados, utilizando Prepared Statements e a função `execute` centralizada.
* **Impacto Esperado:** Maior segurança da aplicação, código mais robusto e fácil de manter, e um aprendizado aprofundado para o usuário sobre as melhores práticas de interação com banco de dados em PHP.
* **Aprendizado e Próximos Passos do Usuário:** Este processo proporcionou ao usuário um entendimento prático sobre Prepared Statements, bindings, `fetchAll`, `error_log`, e a diferença entre `query()` e `prepare() + execute()`. O usuário demonstrou proatividade ao buscar conhecimento adicional (vídeo tutorial) e aplicar os conceitos na implementação do método `insert` e na função `execute`. As interações subsequentes refinaram o uso dos bindings e a gestão dos retornos das funções. O usuário planeja aprofundar esses conhecimentos após a entrega do TCC, demonstrando um compromisso com a melhoria contínua e a segurança do código.

### 2.10. Metodologia de Desenvolvimento Iterativa e Incremental com Ênfase na Documentação do Processo de Aprendizado

* **Justificativa:** Esta metodologia foi adotada para que o TCC não fosse apenas a descrição de um produto final, mas também um **relato da jornada de aprendizado e resolução de problemas**. Ao documentar decisões, desafios e soluções em cada etapa, o projeto ganha um valor acadêmico adicional, servindo como um estudo de caso prático de desenvolvimento de software.
* **Impacto Esperado:** Documentação rica em insights técnicos e pedagógicos, fortalecimento do caráter de pesquisa e aprendizado do TCC.
* **Implementação Realizada:** Cada commit foi documentado com mensagens detalhadas explicando as mudanças implementadas, criando um histórico completo da evolução do projeto e das decisões tomadas.

### 2.11. Organização da Lógica de Negócio e Persistência de Dados

* **Justificativa:** A decisão de refinar a organização da lógica de negócio e da persistência de dados visa equilibrar a simplicidade do projeto com a manutenção de uma boa separação de responsabilidades. Em vez de introduzir uma camada de Repositórios explícita, optou-se por consolidar a lógica de persistência diretamente nos Serviços, mantendo o projeto mais enxuto e alinhado com a filosofia de "PHP puro" e "simplicidade". A criação de um diretório dedicado para ferramentas de banco de dados de baixo nível (Query Builder) garante uma organização lógica para componentes reutilizáveis.
* **Abordagens Consideradas:**
  * **Camada de Repositórios Separada:** Considerada inicialmente para uma separação mais rigorosa da persistência, mas descartada para o escopo atual do MVP devido à preferência por manter a estrutura mais simples e evitar a criação de novos diretórios.
  * **Lógica de Persistência em Models:** Descartada para evitar "modelos gordos" e acoplamento forte das entidades com a camada de dados, mantendo os Models focados apenas na representação dos dados.
* **Impacto Esperado:** Manutenção da simplicidade do projeto, organização clara da lógica de negócio nos Serviços, e agrupamento de ferramentas de banco de dados em um local dedicado (`src/Db/`), facilitando a manutenção e a compreensão do fluxo de dados.
* **Implementação Sugerida:**
  * **Entidades (`src/Models/`):** Foco exclusivo na representação de dados (atributos e métodos básicos). Validações de formato simples podem residir aqui.
  * **Serviços (`src/Services/`):** Contêm a lógica de negócio complexa (cálculos, consumo de APIs, regras de jogo) e também a lógica de persistência de dados (interação direta com o banco de dados para salvar, buscar, atualizar entidades).
  * **Ferramentas de Banco de Dados (`src/Db/`):** Novo diretório para abrigar o Query Builder e outras classes/funções utilitárias de baixo nível relacionadas à interação com o banco de dados.

## 3. Abrangência dos Aspectos

### 3.1. Arquitetura

A arquitetura do Tasksmith é monolítica, com uma clara separação lógica entre o frontend e o backend.

* **Frontend:** Desenvolvido com HTML, CSS (utilizando Tailwind CSS para utilitários e estilização rápida) e JavaScript vanilla para interatividade. As views são renderizadas no servidor e complementadas com lógica no cliente.
* **Backend:** Implementado em PHP puro, responsável pela lógica de negócios, manipulação de dados e interação com o banco de dados. Inclui módulos para autenticação, gestão de tarefas, sistema de XP/Níveis, loja e customização.
* **Banco de Dados:** Utilizado para persistir todos os dados da aplicação, incluindo usuários, tarefas, itens, inventário e notificações.

### 3.2. Funcionalidades

O MVP do Tasksmith abrange as seguintes funcionalidades principais:

* **Autenticação e Autorização:** Login e cadastro de usuários.
* **Gestão de Tarefas (CRUD):** Criação, leitura, atualização e exclusão de tarefas, incluindo suporte a sub-tarefas e marcação de conclusão.
* **Sistema de XP e Níveis:** Geração de pontos de experiência e "Ouro" ao concluir tarefas, com progressão de nível do personagem.
* **Política de Penalidades:** Dedução de XP ou Ouro para tarefas não cumpridas no prazo.

### 3.3. Priorização e Roadmap

A priorização foi focada na entrega do MVP para o TCC, garantindo que as funcionalidades essenciais de gamificação e produtividade estivessem presentes e operacionais. O roadmap implícito no projeto prevê:

* **Fase 1 (MVP - TCC):** Implementação das funcionalidades listadas acima, com foco na estabilidade e demonstração do conceito.
* **Fase 2 (Trabalhos Futuros):** Expansão das funcionalidades, como aprimoramento das notificações (potencialmente com WebSockets), adição de mais tipos de itens e customizações, implementação de sistemas sociais (ex: amigos, clãs), e aprofundamento das mecânicas de jogo.

O desenvolvimento seguirá um ciclo iterativo, permitindo a adição de novas funcionalidades e melhorias contínuas após a conclusão do MVP.
