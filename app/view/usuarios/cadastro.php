<?php
    include "app/view/settings/cabecalho.php";
?>

<header class="header">
    <h1>Cadastro de usuários</h1>
</header>

<main class="main">
    <div class="main-info">
        <form action="/helpDesk/usuarios/cadastrar" method="POST">
            <div class="nome">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" placeholder="Informe seu nome" required>
            </div>

            <div class="login">
                <label for="login">Login</label>
                <input type="text" name="login" id="login" placeholder="Informe seu login" required>
            </div>

            <div class="email">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" placeholder="Informe seu e-mail" required>
            </div>

            <div class="senha">
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" placeholder="Informe sua senha" required>
            </div>

            <div class="confSenha">
                <label for="confirmar-senha">Confirmar senha</label>
                <input type="password" name="confirmar-senha" id="confirmar-senha" placeholder="Confirme sua senha" required>
            </div>

            <div class="botao">
                <button class="submit" type="submit">Cadastrar</button>
                <button class="reset" type="reset">Limpar</button>
            </div>
        </form>
    </div>
</main>

<footer class="footer">

</footer>

<?php
    include "app/view/settings/rodape.php";
?>