<?php

namespace Babanuki;

use Babanuki\PlayerObj\ComputerPlayer;
use Babanuki\PlayerObj\HumanPlayer;

require_once(__DIR__ . '/player_obj/HumanPlayer.php');
require_once(__DIR__ . '/player_obj/ComputerPlayer.php');
require_once('Dealer.php');

/**
 * ばばぬき実行クラス
 */
class BabanukiGame
{
    /** ディーラー */
    private Dealer $dealer;

    /** 人間が操作するプレイヤー */
    private HumanPlayer $human_player;

    /** CPUリスト */
    private array $computer_players;

    /**
     * ばばぬきを実行する
     * 
     * @param  int $input_all_player_cnt ゲーム参加人数
     * @return void
     */
    public function execute(int $input_all_player_cnt): void
    {
        $this->init($input_all_player_cnt);
    }

    /**
     * ばばぬき初期設定
     * 
     * @param  int $input_all_player_cnt ゲーム参加人数
     * @return void
     */
    private function init(int $input_all_player_cnt): void
    {
        // 名前系
        $human_name = "私の名前";
        $cpu_name = "CPU";

        // 人数系
        $cpu_all_player_cnt = $input_all_player_cnt - 1;

        // プレイヤー系
        $this->human_player = new HumanPlayer($human_name);
        for ($i = 0; $i < $cpu_all_player_cnt; $i++) {
            $cpu_name = $cpu_name . ($i + 1);
            $this->computer_players[] = new ComputerPlayer($cpu_name);
        }

        // ディーラー
        $this->dealer = new Dealer($this->human_player, $this->computer_players);
    }
}
