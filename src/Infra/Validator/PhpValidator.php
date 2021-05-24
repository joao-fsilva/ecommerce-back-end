<?php

namespace App\Infra\Validator;

use App\Entity\ValidatorInterface;
use App\Infra\Converter\StringConverter;

class PhpValidator implements ValidatorInterface
{
    private array $errors = [];

    public function notEmpty($data, $key): ValidatorInterface
    {
        $data = (new StringConverter($data))->convert();

        if (is_null($data)) {
            $this->errors[] = "O campo $key não pode ser vazio.";
        }

        return $this;
    }

    public function isArray($data, $key): ValidatorInterface
    {
        $data = (new StringConverter($data))->convert();

        if (!is_array($data)) {
            $this->errors[] = "O campo $key deve ser um array.";
        }

        return $this;
    }

    public function assert(): bool
    {
        if (count($this->errors) > 0) {
            return false;
        }

        $this->unsetErrors();

        return true;
    }

    public function getErrors(): array
    {
        $errors = $this->errors;

        $this->unsetErrors();

        return $errors;
    }

    private function unsetErrors(): void
    {
        $this->errors = [];
    }
}