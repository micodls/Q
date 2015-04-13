<?php
	include "../functions.php";
	$result = array();
	if(isset($_POST["gender"]))
	{
		$male = in_array("male", $_POST["gender"]) ? 1 : NULL;
		$female = in_array("female", $_POST["gender"]) ? 2 : NULL;
		$unisex = in_array("unisex", $_POST["gender"]) ? 3 : NULL;
		$pwd = in_array("pwd", $_POST["gender"]) ? 4 : NULL;
		$radius = $_POST["radius"];
		$lat = $_POST["lat"];
		$long = $_POST["long"];

		$result = array();
		//filter array, dont add null
		$filtered_array = array();
		foreach ([$male, $female, $unisex, $pwd] as $gender) {
		    if ($gender) {
		        $filtered_array[] = $gender;
		    }
		}

		if(!empty($filtered_array)) {
			$toiletIds = getAttributeFromTable('toiletId', 'toilets', 'gender', $filtered_array);

			if(!empty($toiletIds))
			{
				$filtered_array = array();
				for($i = 0; $i<count($toiletIds); ++$i)
				{
					$filtered_array[] = $toiletIds[$i]['toiletId'];
				}
				$sanitation = getAttributeFromTable('cleanliness', 'toilets', 'toiletId', $filtered_array);
				$longitude = getAttributeFromTable('longitude', 'locations', 'toiletId', $filtered_array);
				$latitude = getAttributeFromTable('latitude', 'locations', 'toiletId', $filtered_array);

				$inRadius = selectToiletLoc($lat, $long, $radius);

				for($i = 0; $i < count($filtered_array); ++$i) {
					if(in_array_r($filtered_array[$i], $inRadius))
						$result[] = array('longitude'=>$longitude[$i]['longitude'], 'latitude'=>$latitude[$i]['latitude'], 'toiletId'=> $filtered_array[$i], 'sanitationIcon'=>getPinIconBasedFromSanitation($sanitation[$i]['cleanliness']));
				}
			}
		}
	}
    echo json_encode($result);
?>