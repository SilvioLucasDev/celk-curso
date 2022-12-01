<?php

namespace Core;

if(!defined('S9L6D3S')){
    header("Location: /");
    die("Erro: Página não encontrada<br>");
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
    protected function configAdm(): void
    {
        define('URL', 'http://localhost/site-adm/');
        define('URLADM', 'http://localhost/site-adm/adm/');

        define('CONTROLLER', 'Login');
        define('METODO', 'index');
        define('CONTROLLERERRO', 'Login');

        define('HOST', 'localhost');
        define('USER', 'root');
        define('PASS', '');
        define('DBNAME', 'projeto_site_adm');
        define('PORT', 3307);

        define('EMAILADM', 'suporte@slds.com.br');
    }
}
