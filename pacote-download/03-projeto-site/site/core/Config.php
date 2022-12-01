<?php

namespace Core;

// Redirecionar ou para o processamento quando o usuário não acessa o arquivo index.php
if (!defined('S9L6D3S')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

/**
 * Configurações básicas do site.
 *
 * @author Silvio <silviolucas_santos@hotmail.com>
 */

abstract class Config
{

    /**
     * Possui as constantes com as configurações.
     * Configurações de endereço do projeto.
     * Página principal do projeto.
     * Credenciais de acesso ao banco de dados
     * E-mail do administrador.
     * 
     * @return void
     */
    protected function config(): void
    {
        //URL do projeto
        define('URL', 'http://localhost/site/');
        define('URLADM', 'http://localhost/site/adm/');

        define('CONTROLLER', 'Home');
        define('CONTROLLERERRO', 'Erro');

        //Credenciais do banco de dados
        define('HOST', 'localhost');
        define('USER', 'root');
        define('PASS', '');
        define('DBNAME', 'projeto_site');
        define('PORT', 3307);

        define('EMAILADM', 'silviolucas_santos@hotmail.com');
    }
}
