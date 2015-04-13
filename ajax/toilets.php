<?php

  include "../functions.php";

	$queryResult = selectToiletLoc($_POST["latitude"],
                              $_POST["longitude"],
                              $_POST["radius"]);
                          
  foreach($queryResult as &$row) {
    $row["sanitationIcon"] = getPinIconBasedFromSanitation(getAttributeFromTable("cleanliness", "toilets", "toiletId", $row["toiletId"]));
  }
  
	echo json_encode($queryResult);
?>

