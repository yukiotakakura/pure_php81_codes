<?php

namespace Babanuki\PlayerObj;

/**
 * プレイヤー共通クラス
 */
class AbstractPlayer
{
    /** プレイヤー名 */
    protected string $player_name;

    /** 手札 */
    protected array $hand_deck = [];

    /**
     * コンストラクタ
     *
     * @param string $name 名前
     */
    public function __construct(string $player_name)
    {
        $this->player_name = $player_name;
    }
}
