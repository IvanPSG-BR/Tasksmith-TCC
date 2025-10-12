<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php
    use App\Models\Task;
    $assets = WEBROOT . "src/assets";

    $tarefas = new Task();
    $tarefas_do_usuario = $tarefas->findFromUser($_SESSION["user_id"]);
    ?>

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
                        <i class="fa-solid fa-heart text-red-700"></i>
                        <i class="fa-solid fa-heart text-red-700"></i>
                        <i class="fa-solid fa-heart text-red-700"></i>
                    </div>
                    <div class="xp">
                        <progress value="0" max="100" class="bg-sky-200">0%</progress>
                    </div>
                    <div class="gold">
                        <i class="fa-solid fa-coins text-yellow-400"></i>
                    </div>
                </div>
            </div>

            <div id="manager">
                <div class="tasks-status">
                    <div class="field"><h3>A Fazer</h3></div>
                    <div class="to-do">
                        <?php
                        foreach ($tarefas_do_usuario as $tarefa):
                        ?>
                        <div class="task">
                            <div class=<?=$tarefa->task_status == "to_do" ? "left_arrow" : "hidden"?>>
                                <button type="button"><i class="fa-regular fa-circle-left"></i></button>
                            </div>

                            <div class="task-content">
                                <div class="always-visible">
                                    <h4><?=$tarefa->task_status == "to_do" ? $tarefa->task_name : ""?></h4> 
                                    <button class=<?=$tarefa->task_status == "to_do" ? "" : "hidden"?>><i class="fa-solid fa-pen-to-square"></i></button>
                                    <button class=<?=$tarefa->task_status == "to_do" ? "" : "hidden"?>><i class="fa-solid fa-trash-can"></i></button>
                                </div>
                                <div class="desc hidden">
                                    <p>
                                        <?=$tarefa->task_description?>
                                    </p>
                                </div>
                            </div>

                            <div class=<?=$tarefa->task_status == "to_do" ? "right_arrow" : "hidden"?>>
                                <button type="button"><i class="fa-regular fa-circle-right"></i></button>
                            </div>
                        </div>
                        <?php
                        endforeach;
                        ?>
                    </div>
                </div>

                <div class="tasks-status">
                    <div class="field"><h3>Em Progresso</h3></div>
                    <div id="in_progress">
                        <?php
                        foreach ($tarefas_do_usuario as $tarefa):
                        ?>
                        <div class="task">
                            <div class=<?=$tarefa->task_status == "in_progress" ? "left_arrow" : "hidden"?>>
                                <button type="button"><i class="fa-regular fa-circle-left"></i></button>
                            </div>

                            <div class="task-content">
                                <div class="always-visible">
                                    <h4><?=$tarefa->task_status == "in_progress" ? $tarefa->task_name : ""?></h4> 
                                    <button class=<?=$tarefa->task_status == "in_progress" ? "" : "hidden"?>><i class="fa-solid fa-pen-to-square"></i></button>
                                    <button class=<?=$tarefa->task_status == "in_progress" ? "" : "hidden"?>><i class="fa-solid fa-trash-can"></i></button>
                                </div>
                                <div class="desc hidden">
                                    <p>
                                        <?=$tarefa->task_description?>
                                    </p>
                                </div>
                            </div>

                            <div class=<?=$tarefa->task_status == "in_progress" ? "right_arrow" : "hidden"?>>
                                <button type="button"><i class="fa-regular fa-circle-right"></i></button>
                            </div>
                        </div>
                        <?php
                        endforeach;
                        ?>
                    </div>
                </div>

                <div class="tasks-status">
                    <div class="field"><h3>Finalizado</h3></div>
                    <div class="done">
                        <?php
                        foreach ($tarefas_do_usuario as $tarefa):
                        ?>
                        <div class=<?=$tarefa->task_status == "finished" ? "task" : "hidden"?>>
                            <div class="task-content">
                                <div class="always-visible">
                                    <h4><?=$tarefa->task_status == "finished" ? $tarefa->task_name : ""?></h4>
                                    <i class="fa-solid fa-check"></i>
                                    <button><i class="fa-solid fa-trash-can"></i></button>
                                </div>
                                <div class="desc hidden">
                                    <p>
                                        <?=$tarefa->task_description?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php
                        endforeach;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>