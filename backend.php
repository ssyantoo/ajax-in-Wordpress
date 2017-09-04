<?php
//put this in functions.php of your wordpress theme
add_action( 'admin_footer', 'my_action_javascript' ); // Write our JS below here

function my_action_javascript() { ?>
<script type="text/javascript" >
    jQuery(document).ready(function($) {
        //setting up the default ajax of wordpress: wp-admin/admin-ajax.php
        var ajaxurl = '<?php echo admin_url( 'admin-ajax.php', 'relative' ); ?>';

        var data = {
            'action': 'my_action',
            'whatever': 10
        };

            // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
            jQuery.post(ajaxurl, data, function(response) {
                alert('Hello Backend');
                alert('Got this from the server: ' + response);
            });
        });
    </script>
    <?php
}


add_action( 'wp_ajax_my_action', 'my_action' );

function my_action() {
    global $wpdb; // this is how you get access to the database

    $whatever = intval( $_POST['whatever'] );
    $whatever += 20;
    echo $whatever;
        wp_die(); // this is required to terminate immediately and return a proper response
    }