<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Monolog\Formatter\LineFormatter;
use Slim\Views\PhpRenderer;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        LoggerInterface::class => function (ContainerInterface $c) {
            $settings = $c->get('settings');

            $loggerSettings = $settings['logger'];
            $logger = new Logger($loggerSettings['name']);

            $processor = new UidProcessor();
            $logger->pushProcessor($processor);

            // $formatter = new LineFormatter();
            // $formatter->includeStacktraces(true);

            $handler = new StreamHandler($loggerSettings['path'], $loggerSettings['level']);
            // $handler->setFormatter($formatter);
            $logger->pushHandler($handler);

            return $logger;
        },
        'MysqlPdo' => function() {
            $dsn = 'mysql:host=mysql;dbname=mydb';
            $user = 'root';
            $pw = 'RootPassw0rd';
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ];
            $pdo = new \PDO($dsn, $user, $pw, $options);
    
            return $pdo;
        },
        PhpRenderer::class => function() {
            $templatePath = __DIR__ . '/../templates/';
            return new PhpRenderer($templatePath);
        }
    ]);
};
