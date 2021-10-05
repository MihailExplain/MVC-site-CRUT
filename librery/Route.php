<?php


class Route
{
    /**
     * get from url class name and method name
     *
     */
    static public function init(){
        $controllerName = 'index';
        $actionName = 'index';
        $url = $_SERVER['REDIRECT_URL']??'';
        $url = ltrim($url, '/');
        $urlComponents = explode('/', $url);
        if(count($urlComponents)>2){
            exit('no page');//TODO
        }
        if(!empty($urlComponents[0])){
            $controllerName = strtolower($urlComponents[0]);
        }
        if(!empty($urlComponents[1])){
            $actionName = strtolower($urlComponents[1]);
        }
        $controllerClass = 'controllers\\'.ucfirst($controllerName);
        if(!class_exists($controllerClass)){
            exit('no class');//TODO
        }
        $controller = new $controllerClass();
        if(!method_exists($controller, $actionName)){
            exit('no method');//TODO
        }
        $controller->$actionName();
    }

    /**
     * redirect
     * @param string $url
     */
    static public function redirect($url='/'){
        header("Location: $url");
    }
    /**
     * make url
     * @param $controller
     * @param $action
     * @return string
     */
    static public function url($controller, $action){
        return "/$controller/$action";
    }
}