<?php 

class Message
{
    public function displayFirstMessage()
    {
        echo "四天王のワタルが勝負を仕掛けてきた! \n\n";
    }

    // ステータス表示
    public function displayStatusMessage($objects)
    {

        foreach ($objects as $object) {
            echo $object->getName() . " : " . $object->getHitPoint() . "/" . $object->getMaxHitPoint() . "\n";
        }
        echo "\n";
    }

    // 攻撃メッセージ
    public function displayAttackMessage($objects, $targets)
    {
        foreach ($objects as $object) {
            //Esperタイプの場合、味方のオブジェクトも渡す
            if (get_class($object) == "Esper") {
                $attackResult = $object->doAttackEsper($targets, $objects);
            } else {
                $attackResult = $object->doAttack($targets);
            }
            // HPが0のときに改行が表示されないようにする処理
            if ($attackResult) {
                echo "\n";
            }
            $attackResult = false;
        }
        echo "\n";
    }
}




?>