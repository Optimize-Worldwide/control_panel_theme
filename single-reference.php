<?php
/*
 * REFERENCE TEMPLATE
*/

$user_id = get_current_user_id();

$visits = get_post_meta($post->ID,"_visits",true);

$visits[$user_id]++;

$page_visits = $visits[$user_id];//page_visits is the number of times user has visited page

update_post_meta($post->ID,"_visits",$visits);

$recent_references = get_user_meta( $user_id, "_recent_references", true);

if($recent_references) {//if has recent references
	if(!in_array($post->ID,$recent_references)){
		array_unshift($recent_references,$post->ID);
	}
} else {
	$recent_references = array($post->ID);
}

$recent_references = array_slice($recent_references, 0, 10);

update_user_meta($user_id, "_recent_references", $recent_references);
?>

<?php get_header(); ?>
			<div id="content" class="reference">
				<div id="inner-content" class="wrap cf">
						<div id="main" class="m-all t-all d-all cf" role="main">
							<?php if (have_posts()) : while (have_posts()) : the_post();
							$types = wp_get_post_terms($post->ID, 'reference-type');
							$reference_type = $types[0]->slug; ?>
							<article id="post-<?php the_ID(); ?>" <?php post_class(array('cf', $reference_type)); ?> role="article">
								<header class="article-header">
									<h1 class="single-title reference-title"><?php the_title(); ?></h1>
									<a class="edit-link" href="<?php echo get_edit_post_link( ); ?>">e</a>
								</header>
								<section class="entry-content cf">
									<?php
										the_content();

									if ($reference_type == "theme"):
										$theme_url = get_post_meta($post->ID,'_reference_theme_url',true);
										$theme_zip = get_post_meta($post->ID,'_reference_theme_zip',true);
										$theme_sites = get_post_meta($post->ID,'_reference_theme_sites',true);
										if(get_the_post_thumbnail()):
											$screenshot = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );?>
											<img src="<?php echo $screenshot; ?>" alt="">
										<?php endif;?>
										<span class="theme-url"><a href="<?php echo $theme_url; ?>">Theme Page</a></span><br>
										<span class="download"><a href="<?php echo $theme_zip; ?>"></a></span><br />
										<?php if ($theme_sites[0]): ?>
											<h2>Sites Using Theme</h2>
											<?php foreach ($theme_sites as $theme_site): ?>
												<a href="<?php echo get_the_permalink($theme_site); ?>"><?php echo get_the_title($theme_site); ?></a><br />
											<?php endforeach;
										endif;

									elseif ($reference_type == "user-guide"):
										$site = get_post_meta($post->ID, '_reference_user_guide_site',true);
										include 'library/references/wordpress-user-guide.php';

									elseif ($reference_type == "slideshow"):?>
										<?php $slide_urls = get_post_meta($post->ID,'_reference_slideshow_slide_urls',true); ?>
										<style>#slides {display:none;}</style>
										<script src="<?php echo get_template_directory_uri(); ?>/library/js/jquery.slides.min.js"></script>
										<script>
										jQuery(function(){
												jQuery("#slides").slidesjs({
														width: 940,
														height: 528,
														// navigation: {
														// 	effect: "fade"
														// },
														// effect: {
														// 	fade: {
														// 		speed: 800
														// 	}
														// }
												});
										});
										</script>
										<div id="slides">
											<?php foreach ($slide_urls as $slide_url): ?>
												<img src="<?php echo $slide_url; ?>" alt="">
											<?php endforeach; ?>
										</div>
										<button id="fullscreen">Fullscreen</button>

									<?php elseif ($reference_type == "snippet"):
											$snippets = get_post_meta($post->ID,'_reference_snippet_snippets',true);
											foreach ($snippets as $snippet):?>
												<h2><?php echo $snippet['title']; ?></h2>
												<pre><code><?php echo htmlentities($snippet['code']); ?></code></pre>
											<?php endforeach; ?>

									<?php elseif ($reference_type == "link"):
											$links = get_post_meta($post->ID,'_reference_link_links',true);
											foreach ($links as $link):?>
												<h2><?php echo $link['title']; ?></h2>
												<a href="<?php echo $link['url']; ?>"><?php echo $link['url']; ?></a>
											<?php endforeach ?>

									<?php endif; ?>
								</section>
								<footer class="article-footer"></footer>
								<?php comments_template(); ?>
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
											<p><?php _e( 'This is the error message in the single-reference.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>
							<?php endif; ?>
						</div>
						<?php //get_sidebar(); ?>
				</div>
			</div>
<?php get_footer(); ?>
