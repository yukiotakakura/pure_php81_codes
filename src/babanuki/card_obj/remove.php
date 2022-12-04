<?php

namespace Babanuki\CardObj;

require_once('NormalCard.php');
require_once('JokerCard.php');
/**
 * デッキクラス
 */
class BabanukiDeck
{
    /** デッキ */
    private array $babanuki_deck;

    /** マーク */
    private const SUIT_LIST = ['スペード', 'クラブ', 'ダイヤ', 'ダイヤ'];

    /** 数札 */
    private const PIP_NUM_LIST = ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'];

    /**
     * コンストラクタ
     * トランプ５２枚 + Joker を作成する
     */
    public function __construct()
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
     * コンストラクタ
     * トランプ５２枚 + Joker を作成する
     */
    public function getBabanukiDeck(): array
    {
        return $this->babanuki_deck;
    }
}
