<?php 

class Pokemon
{
    const MAX_HITPOINT = 100; // 最大HP
    public $name; // 自パーティのポケモンの名前
    public $hitPoint = 100; // 現在のHP
    public $attackPoint = 20; // 攻撃力ｚｒｇｈZGRｆ

    public function doAttack($enemy)
    {
        echo "『" . $this->name . "』の攻撃! \n";
        echo "【" . $this->enemy . "】に" . $this->attackPoint . "のダメージ! \n";
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
















?>