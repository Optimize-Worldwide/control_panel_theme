<?php

$has_social_account['facebook'] = unserialize($site_data['_site_social_facebook'][0]);
$has_social_account['gplus'] = unserialize($site_data['_site_social_gplus'][0]);
$has_social_account['twitter'] = unserialize($site_data['_site_social_twitter'][0]);
$has_social_account['linkedin'] = unserialize($site_data['_site_social_linkedin'][0]);

if($has_social_account['facebook'] or $has_social_account['gplus'] or $has_social_account['twitter'] or $has_social_account['linkedin']):?>
	<section id="social" class="card m-all t-1of2 d-1of3">
		<a href="<?php echo get_edit_post_link(); ?>#meta_site_social" class="edit-link">e</a>
		<h2>Social Accounts</h2>
		<?php if($has_social_account['facebook']):
			foreach ($has_social_account['facebook'] as $facebook_account):?>
			<div class="social-account accordion facebook">
				<header>
					<h3>Facebook Account</h3>
				</header>
				<main class="account">
					<?php if(isset($facebook_account['username']) and $facebook_account['username']): ?>
						<span class="username"><?php echo $facebook_account['username']; ?></span><br />
					<?php elseif(isset($facebook_account['email']) and $facebook_account['email']): ?>
						<span class="email"><?php echo $facebook_account['email']; ?></span><br />
					<?php endif; ?>

					<?php if(isset($facebook_account['password']) and $facebook_account['password']): ?>
						<span class="password"><span class="concealed"><?php echo $facebook_account['password']; ?></span></span><br />
					<?php endif; ?>

					<?php if(isset($facebook_account['email']) and isset($facebook_account['username'])): ?>
						<span class="email"><?php echo $facebook_account['email']; ?></span><br />
					<?php endif; ?>

					<?php if(isset($facebook_account['notes']) and isset($facebook_account['notes'])): ?>
						<span class="notes"><?php echo nl2br($facebook_account['notes']); ?></span><br />
					<?php endif; ?>

					<?php if (isset($facebook_account['url']) and isset($facebook_account['url'])): ?>
						<a class="social-url" href="<?php echo $facebook_account['url']; ?>" target="_blank">Link</a><br>
					<?php endif; ?>
				</main>
			</div>
			<?php endforeach; ?>
		<?php endif; ?>

		<?php if($has_social_account['gplus']):
			foreach ($has_social_account['gplus'] as $gplus_account):?>
			<div class="social-account accordion google">
				<header>
					<h3>Google+ Account</h3>
				</header>
				<main class="account">
					<?php if(isset($gplus_account['username'])): ?>
						<span class="username"><?php echo $gplus_account['username']; ?></span><br />
					<?php elseif(isset($gplus_account['email'])): ?>
						<span class="email"><?php echo $gplus_account['email']; ?></span><br />
					<?php endif; ?>

					<?php if(isset($gplus_account['password'])): ?>
						<span class="password"><span class="concealed"><?php echo $gplus_account['password']; ?></span></span><br />
					<?php endif; ?>

					<?php if(isset($gplus_account['email']) and isset($gplus_account['username'])): ?>
						<span class="email"><?php echo $gplus_account['email']; ?></span><br />
					<?php endif; ?>

					<?php if(isset($gplus_account['notes'])): ?>
						<span class="notes"><?php echo nl2br($gplus_account['notes']); ?></span><br />
					<?php endif; ?>

					<?php if (isset($gplus_account['url'])): ?>
						<a class="social-url" href="<?php echo $gplus_account['url']; ?>" target="_blank">Link</a><br>
					<?php endif; ?>
				</main>
			</div>
			<?php endforeach; ?>
		<?php endif; ?>

		<?php if($has_social_account['twitter']):
			foreach ($has_social_account['twitter'] as $twitter_account):?>
			<div class="social-account accordion twitter">
				<header>
					<h3>Twitter Account</h3>
				</header>
				<main class="account">
					<?php if(isset($twitter_account['username'])): ?>
						<span class="username"><?php echo $twitter_account['username']; ?></span><br />
					<?php elseif(isset($twitter_account['email'])): ?>
						<span class="email"><?php echo $twitter_account['email']; ?></span><br />
					<?php endif; ?>

					<?php if(isset($twitter_account['password'])): ?>
						<span class="password"><span class="concealed"><?php echo $twitter_account['password']; ?></span></span><br />
					<?php endif; ?>

					<?php if(isset($twitter_account['email']) and isset($twitter_account['username'])): ?>
						<span class="email"><?php echo $twitter_account['email']; ?></span><br />
					<?php endif; ?>

					<?php if(isset($twitter_account['notes'])): ?>
						<span class="notes"><?php echo nl2br($twitter_account['notes']); ?></span><br />
					<?php endif; ?>

					<?php if (isset($twitter_account['url'])): ?>
						<a class="social-url" href="<?php echo $twitter_account['url']; ?>" target="_blank">Link</a><br>
					<?php endif; ?>
				</main>
			</div>
			<?php endforeach; ?>
		<?php endif; ?>

		<?php if($has_social_account['linkedin']):
			foreach ($has_social_account['linkedin'] as $linkedin_account):?>
			<div class="social-account accordion linkedin">
				<header>
					<h3>LinkedIn Account</h3>
				</header>
				<main class="account">
					<?php if(isset($linkedin_account['username'])): ?>
						<span class="username"><?php echo $linkedin_account['username']; ?></span><br />
					<?php elseif(isset($linkedin_account['email'])): ?>
						<span class="email"><?php echo $linkedin_account['email']; ?></span><br />
					<?php endif; ?>

					<?php if(isset($linkedin_account['password'])): ?>
						<span class="password"><span class="concealed"><?php echo $linkedin_account['password']; ?></span></span><br />
					<?php endif; ?>

					<?php if(isset($linkedin_account['email']) and isset($linkedin_account['username'])): ?>
						<span class="email"><?php echo $linkedin_account['email']; ?></span><br />
					<?php endif; ?>

					<?php if(isset($linkedin_account['notes'])): ?>
						<span class="notes"><?php echo nl2br($linkedin_account['notes']); ?></span><br />
					<?php endif; ?>

					<?php if (isset($linkedin_account['url'])): ?>
						<a class="social-url" href="<?php echo $linkedin_account['url']; ?>" target="_blank">Link</a><br>
					<?php endif; ?>
				</main>
			</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</section>
<?php else: ?>
	<section id="social" class="card m-all t-1of2 d-1of3">
		<h2 class="add-info"><a href="<?php echo get_edit_post_link(); ?>#meta_site_social">Add Social Networks</a></h2>
	</section>
<?php endif; ?>