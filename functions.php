<?php
/*
Author: Tyler Shuster from work by Eddie Machado
*/

function update_cmb_meta_box_url( $url ) {
	// modify the url here
	// return $url;
	return "http://cp.optimizehere.co/wp-content/plugins/cmb2";
}
add_filter( 'cmb2_meta_box_url', 'update_cmb_meta_box_url' );

require_once( 'library/bones.php' );

add_action( 'after_switch_theme', 'bones_flush_rewrite_rules' );

function bones_flush_rewrite_rules() {
	flush_rewrite_rules();
}
// Post Types
require_once( 'library/post-types/client.php' );
require_once( 'library/post-types/site.php' );
require_once( 'library/post-types/credential.php' );
require_once( 'library/post-types/reference.php' );
require_once( 'library/post-types/checklist.php' );

// Meta Boxes
// require_once('library/field-select2.php');
require_once('library/cmb-field-select2/cmb-field-select2.php');
require_once('library/meta-boxes/site.php');
require_once('library/meta-boxes/client.php');
require_once('library/meta-boxes/reference.php');
require_once('library/meta-boxes/credential.php');
require_once('library/meta-boxes/checklist.php');
require_once('library/meta-boxes/user.php');

// User Roles
require_once( 'library/user-roles.php' );

require_once( 'library/admin.php' );
require_once( 'library/admin-menu.php' );

require_once('library/color_functions.php');
require_once( 'library/checklist_functions.php' );

require_once( 'library/class-tgm-plugin-activation.php');

show_admin_bar(false);

/*********************
LAUNCH BONES
Let's get everything up and running.
*********************/

function bones_ahoy() {

	add_editor_style();

	load_theme_textdomain( 'bonestheme', get_template_directory() . '/library/translation' );

	add_action( 'init', 'bones_head_cleanup' );
	add_filter( 'wp_title', 'rw_title', 10, 3 );
	add_filter( 'the_generator', 'bones_rss_version' );
	add_filter( 'wp_head', 'bones_remove_wp_widget_recent_comments_style', 1 );
	add_action( 'wp_head', 'bones_remove_recent_comments_style', 1 );
	add_filter( 'gallery_style', 'bones_gallery_style' );

	add_action( 'wp_enqueue_scripts', 'bones_scripts_and_styles', 999 );

	bones_theme_support();

	add_action( 'widgets_init', 'bones_register_sidebars' );

	add_filter( 'the_content', 'bones_filter_ptags_on_images' );
	add_filter( 'excerpt_more', 'bones_excerpt_more' );

}

add_action( 'after_setup_theme', 'bones_ahoy' );


/************* OEMBED SIZE OPTIONS *************/

if ( ! isset( $content_width ) ) {
	$content_width = 640;
}



/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1', 'bonestheme' ),
		'description' => __( 'The first (primary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
}


/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments( $comment, $args, $depth ) {
	$user_id = get_current_user_id();
	 $GLOBALS['comment'] = $comment; ?>
	<div id="comment-<?php comment_ID(); ?>" <?php comment_class('cf'); ?>>
		<article class="cf">
			<?php echo get_wp_user_avatar($comment->user_id, 'thumbnail'); ?>
			<time datetime="<?php echo comment_time('Y-m-j'); ?>"><?php comment_time(__( 'Y-m-d', 'bonestheme' )); ?>:&nbsp;</time>
			<?php if ($comment->comment_approved == '0') : ?>
				<div class="alert alert-info">
					<p><?php _e( 'Your comment is awaiting moderation.', 'bonestheme' ) ?></p>
				</div>
			<?php endif; ?>
			<?php comment_text() ?>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
<?php
}


function bones_fonts() {
	wp_register_style('googleFonts', 'http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic|Oswald:400,700,300|Ubuntu+Mono:400,700');
	wp_enqueue_style( 'googleFonts');
}
add_action('wp_print_styles', 'bones_fonts');

// Defines AJAX URL
add_action('wp_head','my_ajaxurl');
function my_ajaxurl() {
	$html = '<script type="text/javascript">';
	$html .= 'var ajaxurl = "' . admin_url( 'admin-ajax.php' ) . '"';
	$html .= '</script>';
	echo $html;
}


function show_all_posts( $query ) {
	if ( $query->is_main_query() ) {
		$query->set( 'posts_per_page', -1 );
	}
}
add_action( 'pre_get_posts', 'show_all_posts' );


require_once('library/require-login.php');
require_once( 'library/required-plugins.php');

add_action('admin_init', 'set_user_metaboxes');
function set_user_metaboxes($user_id=NULL) {
		$post_types= array( 'post', 'page', 'link', 'attachment','site','client','credential','reference' );
		foreach ($post_types as $post_type) {

			$meta_key= array(
					'order' => "meta-box-order_$post_type",
					'hidden' => "metaboxhidden_$post_type",
			);

			if ( ! $user_id)
					$user_id = get_current_user_id();

			if ( ! get_user_option( $meta_key['order'], $user_id ) ) {
					$meta_value = array(
							'side' => 'submitdiv,formatdiv,categorydiv,postimagediv',
							'normal' => 'postexcerpt,tagsdiv-post_tag,postcustom,commentstatusdiv,commentsdiv,trackbacksdiv,slugdiv,authordiv,revisionsdiv',
							'advanced' => '',
					);
					update_user_option( $user_id, $meta_key['order'], $meta_value, true );
			}

			if ( ! get_user_option( $meta_key['hidden'], $user_id ) ) {
					$meta_value = array('postcustom','trackbacksdiv','commentstatusdiv','commentsdiv','slugdiv','authordiv','revisionsdiv');
					update_user_option( $user_id, $meta_key['hidden'], $meta_value, true );
			}
		}
}

function fee_disable_on_archive_pages( $disable ) {
	return is_archive();
}
add_filter( 'front_end_editor_disable', 'fee_disable_on_archive_pages' );


function tel_format($number) {
	return preg_replace("/[^0-9]/", "", $number);
}

function sitemanager_xml_func( $atts ){
	$args = array(
		'post_type' => 'site',
		'orderby' => 'name',
		'posts_per_page' => -1,
		'nopaging' => true,
		'order' => 'ASC'
	);
	$site_query = new WP_Query( $args );

	$html = "";
	$html .= "<button class='clipboard'>d</button>";
	$html .= "<pre><code>";
	$html .= "&lt;?xml version=&quot;1.0&quot; encoding=&quot;UTF-8&quot; standalone=&quot;true&quot;?&gt;<br />";
	$html .= "&lt;FileZilla3&gt;<br />";
	$html .= "    &lt;Servers&gt;<br />";
	if ($site_query->have_posts()): while ($site_query->have_posts()): $site_query->the_post();
		$ftp['ip']     = get_editable_post_meta($post->ID,'_site_ftp_ip_address','input',true);
		$ftp['path']   = get_editable_post_meta($post->ID,'_site_ftp_absolute_path','input',true);
		$ftp['logins'] = get_post_meta($post->ID,'_site_ftp_logins',true);
		$ftp['notes']  = get_editable_post_meta($post->ID,'_site_ftp_notes','textarea',true);
		$html .= "        &lt;Server&gt;<br />";
		$html .= "            &lt;Host&gt;".$ftp['ip']."&lt;/Host&gt;<br />";
		$html .= "            &lt;Port&gt;21&lt;/Port&gt;<br />";
		$html .= "            &lt;Protocol&gt;ftp&lt;/Protocol&gt;<br />";
		$html .= "            &lt;Type&gt;0&lt;/Type&gt;<br />";
		$html .= "            &lt;User&gt;".$ftp['logins'][0]['username']."&lt;/User&gt;<br />";
		$html .= "            &lt;Pass&gt;".$ftp['logins'][0]['password']."&lt;/Pass&gt;<br />";
		$html .= "            &lt;Logontype&gt;2&lt;/Logontype&gt;<br />";
		$html .= "            &lt;TimezoneOffset&gt;0&lt;/TimezoneOffset&gt;<br />";
		$html .= "            &lt;PasvMode&gt;MODE_DEFAULT&lt;/PasvMode&gt;<br />";
		$html .= "            &lt;MaximumMultipleConnections&gt;0&lt;/MaximumMultipleConnections&gt;<br />";
		$html .= "            &lt;EncodingType&gt;Auto&lt;/EncodingType&gt;<br />";
		$html .= "            &lt;BypassProxy&gt;0&lt;/BypassProxy&gt;<br />";
		$html .= "            &lt;Name&gt;".get_the_title()."&lt;/Name&gt;<br />";
		$html .= "            &lt;Comments/&gt;<br />";
		$html .= "            &lt;RemoteDir/&gt;<br />";
		$html .= "            &lt;SyncBrowsing&gt;1&lt;/SyncBrowsing&gt;<br />";
		$html .= "            ".get_the_title()."<br />";
		$html .= "        &lt;/Server&gt;<br />";
	endwhile;endif;
	$html .= "    &lt;/Servers&gt;<br />";
	$html .= "&lt;/FileZilla3&gt;<br />";
	$html .= "</code></pre>";

	return $html;
}
add_shortcode( 'sitemanager_xml', 'sitemanager_xml_func' );


// remove_filter( 'the_content', 'wpautop' );
// remove_filter( 'the_excerpt', 'wpautop' );

function wpse_wpautop_nobr( $content ) {
    return wpautop( $content, false );
}

// add_filter( 'the_content', 'wpse_wpautop_nobr' );
// add_filter( 'the_excerpt', 'wpse_wpautop_nobr' );




function billable_stamp_ajax(){
	$user = $_POST['user'];
	$site = $_POST['id'];
	$stamped_task = stripslashes($_POST['task']);

	$user_stamps = get_user_meta($user,'time_stamps',true);
	$site_tasks = get_post_meta($site,'_tasks',true);

	$client = get_post_meta($site,'_site_client',true);

	$user_stamps[$client][$site][$stamped_task][] = current_time('timestamp');
	$site_tasks[$stamped_task][current_time('timestamp')] =  $user;

	$userdata = get_userdata($user);

	if(count($user_stamps[$client][$site][$stamped_task]) == 1) {
		$stamp_type = "initial";
		$html = "	<ul class='users'>
										<li data-user=".$userdata->ID.">
											<h4>".$userdata->first_name."<small>&nbsp;started working at ".date('H:i',current_time('timestamp'))."</small></h4>
											<ul class='stamps'>
												<button class='stop'>Stop Working</button>
											</ul>
										</li>
									</ul>";
	} elseif(count($user_stamps[$client][$site][$stamped_task]) % 2 == 0){
		$stamp_type = "completed";
		$stamps = $user_stamps[$client][$site][$stamped_task];
		$end = end($stamps);
		$start = prev($stamps);
		$html = "<li class='duration'>".$end." - ".$start."</li>";
		$duration = $end - $start;
		$duration = $duration/60;
		$html = "<li class='duration'>".round($duration,2)." minutes on ".date('m-j')."<time>".date('H:i',$start)." to ".date('H:i',$end)."</time></li>";
	} else {
		$stamp_type = "started";
		$stamps = $user_stamps[$client][$site][$stamped_task];
		$html = date('H:i',end($stamps));
	}

	update_user_meta($user,'time_stamps',$user_stamps);
	update_post_meta($site,'_tasks',$site_tasks);

	$response = array(
		'type' => $stamp_type,
		'html' => $html
		);
	wp_send_json( $response );
}
add_action('wp_ajax_billable_stamp','billable_stamp_ajax');

function billable_create_ajax() {
	$site = $_POST['id'];
	$task = stripslashes($_POST['task']);

	$tasks = get_post_meta($site,'_tasks',true);

	if($tasks){
		$tasks[$task] = array();
	} else {
		$tasks = array(
			$task => array()
			);
	}


	update_post_meta($site,'_tasks',$tasks);

	$html = "	<li class='accordion task'>
							<header>
								<h3>".$task."</h3>
							</header>
							<main style='display:block'>
								<button class='start'>Start Working</button>
							</main>
						</li>";

	die($html);
}
add_action('wp_ajax_billable_create','billable_create_ajax');

function round_to_quarter_hour($time) {
	$frac = 900;//900 seconds in 15 minutes
	$remainder = $time % $frac;//Get remainder from time
	$new_time = $time + ($frac - $remainder);//New time is original time plus whatever is left over from a quarter-hour interval
	$time = round($new_time,2);
	return $time;
}

function billableemail() {
	$recipient = "web@optimizehere.co";

	$today = date('Y-m-d',current_time('timestamp'));               //Set variable to today's date
	$todays_stamps = array();                                       //Initialize empty todays_stamps array

	$users = get_users();                                           //Get all users
	$userids = array();                                             //Initialize empty userids array
	foreach($users as $user) $userids[] = $user->ID;                //Put all user ids into an array
	foreach($userids as $user) {                                    //Loop through array of users
		$user_stamps = get_user_meta($user,'time_stamps',true);       //Get user's time stamps
		if($user_stamps) {                                            //If user has stamps, continue
			foreach($user_stamps as $client => $client_stamps) {        //Set $client to client's ID & continue
				foreach($client_stamps as $site => $site_stamps) {        //Set $site to site's ID & continue
					foreach($site_stamps as $task => $task_stamps) {        //Set $task to task name & continue
						foreach($task_stamps as $task_stamp) {                //Loop through stamps on task
							$stamp_day = date('Y-m-d',$task_stamp);             //Get day of stamp
							if($stamp_day == $today) {                          //If stamp happened today, add to today's stamps under client->site->task
								$todays_stamps[$user][$client][$site][$task][] = $task_stamp;
							}}}}}}}

	$from_emails = array();

	$table_header = "<table style='width: 100%;border: 1px solid black;border-collapse: collapse;'>";
	$table_row = "<tr style='border-bottom: 1px solid black;'>";
	$table_data = "<td style='border-right: 1px solid black;'>";


	/*
	[todays_stamps] => array(
		[user_id] => array(
			[client_id] => array(
				[site_id] => array(
					[task_name] => array(
						[0] => UTC timestamp
						[1] => UTC timestamp
					)
				)
			)
		)
	);
	*/
	foreach ($todays_stamps as $user => $clients):
		$userdata = get_userdata($user);                                       //Get user data
		$users_with_billables[$user] = "";                                     //Initialize key in array with user ID, with blank content for message
		foreach($clients as $client => $sites):                                //For each client user has worked for, set $client & continue
			foreach($sites as $site => $tasks):                                  //For each site user has worked for, set $site & continue
				$post = get_post($site);                                           //Get site info (this method because FEE outputs crap)
				$users_with_billables[$user] .= "<h3>".$post->post_title.":</h3> ";//Add header to message
				$users_with_billables[$user] .= $table_header;                     //Add table header
				foreach($tasks as $name => $stamps):                               //For each task performed, set $name & continue
					$users_with_billables[$user] .= $table_row;                      //Begin table row for task
					$total = 0;                                                      //Zero total
					$users_with_billables[$user] .= $table_data.$name."</td>";       //Put task name in table data
					foreach($stamps as $id => $stamp):                               //For each stamp, set ID & stamp
						if($id % 2 === 0):                                             //If ID is evenly divisible by 2, it's a starting stamp
							$start = $stamp;                                             //Set $start
						else:                                                          //If not divisible by 2, it's an ending stamp
							$end = $stamp;                                               //Set $end //TODO: If $start and no end, specify that there is a task in progress
							$task_length = $end - $start;                                //Figure out task length
							$total = $total + $task_length;                              //Add task length to total length of task
						endif;
					endforeach;                                                      //$stamps
					$total = round_to_quarter_hour($total);                          //Round total UP to nearest 15
					$total = ($total / 60) / 60;                                     //Turn into hours
					$users_with_billables[$user] .= "<td>".$total." hours</td>";     //Output total in table data
					$users_with_billables[$user] .= "</tr>";                         //End table row
				endforeach;                                                        //$tasks
				$users_with_billables[$user] .= "</table>";                        //End table
			endforeach;                                                          //$sites
		endforeach;                                                            //$clients
	endforeach;                                                              //main stamp loop

	if ($users_with_billables) {
		foreach($users_with_billables as $user_id => $message){
			$user_info = get_userdata($user_id);
			if($user_info){
				$headers[] = "Content-Type: text/html; charset=UTF-8";
				$headers[] = "From: ".$user_info->user_login." <".$user_info->user_email.">";
				$headers[] = "Cc: ".$user_info->user_login." <".$user_info->user_email.">";
				wp_mail($recipient,'Daily Billable Hours',$message,$headers);
			}
		}
	}
}

function setup_billing_schedules() {
	if(! wp_next_scheduled('billableemail' )) {
		wp_schedule_event('1417680000','hourly','billableemail' );//This timestamp is December 4 2014 at midnight
	}
}
add_action('wp','setup_billing_schedules');

/**
 * is_edit_page
 * function to check if the current page is a post edit page
 *
 * @author Ohad Raz <admin@bainternet.info>
 *
 * @param  string  $new_edit what page to check for accepts new - new post page ,edit - edit post page, null for either
 * @return boolean
 */
function is_edit_page($new_edit = null){
    global $pagenow;
    //make sure we are on the backend
    if (!is_admin()) return false;


    if($new_edit == "edit")
        return in_array( $pagenow, array( 'post.php',  ) );
    elseif($new_edit == "new") //check for new post page
        return in_array( $pagenow, array( 'post-new.php' ) );
    else //check for either new or edit
        return in_array( $pagenow, array( 'post.php', 'post-new.php' ) );
}


function remove_metaboxes_for_restricted_users() {
	global $post_type;
	global $wp_meta_boxes;
	if(get_post_type($_GET['post']) == 'credential') {
		$allowed_users = get_post_meta($_GET['post'],'_credential_allowed_users',true);
		if(!in_array(get_current_user_id(),$allowed_users) && !is_edit_page('new')) {
			remove_meta_box('meta_credential_basic','credential','normal');
		}
	}
}
add_action('do_meta_boxes','remove_metaboxes_for_restricted_users',99999);

function hold_off() {
	$users = get_users();
	$user_ids = array();
	foreach ($users as $user) {
		$user_ids[] = $user->ID;
	}
	$args = array('post_type'=>'credential','posts_per_page'=>-1);
	$credentials = get_posts($args);
	foreach ($credentials as $credential) {
		$allowed_users = get_post_meta($credential->ID,'_credential_allowed_users',true);
			update_post_meta($credential->ID,'_credential_allowed_users',$user_ids);
	}

}
// add_action('init','hold_off');




function get_snippet_ajax() {
	$site_id = $_POST['site_id'];
	$snippet = $_POST['snippet'];
	$site_data = get_post_meta($site_id);
	$snippet_path = 'library/site-cards/snippets/'.$snippet.'.php';
	ob_start();
	include $snippet_path;
	$snippet_contents = ob_get_contents();
	ob_end_clean();
	die($snippet_contents);
}

add_action("wp_ajax_get_snippet","get_snippet_ajax");





/* DON'T DELETE THIS CLOSING TAG */ ?>
