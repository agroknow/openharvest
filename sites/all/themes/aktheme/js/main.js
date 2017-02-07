
(function ($) {
    "use strict";

    Drupal.behaviors.aktheme = {
		attach: function (context) {
			$.getJSON( "http://maps.local/jmap", function( json ) {
		  		console.log( json );
		 });
			
		}
    }
    //Event triggered from leaflet
    $(document).on('leaflet.map', function (event, map, lMap) {
    	console.log(L);
	    var allmarkers = [];
	    var latlongs = [];
		lMap.eachLayer(function (layer) { 
			if(layer._topClusterLevel) {
				allmarkers = layer._topClusterLevel.getAllChildMarkers();
			}
		     
		});
		
		for (var i = 0; i < 2; i++) {
			var marker = allmarkers[i];
			console.log(marker);
			
			latlongs.push(marker.getLatLng());
		}
		//console.log(latlongs);
		 //var polyline = L.polyline(latlongs, {color: 'red', weight : 2});
		 console.log(L.Path);
		 var arcedPolyline = new L.ArcedPolyline(latlongs, {
    distanceToHeight: new L.LinearFunction([0, 20], [1000, 300]),
    color: '#FFF',
    weight: 1
});
		 lMap.addLayer(arcedPolyline);
		 
		 /* var options = {
            recordsField: null,
            locationMode: L.LocationModes.CUSTOM,
            fromField: 'airport1',
            toField: 'airport2',
            codeField: null,
            //getLocation: getLocation,
            getEdge: L.Graph.EDGESTYLE.ARC,
            includeLayer: function (record) {
                return false;
            },
            getIndexKey: function (location, record) {
                return record.airport1 + '_' + record.airport2;
            },
            setHighlight: function (style) {
                style.opacity = 1.0;

                return style;
            },
            unsetHighlight: function (style) {
                style.opacity = 0.5;

                return style;
            },
            layerOptions: {
                fill: false,
                opacity: 0.5,
                weight: 0.5,
                fillOpacity: 1.0,
                distanceToHeight: new L.LinearFunction([0, 20], [1000, 300]),
                markers: {
                    end: true
                },

                // Use Q for quadratic and C for cubic
                mode: 'Q'
            },
            legendOptions: {
                width: 200,
                numSegments: 5,
                className: 'legend-line'
            },
            tooltipOptions: {
                iconSize: new L.Point(80, 64),
                iconAnchor: new L.Point(-5, 64),
                className: 'leaflet-div-icon line-legend'
            },
            displayOptions: {
                cnt: {
                    weight: new L.LinearFunction([0, 1], [100, 14]),
                    color: new L.HSLHueFunction([0, 200], [100, 330], {
                        outputLuminosity: '60%'
                    }),
                    displayName: 'Flights'
                }
            },
            onEachRecord: function (layer, record) {
                layer.bindPopup($(L.HTMLUtils.buildTable(record)).wrap('<div/>').parent().html());
            }
        };

        var flights = [
	{
		"airline": "AA",
		"airport1": "DFW",
		"airport2": "SJU",
		"cnt": "120"
	},
	{
		"airline": "AA",
		"airport1": "MSP",
		"airport2": "DFW",
		"cnt": "326"
	},
	{
		"airline": "AA",
		"airport1": "LGA",
		"airport2": "ORD",
		"cnt": "860"
	}]; */


	});

})(jQuery);


