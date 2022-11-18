<?php

/**
 * A classe Bonus he classe filha da classe Funcionario
 *
 * @author Silvio Lucas
 */

class Bonus extends Funcionario
{

    /**
     * Metodo para ver o bonus 
     * @return string retorna o bonus calculado
     */
    public function verBonus(): string
    {
        return "O funcionário tem o bônus de R$ " . $this->bonusCalculado() . "<br>";
    }
}
