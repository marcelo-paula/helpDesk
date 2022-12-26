<?php
    include "app/view/settings/cabecalho.php";
?>
<header class="header">
    <h1>Edição de tarefas</h1>
</header>

<main class="main">
    <div class="main-info">
        <form action="/helpDesk/tarefa/editarTarefa" method="POST">
            <input type="hidden" name="id" value="<?php echo $tarefas['id_tarefa'] ?>">
            <div class="titulo">
                <label for="titulo">Titulo</label>
                <input type="text" name="titulo" id="titulo" placeholder="Titulo da tarefa" required value="<?php echo $tarefas['titulo'] ?>">
            </div>
            <div class="descricao">
                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="descricao" cols="30" rows="10" placeholder="Descrição da tarefa" required><?php echo $tarefas['descricao'] ?></textarea>
            </div>
            <div class="concluida">
                <label for="concluida">Concluiu tarefa?</label>
                <?php if($tarefas['concluida'] == 0): ?>
                    <input type='checkbox' name='concluida' id='concluida' value='Sim'>
                <?php else: ?>
                    <input type='checkbox' name='concluida' id='concluida' value='Sim' checked>
                <?php endif; ?>
            </div>

            <div class="botao">
                <button class="submit" type="submit">Gravar</button>
                <button class="reset" type="reset">Limpar</button>
                <a href="/helpDesk/tarefa/telaListagemTarefas" type="button" class="visualizarTarefa">Visualizar todas tarefas</a>
            </div>
        </form>
    </div>
</main>

<footer>

</footer>

<?php
    include "app/view/settings/rodape.php";
?>