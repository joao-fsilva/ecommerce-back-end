<?php

namespace Tests\Unit\Entity\User;

use Ecommerce\Entity\User\Exceptions\CreateUserException;
use Ecommerce\Entity\User\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testCreateUserWithInvalidName(): void
    {
        try {

            User::createWithNameEmailCpf('ab', 'abc123', '123432543');

        } catch (CreateUserException $e) {

            $errors = $e->getErrors();

            $this->assertCount(3, $errors);
            $this->assertSame('O nome do usuário não pode ter menos de 3 caracteres.', $errors['name']);
            $this->assertSame('Endereço de e-mail inválido.', $errors['email']);
            $this->assertSame('CPF no formato inválido.', $errors['cpf']);
        }
    }

    public function testCreateValidUser(): void
    {
        $user = User::createWithNameEmailCpf('Ana', 'ana@test.com.br', '183.140.440-08');

        $this->assertSame('Ana', $user->getName());
        $this->assertSame('ana@test.com.br', (string) $user->getEmail());
        $this->assertSame('183.140.440-08', (string) $user->getCpf());
    }
}