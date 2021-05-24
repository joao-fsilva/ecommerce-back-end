<?php

namespace App\UseCase\User;

use App\Entity\User\User;
use App\Entity\User\UserRepositoryInterface;
use App\Entity\ValidatorInterface;

class UpdateOrCreateUser
{
    private UserRepositoryInterface $userRepository;
    private ValidatorInterface $validator;

    public function __construct(UserRepositoryInterface $userRepository, ValidatorInterface $validator)
    {
        $this->userRepository = $userRepository;
        $this->validator = $validator;
    }

    public function execute(array $data): User
    {
        $status = $this->validator
            ->notEmpty($data['name'], 'name')
            ->assert();

        if (!$status) {
            throw new \DomainException($this->validator->getErrors());
        }

        $user = new User('João Paulo');

        return $this->userRepository->updateOrCreate($user);
    }
}