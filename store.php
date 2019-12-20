<?php

/**
 * Форма для создания задачи
 */
$db = new PDO('mysql:host=localhost; dbname=task-manager', 'root', '');
$stm = $db->prepare("INSERT INTO tasks (title, description) VALUES(:title, :description)");
$stm->execute($_POST);

header("Location: /php-tasks/");
exit;