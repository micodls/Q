<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Q (beta)</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link href="assets/css/styles.css" rel="stylesheet">
    <link href="assets/css/slider.css" rel="stylesheet">
    <link href="assets/css/awesome-checkbox.css" rel="stylesheet">
    <link rel="shortcut icon" href="assets/img/favicon.png">
	
	<link rel="stylesheet" type="text/css"
		href="http://js.api.here.com/v3/3.0/mapsjs-ui.css" />
	<script type="text/javascript" charset="UTF-8"
		src="http://js.api.here.com/v3/3.0/mapsjs-core.js"></script>
	<script type="text/javascript" charset="UTF-8"
		src="http://js.api.here.com/v3/3.0/mapsjs-service.js"></script>
	<script type="text/javascript" charset="UTF-8"
		src="http://js.api.here.com/v3/3.0/mapsjs-mapevents.js"></script>
	<script type="text/javascript"  charset="UTF-8"
		src="http://js.api.here.com/v3/3.0/mapsjs-ui.js"></script>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="dist/js/vendor/html5shiv.js"></script>
      <script src="dist/js/vendor/respond.min.js"></script>
    <![endif]-->

    <!-- By default we add ?with=all to load every package available,
      it's better to change this parameter to your use case. 
      Options ?with=maps|positioning|places|placesdata|directions|datarendering|all -->
    <script type="text/javascript" charset="UTF-8" src="http://js.cit.api.here.com/se/2.5.4/jsl.js?with=all"></script>
  </head>
  <body>
	<button type="button" onclick="showMarkers()">Count CR</button>
	<?php require 'functions.php'; ?>
    <!-- script references -->
    <script src="assets/js/jquery-1.11.2.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/bootstrap-slider.js"></script>
    <script type="text/javascript" id="exampleJsSource">
	
	
      var currentPosition;
      var map;
      var distanceValue = 500;    
      //var infoBubbles = new nokia.maps.map.component.InfoBubbles();  

      nokia.Settings.set("app_id", "Ko3y9HSr9x1BZeKavM6N"); 
      nokia.Settings.set("app_code", "50i79dE9kuxlWt_VsX_8BQ");
      // Use staging environment (remove the line for production environment)
      nokia.Settings.set("serviceMode", "cit");
	   
	   navigator.geolocation.getCurrentPosition(function(position) {
		currentPosition = position.coords;
	   });
	   /*
	   var map = new nokia.maps.map;
      if (nokia.maps.positioning.Manager) {
        var positioning = new nokia.maps.positioning.Manager();
        // Trigger the load of data, after the map emmits the "displayready" event
        map.addListener("displayready", function () {
          // Gets the current position, if available the first given callback function is executed else the second
          positioning.getCurrentPosition(
            // If a position is provided by W3C geolocation API of the browser
            function (position) {
              currentPosition = position.coords; // we retrieve the longitude/latitude from position
            }, 

            // Something went wrong we wee unable to retrieve the GPS location
            function (error) {
              var errorMsg = "Location could not be determined: ";
              
              // We determine what caused the error and generate error message
              if (error.code == 1) errorMsg += "PERMISSION_DENIED";
              else if (error.code == 2) errorMsg += "POSITION_UNAVAILABLE";
              else if (error.code == 3) errorMsg += "TIMEOUT";
              else errorMsg += "UNKNOWN_ERROR";
                
              // Throw an alert with error message
              alert(errorMsg);
            }
          );
        });
      }*/
	  	  
	  function showMarkers() {
        console.log("showmarkers");
        
        $.ajax({
          type: "POST",
          dataType: "json",
          data: {          
            latitude : currentPosition.latitude,
            longitude : currentPosition.longitude,
            radius : distanceValue
          },
          url: "ajax/toilets.php",
          success: function(data) {
            console.log("received ajax");
            // console.log(data[0]["latitude"]);
            // console.log(data[0]["longitude"]);
            // console.log(data[0]["toiletId"]);
            // console.log(data[0]["sanitationIcon"]);
            //addResultsInfoBubbles(data);
			alert("There are " + data.length + " restrooms within 250 meters radius.");
          }
      });
    }    
    </script>
  </body>
</html>