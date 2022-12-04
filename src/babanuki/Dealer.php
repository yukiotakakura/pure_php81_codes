<?php

namespace Babanuki;

use Babanuki\CardObj\JokerCard;
use Babanuki\CardObj\NormalCard;
use Babanuki\PlayerObj\HumanPlayer;

require_once(__DIR__ . '/card_obj/NormalCard.php');
require_once(__DIR__ . '/card_obj/JokerCard.php');

/**
 * 捨て札を捨てるテーブルクラス
 */
class Dealer
{
    // /** ばば抜きデッキクラス */
    // private BabanukiDeck $babanuki_deck;
    /** デッキ */
    private array $babanuki_deck;

    /** マーク */
    private const SUIT_LIST = ['スペード', 'クラブ', 'ダイヤ', 'ダイヤ'];

    /** 数札 */
    private const PIP_NUM_LIST = [
        'A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'
    ];

    /**
     * コンストラクタ
     * デッキ(53枚)を生成、各参加者にくばる
     */
    public function __construct(HumanPlayer $human_player, array $computer_players)
    {
        $this->createBabanukiDeck();

        $all_players = array_merge(array($human_player), $computer_players);
        $this->dealCards($all_players);
    }

    /**
     * デッキ(53枚)を生成する
     */
    private function createBabanukiDeck()
    {
        foreach (self::SUIT_LIST as $suit) {
            foreach (self::PIP_NUM_LIST as $pip_num) {
                $normarl_card = new NormalCard();
                $normarl_card->setSuit($suit);
                $normarl_card->setPipNum($pip_num);
                $card_name = $suit . "の" . $pip_num;
                $normarl_card->setCardName($card_name);

                $this->babanuki_deck[] = $normarl_card;
            }
        }
        $this->babanuki_deck[] = new JokerCard();
        shuffle($this->babanuki_deck);
    }

    /**
     * デッキ(53枚)を各参加者に配布する
     */
    private function dealCards(array $all_players)
    {
        $target_plyer_index = 0;
        foreach ($this->babanuki_deck as $trump_card) {
            if (count($all_players) === $target_plyer_index) {
                $target_plyer_index = 0;
            }
            $all_players[$target_plyer_index]->addHandDeck($trump_card);
            $target_plyer_index++;
        }
        // TODO デッキを削除する処理

    }
}
