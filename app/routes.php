<?php
declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use MyApp\Application\Actions\MyTest\MyTestAction;
use MyApp\Application\Actions\MyTest\MyTestFormAction;
use MyApp\Application\Actions\UserAccount\Register\FormAction;

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
    $app->get('/mytest/form', MyTestFormAction::class);

    $app->group("/user-account", function(Group $group) use ($container) {
        $group->get('/register/form', FormAction::class);
    });
};
