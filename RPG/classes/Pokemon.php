<?php

class Pokemon
{
    const MAX_HITPOINT = 100; // 最大HP
    private $name; // 自パーティのポケモンの名前
    private $hitPoint = 100; // 現在のHP
    private $attackPoint = 10; // 攻撃力

    public function __construct($name, $hitPoint = 100, $attackPoint = 10)
    {
        $this->name = $name;
        $this->hitPoint = $hitPoint;
        $this->attackPoint = $attackPoint;
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

    public function recoveryDamage($heal, $target)
    {
        $this->hitPoint += $heal;
        if ($this->hitPoint > $target::MAX_HITPOINT) {
            $this->hitPoint = $target::MAX_HITPOINT;
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
