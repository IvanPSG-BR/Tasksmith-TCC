# Detalhamento das Funcionalidades do Tasksmith

Este documento detalha as funcionalidades propostas para o Tasksmith, incluindo seus requisitos específicos e o plano de implementação.

## 1. Loja de Itens e Customização de Personagem

### 1.1. Requisitos

* **Sistema de Moeda:** O sistema de XP e Níveis existente será aprimorado para gerar "Ouro" como uma moeda virtual. A conclusão de tarefas e o avanço de nível concederão quantidades de Ouro.
* **Itens:** Serão definidos diferentes tipos de itens (ex: armaduras, armas, acessórios, capacetes) que o usuário poderá adquirir. Cada item terá um custo em Ouro.
* **Aquisição de Itens:** O usuário poderá comprar itens na loja utilizando o Ouro acumulado.
* **Inventário:** O usuário terá um inventário para armazenar os itens adquiridos.
* **Equipar/Desequipar:** O usuário poderá equipar e desequipar itens para customizar a aparência de seu personagem.
* **Visualização do Personagem:** O personagem do usuário será exibido em uma área dedicada, e sua aparência será atualizada dinamicamente com base nos itens equipados.

### 1.2. Plano de Implementação

* **Design de Sprites:**
  * **Abordagem:** Utilizar sprites pré-renderizados para o personagem base e para cada item. Ao equipar um item, o sprite correspondente será sobreposto ao sprite do personagem base.
  * **Aquisição:** Pesquisar e utilizar recursos de sprites gratuitos (ex: OpenGameArt, Itch.io) ou criar sprites próprios em estilo pixel art/medieval. Focar inicialmente em um conjunto limitado de itens para demonstrar a funcionalidade.
* **Backend (PHP):**
  * **Banco de Dados:**
    * Tabela `items`: `id`, `name`, `type` (e.g., 'armor', 'weapon'), `cost`, `sprite_path`.
    * Tabela `user_inventory`: `user_id`, `item_id`, `is_equipped` (boolean).
    * Atualizar tabela `users` para incluir `gold_amount`.
  * **Lógica:**
    * Função para adicionar Ouro ao usuário ao completar tarefas/subir de nível.
    * Endpoints para listar itens da loja, comprar itens (verificando Ouro e inventário), e equipar/desequipar itens.
    * Lógica para retornar os itens equipados do usuário para o frontend.
* **Frontend (JavaScript Vanilla, Tailwind CSS):**
  * **Página da Loja:** Interface para exibir itens disponíveis, seus custos e um botão de compra.
  * **Página de Personagem/Customização:**
    * Exibir o sprite base do personagem.
    * Carregar e sobrepor os sprites dos itens equipados usando CSS (`position: absolute`, `z-index`) ou, se necessário, Canvas API para composições mais complexas.
    * Lógica JavaScript para gerenciar a seleção de itens no inventário e a atualização visual do personagem.
    * Exibir a quantidade de Ouro do usuário.

## 2. Mapa de Jornada

### 2.1. Requisitos

* **Visualização de Progresso:** As tarefas serão representadas como "nós" ou "pontos" em um caminho visual, simulando um mapa de jornada.
* **Sub-tarefas:** Cada tarefa principal poderá ter sub-tarefas associadas, que serão visualizadas como etapas dentro de um nó principal.
* **Metas (Curto, Médio, Longo Prazo):** As metas serão representadas como "destinos" ou "regiões" no mapa, alcançadas ao completar conjuntos de tarefas/missões.
* **Progresso Visual:** O avanço do usuário no mapa será indicado por um marcador ou pelo próprio personagem, movendo-se pelos nós à medida que as tarefas são concluídas.
* **Interatividade:** O usuário poderá clicar nos nós para ver detalhes da tarefa/sub-tarefa e seu status.

### 2.2. Plano de Implementação

* **Design Visual:**
  * **Fundo do Mapa:** Utilizar uma imagem de fundo estática de um mapa medieval/fantasia.
  * **Nós de Tarefas:** Representar tarefas como ícones ou marcadores posicionados dinamicamente sobre o mapa.
  * **Caminho:** Linhas conectando os nós para indicar a sequência ou dependências das tarefas.
  * **Metas:** Representar metas de longo prazo como ícones maiores ou "cidades/castelos" no mapa.
* **Backend (PHP):**
  * **Banco de Dados:**
    * Atualizar tabela `tasks` para incluir `parent_task_id` (para sub-tarefas) e `map_x`, `map_y` (coordenadas para posicionamento no mapa).
    * Nova tabela `goals`: `id`, `name`, `description`, `type` (e.g., 'short', 'medium', 'long'), `map_x`, `map_y`.
    * Tabela `task_goals`: `task_id`, `goal_id` (para associar tarefas a metas).
  * **Lógica:**
    * Endpoints para buscar tarefas, sub-tarefas e metas, incluindo suas coordenadas no mapa e status de conclusão.
    * Lógica para marcar tarefas/sub-tarefas como concluídas e atualizar o progresso do usuário.
* **Frontend (JavaScript Vanilla, Tailwind CSS):**
  * **Renderização do Mapa:** Carregar a imagem de fundo do mapa.
  * **Posicionamento dos Nós:** Usar JavaScript para posicionar elementos HTML (divs com ícones/texto) sobre o mapa usando `position: absolute` e as coordenadas `map_x`, `map_y` do backend.
  * **Interatividade:**
    * Event listeners para cliques nos nós, exibindo modais ou painéis laterais com detalhes da tarefa/sub-tarefa.
    * Lógica para atualizar a aparência dos nós (ex: mudar cor, adicionar um "check") quando uma tarefa é concluída.
    * Animação ou transição suave do marcador/personagem do usuário no mapa à medida que ele avança.
  * **Visualização de Sub-tarefas/Metas:** Implementar a expansão de nós para mostrar sub-tarefas e a exibição de informações sobre as metas.

## 3. Gerenciamento de Tarefas (CRUD) e Sub-tarefas

### 3.1. Requisitos

* **Criação de Tarefas:** O usuário deve ser capaz de criar novas tarefas, definindo título, descrição, data de vencimento e nível de dificuldade.
* **Edição de Tarefas:** O usuário deve ser capaz de modificar os detalhes de tarefas existentes.
* **Exclusão de Tarefas:** O usuário deve ser capaz de remover tarefas.
* **Marcação de Conclusão:** O usuário deve ser capaz de marcar tarefas como concluídas.
* **Sub-tarefas:** Cada tarefa principal pode ter uma ou mais sub-tarefas associadas, permitindo a quebra de grandes objetivos em etapas menores.
* **Hierarquia:** As sub-tarefas devem ser vinculadas à sua tarefa principal e seu status de conclusão pode influenciar o status da tarefa principal.

### 3.2. Plano de Implementação

* **Backend (PHP):**
  * **Banco de Dados:**
    * Tabela `tasks`: `id`, `user_id`, `title`, `description`, `due_date`, `difficulty_level` (e.g., 'easy', 'medium', 'hard'), `status` (e.g., 'pending', 'completed', 'overdue'), `parent_task_id` (NULL para tarefas principais, ID da tarefa pai para sub-tarefas).
  * **Lógica:**
    * Endpoints para criar, ler, atualizar e deletar tarefas e sub-tarefas.
    * Validação de dados de entrada para garantir a integridade das tarefas.
    * Lógica para gerenciar o status de conclusão de tarefas e sub-tarefas.
* **Frontend (JavaScript Vanilla, Tailwind CSS):**
  * **Formulários:** Interfaces para criação e edição de tarefas, incluindo campos para sub-tarefas.
  * **Listagem:** Exibição de tarefas e sub-tarefas, com indicadores de status e opções de edição/exclusão/conclusão.
  * **Interação:** Lógica JavaScript para enviar requisições CRUD ao backend e atualizar a interface dinamicamente.

## 4. Mecanismo de Recompensa (XP e Ouro)

### 4.1. Requisitos

* **Recompensa por Conclusão:** Ao concluir uma tarefa (e suas sub-tarefas, se houver), o usuário receberá pontos de experiência (XP) e "Ouro".
* **Escalonamento por Dificuldade:** A quantidade de XP e Ouro concedida será escalonada com base no nível de dificuldade da tarefa (ex: tarefas "fáceis" dão menos, "difíceis" dão mais).
* **Progressão de Nível:** O acúmulo de XP levará à progressão de nível do personagem do usuário, desbloqueando novas recompensas ou funcionalidades (além do Ouro).

### 4.2. Plano de Implementação

* **Backend (PHP):**
  * **Lógica de Recompensa:**
    * Função para calcular XP e Ouro com base na dificuldade da tarefa concluída.
    * Atualizar `user_xp` e `gold_amount` na tabela `users`.
    * Lógica para verificar se o usuário atingiu um novo nível e aplicar as recompensas de nível.
  * **Banco de Dados:**
    * Atualizar tabela `users` para incluir `xp_amount` e `level`.
    * Tabela `difficulty_rewards`: `difficulty_level`, `xp_reward`, `gold_reward`.
* **Frontend (JavaScript Vanilla, Tailwind CSS):**
  * **Feedback Visual:** Exibir notificações ou animações de ganho de XP e Ouro ao concluir tarefas.
  * **Barra de Progresso:** Exibir a barra de XP e o nível atual do personagem.
  * **Notificação de Nível:** Notificar o usuário quando ele subir de nível.

## 5. Política de Penalidades por Não Cumprimento de Prazos

### 5.1. Requisitos

* **Detecção de Atraso:** O sistema deve identificar automaticamente tarefas que não foram concluídas até a data de vencimento.
* **Penalidade:** Tarefas atrasadas resultarão em uma penalidade para o usuário, que pode ser a perda de uma pequena quantidade de XP ou Ouro.
* **Notificação:** O usuário deve ser notificado sobre tarefas atrasadas e as penalidades aplicadas.

### 5.2. Plano de Implementação

* **Backend (PHP):**
  * **Lógica de Verificação:** Um script ou cron job (ou uma verificação no login/acesso ao painel) para identificar tarefas com `due_date` passada e `status` diferente de 'completed'.
  * **Aplicação de Penalidade:** Função para deduzir XP ou Ouro do usuário com base em regras predefinidas (ex: porcentagem do XP/Ouro da tarefa, valor fixo).
  * **Registro:** Registrar penalidades aplicadas em uma tabela de histórico de transações.
* **Frontend (JavaScript Vanilla, Tailwind CSS):**
  * **Alerta Visual:** Destacar tarefas atrasadas na interface (ex: cor vermelha).
  * **Notificação:** Exibir mensagens de alerta sobre penalidades aplicadas.

## 6. Envio de Notificações

### 6.1. Requisitos

* **Tipos de Notificação:** O sistema deve ser capaz de enviar notificações para eventos importantes, como:
  * Tarefa concluída (com ganho de XP/Ouro).
  * Subida de nível.
  * Tarefa atrasada (com penalidade).
  * Novos itens disponíveis na loja (futuro).
  * Lembretes de tarefas próximas ao vencimento.
* **Visualização:** As notificações devem ser exibidas de forma clara e acessível ao usuário.

### 6.2. Plano de Implementação

* **Backend (PHP):**
  * **Banco de Dados:** Tabela `notifications`: `id`, `user_id`, `type` (e.g., 'xp_gain', 'level_up', 'overdue_task'), `message`, `is_read` (boolean), `created_at`.
  * **Lógica:**
    * Funções para criar e armazenar notificações no banco de dados para os eventos relevantes.
    * Endpoints para buscar notificações não lidas de um usuário.
    * Endpoint para marcar notificações como lidas.
* **Frontend (JavaScript Vanilla, Tailwind CSS):**
  * **Componente de Notificação:** Um ícone ou área na interface do usuário que exibe o número de notificações não lidas.
  * **Lista de Notificações:** Um modal ou painel lateral para exibir a lista de notificações.
  * **Atualização em Tempo Real (Opcional para MVP):** Para um MVP, a atualização pode ser feita por polling (verificação periódica). Para um sistema mais avançado, poderia ser considerado WebSockets (mas isso pode exceder o escopo do TCC).
  * **Interação:** Lógica JavaScript para exibir notificações, marcá-las como lidas e navegar para a funcionalidade relacionada (ex: clicar em "Tarefa atrasada" leva para a tarefa).
