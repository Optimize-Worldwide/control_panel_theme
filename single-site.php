<?php
/*
 * SITE TEMPLATE
*/


// $site_meta = get_post_meta($post->ID);


// foreach ($site_meta as $meta_key => $meta_value) {
// 	$serialized_meta = get_post_meta($post->ID,$meta_key,true);
// 	if(is_array($serialized_meta)) {
// 		foreach ($serialized_meta as $serialized_key => $serialized_value) {
// 			$new_serialized_value = $serialized_value;
// 			foreach ($serialized_value as $arrayed_key => $arrayed_value) {
// 				$was_array = false;
// 				if($arrayed_value == 'Array' || $arrayed_value == 'http://Array') {
// 					$was_array = true;
// 					$new_serialized_value[$arrayed_key] = '';
// 				}
// 			}
// 			$delete_it = true;
// 			foreach ($new_serialized_value as $new_arrayed_key => $new_arrayed_value) {
// 				if(strlen($new_arrayed_value) > 0) {
// 					$delete_it = false;
// 				}
// 			}
// 			if($was_array) {
// 				if($delete_it) {
// 					update_post_meta($post->ID,$meta_key,array());
// 				} else {
// 					update_post_meta($post->ID,$meta_key,array($new_serialized_value));
// 				}
// 			}
// 		}
// 	}
// }





global $lightness;
global $site_data;
$site_data = get_post_meta($post->ID);

$user_id = get_current_user_id();
$visits = unserialize($site_data['_visits'][0]);
$visits[$user_id]++;
$page_visits = $visits[$user_id];//page_visits is the number of times user has visited page
update_post_meta($post->ID,"_visits",$visits);

$recent_sites = get_user_meta( $user_id, "_recent_sites", true);

if($recent_sites) {
	if(!in_array($post->ID,$recent_sites)) array_unshift($recent_sites,$post->ID);
} else {
	$recent_sites = array($post->ID);
}
$recent_sites = array_slice($recent_sites, 0, 10);
update_user_meta($user_id, "_recent_sites", $recent_sites);


$create_snippet['filezilla'] = false;
$create_snippet['gplus'] = false;
$create_snippet['hcard'] = false;
$create_snippet['sftp-config'] = false;
$organization_name              = get_editable_post_meta($post->ID,'_site_organization_name','input',true);
$url                            = get_editable_post_meta($post->ID,'_site_url','input',true);


$client                         = $site_data['_site_client'][0];
$naics                          = $site_data['_site_naics'][0];
$business_addresses             = unserialize($site_data['_site_addresses'][0]);
$phone_numbers                  = unserialize($site_data['_site_phone_numbers'][0]);
$email_addresses                = unserialize($site_data['_site_email_addresses'][0]);
$colors                         = unserialize($site_data['_site_colors'][0]);
$fonts                          = unserialize($site_data['_site_fonts'][0]);
$services = wp_get_post_terms($post->ID,'service');

// $client                         = get_post_meta($post->ID,'_site_client',true);
// $naics                          = get_post_meta($post->ID,'_site_naics',true);
// $business_addresses             = get_post_meta($post->ID,'_site_addresses',true);
// $phone_numbers                  = get_post_meta($post->ID,'_site_phone_numbers',true);
// $email_addresses                = get_post_meta($post->ID,'_site_email_addresses',true);
// $colors                         = get_post_meta($post->ID,'_site_colors',true);
// $fonts                          = get_post_meta($post->ID,'_site_fonts',true);

// $citations                      = get_post_meta($post->ID,'_site_citations',true);

global $site_logo;
$site_logo = wp_get_attachment_url(get_post_thumbnail_id( $post->ID ));


$primary_color = array_values($colors)[0]['color'];

$color = array();
foreach($colors as $site_color) if($site_color['label']) $color[$site_color['label']] = $site_color['color'];?>

<?php get_header();?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/css/site.css">
<?php if(isset($color['primary'])): ?>
<style scoped>

	header.article-header {
		background: <?php echo $color['primary']; ?> !important;
	}
	header.article-header h1,
	header.article-header h1 a {
		<?php if(is_color_bright(str_replace('#','',$color['primary']))): $body_brightness = "bright";?>
			color: #323944;
		<?php else: $body_brightness = "dark";?>
			color: white;
		<?php endif; ?>
	}
	.is-sticky header.article-header {
		<?php $rgb = hex2rgb($color['primary']); ?>
		background: rgba(<?php echo $rgb[0].','.$rgb[1].','.$rgb[2] ?>,1) !important;
	}
</style>
<?php endif;

if(isset($color['secondary'])): ?>
<style scoped>
	h2,
	h2 a {
		color: <?php echo $color['secondary']; ?> !important;
	}
</style>
<?php endif;

if(isset($color['tertiary'])): ?>
<style scoped>
	h3,
	h3 a {
		color: <?php echo $color['tertiary']; ?> !important;
	}
</style>
<?php endif; ?>
<style scoped>
	#content {
		<?php $primary_color_split = hex2rgb($color['primary']); ?>
		background: <?php echo $color['primary']; ?>;
		background: rgba(<?php echo $primary_color_split[0]; ?>,<?php echo $primary_color_split[1]; ?>,<?php echo $primary_color_split[2]; ?>,<?php echo $lightness / 100; ?>);
	}
</style>
<?php if($body_brightness == "dark"): ?>
	<style>
	.menu-btn span {
		background-color: white;
	}
	#header-search .screen-reader-text,
	.hentry header.article-header .edit-link,
	a.parent-category,
	a.parent-category:visited {
		color: white;
	}
	</style>
<?php endif; ?>
			<div id="content" class="site <?php echo $body_brightness; ?>">
				<div id="inner-content" class="wrap cf">
						<div id="main" class="cf" role="main">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<article id="post-<?php the_ID(); ?>" <?php post_class('m-all t-all d-all cf'); ?> role="article">

								<header class="article-header card sticky m-all t-all d-all cf">
									<!-- <input type="text" class="filter" placeholder="search this site" autofocus> -->
									<!-- <?php echo print_r($services,true); ?> -->


									<a href="<?php echo get_bloginfo('url') ?>/sites" class="parent-category">Back to Sites</a>

									<h1 class="single-title site-title"><a href="<?php echo $url; ?>" target="_blank"><?php the_title(); ?></a></h1>
									<a href="<?php echo get_edit_post_link( ); ?>" class="edit-link">e</a>

									<section class="meta-sidebar m-none t-1of3 d-1of4">
										<!-- CLIENT INFORMATION -->
										<?php if($client): ?>
										<section id="client_info" class="card">
											<?php include 'library/site-cards/client.php'; ?>
										</section>
										<?php else: ?>
											<section id="client_info" class="card">
												<h2 class="add-info"><a href="<?php echo get_edit_post_link(); ?>#meta_site_basic">Associate Client</a></h2>
											</section>
										<?php endif; ?>

										<!-- COMMENTS -->
										<div class="comment-sidebar card">
											<?php comments_template(); ?>
										</div>

									</section>
								</header>


								<section class="entry-content m-all t-2of3 d-3of4 cf">
									<ul class="filter-list">
										<?php if ($site_logo != ''): ?>
											<li>
												<section id="site_logo" class="card m-all t-1of2 d-1of3">
													<img src="<?php echo $site_logo; ?>" class="logo" />
												</section>
											</li>
										<?php endif; ?>

										<?php if(count($services) > 0): ?>
										<li>
											<section id="services_provided" class="card m-all t-1of2 d-1of3"><h3>
												<?php foreach($services as $i => $service): ?>
													<?php echo $service->name; if(count($services) - 1 !== $i) echo ' | '; ?>
												<?php endforeach; ?>
											</h3></section>
										</li>
										<?php endif; ?>

										<li><?php include 'library/site-cards/basic.php'; ?></li>

										<li>
											<section id="description" class="card m-all t-1of2 d-1of3">
													<h2>Notes</h2>
												<?php the_content(); ?>
											</section>
										</li>

										<li><?php include 'library/site-cards/social.php'; ?></li>
										<li><?php include 'library/site-cards/services.php'; ?></li>
										<li><?php include 'library/site-cards/hosting.php'; ?></li>
										<li><?php include 'library/site-cards/domain.php'; ?></li>
										<li><?php include 'library/site-cards/ftp.php'; ?></li>
										<li><?php include 'library/site-cards/snippets.php'; ?></li>
										<li><?php include 'library/site-cards/tasks.php'; ?></li>
										<li><?php include 'library/site-cards/cms.php'; ?></li>
										<li><?php include 'library/site-cards/styles.php'; ?></li>
										<li><?php include 'library/site-cards/checklists.php'; ?></li>
										<li><?php include 'library/site-cards/documents.php'; ?></li>
									</ul>


									<!-- MOBILE CLIENT INFO -->
									<?php if($client): ?>
									<section id="client_info" class="card m-all t-none d-none">
										<?php include 'library/site-cards/client.php'; ?>
									</section>
									<?php endif; ?>

									<!-- MOBILE COMMENTS -->
									<div class="comment-sidebar card m-all t-none d-none">
										<?php comments_template(); ?>
									</div>
									<!-- CITATIONS -->
									<!-- <section id="citations" class="card m-all t-1of2 d-1of3">
										<?php //include 'library/site-cards/citations.php'; ?>
									</section> -->
								</section>

							</article>
							<?php endwhile; ?>
							<?php else : ?>
									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
											<p><?php _e( 'This is the error message in the single-site.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>
							<?php endif; ?>
						</div>
				</div>
			</div>
			<script type="text/javascript">
			jQuery.ajax({
				url: ajaxurl,
				type: 'POST',
				data: 'action=get_snippet&site_id='+<?php echo $post->ID; ?>+'&snippet=email',
			})
			.done(function(msg) {
				console.log(msg);
			})
			.fail(function() {
				console.log("error");
			})
			.always(function() {
				// console.log("complete");
			});

			</script>
<?php get_footer(); ?>
