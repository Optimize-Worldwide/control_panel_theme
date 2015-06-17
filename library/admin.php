<?php
/*
TODO: Create menu items

*/

/************* DASHBOARD WIDGETS *****************/

function disable_default_dashboard_widgets() {
	global $wp_meta_boxes;
	// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);    // Right Now Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);        // Activity Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // Comments Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);  // Incoming Links Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);         // Plugins Widget

	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);    // Quick Press Widget
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);     // Recent Drafts Widget
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);           //
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);         //

	// remove plugin dashboard boxes
	unset($wp_meta_boxes['dashboard']['normal']['core']['yoast_db_widget']);           // Yoast's SEO Plugin Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['rg_forms_dashboard']);        // Gravity Forms Plugin Widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['bbp-dashboard-right-now']);   // bbPress Plugin Widget

}


// RSS Dashboard Widget
function bones_rss_dashboard_widget() {
	if ( function_exists( 'fetch_feed' ) ) {
		// include_once( ABSPATH . WPINC . '/feed.php' );               // include the required file
		$feed = fetch_feed( 'http://optimizehere.co/blog/feed/' );        // specify the source feed
		if (is_wp_error($feed)) {
			$limit = 0;
			$items = 0;
		} else {
			$limit = $feed->get_item_quantity(7);                        // specify number of items
			$items = $feed->get_items(0, $limit);                        // create an array of items
		}
	}
	if ($limit == 0) echo '<div>The RSS Feed is either empty or unavailable.</div>';   // fallback message
	else foreach ($items as $item) { ?>

	<h4 style="margin-bottom: 0;">
		<a href="<?php echo $item->get_permalink(); ?>" title="<?php echo mysql2date( __( 'j F Y @ g:i a', 'bonestheme' ), $item->get_date( 'Y-m-d H:i:s' ) ); ?>" target="_blank">
			<?php echo $item->get_title(); ?>
		</a>
	</h4>
	<p style="margin-top: 0.5em;">
		<?php echo substr($item->get_description(), 0, 200); ?>
	</p>
	<?php }
}

function bones_custom_dashboard_widgets() {
	wp_add_dashboard_widget( 'bones_rss_dashboard_widget', __( 'Optimize Worldwide Blog Feed', 'bonestheme' ), 'bones_rss_dashboard_widget' );
}


add_action( 'wp_dashboard_setup', 'disable_default_dashboard_widgets' );
add_action( 'wp_dashboard_setup', 'bones_custom_dashboard_widgets' );


/************* CUSTOM LOGIN PAGE *****************/

// calling your own login css so you can style it

//Updated to proper 'enqueue' method
//http://codex.wordpress.org/Plugin_API/Action_Reference/login_enqueue_scripts
function bones_login_css() {
	wp_enqueue_style( 'bones_login_css', get_template_directory_uri() . '/library/css/login.css', false );
}

function bones_login_url() {  return home_url(); }

function bones_login_title() { return get_option( 'blogname' ); }

add_action( 'login_enqueue_scripts', 'bones_login_css', 10 );
add_filter( 'login_headerurl', 'bones_login_url' );
add_filter( 'login_headertitle', 'bones_login_title' );


/************* CUSTOMIZE ADMIN *******************/


function bones_custom_admin_footer() {
	_e( '<span id="footer-thankyou">Developed by <a href="http://optimizehere.co/" target="_blank">Optimize Worldwide</a></span>. Built using <a href="http://themble.com/bones" target="_blank">Bones</a>.', 'bonestheme' );
}
add_filter( 'admin_footer_text', 'bones_custom_admin_footer' );

add_action('admin_head', 'custom_admin_logo');

function custom_admin_logo() {
	echo '<style>
		#wpadminbar #wp-admin-bar-wp-logo>.ab-item .ab-icon:before {
			content: "";
			background-image: url('.get_bloginfo('template_directory').'/library/images/loading-logo.svg);
			background-size: 100%;
			width: 1.5rem;
			height: 2rem;
			display: block;
			background-repeat: no-repeat;
			top: 1px;
		}
		.wp-admin #wpadminbar #wp-admin-bar-site-name>.ab-item:before {
			display: none;
		}
		#wpadminbar .quicklinks li#wp-admin-bar-my-account.with-avatar>a img {
			background: transparent;
			border: none;
		}
	</style>';
}


/**
 * Redirect user after successful login.
 *
 * @param string $redirect_to URL to redirect to.
 * @param string $request URL the user is coming from.
 * @param object $user Logged user's data.
 * @return string
 */
function my_login_redirect( $redirect_to, $request, $user ) {
	return home_url();
}

// add_filter( 'login_redirect', 'my_login_redirect', 10, 3 );



function mytheme_admin_load_scripts($hook) {
    if( $hook != 'post.php' && $hook != 'post-new.php' )
        return;

    wp_enqueue_script( 'custom-js', get_template_directory_uri()."/library/js/admin.js" );
}
add_action('admin_enqueue_scripts', 'mytheme_admin_load_scripts');




function three_column_layout() {
	ob_start();
	add_screen_option('layout_columns', array('max' => 9, 'default' => 5));
}
add_filter('admin_head','three_column_layout',10,3);

function custom_admin_fonts() {
	echo "<link href='http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic|Oswald:400,700,300|Ubuntu+Mono:400,700' rel='stylesheet' type='text/css' />";
}

add_filter('admin_head','custom_admin_fonts');

?>
