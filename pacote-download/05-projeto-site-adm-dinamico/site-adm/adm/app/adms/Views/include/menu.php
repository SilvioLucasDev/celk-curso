<?php

if (!defined('S9L6D3S')) {
    header("Location: /");
    die("Erro: Página não encontrada<br>");
}

$sidebar_active = "";
if (isset($this->data['sidebarActive'])) {
    $sidebar_active = $this->data['sidebarActive'];
}
?>

<!-- Inicio Conteudo -->
<div class="content">
    <!-- Inicio da Sidebar -->
    <div class="sidebar">
        <?php $dashboard = "";
        if ($sidebar_active == "dashboard") {
            $dashboard = "active";
        } ?>
        <a href="<?php echo URLADM; ?>dashboard/index" class="sidebar-nav <?php echo $dashboard; ?>"><i class="icon fa-solid fa-house"></i><span>Dashboard</span></a>

        <?php
        $sidebar_user = "";
        $list_users = "";
        if ($sidebar_active == "list-users") {
            $list_users = "active";
            $sidebar_user = "active";
        } ?>

        <?php $list_sits_users = "";
        if ($sidebar_active == "list-sits-users") {
            $list_sits_users = "active";
            $sidebar_user = "active";
        } ?>

        <button class="dropdown-btn <?php echo $sidebar_user; ?>">
            <i class="icon fa-solid fa-user"></i><span>Usuário</span><i class="fa-solid fa-caret-down"></i>
        </button>
        <div class="dropdown-container <?php echo $sidebar_user; ?>">
            <a href="<?php echo URLADM; ?>list-users/index" class="sidebar-nav <?php echo $list_users; ?>"><i class="icon fa-solid fa-users"></i><span>Usuários</span></a>
            <a href="<?php echo URLADM; ?>list-sits-users/index" class="sidebar-nav <?php echo $list_sits_users; ?>"><i class="icon fa-solid fa-user-check"></i><span>Situações do Usuário</span></a>
        </div>

        <?php $list_colors = "";
        if ($sidebar_active == "list-colors") {
            $list_colors = "active";
        } ?>
        <a href="<?php echo URLADM; ?>list-colors/index" class="sidebar-nav <?php echo $list_colors; ?>"><i class="icon fa-solid fa-palette"></i><span>Cores</span></a>

        <?php $list_conf_emails = "";
        if ($sidebar_active == "list-conf-emails") {
            $list_conf_emails = "active";
        } ?>
        <a href="<?php echo URLADM; ?>list-conf-emails/index" class="sidebar-nav <?php echo $list_conf_emails; ?>"><i class="icon fa-solid fa-envelope"></i><span>Configurações de E-mail</span></a>



        <?php
        $sidebar_page_home = "";
        $list_page_home = "";
        if ($sidebar_active == "view-page-home") {
            $list_page_home = "active";
            $sidebar_page_home = "active";
        } ?>

        <?php $list_abouts_comp = "";
        if ($sidebar_active == "list-abouts-comp") {
            $list_abouts_comp = "active";
            $sidebar_page_home = "active";
        } ?>

        <?php $view_page_contact = "";
        if ($sidebar_active == "view-page-contact") {
            $view_page_contact = "active";
            $sidebar_page_home = "active";
        } ?>

        <?php $list_contacts_msgs = "";
        if ($sidebar_active == "list-contacts-msgs") {
            $list_contacts_msgs = "active";
            $sidebar_page_home = "active";
        } ?>

        <?php $list_situations = "";
        if ($sidebar_active == "list-situations") {
            $list_situations = "active";
            $sidebar_page_home = "active";
        } ?>

        <?php $view_footer = "";
        if ($sidebar_active == "view-footer") {
            $view_footer = "active";
            $sidebar_page_home = "active";
        } ?>

        <button class="dropdown-btn <?php echo $sidebar_page_home; ?>">
            <i class="icon fa-solid fa-globe"></i><span>Site</span><i class="fa-solid fa-caret-down"></i>
        </button>
        <div class="dropdown-container <?php echo $sidebar_page_home; ?>">
            <a href="<?php echo URLADM; ?>view-page-home/index" class="sidebar-nav <?php echo $list_page_home; ?>"><i class="icon fa-solid fa-house"></i><span>Home</span></a>
            <a href="<?php echo URLADM; ?>list-abouts-comp/index" class="sidebar-nav <?php echo $list_abouts_comp; ?>"><i class="icon fa-solid fa-building"></i><span>Sobre Empresa</span></a>
            <a href="<?php echo URLADM; ?>view-page-contact/index" class="sidebar-nav <?php echo $view_page_contact; ?>"><i class="icon fa-solid fa-phone"></i><span>Contato</span></a>
            <a href="<?php echo URLADM; ?>list-contacts-msgs/index" class="sidebar-nav <?php echo $list_contacts_msgs; ?>"><i class="icon fa-solid fa-envelope"></i><span>Mensagens</span></a>
            <a href="<?php echo URLADM; ?>list-situations/index" class="sidebar-nav <?php echo $list_situations; ?>"><i class="icon fa-solid fa-question"></i><span>Situações</span></a>
            <a href="<?php echo URLADM; ?>view-footer/index" class="sidebar-nav <?php echo $view_footer; ?>"><i class="icon fa-solid fa-house"></i><span>Rodapé</span></a>
        </div>


        <a href="<?php echo URLADM; ?>logout/index" class="sidebar-nav"><i class="icon fa-solid fa-arrow-right-from-bracket"></i><span>Sair</span></a>

    </div>
    <!-- Fim da Sidebar -->

    <!--<a href="<?php echo URLADM; ?>dashboard/index">Dashboard</a><br>
<a href="<?php echo URLADM; ?>list-users/index">Usuários</a><br>
<a href="<?php echo URLADM; ?>list-sits-users/index">Situações do Usuário</a><br>
<a href="<?php echo URLADM; ?>list-colors/index">Cores</a><br>
<a href="<?php echo URLADM; ?>list-conf-emails/index">Configurações de E-mail</a><br>
<a href="<?php echo URLADM; ?>view-profile/index">Perfil</a><br>

<a href="<?php echo URLADM; ?>logout/index">Sair</a><br>-->