<?php
namespace App\Controllers;
use Core\Controller;
use Core\View;

class DemoController extends Controller{

   protected function before(){
    //this will run before any function
   }

   protected function after(){
    //this will run after any function
   }

   protected function welcome(){
        View::render('welcome.php');
   }
}