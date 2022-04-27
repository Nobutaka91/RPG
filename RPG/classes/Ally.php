<?php

class Ally
{
    private $name; // 自パーティのポケモンの名前
    private $maxHitPoint = 100; // 現在のHP
    private $hitPoint = 100; // 現在のHP
    private $attackPoint = 10; // 攻撃力

    public function __construct($name, $maxHitPoint, $hitPoint, $attackPoint)
    {
        $this->name = $name;
        $this->maxHitPoint = $maxHitPoint;
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
            echo "【 " . $this->getName() . " 】はたおれた! \n";
        }
    }

    public function recoveryDamage($heal, $target)
    {
        $this->hitPoint += $heal;
        if ($this->hitPoint > $target->maxHitPoint) {
            $this->hitPoint = $target->maxHitPoint;
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

    public function getMaxHitPoint()
    {
        return $this->maxHitPoint;
    }

    public function getAttackPoint()
    {
        return $this->attackPoint;
    }
}