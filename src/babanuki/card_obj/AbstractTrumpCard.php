<?php

namespace Babanuki\CardObj;

/**
 * トランプカード共通クラス
 */
class AbstractTrumpCard
{
    /** カードの名称 */
    protected string $card_name;

    /**
     * 削除目印
     * 「削除対象」「削除対象外」のいずれかが格納される
     * このインスタンス変数は重複カードを捨てる処理で使う
     */
    protected string $remove_mark = "削除対象外";

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

    /**
     * 削除目印を取得する
     *
     * @return string 削除目印
     */
    public function setRemoveMark(string $remove_mark)
    {
        $this->remove_mark = $remove_mark;
    }

    /**
     * 削除目印を取得する
     *
     * @return string 削除目印
     */
    public function getRemoveMark(): string
    {
        return $this->remove_mark;
    }
}
