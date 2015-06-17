<?php
$args = array(
	'post_type' => 'credential',
	'orderby' => 'name',
	'posts_per_page' => -1,
	'nopaging' => true,
	'order' => 'ASC'
);
$credential_query = new WP_Query( $args );

//Update these strings to bulk match permissions
$old_user = 999;
$new_user = 999;

get_header(); ?>
	<div id="content">
		<div id="inner-content" class="wrap cf">
				<div id="main" class="cf" role="main">
				<h1 class="archive-title sticky card m-all t-all d-all">
					<input type="text" class="filter" placeholder="<?php post_type_archive_title(); ?>" autofocus="autofocus">
				</h1>
				<ul class="filter-list m-all t-all d-all">
					<?php if (current_user_can('edit_posts')):?>
					<article class="m-all t-1of3 d-1of4 card cf">
						<a class="add-post" href="<?php echo get_admin_url(); ?>post-new.php?post_type=credential"><h2>Add New Credential</h2></a>
					</article>
					<?php endif; ?>
					<?php if ($credential_query->have_posts()) : while ($credential_query->have_posts()) : $credential_query->the_post();
						$url      = get_post_meta($post->ID,'_credential_site',true);
						$accounts = get_post_meta($post->ID,'_credential_accounts',true);
						$notes    = get_post_meta($post->ID,'_credential_notes',true);
						$allowed_users = get_post_meta($post->ID,'_credential_allowed_users',true);
						if(in_array(get_current_user_id(),$allowed_users)):
						 ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class( 'm-all t-1of3 d-1of4 card cf' ); ?> role="article">
							<header class="article-header">
								<a href="<?php echo get_the_permalink(); ?>"><h2><?php echo get_the_title(); ?></h2></a>
							</header>
							<section class="entry-content cf">
								<?php if($notes): ?>
									<p class="notes"><?php echo nl2br($notes); ?></p>
								<?php endif; ?>
								<a href="<?php echo $url; ?>"><?php echo $url; ?></a><br />
								<?php foreach ($accounts as $account): ?>
									<section class="credential account">
										<?php if($account['username']): ?>
											<span class="username"><?php echo $account['username']; ?></span><br />
										<?php elseif($account['email']):?>
											<span class="email"><?php echo $account['email']; ?></span><br />
										<?php endif; ?>
										<?php if($account['password']): ?>
											<span class="password"><span class="concealed"><?php echo $account['password']; ?></span></span><br />
										<?php endif; ?>
										<?php if($account['email'] && $account['username']): ?>
											<span class="email"><?php echo $account['email']; ?></span><br />
										<?php endif; ?>
									</section>
								<?php endforeach;?>
							</section>
							<?php if (current_user_can('edit_posts')): ?>
							<a href="<?php echo get_edit_post_link(); ?>" class="edit-link">e</a>
							<?php endif; ?>
							<?php
							if(in_array($old_user,$allowed_users) && !in_array($new_user,$allowed_users)){
								$allowed_users[] = $new_user;
								update_post_meta($post->ID,'_credential_allowed_users',$allowed_users);

							} ?>
						</article>
						<?php endif; ?>
						<?php endwhile; ?>
					<?php endif; ?>

					</ul>
				</div>
		</div>
	</div>
<?php get_footer(); ?>
