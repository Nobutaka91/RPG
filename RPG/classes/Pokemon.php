<?php 

class Pokemon
{
    const MAX_HITPOINT = 50; // 最大HP
    public $name; // 自パーティのポケモンの名前
    public $hitPoint = 100; // 現在のHP
    public $attackPoint = 10; // 攻撃力

    public function doAttack($enemy)
    {
        echo "『" . $this->name . "』のでんこうせっか! \n";
        echo "【" . $enemy->name . "】に" . $this->attackPoint . "のダメージ! \n";
        $enemy->tookDamage($this->attackPoint);
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
