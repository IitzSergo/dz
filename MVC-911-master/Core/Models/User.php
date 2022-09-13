<?php
namespace Core\Models;

class User extends Model{
  public $id;
  public $name;
  public $email;
  public $password;

  static public function getTable(){
    return 'users';
  }

}