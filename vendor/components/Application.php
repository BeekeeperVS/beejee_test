<?php

namespace vendor\components;


class Application extends BaseApplication
{
    private $basePath = 'index.php';
    private $routes;

    public function __construct(array $config)
    {
        parent::__construct($config);
    }

    public function start()
    {
        $uri = $this->getURI();

        foreach (Component::$urlManager->getRouteRules() as $uriPattern => $path) {

            if (preg_match("~$uriPattern~", $uri)) {

                $replaceRoute = preg_replace("~$uriPattern~", $path, $uri);

                $segments = explode('/', $replaceRoute);

                $viewPath = array_shift($segments);
                $controllerName = 'controllers\\'.ucfirst($viewPath . 'Controller');

                //$actionName =  'action' .($this->isAdmin($viewPath) ? ucfirst(array_shift($segments)) : ucfirst('login'));
                $actionName = 'action' . ucfirst(array_shift($segments));

                $parameters = $segments;

                $controllerFile =  'controllers/' . $controllerName . '.php';

//                if (file_exists($controllerFile)) {
//                    include_once($controllerFile);
//                }
//                $controllerName .=  'controllers/';
                $controllerObject = new $controllerName($viewPath);


                $result = call_user_func_array([$controllerObject, $actionName], $parameters);
                if ($result != null) {
                    break;
                }
            }
        }
    }

    /**
     * @return string
     */
    private function getURI()
    {
        $str_replace_once = function ($search, $replace, $text) {
            $pos = strpos($text, $search);
            return $pos !== false ? substr_replace($text, $replace, $pos, strlen($search)) : $text;
        };
        if (!empty($_SERVER['REQUEST_URI'])) {
            $uri = $str_replace_once ($this->basePath, '', $_SERVER['REQUEST_URI']);
            return strtok(trim($uri, '/'), '?');
        }
    }

    private function isAdmin($controllerName)
    {
        if (($controllerName == 'admin') && (!isset($_SESSION['auth']) || !$_SESSION['auth'])) {

            return false;

        } else {
            return true;
        }
    }

}