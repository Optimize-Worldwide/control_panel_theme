<?php
global $site_data;
$domain_registrar['name']      = $site_data['_site_domain_registrar'][0];
$domain_registrar['login_url'] = $site_data['_site_domain_registrar_url'][0];
$domain_registrar['username']  = get_editable_post_meta($post->ID,'_site_domain_registrar_username','input',true);
$domain_registrar['password']  = get_editable_post_meta($post->ID,'_site_domain_registrar_password','input',true);
$domain_registrar['notes']     = get_editable_post_meta($post->ID,'_site_domain_notes','textarea',true);?>
<?php if($domain_registrar['name']):?>
	<section id="domain_registration" class="card m-all t-1of2 d-1of3">
		<h2>Domain Registration</h2>
		<h3 class="domain-registrar section-head"><a href="<?php echo $domain_registrar['login_url'] ?>" target="_blank"><?php echo $domain_registrar['name'] ?></a></h3>
		<section class="domain account">
			<span class="username"><?php echo $domain_registrar['username'] ?></span><br />
			<span class="password"><span class="concealed"><?php echo $domain_registrar['password'] ?></span></span>
		</section>
		<?php if($domain_registrar['notes']): ?>
			<p class="notes"><?php echo $domain_registrar['notes']; ?></p>
		<?php endif; ?>
	</section>
<?php else: ?>
	<section id="domain_registration" class="card m-all t-1of2 d-1of3">
		<h2 class="add-info"><a href="<?php echo get_edit_post_link(); ?>#meta_site_domain">Add Domain Registration Information</a></h2>
	</section>
<?php endif; ?>