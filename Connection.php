<?php

class Connection {
  public PDO $pdo;

  public function __construct() {
    $this->pdo = new PDO("mysql:host=127.0.0.1;port=3306;dbname=sql_employee", "root");
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  public function getEmployees()
  {
    $statement = $this->pdo->prepare('SELECT * FROM employee');
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
  }
}

return new Connection();