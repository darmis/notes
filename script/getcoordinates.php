<?php

session_start();

  if (array_key_exists("loaded", $_POST)) {
    include("./connection.php");
    $query = $link->query("SELECT * FROM `notes` WHERE user_id = '".mysqli_real_escape_string($link, $_SESSION['id'])."'");
    $row = $query->fetch_all();
    echo json_encode($row);
  }

?>