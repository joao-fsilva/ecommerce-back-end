<?php

namespace Ecommerce\Application\User;

use Ecommerce\Entity\User\UserRepositoryInterface;

class ListUser
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(): array
    {
        return $this->userRepository->getAll();
    }
}