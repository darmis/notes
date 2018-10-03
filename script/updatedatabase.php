<?php
  session_start();

  if (array_key_exists("activeID", $_POST) && array_key_exists("content", $_POST)) {
    include("./connection.php");
    $query = "UPDATE `notes` SET `note` = '".mysqli_real_escape_string($link, $_POST['content'])."' WHERE note_id = '".mysqli_real_escape_string($link, $_POST['activeID'])."' LIMIT 1";
    mysqli_query($link, $query);
  }

  if (array_key_exists("activeID", $_POST) && array_key_exists("coordinateY", $_POST)) {
    include("./connection.php");
    $query = "UPDATE `notes` SET `x` = '".mysqli_real_escape_string($link, $_POST['coordinateX'])."', `y` = '".mysqli_real_escape_string($link, $_POST['coordinateY'])."' WHERE note_id = ".mysqli_real_escape_string($link, $_POST['activeID'])." LIMIT 1";
    mysqli_query($link, $query);
  }

  if (array_key_exists("activeID", $_POST) && array_key_exists("activeH", $_POST)) {
    include("./connection.php");
    $query = "UPDATE `notes` SET `width` = '".mysqli_real_escape_string($link, $_POST['activeW'])."', `height` = '".mysqli_real_escape_string($link, $_POST['activeH'])."' WHERE note_id = ".mysqli_real_escape_string($link, $_POST['activeID'])." LIMIT 1";
    mysqli_query($link, $query);
  }

  if (array_key_exists("new", $_POST) && array_key_exists("coordinateY", $_POST)) {
    include("./connection.php");
    $query = "INSERT INTO `notes` (note_id, user_id, note, x, y) VALUES ('0', '".mysqli_real_escape_string($link, $_SESSION['id'])."', '', '".mysqli_real_escape_string($link, $_POST['coordinateX'])."', '".mysqli_real_escape_string($link, $_POST['coordinateY'])."')";
    mysqli_query($link, $query);
  }

  if (array_key_exists("update", $_POST)) {
    include("./connection.php");
    $query = $link->query("SELECT `note_id` FROM `notes` WHERE user_id = '".mysqli_real_escape_string($link, $_SESSION['id'])."' ORDER BY `note_id` DESC LIMIT 1");
    $row = $query->fetch_assoc();
    echo json_encode($row);
  }

  if (array_key_exists("deleteIt", $_POST) && array_key_exists("activeID", $_POST)) {
    include("./connection.php");
    $query = "DELETE FROM `notes` WHERE `notes`.`note_id` = '".mysqli_real_escape_string($link, $_POST['activeID'])."' LIMIT 1";
    mysqli_query($link, $query);
  }

?>
