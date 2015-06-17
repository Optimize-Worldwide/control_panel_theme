<?php
/*
 Template Name: Home Page
*/

$user_id = get_current_user_id();

$recent_sites = get_user_meta( $user_id, "_recent_sites", true);
$recent_clients = get_user_meta( $user_id, "_recent_clients", true);
$recent_credentials = get_user_meta( $user_id, "_recent_credentials", true);
$recent_references = get_user_meta( $user_id, "_recent_references", true);
?>

<?php get_header(); ?>
			<div id="content">
				<div id="inner-content" class="wrap cf">
						<div id="main" class="m-all t-all d-all cf" role="main">
						<h1>Control Panel</h1>

						<article class="m-1of1 t-1of2 d-1of4 card">
							<h1><a href="<?php echo get_bloginfo('url'); ?>/sites/">Sites</a></h1>
								<?php if($recent_sites):?>
								<h2>Recently Visited</h2>
								<ol class="recent">
									<?php foreach ($recent_sites as $recent_site):if($recent_site !== "0"):?>
										<li><a href="<?php echo get_the_permalink($recent_site); ?>"><?php echo get_the_title($recent_site); ?></a></li>
									<?php endif;endforeach;
									endif; ?>
							</ol>
						</article>
						<article class="m-1of1 t-1of2 d-1of4 card">
							<h1><a href="<?php echo get_bloginfo('url'); ?>/clients/">Clients</a></h1>
								<?php if($recent_clients):?>
								<h2>Recently Visited</h2>
								<ol class="recent">
									<?php foreach ($recent_clients as $recent_client):if($recent_client !== "0"):?>
										<li><a href="<?php echo get_the_permalink($recent_client); ?>"><?php echo get_the_title($recent_client); ?></a></li>
									<?php endif;endforeach;
									endif; ?>
							</ol>
						</article>
						<article class="m-1of1 t-1of2 d-1of4 card">
							<h1><a href="<?php echo get_bloginfo('url'); ?>/credentials/">Credentials</a></h1>
								<?php if($recent_credentials):?>
								<h2>Recently Visited</h2>
								<ol class="recent">
									<?php foreach ($recent_credentials as $recent_credential):if($recent_credential !== "0"):?>
										<li><a href="<?php echo get_the_permalink($recent_credential); ?>"><?php echo get_the_title($recent_credential); ?></a></li>
									<?php endif;endforeach;
									endif; ?>
							</ol>
						</article>
						<article class="m-1of1 t-1of2 d-1of4 card">
							<h1><a href="<?php echo get_bloginfo('url'); ?>/reference-documents/">References</a></h1>
								<?php if($recent_references):?>
								<h2>Recently Visited</h2>
								<ol class="recent">
									<?php foreach ($recent_references as $recent_reference):if($recent_reference !== "0"):?>
										<li><a href="<?php echo get_the_permalink($recent_reference); ?>"><?php echo get_the_title($recent_reference); ?></a></li>
									<?php endif;endforeach;
									endif; ?>
							</ol>
						</article>

						<!-- <div class="card m-1of1 t-1of2 d-1of4">
							<i class="icon-user">	</i>
							<section>
								<p>View all clients, their contact info, and information about people in their organizations</p>
							</section>
							<a href="<?php echo get_bloginfo('url'); ?>/clients/"><h2><span>All</span>Clients</h2></a>
						</div>

						<div class="card m-1of1 t-1of2 d-1of4">
							<i class="icon-site">	</i>
							<section>
								<a href="http://cp.optimizehere.co/service/advertising/">Advertising</a>
								<a href="http://cp.optimizehere.co/service/development-sites/">Development</a>
								<a href="http://cp.optimizehere.co/service/security-backup/">Security &amp; Backup</a>
								<a href="http://cp.optimizehere.co/service/seo/">SEO</a>
								<a href="http://cp.optimizehere.co/service/social-media/">Social Media</a>
							</section>
							<a href="<?php echo get_bloginfo('url'); ?>/sites/"><h2><span>All</span>Sites</h2></a>
						</div>
						<div class="card m-1of1 t-1of2 d-1of4">
							<i class="icon-credential">	</i>
							<section>
								<p>See credentials for websites used by the company, not by clients</p>
							</section>
							<a href="<?php echo get_bloginfo('url'); ?>/credentials/"><h2><span>All</span>Credentials</h2></a>
						</div>
						<div class="card m-1of1 t-1of2 d-1of4">
							<i class="icon-reference">	</i>
							<section>
								<a href="http://cp.optimizehere.co/reference-type/link/">Links</a>
								<a href="http://cp.optimizehere.co/reference-type/theme/">Themes</a>
								<a href="http://cp.optimizehere.co/reference-type/slideshow/">Slideshows</a>
								<a href="http://cp.optimizehere.co/reference-type/snippet/">Snippets</a>
								<a href="http://cp.optimizehere.co/reference-type/howto/">How-Tos</a>
							</section>
							<a href="<?php echo get_bloginfo('url'); ?>/reference-documents/"><h2><span>All</span>References</h2></a>
						</div> -->


						</div>


				</div>

			</div>


<?php get_footer(); ?>
