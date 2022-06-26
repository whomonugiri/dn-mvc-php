<?php
namespace Core;

class Error
{
    public static function errorHandler($level,$message,$file,$line){
        if(error_reporting()!==0){
            throw new \ErrorException($message,0,$level,$file,$line);
        }
    }

    public static function exceptionHandler($exception)
    {

        $code = $exception->getCode();
        if($code!=404){
            $code = 500;
        }

        http_response_code($code);

        if(\App\Config::SHOW_ERRORS){
            echo "<h1>Fatal Error</h1>";
            echo "<p>Uncaught Exception: '".get_class($exception)."'</p>";
            echo "<p>Message: '".$exception->getMessage()."'</p>";
            echo "<p>Stack Trace: '".$exception->getTraceAsString()."'</p>";
            echo "<p>Thrown In: '".$exception->getFile()."' on line ".$exception->getLine()."</p>";
        }else{
            $log = dirname(__DIR__).'/logs/'.date('Y-m-d').'.txt';
            ini_set('error_log',$log);
            $message = "Uncaught Exception: '".get_class($exception)."' with";
            $message .= "Message: '".$exception->getMessage()."' \n";
            $message .= "Stack Trace: '".$exception->getTraceAsString()."'\n";
            $message .= "Thrown In: '".$exception->getFile()."' on line ".$exception->getLine();

            error_log($message);
            if($code==404){
                echo '<h1>Page Not Found</h1>';
            }else{
                echo '<h1>An Error occured</h1>';
            }
            
           
        }
       
      


    }
}