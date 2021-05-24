<?php

namespace App\Infra\Converter;

use App\Entity\ConverterInterface;

class StringConverter implements ConverterInterface
{
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function convert()
    {
        if (is_array($this->data)) {
            return array_map([$this, 'execute'], $this->data);
        }

        return $this->execute($this->data);
    }

    private function execute($data): ?string
    {
        $data = preg_replace('/\s{2,}/', ' ', $data);
        $data = trim($data);

        return !empty($data) ? $data : null;
    }
}