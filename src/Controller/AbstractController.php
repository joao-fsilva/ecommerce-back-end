<?php

namespace App\Controller;

use Psr\Http\Message\ResponseInterface;

abstract class AbstractController
{
    protected function successResponse(ResponseInterface $response, int $status = 200) : ResponseInterface
    {
        $response->getBody()->write(json_encode(['success' => true]));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus($status);
    }

    protected function errorResponse(ResponseInterface $response, int $status = 400) : ResponseInterface
    {
        $response->getBody()->write(json_encode(['error' => true]));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus($status);
    }
}