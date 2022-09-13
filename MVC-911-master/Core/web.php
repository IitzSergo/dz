<?php
return [
  '~^/$~' => ['HomeController', 'index'],
  '~^contacts$~' => ['HomeController', 'contacts'],
  '~^send-email$~' => ['HomeController', 'sendEmail'],
  '~^articles/(\d+)$~' => ['HomeController', 'article'],
  '~^articles/store$~' => ['HomeController', 'storeArticle'],

];