<?php

namespace MyApp\Application\Actions\UserAccount\Register;

use App\Application\Actions\Action;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;
use Slim\Views\PhpRenderer;

class DoneAction extends Action
{
    protected $phpRenderer;

    public function __construct(LoggerInterface $logger, PhpRenderer $phpRenderer)
    {
        parent::__construct($logger);
        $this->phpRenderer = $phpRenderer;
    }

    public function action(): Response
    {
        $viewData = [];
        return $this->phpRenderer->render($this->response, "user_account/register/done.php", $viewData);
    }
}
