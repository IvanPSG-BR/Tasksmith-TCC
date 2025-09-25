<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <?php $assets = "src/assets";?>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Agendador de Tarefas gamificado no estilo RPG Medieval">

        <link href="https://fonts.googleapis.com/css2?family=IM+Fell+English:ital@0;1&family=MedievalSharp&family=New+Rocker&family=Pirata+One&display=swap" rel="stylesheet">
        <link rel="stylesheet" href=<?= "{$assets}/css/style.css"?>>
        <link rel="stylesheet" href=<?= "{$assets}/css/pages/home.css"?>>
        <link rel="stylesheet" href=<?= $assets . "/css/pages/login.css"?>>

        <title>Tasksmith - Forje suas Tarefas!</title>
        <link rel="icon" href=<?= "{$assets}/../favicon.ico"?>>
    </head>

    <body>
        <header id="hdr">
            <nav class="nav justify-between">
                <ul id="app_name">
                    <li><img src=<?= "{$assets}/images/icons/notepad.webp"?> alt="notepad" id="notepad_icon"></li>
                    <li><a href="" id="app_name_text" class="text-xl sm:text-2xl md:text-4xl">TaskSmith</a></li>
                    <li><button class="no-bg-btn" id="anvil_btn"><img src=<?= "{$assets}/images/icons/anvil.webp"?> alt="anvil" id="anvil_icon"></button></li>
                </ul>

                <ul id="logo">
                    <li><img src=<?= "{$assets}/images/logomark.png"?> alt="tasksmith logomark" id="logomark"></li>
                </ul>

                <ul id="auth">
                    <li><a href="/login"><button class="no-bg-btn text-base sm:text-xl md:text-2xl" id="login_btn">Entrar</button></a></li>
                </ul>
            </nav>
        </header>

        <main>
            <section id="cta">
                <div>
                    <span id="cta_title" class="text-base sm:text-xl md:text-2xl"><h1>"Enquanto há vida, Há esperança"</h1></span>
                    <span id="cta_text">
                        <p class="text-xs sm:text-base md:text-lg">
                            Você recebeu uma nova chance para mudar sua vida. Agora, com tempo, sabedoria e Hammilton ao seu lado, é hora de transformar metas em missões — e tarefas em conquistas.
                        </p>
                    </span>
                    <span id="cta_btn"><a href="/signup"><button class="text-base sm:text-xl md:text-2xl">Começar Jornada</button></a></span>
                </div>
            </section>
            <div class="section-transition img-to-paper"></div>

            <section id="lore">

            </section>

            <section id="slideshow">

            </section>

            <section id="features">

            </section>

            <section id="faq">

            </section>

            <section id="community">

            </section>
        </main>

        <footer id="ftr">
            <div>Linha</div>
            <nav>
                <ul class="nav justify-center">
                    <li>
                        <p>Conteúdo</p>
                        <p>Do</p>
                        <p>Footer</p>
                    </li>

                    <li>
                        <p>Mais</p>
                        <p>Conteúdo</p>
                        <p>Do Footer</p>
                    </li>

                    <li>
                        <p>Ainda mais</p>
                        <p>Conteúdo</p>
                        <p>Do Footer</p>
                    </li>
                </ul>
            </nav>
            <div>Linha</div>

            <p>Todos os direitos reservados</p>            
        </footer>

        <script src=<?= "{$assets}/js/main.js"?>></script>
    </body>
</html>
