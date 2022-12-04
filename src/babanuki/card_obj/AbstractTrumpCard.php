<?php

namespace Babanuki\CardObj;

/**
 * トランプカード共通クラス
 */
class AbstractTrumpCard
{
    /** カードの名称 */
    protected string $card_name;

    /** 強さを示すランク */
    //protected int $rank;

    /**
     * カードの名称をセットする
     *
     * @param string カードの名称
     */
    public function setCardName(string $card_name): void
    {
        $this->card_name = $card_name;
    }

    /**
     * カードの名称を取得する
     *
     * @return string カードの名称
     */
    public function getCardName(): string
    {
        return $this->card_name;
    }
}
