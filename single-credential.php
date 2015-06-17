<?php
/*
 * CREDENTIAL TEMPLATE
*/

$user_id = get_current_user_id();

$visits = get_post_meta($post->ID,"_visits",true);

$visits[$user_id]++;

$page_visits = $visits[$user_id];//page_visits is the number of times user has visited page

update_post_meta($post->ID,"_visits",$visits);

$recent_credentials = get_user_meta( $user_id, "_recent_credentials", true);

if($recent_credentials) {//if has recent credentials
	if(!in_array($post->ID,$recent_credentials)){
		array_unshift($recent_credentials,$post->ID);
	}
} else {
	$recent_credentials = array($post->ID);
}

$recent_credentials = array_slice($recent_credentials, 0, 10);

update_user_meta($user_id, "_recent_credentials", $recent_credentials);

$url      = get_editable_post_meta($post->ID,'_credential_site','input',true);
$accounts = get_post_meta($post->ID,'_credential_accounts',true);
$notes    = get_editable_post_meta($post->ID,'_credential_notes','textarea',true);
$allowed_users = get_post_meta($post->ID,'_credential_allowed_users',true);
?>

<?php get_header(); ?>
			<div id="content" class="credential">
				<div id="inner-content" class="wrap cf">
						<div id="main" class="m-all t-all d-all cf" role="main">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">
								<?php if(in_array(get_current_user_id(),$allowed_users)):  ?>
								<header class="article-header">
									<h1 class="single-title credential-title"><?php the_title(); ?></h1>
									<a class="edit-link" href="<?php echo get_edit_post_link( ); ?>">e</a>
								</header>
								<section class="entry-content cf">
									<?php if($notes): ?>
										<p class="notes"><?php echo nl2br($notes); ?></p>
									<?php endif; ?>
									<?php if($url): ?>
										<a href="<?php echo $url; ?>"><?php echo $url; ?></a><br /><br>
									<?php endif; ?>
									<?php if($accounts):foreach ($accounts as $account): ?>
										<section class="account">
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
									<?php endforeach;endif; ?>
								<?php else: ?>
									You do not have access to this credential
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
											<p><?php _e( 'This is the error message in the single-credential.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>
							<?php endif; ?>

						</div>
						<?php //get_sidebar(); ?>
				</div>
			</div>
<?php get_footer(); ?>
