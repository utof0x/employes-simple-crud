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

  public function getEmployeeById($id)
  {
    $statement = $this->pdo->prepare('SELECT * FROM employee WHERE id = :id');
    $statement->bindValue('id', $id);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
  }

  public function updateEmployee($id, $data, $photo)
  {
    $statement = $this->pdo->prepare('
      UPDATE employee 
      SET first_name = :first_name,
          last_name = :last_name,
          title = :title, 
          phone_number = :phone_number,
          email = :email,
          photo = :photo
          WHERE id = :id
    ');
    $statement->bindValue('id', $id);
    $statement->bindValue('first_name', $data['first_name']);
    $statement->bindValue('last_name', $data['last_name']);
    $statement->bindValue('title', $data['title']);
    $statement->bindValue('phone_number', $data['phone_number']);
    $statement->bindValue('email', $data['email']);
    $statement->bindValue('photo', $photo);
    return $statement->execute();
  }

  public function deleteEmployee($id)
  {
    $statement = $this->pdo->prepare('DELETE FROM employee WHERE id = :id');
    $statement->bindValue('id', $id);
    return $statement->execute();
  }

  public function addEmployee($data, $photo)
  {
    $statement = $this->pdo->prepare('
      INSERT INTO employee (first_name, last_name, title, phone_number, email, photo)
      VALUES (:first_name, :last_name, :title, :phone_number, :email, :photo)
    ');
    $statement->bindValue('first_name', $data['first_name']);
    $statement->bindValue('last_name', $data['last_name']);
    $statement->bindValue('title', $data['title']);
    $statement->bindValue('phone_number', $data['phone_number']);
    $statement->bindValue('email', $data['email']);
    $statement->bindValue('photo', $photo);
    return $statement->execute();
  }
}

return new Connection();