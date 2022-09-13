<?php
namespace Core\Models;

class Article extends Model{
  public $id;
  public $title;
  public $content;
  public $user_id;

  static public function getTable(){
    return 'articles';
  }

}