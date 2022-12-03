<?php

namespace Babanuki;

require_once('HumanPlayer.php');
require_once('TrumpCard.php');


/** ゲーム参加人数 */
$input_player_cnt = inputPlayerCnt();

$human_name = "私の名前";
$cpu_name = "CPU";
$human_player = new HumanPlayer($human_name);


/**
 * ゲーム参加者人数を決める
 *
 * @return string ゲーム参加者人数
 */
function inputPlayerCnt()
{
    while (true) {
        echo 'ゲーム参加者人数を選択してください' . PHP_EOL;
        $input = trim(fgets(STDIN));
        if ($input === '2' or $input === '3' or $input === '4') {
            return $input;
        } else {
            echo '「2」「3」「4」のいずれかで入力してください' . PHP_EOL;
            continue;
        }
    }
}
