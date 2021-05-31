<?php

namespace Ecommerce\Entity\User;

use Ecommerce\Entity\Cpf;
use Ecommerce\Entity\Email;
use Ecommerce\Entity\User\Exceptions\CreateUserException;
use Ecommerce\Infra\Util\Converter\StringConverter;
use Ecommerce\Infra\Util\StringUtil;

class User
{
    private ?int $id;
    private string $name;
    private Email $email;
    private Cpf $cpf;
    private array $errors = [];

    public static function createWithNameEmailCpf(string $name, $email, $cpf): self
    {
        return new User($name, new Email($email), new Cpf($cpf));
    }

    public function __construct(string $name, Email $email, Cpf $cpf)
    {
        $this->setName($name);
        $this->setEmail($email);
        $this->setCpf($cpf);

        if (!empty($this->errors)) {
            throw new CreateUserException($this->errors);
        }
    }

    private function setName(string $name): void
    {
        $name = StringConverter::convert($name);

        $minLength = 3;

        if (StringUtil::strLen($name) < $minLength) {
            $this->errors['name'] = "O nome do usuário não pode ter menos de $minLength caracteres.";

            return ;
        }

        $this->name = $name;
    }

    private function setEmail(Email $email): void
    {
        $error = $email->getError();

        if (!is_null($error)) {
            $this->errors['email'] = $error;

            return ;
        }

        $this->email = $email;
    }

    private function setCpf(Cpf $cpf): void
    {
        $error = $cpf->getError();

        if (!is_null($error)) {
            $this->errors['cpf'] = $error;

            return ;
        }



        $this->cpf = $cpf;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function getCpf(): Cpf
    {
        return $this->cpf;
    }
}