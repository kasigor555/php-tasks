<?php

/**
 * Вывод подробного описания задачи
 */
function getTask($id)
{
  $db = new PDO('mysql:host=localhost; dbname=task-manager', 'root', '');
  $sql = "SELECT * FROM tasks WHERE id=:id";
  $stm = $db->prepare($sql);
  $stm->bindParam(':id', $id);
  $stm->execute();
  $task = $stm->fetch(PDO::FETCH_ASSOC);

  return $task;
}

$task = getTask($_GET['id']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Страница задачи</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1><?= $task['title']; ?></h1>
        <p>
          <?= $task['description']; ?>
        </p>
        <a href="/">Go Back</a>
      </div>
    </div>
  </div>
</body>

</html>