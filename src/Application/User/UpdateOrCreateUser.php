<?php

namespace Ecommerce\Application\User;

use Ecommerce\Entity\User\User;
use Ecommerce\Entity\User\UserRepositoryInterface;

class UpdateOrCreateUser
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute(array $data): User
    {
        //TODO
        $user = null;

        return $this->userRepository->updateOrCreate($user);
    }
}