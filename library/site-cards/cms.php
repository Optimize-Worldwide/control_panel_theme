<?php
$cms['database_host']        = get_editable_post_meta($post->ID,'_site_cms_database_host','input',true);
$cms['phpmyadmin']           = get_editable_post_meta($post->ID,'_site_cms_phpmyadmin','input',true);
$cms['database_username']    = get_editable_post_meta($post->ID,'_site_cms_database_username','input',true);
$cms['database_password']    = get_editable_post_meta($post->ID,'_site_cms_database_password','input',true);
$cms['admin_username']       = get_editable_post_meta($post->ID,'_site_cms_admin_username','input',true);
$cms['admin_password']       = get_editable_post_meta($post->ID,'_site_cms_admin_password','input',true);
$cms['admin_email_address']  = get_editable_post_meta($post->ID,'_site_cms_admin_email_address','input',true);
$cms['client_username']      = get_editable_post_meta($post->ID,'_site_cms_client_username','input',true);
$cms['client_password']      = get_editable_post_meta($post->ID,'_site_cms_client_password','input',true);
$cms['client_email_address'] = get_editable_post_meta($post->ID,'_site_cms_client_email_address','input',true);
$cms['notes'] = get_editable_post_meta($post->ID,'_site_cms_notes','textarea',true);
$cms['logins']               = get_post_meta($post->ID,'_site_cms_login_other',true);
if(get_post_meta($post->ID,'_site_cms_admin_password',true) or get_post_meta($post->ID,'_site_cms_database_username',true)): ?>
	<section id="cms_info" class="card m-all t-1of2 d-1of3">
		<a href="<?php echo get_edit_post_link(); ?>#meta_site_cms" class="edit-link">e</a>
		<h2>Content Management</h2>


		<a href="<?php echo $url ?>/wp-admin">Login</a>

		<h3 class="section-head">CMS Database</h3>
		<span class="database-host"><span class="label">@</span><?php echo $cms['database_host']; ?></span><br />
		<span class="phpmyadmin"><a href="<?php echo get_post_meta($post->ID,'_site_cms_phpmyadmin',true); ?>">PHPMyAdmin</a></span>
		<section class="database account">
			<span class="username"><?php echo $cms['database_username']; ?></span><br />
			<span class="password"><span class="concealed"><?php echo $cms['database_password']; ?></span></span><br />
		</section>

		<?php if(get_post_meta($post->ID,'_site_cms_admin_password',true)): ?>
			<h3 class="section-head">Admin Login</h3>
			<section class="cms account">
				<span class="username"><?php echo $cms['admin_username']; ?></span><br />
				<span class="password"><span class="concealed"><?php echo $cms['admin_password'] ?></span></span><br />
				<span class="email"><?php echo $cms['admin_email_address']; ?></span>
			</section>
		<?php endif; ?>

		<?php if(get_post_meta($post->ID,'_site_cms_client_username',true)): ?>
			<h3 class="section-head">Client Login</h3>
			<section class="cms account">
				<span class="username"><?php echo $cms['client_username']; ?></span><br />
				<span class="password"><span class="concealed"><?php echo $cms['client_password'] ?></span></span><br />
				<span class="email"><?php echo $cms['client_email_address']; ?></span>
			</section>
		<?php endif; ?>

		<?php if($cms['logins']): ?>
			<h3 class="section-head">Other CMS Logins</h3>
			<?php foreach ($cms['logins'] as $cms_login): ?>
				<section class="cms account">
					<span class="username"><?php echo $cms_login['username']; ?></span><br />
					<span class="password"><span class="concealed"><?php echo $cms_login['password']; ?></span></span><br />
					<?php if($cms_login['email_address']): ?>
						<span class="email"><?php echo $cms_login['email_address']; ?></span>
					<?php endif; ?>
				</section>
			<?php endforeach; ?>
		<?php endif;
		if($cms['notes']):?>
			<p class="notes"><?php echo nl2br($cms['notes']); ?></p>
		<?php endif;		?>
	</section>
<?php else: ?>
	<section id="cms_info" class="card m-all t-1of2 d-1of3">
			<h2 class="add-info"><a href="<?php echo get_edit_post_link(); ?>#meta_site_cms">Add CMS Information</a></h2>
	</section>
<?php endif; ?>