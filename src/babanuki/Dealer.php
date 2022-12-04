<?php

namespace Babanuki;

use Babanuki\CardObj\JokerCard;
use Babanuki\CardObj\NormalCard;

require_once(__DIR__ . '/card_obj/NormalCard.php');
require_once(__DIR__ . '/card_obj/JokerCard.php');

/**
 * ディーラークラス
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
     * デッキ(53枚)を生成、ゲーム参加者にくばる
     */
    public function __construct(array $all_players)
    {
        $this->createBabanukiDeck();
        $this->dealCards($all_players);
    }

    /**
     * デッキ(53枚)を生成する
     */
    private function createBabanukiDeck(): void
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
    private function dealCards(array $all_players): void
    {
        $target_plyer_index = 0;
        foreach ($this->babanuki_deck as $trump_card) {
            if (count($all_players) === $target_plyer_index) {
                $target_plyer_index = 0;
            }
            $all_players[$target_plyer_index]->addHandDeck($trump_card);
            $target_plyer_index++;
        }
        unset($this->babanuki_deck);
    }
}
