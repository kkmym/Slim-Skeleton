<?php

namespace Tests;

class MyTest extends TestCase
{
    public function testHello()
    {
        $this->assertEquals('hello', 'hello');
    }

    public function testRouteTest()
    {
        $app = $this->getAppInstance();

        $request = $this->createRequest('GET', '/test');
        $response = $app->handle($request);

        $body = (string)$response->getBody();

        $this->assertEquals('Test', $body);
    }

    public function testRouteMyTest()
    {
        $app = $this->getAppInstance();

        $request = $this->createRequest('GET', '/mytest');
        $response = $app->handle($request);

        $statusCode = $response->getStatusCode();

        $this->assertEquals(200, $statusCode);
    }

    public function testRouteMyTestForm()
    {
        $app = $this->getAppInstance();

        $request = $this->createRequest('GET', '/mytest/form');
        $response = $app->handle($request);

        $statusCode = $response->getStatusCode();
        $this->assertEquals(200, $statusCode);

        $body = $response->getBody();
        $this->assertRegExp('/form/', $body);
    }
}
