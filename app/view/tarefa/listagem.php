<?php
    include "app/view/settings/cabecalho.php";
?>

<header class="header">
    <h1>Listagem de tarefas</h1>
</header>
<main>
    <table>
        <tr>
            <th>#</th>
            <th>Titulo</th>
            <th>Descrição</th>
            <th>Data criação</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
            <?php foreach ($tarefas as $tarefa) : 
                if ($tarefa['status'] === "em andamento"){
                    $class = "andamento";
                } elseif($tarefa['status'] === "em aberto") {
                    $class = "aberto";
                } else {
                    $class = "finalizado";
                }
            ?>

            <tr class="<?= $class; ?>">
                <td><?= $tarefa['id_tarefa'] ?></td>
                <td><?= $tarefa['titulo'] ?></td>
                <td><?= $tarefa['descricao'] ?></td>
                <td><?= $tarefa['data_criacao_formatada'] ?></td>
                <td><?= $tarefa['status'] ?></td>
                <td class="acoes">
                    <a class="editar" href="/helpDesk/tarefa/telaEditarTarefa?id=<?= $tarefa['id_tarefa'] ?>">Editar</a>
                    <a class="deletar" href="/helpDesk/tarefa/deletarTarefa?id=<?= $tarefa['id_tarefa'] ?>">Deletar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</main>

<?php
    include "app/view/settings/rodape.php";
?>