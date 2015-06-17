<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/css/site.css">
<?php
/*

*/
$args = array(
	'post_type' => 'site',
	'orderby' => 'name',
	'posts_per_page' => -1,
	'nopaging' => true,
	'order' => 'ASC',
	'service' => $wp_query->query_vars['service']
);
$site_query = new WP_Query( $args );

$terms = get_the_terms($post->ID,'service');
foreach ($terms as $term) $terms = $term->name;
?>
<?php get_header(); ?>
			<div id="content">
				<div id="inner-content" class="wrap cf">
						<div id="main" class="cf" role="main">
						<h1 class="archive-title sticky card m-all t-all d-all">
							<input type="text" class="filter" placeholder="<?php echo $terms; ?> Sites" >
						</h1>
						<ul class="filter-list m-all t-all d-all"><?php
										if ($site_query->have_posts()):
											while ($site_query->have_posts()):
												$site_query->the_post();

												$site_url         = get_post_meta($post->ID,'_site_url',true);
												$client           = get_post_meta($post->ID,'_site_client',true);
												$client_emails    = get_post_meta($client,'_client_email_addresses',true);
												$client_phones    = get_post_meta($client,'_client_phone_numbers',  true);
												$site_colors      = get_post_meta($post->ID,'_site_colors',true);
												$primary_color    = array_values($site_colors)[0]['color'];
												$site_logo        = wp_get_attachment_url(get_post_thumbnail_id( $post->ID ));
												if($primary_color){
													$background_color = new Color($primary_color);
												} else {
													$background_color = new Color("#ffffff");
												}
												if ($background_color->isDark()) {
													$colorBrightness = "dark";
												} else {
													$colorBrightness = "light";
												} ?>

												<article style="background-color: <?php //echo $primary_color; ?>" id="post-<?php the_ID(); ?>" <?php post_class( 'm-all t-1of3 d-1of4 card cf '.$colorBrightness ); ?> role="article">
													<?php foreach($site_colors as $color): ?>
														<div class="color-bubble" style="background-color:<?php echo $color['color']; ?>"></div>
													<?php endforeach; ?>
													<header class="article-header">
														<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><h2><?php the_title(); ?></h2></a>
													</header>
													<section class="entry-content account cf">
														<span class="username"><a href="<?php echo get_the_permalink($client); ?>"><?php echo get_the_title($client); ?></a></span><br>
													</section>
													<?php if (current_user_can('edit_posts')): ?>
													<a href="<?php echo get_edit_post_link(); ?>" class="edit-link">e</a>
													<?php endif; ?>
												</article>
											<?php endwhile;?>

										</ul>

									<?php bones_page_navi(); ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the custom posty type archive template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div>


				</div>

			</div>

<?php get_footer(); ?>
