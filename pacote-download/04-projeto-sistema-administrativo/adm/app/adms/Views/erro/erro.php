<?php

if(!defined('S9L6D3S')){
    header("Location: /");
    die("Erro: Página não encontrada<br>");
}

echo "VIEW - Página erro!<br>";
var_dump($this->data);
echo $this->data;