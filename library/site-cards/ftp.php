<?php
global $site_data;
$ftp['ip']     = get_editable_post_meta($post->ID,'_site_ftp_ip_address','input',true);
$ftp['path']   = get_editable_post_meta($post->ID,'_site_ftp_absolute_path','input',true);
$ftp['logins'] = unserialize($site_data['_site_ftp_logins'][0]);
$ftp['notes']  = get_editable_post_meta($post->ID,'_site_ftp_notes','textarea',true);
if($ftp['logins']):
	$create_snippet['filezilla'] = true;
	$create_snippet['sftp-config'] = true;
	?>
	<section id="ftp_info" class="card m-all t-1of2 d-1of3">
		<a href="<?php echo get_edit_post_link(); ?>#meta_site_ftp" class="edit-link">e</a>
		<h2>FTP Access</h2>

		<?php if(get_post_meta($post->ID,'_site_ftp_ip_address',true)): ?>
			<code class="ftp-ip"><?php echo $ftp['ip']; ?></code><br />
		<?php endif; ?>
		<?php if(get_post_meta($post->ID,'_site_ftp_absolute_path',true)): ?>
			<code class="ftp-path"><?php echo $ftp['path']; ?></code><br />
		<?php endif; ?>

		<?php foreach ($ftp['logins'] as $ftp_login): ?>
			<section class="ftp account">
				<span class="username"><?php echo $ftp_login['username']; ?></span><br />
				<span class="password"><span class="concealed"><?php echo $ftp_login['password']; ?></span></span><br />
			</section>
		<?php endforeach; ?>

		<p class="notes">
			<?php echo $ftp['notes']; ?>
		</p>
	</section>
<?php else: ?>
	<section id="ftp_info" class="card m-all t-1of2 d-1of3">
		<h2 class="add-info"><a href="<?php echo get_edit_post_link(); ?>#meta_site_ftp">Add FTP Information</a></h2>
	</section>
<?php endif; ?>