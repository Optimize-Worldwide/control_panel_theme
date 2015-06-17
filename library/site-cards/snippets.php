<section id="snippets" class="card m-all t-1of2 d-1of3">
	<h2>Snippets</h2>
	<?php if($create_snippet['filezilla']) include 'snippets/filezilla.php'; ?>
	<?php if($create_snippet['sftp-config']) include 'snippets/sftp-config.php'; ?>
	<?php if($create_snippet['hcard']) include 'snippets/hcard.php'; ?>
	<?php include 'snippets/email.php'; ?>
	<?php
	include 'snippets/structured-data.php';
	$gplus_links = get_post_meta($post->ID,'_site_social_gplus',true);
	if($gplus_links) include 'snippets/gplus.php'; ?>
</section>