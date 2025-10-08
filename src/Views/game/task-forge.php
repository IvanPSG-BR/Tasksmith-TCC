<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php $assets = WEBROOT . "src/assets";?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasksmith - Taskforge</title>

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
            <div id="user">
                <img src=<?= "{$assets}/images/logomark.png"?> alt="tasksmith logomark" id="logomark">
            </div>
            <div id="user_menu">
                <button>
                    <i class="fa-regular fa-circle-user"></i>
                </button>
            </div>
        </nav>
    </header>
    <main id="task-forge">
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
                    <button>Em Breve...</button>
                </div>
                <div class="page">
                    <button>Em Breve...</button>
                </div>
                <div class="page">
                    <button>Em Breve...</button>
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
                <form action="/game/task-forge" method="post">
                    <div>
                        <div class="main-data task-name">
                            <input type="text" name="task_name" id="task_name" placeholder="Título da Missão" required>
                            <button type="submit">Forjar</button>
                        </div>
                        <div class="main-data task-description">
                            <textarea type="text" name="task_description" id="task_description" placeholder="Descrição..." cols=55 rows=10></textarea>
                        </div>
                    </div>
                    <div>
                        <div class="secondary-data task-difficulty">
                            <script>
                                function setTaskDifficulty(difficulty) {
                                    document.getElementById('task_difficulty').value = difficulty;
                                    switch (difficulty) {
                                        case 1:
                                            document.getElementById('easy').classList.add('text-red-900');
                                            document.getElementById('medium').classList.remove('text-red-900');
                                            document.getElementById('hard').classList.remove('text-red-900');
                                            break;
                                        case 2:
                                            document.getElementById('easy').classList.add('text-red-900');
                                            document.getElementById('medium').classList.add('text-red-900');
                                            document.getElementById('hard').classList.remove('text-red-900');
                                            break;
                                        case 3:
                                            document.getElementById('easy').classList.add('text-red-900');
                                            document.getElementById('medium').classList.add('text-red-900');
                                            document.getElementById('hard').classList.add('text-red-900');
                                            break;
                                    
                                        default:
                                            break;
                                    }
                                }
                            </script>

                            <h3>Dificuldade</h3>
                            <div id="difficulty_btns">
                                <input type="hidden" name="task_difficulty" id="task_difficulty" required>

                                <button type="button" onclick="setTaskDifficulty(1)">
                                    <i class="fa-regular fa-star" id="easy"></i>
                                </button>
                                <button type="button" onclick="setTaskDifficulty(2)">
                                    <i class="fa-regular fa-star" id="medium"></i>
                                </button>
                                <button type="button" onclick="setTaskDifficulty(3)">
                                    <i class="fa-regular fa-star" id="hard"></i>
                                </button>
                            </div>
                        </div>
                        <div class="secondary-data timeout">
                            <h3>Prazo</h3>
                            <input type="date" name="task_timeout" id="task_timeout" required>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>
