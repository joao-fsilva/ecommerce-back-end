<?php

namespace Tests\Unit\Infra\Converter;

use App\Infra\Converter\StringConverter;
use PHPUnit\Framework\TestCase;

class StringConverterTest extends TestCase
{
    public function testConvertSimpleString()
    {
        $this->assertEmpty((new StringConverter('              '))->convert());
        $this->assertSame('João Paulo', (new StringConverter('João   Paulo  '))->convert());
    }

    public function testConvertStringInArray()
    {
        $data = ['        ', 'João     Paulo    ', ' João '];

        $newData = (new StringConverter($data))->convert();

        $this->assertEmpty($newData[0]);
        $this->assertSame('João Paulo', $newData[1]);
        $this->assertSame('João', $newData[2]);
    }
}