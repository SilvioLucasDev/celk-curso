<?php

// Redirecionar ou para o processamento quando o usuário não acessa o arquivo index.php
if (!defined('S9L6D3S')) {
    header("Location: /");
    die("Erro: Página não encontrada!");
}

echo "View da página erro<br>";