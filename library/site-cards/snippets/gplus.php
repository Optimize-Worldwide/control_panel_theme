<div class="accordion snippet">
	<header>
		<h3>Google+ Tags</h3>
	</header>
	<main>
		<button class="clipboard">d</button>
		<pre><code>
			<?php if(count($gplus_links) == 1): ?>
				&lt;link rel=&quot;author&quot; href=&quot;<?php echo $gplus_links[0]['url']; ?>&quot; /&gt;<br />
				&lt;link rel=&quot;publisher&quot; href=&quot;<?php echo $gplus_links[0]['url']; ?>&quot; /&gt;<br />
				&nbsp;
			<?php elseif(count($gplus_links) > 1): ?>
				&lt;link rel=&quot;author&quot; href=&quot;<?php echo $gplus_links[1]['url']; ?>&quot; /&gt;<br />
				&lt;link rel=&quot;publisher&quot; href=&quot;<?php echo $gplus_links[1]['url']; ?>&quot; /&gt;<br />
				&nbsp;
			<?php endif; ?>
		</code></pre>
	</main>
</div>