<?php
class User {
  protected $id;
  protected $name;
  protected $surname;
  protected $username;
  protected $password;
  protected $email;

  public function getId() {
    return $this->id;
  }

  public function getName() {
    return $this->name;
  }

  public function getSurname() {
    return $this->surname;
  }

  public function getUsername() {
    return $this->username;
  }

  public function getPassword() {
    return $this->password;
  }

  public function getEmail() {
    return $this->email;
  }

  public function __construct($row) {
    $this->id = $row['id'];
    $this->name = $row['name'];
    $this->surname = $row['surname'];
    $this->username = $row['username'];
    $this->password = $row['password'];
    $this->email = $row['email'];
  }
}
?>