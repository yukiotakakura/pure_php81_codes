<?php

namespace Babanuki;

use Babanuki\PlayerObj\ComputerPlayer;
use Babanuki\PlayerObj\HumanPlayer;

require_once(__DIR__ . '/player_obj/HumanPlayer.php');
require_once(__DIR__ . '/player_obj/ComputerPlayer.php');
require_once('Dealer.php');
require_once('DiscardTable.php');

/**
 * ばばぬき実行クラス
 */
class BabanukiGame
{
    /** ディーラー */
    private Dealer $dealer;

    /** 捨て札を捨てるテーブル */
    private DiscardTable $discard_table;

    /** 人間が操作するプレイヤー */
    private HumanPlayer $human_player;

    /** CPUリスト */
    private array $computer_players;

    /** CPUリスト */
    private array $all_players;
    /**
     * ばばぬきを実行する
     * 
     * @param  int $input_all_player_cnt ゲーム参加人数
     * @return void
     */
    public function execute(int $input_all_player_cnt): void
    {
        $this->init($input_all_player_cnt);

        //重複カードを削除する
        foreach ($this->all_players as $player) {
            $player->removeHandDeckDuplicate($this->discard_table);
        }

        // TODO 相手のカードを引く処理

    }

    /**
     * ばばぬき初期設定
     * 
     * @param  int $input_all_player_cnt ゲーム参加人数
     * @return void
     */
    private function init(int $input_all_player_cnt): void
    {
        $human_name = "私の名前";
        $cpu_name = "CPU";

        // CPUの人数
        $cpu_all_player_cnt = $input_all_player_cnt - 1;

        // ゲーム参加者を生成
        $this->human_player = new HumanPlayer($human_name);
        for ($i = 0; $i < $cpu_all_player_cnt; $i++) {
            $cpu_name = $cpu_name . ($i + 1);
            $this->computer_players[] = new ComputerPlayer($cpu_name);
        }

        $this->all_players = array_merge(array($this->human_player), $this->computer_players);

        // ディーラー生成、デッキをゲーム参加者に配布 
        $this->dealer = new Dealer($this->all_players);

        $this->discard_table = new DiscardTable();
    }
}
