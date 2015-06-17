<div class="accordion snippet">
	<header>
		<h3>sftp-config.json</h3>
	</header>
	<main>
		<button class="clipboard">d</button>
		<pre><code>
			{
			<br>  &quot;type&quot;: &quot;ftp&quot;,
			<br>  &quot;save_before_upload&quot;: true,
			<br>  &quot;upload_on_save&quot;: true,
			<br>  &quot;sync_down_on_open&quot;: true,
			<br>  &quot;sync_skip_deletes&quot;: false,
			<br>  &quot;sync_same_age&quot;: true,
			<br>  &quot;confirm_downloads&quot;: false,
			<br>  &quot;confirm_sync&quot;: false,
			<br>  &quot;confirm_overwrite_newer&quot;: true,
			<br>  &quot;host&quot;: &quot;<?php echo $ftp['ip']; ?>&quot;,
			<br>  &quot;user&quot;: &quot;<?php echo $ftp['logins'][0]['username']; ?>&quot;,
			<br>  &quot;password&quot;: &quot;<?php echo $ftp['logins'][0]['password']; ?>&quot;,
			<br>  &quot;port&quot;: &quot;21&quot;,
			<br>  &quot;remote_path&quot;: &quot;<?php echo $ftp['path']; ?>&quot;,
			<br>  &quot;ignore_regexes&quot;: [
			<br>    &quot;\\.sublime-(project|workspace)&quot;, &quot;sftp-config(-alt\\d?)?\\.json&quot;,
			<br>    &quot;sftp-settings\\.json&quot;, &quot;/venv/&quot;, &quot;\\.svn/&quot;, &quot;\\.hg/&quot;, &quot;\\.git/&quot;,
			<br>    &quot;\\.bzr&quot;, &quot;_darcs&quot;, &quot;CVS&quot;, &quot;\\.DS_Store&quot;, &quot;Thumbs\\.db&quot;, &quot;desktop\\.ini&quot;,
			<br>    &quot;wp-config.php&quot;,
			<br>    &quot;.htaccess&quot;
			<br>  ],
			<br>  &quot;connect_timeout&quot;: 30,
			<br>  &quot;ftp_passive_mode&quot;: true,
			<br>}
		</code></pre>
	</main>
</div>