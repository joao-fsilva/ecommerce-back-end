<?php

namespace App\Presenter;

interface PresenterInterface
{
    public function present(array $data): string;
}