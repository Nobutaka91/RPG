<?php

class Esper extends Ally
{
    private $maxHitPoint = 90; // 現在のHP
    private $hitPoint = 90;
    private $attackPoint = 30;
    private $specialAttack = 70;

    public function __construct($name)
    {
        parent::__construct($name, $this->maxHitPoint, $this->hitPoint, $this->attackPoint, $this->specialAttack);
    }

    public function doAttackEsper($enemies, $allies)
    {
        // チェック1 : 自信のHPが0かどうか
        if ($this->getHitPoint() <= 0) {
            return false;
        }

        // 配列からランダムに敵1体を決定する
        $enemyIndex = rand(0, count($enemies) - 1); // 添え字は0から始まるので, -1する
        $enemy = $enemies[$enemyIndex];

        // 配列からランダムに回復させる仲間1体を決定する
        $allyIndex = rand(0, count($allies) - 1); // 添え字は0から始まるので, -1する
        $ally = $allies[$allyIndex];

        if (rand(1, 2) === 2) {
            //回復技
            echo "『" . $this->getName() . "』の いやしのはどう! \n";
            echo "【 " . $ally->getName() . " 】のHPを" . $this->specialAttack . "回復した \n";
            $ally->recoveryDamage($this->specialAttack, $ally);
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
