<?php
// ファイルのロード
require_once('./RPG/classes/Pokemon.php');
require_once('./RPG/classes/Enemy.php');
require_once('./RPG/classes/Electric.php');
require_once('./RPG/classes/Ice.php');
require_once('./RPG/classes/Esper.php');


// インスタンス化
$members = array();
$members[] = new Electric("ピカチュウ");
$members[] = new Ice("フリーザ");
$members[] = new Esper("ミュウ");

$enemies = array();
$enemies[] = new Enemy("ギャラドス", 120, 20);
$enemies[] = new Enemy("カイリュウ", 140, 25);
$enemies[] = new Enemy("レックウザ", 160, 30);

$turn = 1;

$isFinishing = false;

echo "四天王のワタルが勝負を仕掛けてきた! \n\n";

// どちらかのHPが0になるまで戦闘を繰り返す
while (!$isFinishing) {
    echo "*** $turn ターン目 *** \n\n";

    // 現在のHPの表示
    foreach ($members as $member) {
        echo $member->getName() . " : " . $member->getHitPoint() . "/" . $member::MAX_HITPOINT . "\n";
    }
    echo "\n";
    foreach ($enemies as $enemy) {
        echo $enemy->getName() . " : " . $enemy->getHitPoint() . "/" . $enemy->getMaxHitPoint() . "\n";
    }
    echo "\n";

    // 味方の攻撃
    foreach ($members as $member) {
        // 配列からランダムに敵を決定する
        // $enemyIndex = rand(0, count($enemies) - 1); // 添え字は0から始まるので, -1する
        // $enemy = $enemies[$enemyIndex];

        //Esperタイプの場合、味方のオブジェクトも渡す
        if (get_class($member) == "Esper") {
            $member->doAttackEsper($enemies, $members);
        } else {
            $member->doAttack($enemies);
        }
        echo "\n";
    }
    echo "\n";

    // 敵の攻撃
    foreach ($enemies as $enemy) {
        // 配列からランダムに攻撃対象を決定する
        // $memberIndex = rand(0, count($members) - 1); // 添え字は0から始まるので, -1する
        // $member = $members[$memberIndex];
        $enemy->doAttack($members);
        echo "\n";
    }
    echo "\n";

    //仲間の全滅チェック
    $deathCnt = 0; // HPが0以下の仲間の数
    foreach ($members as $member) {
        if ($member->getHitPoint() > 0) {
            $isFinishing = false;
            break;
        }
        $deathCnt++;
    }
    if ($deathCnt == count($members)) {
        $isFinishing = true;
        echo "もう戦えるポケモンが居ない...！ \n";
        echo "主人公は目の前が真っ白になった。 \n";
        break;
    }

    // 敵の全滅チェック
    $deathCnt = 0; // HPが0以下の敵の数
    foreach ($enemies as $enemy) {
        if ($enemy->getHitPoint() > 0) {
            $isFinishing = false;
            break;
        }
        $deathCnt++;
    }
    if ($deathCnt == count($enemies)) {
        $isFinishing = true;
        echo "♪♪♪ 四天王のワタルをたおした！ ♪♪♪\n\n";
        break;
    }

    $turn++;
}

echo "\n";
echo "☆☆☆ 戦闘終了 ☆☆☆ \n\n";
// 現在のHPの表示
foreach ($members as $member) {
    echo $member->getName() . " : " . $member->getHitPoint() . "/" . $member::MAX_HITPOINT . "\n";
}
echo "\n";
foreach ($enemies as $enemy) {
    echo $enemy->getName() . " : " . $enemy->getHitPoint() . "/" . $enemy->getMaxHitPoint() . "\n";
}
