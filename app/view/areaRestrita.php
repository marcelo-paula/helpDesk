<?php
    include "app/view/settings/cabecalho.php";
?>

<header class="header">
    <h1>Olá, seja bem vindo(a) <?php echo $_SESSION['usuario']['nome']; ?></h1>
    <a class="novaTarefa" href="/helpDesk/tarefa/telaCadastroTarefas" type="button"><i class="fa-solid fa-square-plus"></i> Cadastrar nova tarefa</a>
</header>

<main class="conteudoPrincipal">
    <section class="dados">
        <div class="emAberto">
            <h3>Em aberto</h3>
            <hr>
            <?php foreach ($emAberto as $aberto) :?>
                <div class="conteudo">
                    <input name="id" id="id" type="hidden" value="<?php echo $aberto['id_tarefa']; ?>">
                    <p><strong>Titulo : </strong><?= $aberto['titulo']; ?></p>
                    <p><strong>Descrição : </strong><?= $aberto['descricao']; ?></p>
                    <p><strong>Data criação : </strong><?= $aberto['data_criacao']; ?></p>
                    <div class="acao">
                        <a href="/helpDesk/tarefa/colocaSituacaoAndamento?id_tarefa=<?php echo $aberto['id_tarefa']; ?>" class="andamentoOS"><i class="fa-regular fa-circle-check"></i> Em andamento</a>
                        <a href="/helpDesk/tarefa/colocaSituacaoFinalizado?id_tarefa=<?php echo $aberto['id_tarefa']; ?>" class="finalizarOS"><i class="fa-solid fa-ban"></i> Finalizar</a>
                    </div>
                </div>  
            <?php endforeach; ?>
        </div>
        <div class="emAndamento">
            <h3>Em andamento</h3>
            <hr>
            <?php foreach($emAndamento as $andamento): ?>
                <div class="conteudo">
                    <input name="id" id="id" type="hidden" value="<?php echo $andamento['id_tarefa']; ?>">
                    <p><strong>Titulo : </strong><?= $andamento['titulo']; ?></p>
                    <p><strong>Descrição : </strong><?= $andamento['descricao']; ?></p>
                    <p><strong>Data criação : </strong><?= $andamento['data_criacao']; ?></p>
                    <div class="acao">
                        <a href="/helpDesk/tarefa/colocaSituacaoAberto?id_tarefa=<?php echo $andamento['id_tarefa']; ?>" class="abrirOS"><i class="fa-solid fa-rotate-left"></i> Em aberto</a>
                        <a href="/helpDesk/tarefa/colocaSituacaoFinalizado?id_tarefa=<?php echo $andamento['id_tarefa']; ?>" class="finalizarOS"><i class="fa-solid fa-ban"></i> Finalizar</a>
                    </div>
                </div>  
            <?php endforeach; ?>
        </div>
        <div class="encerrado">
            <h3>Finalizado</h3>
            <hr>
            <?php foreach($finalizado as $f): ?>
                <div class="conteudo">
                    <input name="id" id="id" type="hidden" value="<?php echo $f['id_tarefa']; ?>">
                    <p><strong>Titulo : </strong><?= $f['titulo']; ?> </p>
                    <p><strong>Descrição : </strong><?= $f['descricao']; ?></p>
                    <p><strong>Data criação : </strong><?= $f['data_criacao'] ?></p>
                    <div class="acao">
                        <a href="/helpDesk/tarefa/colocaSituacaoAberto?id_tarefa=<?php echo $f['id_tarefa']; ?>" class="abrirOS"><i class="fa-solid fa-rotate-left"></i> Em aberto</a>
                        <a href="/helpDesk/tarefa/colocaSituacaoAndamento?id_tarefa=<?php echo $f['id_tarefa']; ?>" class="andamentoOS"><i class="fa-regular fa-circle-check"></i> Em andamento</a>
                    </div>
                </div> 
            <?php endforeach; ?>
        </div>
    </section>
</main>
<?php
    include "app/view/settings/rodape.php";
?>