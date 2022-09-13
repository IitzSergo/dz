<?php

namespace Core\Views;

class View
{
  static public function render(string $path, array $data = [], int $code = 200)
  {
    http_response_code($code);
    
    extract($data);
    unset($data);

    require_once './template/header.php';
    require_once './template/' . $path . '.php';
    require_once './template/footer.php';
  }
}
