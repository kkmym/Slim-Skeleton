<?php
declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use App\Application\Actions\MyTest\MyTestAction;

return function (App $app) {
    $container = $app->getContainer();

    $app->group('/users', function (Group $group) use ($container) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
    });


    $app->get('/test', function($request, $response) use ($container) {
        $response->getBody()->write('Test');
        return $response;
    });

    $app->get('/mytest', MyTestAction::class);

};
