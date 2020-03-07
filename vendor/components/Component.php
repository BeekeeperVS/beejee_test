<?php


namespace vendor\components;


use PDO;

abstract class Component
{
    /**
     * @var PDO
     */
    public static $db;

    /**
     * @var UrlManager
     */
    public static $urlManager;
}