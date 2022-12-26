<?php
    include "app/view/settings/cabecalho.php";
?>
<header class="header">
    <h1>Cadastro de tarefas</h1>
</header>

<main class="main">
    <div class="main-info">
        <form action="/helpDesk/tarefa/cadastrarTarefa" method="POST">
            <div class="titulo">
                <label for="titulo">Titulo</label>
                <input type="text" name="titulo" id="titulo" placeholder="Titulo da tarefa" required>
            </div>
            <div class="descricao">
                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="descricao" cols="30" rows="10" placeholder="Descrição da tarefa" required></textarea>
            </div>

            <div class="botao">
                <button class="submit" type="submit">Cadastrar</button>
                <button class="reset" type="reset">Limpar</button>
                <a href="/helpDesk/tarefa/telaListagemTarefas" type="button" class="visualizarTarefa">Visualizar todas tarefas</a>
                <a href="/helpDesk/areaRestrita" class="menuPrincipal"><< Voltar ao menu</a>
            </div>
        </form>
    </div>
</main>

<footer>

</footer>

<?php
    include "app/view/settings/rodape.php";
?>