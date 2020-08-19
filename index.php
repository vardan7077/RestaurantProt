<!DOCTYPE html>
<html>
<head>
  <title>Searching restorants near</title>
  <!link rel="stylesheet" href="css/style.css">

  <!script src="https://code.jquery.com/jquery-1.11.1.js"><!/script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.1.js"></script>
	<script type="text/javascript" src="googlemap.js"></script>

  <style type="text/css">
		.container {
			height: 450px;
		}

		#map {
			width:100%;
      height:100%;
      border: 1px solid blue;
		}

    #data, #allData{
      display: none;
    }
	</style>
</head>
<body>
  <div class="container">
		<center><h1>Searching Restorants near</h1></center>
    <?php
       require 'restorants.php';
        $rest = new restorants;
        $result = $rest->getPlacesLocation();
        $result = json_encode($result, true);
        echo '<div id = "data">' . $result . '</div>';

        $allData = $rest->getAllPlaces();
        $allData = json_encode($allData, true);
        echo '<div id = "allData">' . $allData . '</div>';

     ?>

    <div id="map"></div>
</div>
</body>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZdqaHSz5h80u1EdpD0gYXfiNjB_0MVo4&callback=loadMap">
</script>
</html>
