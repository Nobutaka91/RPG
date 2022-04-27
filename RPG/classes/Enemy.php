<?php

class Enemy
{
    private $name;
    private $maxHitPoint;
    private $hitPoint;
    private $attackPoint;

    public function __construct($name, $maxHitPoint, $hitPoint,$attackPoint)
    {
        $this->name = $name;
        $this->hitPoint = $hitPoint;
        $this->maxHitPoint = $maxHitPoint;
        $this->attackPoint = $attackPoint;
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

    public function doAttack($pokemons)
    {
        // チェック1 : 自信のHPが0かどうか
        if ($this->getHitPoint() <= 0) {
            return false;
        }

        // 配列からランダムに攻撃対象1体を決定する
        $pokemonIndex = rand(0, count($pokemons) - 1); // 添え字は0から始まるので, -1する
        $pokemon = $pokemons[$pokemonIndex];
        
        if (rand(1, 6) === 6) {
            //強力な技の発動
            echo "『" . $this->getName() . "』のはかいこうせん! \n";
            echo "【 " . $pokemon->getName() . " 】に" . $this->attackPoint * 3 . " のダメージ! \n";
            $pokemon->tookDamage($this->attackPoint * 3);
        } elseif (rand(1, 10) === 10) {
            //ダメージ0技の発動
            echo "『" . $this->getName() . "』のはねる! \n";
            echo "しかし何も起こらなかった \n";
        } elseif (rand(1, 3) === 3) {
            //ノーマル技の発動
            echo "『" . $this->getName() . "』のたつまき! \n";
            echo "【 " . $pokemon->getName() . "】に" . $this->attackPoint * 1.5 . " のダメージ! \n";
            $pokemon->tookDamage($this->attackPoint * 1.5);
        } else {
            //ノーマル技の発動
            echo "『" . $this->getName() . "』の体当たり! \n";
            echo "【 " . $pokemon->getName() . "】に" . $this->attackPoint . " のダメージ! \n";
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
            echo "【 " . $this->getName() . " 】をやっつけた! \n";
        }
    }
}
