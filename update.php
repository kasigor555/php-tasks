<?php
require_once 'db/QueryBuilder.php';
$db = new QueryBuilder;

$data = [
  "id" => $_GET['id'],
  "title" => $_POST['title'],
  "description" => $_POST['description']
];

$db->updateTask($data);

header("Location: /php-tasks/");
exit;