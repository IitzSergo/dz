<?php
namespace Core\Controllers;

class Controller{

  public function redirect($page)
  {
    header("Location: $page");
    exit();
  }

  public function dump($obj)
  {
    echo '<pre>' . print_r($obj, true) . '</pre>';
  }

  
}