<?php

require_once 'db/QueryBuilder.php';
$db = new QueryBuilder;

// $data = [
//   "title" => $_POST['title'],
//   "description" => $_POST['description']
// ];

$db->add('tasks', $_POST);

header("Location: /php-tasks/");
exit;