<?php

namespace Core;

use Core\Exceptions\Exception404;
use Core\Views\View;

class Route
{
  static public function start()
  {

    try {
      session_start();
      $url = $_GET['url'] ?? '/';   //    /
      $routes = require_once 'Core/web.php';

      $isRouteFound = false;
      foreach($routes as $pattern=>$controllerAndAction){
        preg_match($pattern, $url, $matches);
        if(!empty($matches)){
          $isRouteFound = true;
          break;
        }
      }
      
      if (!$isRouteFound) {
        throw new Exception404();
      }

      list($nameController, $nameMethod) = $controllerAndAction;

      $classController = 'Core\\Controllers\\' . $nameController;
      if (!file_exists($classController . '.php')) {
        die('Controller not Found');
      }
      $objController = new $classController();

      if (!method_exists($objController, $nameMethod)) {
        die('Method not Found');
      }
      

      unset($matches[0]);
      $objController->$nameMethod(...$matches);
    } catch (Exception404 $e) {
      View::render('errors/404', [], 404);
    }
  }
}
