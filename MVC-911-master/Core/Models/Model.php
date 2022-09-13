<?php

namespace Core\Models;

use Core\Exceptions\Exception404;
use Core\Helpers\Message;
use Core\Services\Db;
use PDOException;

class Model
{

  static public function all()
  {
    $db = Db::getInstance();
    return $db->query('SELECT * FROM ' . static::getTable(), [], static::class);
  }

  static public function find($id)
  {
    $db = Db::getInstance();
    $result = $db->query('SELECT * FROM ' . static::getTable() . ' WHERE id=:id', compact('id'), static::class);
    return $result ? $result[0] : null;
  }

  static public function findOrFail($id)
  {
    $item = self::find($id);
    if ($item === null) {
      throw new Exception404();
    }
    return $item;
  }

  public function save()
  {
    $reflect = new \ReflectionObject($this);
    $properties = $reflect->getProperties();
    $props = [];
    $propsToAdd = [];
    $propsToUpdate = [];

    foreach ($properties as $p) {
      $name = $p->name;
      $props[] = $p->name;
      $propsToAdd[$name] = $this->$name;
      $propsToUpdate[] = $name . '=:' . $name;
    }

    $db = Db::getInstance();
    if ($this->id === null) {
      $db->query('INSERT INTO ' . static::getTable() . '(' . implode(',', $props) . ') VALUES(:' . implode(', :', $props) . ')', $propsToAdd);
    } else {
      $db->query('UPDATE ' . static::getTable() . ' SET ' . implode(', ', $propsToUpdate) . ' WHERE id=:id', $propsToAdd);
    }
  }

  public function remove()
  {
    $db = Db::getInstance();
    if ($this->id !== null) {

      $db->query('DELETE FROM ' . static::getTable() . ' WHERE id=:id', ['id' => $this->id]);
    }
  }
}