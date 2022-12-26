<?php

class principalController{

    private $principalModel;

    public function home(){
        $emAberto = $this->situacaoAberto();
        $emAndamento = $this->situacaoAndamento();
        $finalizado = $this->situacaoFinalizada();
        include 'app/view/areaRestrita.php';
    }

    //construtor da classe Tarefas que instancia a classe TarefasModel
    public function __construct(){
        $this->principalModel = new principalModel();
    }

    //Todos situacoes em finalizada
    public function situacaoFinalizada(){
        return $this->principalModel->pesquisaFinalizada();
    }

    //todas as situacoes em aberto
    public function situacaoAberto(){
        return $this->principalModel->pesquisaAberto();
    }

    //todas as situacoes em andamento
    public function situacaoAndamento(){
        return $this->principalModel->pesquisaAndamento();
    }

    //evento do botão para ir para em aberto
    public function colocarSituacaoEmAberto(){
        $id = $_GET['id_tarefa'];
        $this->principalModel->colocaSituacaoAberto($id);
        $this->situacaoAberto();
        $this->home();
    }

    //evento do botão para ir para em andamento
    public function colocarSituacaoEmAndamento(){
        $id = $_GET['id_tarefa'];
        $this->principalModel->colocaSituacaoAndamento($id);
        $this->situacaoAndamento();
        $this->home();
    }

    //evento do botão para ir para em finalizado
    public function colocarSituacaoEmFinalizado(){
        $id = $_GET['id_tarefa'];
        $this->principalModel->colocaSituacaoFechado($id);
        $this->situacaoFinalizada();
        $this->home();
    }
}