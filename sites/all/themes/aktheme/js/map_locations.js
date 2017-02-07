/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var map_var;
var lMap_var;

jQuery(document).ready(function(){
    jQuery('.map-sidebar .region-sidebar-second').addClass('well').addClass('hidden-xs');
    
    jQuery('body').on('click','#mobile-toggle a',function(){
	switch(jQuery(this).attr('id')) {
	    case 'showlist' :
		jQuery('.map-sidebar .region-sidebar-second').hide();
		jQuery('.map-sidebar').show();
		break;
	    case 'showmap' :
		jQuery('.map-sidebar').hide();
		break;
	    case 'showfilters' :
		jQuery('.map-sidebar').show();
		jQuery('.map-sidebar .region-sidebar-second').removeClass('hidden-xs').show();
		break;
	    default:
		break;
	}
    });
    
    //Close info container
    jQuery('body').on('click','#info-container .close',function(){
	jQuery('#info-container').removeClass('shown');
    });
    
    //Show info or load sub list
    jQuery('body').on('click','.load-sublist,.load-view',function(){
	var $this = jQuery(this);
	var row = $this.closest('.views-row');
	//the link must have an id : row-[nid]
	var id = $this.attr('id');
	var arg = id.replace('row-','');
	if($this.hasClass('load-view')) {
	    getVResult(row,'location_info', arg, true, map_var, lMap_var);
	} 
	if(!$this.hasClass('processed')) {
	$this.addClass('processed');
	getVResult(row,'child_locations', arg, false, map_var, lMap_var);
	}
    });
});

jQuery(document).on('leaflet.map', function(event, map, lMap) {
    //Assign global variable
    map_var = map;
    lMap_var = lMap;
});

function getVResult(elm, view_name, args, animate, map, lMap) {
  jQuery.ajax({
    url: Drupal.settings.billy.baseUrl + '/views/ajax',
    type: 'post',
    data: {
      view_name: view_name,
      view_display_id: 'default', //your display id - default for master
      view_args: args,
    },
    dataType: 'json',
    success: function (response) {
      if (response[1] !== undefined) {
        var viewHtml = response[1].data;
	if(animate) {
	    animateContent(jQuery('#info-container'),viewHtml);    
	} else {
	    elm.after('<div class="sub-list">' + viewHtml + '</div>');
	    if(map && lMap)
		jQuery(document).trigger('leaflet.map',[map, lMap]);
	}
        //Drupal.attachBehaviors(); //check if you need this.
      }
    }
  });
}

function animateContent(element, content) {
    element.find('.content').html(content);
    element.addClass('shown');
    //element.animate({left: "0"}, 500);
    //element.find('.close').show();    
}