<?php

declare(strict_types=1);

namespace App\Application\Actions\User;

use App\Domain\DomainException\DomainRecordNotFoundException;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Exception\HttpBadRequestException;

class CreateUserAction extends UserAction {

    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $data = (array)$this->request->getParsedBody();

        $this->userRepository->createUser($data);

        return $this->respondWithData($data,201);
    }
}
