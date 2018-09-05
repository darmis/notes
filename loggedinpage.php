<?php
  session_start();
  if (array_key_exists("id", $_COOKIE) && $_COOKIE ['id']) {
    $_SESSION['id'] = $_COOKIE['id'];
  }

  if (array_key_exists("id", $_SESSION)) {
    include("./script/connection.php");
    $query = "SELECT * FROM `notes` WHERE user_id = ".mysqli_real_escape_string($link, $_SESSION['id'])." LIMIT 1";
    $row = mysqli_fetch_array(mysqli_query($link, $query));
    $noteContent = $row['note'];
    $cx = $row['x'];
    $cy = $row['y'];
  } else {
    header("Location: index.php");
  }

	include("./script/loggedheader.php");
?>

  <nav class="navbar navbar-light bg-faded navbar-fixed-top">
    <a class="navbar-brand" href="#">All Notes</a>
    <div class="pull-xs-right">
      <a href ='index.php?logout=1'>
      <button class="btn btn-warning-outline" type="submit">Log Out</button></a>
    </div>
  </nav>
  <div class="container-fluid" id="notesArea">
    <div class="note hidden">
      <textarea id="note" class="form-control"><?php echo $noteContent; ?></textarea>
    </div>
  </div>

<?php
  include("./script/loggedfooter.php");
?>