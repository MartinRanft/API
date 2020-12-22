<?php

namespace HWS\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response;

class TestController
{
    /**
     * @var \DB
     */
    protected $db;

    public function __construct(\DB $db)
    {
        $this->db = $db;
    }

    public function __invoke(ServerRequestInterface $request) : ResponseInterface
    {
        $testdata = $db->query('SELECT name FROM test');

        $response->getBody()->write($testdata);
        return $response->withStatus(200);
    }
}