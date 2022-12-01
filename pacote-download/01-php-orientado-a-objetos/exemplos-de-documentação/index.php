<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Documentação</title>
</head>

<body>
    <?php

    /*Link para documentacao
            https://www.php-fig.org/psr/
            https://github.com/php-fig/fig-standards/blob/master/proposed/phpdoc-tags.md
            https://github.com/php-fig/fig-standards/blob/master/proposed/phpdoc.md */
    require './Funcionario.php';
    require './Bonus.php';

    $funcionario = new Funcionario();

    //Atributo publico pode ser acessaro fora da classe
    $funcionario->nome = "Lucas";
    $funcionario->salario = 7961.52;
    echo $funcionario->verSalario();

    //Atributo privado nao pode ser acessado fora da classe
    //$funcionario->salarioConvertido = "72,16";

    //Atributo protegido somente pode ser acessado pela classe e pela classe filha
    //$funcionario->bonus;

    //Metodo privado nao pode ser acessado fora da classe
    //$funcionario->converterSalario();

    //Metodo protegido somente pode ser acessado pela classe e pela classe filha
    //$funcionario->bonusCalculado();

    $funcBonus = new Bonus();
    echo $funcBonus->verBonus();
    ?>
</body>

</html>