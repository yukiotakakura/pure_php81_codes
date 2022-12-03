<?php

namespace DiscardTable;

/**
 * 捨て札を捨てるテーブルクラス
 */
class DiscardTable
{
    /** 捨札リスト */
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
}
