<div class="accordion snippet">
	<header>
		<h3>hCard</h3>
	</header>
	<main>
		<button class="clipboard">d</button>
		<pre><code>
			&lt;div id=&quot;hcard&quot; class=&quot;vcard&quot;&gt;
			<br>  &lt;a class=&quot;url fn&quot; href=&quot;<?php echo $url ?>&quot;&gt;<?php echo get_the_title($client); ?>&lt;/a&gt;
			<br>  &lt;div class=&quot;org&quot;&gt;<?php echo get_the_title($client); ?>&lt;/div&gt;
			<br>  &lt;a class=&quot;email&quot; href=&quot;mailto:<?php echo $email_addresses[0]['address']; ?>&quot;&gt;<?php echo $email_addresses[0]['address']; ?>&lt;/a&gt;
			<br>  &lt;div class=&quot;adr&quot;&gt;
			<br>    <?php echo $business_addresses[0]['address']; ?>
			<br>    &lt;span class=&quot;country-name&quot;&gt;United States&lt;/span&gt;
			<br>  &lt;/div&gt;
			<br>  &lt;div class=&quot;tel&quot;&gt;<?php echo $phone_numbers[0]['number']; ?>&lt;/div&gt;
			<br>&lt;/div&gt;
		</code></pre>
	</main>
</div>