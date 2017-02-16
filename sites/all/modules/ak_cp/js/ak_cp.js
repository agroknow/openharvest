(function($) {
    $(document).ready(function () {
        
            var searchControl;
            var map;
            var dataPointMarkers = null;
            var $info = $('#info');
            var $map = $('#map');
            var networkColors = {
                'Agris':'#8342f4',
                'GLN':'#42eef4'
            };
            //moved to page--front.tpl and page--map.tpl
            // var typeColors = {
            //     'organization':'#f47d42',
            //     'data_point':'#e5f442',
            //     'initiative':'#f4425f',
            // };
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
                        //var t0 = performance.now();
                        startmap();
                        //var t1 = performance.now();
                        //console.log("Call to doSomething took " + (t1 - t0) + " milliseconds.")
                });
             });
            
            function startmap() {
            map = L.map('map', { 
                zoomControl: false,
                zoomsliderControl: false,
            }).setView([44.715514, -112.148438], 4);

            new L.Control.Zoom({ position: 'bottomleft' }).addTo(map);

            // Add the Stamen toner tiles as a base layer
            // var baseLayer = new L.StamenTileLayer('toner', {
            //     detectRetina: true
            // }).addTo(map);
            //Set the map tile (check http://leaflet-extras.github.io/leaflet-providers/preview/index.html)
            
            // var Stamen_Watercolor = L.tileLayer('http://stamen-tiles-{s}.a.ssl.fastly.net/watercolor/{z}/{x}/{y}.{ext}', {
            //     attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
            //     subdomains: 'abcd',
            //     minZoom: 1,
            //     maxZoom: 16,
            //     ext: 'png'
            // });
            customTile.addTo(map);
            
            // Add a layer control
            //var layerControl = L.control.layers().addTo(map);

            // Add a legend control
            // var legendControl = L.control.legend({
            //     autoAdd: false
            // }).addTo(map);

            // Get the top count of relations
            // mapDataLookup = _.filter(mapDataLookup, function (value) {
            //     return value.type !== 'Collection';
            // });

            // Create a lookup of entities by nid. 
            //var mapDataLookup = L.GeometryUtils.arrayToMap(mapData, 'nid');

            // Group data by nid code
            var mapDataPerType = _.groupBy(mapData, function (value) {
                return (value.type !== 'data_point') ? 'organization' : 'data_point' ;
            });

            var orgs = L.GeometryUtils.arrayToMap(mapDataPerType.organization, 'nid');
            var dpoints = L.GeometryUtils.arrayToMap(mapDataPerType.data_point, 'nid');

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
            var relationship = _.groupBy(relations, function (value) {
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

            // Get an node location.  This function looks up an node from a provided node code
            var getLocation = function (context, locationField, fieldValues, callback) {
                var key = fieldValues[0];
                var node = orgs[key];
                //console.log(key);
                var location;

                if (node) {
                    var latlng = new L.LatLng(Number(node.lat), Number(node.lon));
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

                getLocationText: function (record){
                    return '';
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
                        color: function (value) {
                            return networkColors[value];
                        },
                        weight: 1,
                        /*weight: new L.LinearFunction([0, 1], [maxCount, 14]),
                        color: new L.HSLHueFunction([0, 200], [maxCount, 330], {
                            outputLuminosity: '60%'
                        }),
                        displayName: '',*/ 
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
                            return typeColors[value];
                        }
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
                    var html = '<div title="' + record.title + '"><i class="fa fa-circle-o"></i><!--<span class="code">' + record.title + '</span>--></div>';
                    var $html = $(html);
                    var $i = $html.find('i');

                    L.StyleConverter.applySVGStyle($i.get(0), options);

                    //var directFlights = L.Util.getFieldValue(record, 'nid');
                    var size = sizeFunction.evaluate(80);

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
                        className: 'icon',
                        html: $html.wrap('<div/>').parent().html()
                    });

                    return icon;
                },
                onEachRecord: function (layer, record) {
                    //layer.bindPopup($(L.HTMLUtils.buildTable(record)).wrap('<div/>').parent().html());
                    layer.bindPopup(record.title + '<br />' + '..');
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

            var organizationsLayer = new L.MarkerDataLayer(orgs, markerLayerOptions);
            var dataPointsLayer = new L.MarkerDataLayer(dpoints, markerLayerOptions);
            
            dataPointMarkers = new L.MarkerClusterGroup({
                iconCreateFunction: function (cluster) {
                var myClass = ' marker-cluster-';
                var rad;
                var count = cluster.getChildCount();
                if (count < 8) {
                    myClass += 'small';
                    rad = 30;
                } else if (count < 60) {
                    myClass += 'medium';
                    rad = 40;
                } else {
                    myClass += 'large';
                    rad = 50;
                } 
                return L.divIcon({ html: '<div><span>' + count + '</span></div>', className: 'marker-cluster' + myClass, iconSize: new L.Point(rad, rad)  });
            },
            });
            dataPointMarkers.addLayer(dataPointsLayer); 

            map.addLayer(dataPointMarkers); //Add collections layer
            map.addLayer(organizationsLayer); //Add organizations Layer

            map.removeLayer(organizationsLayer);

            //layerControl.addOverlay(organizationsLayer, 'Organizations');
            //layerControl.addOverlay(dataPointMarkers, 'Data points');

            // Iterate through the keys in the relationship object.  Each key is an nid code
            // Disable for now
            if(false) {
            for (var key in relationship) {

                if (key !== 'all') {
                    // Create a graph layer that draws lines from the location in the fromField to the location in the toField.
                    // In this case, we'll use a custom locationMode and implement the getLocation function to lookup the node
                    // location from the node data we have available.
                    var dataOptions = L.extend(options, {
                        includeLayer: function (record) {
                            return record.from === key;
                        }
                    })

                    var globalLayer = new L.Graph(relations, dataOptions);
                    
                    layerControl.addOverlay(globalLayer, relationship[key][0].Network);

                    if (count === 0) {
                        
                        // Add the layers we want to display to the legend
                        // Since all group lines use the same weight and color scales, just add the first layer to the legend
                        //legendControl.addLayer(globalLayer);

                        // Add each layer to the map
                        //map.addLayer(globalLayer);
                    }
                    count++;
                }

            }
            }

            //var searchLayer = L.layerGroup().addTo(map);
            //... adding data in searchLayer ...

            //Do not add the google places control
            //new L.Control.GPlaceAutocomplete({position: 'topleft'}).addTo(map);

    //console.log(L.Control.Search);
    //searchLayer is a L.LayerGroup contains searched markers

    //Add a custom control
    // create the control
    var customControl = L.control({position: 'topleft'});

    customControl.onAdd = function (map) {
        var div = L.DomUtil.create('div', 'customControl');
        var layersToSelect = ['Organizations','Collections'];
        var html = '<select class="selectpicker" style="display:none;">';
        for (var i = 0; i < layersToSelect.length; i++) {
                html += '<option value="' + layersToSelect[i] + '">' + layersToSelect[i] + '</option>';          
            }
            html += '</select>';

        //div.innerHTML = $('.leaflet-control-layers-overlays').html(); 
        div.innerHTML = html; 
        return div;
    };

    //Do not add the custom control for this version
    //customControl.addTo(map);
    //$('.selectpicker').selectpicker();

    searchControl = new L.Control.Search({
            layer: organizationsLayer,
            propertyName: 'searchtext',
            initial: false,
            collapsed: false,
            autoResize: false,
            textPlaceholder: ' Type something to search... ',
            minLength: 3,
        });
        //Do not add the searchcontrol
        //map.addControl( searchControl );

    $('.customControl select').on("change", handlecustomControl);

    // add the event handler
    function handlecustomControl() {
       
       var index = $(this).prop('selectedIndex');
       if(index !== -1) {
            map.removeLayer(layerControl._layers[index].layer);
            searchControl.setLayer(layerControl._layers[index].layer);
            }
    }

    //map.on('overlayadd', onOverlayAdd);

    // map.eachLayer(function (layer) {
    //     console.log(layer);
    // });

    //remove the organiations Layer
    map.removeLayer(organizationsLayer);

    }
        function onOverlayAdd(e){
            searchControl.setLayer(e.layer);
            //searchControl.searchText('agecon');
        }

    // $("body").on("click", "#search-select .init", function() {
    //     $(this).closest("ul").children('li:not(.init)').toggle();
    // });

    // $("body").on("click", "#search-select li:not(.init)", function() {
    //     var allOptions = $("#search-select").children('li:not(.init)');
    //     allOptions.removeClass('selected');
    //     $(this).addClass('selected');
    //     $("ul").children('.init').html($(this).html());
    //     allOptions.toggle();
    // });


    });

})(jQuery);