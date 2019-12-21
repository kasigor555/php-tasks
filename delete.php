<?php
$id = $_GET['id'];
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

deleteTask($id);

header('Location: /php-tasks/');
exit;
