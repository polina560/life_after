<?php

namespace common\enums;

enum UserStatus : int implements DictionaryInterface
{
    use DictionaryTrait;

    case AtLarge = 0;
    case Probation = 10;

    /**
     * {@inheritdoc}
     */
    public function description(): string
    {
        return match ($this) {
            self::AtLarge => 'На свободе',
            self::Probation => 'Условный срок',

        };
    }

    /**
     * {@inheritdoc}
     */
    public function color(): string
    {
        return match ($this) {
            self::AtLarge => 'var(--bs-body-color)',
            self::Probation => 'var(--bs-success)',

        };
    }


}
