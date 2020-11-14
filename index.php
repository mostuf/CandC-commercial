<?php
    function dump($content){
        echo '<div class="dump"><pre>';
        var_dump($content);
        echo '</pre></div>';
    }
    require_once("Framework/Config.php");
    $config = Config::getConfig();
    spl_autoload_register(function($class) use($config){
        //$found = false;
        foreach($config->listAutoloadFolder as $folder)
        {
            if(file_exists($folder . '/' . $class . '.php'))
            {
                //$found = true;
                require_once($folder . '/' . $class . '.php');
                break;
            }
        }
        foreach($config->listComponent as $component)
        {
            if(file_exists('Framework/Component/' . str_replace("Component","",$class) . '/' . $class . '.php'))
            {
                //$found = true;
                require_once('Framework/Component/' . str_replace("Component","",$class) . '/' . $class . '.php');
                break;
            }
            elseif(file_exists('Framework/Component/' . $component . '/' . $class . '.php'))
            {
                //$found = true;
                require_once('Framework/Component/' . $component . '/' . $class . '.php');
                break;
            }
        }
        /*if(!$found)
        {
            throw new FileNotFoundException($class);
        }*/
    });
    session_start();
    try
    {
        $router = new Router();
        $HttpRequest = $router->findRoute($_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"],$config->basePath,$_SERVER["REQUEST_METHOD"]);
        $HttpRequest->run($config);

    }
    catch(Exception $e)
    {
        $HttpRequest = $router->findRoute($_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER["HTTP_HOST"] . '/Error',$config->basePath);
        $HttpRequest->run($config,array($e));
    }

