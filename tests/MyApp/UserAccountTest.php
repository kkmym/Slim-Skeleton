<?php

namespace Tests\MyApp;

use Tests\TestCase;

class UserAccountTest extends TestCase
{
    public function testRouteRegisterForm()
    {
        $app = $this->getAppInstance();

        $request = $this->createRequest('GET', '/user-account/register/form');
        $response = $app->handle($request);

        $statusCode = $response->getStatusCode();

        $this->assertEquals(200, $statusCode);
    }
}
