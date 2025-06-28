# Proposta de Escopo para TCC: Tasksmith - Gamificação e Produtividade

## 1. Resumo do Projeto Tasksmith para TCC

O Tasksmith é uma aplicação web de lista de tarefas gamificada, desenvolvida com PHP puro, JavaScript vanilla e Tailwind CSS, seguindo uma arquitetura monolítica para otimizar o desenvolvimento e a entrega de um Produto Mínimo Viável (MVP). A proposta central do Tasksmith é transformar a gestão de tarefas diárias em uma experiência envolvente, utilizando elementos de RPG medieval para motivar o usuário.

**Relevância para o TCC:**
Este projeto é altamente relevante para um TCC por permitir a exploração prática de conceitos fundamentais de desenvolvimento web (frontend e backend), design de interface (UI/UX), e, crucialmente, a aplicação de princípios de gamificação. A escolha de tecnologias "puras" (PHP, JS vanilla) demonstra a capacidade de construir uma aplicação robusta sem a dependência excessiva de frameworks complexos, o que é valioso para o aprendizado e a compreensão dos fundamentos. O foco na gamificação oferece um campo fértil para discutir como elementos lúdicos podem impactar positivamente a motivação e a produtividade dos usuários, um tema de crescente interesse em diversas áreas.

**Aspectos Técnicos do MVP:**
O MVP do Tasksmith para o TCC incluirá:

* **Página Inicial:** Apresentação do projeto e seus conceitos.
* **Autenticação:** Funcionalidades de Login e Cadastro de Usuários.
* **Painel do Usuário:** Navegação para as áreas de "Aventura" (onde as tarefas são gerenciadas) e "Configurações".
* **Gestão de Tarefas:** Criação, edição e remoção de tarefas.
* **Sistema de XP e Níveis:** Conclusão de tarefas para ganho de experiência e progressão de nível do personagem.
* **Loja de Itens e Customização de Personagem:** Aquisição de itens com "Ouro" (gerado por XP) para personalizar o avatar do usuário.
* **Mapa de Jornada:** Visualização de tarefas como um caminho de progresso, com suporte a sub-tarefas e metas de curto, médio e longo prazo.

## 2. Proposta de Escopo do TCC

### 2.1. Tema Sugerido

#### **"Tasksmith: Desenvolvimento de uma Aplicação Web Gamificada para Aumento da Produtividade e Motivação"**

Este tema abrange tanto o aspecto técnico do desenvolvimento quanto o foco na gamificação e seus impactos.

### 2.2. Objetivos

**Objetivo Geral:**
Desenvolver uma aplicação web gamificada (Tasksmith) que auxilie na organização de tarefas e metas, investigando como a aplicação de elementos de jogos pode influenciar a motivação e a produtividade dos usuários.

**Objetivos Específicos:**

1. Projetar e implementar um sistema de autenticação e autorização para usuários.
2. Desenvolver as funcionalidades essenciais de gestão de tarefas (CRUD), incluindo suporte a sub-tarefas e metas.
3. Implementar um sistema de experiência (XP) e níveis atrelado à conclusão de tarefas, gerando "Ouro" como recompensa.
4. Desenvolver uma loja de itens e um sistema de customização visual do personagem.
5. Implementar a visualização de "Mapa de Jornada" para tarefas, metas e progresso do usuário.
6. Analisar a arquitetura monolítica e a escolha de tecnologias (PHP puro, JS vanilla, Tailwind CSS) para o desenvolvimento ágil do MVP.
7. Discutir os princípios de gamificação aplicados no Tasksmith (XP, Níveis, Loja, Customização, Mapa de Jornada) e seus potenciais impactos na motivação do usuário.
8. Documentar o processo de desenvolvimento, destacando os desafios técnicos e as soluções adotadas, como parte da estratégia de aprendizado prático.

### 2.3. Estrutura do TCC (Sugestão de Capítulos/Seções)

* **Capítulo 1: Introdução**
  * 1.1. Contextualização e Problema
  * 1.2. Justificativa
  * 1.3. Objetivos (Geral e Específicos)
  * 1.4. Estrutura do Trabalho

* **Capítulo 2: Fundamentação Teórica**
  * 2.1. Desenvolvimento Web: Conceitos e Tecnologias (PHP, JavaScript, CSS)
  * 2.2. Arquiteturas de Software: Monolítica vs. Microsserviços (foco na escolha para o MVP)
  * 2.3. Gamificação: Definição, Elementos e Princípios
  * 2.4. Gamificação na Produtividade e Educação

* **Capítulo 3: Projeto e Desenvolvimento do Tasksmith**
  * 3.1. Requisitos Funcionais e Não Funcionais do MVP
  * 3.2. Arquitetura do Sistema (com diagrama)
  * 3.3. Tecnologias Utilizadas e Justificativa da Escolha
  * 3.4. Detalhamento das Funcionalidades Implementadas (Autenticação, Gestão de Tarefas, Sistema de XP, Envio de Notificações)
  * 3.5. Desafios Técnicos e Soluções Adotadas (Aprendizado Prático)

* **Capítulo 4: Análise da Gamificação no Tasksmith**
  * 4.1. Elementos de Gamificação Aplicados (XP, Níveis, Recompensas Implícitas)
  * 4.2. Potenciais Impactos na Motivação e Produtividade
  * 4.3. Limitações e Oportunidades Futuras

* **Capítulo 5: Conclusão**
  * 5.1. Resultados Alcançados
  * 5.2. Contribuições do Trabalho
  * 5.3. Trabalhos Futuros
  * 5.4. Considerações Finais

### 2.4. Metodologia (Aprendizado Prático)

A metodologia será baseada no desenvolvimento iterativo e incremental do Tasksmith, com ênfase na documentação do processo de aprendizado. Cada etapa de implementação de uma funcionalidade será acompanhada de:

* **Registro de Decisões:** Por que certas abordagens técnicas foram escolhidas.
* **Identificação de Desafios:** Problemas encontrados durante o desenvolvimento.
* **Soluções Implementadas:** Como os desafios foram superados, incluindo a pesquisa e o aprendizado de novas técnicas ou conceitos.
* **Reflexão:** O que foi aprendido em cada etapa e como isso contribui para o conhecimento geral do desenvolvedor.

Esta abordagem permitirá que o TCC não seja apenas a descrição de um produto, mas também um relato da jornada de aprendizado e resolução de problemas.

## 3. Diagrama de Arquitetura (Mermaid)

```mermaid
graph TD
    A[Usuário] -->|Acessa| B(Navegador Web)
    B -->|Requisição HTTP| C(Servidor Web - Apache/XAMPP)
    C -->|Redireciona| D(public/index.php)
    D -->|Inicializa| E(src/Router.php)
    E -->|Mapeia Rota| F{Controlador/View Correspondente}

    subgraph Backend (PHP Puro)
        F --> G[Autenticação/Autorização]
        F --> H[Gestão de Tarefas (CRUD)]
        F --> I[Sistema de XP e Níveis]
        F --> J[Loja de Itens]
        F --> K[Customização de Personagem]
        G -- Dados --> L(Banco de Dados)
        H -- Dados --> L
        I -- Dados --> L
        J -- Dados --> L
        K -- Dados --> L
    end

    subgraph Frontend (HTML, CSS, JS Vanilla)
        F --> M[Views (src/Views)]
        M --> N[public/assets/css/style.css (Tailwind)]
        M --> O[public/assets/js/main.js]
        M --> P{Visualizações de Tarefas}
        P --> Q[Quadro Kanban]
        P --> R[Mapa de Jornada]
        M --> S[Interface da Loja]
        M --> T[Visualização do Personagem]
    end

    L[Banco de Dados]
    O -- Interage com --> F
    N -- Estiliza --> M
    I -- Gera Ouro/XP --> J
    J -- Itens --> K
    H -- Dados --> P
    R -- Inclui --> H
    R -- Inclui --> U[Sub-tarefas/Metas]
```
