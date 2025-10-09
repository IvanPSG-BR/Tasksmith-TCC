<!DOCTYPE html>
<html lang="en">
<head>
    <?php $assets = "src/assets";?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasksmith - Login</title>

    <link rel="stylesheet" href=<?=$assets . "/css/style.css"?>>
    <link rel="stylesheet" href=<?=$assets . "/css/pages/signup.css"?>>
</head>
<body>
    <div id="container" class="flex">
        <form action="/signup" method="post">
            <div id="pag_esq">
                <div class="campo-form flex flex-col">
                    <label for="username">Usuário:</label>
                    <input type="text" name="username" id="username">
                </div>
                <div class="campo-form flex flex-col">
                    <label for="password">Senha:</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="campo-form flex flex-col">
                    <label for="pass_confirm">Confirme a Senha:</label>
                    <input type="password" name="pass_confirm" id="pass_confirm">
                </div>
                <div class="campo-form flex flex-col">
                    <label for="character_name">Nome do Personagem:</label>
                    <input type="text" name="character_name" id="character_name">
                </div>
            </div>
            <div id="pag_dir">
                <div class="btn-form">
                    <button type="submit">NOVO JOGO</button>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
