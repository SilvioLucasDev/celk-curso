<?php

namespace App\adms\Controllers;

if(!defined('S9L6D3S')){
    header("Location: /");
    die("Erro: Página não encontrada<br>");
}

/**
 * Controller sair do administrativo.
 * @author Silvio <silviolucas_santos@hotmail.com>
 */
class Logout
{

    /**
     * Método sair do administrativo.
     * Destruir as sessões do usuário logado
     * 
     * @return void
     */
    public function index(): void
    {
        unset($_SESSION['user_id'], $_SESSION['user_name'], $_SESSION['user_nickname'], $_SESSION['user_email'], $_SESSION['user_image']);
        $_SESSION['msg'] = "<p class='alert-success'>Logout realizado com sucesso!</p>";
        $urlRedirect = URLADM . "login/index";
        header("Location: $urlRedirect");
    }
}
