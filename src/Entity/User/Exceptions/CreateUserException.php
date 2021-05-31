<?php

namespace Ecommerce\Entity\User\Exceptions;

class CreateUserException extends \DomainException
{
    private array $errors;

    public function __construct(array $errors)
    {
        parent::__construct('Usuário invalido');

        $this->errors = $errors;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}