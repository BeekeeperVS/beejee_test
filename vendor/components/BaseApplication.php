<?php


namespace vendor\components;


use PDO;

class BaseApplication
{

    /**
     * BaseApplication constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        Component::$db = $this->connection($config['db']);
        Component::$urlManager = $this->initUrlManager($config['urlManager']);
    }

    /**
     * @param array $db
     * @return PDO
     */
    private function connection(array $db): PDO
    {
        return new PDO('mysql:host=' . $db['host'] . ';port=3306;dbname=' . $db['dbname'], $db['user'], $db['password']);
    }

    /**
     * @param array $urlManager
     * @return UrlManager
     */
    private function initUrlManager(array $urlManager)
    {
        return new UrlManager($urlManager);
    }
}