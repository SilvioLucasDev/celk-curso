<?php

if (!defined('S9L6D3S')) {
    header("Location: /");
    die("Erro: Página não encontrada<br>");
}

if (isset($this->data['form'])) {
    $valorForm = $this->data['form'];
}

if (isset($this->data['form'][0])) {
    $valorForm = $this->data['form'][0];
}
?>
<!-- Inicio do conteudo do administrativo -->
<div class="wrapper">
    <div class="row">
        <div class="top-list">
            <span class="title-content">Editar Sobre Empresa</span>
            <div class="top-list-right">
                <?php
                echo "<a href='" . URLADM . "list-abouts-comp/index' class='btn-info'>Listar</a> ";
                if (isset($valorForm['id'])) {
                    echo "<a href='" . URLADM . "view-abouts-comp/index/" . $valorForm['id'] . "' class='btn-primary'>Visualizar</a><br><br>";
                }
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
            <form method="POST" action="" id="form-add-abouts-comp" class="form-adm">
                <?php
                $id = "";
                if (isset($valorForm['id'])) {
                    $id = $valorForm['id'];
                }
                ?>
                <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">

                <div class="row-input">
                    <div class="column">
                        <?php
                        $title = "";
                        if (isset($valorForm['title'])) {
                            $title = $valorForm['title'];
                        }
                        ?>
                        <label class="title-input">Título:<span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" class="input-adm" placeholder="Digite o título sobre empresa" value="<?php echo $title; ?>"  required>
                    </div>
                </div>

                <div class="row-input">
                    <div class="column">
                        <?php
                        $description = "";
                        if (isset($valorForm['description'])) {
                            $description = $valorForm['description'];
                        }
                        ?>
                        <label class="title-input">Usuário:<span class="text-danger">*</span></label>
                        <textarea name="description" rows="5" id="description" class="input-adm" placeholder="Digite a descrição sobre empresa" required><?php echo $description; ?></textarea>

                    </div>
                </div>

                <div class="row-input">
                    <div class="column">
                        <label class="title-input">Situação:<span class="text-danger">*</span></label>
                        <select name="sts_situation_id" id="sts_situation_id" class="input-adm" required>
                            <option value="">Selecione</option>
                            <?php
                            foreach ($this->data['select']['sit'] as $sit) {
                                extract($sit);
                                if ((isset($valorForm['sts_situation_id'])) and ($valorForm['sts_situation_id'] == $id_sit)) {
                                    echo "<option value='$id_sit' selected>$name_sit</option>";
                                } else {
                                    echo "<option value='$id_sit'>$name_sit</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <p class="text-danger mb-5 fs-4">* Campo Obrigatório</p>

                <button type="submit" name="SendEditAboutsComp" class="btn-warning" value="Salvar">Salvar</button>

            </form>
        </div>
    </div>
</div>
<!-- Fim do conteudo do administrativo -->