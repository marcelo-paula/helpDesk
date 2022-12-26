<?php

class Seguranca{
    
    public function deslogar(){
        session_destroy();
        header('Location: '.BASE_URL);
    }

    public function verificarLogin(){
        if (!isset($_SESSION['usuario'])) {
            header('Location: '.BASE_URL);
        }
    }
}