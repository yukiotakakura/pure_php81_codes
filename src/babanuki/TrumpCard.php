<?php

namespace TrumpCard;

/**
 * トランプカード単体クラス
 */
class TrumpCard
{
    /**
     * シンボルの種類
     * [スペード・クラブ・ダイヤ・ハート]のいずれかを格納する
     */
    private string $suit;

    /**
     * 数札
     * [A・2〜10・J・Q・K]のいずれかを格納する
     */
    private string $pip_num;

    /** 強さを示すランク */
    private string $rank;

    /**
     * マークを取得する
     *
     * @return string マーク
     */
    public function getSuit(): string
    {
        return $this->suit;
    }

    /**
     * 数札を取得する
     *
     * @return string 数札
     */
    public function getPipNum(): string
    {
        return $this->pip_num;
    }
}
