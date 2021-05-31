<?php

namespace Ecommerce\Infra\Util\Converter;

class StringConverter
{
    public static function convert(?string $string): ?string
    {
        $string = preg_replace('/\s{2,}/', ' ', $string);
        $string = trim($string);

        return !empty($string) ? $string : null;
    }
}