<?php

namespace Ecommerce\Controller;

use Ecommerce\Application\User\ListUser;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class UserController extends AbstractController
{
    private ListUser $listUser;

    public function __construct(ListUser $listUser)
    {
        $this->listUser = $listUser;
    }

    public function index(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $users = $this->listUser->execute();

        $response->getBody()->write('');

        return $this->successResponse($response);
    }
}