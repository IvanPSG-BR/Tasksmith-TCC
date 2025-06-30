# Desafios do Projeto Tasksmith

Este documento detalha os desafios enfrentados durante o desenvolvimento do projeto Tasksmith, as abordagens utilizadas para superá-los e as lições aprendidas.

## 1. Decisão e Planejamento do Projeto de TCC

### Descrição do Desafio

Inicialmente, a ideia para o projeto de TCC era uma plataforma de gerenciamento de projetos e gestão de tempo para freelancers. No entanto, essa ideia foi abandonada devido a um planejamento inadequado, falta de motivação e a necessidade de conhecimentos não-técnicos que seriam difíceis de adquirir no tempo disponível.

Posteriormente, surgiu a ideia de transformar um projeto pessoal em andamento – uma aplicação de lista/gerenciamento de tarefas gamificada e temática – no projeto de TCC. Embora o Habitica seja um representante notável nesse nicho, ele carece de imersão. Comecei a conceber recursos e outras necessidades para a aplicação, mas de forma desorganizada e com um escopo muito amplo, sem clareza sobre como implementar essas ideias no programa.

### Como Foi Lidar com o Desafio

As ideias foram sendo construídas ao longo do tempo de forma dispersa. Somente mais recentemente, houve um esforço para um planejamento mais centrado e organizado do Produto Mínimo Viável (MVP), incluindo um cronograma de execução para acelerar a finalização do projeto.

### Lições Aprendidas

* A importância de um planejamento detalhado e realista desde o início do projeto.
* A necessidade de definir um escopo claro e gerenciável para evitar a dispersão e o desânimo.
* A vantagem de alinhar o projeto acadêmico com interesses pessoais para manter a motivação.
* A relevância de um cronograma de execução para garantir o progresso e a conclusão dentro do prazo.

## 2. Reestruturação Completa da Arquitetura do Projeto

### Descrição do Desafio

Durante o desenvolvimento inicial, o projeto estava estruturado de forma inadequada, com separação entre frontend e backend que não se adequava à abordagem monolítica, posteriormente escolhida. A estrutura original incluía diretórios separados para frontend e backend, com dependências desnecessárias como React e Vite, que contradiziam a decisão de usar tecnologias "puras".

### Como Foi Lidar com o Desafio

Foi realizada uma reestruturação completa do projeto, migrando de uma estrutura frontend/backend separada para uma arquitetura monolítica tradicional em PHP. Isso envolveu:

* **Reorganização de Diretórios:** Criação da estrutura `src/` para código PHP, `public/` para arquivos acessíveis pelo navegador, e `config/` para configurações.
* **Remoção de Dependências Desnecessárias:** Eliminação do React, Vite e outras dependências que não se alinhavam com a filosofia do projeto.
* **Configuração do Tailwind CSS:** Implementação adequada do Tailwind para trabalhar com PHP puro ao invés de um ambiente React.
* **Criação de Sistema de Roteamento:** Desenvolvimento de um roteador personalizado em PHP para gerenciar as rotas da aplicação.

### Lições Aprendidas

* A importância de definir claramente a arquitetura desde o início do projeto.
* A necessidade de alinhar todas as tecnologias e dependências com a filosofia escolhida.
* O valor de uma estrutura de projeto bem organizada para facilitar o desenvolvimento futuro.
* A flexibilidade de refatorar completamente quando necessário, mesmo que isso signifique reescrever partes significativas do código.

## 3. Implementação de Sistema de Roteamento Personalizado

### Descrição do Desafio

A necessidade de implementar um sistema de roteamento funcional sem utilizar frameworks existentes apresentou desafios técnicos significativos. Era necessário criar URLs amigáveis, gerenciar diferentes tipos de requisições, e implementar redirecionamentos adequados, tudo isso mantendo a simplicidade e o controle total sobre o código.

### Como Foi Lidar com o Desafio

O desafio foi abordado através de uma implementação incremental:

* **Desenvolvimento do Router.php:** Criação de uma classe Router personalizada para mapear URLs para views correspondentes.
* **Configuração do .htaccess:** Implementação de regras de reescrita para URLs amigáveis e redirecionamento de todas as requisições para o index.php.
* **Sistema de Front Controller:** Implementação do padrão Front Controller para centralizar o processamento de requisições.
* **Tratamento de Erros:** Configuração de páginas de erro personalizadas (404, 403, 500) integradas ao sistema de roteamento.

### Lições Aprendidas

* A compreensão de algums mecanismos de roteamento web.
* A importância da configuração adequada do servidor web (.htaccess) para o funcionamento correto da aplicação.
* O valor de implementar funcionalidades básicas do zero para entender completamente seu funcionamento.
* A necessidade de planejamento cuidadoso ao criar sistemas que serão a base para funcionalidades futuras.
