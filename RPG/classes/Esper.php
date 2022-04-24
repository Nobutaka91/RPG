<?php

class Esper extends Pokemon
{
    const MAX_HITPOINT = 70;
    private $name;
    private $hitPoint = 70;
    private $attackPoint = 10;
    private $specialAttack = 50;

    public function __construct($name)
    {
        parent::__construct($name, $this->hitPoint, $this->attackPoint, $this->specialAttack);
    }

    public function doAttackEsper($enemy, $pokemon)
    {
        if (rand(1, 2) === 2) {
            //回復技
            echo "『" . $this->getName() . "』の いやしのはどう! \n";
            echo "【 " . $pokemon->getName() . " 】のHPを" . $this->specialAttack . "回復した \n";
            $pokemon->recoveryDamage($this->specialAttack, $pokemon);
        } elseif (rand(1, 3) === 3) {
            //ノーマル技の発動
            echo "『" . $this->getName() . "』のサイコキネシス! \n";
            echo "【 " . $enemy->getName() . " 】に" . $this->specialAttack  . " のダメージ! \n";
            $enemy->tookDamage($this->specialAttack);
        } else {
            parent::doAttack($enemy);
        }
        return true;
    }
}