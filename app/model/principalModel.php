<?php

class principalModel extends Conexao{

    public function __construct(){
        $this->conexao = $this->conectar();
    }

    //trazer todos os dados de finalizado
    public function pesquisaFinalizada(){
        $query = "select * from tarefas where deletado = 0 and status = 'finalizado'";
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //trazer todos os dados de em aberto
    public function pesquisaAberto(){
        $query = "select * from tarefas where deletado = 0 and status = 'em aberto'";
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //trazer todos os dados de em andamento
    public function pesquisaAndamento(){
        $query = "select * from tarefas where deletado = 0 and status = 'em andamento'";
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //evento para colocar em situacao em aberto
    public function colocaSituacaoAberto($id){
        try {
            $sql = "UPDATE tarefas SET status = 'em aberto' WHERE id_tarefa = :id";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
        } catch (\PDOException $e) {
            var_dump($e->getMessage());
            die;
        }
    }

    //evento para colocar em situacao em andamento
    public function colocaSituacaoAndamento($id){
        try {
            $sql = "UPDATE tarefas SET status = 'em andamento' WHERE id_tarefa = :id";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
        } catch (\PDOException $e) {
            var_dump($e->getMessage());
            die;
        }
    }

    //evento para colocar em situacao de fechado/finalizado
    public function colocaSituacaoFechado($id){
        try {
            $sql = "UPDATE tarefas SET status = 'finalizado' WHERE id_tarefa = :id";
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
        } catch (\PDOException $e) {
            var_dump($e->getMessage());
            die;
        }
    }
}