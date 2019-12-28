<?php

namespace App;

use PDO;

/**
 * Класс аутентификации
 */
class Auth
{
  public $db;

  public function __construct(QueryBuilder $db)
  {
    $this->db = $db;
  }

  /**
   * Регистрация пользователя
   */
  public function register($username, $email, $password)
  {
    $this->db->add('users', [
      'username' => $username,
      'email' => $email,
      'password' => password_hash($password, PASSWORD_DEFAULT)
    ]);
  }

  /**
   * Аутентификация (LOGIN) 
   */
  public function login($email)
  {
    $sql = "SELECT * FROM users WHERE email=:email LIMIT 1";
    $stm = $this->db->db->prepare($sql);
    $stm->bindParam(":email", $email);
    $stm->execute();
    $user = $stm->fetch(PDO::FETCH_ASSOC);

    if ($user) {
      echo $user['username'];
      echo "<br>";
      echo $user['email'];
      echo "<br>";
      echo $user['password'];
      echo "<br>";
    } else {
      echo "Ничего не найдено";
    }
  }

  /**
   * Выход из учётки (LOGOUT)
   */
  public function logout()
  {
    # code...
  }
}
