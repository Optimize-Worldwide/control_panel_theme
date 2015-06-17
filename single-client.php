<?php
/*
 * CLIENT TEMPLATE
*/

$user_id = get_current_user_id();

$visits = get_post_meta($post->ID,"_visits",true);

if(isset($visits[$user_id])){
	$visits[$user_id]++;
} else {
	$visits[$user_id] = 1;
}

$page_visits = $visits[$user_id];//page_visits is the number of times user has visited page

update_post_meta($post->ID,"_visits",$visits);

$recent_clients = get_user_meta( $user_id, "_recent_clients", true);

if($recent_clients) {//if has recent clients
	if(!in_array($post->ID,$recent_clients)){
		array_unshift($recent_clients,$post->ID);
	}
} else {
	$recent_clients = array($post->ID);
}

$recent_clients = array_slice($recent_clients, 0, 10);

update_user_meta($user_id, "_recent_clients", $recent_clients);

/* Loads the meta fields into usable variables */
$referral_source = get_post_meta($post->ID,'_client_referral_source',true);
$address_street  = get_post_meta($post->ID,'_client_address_street',true);
$address_city    = get_post_meta($post->ID,'_client_address_city',true);
$address_state   = get_post_meta($post->ID,'_client_address_state',true);
$address_zip     = get_post_meta($post->ID,'_client_address_zip',true);
$email_addresses = get_post_meta($post->ID,'_client_email_addresses',true);
$phone_numbers   = get_post_meta($post->ID,'_client_phone_numbers',true);
$people          = get_post_meta($post->ID,'_client_people',true);
$websites        = get_posts(array('post_type'  => 'site','meta_key'   => '_site_client','meta_value' => $post->ID));

$address_full = $address_street.",".$address_city.",".$address_state;
$address_full = str_replace(" ", "+", $address_full);
$address_full = str_replace("#", "", $address_full);?>

<style scoped>
#content:before {
	background-image: url(http://maps.googleapis.com/maps/api/staticmap?center=<?php echo $address_full; ?>&zoom=13&size=1920x1080&maptype=terrain&scale=2&style=feature:all|element:labels|visibility:off);
}
</style>
<style> .filter-list {background: transparent !important;}</style>
<?php get_header(); ?>
			<div id="content" class="client">
				<div id="inner-content" class="wrap cf">
						<div id="main" class="cf" role="main">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<article <?php post_class('m-all t-all d-all cf'); ?> role="article">
								<header class="article-header m-all t-all d-all cf card sticky">
									<h1 class="single-title client-title"><?php the_title(); ?></h1>
									<a href="<?php echo get_edit_post_link( ); ?>" class="edit-link">e</a>

									<a href="<?php echo get_bloginfo('url') ?>/clients" class="parent-category">Back to Clients</a>

									<section class="meta-sidebar m-none t-1of3 d-1of5">
										<!-- CLIENT INFORMATION -->
										<section id="client_info" class="card">
											<?php if($websites): ?>
												<h2>Associated Site<?php if(count($websites) >1){echo "s";}?></h2>
												<?php foreach($websites as $website): ?>
													<a href="<?php echo get_the_permalink($website->ID); ?>"><?php echo get_the_title($website->ID); ?></a> <small>(<a href="<?php echo get_post_meta($website->ID, "_site_url", true); ?>"></a></small>)<br />
												<?php endforeach; ?>
											<?php else: ?>
												<a class="add-post" href="<?php echo get_admin_url(); ?>post-new.php?post_type=site">Add Website</a><!-- TODO: make this create a new site with parent current site -->
											<?php endif; ?>
										</section>

										<div class="comment-sidebar card">
											<?php comments_template(); ?>
										</div>

									</section>
								</header>


								<section class="entry-content m-all t-2of3 d-4of5 cf">
									<ul class="filter-list m-all t-all d-all">

										<section id="description" class="card m-all t-1of2 d-1of3 cf">
											<?php if($referral_source): ?>
											<span class="referral-source">Referral Source:</span><br>
											<p class="notes"><?php echo $referral_source; ?></p>
											<?php endif; ?>
											<h2>Notes</h2>
											<?php the_content(); ?>
										</section>

										<?php if($address_street): ?>
											<section id="address" class="card m-all t-1of2 d-1of3 cf">
												<h2>Physical Address</h2>
												<section class="physical-address" style="background-image:url(http://maps.googleapis.com/maps/api/staticmap?center=<?php echo $address_full; ?>&zoom=13&size=1000x1000&maptype=roadmap&markers=color:0x01acf0%7C<?php echo $address_full; ?>)">
													<span class="location"><a href="https://maps.google.com?q=<?php echo $address_full; ?>" target="_blank"><?php echo $address_street."<br />".$address_city." ".$address_state." ".$address_zip; ?></a></span><br>
												</section>
											</section>
										<?php endif; ?>

										<?php if($phone_numbers or $email_addresses): ?>
											<section id="contact" class="card m-all t-1of2 d-1of3 cf">
												<h2>Contact Information</h2>
												<?php if($phone_numbers): ?>
													<div id="phone-numbers">
														<h3 class="section-head">Phone Number<?php if(count($phone_numbers) > 1) {echo "s";} ?></h3>
													<?php foreach ($phone_numbers as $phone) { ?>
														<section class="phone">
															<span class="number"><a href="tel:<?php echo tel_format($phone['number']); ?>"><?php echo $phone['number']; ?></a></span>
															<?php if (isset($phone['notes'])): ?>
																<p class="notes"><?php echo $phone['notes']; ?></p>
															<?php endif; ?>
														</section>
													<?php } ?>
													</div>
												<?php endif; ?>

												<?php if($email_addresses): ?>
													<div id="email-addresses">
														<h3 class="section-head">Email Address<?php if(count($email_addresses) > 1) {echo "es";} ?></h3>
													<?php foreach ($email_addresses as $email) { ?>
														<section class="email">
															<span class="address"><a href="mailto:<?php echo $email['address']; ?>"><?php echo $email['address']; ?></a></span>
															<?php if (isset($email['notes'])): ?>
															<p class="notes"><?php echo $email['notes']; ?></p>
															<?php endif; ?>
														</section>
													<?php } ?>
													</div>
												<?php endif; ?>
											</section>
										<?php endif; ?>

										<?php if($people): ?>
											<section id="people" class="card m-all t-1of2 d-1of3 cf">
												<h3>Associated People</h3>
													<?php foreach($people as $person): ?>
														<h4 class="section-head"><?php echo $person['name']; ?></h4>
														<?php if(isset($person['phone_number'])): ?>
															<span class="phone"><a href="tel:<?php echo tel_format($person['phone_number']); ?>"><?php echo $person['phone_number']; ?></a></span><br />
														<?php endif; ?>
														<?php if(isset($person['email_address'])): ?>
															<span class="email"><a href="mailto:<?php echo $person['email_address']; ?>"><?php echo $person['email_address']; ?></a></span><br />
														<?php endif; ?>
														<?php if(isset($person['notes'])): ?>
															<p class="notes"><?php echo $person['notes']; ?></p>
														<?php endif; ?>
													<?php endforeach; ?>
											</section>
										<?php endif; ?>

										<section id="client_info" class="card m-all t-none d-none">
											<?php if($websites): ?>
												<h2>Associated Site<?php if(count($websites) >1){echo "s";}?></h2>
												<?php foreach($websites as $website): ?>
													<a href="<?php echo get_the_permalink($website->ID); ?>"><?php echo get_the_title($website->ID); ?></a> <small>(<a href="<?php echo get_post_meta($website->ID, "_site_url", true); ?>">Visit</a></small>)<br />
												<?php endforeach; ?>
											<?php else: ?>
												<a class="add-post" href="<?php echo get_admin_url(); ?>post-new.php?post_type=site">Add Website</a><!-- TODO: make this create a new site with parent current site -->
											<?php endif; ?>
										</section>

										<div class="comment-sidebar card m-all t-none d-none">
											<?php comments_template(); ?>
										</div>
									</ul>

								</section>
								<footer class="article-footer"></footer>
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
											<p><?php _e( 'This is the error message in the single-client.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>
							<?php endif; ?>
						</div>
				</div>
			</div>
<?php get_footer(); ?>
