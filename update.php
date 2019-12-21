<?php
/**
 * Обновление задачи
 */
$data = [
  "id" => $_GET['id'],
  "title" => $_POST['title'],
  "description" => $_POST['description']
];

$db = new PDO('mysql:host=localhost; dbname=task-manager', 'root', '');
$stm = $db->prepare("UPDATE tasks SET title=:title, description=:description WHERE id=:id");
$res = $stm->execute($data);


header("Location: /php-tasks/");
exit;