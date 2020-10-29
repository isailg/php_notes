<?php
use App\Models\Job;

if (!empty($_POST)){
  $job= new Job;
  $job->title = $_POST['title'];
  $job->description = $_POST['description'];
  $job->save();

}

//
// var_dump($_GET);
// var_dump($_POST);
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add Job</title>
  </head>
  <body>
    <h1>Add Job</h1>
    <form action="addJob.php" method="post">
      <label for="">Title:</label>
      <input type="text" name="title"> <br>
      <label for="">Description:</label>
      <input type="text" name="description"><br>
      <button type="submit" name="button">Save</button>
    </form>
  </body>
</html>
