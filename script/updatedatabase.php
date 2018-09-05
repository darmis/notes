<?php
  session_start();

  if (array_key_exists("content", $_POST)) {
    include("./connection.php");
    $query = "UPDATE `notes` SET `note` = '".mysqli_real_escape_string($link, $_POST['content'])."' WHERE user_id = ".mysqli_real_escape_string($link, $_SESSION['id'])." LIMIT 1";
    mysqli_query($link, $query);
  }

  if (array_key_exists("coordinateX", $_POST) && array_key_exists("coordinateY", $_POST)) {
    include("./connection.php");
    $query = "UPDATE `notes` SET `x` = '".mysqli_real_escape_string($link, $_POST['coordinateX'])."', `y` = '".mysqli_real_escape_string($link, $_POST['coordinateY'])."' WHERE user_id = ".mysqli_real_escape_string($link, $_SESSION['id'])." LIMIT 1";
    mysqli_query($link, $query);
  }
?>
