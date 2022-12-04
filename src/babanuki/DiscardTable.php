<?php

namespace Babanuki;

use Babanuki\CardObj\NormalCard;

/**
 * 捨て札を捨てるテーブルクラス
 */
class DiscardTable
{
    /**
     * 捨札リスト
     * 形式：[key]["プレイヤー名" => "トランプカード(通常)"]
     */
    private array $discards;

    /**
     * 捨札一覧を表示する
     *
     * @return void
     */
    public function showDiscards(): void
    {
        foreach ($this->discards as $name => $discard) {
            echo $name . $discard;
        }
    }

    /**
     * 捨札リストにセットする
     *
     * @return void
     */
    public function setDisCards(string $player_name, NormalCard $trump_card): void
    {
        $this->discards[] = [$player_name => $trump_card];
    }
}
