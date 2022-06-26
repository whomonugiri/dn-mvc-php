<?php

//autoload classes files
spl_autoload_register(function($class){
$root = dirname(__DIR__);
$file = $root .'/'. str_replace('\\','/',$class).'.php';
if(is_readable($file)){
    require $file;  
}
});

//error handling settings
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

//router management
$router = new Core\Router;
// .: DEMO ROUTES :.
// $router->add('{controller}/{action}');
// $router->add('admin/{action}/{controller}');
// $router->add('{controller}/{action}/post/{posturl:\S+}');
// $router->add('subject/list/{id:\d+}',[
// 'controller'=>'subject',
// 'action'=>'view'
// ]);

$router->add('',[
    'controller'=>'DemoController',
    'action'=>'welcome'
]);




$router->dispatch();
