<?php

namespace Tests\MyApp\Application\Actions;

use Tests\TestCase;

class UserAccountTest extends TestCase
{
    protected $postLoginId = '7c13888aaa834f07897d9806ec77b94a';

    public function testRouteRegisterForm()
    {
        $app = $this->getAppInstance();

        $request = $this->createRequest('GET', '/user_account/register/form');
        $response = $app->handle($request);

        $statusCode = $response->getStatusCode();

        $this->assertEquals(200, $statusCode);
    }

    public function testRouteRegisterPost()
    {
        $app = $this->getAppInstance();

        $request = $this->createRequest('POST', '/user_account/register/post', ['Content-Type'=>'application/x-www-form-urlencoded']);
        $request = $request->withParsedBody(['login_id'=>$this->postLoginId, 'password'=>'PASsW0rd', 'last_name'=>'Kamiyama', 'first_name'=>'Kentaro']);
        $response = $app->handle($request);

        $statusCode = $response->getStatusCode();

        $this->assertEquals(302, $statusCode);
    }

    public function testRouteRegisterDone()
    {
        $app = $this->getAppInstance();

        $request = $this->createRequest('GET', '/user_account/register/done');
        $response = $app->handle($request);

        $statusCode = $response->getStatusCode();

        $this->assertEquals(200, $statusCode);
    }

    protected function tearDown()
    {
        $app = $this->getAppInstance();
        $container = $app->getContainer();
        $pdo = $container->get('MysqlPdo');
        $sql = <<< END_OF_SQL
DELETE FROM users
WHERE login_id = '{$this->postLoginId}'
END_OF_SQL;
        $pdo->exec($sql);
    }

}
