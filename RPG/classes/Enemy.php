<?php 

class Enemy
{
    const MAX_HITPOINT = 100;
    public $name;
    public $hitPoint = 100;
    public $attackPoint = 10;

    public function doAttack($pokemon)
    {
        if (rand(1, 6) === 6) {
            //強力な技の発動
            echo "『" . $this->name . "』のはかいこうせん! \n";
            echo $pokemon->name . "に" . $this->attackPoint * 5 . " のダメージ! \n";
            $pokemon->tookDamage($this->attackPoint * 5);
        } elseif (rand(1, 10) === 10) {
            //ダメージ0技の発動
            echo "『" . $this->name . "』のはねる! \n";
            echo "しかし何も起こらなかった \n";
        } elseif (rand(1, 3) === 3) {
            //ノーマル技の発動
            echo "『" . $this->name . "』のたつまき! \n";
            echo $pokemon->name . "に" . $this->attackPoint * 2 . " のダメージ! \n";
            $pokemon->tookDamage($this->attackPoint * 2);
        } else {
            //ノーマル技の発動
            echo "『" . $this->name . "』の体当たり! \n";
            echo $pokemon->name . "に" . $this->attackPoint . " のダメージ! \n";
            $pokemon->tookDamage($this->attackPoint);
        }
        return true;
    }

    public function tookDamage($damage)
    {
        $this->hitPoint -= $damage;
        // HPが0未満にならないための処理
        if ($this->hitPoint < 0) {
            $this->hitPoint = 0;
        }
    }
}










?>