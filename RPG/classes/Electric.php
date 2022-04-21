<?php 

class Electric extends Pokemon
{

    const MAX_HITPOINT = 100; // 最大HP
    public $hitPoint = self::MAX_HITPOINT; // 現在のHP
    public $attackPoint = 10;

    public function doAttack($enemy) {

        if (rand(1, 5) === 5) {
            //強力な技の発動
            echo "『" . $this->name . "』のかみなり! \n";
            echo "効果はばつぐんだ! \n";
            echo $enemy->name . "に" . $this->attackPoint * 5 . " のダメージ! \n";
            $enemy->tookDamage($this->attackPoint * 5);
        } elseif (rand(1, 3) === 3) {
            //ノーマル技の発動
            echo "『" . $this->name . "』の電気ショック! \n";
            echo "効果はばつぐんだ! \n";
            echo $enemy->name . "に" . $this->attackPoint * 3 . " のダメージ! \n";
            $enemy->tookDamage($this->attackPoint * 3);
        }  else {
            parent::doAttack($enemy);
        }
        return true;
    }
}



?>