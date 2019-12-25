<?php
/**
 * Входная точка сайта
 */
require_once '../db/QueryBuilder.php';
require_once '../Components/Auth.php';

$db = new QueryBuilder;

$auth = new Auth($db);

// $auth->register('user2', 'user2@site.loc', '654321');
$auth->login('user2@site.loc');

// require "../index.php";
// exit;
// var_dump($db->getAll);

echo "Test";