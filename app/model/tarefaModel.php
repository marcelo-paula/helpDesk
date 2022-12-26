<?php

class TarefasModel extends Conexao{

    public function __construct(){
        $this->conexao = $this->conectar();
    }

    public function cadastrarTarefa($dados){
        if (empty($dados['titulo']) || empty($dados['descricao'])) {
            echo "Preencha todos os campos";
            die;
        }

        if (!empty($this->validaTarefaExistente($dados['titulo']))){
            echo "Já existe uma tarefa com este mesmo titulo cadastrada";
            die;
        }else {
            try{
                $sql = "INSERT INTO tarefas (titulo, descricao,data_criacao,id_usuario) VALUES (:titulo, :descricao,now(),{$_SESSION['usuario']['id_usuario']})";
                $stmt = $this->conexao->prepare($sql);
                $stmt->bindValue(':titulo', $dados['titulo']);
                $stmt->bindValue(':descricao', $dados['descricao']);
                $stmt->execute();
            } catch (\PDOException $e) {
                var_dump($e->getMessage());
            }
        }
    }
    
    public function atualizarTarefa($dados){
        try{
            $sql = "UPDATE tarefas SET titulo = :titulo, 
                           descricao = :descricao, 
                           concluida = :concluiu, 
                           data_conclusao = :dataConclusao,
                           status = :status
                    WHERE id_tarefa = :id";

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':titulo', $dados['titulo']);
            $stmt->bindValue(':descricao', $dados['descricao']);
            $stmt->bindValue(':concluiu', $dados['concluiu']);
            if (isset($dados['concluiu']) && $dados['concluiu'] == 1){
                $stmt->bindValue(':dataConclusao', date('Y/m/d H:i:s'));
                $stmt->bindValue(':status', 'finalizado');
            }else {
                $stmt->bindValue(':dataConclusao', null);
                $stmt->bindValue(':status', 'em aberto');
            }
            $stmt->bindValue(':id', $dados['id']);
            $stmt->execute();
        } catch (\PDOException $e) {
            var_dump($e->getMessage());
        }
    }

    public function deletarTarefa($id){
        try {
            $sql = "UPDATE tarefas SET deletado = 1 WHERE id_tarefa = :id";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
        } catch (\PDOException $e) {
            var_dump($e->getMessage());
        }
    }

    public function listar(){
        $query = "SELECT t.*, date_format(data_criacao,'%d/%m/%Y') as data_criacao_formatada FROM tarefas t WHERE deletado = 0";
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //tarefa selecionada para edição
    public function tarefaSelecionadaEdicao($id){
        $query = "SELECT * FROM tarefas WHERE deletado = 0 AND id_tarefa = :id";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function selecionarTarefa($id){
        $query = "SELECT * FROM tarefas WHERE id_tarefa = :id AND deletado = 0";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    private function validaTarefaExistente($titulo){
        $query = "SELECT * FROM tarefas WHERE deletado = 0 AND titulo = :titulo";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':titulo',$titulo);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}