<?php
    include "app/view/settings/cabecalho.php";
?>

<header class="header">
    <h1>Edição de usuários</h1>
</header>

<main class="main">
    <div class="main-info">
        <form action="/helpDesk/usuarios/editar" method="POST">
            <input type="hidden" name="id" value="<?= $usuario['id_usuario'] ?>">
            <div class="nome">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" value="<?= $usuario['nome'] ?>">
            </div>
            <div class="login">
                <label for="login">Login</label>
                <input type="text" name="login" id="login" value="<?= $usuario['login'] ?>">
            </div>
            <div class="email">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" value="<?= $usuario['email'] ?>">
            </div>

            <!-- se nivel for igual a administrador permite colocar um usuário como adm -->
            <?php
                if ($usuario['nivel'] == 1): ?>
                    <div class="administrador">
                        <label for="administrador">Administrador</label>
                        <input type="checkbox" name="administrador" id="administrador" <?= $usuario['nivel'] == 1 ? 'checked' : '' ?> value="1">
                    </div>      
            <?php endif; ?>
            <!-- Fim verificação -->
            
            <div class="botao">
                <button class="submit" type="submit">Atualizar</button>
            </div>
        </form>
    </div>
</main>

<?php
    include "app/view/settings/rodape.php";
?>