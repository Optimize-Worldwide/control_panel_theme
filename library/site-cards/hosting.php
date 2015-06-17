<?php
$hosting['name']      = $site_data['_site_hosting_provider'][0];
$hosting['login_url'] = $site_data['_site_hosting_provider_url'][0];
$hosting['username']  = get_editable_post_meta($post->ID,'_site_hosting_provider_username','input',true);
$hosting['password']  = get_editable_post_meta($post->ID,'_site_hosting_provider_password','input',true);
$hosting['notes']     = get_editable_post_meta($post->ID,'_site_hosting_notes','textarea',true);
if($hosting['name'] or get_post_meta($post->ID,'_site_hosting_provider_username',true)):?>
	<section id="hosting_info" class="card m-all t-1of2 d-1of3">
		<a href="<?php echo get_edit_post_link(); ?>#meta_site_hosting" class="edit-link">e</a>
		<h2>Hosting</h2>
		<h3 class="hosting-provider section-head"><a href="<?php echo $hosting['login_url'] ?>" target="_blank"><?php echo $hosting['name'] ?></a></h3>
		<?php if($hosting['username'] or $hosting['password']): ?>
			<section class="hosting account">
				<?php if(get_post_meta($post->ID,'_site_hosting_provider_username',true)): ?>
					<span class="username"><?php echo $hosting['username'] ?></span><br />
				<?php endif; ?>
				<?php if(get_post_meta($post->ID,'_site_hosting_provider_password',true)): ?>
					<span class="password"><span class="concealed"><?php echo $hosting['password'] ?></span></span>
				<?php endif; ?>
			</section>
		<?php endif; ?>
		<?php if(get_post_meta($post->ID,'_site_hosting_notes',true)): ?>
			<p class="notes"><?php echo nl2br($hosting['notes']); ?></p>
		<?php endif; ?>
	</section>
<?php else: ?>
	<section id="hosting_info" class="card m-all t-1of2 d-1of3">
		<h2 class="add-info"><a href="<?php echo get_edit_post_link(); ?>#meta_site_hosting">Add Hosting Information</a></h2>
	</section>
<?php endif; ?>