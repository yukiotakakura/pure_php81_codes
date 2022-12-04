<?php

namespace Babanuki\CardObj;

require_once('AbstractTrumpCard.php');

/**
 * 通常カードクラス
 */
class NormalCard extends AbstractTrumpCard
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

    /**
     * マークをセットする
     *
     * @param string マーク
     */
    public function setSuit(string $suit): void
    {
        $this->suit = $suit;
    }

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
     * 数札をセットする
     *
     * @param string 数札
     */
    public function setPipNum(string $pip_num): void
    {
        $this->pip_num = $pip_num;
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
