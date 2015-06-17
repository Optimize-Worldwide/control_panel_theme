<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/library/css/site.css">
<?php

$user_id = get_current_user_id();
$recent_sites = get_user_meta( $user_id, "_recent_sites", true);


$args = array(
	'post_type' => 'site',
	'orderby' => 'name',
	'posts_per_page' => -1,
	'nopaging' => true,
	'order' => 'ASC',
	'post__not_in' => $recent_sites
);
$site_query = new WP_Query( $args );

$recent_args = array(
	'post_type' => 'site',
	'post__in'=>$recent_sites,
	'orderby' => 'name',
	'posts_per_page' => -1,
	'order' => 'ASC',
);
$recent_query = new WP_Query($recent_args);

get_header(); ?>
<div id="content">
	<div id="inner-content" class="wrap cf">
			<div id="main" class="cf" role="main">
				<h1 class="archive-title sticky card m-all t-all d-all">
					<input type="text" class="filter" placeholder="<?php post_type_archive_title(); ?>" autofocus="autofocus">
				</h1>
				<ul class="filter-list m-all t-all d-all">

				<?php
					if ($recent_query->have_posts()):
						while ($recent_query->have_posts()):
							$recent_query->the_post();

							$site_colors      = get_post_meta($post->ID,'_site_colors',true);
							$primary_color    = array_values($site_colors)[0]['color'];
							if($primary_color){
								$background_color = new Color($primary_color);
							} else {
								$background_color = new Color("#ffffff");
							}
							if ($background_color->isDark()) {
								$colorBrightness = "dark";
							} else {
								$colorBrightness = "light";
							}



							$services = wp_get_post_terms($post->ID,'service'); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'm-all t-1of3 d-1of4 card cf '.$colorBrightness ); ?> role="article">
								<?php foreach($site_colors as $color): ?>
									<div class="color-bubble" style="background-color:<?php echo $color['color']; ?>"></div>
								<?php endforeach; ?>
								<header class="article-header">
									<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><h2><?php the_title(); ?></h2></a>
								</header>
								<section class="entry-content account cf">
								</section>
								<?php if (current_user_can('edit_posts')): ?>
									<a href="<?php echo get_edit_post_link(); ?>" class="edit-link">e</a>
								<?php endif; ?>
								<div class="hidden"><?php foreach ($services as $service) echo $service->name." ";?></div>
							</article>
						<?php endwhile;?>
				<?php endif; ?>
				<div class="m-all t-all d-all card divider">
					<?php if (current_user_can('edit_posts')):?>
							<a class="add-post" href="<?php echo get_admin_url(); ?>post-new.php?post_type=site"><h2>Add New Site</h2></a>
					<?php endif; ?>
				</div>
				<?php
					if ($site_query->have_posts()):
						while ($site_query->have_posts()):
							$site_query->the_post();

							$site_colors      = get_post_meta($post->ID,'_site_colors',true);
							$primary_color    = array_values($site_colors)[0]['color'];
							if($primary_color){
								$background_color = new Color($primary_color);
							} else {
								$background_color = new Color("#ffffff");
							}
							if ($background_color->isDark()) {
								$colorBrightness = "dark";
							} else {
								$colorBrightness = "light";
							}


							$services = wp_get_post_terms($post->ID,'service');
							 ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'm-all t-1of3 d-1of4 card cf '.$colorBrightness ); ?> role="article">
								<?php foreach($site_colors as $color): ?>
									<div class="color-bubble" style="background-color:<?php echo $color['color']; ?>"></div>
								<?php endforeach; ?>
								<header class="article-header">
									<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><h2><?php the_title(); ?></h2></a>
								</header>
								<section class="entry-content account cf">
								</section>
								<?php if (current_user_can('edit_posts')): ?>
									<a href="<?php echo get_edit_post_link(); ?>" class="edit-link">e</a>
								<?php endif; ?>
								<div class="hidden"><?php foreach ($services as $service) echo $service->name." ";?></div>
							</article>
						<?php endwhile;?>
				<?php endif; ?>

				</ul>
			</div>

	</div>

</div>


<?php get_footer(); ?>
