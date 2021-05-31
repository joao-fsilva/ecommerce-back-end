<?php

namespace Ecommerce\Entity\User;

interface UserRepositoryInterface
{
    public function updateOrCreate(User $user): User;

    /**
     * @return User[]
     */
    public function getAll(): array;
}