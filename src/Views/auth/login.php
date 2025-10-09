<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php $assets = "src/assets";?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasksmith - Login</title>

    <link rel="stylesheet" href=<?=$assets . "/css/style.css"?>>
    <link rel="stylesheet" href=<?= $assets . "/css/pages/login.css"?>>
</head>
<body>
    <form action="/login" method="post" id="login">
        <div>
            <div id="campos">
                <div class="campo-form">
                    <label for="username">Usuário:</label>
                    <input type="text" name="username" id="username">
                </div>
                <div class="campo-form">
                    <label for="password">Senha:</label>
                    <input type="password" name="password" id="password">
                </div>            
            </div>
            <div class="btn-form">
                <button type="submit">CARREGAR JOGO</button>
            </div>        
        </div>
    </form>
</body>
</html>