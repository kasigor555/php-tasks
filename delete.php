<?php
require_once 'db/QueryBuilder.php';
$db = new QueryBuilder;

$id = $_GET['id'];

$db->delete('tasks', $id);

header('Location: /php-tasks/');
exit;
