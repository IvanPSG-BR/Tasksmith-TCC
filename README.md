
# Tasksmith

![Logomarca Tasksmith](https://github.com/IvanPSG-BR/Tasksmith/blob/main/public/assets/images/logomarca.jpg)


## *Você foi um grande artesão. Criava maravilhas, moldava sonhos... mas desperdiçou tempo como quem deixa areia escorrer por entre os dedos.*

"Agora, a vida te deu uma nova chance. Com a sabedoria do passado, você renasce como o arquiteto do próprio destino.
Organizar. Planejar. Forjar.

Ao seu lado?  Seu velho martelo, agora falante e auto intitulado Hammilton, teimoso e determinado a te ajudar a não ferrar tudo de novo.

Está pronto para forjar sua nova jornada?"

## Descrição do Projeto
Tasksmith é uma To‑do List gamificada com temática RPG medieval, onde você assume o papel de um artesão renascido e forja seu próprio destino organizando tarefas e metas. Cada ação do dia a dia vira uma “missão” com recompensas e desafios, e seu ajudante tagarela, Hammilton (seu antigo martelo), não vai deixar você sossegar até cumprir cada objetivo.

### Principais funcionalidades

- **Gestão de Tarefas:** criar, editar e remover tarefas com níveis de prioridade.

- **Sistema de XP & Níveis:** conclua tarefas para ganhar experiência e subir de nível.

- **Recompensas & Penalidades:** diferentes ganhos (ouro, itens, XP extra) conforme a dificuldade; penalidades caso o prazo expire.

- **Customização de Personagem:** escolha entre classes (Guerreiro, Mago, Bardo), personalize aparência com cosméticos e adote pets obtidos em batalhas.

- **Jogo Idle Integrado:** enfrente monstros automaticamente para ganhar dinheiro e itens.

- **Árvore de Habilidades:** desbloqueie talentos que melhoram bônus de XP, reduzem penalidades ou aumentam ganhos em combate.

- **Notificações Temáticas:** mensagens de motivação (ou provocação) enviadas por Hammilton.

- **Plataforma Online (ainda incerto):** compare streaks com outros jogadores, visite perfis e, no futuro, organize tarefas em grupo.

## Sobre o Desenvolvimento

### MVP para TCC
Este projeto está sendo desenvolvido como Trabalho de Conclusão de Curso (TCC), com foco na entrega de um MVP (Produto Mínimo Viável) funcional. Para esta fase inicial, optei por:

- **Estrutura Simplificada:** Arquitetura mais direta e sem frameworks complexos para facilitar o desenvolvimento e a avaliação acadêmica.
- **Tecnologias Básicas:** PHP puro, JavaScript vanilla e Tailwind CSS para estilização, priorizando a funcionalidade sobre complexidade técnica.
- **Monolito:** Backend e frontend no mesmo repositório para simplificar a implantação e demonstração.

### Planos Futuros
Após a conclusão do TCC, pretendo continuar o desenvolvimento com:

- **Separação de API e Frontend:** Criação de repositórios distintos para backend e frontend.
- **Adoção de Frameworks:** Implementação de frameworks modernos para escalabilidade.
- **Expansão de Funcionalidades:** Desenvolvimento das características avançadas mencionadas acima.

## Estrutura do Projeto

```
Tasksmith-TCC/
├── src/                  # Código PHP da aplicação
│   ├── controllers/      # Controladores
│   ├── models/           # Modelos
│   ├── services/         # Serviços
│   └── Router.php        # Roteador da aplicação
├── public/               # Arquivos acessíveis publicamente
│   ├── assets/           # Recursos estáticos
│   │   ├── css/          # Arquivos CSS
│   │   │   ├── input.css # Arquivo de entrada do Tailwind
│   │   │   └── style.css # CSS compilado pelo Tailwind
│   │   ├── js/           # JavaScript puro
│   │   └── images/       # Imagens
│   ├── favicon.ico       # Ícone do site
│   └── index.php         # Ponto de entrada principal
├── config/               # Configurações
│   ├── routes.php        # Definição de rotas
│   └── settings.php      # Configurações gerais
├── database/             # Arquivos relacionados ao banco de dados
├── templates/            # Templates/views PHP
│   ├── auth/             # Templates de autenticação
│   ├── game/             # Templates do jogo
│   └── info/             # Templates informativos
├── vendor/               # Dependências do Composer
├── .htaccess             # Configuração do Apache
├── api.php               # Ponto de entrada da API
├── composer.json         # Configuração do Composer
├── package.json          # Configuração do NPM (para Tailwind)
└── tailwind.config.js    # Configuração do Tailwind CSS
```

## Instalação

1. Clone o repositório:
   ```bash
   git clone https://github.com/IvanPSG-BR/Tasksmith.git
   cd Tasksmith
   ```

2. Instale as dependências do PHP:
   ```bash
   composer install
   ```

3. Instale as dependências do Tailwind CSS:
   ```bash
   npm install
   ```

4. Compile os estilos CSS:
   ```bash
   npm run tailwind
   ```

5. Configure seu servidor web (Apache/XAMPP) para apontar para o diretório do projeto.

6. Acesse o projeto em seu navegador:
   ```
   http://localhost/Tasksmith-TCC/
   ```
