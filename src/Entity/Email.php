<?php

namespace Ecommerce\Entity;

class Email
{
    private string $email;
    private ?string $error = null;

    public function __construct(string $email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $this->error = 'Endereço de e-mail inválido.';
        }

        $this->email = $email;
    }

    public function getError(): ?string
    {
        return $this->error;
    }

    public function __toString(): string
    {
        return $this->email;
    }
}
