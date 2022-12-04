<?php

namespace Babanuki\PlayerObj;

use Babanuki\CardObj\AbstractTrumpCard;

/**
 * プレイヤー共通クラス
 */
class AbstractPlayer
{
    /** プレイヤー名 */
    protected string $player_name;

    /** 手札 */
    protected array $hand_deck;

    /**
     * コンストラクタ
     *
     * @param string $name 名前
     */
    public function __construct(string $player_name)
    {
        $this->player_name = $player_name;
    }

    /**
     * トランプカードを手札に追加する
     *
     * @param AbstractTrumpCard $trump_card トランプカード
     */
    public function addHandDeck(AbstractTrumpCard $trump_card)
    {
        $this->hand_deck[] = $trump_card;
    }
}
