<?php

namespace Tests\Unit\Entity;

use Ecommerce\Entity\Cpf;
use PHPUnit\Framework\TestCase;

class CpfTest extends TestCase
{
    public function testInvalidCpf()
    {
        $message = 'CPF no formato inválido.';

        $this->assertSame($message, (new Cpf('121224234545'))->getError());
        $this->assertSame($message, (new Cpf(''))->getError());
        $this->assertSame($message, (new Cpf('333.333.333-0'))->getError());
    }

    public function testValidCpf()
    {
        $cpf = new Cpf('333.333.333-03');

        $this->assertSame('333.333.333-03', (string) $cpf);
    }
}