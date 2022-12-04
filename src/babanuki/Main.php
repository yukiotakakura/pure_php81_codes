<?php

namespace Babanuki;

require_once('BabanukiGame.php');


/** ゲーム参加人数 */
$input_all_player_cnt = inputPlayerCnt();
$babanukiGame = new BabanukiGame();
$babanukiGame->execute($input_all_player_cnt);


/**
 * ゲーム参加者人数を決める
 *
 * @return int ゲーム参加者人数
 */
function inputPlayerCnt(): int
{
    while (true) {
        echo 'ゲーム参加者人数を「2〜4」で選択してください' . PHP_EOL;
        $input = trim(fgets(STDIN));
        if ($input === '2' or $input === '3' or $input === '4') {
            return (int)$input;
        } else {
            echo '「2」「3」「4」のいずれかで入力してください' . PHP_EOL;
            continue;
        }
    }
}
