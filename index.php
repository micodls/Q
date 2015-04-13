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
    <div class="wrapper">
      <div class="box">
        <div class="row">
          <!-- sidebar -->
          <div class="column col-sm-2" id="sidebar">
            <div class="logo">
              <a href="#"><img src="assets/img/q-logo.png"></a>
            </div>
            Basic filters:
            <div id="basic-filters">
              <form>
                <div class="form-group">
                  <label for="distance" id="distance-value">Distance: 500 meters</label>
                  <br>
                  <input id="distance" data-slider-id='distance' type="text" data-slider-min="250" data-slider-max="1500" data-slider-step="250" data-slider-value="500" name="distance">
                </div>
                <div class="form-group">
                  <label for="gender">Gender</label>
                  <div class="checkbox checkbox-circle" id="gender">
                    <input type="checkbox" id="male" name="gender[]" value="male" checked>
                    <label for="male">male</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" id="female" name="gender[]" value="female" checked>
                    <label for="female">female</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" id="unisex" name="gender[]" value="unisex" checked>
                    <label for="unisex">unisex</label>
                    <br>
                    <input type="checkbox" id="pwd" name="gender[]" value="pwd" checked>
                    <label for="pwd">pwd</label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="privacy">Privacy</label>
                  <div class="checkbox checkbox-circle" id="privacy">
                    <input type="checkbox" id="public" name="privacy[]" value="public" checked>
                    <label for="public">public</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" id="private" name="privacy[]" value="private" checked>
                    <label for="private">private</label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="sanitation">Sanitation</label>
                  <div class="checkbox checkbox-circle" id="sanitation">
                    <input type="checkbox" id="dirty" name="sanitation[]" value="dirty" checked>
                    <label for="dirty">dirty</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" id="average" name="sanitation[]" value="average" checked>
                    <label for="average">average</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" id="clean" name="sanitation[]" value="clean" checked>
                    <label for="clean">clean</label>
                  </div>
                </div>
              </form>
            </div>
            <a href='#' class="advanced">Advanced filters:</a>
            <div id="advanced-filters">
              <form>
                <div class="form-group">
                  <label for="cost">Cost</label>
                  <div class="checkbox checkbox-circle" id="cost">
                    <input type="checkbox" id="free" name="cost[]" value="free" checked>
                    <label for="free">free</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" id="paid" name="cost[]" value="paid" checked>
                    <label for="paid">paid</label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="utilities">Utilities</label>
                  <div class="checkbox checkbox-circle" id="utilities">
                    <input type="checkbox" id="toilet-paper" name="utilities[]" value="toilet-paper" checked>
                    <label for="toilet-paper">toilet paper</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" id="bidet" name="utilities[]" value="bidet" checked>
                    <label for="bidet">bidet</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" id="flush" name="utilities[]" value="flush" checked>
                    <label for="flush">flush</label>
                    <br>
                    <input type="checkbox" id="urinal" name="utilities[]" value="urinal" checked>
                    <label for="urinal">urinal</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" id="faucet-water" name="utilities[]" value="faucet-water" checked>
                    <label for="faucet-water">faucet water</label>
                    <br>
                    <input type="checkbox" id="hand-soap" name="utilities[]" value="hand-soap" checked>
                    <label for="hand-soap">hand soap</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" id="hand-sanitizer" name="utilities[]" value="hand-sanitizer" checked>
                    <label for="hand-sanitizer">hand sanitizer</label>
                    <br>
                    <input type="checkbox" id="hand-dryer" name="utilities[]" value="hand-dryer" checked>
                    <label for="hand-dryer">hand dryer</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" id="toiletry-vendo" name="utilities[]" value="toiletry-vendo" checked>
                    <label for="toiletry-vendo">toiletry vendo</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" id="aircondition" name="utilities[]" value="aircondition" checked>
                    <label for="aircondition">aircondition</label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" id="wifi" name="utilities[]" value="wifi" checked>
                    <label for="wifi">wifi</label>
                  </div>
                </div>
              </form>
            </div>
			<div></div>
			<button type="button" onclick="showMarkers()">Search</button>
            <div class="nav hidden-xs" id="sidebar-footer">
              <small>by niHEREza</small>
            </div>
          </div>
          <!-- /sidebar -->
            
          <!-- main -->
          <div class="column col-sm-10" id="main">
            <div class="padding">
              <div class="full col-sm-10" id="mapContainer"></div>
            </div>
          </div>
          <!-- /main -->
        </div>
      </div>
    </div>
	<div id="uiContainer"></div>
	<?php require 'functions.php'; ?>
    <!-- script references -->
    <script src="assets/js/jquery-1.11.2.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/bootstrap-slider.js"></script>
    <script type="text/javascript" id="exampleJsSource">

      var currentPosition;
      var map;
      var distanceValue = 500;    
      var infoBubbles = new nokia.maps.map.component.InfoBubbles();  
      
      
      $('#distance').slider({
          formater: function(value) {
            return value + ' meters';
          }
        }).on("slide", function() {
          $("#distance-value").text("Distance: " + this.value + " meters");
          distanceValue = this.value;
          map.objects.set(
            new nokia.maps.map.Circle(
              // center
              currentPosition,
              // radius
              this.value,
              { brush: { fill: "none" } }
            ),
            1
          );
          showMarkers();
        });

      nokia.Settings.set("app_id", "Ko3y9HSr9x1BZeKavM6N"); 
      nokia.Settings.set("app_code", "50i79dE9kuxlWt_VsX_8BQ");
      // Use staging environment (remove the line for production environment)
      nokia.Settings.set("serviceMode", "cit");

      // Get the DOM node to which we will append the map
      var mapContainer = document.getElementById("mapContainer");
      // Create a map inside the map container DOM node
      var map = new nokia.maps.map.Display(mapContainer, {
        // initial center and zoom level of the map
        center: [14.6612514, 121.0620001],
        zoomLevel: 15,
        components: [
          // We add the behavior component to allow panning / zooming of the map
          new nokia.maps.map.component.Behavior(),
          infoBubbles
        ]
      });

      /* The positioning manager is only available if the browser used supports
       * W3C geolocation API
       */
      if (nokia.maps.positioning.Manager) {
        var positioning = new nokia.maps.positioning.Manager();
        // Trigger the load of data, after the map emmits the "displayready" event
        map.addListener("displayready", function () {
          // Gets the current position, if available the first given callback function is executed else the second
          positioning.getCurrentPosition(
            // If a position is provided by W3C geolocation API of the browser
            function (position) {
              currentPosition = position.coords, // we retrieve the longitude/latitude from position
              marker = new nokia.maps.map.Marker(currentPosition, {
                icon: "assets/img/pin-man.png",
                anchor: new nokia.maps.util.Point(22, 57)
			  });
              map.objects.addAll([
                marker,
                new nokia.maps.map.Circle(
                  // center
                  position.coords,
                  // radius
                  500,
                  { brush: { fill: "none" } }
                ),
                new nokia.maps.map.Container()
              ]);
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
      }
	  
	  addShowContextMenuOnRightClick();
	  
	  function showRoute(latitude, longitude, mode)
	  {
	    // Create a route manager
		var router = new nokia.maps.routing.Manager();
		
		// Create waypoints
		var waypoints = new nokia.maps.routing.WaypointParameterList();
		waypoints.addCoordinate(
		  new nokia.maps.geo.Coordinate(currentPosition.latitude, currentPosition.longitude)
		);
		waypoints.addCoordinate(
		  new nokia.maps.geo.Coordinate(latitude, longitude)
		);
		
		var modes = [{
		   type: "shortest",
		   transportModes: [mode],
		   trafficMode: "default"
		}];
		
		var onRouteCalculated = function (observedRouter, key, value) {
		  if (value == "finished") {
			var routes = observedRouter.getRoutes();
		
			// Create the default map representation of a route
			var mapRoute = new nokia.maps.routing.component.RouteResultSet(routes[0]).container;
			map.objects.add(mapRoute);
			
			addRouteShapeToMap(routes[0]);
			addManueversToMap(routes[0]);
			// Zoom to the bounding box of the route
			map.zoomTo(mapRoute.getBoundingBox(), false, "default");
		  } else if (value == "failed") {
			alert("The routing request failed.");
		  }
		};
		  
		// Add the observer function to the router's "state" property
		router.addObserver("state", onRouteCalculated);
		
		// Calculate the route (and call onRouteCalculated afterwards)
		router.calculateRoute(waypoints, modes);
	  }
	  
	  function addMarkerToContainer(container, coordinate, icon, html) {
	    var marker = new nokia.maps.map.Marker(
          coordinate, 
          {
            icon: icon,
            anchor: new nokia.maps.util.Point(22, 57),
            html: html
		  }
        );
	    container.objects.add(marker);
	  }
	  
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
            addResultsInfoBubbles(data);
          }
      });
    }

    function showMarker(url, data) {
      $.ajax({
        url: url,
        type: "POST",
        dataType: "json",
        async: true,
        cache: false,
        data: data, // all data will be passed here
        success: function(data){
          addResultsInfoBubbles(data);
        }
      });
    }    

    // converters
    function convertPrivacy(indicator)
    {
        switch(parseInt(indicator))
        {
            case 1: return "Public CR";
            case 2: return "Private CR";
            default: return "Unknown indicator";
        }
    }   
    
    function convertGender(indicator)
    {
        switch(parseInt(indicator))
        {
            case 1: return "Male";
            case 2: return "Female";
            case 3: return "Unisex";
            case 4: return "PWD";
            default: return "Unknown indicator";
        }
    }

    function convertCost(indicator)
    {
        return (parseInt(indicator) > 0) ? "Paid" : "Free";
    }   
    
    function printToiletPaperIfAvailable(indicator)
    {
        return (parseInt(indicator) == 1) ? '<div> - Toilet Paper' : '';
    }

    function printBidetIfAvailable(indicator)
    {
        return (parseInt(indicator) == 1) ? '<div> - Bidet' : '';
    }

    function printFlushIfAvailable(indicator)
    {
        return (parseInt(indicator) == 1) ? '<div> - Flush' : '';
    }

    function printUrinalIfAvailable(indicator)
    {
        return (parseInt(indicator) == 1) ? '<div> - Urinal' : '';
    }

    function printFaucetWaterIfAvailable(indicator)
    {
        return (parseInt(indicator) == 1) ? '<div> - Faucet Water' : '';
    }

    function printHandSoapIfAvailable(indicator)
    {
        return (parseInt(indicator) == 1) ? '<div> - Hand Soap' : '';
    }
    
    function printHandSanitizerIfAvailable(indicator)
    {
        return (parseInt(indicator) == 1) ? '<div> - Hand Sanitizer' : '';
    }

    function printHandDryerIfAvailable(indicator)
    {
        return (parseInt(indicator) == 1) ? '<div> - Hand Dryer' : '';
    }

    function printToiletryVendoIfAvailable(indicator)
    {
        return (parseInt(indicator) == 1) ? '<div> - Toiletry Vendo' : '';
    }
    
    function printAirConditionerIfAvailable(indicator)
    {
        return (parseInt(indicator) == 1) ? '<div> - Air Conditioner' : '';
    }
    
    function printWiFiIfAvailable(indicator)
    {
        return (parseInt(indicator) == 1) ? '<div> - Wi-Fi' : '';
    }
    

	function addResultsInfoBubbles(data)
	{
	  var toiletContainer = new nokia.maps.map.Container();
	  var walkIconContainer = new nokia.maps.map.Container();
	  
	  toiletContainer.addListener(nokia.maps.dom.Page.browser.touch ? 'tap' : 'click', function (evt) {
	    infoBubbles.openBubble(evt.target.html, evt.target.coordinate);
	  }, false);
	  walkIconContainer.addListener(nokia.maps.dom.Page.browser.touch ? 'tap' : 'click', function (evt) {
	    showRoute(evt.target.coordinate);
	  }, false);
      
      for (var i = 0; i < data.length; ++i) {
        addMarkerToContainer(toiletContainer,
                             [parseFloat(data[i]["latitude"]), parseFloat(data[i]["longitude"])],
                             data[i]["sanitationIcon"],
                             '<div>' + convertPrivacy(data[i]["privacy"]) +
                             '<div>' + convertGender(data[i]["gender"]) +
                             '<div>' + convertCost(data[i]["cost"]) +
                             '<div>With: ' +
                             printToiletPaperIfAvailable(data[i]["toiletPaper"]) +
                             printBidetIfAvailable(data[i]["bidet"]) +
                             printFlushIfAvailable(data[i]["flush"]) +
                             printUrinalIfAvailable(data[i]["urinal"]) +
                             printFaucetWaterIfAvailable(data[i]["faucetWater"]) +
                             printHandSoapIfAvailable(data[i]["handSoap"]) +
                             printHandSanitizerIfAvailable(data[i]["handSanitizer"]) +
                             printHandDryerIfAvailable(data[i]["handDryer"]) +
                             printToiletryVendoIfAvailable(data[i]["toiletryVendo"]) +
                             printAirConditionerIfAvailable(data[i]["aircondition"]) +
                             printWiFiIfAvailable(data[i]["wifi"]) +
                             '<div id="walk-icon"><img src=\'img/icons/png/walk.png\' alt=\"Walk\" height=\"40\" width=\"40\" onclick=showRoute(' + parseFloat(data[i]["latitude"]) +  ',' + parseFloat(data[i]["longitude"]) + ',"pedestrian")><img src=\'img/icons/png/car.png\' alt=\"Car\" height=\"40\" width=\"40\" onclick=showRoute(' + parseFloat(data[i]["latitude"]) +  ',' + parseFloat(data[i]["longitude"]) + ',"car")></div>');
        }
        map.objects.set(toiletContainer, 2);
	  }

      $(document).ready(function() {
        // advanced-filter show/hide
        $('#advanced-filters').hide();
        $('.advanced').click(function() {
          if ($('#advanced-filters').is(':hidden')) {
            $('#advanced-filters').show();
          } else {
            $('#advanced-filters').hide();
          }
        });

        // checkbox listener
        $('#gender').click(function(){
          var gender = [];
          $('input[name^=gender]:checked').each(function(i){
            gender[i] = $(this).val();
          });
          showMarker("ajax/ajax.php", {'gender' : gender, 'lat' : currentPosition.latitude, 'long' : currentPosition.longitude, 'radius' : distanceValue});
        });

        $('#privacy').click(function(){
          var privacy = [];
          $('input[name^=privacy]:checked').each(function(i){
            privacy[i] = $(this).val();
          });
          alert(privacy);
        });

        $('#sanitation').click(function(){
          var privacy = [];
          $('input[name^=sanitation]:checked').each(function(i){
            sanitation[i] = $(this).val();
          });
          alert(sanitation);
        });

        $('#cost').click(function(){
          var privacy = [];
          $('input[name^=cost]:checked').each(function(i){
            cost[i] = $(this).val();
          });
          alert(cost);
        });

        $('#utilities').click(function(){
          var utilities = [];
          $('input[name^=utilities]:checked').each(function(i){
            utilities[i] = $(this).val();
          });
          alert(utilities);
        });
      });
	  
	  /**
	  * Creates a H.map.Polyline from the shape of the route and adds it to the map.
	  * @param {Object} route A route as received from the H.service.RoutingService
	  */
	  function addRouteShapeToMap(route){
	    var strip = new H.geo.Strip(),
		routeShape = route.shape,
		polyline;

	    routeShape.forEach(function(point) {
		  var parts = point.split(',');
		  strip.pushLatLngAlt(parts[0], parts[1]);
	    });

	    // Retrieve the mapped positions of the requested waypoints:
	    var startPoint = route.waypoint[0].mappedPosition;
	    var endPoint = route.waypoint[1].mappedPosition;
	    
	    polyline = new H.map.Polyline(strip, {
		  style: {
		    lineWidth: 4,
		    strokeColor: 'rgba(0, 128, 255, 0.7)'
		  }
	    });
	    
	    // Create a marker for the start point:
	    var startMarker = new H.map.Marker({
		  lat: startPoint.latitude,
		  lng: startPoint.longitude
	    });
	    
	    // Create a marker for the end point:
	    var endMarker = new H.map.Marker({
		  lat: endPoint.latitude,
		  lng: endPoint.longitude
	    });
	    
	    // Add the polyline to the map
	    map.addObject(polyline, startMarker, endMarker);
	    // And zoom to its bounding rectangle
	    map.setViewBounds(polyline.getBounds(), true);
	  }


	  /**
	  * Creates a series of H.map.Marker points from the route and adds them to the map.
	  * @param {Object} route  A route as received from the H.service.RoutingService
	  */
	  function addManueversToMap(route){
	    var svgMarkup = '<svg width="18" height="18" ' +
		  'xmlns="http://www.w3.org/2000/svg">' +
		  '<circle cx="8" cy="8" r="8" ' +
		  'fill="#1b468d" stroke="white" stroke-width="1"  />' +
		  '</svg>',
		  dotIcon = new H.map.Icon(svgMarkup, {anchor: {x:8, y:8}}),
		  group = new  H.map.Group(),
		  i,
		  j;

	    // Add a marker for each maneuver
	    for (i = 0;  i < route.leg.length; i += 1) {
		  for (j = 0;  j < route.leg[i].maneuver.length; j += 1) {
		    // Get the next maneuver.
		    maneuver = route.leg[i].maneuver[j];
		    // Add a marker to the maneuvers group
		    var marker =  new H.map.Marker({
		   lat: maneuver.position.latitude,
		   lng: maneuver.position.longitude} ,
		   {icon: dotIcon});
		    marker.instruction = maneuver.instruction;
		    group.addObject(marker);
		  }
	    }

	    group.addEventListener('tap', function (evt) {
		  map.setCenter(evt.target.getPosition());
		  openBubble(evt.target.getPosition(), evt.target.instruction);
	    }, false);

	    // Add the maneuvers group to the map
	    map.addObject(group);
	  }
	
	  function addShowContextMenuOnRightClick()
	  {
	    // Add ContextMenu component so we get context menu on right mouse click / long press tap
		var contextMenu = new nokia.maps.map.component.ContextMenu();
		var customHandler = function(contextMenuEvent, group) {
		  var context = contextMenuEvent.target;
		  // If the current context target is a display, we add some entries to pan the map
		  if (context instanceof nokia.maps.map.Display) {
		    // An entry may have a text label and a callback to be invoked upon activation of the entry
		    group.addEntry("Pan left", function() {
		      context.pan(0, 0, -200, 0);
		    });
		  
		    // A label may also be provided through a callback function
		    group.addEntry(
		      function (node) { 
		        node.innerHTML = "Pan right"; 
		      }, 
		      function () {
		        context.pan(0,0, 200, 0);
		      }
		    );
		    // If no handler is specified the entry is inactive
		    group.addEntry(contextMenuEvent.target.center.toString());
		  };
	    }

		// Add the context menu to the map
		map.components.add(contextMenu);
	  }
    </script>
  </body>
</html>