<?php
$user_guide_args = array('post_type' => 'reference','meta_key' => '_reference_site','meta_value' => $post->ID);
$has_user_guides = get_posts($user_guide_args);
$has_themes = array();
$theme_args = array('post_type' => 'reference','reference-type'=>'theme','posts_per_page'=>-1);
$themes = get_posts($theme_args); //Gets all themes
// TODO: Reverse how themes are set up so that a site contains the ID of the theme it uses, and the theme page queries all sites by meta key
foreach ($themes as $theme)://This loop iterates through all themes, checks if the site ID matches sites referenced by the theme
	$associated_sites = get_post_meta($theme->ID,'_reference_theme_sites',true);
	foreach ($associated_sites as $site):
		if ($site == $post->ID) $has_themes[] = $theme;
	endforeach;
endforeach;

if ($has_user_guides or $has_themes):?>
	<section id="documents" class="card m-all t-1of2 d-1of3">
		<h2>Associated Documents</h2>

		<?php
		if($has_user_guides){
			foreach ($has_user_guides as $user_guide): ?>
				<h3><a href="<?php echo get_the_permalink($user_guide->ID); ?>"><?php echo get_the_title($user_guide->ID); ?></a></h3>
			<?php
			endforeach;
		} ?>

		<?php
		if($has_themes){
			foreach ($has_themes as $theme):
				$theme_sites = get_post_meta($theme->ID,'_reference_theme_sites',true);
				foreach ($theme_sites as $theme_site):
					if ($theme_site == $post->ID)://If theme site ID matches current page id, output link?>
						<h3><a href="<?php echo get_the_permalink($theme->ID); ?>" target="_blank"><?php echo get_the_title($theme->ID); ?></a></h3>
					<?php endif;
				endforeach;
			endforeach;
		}
		?>
	</section>
<?php endif;?>