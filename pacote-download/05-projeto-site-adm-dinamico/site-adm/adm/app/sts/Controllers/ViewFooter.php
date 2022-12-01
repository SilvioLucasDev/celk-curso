<?php

namespace App\sts\Controllers;

if (!defined('S9L6D3S')) {
    header("Location: /");
    die("Erro: Página não encontrada<br>");
}

/**
 * Controller da pagina visualizar conteudo do rodapé
 * @author Silvio <silviolucas_santos@hotmail.com>
 */
class ViewFooter
{
    /** @var array|string|null $data Recebe os dados que devem ser enviados para VIEW */
    private array|string|null $data;

    public function index(): void
    {
        $viewHome = new \App\sts\Models\StsViewFooter();
        $viewHome->viewFooter();
        $this->data['viewFooter'] = $viewHome->getResultBdFooter();

        $this->data['sidebarActive'] = "view-footer";

        $loadView = new \App\sts\core\ConfigViewSts("sts/Views/footer/viewFooter", $this->data);
        $loadView->loadViewSts();
    }
}
