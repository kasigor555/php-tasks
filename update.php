<?php
require_once 'db/QueryBuilder.php';
$db = new QueryBuilder;

$data = [
  "id" => $_GET['id'],
  "title" => $_POST['title'],
  "description" => $_POST['description']
];

$db->update('tasks', $data);

header("Location: /");
exit;