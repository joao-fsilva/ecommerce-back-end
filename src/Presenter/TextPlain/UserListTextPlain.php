<?php

namespace App\Presenter\TextPlain;

use App\Presenter\PresenterInterface;

class UserListTextPlain implements PresenterInterface
{
    public function present(array $data): string
    {
        $total = count($data);

        $text = '-------------------' . "\n";
        $text .= 'Total: ' . $total . "\n";
        $text .= '-------------------' . "\n";

        if ($total === 0) {
            return $text;
        }

        $text .= 'Dados: ' . "\n";
        $text .= '-------------------' . "\n";

        foreach ($data as $user) {
            $text .= sprintf(" ID: %d, \n Nome: %s", $user->getId(), $user->getName());
            $text .= "\n";
            $text .= '-------------------' . "\n";
        }

        return $text;
    }
}