jQuery(document).ready(function($) {

  var data = {
    action: 'my_action',
    security : MyAjax.security, // MyAjax object mention in wp_localize_script
    whatever: 20
  };

  // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
  $.post(MyAjax.ajaxurl, data, function(response) {
  	alert('Hello Frontend');
    alert('Got this from the server: ' + response);
  });
});