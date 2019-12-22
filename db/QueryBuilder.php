<?php
class QueryBuilder
{
  public $db;

  /**
   * Подключение к базе
   */
  function __construct()
  {
    $this->db = new PDO('mysql:host=localhost; dbname=task-manager', 'root', '');
  }

  /**
   * Получить все задачи
   */
  function getAll($table)
  {
    $sql = "SELECT * FROM $table";
    $stm = $this->db->query($sql);
    $stm->execute();
    $res = $stm->fetchAll(PDO::FETCH_ASSOC);

    return $res;
  }

  /**
   * Вывод подробного описания задачи
   */
  function getOne($table, $id)
  {
    $sql = "SELECT * FROM $table WHERE id=:id";
    $stm = $this->db->prepare($sql);
    $stm->bindParam(':id', $id);
    $stm->execute();
    $res = $stm->fetch(PDO::FETCH_ASSOC);

    return $res;
  }

  /**
   * Создания задачи
   */
  function add($table, $data)
  {
    $keys = array_keys($data);
    $fields = implode(', ', $keys);    
    $placeholders = ":" . implode(', :', $keys);    

    $stm = $this->db->prepare("INSERT INTO $table ($fields) VALUES($placeholders)");
    $stm->execute($data);
  }

  /**
   * Обновление задачи
   */
  function update($table, $data)
  {
    $feilds = '';
    
    foreach ($data as $key => $value) {
      $feilds .= $key . "=:" . $key . ", ";
    }
    $feilds = rtrim($feilds, ', ');    

    $stm = $this->db->prepare("UPDATE $table SET $feilds WHERE id=:id");
    $stm->execute($data);
  }

  /**
   * Удаление задачи
   */
  function delete($table, $id)
  {
    $stm = $this->db->prepare("DELETE FROM $table WHERE id=:id");
    $stm->bindParam(':id', $id);
    $stm->execute();
  }
}
