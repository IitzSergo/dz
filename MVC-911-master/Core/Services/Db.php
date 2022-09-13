<?php

namespace Core\Services;

class Db
{
  private $pdo;
  private static $instance = null;

  private function __construct()
  {
    $dbOptions = (require_once __DIR__ . '/../../config.php')['db'];
    $this->pdo = new \PDO('mysql:host=' . $dbOptions['host'] . ';dbname=' . $dbOptions['dbname'], $dbOptions['user'], $dbOptions['password']);
  }

  public function query(string $sql, array $params = [], string $className = 'stdClass')
  {

    $sth = $this->pdo->prepare($sql);
    $result = $sth->execute($params);
    return $result !== false ? $sth->fetchAll(\PDO::FETCH_CLASS, $className) : null;
  }

  public static function getInstance()
  {
    if (self::$instance === null) {
      self::$instance = new self();
    }
    return self::$instance;
  }

  private function __clone()
  {
  }
}