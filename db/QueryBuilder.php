<?php
class QueryBuilder
{
  /**
   * Получить все задачи
   */
  function getAllTasks()
  {
    $db = new PDO('mysql:host=localhost; dbname=task-manager', 'root', '');
    $sql = 'SELECT * FROM tasks';
    $stm = $db->query($sql);
    $stm->execute();
    $tasks = $stm->fetchAll(PDO::FETCH_ASSOC);

    return $tasks;
  }

  /**
   * Вывод подробного описания задачи
   */
  function getTask($id)
  {
    $db = new PDO('mysql:host=localhost; dbname=task-manager', 'root', '');
    $sql = "SELECT * FROM tasks WHERE id=:id";
    $stm = $db->prepare($sql);
    $stm->bindParam(':id', $id);
    $stm->execute();
    $task = $stm->fetch(PDO::FETCH_ASSOC);

    return $task;
  }

  /**
   * Создания задачи
   */
  function addTask($data)
  {
    $db = new PDO('mysql:host=localhost; dbname=task-manager', 'root', '');
    $stm = $db->prepare("INSERT INTO tasks (title, description) VALUES(:title, :description)");
    $stm->execute($data);
  }

  /**
   * Обновление задачи
   */
  function updateTask($data)
  {
    $db = new PDO('mysql:host=localhost; dbname=task-manager', 'root', '');
    $stm = $db->prepare("UPDATE tasks SET title=:title, description=:description WHERE id=:id");
    $stm->execute($data);
  }

  /**
   * Удаление задачи
   */
  function deleteTask($id)
  {
    $db = new PDO('mysql:host=localhost; dbname=task-manager', 'root', '');
    $stm = $db->prepare('DELETE FROM tasks WHERE id=:id');
    $stm->bindParam(':id', $id);
    $stm->execute();
  }
}
