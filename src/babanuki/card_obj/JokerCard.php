<?php

namespace Babanuki\CardObj;

require_once('AbstractTrumpCard.php');

/**
 * ジョーカ-カードクラス
 */
class JokerCard extends AbstractTrumpCard
{
    /**
     * コンストラクタ
     * 名称をセット
     */
    public function __construct()
    {
        $card_name = "ジョーカー";
        $this->setCardName($card_name);
    }
}
