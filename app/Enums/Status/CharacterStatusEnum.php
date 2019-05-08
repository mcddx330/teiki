<?php

namespace App\Enum\Status;

final class CharacterStatusEnum {
    const DEFAULT_LEVEL   = 10;
    const DEFAULT_HP      = 10;
    const DEFAULT_ATTACK  = 10;
    const DEFAULT_DEFENSE = 10;

    const TITLES        = [
        'はじめまして',
    ];
    const DEFAULT_TITLE = self::TITLES[0];
}