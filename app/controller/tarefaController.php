<?php

class Tarefas{

    private $tarefasModel;

    //construtor da classe Tarefas que instancia a classe TarefasModel
    public function __construct(){
        $this->tarefasModel = new TarefasModel();
    }

    //tela de cadastro de tarefas
    public function telaCadastro(){
        include 'app/view/tarefa/cadastro.php';
    }

    //tela de listagem de tarefas
    public function telaListagem(){
        $tarefas = $this->tarefasModel->listar();
        include 'app/view/tarefa/listagem.php';
    }

    public function telaEditarTarefa(){
        $id = $_GET['id'];
        $tarefas = $this->tarefasModel->tarefaSelecionadaEdicao($id);
        include 'app/view/tarefa/editar.php';
    }

    //cadastrar tarefa no banco de dados
    public function cadastrarTarefa(){
        $dados = [
            'titulo' => $_POST['titulo'],
            'descricao' => $_POST['descricao']
        ];

        if (empty($dados['titulo']) || empty($dados['descricao'])) {
            echo "Preencha todos os campos";
            die;
        }else {
            $this->tarefasModel->cadastrarTarefa($dados);
        }
        $this->telaCadastro();
    }

    //atualizar tarefas do banco de dados
    public function atualizarTarefa(){

        if (isset($_POST['concluida']) && $_POST['concluida'] == "Sim"){
            $concluida = 1; //concluiu
        }else {
            $concluida = 0; //não concluiu
        }

        $dados = [
            'id' => $_POST['id'],
            'titulo' => $_POST['titulo'],
            'descricao' => $_POST['descricao'],
            'concluiu' => $concluida
        ];

        if (empty($dados['titulo']) || empty($dados['descricao'])) {
            echo "Preencha todos os campos";
            die;
        }else {
            $this->tarefasModel->atualizarTarefa($dados);
            header("Location: ".BASE_URL."tarefa/telaListagemTarefas");
        }
    }

    //deletar tarefas do banco de dados
    public function deletarTarefa(){
        $id = $_GET['id'];
        $this->tarefasModel->deletarTarefa($id);
        $this->telaListagem();
    }
}