<?php
$args = array(
	'post_type' => 'client',
	'orderby' => 'name',
	'posts_per_page' => -1,
	'nopaging' => true,
	'order' => 'ASC'
);
$client_query = new WP_Query( $args );

get_header(); ?>
<div id="content">
	<div id="inner-content" class="wrap cf">
			<div id="main" class="cf" role="main">
			<h1 class="archive-title sticky card m-all t-all d-all">
				<input type="text" class="filter" placeholder="<?php post_type_archive_title(); ?>" >
			</h1>
			<ul class="filter-list m-all t-all d-all">
				<?php if (current_user_can('edit_posts')):?>
				<article class="m-all t-1of2 d-1of4 card cf">
					<a class="add-post" href="<?php echo get_admin_url(); ?>post-new.php?post_type=client"><h2>Add New Client</h2></a>
				</article>
				<?php endif; ?>
				<?php if ($client_query->have_posts()) : while ($client_query->have_posts()) : $client_query->the_post();
					$address_street  = get_post_meta($post->ID,'_client_address_street',true);
					$address_city    = get_post_meta($post->ID,'_client_address_city',true);
					$address_state   = get_post_meta($post->ID,'_client_address_state',true);
					$address_zip     = get_post_meta($post->ID,'_client_address_zip',true);
					$email_addresses = get_post_meta($post->ID,'_client_email_addresses',true);
					$phone_numbers   = get_post_meta($post->ID,'_client_phone_numbers',true);
					$websites        = get_posts(array('post_type' => 'site','meta_key'=> '_site_client','meta_value' => $post->ID));
					$people          = get_post_meta($post->ID,'_client_people',true);

					$key = "AIzaSyBUcxuL76OX4x4uCqaDPGrbEfVPaeYtrds";
					$address_full = $address_street.",".$address_city.",".$address_state;
					$address_full = str_replace(" ", "+", $address_full);
					$address_full = str_replace("#", "", $address_full);?>

					<article id="post-<?php the_ID(); ?>" <?php post_class( 'm-all t-1of2 d-1of4 card cf' ); ?> role="article">
						<header class="article-header">
							<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><h2><?php the_title(); ?></h2></a>

						</header>
						<section class="entry-content cf">

							<?php if($websites):?>
								<span class="websites"><?php $i =0;
								foreach ($websites as $website): $i++;?>
									<a href="<?php echo get_the_permalink($website->ID); ?>"><?php echo get_the_title($website->ID); ?></a>
									<?php if ($i != count($websites)) { echo "&amp;";}
								endforeach; ?>
								</span>
							<?php else: ?>
								<span class="websites">
									<a class="add-post" href="<?php echo get_admin_url(); ?>post-new.php?post_type=site">Add Website</a><!-- TODO: make this create a new site with parent current site -->
								</span>
							<?php endif; ?>

							<?php if($address_state == "AL" and !isset($address_city)): ?>
							<span class="address"><?php echo $address_street; ?><br><?php echo $address_city . " " . $address_state . " " . $address_zip; ?></span><br>
							<?php endif; ?>

							<?php foreach ($email_addresses as $email_address): ?>
								<section class="email">
									<span class="address"><a href="mailto:<?php echo $email_address['address']; ?>"><?php echo $email_address['address']; ?></a></span>
								</section>
							<?php endforeach;


							if($phone_numbers):
								foreach ($phone_numbers as $phone_number): ?>
									<section class="phone">
										<span class="number"><a href="tel:<?php echo tel_format($phone_number['number']); ?>"><?php echo $phone_number['number']; ?></a></span>
									</section>
								<?php
								endforeach;
							endif;

							if($people): ?>
								<h3>Associated People</h3>
								<?php foreach($people as $person): ?>
									<h4 class="section-head"><?php echo $person['name']; ?></h4>
									<?php if(isset($person['notes'])): ?>
										<p class="notes"><?php echo $person['notes']; ?></p>
									<?php endif; ?>
									<?php if(isset($person['phone_number'])): ?>
										<span class="phone"><a href="tel:<?php tel_format($person['phone_number']); ?>"><?php echo $person['phone_number']; ?></a></span><br />
									<?php endif; ?>
									<?php if(isset($person['email_address'])): ?>
										<span class="email"><a href="mailto:<?php echo $person['email_address']; ?>"><?php echo $person['email_address']; ?></a></span><br />
									<?php endif; ?>
								<?php endforeach; ?>
							<?php endif; ?>

						</section>
						<?php if (current_user_can('edit_posts')): ?>
						<a href="<?php echo get_edit_post_link(); ?>" class="edit-link">e</a>
						<?php endif; ?>
					</article>
					<?php endwhile; ?>
				<?php endif; ?>

				</ul>


			</div>
	</div>
</div>

<?php get_footer(); ?>
