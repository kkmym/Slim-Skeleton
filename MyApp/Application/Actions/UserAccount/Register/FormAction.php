<?php

namespace MyApp\Application\Actions\UserAccount\Register;

use App\Application\Actions\Action;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class FormAction extends Action
{
    public function __construct(LoggerInterface $logger)
    {
        parent::__construct($logger);
    }

    public function action(): Response
    {
        $this->logger->info('xxxxx');
        throw new \Exception('xxx');
        return $this->respondWithData();
    }
}
