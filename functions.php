<?php 	
	function connect(){
		try {
			$user = "root";
			$pass = "";
			$host = "localhost";
			$dbname = "q";
		  	# MySQL with PDO_MYSQL
		  	$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
		}
		catch(PDOException $e) {
			echo $e->getMessage();
		}
		$DBH->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $DBH;
	}
	
	function selectLatitude($toiletId){
		$DBH = connect();
		$stmt = $DBH->prepare("SELECT latitude from locations where toiletId=1");
		$stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$fetch = $stmt->fetchAll();
		$DBH = null;
		return $fetch;
	}
	
	function selectToiletLoc($latitude, $longitude, $radius){ //based on location and radius
		$DBH = connect();
        $sqlstmt = "SELECT
        toilets.toiletId, toilets.gender, toilets.privacy, toilets.cost, toilets.cleanliness,
        utilities.toiletPaper, utilities.bidet, utilities.flush, utilities.urinal, utilities.faucetWater, utilities.handSoap,
        utilities.handSanitizer, utilities.handDryer, utilities.toiletryVendo, utilities.aircondition, utilities.wifi,
        toiletLocations.latitude, toiletLocations.longitude
        
        FROM toilets JOIN (
            utilities, (
                SELECT toiletId, latitude, longitude FROM (
                    SELECT 
                        toiletId,
                        latitude,
                        longitude,
                        @crLatitude := RADIANS(latitude) AS crLatitudeInRadians,
                        @crLongitude := RADIANS(longitude) AS crLongitudeInRadians,
                        @centerLatitude := RADIANS(" . $latitude . "),
                        @centerLongitude := RADIANS(" . $longitude . "),
                        
                        @latitudeDiff := @centerLatitude - @crLatitude,
                        @longitudeDiff := @centerLongitude - @crLongitude,
                        @earthRadius := 6371000,
                        @haversine := sin(@latitudeDiff/2) * sin(@latitudeDiff/2) + 
                                        cos(@crLatitude) * cos(@centerLatitude) *
                                        sin(@longitudeDiff/2) * sin(@longitudeDiff/2),
                        @c := 2 * atan2(sqrt(@haversine), sqrt(1-@haversine)),
                        @earthRadius * @c AS distance
                    FROM locations
                )
                AS locationsWithinVicinity
                WHERE distance <= " . $radius . "
            ) AS toiletLocations
        )
        ON toilets.toiletId = toiletLocations.toiletId AND
        toilets.toiletId = utilities.toiletId
        ";
        
		$stmt = $DBH->prepare($sqlstmt);
		$stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$fetch = $stmt->fetchAll();
		$DBH = null;
		return $fetch;
	}
	
	function selectToiletLoc2($latitude, $longitude, $radius){ //based on location and radius
	
		$earthRadius = 6371000; //meters
		$dLat = Math.toRadians(lat2-lat1);
		$dLng = Math.toRadians(lng2-lng1);
		$a = Math.sin(dLat/2) * Math.sin(dLat/2) +
				   Math.cos(Math.toRadians(lat1)) * Math.cos(Math.toRadians(lat2)) *
				   Math.sin(dLng/2) * Math.sin(dLng/2);
		$c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
		$dist = (float) (earthRadius * c);

		//return dist;

		$DBH = connect();
		$stmt = $DBH->prepare("SELECT * from locations");
		$stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$fetch = $stmt->fetchAll();
		$DBH = null;
		return $fetch;
	}

	function getAttributeFromTable($attribute, $table, $column, $value) {
		$db = connect();
		if(!is_array($value)) {
			$stmt = $db->prepare("SELECT $attribute FROM $table WHERE $column = :value");

			$stmt->bindParam(':value', $value, PDO::PARAM_INT);
		}
		else
		{
			$size = count($value);
			$query = "SELECT $attribute FROM $table WHERE ";

			for($i = 0; $i<$size; ++$i) {	
				if($value != NULL) {
					$query = $query . $column . " = :value" . $i;
					if($i != $size-1)
						$query = $query . " OR ";
				}
			}

			$stmt = $db->prepare($query);

			for($i = 0; $i<$size; ++$i)
			{	
				$stmt->bindParam(':value'. $i, $value[$i], PDO::PARAM_INT);
			}
		}
		$stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$fetch = $stmt->fetchAll();
		$DBH = null;
		return $fetch;
	}

	function getPinIconBasedFromSanitation($sanitation) {
		$red = "assets/img/pin-red.png";
		$yellow = "assets/img/pin-yellow.png";
		$green = "assets/img/pin-green.png";
		if($sanitation <= 4) return $red;
		elseif($sanitation > 4 && $sanitation <= 7) return $yellow;
		elseif($sanitation >= 8) return $green;
	}

	function in_array_r($needle, $haystack, $strict = false) {
    foreach ($haystack as $item) {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
            return true;
        }
    }

    return false;
	}

	function in_multiarray($elem, $array)
    {
        // if the $array is an array or is an object
         if( is_array( $array ) || is_object( $array ) )
         {
             // if $elem is in $array object
             if( is_object( $array ) )
             {
                 $temp_array = get_object_vars( $array );
                 if( in_array( $elem, $temp_array ) )
                     return TRUE;
             }
 
             // if $elem is in $array return true
             if( is_array( $array ) && in_array( $elem, $array ) )
                 return TRUE;
 
 
             // if $elem isn't in $array, then check foreach element
             foreach( $array as $array_element )
             {
                 // if $array_element is an array or is an object call the in_multiarray function to this element
                 // if in_multiarray returns TRUE, than return is in array, else check next element
                 if( ( is_array( $array_element ) || is_object( $array_element ) ) && $this->in_multiarray( $elem, $array_element ) )
                 {
                     return TRUE;
                     exit;
                 }
             }
         }
 
         // if isn't in array return FALSE
         return FALSE;
    }
	
?>