<?php
/**
 * Удаление задачи
 */
$db = new PDO('mysql:host=localhost; dbname=task-manager', 'root', '');
$stm = $db->prepare('DELETE FROM tasks WHERE id=:id');
$stm->bindParam(':id', $_GET['id']);
$res = $stm->execute();

header('Location: /php-tasks/');
exit;
