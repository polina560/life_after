<?php

namespace common\enums;

/**
 * Class ModerationStatus
 *
 * @package common\enums
 * @author m.kropukhinsky <m.kropukhinsky@peppers-studio.ru>
 */
enum ModerationStatus: int implements DictionaryInterface
{
    use DictionaryTrait;

    case New = 0;
    case Processed = 10;

    /**
     * {@inheritdoc}
     */
    public function description(): string
    {
        return match ($this) {
            self::New => 'Новое',
            self::Processed => 'Обработано',

        };
    }

    /**
     * {@inheritdoc}
     */
    public function color(): string
    {
        return match ($this) {
            self::New => 'var(--bs-body-color)',
            self::Processed => 'var(--bs-success)',

        };
    }
}
