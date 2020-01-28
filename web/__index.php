<?php

/**
 * Входная точка сайта
 */
require '../vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

// use App\QueryBuilder;
// use PDO;

// $db = new \PDO('mysql:host=localhost; dbname=task-manager', 'root', '');


// $auth = new \Delight\Auth\Auth($db);

// $auth->register('user2', 'user2@site.loc', '654321');
// $auth->login('user2@site.loc', '123');

// require "../index.php";
// exit;
// var_dump($db->getAll);


// echo "<pre>";
// var_dump($auth);
// echo "</pre><br>";
// $email = 'bbb@bb.bb';
// $pass = '123';

//Send 74sESXSoL5yRilUt and NXg2uM-_kRWQzSh1

// try {
//   $userId = $auth->register($email, $pass, null, function ($selector, $token) {
//     echo 'Send ' . $selector . ' and ' . $token . ' to the user (e.g. via email)';
//     echo $url = \urlencode($selector) . ' ' . \urlencode($token);
//   });

//   echo 'We have signed up a new user with the ID ' . $userId;
// } catch (\Delight\Auth\InvalidEmailException $e) {
//   die('Invalid email address');
// } catch (\Delight\Auth\InvalidPasswordException $e) {
//   die('Invalid password');
// } catch (\Delight\Auth\UserAlreadyExistsException $e) {
//   die('User already exists');
// } catch (\Delight\Auth\TooManyRequestsException $e) {
//   die('Too many requests');
// }

// $auth->confirmEmail('74sESXSoL5yRilUt', 'NXg2uM-_kRWQzSh1');

// try {
//   $auth->login($email, $pass);

//   echo 'User is logged in';
// } catch (\Delight\Auth\InvalidEmailException $e) {
//   die('Wrong email address');
// } catch (\Delight\Auth\InvalidPasswordException $e) {
//   die('Wrong password');
// } catch (\Delight\Auth\EmailNotVerifiedException $e) {
//   die('Email not verified');
// } catch (\Delight\Auth\TooManyRequestsException $e) {
//   die('Too many requests');
// }
// $auth->logout();
// var_dump($auth->check());

echo "<br>Test";
