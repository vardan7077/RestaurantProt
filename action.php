<?php
	print_r($_REQUEST);
	require 'restorants.php';
  $rest = new restorants;
  $rest->setId($_REQUEST['id']);
	$rest->setlat($_REQUEST['lat']);
	$rest->setlng($_REQUEST['lng']);
	$status = $rest->UpdateLocations();
	if($status){
		echo("Updated!");
	} else {
		echo("Failed...");
	}
 ?>
