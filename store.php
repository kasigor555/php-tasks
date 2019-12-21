<?php

/**
 * Создания задачи
 */
function addTask($data)
{
  $db = new PDO('mysql:host=localhost; dbname=task-manager', 'root', '');
  $stm = $db->prepare("INSERT INTO tasks (title, description) VALUES(:title, :description)");
  $stm->execute($data);
}

addTask($_POST);

header("Location: /php-tasks/");
exit;