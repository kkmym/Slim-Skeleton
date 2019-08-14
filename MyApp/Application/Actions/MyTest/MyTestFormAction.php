<?php

namespace MyApp\Application\Actions\MyTest;

use App\Application\Actions\Action;
use Psr\Http\Message\ResponseInterface as Response;

class MyTestFormAction extends Action
{
    public function action(): Response
    {
        $data = [
            'form' => 'element',
        ];
        return $this->respondWithData($data);
    }
}
