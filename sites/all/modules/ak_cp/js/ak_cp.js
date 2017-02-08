(function($) {
    $(document).ready(function () {

            var searchControl;
            var map;
            var markers = null;
            var $info = $('#info');
            var $map = $('#map');
            var resize = function () {
                $map.height($(window).height() - $('div.navbar').outerHeight());

                if (map) {
                    map.invalidateSize();
                }
            };

            $(window).on('resize', function () {
                resize();
            });

            resize();
            var orgs,relations,mapData;
            var siteUrl = Drupal.settings.baseUrl;
            $.getJSON( siteUrl + "/map-data-js", function( result ) {
                 mapData = result;
                 
                    $.getJSON( siteUrl + "/networks-data", function( orgdata ) {
                        relations = orgdata;
                        var t0 = performance.now();
                        startmap();
                        var t1 = performance.now();
                        console.log("Call to doSomething took " + (t1 - t0) + " milliseconds.")
                });
             });
            
            function startmap() {
            map = L.map('map',{ zoomControl: false }).setView([44.715514, -112.148438], 4);
            new L.Control.Zoom({ position: 'bottomleft' }).addTo(map);

            // Add the Stamen toner tiles as a base layer
            var baseLayer = new L.StamenTileLayer('toner', {
                detectRetina: true
            }).addTo(map);

            // Add a layer control
            var layerControl = L.control.layers().addTo(map);

            // Add a legend control
            // var legendControl = L.control.legend({
            //     autoAdd: false
            // }).addTo(map);

            // Get the top count of relations
            // mapDataLookup = _.filter(mapDataLookup, function (value) {
            //     return value.type !== 'Collection';
            // });

            // Create a lookup of airports by code.  NOTE:  this is easy, but non-optimal, particularly with a large dataset
            // Ideally, the lookup would have already been created on the server or created and imported directly
            //var mapDataLookup = L.GeometryUtils.arrayToMap(mapData, 'nid');

            // Group flight data by nid code
            var mapDataPerType = _.groupBy(mapData, function (value) {
                return (value.type !== 'data_point') ? 'organization' : 'data_point' ;
            });

            var orgs = L.GeometryUtils.arrayToMap(mapDataPerType.organization, 'nid');
            var cols = L.GeometryUtils.arrayToMap(mapDataPerType.data_point, 'nid');

            //console.log(mapDataPerType);
            // Group flight data by nid code
            var mapDataPerNetwork = _.groupBy(mapDataPerType.Organization, function (value) {
                return value.belongs_to;
            });
            // Sort flight data in descending order by the number of relations.  This will ensure that thicker lines get displayed
            // below thinner lines
            relations = _.sortBy(relations, function (value) {
                return -1 * value.nid;
            });

            // Organizations by network
            var airlineLookup = _.groupBy(relations, function (value) {
                return value.from;
            });

            //var maxCountAll = Number(relations[0].nid);
            var maxCountAll = 200;

            // Get the top count of relations
            relations = _.filter(relations, function (value) {
                return value.from !== value.to;
            });

            //var maxCount = Number(relations[0].nid);
            var maxCount = 50;

            var count = 0;

            // Get an airport location.  This function looks up an airport from a provided airport code
            var getLocation = function (context, locationField, fieldValues, callback) {
                var key = fieldValues[0];
                var airport = orgs[key];
                //console.log(key);
                var location;

                if (airport) {
                    var latlng = new L.LatLng(Number(airport.lat), Number(airport.lon));
                    location = {
                        location: latlng,
                        text: key,
                        center: latlng
                    };
                }

                return location;
            };

            var sizeFunction = new L.LinearFunction([1, 16], [253, 48]);

            var options = {
                recordsField: null,
                locationMode: L.LocationModes.CUSTOM,
                fromField: 'from',
                toField: 'to',
                codeField: null,
                getLocation: getLocation,
                getEdge: L.Graph.EDGESTYLE.ARC,
                includeLayer: function (record) {
                    return false;
                },
                getIndexKey: function (location, record) {
                    return record.from + '_' + record.to;
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
                    opacity: 0.9,
                    weight: 0.5,
                    fillOpacity: 1.0,
                    distanceToHeight: new L.LinearFunction([0, 20], [1000, 300]),

                    //The starting and ending percentages (0 - 1) along the line at which to position control points
                    //controlPointOffsets: new L.Point(0.2, 0.2),

                    // Q or C for quadratic or cubic bezier
                    mode: 'C',
                    markers: {
                        end: true
                    },
                    /*
                    animatePath: {
                        property: 'stroke-dashoffset',
                        duration: '1.5s',
                        timingFunction: 'ease-in-out'
                    }
                    */
                },
                legendOptions: {
                    width: 200,
                    numSegments: 5,
                    className: 'legend-line'
                },
                tooltipOptions: {
                    iconSize: new L.Point(80, 100),
                    iconAnchor: new L.Point(-5, 100),
                    className: 'leaflet-div-icon line-legend'
                },
                displayOptions: {
                    'Network': {
                        title: function (value) {
                            return value;
                        },
                        /*weight: new L.LinearFunction([0, 1], [maxCount, 14]),
                        color: new L.HSLHueFunction([0, 200], [maxCount, 330], {
                            outputLuminosity: '60%'
                        }),
                        displayName: 'Flightsf'*/
                        weight: 2,
                        color: '#ccc',
                        
                    }
                },
                onEachRecord: function (layer, record, location) {
                    //layer.bindPopup($(L.HTMLUtils.buildTable(record)).wrap('<div/>').parent().html());
                    location.location.animateLine({
                        duration: Math.random() * 5000 + 500,
                        easing: L.AnimationUtils.easingFunctions.easeOut
                    });
                }
            };

            var allLayer = new L.Graph(relations, options);
            map.addLayer(allLayer);

            var markerLayerOptions = {
                
                recordsField: null,
                locationMode: L.LocationModes.LATLNG,
                latitudeField: 'lat',
                longitudeField: 'lon',
                displayOptions: {
                    'type': {
                        color: function (value) {
                            return value === 'organization' ? '#ccc' : '#000' ;
                        }
                        //color: '#CCCCCC'
                    },
                    'title': {
                        title: function (value) {
                            return value;
                        },
                        searchtext: function (value) {
                            return value;
                        }
                    }
                },
                layerOptions: {
                    fill: false,
                    searchtext: '',
                    stroke: false,
                    weight: 1,
                    color: '#A0A0A0'
                },
                filter: function (record) {
                    return Number(record.nid) > 0;
                },
                setIcon: function (record, options) {
                    var html = '<div><i class="fa fa-building"></i><!--<span class="code">' + record.title + '</span>--></div>';
                    var $html = $(html);
                    var $i = $html.find('i');

                    L.StyleConverter.applySVGStyle($i.get(0), options);

                    //var directFlights = L.Util.getFieldValue(record, 'nid');
                    var size = sizeFunction.evaluate(100);

                    $i.width(size);
                    $i.height(size);
                    $i.css('font-size', size + 'px');
                    $i.css('line-height', size + 'px');

                    var $code = $html.find('.code');

                    $code.width(size);
                    $code.height(size);
                    $code.css('line-height', size + 'px');
                    $code.css('font-size', size / 3 + 'px');
                    $code.css('margin-top', -size / 2 + 'px');

                    var icon = new L.DivIcon({
                        iconSize: new L.Point(size, size),
                        iconAnchor: new L.Point(size / 2, size / 2),
                        className: 'airport-icon',
                        html: $html.wrap('<div/>').parent().html()
                    });

                    return icon;
                },
                onEachRecord: function (layer, record) {
                    layer.bindPopup($(L.HTMLUtils.buildTable(record)).wrap('<div/>').parent().html());
                    //layer.on('click', function () {
                        // $info.empty();
                        // $info.append($(L.HTMLUtils.buildTable(record)).wrap('<div/>').parent().html());

                        // allLayer.options.includeLayer = function (newRecord) {
                        //    return newRecord.from === record.nid /*|| newRecord.to === record.nid*/;
                        // };
                        //allLayer.reloadData();
                    //});
                }
            };

            var airportsLayer = new L.MarkerDataLayer(orgs, markerLayerOptions);
            var collectionsLayer = new L.MarkerDataLayer(cols, markerLayerOptions);
            
            markers = new L.MarkerClusterGroup();
            markers.addLayer(collectionsLayer); 

            map.addLayer(markers); //Add collections layer
            map.addLayer(airportsLayer); //Add organizations Layer

            layerControl.addOverlay(airportsLayer, 'Organizations');
            layerControl.addOverlay(markers, 'Data points');

            // Iterate through the keys in the airlineLookup object.  Each key is an nid code
            for (var key in airlineLookup) {

                if (key !== 'all') {
                    // Create a graph layer that draws lines from the location in the fromField to the location in the toField.
                    // In this case, we'll use a custom locationMode and implement the getLocation function to lookup the airport
                    // location from the airport data we have available.
                    var airportOptions = L.extend(options, {
                        includeLayer: function (record) {
                            return record.from === key;
                        }
                    })

                    var flightLayer = new L.Graph(relations, airportOptions);
                    
                    layerControl.addOverlay(flightLayer, airlineLookup[key][0].Network);

                    if (count === 0) {
                        
                        // Add the layers we want to display to the legend
                        // Since all group lines use the same weight and color scales, just add the first layer to the legend
                        //legendControl.addLayer(flightLayer);

                        // Add each layer to the map
                        //map.addLayer(flightLayer);
                    }
                    count++;
                }

            }
            //var searchLayer = L.layerGroup().addTo(map);
            //... adding data in searchLayer ...

            new L.Control.GPlaceAutocomplete({position: 'topleft'}).addTo(map);

    //console.log(L.Control.Search);
    //searchLayer is a L.LayerGroup contains searched markers

    //Add a custom control
    // create the control
    var command = L.control({position: 'topleft'});

    command.onAdd = function (map) {
        var div = L.DomUtil.create('div', 'command');
        var layersToSelect = ['Organizations','Collections'];
        var html = '<ul id="search-select" class="list-unstyled"><li class="init">-</li>';
        for (var i = 0; i < layersToSelect.length; i++) {
                html += '<li id="' + layersToSelect[i] + '">' + layersToSelect[i] + '</li>';          
            }
            html += '</ul>';

        //div.innerHTML = $('.leaflet-control-layers-overlays').html(); 
        div.innerHTML = html; 
        return div;
    };

    command.addTo(map);
    searchControl = new L.Control.Search({
            layer: airportsLayer,
            propertyName: 'searchtext',
            initial: false,
            collapsed: false
        });

            map.addControl( searchControl );

    $('.command li').on("click", handleCommand);

    // add the event handler
    function handleCommand() {

       var index = $(this).index() - 1;
       if(index !== -1)
        searchControl.setLayer(layerControl._layers[index].layer);
    }

    //map.on('overlayadd', onOverlayAdd);

    // map.eachLayer(function (layer) {
    //     console.log(layer);
    // });

    }
        function onOverlayAdd(e){
            //do whatever
            console.log(e.layer);
            searchControl.setLayer(e.layer);
            //searchControl.searchText('agecon');
        }

            $("body").on("click", "#search-select .init", function() {
                $(this).closest("ul").children('li:not(.init)').toggle();
            });

    $("body").on("click", "#search-select li:not(.init)", function() {
        var allOptions = $("#search-select").children('li:not(.init)');
        allOptions.removeClass('selected');
        $(this).addClass('selected');
        $("ul").children('.init').html($(this).html());
        allOptions.toggle();
    });

    });
})(jQuery);