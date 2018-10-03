<?php
  session_start();
  if (array_key_exists("id", $_COOKIE) && $_COOKIE ['id']) {
    $_SESSION['id'] = $_COOKIE['id'];
  }

	include("./script/loggedheader.php");
?>

  <nav class="navbar navbar-light bg-faded navbar-fixed-top">
    <div id="logo" class="pull-xs-left">
      <a href="http://www.mynotes.eu">
        <img src="./img/logo.png">
        <span>myNotes</span>
      </a>
    </div>
    <div class="pull-xs-right">
      <a href="javascript:;" class="btn btn-warning" id="add_new">Add New Note</a>
      <a href ='index.php?logout=1'>
      <button class="btn btn-warning-outline" type="submit">Log Out</button></a>
    </div>
  </nav>
  <div class="container-fluid" id="notesArea"></div>

<?php
  include("./script/loggedfooter.php");
?>