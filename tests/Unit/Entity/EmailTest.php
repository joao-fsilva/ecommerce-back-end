<?php

namespace Tests\Unit\Entity;

use Ecommerce\Entity\Email;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    public function testInvalidEmail()
    {
        $message = 'Endereço de e-mail inválido.';

        $this->assertSame($message, (new Email(''))->getError());
        $this->assertSame($message, (new Email('aaaaaa'))->getError());
        $this->assertSame($message, (new Email('aaaa@aaaa'))->getError());
    }

    public function testValidEmail()
    {
        $email = new Email('test@test.com.br');

        $this->assertSame('test@test.com.br', (string) $email);
    }
}