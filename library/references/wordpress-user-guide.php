<?php
$url = get_post_meta($site,'_site_url',true);

$site_wordpress_username = get_post_meta($site,'_site_cms_client_username',true);
$site_wordpress_password = get_post_meta($site,'_site_cms_client_password',true);
 ?>

<style>
p.contact {
	text-align: right;
	position: absolute;
	bottom: 0;
	right: 0;
}
@page {
	size: letter;
	margin: 0.5in;
}
@media print {
	* {
		float: none !important;
		/*position: relative !important;*/
	}
	p {
		margin: 0 !important;
		padding: 0;
	}
	#content {
		padding: 0;
	}

	hr,
	section.page {
		page-break-after: always !important;
		display: block !important;
		float: none !important;
		position: relative !important;
	}
	section.page {
		height: 100%;
		min-height: 9in;
		/*border: 1px solid black;*/
		max-width: 8.5in;
	}
	.entry-content {
		padding: 0 !important;
	}
	header.header,
	header.article-header,
	footer.footer,
	#respond {
		display: none;
	}
	.reference #main > article {
		max-width: 100%;
		box-shadow: none;
		background: white;
		padding: 0;
		margin: 0;
	}
	.edit-link {
		display: none;
	}
	ol {
		padding-left: 0.5in;
		list-style-type: decimal;
	}
	ol li {
		margin-bottom: 0.25in;
		page-break-inside: avoid;
	}
	figure img {
		/*box-shadow: 1mm 1mm 2mm rgba(0,0,0,0.5);*/
		border: 1px solid black;
	}

	#page_1 {
		background-image: url("<?php echo get_template_directory_uri(); ?>/library/images/user-guide/nodes.png") !important;
	}
	#page_1 .optimize-logo {
		position: absolute;
		width: 6.5in;
		top: 1.7in;
		left: 0;
	}
	#page_1 time {
		position: absolute;
		top: 0;
		left: 0;
	}
	#page_1 h1 {
		position: absolute;
		top: 0;
		bottom: 0;
		left: 0;
		margin: auto;
		line-height: 1.1em;
		height: 3em;
	}
	#page_1 h2 {
		position: absolute;
		top: 0;
		bottom: 0;
		left: 0;
		margin: auto;
		line-height: 5em;
		height: 1em;
	}
	p.contact {
		right: 0;
	}
}
</style>

<section class="page" id="page_1">
	<time><?php echo date("F j, Y"); ?></time>
	<img src="<?php echo get_template_directory_uri(); ?>/library/images/user-guide/optimize-logo.png" class="optimize-logo" alt="">
	<h1>WordPress User Guide<br />for <?php echo str_replace("http://","",$url); ?></h1>
	<h2>Search Engine Friendly Web Design</h2>
	<p class="contact">
		Optimize Worldwide<br />
		(530) 710-8283<br />
		info@optimizehere.co<br />
		http://optimizehere.co<br />
		833 Mistletoe Ln.<br />
		Redding, CA 96002
	</p>



</section>

<section class="page" id="page_2">
	<h2>Table of Contents</h2>
	<!-- Generate from other headings? -->


</section>

<section class="page" id="page_3">
	<h2>How to Login to WordPress</h2>
	<ol>
		<li>Visit <a href="<?php echo $url; ?>/wp-admin"><?php echo $url; ?>/wp-admin</a><br />(I recommend bookmarking this)</li>
		<li>Username: <?php echo $site_wordpress_username; ?></li>
		<li>Password: <?php echo $site_wordpress_password; ?></li>
	</ol>
	<img src="<?php echo get_template_directory_uri(); ?>/library/images/user-guide/login-screen.png" alt="login screen">


</section>

<section class="page" id="page_4">
	<h2>Creating a Backup</h2>
	<p>WordPress has built in versioning on pages and posts, however, if you are making a significant amount of changes, adding/removing plugins, or changing any configuration settings, it’s advised to create a quick database backup.</p>
	<ol>
		<li>
			<figure>
				<figcaption>Hover over "Settings", then click WP Backup (or click <a href="<?php echo $url; ?>/wp-admin/options-general.php?page=swb">here</a>)</figcaption>
				<img src="<?php echo get_template_directory_uri(); ?>/library/images/user-guide/hover-backup.png" alt="Settings hover">
			</figure>
		</li>
		<li>
			<figure>
				<figcaption>Click the Create Database Backup button</figcaption>
				<img src="<?php echo get_template_directory_uri(); ?>/library/images/user-guide/create-database-backup.png" alt="Create backup">
			</figure>
		</li>
	</ol>


</section>

<section class="page" id="page_4">
	<h2>Adding a Page</h2>
	<ol>
		<li>
			<figure>
				<figcaption>Hover over "Pages," then click on "Add New" (or click <a href="<?php echo $url; ?>/wp-admin/post-new.php?post_type=page">here</a>)</figcaption>
				<img src="<?php echo get_template_directory_uri(); ?>/library/images/user-guide/hover-new-page.png" alt="Page hover">
			</figure>
		</li>
		<li>Enter a title</li>
		<li>
			<figure>
				<figcaption>
					Enter your page content.<br />
					<strong>Important:</strong> if you are going to copy/paste from a website or Word, you must toggle to the "HTML" tab first, paste in your content, and then toggle back to the "Visual" tab
				</figcaption>
				<img src="<?php echo get_template_directory_uri(); ?>/library/images/user-guide/html-tab.png" alt="html editor">
			</figure>
		</li>
		<li>
			<figure>
				<figcaption>To add a hyperlink, select the word you want to link and the click the "chain" icon</figcaption>
				<img src="<?php echo get_template_directory_uri(); ?>/library/images/user-guide/add-link.png" alt="Add Link">
			</figure>
		</li>
		<li>
			<figure>
				<figcaption>Enter the link address and give it a short title</figcaption>
				<img src="<?php echo get_template_directory_uri(); ?>/library/images/user-guide/insert-link.png" alt="Insert Link info">
			</figure>
		</li>
		<li>
			<figure>
				<figcaption>To add media, place the cursor where you want the picture to go. Click on the "Add Media" button</figcaption>
				<img src="<?php echo get_template_directory_uri(); ?>/library/images/user-guide/add-media.png" alt="Add Media">
			</figure>
		</li>
		<li>
			<figure>
				<figcaption>Click the "Upload Files" tab</figcaption>
				<img src="<?php echo get_template_directory_uri(); ?>/library/images/user-guide/upload-files.png" alt="Upload Files">
			</figure>
		</li>
		<li>
			<figure>
				<figcaption>Click the "Select Files" button or drag and drop a photo onto the page</figcaption>
				<img src="<?php echo get_template_directory_uri(); ?>/library/images/user-guide/select-files.png" alt="Select files">
			</figure>
		</li>
		<li>
			<figure>
				<figcaption>Give your picture a title (should describe the picture and/or article topic) and use the same for “Alt Text”. Under “Link URL” click the “None” button.  Decide which side of the page you want your picture to show on. Make sure you have it set to “Medium”. Finally, click “Insert into Page”.</figcaption>
				<img src="<?php echo get_template_directory_uri(); ?>/library/images/user-guide/edit-image.png" alt="Picture Info">
			</figure>
		</li>
		<li>
			<figure>
				<figcaption>10.	Scroll back up to the top of the page, on the right hand side, click the “Publish” button.  (Double check your page of course).</figcaption>
				<img src="<?php echo get_template_directory_uri(); ?>/library/images/user-guide/publish.png" alt="Publish">
			</figure>
		</li>
	</ol>


</section>

<section class="page" id="page_5">
	<h2>Updating a Page</h2>
	<ol>
		<li>
			<figure>
				<figcaption>Click on "Pages"</figcaption>
				<img src="<?php echo get_template_directory_uri(); ?>/library/images/user-guide/hover-pages.png" alt="Pages Hover">
			</figure>
		</li>
		<li>
			<figure>
				<figcaption>Click on the page you wish to edit</figcaption>
				<img src="<?php echo get_template_directory_uri(); ?>/library/images/user-guide/edit-page.png" alt="choose page">
			</figure>
		</li>
		<li>
			<figure>
				<figcaption>Make your modifications and click "update"</figcaption>
				<img src="<?php echo get_template_directory_uri(); ?>/library/images/user-guide/publish.png" alt="publish">
			</figure>
		</li>
	</ol>


</section>


<section class="page" id="page_6">
	<h2>Adding a Page to the Navigation Menu</h2>
	<ol>
		<li>
			<figure>
				<figcaption>Hover over "Appearance," then select "Menus"</figcaption>
				<img src="<?php echo get_template_directory_uri(); ?>/library/images/user-guide/hover-menu.png" alt="Menu Hover">
			</figure>
		</li>
		<li>Use the Pages box to find your page. If you don't see it in the list, click "View All"</li>
		<li>Check the box next to the page name</li>
		<li>
			<figure>
				<figcaption>Click the "Add to Menu" button</figcaption>
				<img src="<?php echo get_template_directory_uri(); ?>/library/images/user-guide/add-to-menu.png" alt="Add to menu">
			</figure>
		</li>
		<li>
			<figure>
				<figcaption>Your menu item will be added to the bottom. Drag and drop to the preferred order</figcaption>
				<img src="<?php echo get_template_directory_uri(); ?>/library/images/user-guide/order-menu.png" alt="drag and drop">
			</figure>
		</li>
		<li>
			<figure>
				<figcaption>Click the "Save Menu" button</figcaption>
				<img src="<?php echo get_template_directory_uri(); ?>/library/images/user-guide/save-menu.png" alt="Save menu">
			</figure>
		</li>
	</ol>
</section>