<?php


namespace vendor\components;


class UrlManager
{
    /**
     * @var array
     */
    private $routeRules;


    /**
     * UrlManager constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->init($config);
    }

    /**
     * @param array $config
     */
    private function init(array $config)
    {
        $this->setRouteRules($config['rules']);
    }

    /**
     * @return array
     */
    public function getRouteRules(): array
    {
        return $this->routeRules;
    }

    /**
     * @param array $routeRules
     */
    public function setRouteRules(array $routeRules)
    {
        $this->routeRules = $routeRules;
    }



}