<?php
    include "app/view/settings/cabecalho.php";
?>

<table>
    <tr>
        <th>#</th>
        <th>Nome</th>
        <th>Login</th>
        <th>E-mail</th>
        <th>Editar</th>
        <th>Deletar</th>
    </tr>
    <?php
        foreach ($usuarios as $u) {
            ?>
                <tr>
                    <td><?= $u['id_usuario'] ?></td>
                    <td><?= $u['nome'] ?></td>
                    <td><?= $u['login'] ?></td>
                    <td><?= $u['email'] ?></td>
                    <td><a href="/helpDesk/usuarios/telaEditar?id=<?= $u['id_usuario'] ?>">Editar</a></td>
                    <td><a href="/helpDesk/usuarios/deletar?id=<?= $u['id_usuario'] ?>">Deletar</a></td>
                </tr>
            <?php
        }
    ?>
</table>

<?php
    include "app/view/settings/rodape.php";
?>