<div class="accordion snippet">
	<header>
		<h3>FileZilla</h3>
	</header>
	<main>
		<button class="clipboard">d</button>
		<pre><code>
			&lt;?xml version=&quot;1.0&quot; encoding=&quot;UTF-8&quot; standalone=&quot;true&quot;?&gt;
			<br>&lt;FileZilla3&gt;
			<br>    &lt;Servers&gt;
			<br>        &lt;Server&gt;
			<br>            &lt;Host&gt;<?php echo $ftp['ip']; ?>&lt;/Host&gt;
			<br>            &lt;Port&gt;21&lt;/Port&gt;
			<br>            &lt;Protocol&gt;ftp&lt;/Protocol&gt;
			<br>            &lt;Type&gt;0&lt;/Type&gt;
			<br>            &lt;User&gt;<?php echo $ftp['logins'][0]['username']; ?>&lt;/User&gt;
			<br>            &lt;Pass&gt;<?php echo $ftp['logins'][0]['password']; ?>&lt;/Pass&gt;
			<br>            &lt;Logontype&gt;1&lt;/Logontype&gt;
			<br>            &lt;TimezoneOffset&gt;0&lt;/TimezoneOffset&gt;
			<br>            &lt;PasvMode&gt;MODE_DEFAULT&lt;/PasvMode&gt;
			<br>            &lt;MaximumMultipleConnections&gt;0&lt;/MaximumMultipleConnections&gt;
			<br>            &lt;EncodingType&gt;Auto&lt;/EncodingType&gt;
			<br>            &lt;BypassProxy&gt;0&lt;/BypassProxy&gt;
			<br>            &lt;Name&gt;<?php the_title(); ?>&lt;/Name&gt;
			<br>            &lt;Comments/&gt;
			<br>            &lt;LocalDir&gt;\\FILESERVER\z\Optimize Worldwide\Clients\<?php the_title(); ?>\defaultroot&lt;/LocalDir&gt;
			<br>            &lt;RemoteDir&gt;0 1&lt;/RemoteDir&gt;
			<br>            &lt;SyncBrowsing&gt;1&lt;/SyncBrowsing&gt;
			<br>            <?php the_title(); ?>
			<br>        &lt;/Server&gt;
			<br>    &lt;/Servers&gt;
			<br>&lt;/FileZilla3&gt;
		</code></pre>
	</main>
</div>