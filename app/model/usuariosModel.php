<?php

class usuariosModel extends Conexao{

    //cria a conexão com o banco de dados
    public function __construct(){
        $this->conexao = $this->conectar();
    }

    //verifica se o login e senha estão corretos e redireciona para a área restrita
    public function cadastrar(Array $dados){
        if (empty($this->validarLogin($dados['login']))) {
            try{
                $query = "INSERT INTO usuario (nome, login, email, senha, data_cadastro) VALUES (:nome, :login, :email, :senha, NOW())";
                $stmt = $this->conexao->prepare($query);
                $stmt->bindValue(':nome', $dados['nome']);
                $stmt->bindValue(':login', $dados['login']);
                $stmt->bindValue(':email', $dados['email']);
                $stmt->bindValue(':senha', md5($dados['senha']));
                $stmt->execute();
            } catch (\PDOException $e) {
                var_dump($e->getMessage());
            }
        } else {
            echo 'Login já cadastrado';
            die;
        }
    }

    //atualiza os dados do usuário no banco de dados
    public function atualizar(Array $dados){
        try{
            $query = "UPDATE usuario SET nome = :nome, login = :login, email = :email, nivel = :nivel WHERE id_usuario = :id";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(':nome', $dados['nome']);
            $stmt->bindValue(':login', $dados['login']);
            $stmt->bindValue(':email', $dados['email']);
            $stmt->bindValue(':nivel', $dados['administrador']);
            $stmt->bindValue(':id', $dados['id']);
            $stmt->execute();
        } catch (\PDOException $e) {
            var_dump($e->getMessage());
        }
    }

    //deleta o usuário do banco de dados
    public function deletar(){
        if ($this->verificaUsuarioAdm($_GET['id'])) {
            echo 'Não é possível deletar um usuário administrador';
            die;
        }else {
            try{
                $query = "UPDATE usuario SET deletado = 1 WHERE id_usuario = :id";
                $stmt = $this->conexao->prepare($query);
                $stmt->bindValue(':id', $_GET['id']);
                $stmt->execute();
            } catch (\PDOException $e) {
                var_dump($e->getMessage());
            }
        }
    }

    //verifica se o usuário é administrador
    private function verificaUsuarioAdm($id){
        $query = "SELECT * FROM usuario WHERE id_usuario = :id AND nivel = 1";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    //lista todos os usuários cadastrados no banco de dados que não foram deletados
    public function listar(){
        $query = "SELECT * FROM usuario WHERE deletado = 0";
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //valida login para não cadastrar dois logins iguais
    private function validarLogin($login){
        $query = "SELECT * FROM usuario WHERE login = :login AND deletado = 0";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':login', $login);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //verifica se o login e senha estão corretos e redireciona para a área restrita
    public function logado(Array $dados){
        $dados = [
            'login' => $dados['login'],
            'senha' => $dados['senha']
        ];

        $usuario = $this->verificaUsuarioExistente($dados['login'], $dados['senha']);
        if (empty($usuario)) {
            echo 'Usuário não encontrado';
            die;
        } else {
            $_SESSION['usuario'] = $usuario;
            header('Location: /helpDesk/areaRestrita');
        }
    }

    //verifica usuário existente no banco de dados para logar
    private function verificaUsuarioExistente($login, $senha){
        $query = "SELECT * FROM usuario WHERE login = :login AND senha = :senha AND deletado = 0";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':login', $login);
        $stmt->bindValue(':senha', md5($senha));
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //busca usuário pelo id
    public function buscarUsuario($id){
        $query = "SELECT * FROM usuario WHERE id_usuario = :id";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}