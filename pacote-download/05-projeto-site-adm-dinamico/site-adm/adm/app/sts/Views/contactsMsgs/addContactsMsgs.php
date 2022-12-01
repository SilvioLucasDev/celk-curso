<?php

if (!defined('S9L6D3S')) {
    header("Location: /");
    die("Erro: Página não encontrada<br>");
}

if (isset($this->data['form'])) {
    $valorForm = $this->data['form'];
}
?>
<!-- Inicio do conteudo do administrativo -->
<div class="wrapper">
    <div class="row">
        <div class="top-list">
            <span class="title-content">Cadastrar Mensagem de Contato</span>
            <div class="top-list-right">
                <?php
                echo "<a href='" . URLADM . "list-contacts-msgs/index' class='btn-info'>Listar</a> ";
                ?>
            </div>
        </div>

        <div class="content-adm-alert">
            <?php
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
            <span id="msg"></span>
        </div>

        <div class="content-adm">
            <form method="POST" action="" id="form-add-contacts-msgs" class="form-adm">
                <div class="row-input">
                    <div class="column">
                        <?php
                        $name = "";
                        if (isset($valorForm['name'])) {
                            $name = $valorForm['name'];
                        }
                        ?>
                        <label class="title-input">Nome:<span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="input-adm" placeholder="Digite o nome" value="<?php echo $name; ?>"  >
                    </div>
                </div>

                <div class="row-input">
                    <div class="column">
                        <?php
                        $email = "";
                        if (isset($valorForm['email'])) {
                            $email = $valorForm['email'];
                        }
                        ?>
                        <label class="title-input">E-mail:<span class="text-danger">*</span></label>
                        <input type="text" name="email" id="email" class="input-adm" placeholder="Digite o e-mail" value="<?php echo $email; ?>"  >
                    </div>
                </div>

                <div class="row-input">
                    <div class="column">
                        <?php
                        $subject = "";
                        if (isset($valorForm['subject'])) {
                            $subject = $valorForm['subject'];
                        }
                        ?>
                        <label class="title-input">Assunto:<span class="text-danger">*</span></label>
                        <input type="text" name="subject" id="subject" class="input-adm" placeholder="Digite o assunto" value="<?php echo $subject; ?>"  >
                    </div>
                </div>

                <div class="row-input">
                    <div class="column">
                        <?php
                        $content = "";
                        if (isset($valorForm['content'])) {
                            $content = $valorForm['content'];
                        }
                        ?>
                        <label class="title-input">Conteúdo:<span class="text-danger">*</span></label>
                        <textarea name="content" rows="5" id="content" class="input-adm" placeholder="Digite o conteúdo" ><?php echo $content; ?></textarea>

                    </div>
                </div>

                <p class="text-danger mb-5 fs-4">* Campo Obrigatório</p>

                <button type="submit" name="SendAddContactsMsgs"  class="btn-success" value="Cadastrar">Cadastrar</button>

            </form>
        </div>
    </div>
</div>
<!-- Fim do conteudo do administrativo -->