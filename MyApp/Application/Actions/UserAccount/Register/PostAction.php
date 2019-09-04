<?php

namespace MyApp\Application\Actions\UserAccount\Register;


use App\Application\Actions\Action;
use MyApp\Domain\Entities\User;
use MyApp\Infrastructure\Repositories\UserRepository;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Log\LoggerInterface;

class PostAction extends Action
{
    /** @var $repo UserRepository */
    protected $repo;

    public function __construct(LoggerInterface $logger, UserRepository $repo)
    {
        parent::__construct($logger);
        $this->repo = $repo;
    }

    protected function action(): Response
    {
        $parsedBody = $this->request->getParsedBody();
        $user = User::getInstanceOfNewUser(
            $parsedBody['login_id']
            ,$parsedBody['password']
            ,$parsedBody['last_name']
            ,$parsedBody['first_name']
        );
        $this->repo->store($user);

        return $this->response
            ->withHeader('Location', '/user_account/register/done')
            ->withStatus(302);
    }
}
