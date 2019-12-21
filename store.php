<?php

require_once 'db/QueryBuilder.php';
$db = new QueryBuilder;

$db->addTask($_POST);

header("Location: /php-tasks/");
exit;