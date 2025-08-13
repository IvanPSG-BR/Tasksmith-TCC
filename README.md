# Tasksmith

<div align="center">
  <img src="https://github.com/IvanPSG-BR/Tasksmith-TCC/raw/main/public/assets/images/logomark.png" alt="Logomarca Tasksmith" width="150"/>
  <p><strong>Forje seu destino, uma tarefa de cada vez.</strong></p>
  <p>
    <img src="https://img.shields.io/badge/PHP-8.2%2B-blue?style=for-the-badge&logo=php" alt="PHP Version">
    <img src="https://img.shields.io/badge/Status-Em%20Desenvolvimento-yellow?style=for-the-badge" alt="Status">
  </p>
</div>

## Tabela de Conteúdos

- [Tasksmith](#tasksmith)
  - [Tabela de Conteúdos](#tabela-de-conteúdos)
  - [Visão Geral](#visão-geral)
  - [O Problema](#o-problema)
  - [A Solução: Tasksmith](#a-solução-tasksmith)
  - [Funcionalidades](#funcionalidades)
    - [Escopo do MVP (TCC)](#escopo-do-mvp-tcc)
    - [Visão de Longo Prazo (Pós-TCC)](#visão-de-longo-prazo-pós-tcc)
  - [Tecnologias Utilizadas](#tecnologias-utilizadas)
  - [Estrutura do Projeto](#estrutura-do-projeto)
  - [Instalação e Configuração](#instalação-e-configuração)
    - [Pré-requisitos](#pré-requisitos)
    - [Passo a Passo](#passo-a-passo)
    - [Configurando o Virtual Host (Apache)](#configurando-o-virtual-host-apache)

---

## Visão Geral

> *Você foi um grande artesão. Criava maravilhas, moldava sonhos... mas desperdiçou tempo como quem deixa areia escorrer por entre os dedos.*
>
> "Agora, a vida te deu uma nova chance. Com a sabedoria do passado, você renasce como o arquiteto do próprio destino. Organizar. Planejar. Forjar. Ao seu lado? Seu velho martelo, agora falante e auto intitulado Hammilton, teimoso e determinado a te ajudar a não ferrar tudo de novo."
>
> **Está pronto para forjar sua nova jornada?**

**Tasksmith** é uma aplicação web que gamifica o gerenciamento de tarefas, transformando a produtividade em uma jornada épica. O objetivo é criar uma experiência onde os usuários se sintam engajados e motivados a completar suas tarefas diárias, que são apresentadas como "missões" em um universo de fantasia.

## O Problema

Muitas pessoas lutam contra a procrastinação e a falta de motivação para realizar suas tarefas diárias. As ferramentas de gerenciamento de tarefas tradicionais são funcionais, mas carecem de elementos que inspirem e engajem o usuário a longo prazo, transformando a produtividade em uma obrigação monótona.

## A Solução: Tasksmith

O Tasksmith aborda esse problema transformando a produtividade em um jogo. Ao aplicar princípios de gamificação, como recompensas, progressão e uma narrativa envolvente, o aplicativo busca:

- **Aumentar a Motivação:** Recompensar os usuários por completarem tarefas lhes dá um incentivo claro e imediato.
- **Reduzir a Procrastinação:** A perspectiva de ganhar experiência (XP) e subir de nível torna o ato de iniciar uma tarefa mais atraente.
- **Criar um Hábito Positivo:** Ao associar a conclusão de tarefas com uma experiência divertida, o Tasksmith ajuda a construir um hábito de produtividade sustentável.

<div align="center">
  <img src="https://github.com/IvanPSG-BR/Tasksmith-TCC/raw/main/public/assets/images/diagrama-projeto-cliente.png" alt="Projeto Solução" width="700"/>
</div>

<div align="center">
  <img src="https://github.com/IvanPSG-BR/Tasksmith-TCC/raw/main/public/assets/images/diagrama-projeto-solucao.png" alt="Projeto Cliente" width="700"/>
</div>

## Funcionalidades

### Escopo do MVP (TCC)

As funcionalidades essenciais desenvolvidas para o Produto Mínimo Viável são:

- **Sistema de Autenticação:** Cadastro e login de usuários.
- **Gestão de Tarefas (Missões):** Criação, edição e exclusão de tarefas.
- **Sistema de Progressão:** Mecanismo de ganho de experiência (XP) e sistema de níveis.
- **Painel de Tarefas:** Interface para visualização e gerenciamento das missões.
- **Interface Temática:** Design e elementos visuais imersos na temática de fantasia medieval.

### Visão de Longo Prazo (Pós-TCC)

- **Sistema de Recompensas Avançado:** Ouro, itens e customizações.
- **Jogo Idle Integrado:** Batalhas automáticas para ganho de recursos.
- **Árvore de Habilidades:** Desbloqueio de talentos para bônus e melhorias.
- **Funcionalidades Sociais:** Comparação de progresso e, futuramente, missões em grupo.

## Tecnologias Utilizadas

- **Backend:** PHP 8.2+
- **Frontend:** HTML5, TailwindCSS, JavaScript (Vanilla)
- **Banco de Dados:** MySQL
- **Servidor:** Apache (via XAMPP/LAMPP)
- **Gerenciador de Dependências:** Composer (PHP), NPM (Node.js)

## Estrutura do Projeto

A estrutura de arquivos do projeto segue o padrão MVC (Model-View-Controller) de forma simplificada.

```
Tasksmith-TCC/
├── config/               # Configurações da aplicação
├── database/             # Conexão e scripts do banco de dados
├── docs/                 # Documentação do projeto
├── public/               # Raiz pública do servidor (ponto de entrada)
│   ├── assets/           # Recursos (CSS, JS, imagens)
│   └── index.php         # Front Controller
├── src/                  # Código-fonte da aplicação
│   ├── Controllers/      # Controladores
│   ├── Db/               # Classes de acesso ao banco (QueryBuilder)
│   ├── Models/           # Modelos de dados (Entidades)
│   ├── Services/         # Lógica de negócios
│   ├── Views/            # Arquivos de apresentação (HTML/PHP)
│   └── Routes.php        # Roteador
├── .env.example          # Exemplo de arquivo de ambiente
├── .gitignore
├── .htaccess             # Regras de reescrita do Apache
├── composer.json
├── package.json
└── tailwind.config.js
```

## Instalação e Configuração

### Pré-requisitos

- PHP 8.2 ou superior
- Composer
- Node.js e NPM
- Servidor Apache (XAMPP, LAMP, etc.)

### Passo a Passo

1. **Clone o repositório:**

    ```bash
    git clone https://github.com/IvanPSG-BR/Tasksmith-TCC.git
    cd Tasksmith-TCC
    ```

2. **Instale as dependências do PHP:**

    ```bash
    composer install
    ```

3. **Instale as dependências do Node.js:**

    ```bash
    npm install
    ```

4. **Compile os estilos do TailwindCSS:**
    - Para desenvolvimento (observa mudanças):

   ```bash
   npm run tailwind
   ```

5. **Configure o banco de dados:**
    - Renomeie `.env.example` para `.env`.
    - O script `database/db_script.php` pode ser executado para criar a estrutura inicial do banco de dados SQLite.

### Configurando o Virtual Host (Apache)

Para uma melhor experiência de desenvolvimento, é recomendado configurar um Virtual Host para que o projeto seja acessado por uma URL amigável (ex: `http://tasksmith-tcc.local`).

1. **Edite o arquivo `hosts` do seu sistema:**
    - **Windows:** `C:\Windows\System32\drivers\etc\hosts`
    - **Linux/macOS:** `/etc/hosts`
    - Adicione a seguinte linha:

      ```
      127.0.0.1 tasksmith-tcc.local
      ```

2. **Edite o arquivo de configuração de Virtual Hosts do Apache:**
    - Geralmente localizado em `path/to/apache/conf/extra/httpd-vhosts.conf`.
    - Adicione o seguinte bloco, ajustando o caminho para o seu projeto:

      ```apache
      <VirtualHost *:80>
          DocumentRoot "/opt/lampp/htdocs/Tasksmith-TCC/"
          ServerName tasksmith-tcc.local
          <Directory "/opt/lampp/htdocs/Tasksmith-TCC/">
              Options Indexes FollowSymLinks
              AllowOverride All
              Require all granted
          </Directory>
      </VirtualHost>
      ```

3. **Reinicie o Apache** para que as alterações tenham efeito.

4. Acesse o projeto em seu navegador através de `http://tasksmith-tcc.local`.
