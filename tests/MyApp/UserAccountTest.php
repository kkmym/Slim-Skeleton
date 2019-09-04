<?php

namespace Tests\MyApp;

use Tests\TestCase;

class UserAccountTest extends TestCase
{
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
        $request = $request->withParsedBody(['login_id'=>'MyID', 'password'=>'PASSWord', 'last_name'=>'Kamiyama', 'first_name'=>'Kentaro']);
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
}
