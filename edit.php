<?php
require_once 'db/QueryBuilder.php';
$db = new QueryBuilder;

$task = $db->getTask($_GET['id']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Редактирование задачи</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Edit Task</h1>
        <form action="update.php?id=<?= $task['id']; ?>" method="post">

          <div class="form-group">
            <input type="text" name="title" class="form-control" value="<?= $task['title']; ?>">
          </div>

          <div class="form-group">
            <textarea name="description" class="form-control"><?= $task['description']; ?></textarea>
          </div>

          <div class="form-group">
            <button class="btn btn-warning" type="submit">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>