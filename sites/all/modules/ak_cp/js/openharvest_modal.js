/**
* Provide the HTML to create the modal dialog.
*/
(function ($) {
  
  Drupal.theme.prototype.openharvest_modal_fixed = function () {
    var html = '';
    html += '<div id="ctools-modal" class="popups-box">';
    html += '  <div class="ctools-modal-content ctools-modal-openharvest-modal-content-fixed">';
    html += '      <div class="modal-header popups-title">';
    html += '        <span id="modal-title" class="modal-title"></span>';
    html += '    <span class="close popups-close"><a class="pull-right" href="#"><i class="fa fa-times" aria-hidden="true"></i></a></span>';
    html += '      </div>';
    html += '    <div class="modal-scroll"><div id="modal-content" class="modal-content popups-body"></div></div>';
    html += '  </div>';
    html += '</div>';
    return html;
  }

  Drupal.theme.prototype.openharvest_modal_scale = function () {
    var html = '';
    html += '<div id="ctools-modal" class="popups-box">';
    html += '  <div class="ctools-modal-content ctools-modal-openharvest-modal-content-scale">';
    html += '      <div class="modal-header popups-title">';
    html += '        <span id="modal-title" class="modal-title"></span>';
    html += '    <span class="close popups-close"><a class="pull-right" href="#"><i class="fa fa-times" aria-hidden="true"></i></a></span>';
    html += '      </div>';
    html += '    <div class="modal-scroll"><div id="modal-content" class="modal-content popups-body"></div></div>';
    html += '  </div>';
    html += '</div>';
    return html;
  }

})(jQuery);