<?php

session_start();

define('BASE_URL', 'http://localhost:8080/helpDesk/');

include 'app/model/banco.php';

include 'app/controller/usuariosController.php';
include 'app/controller/tarefaController.php';
include 'app/controller/principalController.php';

include 'app/model/usuariosModel.php';
include 'app/model/tarefaModel.php';
include 'app/model/principalModel.php';

include 'app/helper/seguranca.php';

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$url = (explode('?', $url))[0]; //tudo que for ponto de interrogação é ignorado na url (ex: ?id=1)

$usuarios = new Usuarios();
$tarefas = new Tarefas();
$seguranca = new Seguranca();
$principal = new principalController();

switch ($url) {
    //----------------------Usuarios----------------------
    //tela de login
    case '/helpDesk/':
        $usuarios->login();
    break;

    //tela de login
    case '/helpDesk/usuarios/login':
        $usuarios->logado();
    break;

    //tela area restrita do sistema
    case '/helpDesk/areaRestrita':
        $seguranca->verificarLogin();
        $principal->home();
    break;

    //tela de cadastro de usuarios
    case '/helpDesk/usuarios/cadastro':
        $usuarios->cadastro();
    break;

    //lista de todos os usuarios cadastrados
    case '/helpDesk/usuarios/lista':
        $seguranca->verificarLogin();
        $usuarios->listarUsuarios();
    break;

    //cadastrar usuario
    case '/helpDesk/usuarios/cadastrar':
        $seguranca->verificarLogin();
        $usuarios->cadastrarUsuario();
    break;

    //tela de edição de usuario pelo id
    case '/helpDesk/usuarios/telaEditar':
        $seguranca->verificarLogin();
        $usuarios->telaEditar();
    break;

    //atualizar usuario pelo id
    case '/helpDesk/usuarios/editar':
        $seguranca->verificarLogin();
        $usuarios->atualizarUsuario();
    break;

    //deletar usuario pelo id
    case '/helpDesk/usuarios/deletar':
        $seguranca->verificarLogin();
        $usuarios->deletarUsuario();
    break;
    //---------------------Fim usuarios--------------------

    //----------------------Tarefas----------------------
    //tela de cadastro de tarefas
    case '/helpDesk/tarefa/telaCadastroTarefas':
        $seguranca->verificarLogin();
        $tarefas->telaCadastro();
    break;

    //tela de listagem de tarefas
    case '/helpDesk/tarefa/telaListagemTarefas':
        $seguranca->verificarLogin();
        $tarefas->telaListagem();
    break;

    //cadastrar tarefa
    case '/helpDesk/tarefa/cadastrarTarefa':
        $seguranca->verificarLogin();
        $tarefas->cadastrarTarefa();
    break;

    //tela para editar uma tarefa
    case '/helpDesk/tarefa/telaEditarTarefa':
        $seguranca->verificarLogin();
        $tarefas->telaEditarTarefa();
    break;

    //detar uma tarefa
    case '/helpDesk/tarefa/deletarTarefa':
        $seguranca->verificarLogin();
        $tarefas->deletarTarefa();
    break;

    //editar uma tarefa
    case '/helpDesk/tarefa/editarTarefa':
        $seguranca->verificarLogin();
        $tarefas->atualizarTarefa();
    break;
    //---------------------Fim tafeas--------------------

    //---------------------Inicio principal--------------------
    //coloca em situacao de em aberto
    case '/helpDesk/tarefa/colocaSituacaoAberto':
        $seguranca->verificarLogin();
        $principal->colocarSituacaoEmAberto();
    break;

    //coloca em situacao de em andamento
    case '/helpDesk/tarefa/colocaSituacaoAndamento':
        $seguranca->verificarLogin();
        $principal->colocarSituacaoEmAndamento();
    break;

    //coloca em situacao de finalizado
    case '/helpDesk/tarefa/colocaSituacaoFinalizado':
        $seguranca->verificarLogin();
        $principal->colocarSituacaoEmFinalizado();
    break;
    //---------------------Fim principal--------------------

    //caso a url não seja encontrada
    default :
        echo 'Página não encontrada';
    break;
}