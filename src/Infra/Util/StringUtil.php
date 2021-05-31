<?php

namespace Ecommerce\Infra\Util;

class StringUtil
{
    public static function strLen(?string $string): int
    {
        return mb_strlen($string, 'UTF-8');
    }
}