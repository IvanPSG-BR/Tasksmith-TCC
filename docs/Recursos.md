# Detalhamento das Funcionalidades do Tasksmith

Este documento detalha as funcionalidades propostas para o Tasksmith, incluindo seus requisitos específicos, o plano de implementação e o estado atual de desenvolvimento.

## Estado Geral da Implementação

**✅ Funcionalidades Implementadas:**

- Sistema de roteamento personalizado em PHP puro
- Estrutura de arquitetura monolítica organizada
- Interface responsiva com Tailwind CSS
- Página inicial com seção call-to-action temática
- Sistema de assets e recursos estáticos

**🔄 Funcionalidades em Desenvolvimento/Planejadas:**

- Sistema de autenticação e autorização
- Gestão de tarefas (CRUD) e sub-tarefas
- Sistema de XP, níveis e recompensas
- Loja de itens e customização de personagem
- Mapa de jornada interativo
- Sistema de notificações e penalidades

## 0. Sistema de Roteamento e Arquitetura Base ✅

### 0.1. Requisitos Implementados

- **Roteamento Personalizado:** Sistema de roteamento em PHP puro para gerenciar URLs amigáveis e navegação entre páginas.
- **Arquitetura Monolítica:** Estrutura organizada com separação clara entre código fonte, views, assets e configurações.
- **URLs Amigáveis:** Configuração de .htaccess para reescrita de URLs e redirecionamentos adequados.
- **Segurança Básica:** Proteção de arquivos sensíveis e verificação de acesso adequado.

### 0.2. Implementação Realizada

- **Estrutura de Diretórios:**
  - `src/` - Código PHP da aplicação (Router, Controllers, Models)
  - `public/` - Arquivos acessíveis publicamente (assets, index.php)
  - `config/` - Arquivos de configuração
  - `docs/` - Documentação do projeto

- **Sistema de Roteamento:**
  - Classe `Router.php` com mapeamento de rotas para views
  - Suporte a rotas para autenticação (`/login`, `/signup`)
  - Rotas para funcionalidades do jogo (`/game/*`)
  - Rotas informativas (`/about-project`, `/about-creator`)

- **Configuração de Assets:**
  - Tailwind CSS configurado para compilação automática
  - Estrutura organizada para CSS, JavaScript e imagens
  - Otimização de performance com compressão e cache

### 0.3. Estado Atual

**✅ Concluído:** Sistema base totalmente funcional, permitindo navegação entre páginas e servindo como fundação para futuras funcionalidades.

## 1. Interface da Página Inicial ✅

### 1.1. Requisitos Implementados

- **Design Responsivo:** Interface que se adapta a diferentes tamanhos de tela (mobile, tablet, desktop).
- **Temática Medieval:** Elementos visuais que remetem ao tema RPG medieval do projeto.
- **Call-to-Action:** Seção principal que convida o usuário a começar sua jornada no Tasksmith.
- **Navegação Intuitiva:** Menu de navegação claro com links para diferentes seções.

### 1.2. Implementação Realizada

- **Estrutura HTML Semântica:**
  - Header com navegação e branding
  - Seção principal com call-to-action
  - Footer com informações adicionais
  - Uso adequado de tags semânticas (header, main, section, footer)

- **Estilização com Tailwind CSS:**
  - Sistema de classes utilitárias para estilização rápida
  - Responsividade implementada com breakpoints (sm:, md:, lg:)
  - Tipografia temática com fontes medievais (MedievalSharp, Pirata One, IM Fell English)
  - Cores e efeitos visuais alinhados com o tema

- **Elementos Temáticos:**
  - Logotipo com ícones de notepad e anvil (bigorna)
  - Título inspirador: "Enquanto há vida, Há esperança"
  - Texto narrativo mencionando Hammilton (personagem guia)
  - Botão call-to-action: "Começar Jornada"

- **JavaScript Básico:**
  - Estrutura preparada para futuras interações
  - Sistema de mensagens global configurado

### 1.3. Estado Atual

**✅ Concluído:** Página inicial totalmente funcional com design responsivo e elementos temáticos implementados.

## 2. Loja de Itens e Customização de Personagem 🔄

### 2.1. Requisitos

- **Sistema de Moeda:** O sistema de XP e Níveis existente será aprimorado para gerar "Ouro" como uma moeda virtual. A conclusão de tarefas e o avanço de nível concederão quantidades de Ouro.
- **Itens:** Serão definidos diferentes tipos de itens (ex: armaduras, armas, acessórios, capacetes) que o usuário poderá adquirir. Cada item terá um custo em Ouro.
- **Aquisição de Itens:** O usuário poderá comprar itens na loja utilizando o Ouro acumulado.
- **Inventário:** O usuário terá um inventário para armazenar os itens adquiridos.
- **Equipar/Desequipar:** O usuário poderá equipar e desequipar itens para customizar a aparência de seu personagem.
- **Visualização do Personagem:** O personagem do usuário será exibido em uma área dedicada, e sua aparência será atualizada dinamicamente com base nos itens equipados.

### 2.2. Plano de Implementação

- **Design de Sprites:**
  - **Abordagem:** Utilizar sprites pré-renderizados para o personagem base e para cada item. Ao equipar um item, o sprite correspondente será sobreposto ao sprite do personagem base.
  - **Aquisição:** Pesquisar e utilizar recursos de sprites gratuitos (ex: OpenGameArt, Itch.io) ou criar sprites próprios em estilo pixel art/medieval. Focar inicialmente em um conjunto limitado de itens para demonstrar a funcionalidade.
- **Backend (PHP):**
  - **Banco de Dados:**
    - Tabela `items`: `id`, `name`, `type` (e.g., 'armor', 'weapon'), `cost`, `sprite_path`.
    - Tabela `user_inventory`: `user_id`, `item_id`, `is_equipped` (boolean).
    - Atualizar tabela `users` para incluir `gold_amount`.
  - **Lógica:**
    - Função para adicionar Ouro ao usuário ao completar tarefas/subir de nível.
    - Endpoints para listar itens da loja, comprar itens (verificando Ouro e inventário), e equipar/desequipar itens.
    - Lógica para retornar os itens equipados do usuário para o frontend.
- **Frontend (JavaScript Vanilla, Tailwind CSS):**
  - **Página da Loja:** Interface para exibir itens disponíveis, seus custos e um botão de compra.
  - **Página de Personagem/Customização:**
    - Exibir o sprite base do personagem.
    - Carregar e sobrepor os sprites dos itens equipados usando CSS (`position: absolute`, `z-index`) ou, se necessário, Canvas API para composições mais complexas.
    - Lógica JavaScript para gerenciar a seleção de itens no inventário e a atualização visual do personagem.
    - Exibir a quantidade de Ouro do usuário.

## 3. Mapa de Jornada 🔄

### 3.1. Requisitos

- **Visualização de Progresso:** As tarefas serão representadas como "nós" ou "pontos" em um caminho visual, simulando um mapa de jornada.
- **Sub-tarefas:** Cada tarefa principal poderá ter sub-tarefas associadas, que serão visualizadas como etapas dentro de um nó principal.
- **Metas (Curto, Médio, Longo Prazo):** As metas serão representadas como "destinos" ou "regiões" no mapa, alcançadas ao completar conjuntos de tarefas/missões.
- **Progresso Visual:** O avanço do usuário no mapa será indicado por um marcador ou pelo próprio personagem, movendo-se pelos nós à medida que as tarefas são concluídas.
- **Interatividade:** O usuário poderá clicar nos nós para ver detalhes da tarefa/sub-tarefa e seu status.

### 3.2. Plano de Implementação

- **Design Visual:**
  - **Fundo do Mapa:** Utilizar uma imagem de fundo estática de um mapa medieval/fantasia.
  - **Nós de Tarefas:** Representar tarefas como ícones ou marcadores posicionados dinamicamente sobre o mapa.
  - **Caminho:** Linhas conectando os nós para indicar a sequência ou dependências das tarefas.
  - **Metas:** Representar metas de longo prazo como ícones maiores ou "cidades/castelos" no mapa.
- **Backend (PHP):**
  - **Banco de Dados:**
    - Atualizar tabela `tasks` para incluir `parent_task_id` (para sub-tarefas) e `map_x`, `map_y` (coordenadas para posicionamento no mapa).
    - Nova tabela `goals`: `id`, `name`, `description`, `type` (e.g., 'short', 'medium', 'long'), `map_x`, `map_y`.
    - Tabela `task_goals`: `task_id`, `goal_id` (para associar tarefas a metas).
  - **Lógica:**
    - Endpoints para buscar tarefas, sub-tarefas e metas, incluindo suas coordenadas no mapa e status de conclusão.
    - Lógica para marcar tarefas/sub-tarefas como concluídas e atualizar o progresso do usuário.
- **Frontend (JavaScript Vanilla, Tailwind CSS):**
  - **Renderização do Mapa:** Carregar a imagem de fundo do mapa.
  - **Posicionamento dos Nós:** Usar JavaScript para posicionar elementos HTML (divs com ícones/texto) sobre o mapa usando `position: absolute` e as coordenadas `map_x`, `map_y` do backend.
  - **Interatividade:**
    - Event listeners para cliques nos nós, exibindo modais ou painéis laterais com detalhes da tarefa/sub-tarefa.
    - Lógica para atualizar a aparência dos nós (ex: mudar cor, adicionar um "check") quando uma tarefa é concluída.
    - Animação ou transição suave do marcador/personagem do usuário no mapa à medida que ele avança.
  - **Visualização de Sub-tarefas/Metas:** Implementar a expansão de nós para mostrar sub-tarefas e a exibição de informações sobre as metas.

## 4. Gerenciamento de Tarefas (CRUD) e Sub-tarefas 🔄

### 4.1. Requisitos

- **Criação de Tarefas:** O usuário deve ser capaz de criar novas tarefas, definindo título, descrição, data de vencimento e nível de dificuldade.
- **Edição de Tarefas:** O usuário deve ser capaz de modificar os detalhes de tarefas existentes.
- **Exclusão de Tarefas:** O usuário deve ser capaz de remover tarefas.
- **Marcação de Conclusão:** O usuário deve ser capaz de marcar tarefas como concluídas.
- **Sub-tarefas:** Cada tarefa principal pode ter uma ou mais sub-tarefas associadas, permitindo a quebra de grandes objetivos em etapas menores.
- **Hierarquia:** As sub-tarefas devem ser vinculadas à sua tarefa principal e seu status de conclusão pode influenciar o status da tarefa principal.

### 4.2. Plano de Implementação

- **Backend (PHP):**
  - **Banco de Dados:**
    - Tabela `tasks`: `id`, `user_id`, `title`, `description`, `due_date`, `difficulty`, `status`, `parent_task_id`, `created_at`, `updated_at`.
    - O campo `parent_task_id` será `NULL` para tarefas principais e conterá o `id` da tarefa pai para sub-tarefas.
  - **Lógica:**
    - Endpoints para CRUD de tarefas: criar, listar, atualizar, excluir.
    - Lógica para listar sub-tarefas de uma tarefa específica.
    - Função para marcar tarefas como concluídas e calcular XP/Ouro baseado na dificuldade.
    - Verificação de dependências: uma tarefa principal só pode ser marcada como concluída se todas as suas sub-tarefas estiverem concluídas.
- **Frontend (JavaScript Vanilla, Tailwind CSS):**
  - **Interface de Criação/Edição:** Formulários para adicionar/editar tarefas com campos para título, descrição, data de vencimento e dificuldade.
  - **Listagem de Tarefas:** Exibir tarefas em formato de lista ou cards, com opções para editar, excluir e marcar como concluída.
  - **Visualização Hierárquica:** Mostrar sub-tarefas aninhadas sob suas tarefas principais, com indentação ou outros indicadores visuais.
  - **Interatividade:** Permitir a criação de sub-tarefas diretamente a partir de uma tarefa principal, e a navegação entre tarefas e sub-tarefas.

## 5. Sistema de XP e Níveis 🔄

### 5.1. Requisitos

- **Ganho de XP:** O usuário ganha pontos de experiência (XP) ao concluir tarefas. A quantidade de XP deve ser proporcional à dificuldade da tarefa.
- **Progressão de Níveis:** O usuário avança de nível ao acumular uma quantidade específica de XP. Cada nível requer mais XP que o anterior.
- **Geração de Ouro:** Além de XP, a conclusão de tarefas e o avanço de nível geram "Ouro", que pode ser usado na loja de itens.
- **Visualização de Progresso:** O usuário deve poder ver seu nível atual, XP acumulado, XP necessário para o próximo nível e quantidade de Ouro.

### 5.2. Plano de Implementação

- **Backend (PHP):**
  - **Banco de Dados:**
    - Atualizar tabela `users` para incluir `level`, `xp`, `gold_amount`.
    - Tabela `xp_transactions`: `id`, `user_id`, `task_id`, `xp_gained`, `gold_gained`, `created_at` (para histórico).
  - **Lógica:**
    - Função para calcular XP e Ouro baseado na dificuldade da tarefa (ex: fácil = 10 XP, médio = 25 XP, difícil = 50 XP).
    - Algoritmo de progressão de níveis (ex: nível 1 = 100 XP, nível 2 = 250 XP, nível 3 = 450 XP, etc.).
    - Função para verificar se o usuário subiu de nível após ganhar XP e conceder Ouro bônus.
    - Endpoints para buscar informações de nível/XP/Ouro do usuário.
- **Frontend (JavaScript Vanilla, Tailwind CSS):**
  - **Barra de Progresso:** Exibir uma barra de progresso visual mostrando o XP atual em relação ao XP necessário para o próximo nível.
  - **Notificações:** Mostrar notificações quando o usuário ganha XP, sobe de nível ou ganha Ouro.
  - **Painel de Status:** Área dedicada para exibir nível, XP total, Ouro e outras estatísticas do personagem.

## 6. Sistema de Notificações 🔄

### 6.1. Requisitos

- **Notificações de Ganho:** Alertar o usuário quando ele ganha XP, sobe de nível ou ganha Ouro.
- **Lembretes de Tarefas:** Notificar o usuário sobre tarefas próximas do vencimento.
- **Notificações de Penalidades:** Informar sobre deduções de XP ou Ouro por tarefas não cumpridas.

### 6.2. Plano de Implementação

- **Backend (PHP):**
  - **Banco de Dados:**
    - Tabela `notifications`: `id`, `user_id`, `type`, `message`, `is_read`, `created_at`.
  - **Lógica:**
    - Função para criar notificações automáticas baseadas em eventos (conclusão de tarefa, subida de nível, etc.).
    - Endpoint para buscar notificações não lidas do usuário.
    - Sistema de limpeza automática de notificações antigas.
- **Frontend (JavaScript Vanilla, Tailwind CSS):**
  - **Sistema de Toast:** Exibir notificações temporárias na tela quando eventos importantes ocorrem.
  - **Centro de Notificações:** Área onde o usuário pode ver todas as notificações recentes.
  - **Indicadores Visuais:** Badges ou ícones para mostrar notificações não lidas.

## 7. Política de Penalidades 🔄

### 7.1. Requisitos

- **Detecção de Atraso:** O sistema deve identificar tarefas que passaram da data de vencimento sem serem concluídas.
- **Aplicação de Penalidades:** Deduzir XP ou Ouro do usuário por tarefas atrasadas, com base na dificuldade da tarefa.
- **Notificação de Penalidades:** Informar o usuário sobre as penalidades aplicadas.

### 7.2. Plano de Implementação

- **Backend (PHP):**
  - **Lógica:**
    - Script ou função executada periodicamente (ex: diariamente) para verificar tarefas vencidas.
    - Algoritmo para calcular penalidades baseado na dificuldade da tarefa e tempo de atraso.
    - Função para aplicar penalidades e registrar no histórico.
  - **Banco de Dados:**
    - Tabela `penalties`: `id`, `user_id`, `task_id`, `xp_lost`, `gold_lost`, `applied_at`.
- **Frontend (JavaScript Vanilla, Tailwind CSS):**
  - **Visualização de Penalidades:** Mostrar ao usuário as penalidades aplicadas e o motivo.
  - **Alertas Preventivos:** Avisar o usuário sobre tarefas próximas do vencimento para evitar penalidades.
