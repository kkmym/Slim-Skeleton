<?php

namespace MyApp\Application\Actions\MyTest;

use App\Application\Actions\Action;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class MyTestAction extends Action
{
    protected $pdo;

    public function __construct(ContainerInterface $containter ,LoggerInterface $logger)
    {
        parent::__construct($logger);
        $this->pdo = $containter->get('MysqlPdo');    
    }
    public function action(): Response
    {
        $result = $this->_getTblTestData();
        return $this->respondWithData($result);
    }

    protected function _getTblTestData()
    {
        $sql = <<< END_OF_SQL
SELECT
    id
    ,val
FROM tbl_test        
END_OF_SQL;
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }
}
