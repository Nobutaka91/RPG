<?php

class Pokemon
{
    const MAX_HITPOINT = 50; // 最大HP
    private $name; // 自パーティのポケモンの名前
    private $hitPoint = 100; // 現在のHP
    private $attackPoint = 10; // 攻撃力

    public function __construct($name, $hitPoint = 100, $attackPoint = 10)
    {
        $this->name = $name;
        $this->hitPoint = $hitPoint;
        $this->attackPoint = $attackPoint;
    }

    public function doAttack($enemy)
    {
        echo "『" . $this->getName() . "』のでんこうせっか! \n";
        echo "【" . $enemy->getName() . "】に" . $this->attackPoint . "のダメージ! \n";
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

    // アクセサーメソッド (外部からprivateプロパティにアクセスするためのメソッド)

    // ゲッター (プロパティを取得するためのアクセサーメソッド)
    public function getName()
    {
        return $this->name;
    }

    public function getHitPoint()
    {
        return $this->hitPoint;
    }

    public function getAttackPoint()
    {
        return $this->attackPoint;
    }
}
