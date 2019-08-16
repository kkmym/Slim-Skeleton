<?php

namespace MyApp\Application\Actions\UserAccount\Register;

use App\Application\Actions\Action;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;
use Slim\Views\PhpRenderer;

class FormAction extends Action
{
    public function __construct(LoggerInterface $logger)
    {
        parent::__construct($logger);
    }

    public function action(): Response
    {
        $viewData['title'] = 'タイトルに入る文字列';
        $viewData['h1'] = 'H1に入る文字列';
        $phpview = new PhpRenderer('../templates/');
        return $phpview->render($this->response, "form.php", $viewData);
    }
}
