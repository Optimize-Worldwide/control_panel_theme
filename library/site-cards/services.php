<?php $has_service_accounts = unserialize($site_data['_site_services'][0]);
if ($has_service_accounts):?>
	<section id="services" class="card m-all t-1of2 d-1of3">
		<a href="<?php echo get_edit_post_link(); ?>#meta_site_services" class="edit-link">e</a>
		<h2>Service Accounts</h2>

		<?php foreach ($has_service_accounts as $service_account):
			$service_account['url'] = str_replace("www.","",$service_account['url']);
			$parts = parse_url($service_account['url']);
			$base = explode(".",$parts['host']); ?>
			<div class="service-account accordion <?php echo $base[0]; ?>">
				<header>
					<?php if (isset($service_account['description']) and $service_account['description']):  ?>
						<h3><?php echo $service_account['description']; ?></h3>
					<?php else: ?>
						<h3><?php echo $parts['host']; ?></h3>
					<?php endif; ?>
				</header>
				<main class="account">
					<?php if (isset($service_account['description']) and $service_account['description']): ?>
						<span class="service-description"><?php echo $service_account['description']; ?></span><br>
					<?php endif; ?>

					<?php if (isset($service_account['username']) and $service_account['username']): ?>
						<span class="username"><?php echo $service_account['username']; ?></span><br>
					<?php endif; ?>

					<?php if (isset($service_account['email']) and $service_account['email']): ?>
						<span class="email"><?php echo $service_account['email']; ?></span><br>
					<?php endif; ?>

					<?php if (isset($service_account['password']) and $service_account['password']): ?>
						<span class="password"><span class="concealed"><?php echo $service_account['password']; ?></span></span><br>
					<?php endif; ?>

					<?php if(isset($service_account['notes']) and $service_account['notes']): ?>
						<p class="notes"><?php echo nl2br($service_account['notes'],true); ?></p>
					<?php endif; ?>

					<?php if (isset($service_account['url']) and $service_account['url']): ?>
						<a class="service-url" href="<?php echo $service_account['url']; ?>" target="_blank"></a><br>
					<?php endif; ?>
				</main>
			</div>
		<?php endforeach; ?>
	</section>
<?php else: ?>
	<section id="services" class="card m-all t-1of2 d-1of3">
		<h2 class="add-info"><a href="<?php echo get_edit_post_link(); ?>#meta_site_services">Add Service Information</a></h2>
	</section>
<?php endif; ?>