<?php

namespace Babanuki\PlayerObj;

use Babanuki\CardObj\AbstractTrumpCard;
use Babanuki\DiscardTable;

//require_once(__DIR__ . '/DiscardTable.php');
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

    /**
     * 手札の重複カードを捨てる
     *
     * @param DiscardTable $discard_table 捨て札を捨てるテーブル
     */
    public function removeHandDeckDuplicate(DiscardTable $discard_table)
    {
        // ①削除したいトランプカードに目印をつける(論理削除)
        $is_remove = '削除対象';
        for ($i = 0; $i < count($this->hand_deck); $i++) {
            $target_card1 = $this->hand_deck[$i];
            if ($this->isJoker($target_card1->getCardName()) or $target_card1->getRemoveMark() === $is_remove) {
                // ジョーカーの場合 && 削除対象の場合
                continue;
            }
            for ($j = $i + 1; $j < count($this->hand_deck); $j++) {
                $target_card2 = $this->hand_deck[$j];
                if (!$this->isJoker($target_card2->getCardName()) && $target_card1->getPipNum() === $target_card2->getPipNum()) {
                    // ジョーカー以外の場合 && ターゲット1とターゲット2が一致している場合
                    $target_card1->setRemoveMark($is_remove);
                    $target_card2->setRemoveMark($is_remove);
                    break;
                }
            }
        }

        // ①でつけた目印に対して削除する(物理削除)
        foreach ($this->hand_deck as $key => $trump_card) {
            if ($this->isJoker($trump_card->getCardName())) {
                continue;
            }
            if ($trump_card->getRemoveMark() === $is_remove) {
                $discard_table->setDisCards($this->player_name, $trump_card);
                unset($this->hand_deck[$key]);
            }
        }

        // 抜け番を振り直す
        $this->hand_deck = array_values($this->hand_deck);
    }

    private function isJoker(string $card_name): bool
    {
        return $card_name === 'ジョーカー';
    }
}
