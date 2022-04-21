<?php 

class Enemy
{
    const MAX_HITPOINT = 100;
    public $name;
    public $hitPoint = 100;
    public $attackPoint = 20;

    public function doAttack($pokemon)
    {
        echo "『" . $this->name . "』の水てっぽう! \n";
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