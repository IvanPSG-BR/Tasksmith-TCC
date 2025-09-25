<head>
    <?php $assets = "src/assets";?>
    <link rel="stylesheet" href=<?= $assets . "/css/pages/login.css"?>>
</head>

<form action="/login" method="post" id="login">
    <div>
        <div id="campos">
            <div class="campo-form">
                <label for="username">Usuário:</label>
                <input type="text" name="username" id="username">
            </div>
            <div class="campo-form">
                <label for="password">Senha:</label>
                <input type="text" name="password" id="password">
            </div>            
        </div>
        <div class="btn-form">
            <button type="submit">CARREGAR JOGO</button>
        </div>        
    </div>
</form>
