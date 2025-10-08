<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php $assets = WEBROOT . "src/assets";?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasksmith - Taskboard</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href=<?=$assets . "/css/style.css"?>>
    <link rel="stylesheet" href=<?=$assets . "/css/pages/control-panel.css"?>>
</head>
<body>
    <header>
        <nav>
            <div id="app_name">
                <img src=<?= "{$assets}/images/icons/notepad.webp"?> alt="notepad" id="notepad_icon">
                <h1><a href="/" id="app_name_text" class="text-xl sm:text-2xl md:text-4xl">TaskSmith</a></h1>
                <button class="no-bg-btn" id="anvil_btn"><img src=<?= "{$assets}/images/icons/anvil.webp"?> alt="anvil" id="anvil_icon"></button>
            </div>
            <div id="logo">
                <img src=<?= "{$assets}/images/logomark.png"?> alt="tasksmith logomark" id="logomark">
            </div>
            <div id="user_menu">
                <button>
                    <i class="fa-regular fa-circle-user"></i>
                </button>
            </div>
        </nav>
    </header>
    <main id="task-board">
        <aside>
            <div id="hamburguer">
                <button>
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
            <div id="pages">
                <div class="page">
                    <a href="/game/task-forge"><button>Forja</button></a>
                </div>
                <div class="page">
                    <a href="/game/task-board"><button>Quadro de Missões</button></a>
                </div>
                <div class="page">
                    <button disabled>Em Breve...</button>
                </div>
                <div class="page">
                    <button disabled>Em Breve...</button>
                </div>
                <div class="page">
                    <button disabled>Em Breve...</button>
                </div>
            </div>
            <div id="footer">
                <p>Todos os direitos reservados © 2025</p>
                <p>Ivan Pedro - Kassiane de Oliveira - Samuel - Sarah Helena</p>
            </div>
        </aside>
        <div id="container">
            <div id="info">
                <div class="character">
                    <h2>Nome do Personagem</h2>
                    <img src=<?=$assets . "/images/character-1.png"?> alt="">
                </div>
                <div class="stats">
                    <div class="hp">
                        <i class="fa-solid fa-heart"></i>
                        <i class="fa-solid fa-heart"></i>
                        <i class="fa-solid fa-heart"></i>
                    </div>
                    <div class="xp">
                        <progress value="0" max="100">0%</progress>
                    </div>
                    <div class="gold">
                        <i class="fa-solid fa-coins"></i>
                    </div>
                </div>
            </div>

            <div>
                <div class="tasks-status">
                    <div><h3>A Fazer</h3></div>
                    <button type="button"> <!-- TODO: para cada tarefa no banco, pegar dados referentes às tarefas A FAZER -->
                        <div class="to-do">
                            <div class="left_arrow"><i class="fa-regular fa-circle-left"></i></div>

                            <div class="task-content">
                                <h4>placeholder</h4>
                                <button><i class="fa-solid fa-pen-to-square"></i></button>
                                <button><i class="fa-solid fa-trash-can"></i></button>
                            </div>

                            <div class="right_arrow"><i class="fa-regular fa-circle-right"></i></div>
                        </div>
                    </button>
                </div>

                <div class="tasks-status">
                    <div><h3>Em Progresso</h3></div>
                    <div class="in-progress">
                        <button type="button"> <!-- TODO: para cada tarefa no banco, pegar dados referentes às tarefas EM PROGRESSO -->
                            <div class="left_arrow"><i class="fa-regular fa-circle-left"></i></div>

                            <div class="task-content">
                                <h4>placeholder</h4> 
                                <button><i class="fa-solid fa-pen-to-square"></i></button>
                                <button><i class="fa-solid fa-trash-can"></i></button>
                            </div>

                            <div class="right_arrow"><i class="fa-regular fa-circle-right"></i></div>
                        </button>
                    </div>
                </div>

                <div class="tasks-status">
                    <button type="button"> <!-- TODO: para cada tarefa no banco, pegar dados referentes às tarefas EM PROGRESSO -->
                        <div><h3>Finalizado</h3></div>
                        <div class="done">
                            <h4>placeholder</h4>
                            <i class="fa-solid fa-check"></i>
                            <button><i class="fa-solid fa-trash-can"></i></button>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </main>
</body>
</html>