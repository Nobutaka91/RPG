<?php
require_once('./RPG/classes/Pokemon.php');
require_once('./RPG/classes/Enemy.php');
require_once('./RPG/classes/Electric.php');

$pikachu = new Electric();
$isitubute = new Enemy();

$pikachu->name = "ピカチュウ";
$isitubute->name = "ギャラドス";

$turn = 1;


// どちらかのHPが0になるまで戦闘を繰り返す
while ($pikachu->hitPoint > 0 && $isitubute->hitPoint > 0) {
    echo "*** $turn ターン目 *** \n\n";

    // 現在のHPの表示
    echo $pikachu->name . " : " . $pikachu->hitPoint . "/" . $pikachu::MAX_HITPOINT . "\n";
    echo $isitubute->name . " : " . $isitubute->hitPoint . "/" . $isitubute::MAX_HITPOINT . "\n\n";

    // 攻撃
    $pikachu->doAttack($isitubute);
    echo "\n";
    $isitubute->doAttack($pikachu);
    echo "\n";

    $turn++;
}

echo "☆☆☆ 戦闘終了 ☆☆☆ \n\n";
echo $pikachu->name . " : " . $pikachu->hitPoint . "/" . $pikachu::MAX_HITPOINT . "\n";
echo $isitubute->name . " : " . $isitubute->hitPoint . "/" . $isitubute::MAX_HITPOINT . "\n\n";
