<?php
// ファイルのロード
require_once('./RPG/classes/Pokemon.php');
require_once('./RPG/classes/Enemy.php');
require_once('./RPG/classes/Electric.php');

// インスタンス化
$pikachu = new Electric("ピカチュウ");
$gallados = new Enemy("ギャラドス");

$turn = 1;


// どちらかのHPが0になるまで戦闘を繰り返す
while ($pikachu->getHitPoint() > 0 && $gallados->getHitPoint() > 0) {
    echo "*** $turn ターン目 *** \n\n";

    // 現在のHPの表示
    echo $pikachu->getName() . " : " . $pikachu->getHitPoint() . "/" . $pikachu::MAX_HITPOINT . "\n";
    echo $gallados->getName() . " : " . $gallados->getHitPoint() . "/" . $gallados::MAX_HITPOINT . "\n\n";

    // 攻撃
    $pikachu->doAttack($gallados);
    echo "\n";
    $gallados->doAttack($pikachu);
    echo "\n";

    $turn++;
}

echo "☆☆☆ 戦闘終了 ☆☆☆ \n\n";
echo $pikachu->getName() . " : " . $pikachu->getHitPoint() . "/" . $pikachu::MAX_HITPOINT . "\n";
echo $gallados->getName() . " : " . $gallados->getHitPoint() . "/" . $gallados::MAX_HITPOINT . "\n\n";
