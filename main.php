<?php
// ファイルのロード
require_once('./RPG/classes/Pokemon.php');
require_once('./RPG/classes/Enemy.php');
require_once('./RPG/classes/Electric.php');
require_once('./RPG/classes/Ice.php');
require_once('./RPG/classes/Message.php');
require_once('./RPG/classes/Esper.php');


// インスタンス化
$members = array();
$members[] = new Electric("ピカチュウ");
$members[] = new Ice("フリーザ");
$members[] = new Esper("ミュウ");

$enemies = array();
$enemies[] = new Enemy("ギャラドス", 100, 100, 20);
$enemies[] = new Enemy("カイリュウ", 120, 120, 20);
$enemies[] = new Enemy("レックウザ", 130, 130, 30);

$turn = 1;

$isFinishFig = false;

$messageObj = new Message;

// 戦闘開始のメッセージを出力
$messageObj->displayFirstMessage();

// 終了条件の判定
function isFinish($objects)
{
    $deathCnt = 0; // HPが0以下の仲間の数
    foreach ($objects as $object) {
        // 1人でもHPが0を超えていたらfalseを返す
        if ($object->getHitPoint() > 0) {
            return false;
        }
        $deathCnt++;
    }
    // 死亡数(HPが0以下の数)と仲間数が同じであればtrueを返す
    if ($deathCnt == count($objects)) {
        return true;
    }
}

// どちらかのHPが0になるまで戦闘を繰り返す
while (!$isFinishFig) {
    echo "*** $turn ターン目 *** \n\n";

    // 仲間の表示
    $messageObj->displayStatusMessage($members);
    // 敵の表示
    $messageObj->displayStatusMessage($enemies);

    // 仲間の攻撃
    $messageObj->displayAttackMessage($members, $enemies);
    // 敵の攻撃
    $messageObj->displayAttackMessage($enemies, $members);

    // 戦闘終了条件のチェック 仲間全員のHPが0 または 敵全員のHPが0
    $isFinishFig = isFinish($members);
    if ($isFinishFig) {
        $message = "もう戦えるポケモンが居ない...！\n 主人公は目の前が真っ白になった。 \n";
        break;
    }

    $isFinishFig = isFinish($enemies);
    if ($isFinishFig) {
        $message = "♪♪♪ 四天王のワタルとのたたかいに勝った！ ♪♪♪\n\n";
        break;
    }

    $turn++;
}

echo "\n";
echo $message;

// 仲間の表示
$messageObj->displayStatusMessage($members);

// 敵の表示
$messageObj->displayStatusMessage($enemies);
