<?php 

class Enemy
{
    const MAX_HITPOINT = 50;
    public $name;
    public $hitPoint = 50;
    public $attackPoint = 10;

    public function doAttack($pokemon)
    {
        echo "『" . $this->name . "』の岩落とし! \n";
        echo "【" . $pokemon->name. "】に" . $this->attackPoint . "のダメージ! \n";
        $pokemon->tookDamage($this->attackPoint);
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