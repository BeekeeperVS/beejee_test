<?php

namespace vendor\components;

abstract class BaseController
{
    /**
     * @var string
     */
    private $viewPath;
    /**
     * @var string
     */
    public $layout = 'admin';

    public function __construct(string $viewPath)
    {
        $this->viewPath = $viewPath;
    }

    public function render(string $view, array $data = null)
    {

        if (is_array($data)) {
            extract($data);
        }

        $content = ( _WEBDIR_ . "/../views/{$this->viewPath}/{$view}.php");

        include_once(_WEBDIR_ . "/../views/layouts/{$this->layout}.php");
    }
}