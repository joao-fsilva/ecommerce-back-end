<?php

namespace Ecommerce\Entity;

use Ecommerce\Infra\Util\Converter\StringConverter;

class Cpf
{
    private string $number;
    private ?string $error = null;

    public function __construct(string $number)
    {
        $this->setNumber($number);
    }

    private function setNumber(string $number): void
    {
        $number = StringConverter::convert($number);

        $options = [
            'options' => [
                'regexp' => '/\d{3}\.\d{3}\.\d{3}\-\d{2}/'
            ]
        ];

        if (filter_var($number, FILTER_VALIDATE_REGEXP, $options) === false) {
            $this->error = 'CPF no formato inválido.';

            return ;
        }

        $this->number = $number;
    }

    public function getError(): ?string
    {
        return $this->error;
    }

    public function __toString(): string
    {
        return $this->number;
    }
}
