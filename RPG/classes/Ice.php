<?php 

class Ice extends Pokemon
{
    private $maxHitPoint = 120; // 現在のHP
    private $hitPoint = 120;
    private $attackPoint = 40;
    private $specialAttack = 50;

    public function __construct($name)
    {
        parent::__construct($name, $this->maxHitPoint, $this->hitPoint, $this->attackPoint, $this->specialAttack);
    }

    public function doAttack($enemies)
    {

        // チェック1 : 自信のHPが0かどうか
        if ($this->getHitPoint() <= 0) {
            return false;
        }

        // 配列からランダムに敵1体を決定する
        $enemyIndex = rand(0, count($enemies) - 1); // 添え字は0から始まるので, -1する
        $enemy = $enemies[$enemyIndex];

        if (rand(1, 5) === 5) {
            //強力な技の発動
            echo "『" . $this->getName() . "』のぜったいれいど! \n";
            echo "いちげき ひっさつ! \n";
            echo "【 " . $enemy->getName() . " 】をやっつけた! \n";
            $enemy->tookDamage($enemy->getHitPoint());
        } elseif (rand(1, 3) === 3) {
            //ノーマル技の発動
            echo "『" . $this->getName() . "』のれいとうビーム! \n";
            echo "効果はばつぐんだ! \n";
            echo "【 " . $enemy->getName() . " 】に" . $this->specialAttack * 2 . " のダメージ! \n";
            $enemy->tookDamage($this->specialAttack * 2);
        } else {
            parent::doAttack($enemies);
        }
        return true;
    }

}


?>