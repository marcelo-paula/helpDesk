<?php

class Usuarios{

        private $usuarioModel;

        public function __construct(){
            $this->usuarioModel = new usuariosModel();
        }

        public function cadastro(){
            include 'app/view/usuarios/cadastro.php';
        }
    
        public function lista(){
            include 'app/view/usuarios/listagem.php';
        }

        public function login(){
            include 'app/view/usuarios/login.php';
        }

        public function areaRestrita(){
            include 'app/view/areaRestrita.php';
        }

        public function telaEditar(){
            $id = $_GET['id'];
            $usuario = $this->usuarioModel->buscarUsuario($id);
            include 'app/view/usuarios/editar.php';
        }

        public function logado(){
            if ($this->validarDadosLogin() == true) {
                $dados = [
                    'login' => $_POST['login'],
                    'senha' => $_POST['senha']
                ];
                $this->usuarioModel->logado($dados);
            } else {
                echo 'Dados inválidos';
            }
        }

        public function cadastrarUsuario(){
            if ($this->validarDados() == true) {
                $dados = [
                    'nome' => $_POST['nome'],
                    'login' => $_POST['login'],
                    'email' => $_POST['email'],
                    'senha' => $_POST['senha'],
                    'confirmar-senha' => $_POST['confirmar-senha']
                ];
                $this->usuarioModel->cadastrar($dados);
                //$this->login();
                echo json_encode(['status' => 'success', 'message' => 'Usuário cadastrado com sucesso!']);
            } else {
                // echo 'Dados inválidos';
                echo json_encode(['status' => 'error', 'message' => 'Dados inválidos']);
            }
        }

        public function atualizarUsuario(){
            if ($this->validarDadosEdicao() == true) {
                $dados = [
                    'id' => $_POST['id'],
                    'nome' => $_POST['nome'],
                    'login' => $_POST['login'],
                    'email' => $_POST['email'],
                    'administrador' => empty($_POST['administrador']) ? 0 : 1
                ];
                $this->usuarioModel->atualizar($dados);
                $this->listarUsuarios();
            } else {
                echo 'Dados inválidos';
            }
        }

        private function validarDadosEdicao(){
            if (empty($_POST['nome']) || empty($_POST['login']) || empty($_POST['email'])) {
                return false;
            } else {
                return true;
            }
        }

        public function deletarUsuario(){
            $id = $_GET['id'];
            $this->usuarioModel->deletar($id);
            $this->listarUsuarios();
        }
        
        public function listarUsuarios(){
            $usuarios = $this->usuarioModel->listar();
            //include 'app/view/usuarios/listagem.php';
            echo json_encode(['usuarios' => $usuarios]);
        }

        private function validarDados(){
            if (empty($_POST['nome']) || empty($_POST['login']) || empty($_POST['email']) || empty($_POST['senha']) || empty($_POST['confirmar-senha'])) {
                return false;
            } if($_POST['senha'] != $_POST['confirmar-senha']){
                return false;
            } else {
                return true;
            }
        }

        private function validarDadosLogin(){
            if (empty($_POST['login']) || empty($_POST['senha'])) {
                return false;
            } else {
                return true;
            }
        }
}