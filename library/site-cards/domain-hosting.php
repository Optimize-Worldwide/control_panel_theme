<?php

// Not currently used
global $site_data;
$domain_registrar['name']      = $site_data['_site_domain_registrar'][0];
$domain_registrar['login_url'] = $site_data['_site_domain_registrar_url'][0];
$domain_registrar['username']  = get_editable_post_meta($post->ID,'_site_domain_registrar_username','input',true);
$domain_registrar['password']  = get_editable_post_meta($post->ID,'_site_domain_registrar_password','input',true);
$domain_registrar['notes']     = get_editable_post_meta($post->ID,'_site_domain_notes','textarea',true);

$hosting['name']      = $site_data['_site_hosting_provider'][0];
$hosting['login_url'] = $site_data['_site_hosting_provider_url'][0];
$hosting['username']  = get_editable_post_meta($post->ID,'_site_hosting_provider_username','input',true);
$hosting['password']  = get_editable_post_meta($post->ID,'_site_hosting_provider_password','input',true);
$hosting['notes']     = get_editable_post_meta($post->ID,'_site_hosting_notes','textarea',true);?>
<?php if($hosting['name'] or $domain_registrar['name']): ?>
	<section id="domain_hosting_info" class="card m-all t-1of2 d-2of3">
	<?php if($hosting['name'] or get_post_meta($post->ID,'_site_hosting_provider_username',true) ):?>
		<section id="hosting_info" class="m-all t-all d-1of2">
			<a href="<?php echo get_edit_post_link(); ?>#meta_site_hosting" class="edit-link">e</a>
			<h2>Hosting</h2>
			<h3 class="hosting-provider section-head"><?php if(!empty($hosting['login_url'])): ?><a href="<?php echo $hosting['login_url']; ?>" target="_blank"><?php endif; echo $hosting['name'] ?><?php if(!empty($hosting['login_url'])): ?></a><?php endif; ?></h3>
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
		<section id="hosting_info" class="m-all t-all d-1of2">
			<h2 class="add-info"><a href="<?php echo get_edit_post_link(); ?>#meta_site_hosting">Add Hosting Information</a></h2>
		</section>
	<?php endif; ?>

	<?php if($domain_registrar['name']):?>
		<section id="domain_registration" class="m-all t-all d-1of2">
			<h2>Domain Registration</h2>
			<h3 class="domain-registrar section-head"><?php if(!empty($domain_registrar['login_url'])): ?><a href="<?php echo $domain_registrar['login_url']; ?>" target="_blank"><?php endif; echo $domain_registrar['name'] ?><?php if(!empty($domain_registrar['login_url'])): ?></a><?php endif; ?></h3>
			<section class="domain account">
				<span class="username"><?php echo $domain_registrar['username'] ?></span><br />
				<span class="password"><span class="concealed"><?php echo $domain_registrar['password'] ?></span></span>
			</section>
			<?php if($domain_registrar['notes']): ?>
				<p class="notes"><?php echo $domain_registrar['notes']; ?></p>
			<?php endif; ?>
		</section>
	<?php else: ?>
		<section id="domain_registration" class="m-all t-all d-1of2">
			<h2 class="add-info"><a href="<?php echo get_edit_post_link(); ?>#meta_site_domain">Add Domain Registration Information</a></h2>
		</section>
	<?php endif; ?>
<?php endif; ?>