<?php

namespace App\Entity;

interface ValidatorInterface
{
    public function notEmpty($data, $key): self;

    public function isArray($data, $key): self;

    public function assert(): bool;

    public function getErrors(): array;
}