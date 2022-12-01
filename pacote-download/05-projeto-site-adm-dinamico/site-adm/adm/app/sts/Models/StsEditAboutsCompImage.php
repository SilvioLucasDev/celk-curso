<?php

namespace App\sts\Models;

if(!defined('S9L6D3S')){
    header("Location: /");
    die("Erro: Página não encontrada<br>");
}

/**
 * Editar a imagem sobre empresa no banco de dados
 *
 * @author Silvio <silviolucas_santos@hotmail.com>
 */
class StsEditAboutsCompImage
{

    /** @var bool $result Recebe true quando executar o processo com sucesso e false quando houver erro */
    private bool $result = false;

    /** @var array|null $resultBd Recebe os registros do banco de dados */
    private array|null $resultBd;

    /** @var int|string|null $id Recebe o id do registro */
    private int|string|null $id;

    /** @var array|null $data Recebe as informações do formulario */
    private array|null $data;

    /** @var array|null $dataImagem Recebe os dados da imagem */
    private array|null $dataImagem;

    /** @var string $directory Recebe o endereço de upload da imagem */
    private string $directory;

    /** @var string $delImg Recebe o endereço da imagem que deve ser excluida */
    private string $delImg;

    /** @var string $nameImg Recebe o slug/nome da imagem */
    private string $nameImg;

    /**
     * @return bool Retorna true quando executar o processo com sucesso e false quando houver erro
     */
    function getResult(): bool
    {
        return $this->result;
    }

    /**
     * @return bool Retorna os detalhes do registro
     */
    function getResultBd(): array|null
    {
        return $this->resultBd;
    }

    /**
     * Metodo para pesquisar a imagem sobre empresa que sera editada
     * @return boolean
     */
    public function viewAboutsComp(int $id): bool
    {
        $this->id = $id;

        $viewAboutsComp = new \App\adms\Models\helper\AdmsRead();
        $viewAboutsComp->fullRead(
            "SELECT id, image
                            FROM sts_abouts_companies
                            WHERE id=:id
                            LIMIT :limit",
            "id={$this->id}&limit=1"
        );

        $this->resultBd = $viewAboutsComp->getResult();
        if ($this->resultBd) {
            $this->result = true;
            return true;
        } else {
            $_SESSION['msg'] = "<p class='alert-danger'>Erro: Sobre empresa não encontrado!</p>";
            $this->result = false;
            return false;
        }
    }

    /**
     * Metodo recebe a informacao da imagem que sera editada
     * Instancia o helper AdmsValEmptyField para validar os campos do formulario
     * Retira o campo "new_image" da validacao
     * Se tiver uma imagem, chama o metodo valInput para validar a extensao, se não tiver, retorna falso     
     * @param array|null $data
     * @return void
     */
    public function update(array $data = null): void
    {
        $this->data = $data;

        $this->dataImagem = $this->data['new_image'];
        unset($this->data['new_image']);

        $valEmptyField = new \App\adms\Models\helper\AdmsValEmptyField();
        $valEmptyField->valField($this->data);
        if ($valEmptyField->getResult()) {
            if (!empty($this->dataImagem['name'])) {
                //$this->result = false;
                $this->valInput();
            } else {
                $_SESSION['msg'] = "<p class='alert-danger'>Erro: Necessário selecionar uma imagem!</p>";
                $this->result = false;
            }
        } else {
            $this->result = false;
        }
    }

    /** 
     * Verificar a extensao da imagem com o helper AdmsValExtImg
     * Chama a funcao upload se a extensao for valida
     * Retorna FALSE quando houve algum erro
     * 
     * @return void
     */
    private function valInput(): void
    {
        $valExtImg = new \App\adms\Models\helper\AdmsValExtImg();
        $valExtImg->validateExtImg($this->dataImagem['type']);
        if (($this->viewAboutsComp($this->data['id'])) and ($valExtImg->getResult())) {
            $this->upload();
        } else {
            $this->result = false;
        }
    }

    /**
     * Metodo gera o slug da imagem com o helper AdmsSlug
     * Faz o upload da imagem com o helper AdmsUploadImgRes
     * Chama a função edit para salvar o nome da imagem no banco de dados
     * @return void
     */
    private function upload(): void
    {
        $slugImg = new \App\adms\Models\helper\AdmsSlug();
        $this->nameImg = $slugImg->slug($this->dataImagem['name']);

        $this->directory = "app/sts/assets/image/about/" . $this->data['id'] . "/";

        //$uploadImg = new \App\adms\Models\helper\AdmsUpload();
        //$uploadImg->upload($this->directory, $this->dataImagem['tmp_name'], $this->nameImg);

        $uploadImgRes = new \App\adms\Models\helper\AdmsUploadImgRes();
        $uploadImgRes->upload($this->dataImagem, $this->directory, $this->nameImg, 500, 500);        

        if($uploadImgRes->getResult()){
            $this->edit();
        }else{
            $this->result = false;
        }
    }

    /**
     * Metodo salva as informacoes no banco de dados
     * Chama a funcao deleteImage
     * @return void
     */
    private function edit(): void
    {
        $this->data['image'] = $this->nameImg;
        $this->data['modified'] = date("Y-m-d H:i:s");

        $upAboutsComp = new \App\adms\Models\helper\AdmsUpdate();
        $upAboutsComp->exeUpdate("sts_abouts_companies", $this->data, "WHERE id=:id", "id={$this->data['id']}");

        if ($upAboutsComp->getResult()) {
            $this->deleteImage();
        } else {
            $_SESSION['msg'] = "<p class='alert-danger'>Erro: Sobre empresa não editado com sucesso!</p>";
            $this->result = false;
        }
    }

    /**
     * Apaga a imagem antiga sobre empresa
     *
     * @return void
     */
    private function deleteImage(): void
    {
        if (((!empty($this->resultBd[0]['image'])) or ($this->resultBd[0]['image'] != null)) and ($this->resultBd[0]['image'] != $this->nameImg)) {
            $this->delImg = "app/sts/assets/image/about/" . $this->data['id'] . "/" . $this->resultBd[0]['image'];
            if (file_exists($this->delImg)) {
                unlink($this->delImg);
            }
        }

        $_SESSION['msg'] = "<p class='alert-success'>Imagem editada com sucesso!</p>";
        $this->result = true;
    }
}