<?php

$data = [
  "id" => $_GET['id'],
  "title" => $_POST['title'],
  "description" => $_POST['description']
];

/**
 * Обновление задачи
 */
function updateTask($data)
{
  $db = new PDO('mysql:host=localhost; dbname=task-manager', 'root', '');
  $stm = $db->prepare("UPDATE tasks SET title=:title, description=:description WHERE id=:id");
  $stm->execute($data);
}

updateTask($data);

header("Location: /php-tasks/");
exit;