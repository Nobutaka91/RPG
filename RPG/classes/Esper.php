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

    public function doAttackEsper($enemies, $pokemons)
    {
        // チェック1 : 自信のHPが0かどうか
        if ($this->getHitPoint() <= 0) {
            return false;
        }

        // 配列からランダムに敵1体を決定する
        $enemyIndex = rand(0, count($enemies) - 1); // 添え字は0から始まるので, -1する
        $enemy = $enemies[$enemyIndex];

        // 配列からランダムに回復させる仲間1体を決定する
        $pokemonIndex = rand(0, count($pokemons) - 1); // 添え字は0から始まるので, -1する
        $pokemon = $pokemons[$pokemonIndex];

        // echo "『" . $this->getName() . "』のでんこうせっか! \n";
        // echo "【" . $enemy->getName() . "】に" . $this->attackPoint . "のダメージ! \n";
        // $enemy->tookDamage($this->attackPoint);

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
            parent::doAttack($enemies);
        }
        return true;
    }
}
