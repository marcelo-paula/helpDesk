<?php
    include "app/view/settings/cabecalho.php";
?>

<header class="header">
    <h1>Área restrita</h1>
</header>

<main class="main">
    <div class="main-info">
        <form action="/helpDesk/usuarios/login" method="POST">
            <div class="login">
                <label for="login">Login</label>
                <input type="text" name="login" id="login" placeholder="Informe seu login" required>
            </div>

            <div class="senha">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" placeholder="Informe sua senha" required>
            </div>

            <div class="botao">
                <button class="submit" type="submit">Logar</button>
                <a href="/helpDesk/usuarios/cadastro" type="button">Cadastrar-se</a>
            </div>
        </form>
    </div>
</main>

<footer class="footer">

</footer>

<?php
    include "app/view/settings/rodape.php";
?>