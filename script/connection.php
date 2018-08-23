<?php
	$link = mysqli_connect("localhost", "darmis_login", "Login123", "darmis_login");
	if (mysqli_connect_error()) {
		die ("Database Connection Error");
	}
?>