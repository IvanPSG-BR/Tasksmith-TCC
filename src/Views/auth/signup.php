<!DOCTYPE html>
<html lang="en">
<head>
    <?php $assets = "src/assets";?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasksmith - Login</title>

    <link rel="stylesheet" href=<?=$assets . "/css/style.css"?>>
    <link rel="stylesheet" href=<?=$assets . "/css/pages/signup.css"?>>
    <link rel="stylesheet" href=<?=$assets . "/css/pages/login.css"?>>
</head>
<body>
    <div id="container" class="flex">
        <form action="/signup" method="post">
            <div id="pag_esq">
                <div class="campo-form">
                    <label for="username">Usuário:</label>
                    <input type="text" name="username" id="username">
                </div>
                <div class="campo-form">
                    <label for="password">Senha:</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="campo-form flex-column">
                    <label for="pass_confirm">Confirme a Senha:</label>
                    <input type="password" name="pass_confirm" id="pass_confirm">
                </div>
            </div>
            <div id="pag_dir">
                <div class="btn-form">
                    <button type="submit">NOVO JOGO</button>
                </div>
            </div>
        </form>
        
        <!--<?php include ROOT_PATH . "src/Views/auth/login.php"?>-->
        
    </div>
</body>
</html>
