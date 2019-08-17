<?php

namespace MyApp\Application\Actions\UserAccount\Register;

use App\Application\Actions\Action;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class PostAction extends Action
{
    public function __construct(LoggerInterface $logger)
    {
        parent::__construct($logger);
    }

    public function action(): Response
    {
        return $this->response
            ->withHeader('Location', '/user_account/register/done')
            ->withStatus(302);
    }
}
