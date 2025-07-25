# Proposta de Escopo para TCC: Tasksmith - Gamificação e Produtividade

## 1. Resumo do Projeto Tasksmith para TCC

O Tasksmith é uma aplicação web de lista de tarefas gamificada, desenvolvida com PHP puro, JavaScript vanilla e Tailwind CSS, seguindo uma arquitetura monolítica para otimizar o desenvolvimento e a entrega de um Produto Mínimo Viável (MVP). A proposta central do Tasksmith é transformar a gestão de tarefas diárias em uma experiência envolvente, utilizando elementos de RPG medieval para motivar o usuário.

**Relevância para o TCC:**
Este projeto é altamente relevante para um TCC por permitir a exploração prática de conceitos fundamentais de desenvolvimento web (frontend e backend), design de interface (UI/UX), e, crucialmente, a aplicação de princípios de gamificação. A escolha de tecnologias "puras" (PHP, JS vanilla) demonstra a capacidade de construir uma aplicação robusta sem a dependência excessiva de frameworks complexos, o que é valioso para o aprendizado e a compreensão dos fundamentos. O foco na gamificação oferece um campo fértil para discutir como elementos lúdicos podem impactar positivamente a motivação e a produtividade dos usuários, um tema de crescente interesse em diversas áreas.

**Aspectos Técnicos do MVP:**
O MVP do Tasksmith para o TCC incluirá:

* **Página Inicial:** Apresentação do projeto e seus conceitos com seção call-to-action implementada.
* **Sistema de Roteamento:** Implementação de roteador personalizado em PHP puro com URLs amigáveis.
* **Autenticação:** Funcionalidades de Login e Cadastro de Usuários (estrutura preparada).
* **Painel do Usuário:** Navegação para as áreas de "Forja" e "Quadro de Missões".
* **Gestão de Tarefas:** Criação, edição e remoção de tarefas (estrutura preparada).
* **Sistema de XP e Níveis:** Conclusão de tarefas para ganho de experiência e progressão de nível do personagem.

**Estado Atual da Implementação:**

* ✅ **Estrutura Base:** Arquitetura monolítica implementada com organização clara de diretórios
* ✅ **Sistema de Roteamento:** Routes personalizado funcional com suporte a URLs amigáveis
* 🔄 **Página Inicial:** Interface responsiva com Tailwind CSS e seção call-to-action, outras seções em progresso
* ✅ **Configuração de Ambiente:** Tailwind CSS configurado, .htaccess implementado, estrutura de assets organizada
* 🔄 **Páginas de Autenticação:** Estrutura criada, aguardando implementação da lógica
* 🔄 **Funcionalidades de Gamificação:** Estrutura preparada para implementação futura

## 2. Proposta de Escopo do TCC

### 2.1. Tema Sugerido

#### **"Tasksmith: Desenvolvimento de uma Aplicação Web Gamificada para Aumento da Produtividade e Motivação"**

Este tema abrange tanto o aspecto técnico do desenvolvimento quanto o foco na gamificação e seus impactos.

### 2.2. Objetivos

**Objetivo Geral:**
Desenvolver uma aplicação web gamificada (Tasksmith) que auxilie na organização de tarefas e metas, investigando como a aplicação de elementos de jogos pode influenciar a motivação e a produtividade dos usuários.

**Objetivos Específicos:**

1. ✅ **Implementar uma arquitetura monolítica bem estruturada** com separação clara de responsabilidades entre diretórios e componentes.
2. ✅ **Desenvolver um sistema de roteamento personalizado** em PHP puro para gerenciar navegação e URLs amigáveis.
3. ✅ **Criar interface responsiva e atrativa** para a página inicial com elementos temáticos medievais.
4. 🔄 **Projetar e implementar um sistema de autenticação e autorização** para usuários (estrutura preparada).
5. 🔄 **Desenvolver as funcionalidades essenciais de gestão de tarefas (CRUD)**, incluindo suporte a sub-tarefas e metas.
6. 🔄 **Implementar um sistema de experiência (XP) e níveis** atrelado à conclusão de tarefas, gerando "Ouro" como recompensa.
7. ✅ **Analisar a arquitetura monolítica e a escolha de tecnologias** (PHP puro, JS vanilla, Tailwind CSS) para o desenvolvimento ágil do MVP.
8. 🔄 **Discutir os princípios de gamificação aplicados** no Tasksmith e seus potenciais impactos na motivação do usuário.
9. ✅ **Documentar o processo de desenvolvimento**, destacando os desafios técnicos e as soluções adotadas, como parte da estratégia de aprendizado prático.

**Legenda:** ✅ Concluído | 🔄 Em desenvolvimento/Planejado

### 2.3. Estrutura do TCC (Sugestão de Capítulos/Seções)

* **Capítulo 1: Introdução**
  * 1.1. Contextualização e Problema
  * 1.2. Justificativa
  * 1.3. Objetivos (Geral e Específicos)
  * 1.4. Estrutura do Trabalho
* **Capítulo 2: Fundamentação Teórica**
  * 2.1. Gamificação: Conceitos e Aplicações
  * 2.2. Produtividade e Motivação: Teorias Psicológicas
  * 2.3. Desenvolvimento Web com Tecnologias "Puras"
  * 2.4. Arquiteturas Monolíticas vs. Microsserviços
* **Capítulo 3: Metodologia**
  * 3.1. Abordagem de Desenvolvimento (Iterativa e Incremental)
  * 3.2. Tecnologias Utilizadas (PHP, JS Vanilla, Tailwind CSS)
  * 3.3. Ferramentas de Desenvolvimento e Versionamento
* **Capítulo 4: Desenvolvimento do Tasksmith**
  * 4.1. Planejamento e Definição do MVP
  * 4.2. Arquitetura e Design do Sistema
  * 4.3. Implementação das Funcionalidades
    * 4.3.1. Sistema de Autenticação
    * 4.3.2. Gestão de Tarefas (CRUD)
    * 4.3.3. Sistema de XP e Níveis
  * 4.4. Desafios Técnicos e Soluções Adotadas
* **Capítulo 5: Análise e Discussão**
  * 5.1. Avaliação da Arquitetura Monolítica
  * 5.2. Eficácia dos Elementos de Gamificação
  * 5.3. Experiência do Usuário e Interface
  * 5.4. Limitações e Oportunidades de Melhoria
* **Capítulo 6: Considerações Finais**
  * 6.1. Conclusões
  * 6.2. Trabalhos Futuros
  * 6.3. Contribuições do Projeto

### 2.4. Metodologia de Documentação do Processo de Aprendizado

Uma característica distintiva deste TCC será a **documentação detalhada do processo de aprendizado** durante o desenvolvimento. Cada etapa de implementação será acompanhada de:

* **Decisões:** Justificativas para escolhas técnicas e de design.
* **Desafios:** Obstáculos encontrados e como foram identificados.
* **Soluções:** Estratégias adotadas para superar os desafios, incluindo pesquisa e aquisição de novos conhecimentos.
* **Reflexão:** O que foi aprendido em cada etapa e como isso contribui para o conhecimento geral do desenvolvedor.

Esta abordagem permitirá que o TCC não seja apenas a descrição de um produto, mas também um relato da jornada de aprendizado e resolução de problemas.

## 3. Diagrama de Arquitetura Implementada (Mermaid)

```mermaid
graph TD
    A[Usuário] -->|Acessa| B(Navegador Web)
    B -->|Requisição HTTP| C(Servidor Web - Apache/XAMPP)
    C -->|.htaccess Rewrite| D(index.php - Raiz)
    D -->|Redireciona| E(public/index.php)
    E -->|Inicializa| F(src/Routes.php)
    F -->|Mapeia Rota| G(Controller Correspondente)

    subgraph "Estrutura Implementada"
        subgraph "Sistema de Roteamento ✅"
            F --> H[Rotas Web Definidas]
            H --> I[/home → HomeController]
            H --> J[/login → AuthController]
            H --> K[/signup → AuthController]
            H --> L[/game/* → GameController]
        end

        subgraph "Controllers ✅"
            G --> M[src/Controllers/HomeController.php]
            G --> N[src/Controllers/AuthController.php]
            G --> O[src/Controllers/GameController.php]
        end

        subgraph "Views e Assets ✅"
            M --> P[src/Views/home/home.php]
            N --> Q[src/Views/auth/*]
            O --> R[src/Views/game/*]
            P --> S[public/assets/*]
        end

        subgraph "Configuração e Segurança ✅"
            C --> T[.htaccess - URLs Amigáveis]
            T --> U[Compressão e Cache]
            T --> V[Proteção de Arquivos]
            E --> W[Verificação FROM_ROOT]
        end
    end

    subgraph "Funcionalidades Futuras 🔄"
        X[Banco de Dados]
        Y[Sistema de XP/Níveis]
        Z[Gestão de Tarefas]
        AA[Lógica de Autenticação]
    end

    style F fill:#90EE90
    style M fill:#90EE90
    style P fill:#90EE90
    style S fill:#90EE90
    style T fill:#90EE90
    style X fill:#FFE4B5
    style Y fill:#FFE4B5
    style Z fill:#FFE4B5
    style AA fill:#FFE4B5
