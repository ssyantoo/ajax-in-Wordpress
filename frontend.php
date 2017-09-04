<?php
// Add the JS
//Doing ajax in the frontend

function theme_name_scripts() {
  wp_enqueue_script( 'script-name', get_template_directory_uri() . '/assets/js/example.js', array('jquery'), '1.0.0', true );  //Put the example.js location as your setup
  
  wp_localize_script( 'script-name', 'MyAjax', array(
    // URL to wp-admin/admin-ajax.php to process the request
    'ajaxurl' => admin_url( 'admin-ajax.php' ),

    // generate a nonce with a unique ID "myajax-post-comment-nonce"
    // so that you can check it later when an AJAX request is sent
    'security' => wp_create_nonce( 'my-special-string' )
    ));
}
add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );

// The function that handles the AJAX request
function my_action_callback() {
  check_ajax_referer( 'my-special-string', 'security' );
  $whatever = intval( $_POST['whatever'] );
  $whatever += 10;
  echo $whatever;
  wp_die(); // this is required to terminate immediately and return a proper response
}
add_action( 'wp_ajax_my_action', 'my_action_callback' );
