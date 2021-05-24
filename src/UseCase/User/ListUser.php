<?php

namespace App\UseCase\User;

use App\Entity\User\UserRepositoryInterface;
use App\Presenter\PresenterInterface;

class ListUser
{
    private UserRepositoryInterface $userRepository;
    private PresenterInterface $presenter;

    public function __construct(UserRepositoryInterface $userRepository, PresenterInterface $presenter)
    {
        $this->userRepository = $userRepository;
        $this->presenter = $presenter;
    }

    public function execute(): string
    {
        $users = $this->userRepository->getAll();

        return $this->presenter->present($users);
    }
}