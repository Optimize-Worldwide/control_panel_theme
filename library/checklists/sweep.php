<?php

$checklist_name = 'sweep';//Will be used for metabox slug

$checklistItems = array(
	'keyphrase_landingpages' => array(
		'title' => 'Create Key Phrase(s) Landing Pages',
		'description' => 'The first step to an SEO sweep is to make sure we have landing pages created from the key phrases.'
	),
	'optimize_content' => array(
		'title' => 'Check Content Optimization',
		'description' => 'Optimized content for length and keyword density. Each Page should have at least 250 character (priority are main pages). Keyword(s) should be relivant to the page. Also make note in content order of grammar and spelling issues. Use tools like <a href="http://www.seoprofiler.com/project/cicadacantina.com-dea577c2db1a88a0">SEO Profiler</a>, to access their keywords, and <a href="http://www.site-analyzer.com/">Site-Analyzer</a> to check the Keyword Density.'
	),
	'duplicate_content' => array(
		'title' => 'Check for Duplicate Content',
		'description' => '<a href="http://smallseotools.com/plagiarism-checker/" target="_blank">Plagarism Checker</a>'
	),	
		'optimized_titles' => array(
		'title' => 'Optimized Titles Tags',
		'description' => 'Inlcude city if local SEO. 50-59 chars preferred, not to exceed 69. Use <a href="https://wordpress.org/plugins/wp-meta-seo/" target="_blank">this plugin</a> to edit in bulk.'
	),
	'optimized_meta' => array(
		'title' => 'Optimized Meta Descriptions',
		'description' => 'Order Meta description from copy writer. Have them use <a href="https://wordpress.org/plugins/wp-meta-seo/" target="_blank">this plugin</a> to edit in bulk'
	),
	'optimized_h1' => array(
		'title' => 'Optimized H1',
		'description' => 'One per page. Should include keyword and location, not copied from title tag. Use <a href="https://addons.mozilla.org/en-uS/firefox/addon/seo-doctor/">Firefox extention SEO Doctor</a>. Get it to 100%.'
	),
	'optimized_headers' => array(
		'title' => 'Optimized H2 and H3',
		'description' => 'Use when relevant. Variations of keywords. Use only when needed.'
	),
	'embed_map' => array(
		'title' => 'Embed Maps',
		'description' => 'Their Local Listing if they have a brick and mortar, or the general area if not. Add local listing once it gets approved.'
	),
		'optimized_alts' => array(
		'title' => 'Optimized Image Alt Tags',
		'description' => 'Every image needs an alt tag (does not apply to CSS images) Use <a href="https://wordpress.org/plugins/wp-meta-seo/" target="_blank">this plugin</a> to edit in bulk'
	),
	'optimized_title_tags' => array(
		'title' => 'Optimized Link Title Tags',
		'description' => 'Every link needs an optimized title tag.'
	),
	'check_backup' => array(
		'title' => 'Check Backup',
		'description' => 'If it hasn\'t been set up - Name it: Weekly Backup (Domain) and make sure Plugins are being backed up. Create Dropbox Acct using client@optimizehere.co email. Save to Folder & Dropbox acct for client. Limit number of backups to 8.  (If it is already set up - just ensure that the backups are being made.)'
	),
		'site_bloat' => array(
		'title' => 'Check for Site Bloat',
		'description' => 'Site bloat is when your website has little content but, you have tons of pages indexed. Findout how many pages your site has indexed by using a Google Search Operator (site:domain.com). See if you have a ton of worthless material out there and what should be no indexed or removed. In a new client it is also an opertunity to see if google has indexed the www, non-www or a combination of the two. You can use Yoast to No-Index just about everything.'
	),
	'social_media' => array(
		'title' => 'Check Social Media Accounts',
		'description' => 'Twitter, Facebook, Google+, and Linkedin in MOST cases, invite all team members to be a manager. Order accounts from citations manager if necessary'
	),
	'canonicalization' => array(
		'title' => 'Canonicalization via .htaccess',
		'description' => 'Making sure that either the www or non-www version of the site loads'
	),
	'seo_urls' => array(
		'title' => 'Search-Engine-Friendly URLs',
		'description' => 'No long string of numbers or code. Having a .htm or .html at the end of the URL is okay'
	),
	'external_links' => array(
		'title' => 'Configure External Link Plugin',
		'description' => 'Uncheck icons, check open in new windows'
	),
	'optimized_language' => array(
		'title' => 'Optimized Language Tag',
		'description' => '&lt;meta name=&quot;language&quot; content=&quot;English&quot; /&gt;'
	),
	'facebook_meta' => array(
		'title' => 'Set the Facebook Meta Tag',
		'description' => '<a href="http://findmyfacebookid.com/">Find My Facebook Id</a> &lt;meta property=&quot;fb:page_id&quot; content=&quot;247138645367257&quot; /&gt;'
	),
	'geo-tags' => array(
		'title' => 'Add Geo-Tags',
		'description' => '<a href="http://www.geo-tag.de/generator/en.html">Geo Tag Generator</a>'
	),
	'geo-tags' => array(
		'title' => 'Add Geo-Tags',
		'description' => 'http://www.geo-tag.de/generator/en.html'
	),
	'image-optimization' => array(
		'title' => 'Use Smushit',
		'description' => 'Backup Database and run the WordPress Smushit plugin to make images load faster'
	),
	'caching' => array(
		'title' => 'Install a Caching Plugin',
		'description' => 'Backup Database before. Like WP Super Cache'
	),
	'database-optimization' => array(
		'title' => 'Optimize Database',
		'description' => 'Optimize database using WP Optimize'
	),
	'sitemaps' => array(
		'title' => 'HTML and XML Sitemaps',
		'description' => 'Configure HTML Sitemap plugin to sort Posts by Date. Configure XML Sitemap in Yoast (You may have to deactivate and reactivate for XML Sitemap to work)'
	),
	'google_analytics' => array(
		'title' => 'Google Analytics',
		'description' => 'This should be done in the on-boarding process, but if it hasen\'t, Use Matt\'s account. Invite all team members to be a manager- Manually Place Demographic Analytics if the Client is an SEO/SEM Client. ga(\'require\' \'displayfeatures\'); between the two other ga() statements'
	),
	'webmaster_verification' => array(
		'title' => 'Check if site is varified with Google Webmaster',
		'description' => 'This should be done in the on-boarding process, but if it hasen\'t, use Matt\'s account and add team as admins'
	),
	'bing_verification' => array(
		'title' => 'Check if site is varified with Bing Webmaster',
		'description' => ''
	),
	'yoast' => array(
		'title' => 'Setup Yoast WP-SEO Plugin',
		'description' => 'Set a default title on posts and pages. %%title%% | Branding. Set a default description of Excerpt %%excerpt%%. No index just about everthing. Exclude Items from the XML sitemap. Noindex subpages of archives.'
	),
	'webmaster_check' => array(
		'title' => 'Check Google Webmaster Tools',
		'description' => 'Review HTML Suggestions, Crawl Errors, Site Messages, spot check external links, etc.'
	),
	'google_sitemap' => array(
		'title' => 'Submit XML Sitemap to Google',
		'description' => ''
	),
	'bing_sitemap' => array(
		'title' => 'Submit XML Sitemap to Bing',
		'description' => ''
	),
	'google_authorship' => array(
		'title' => 'Google Publisher',
		'description' => 'Use Yoast to add Publisher to your site.'
	),
	'favicon' => array(
		'title' => 'Favicon',
		'description' => ''
	),
	'hcard_integration' => array(
		'title' => 'hCard Integration',
		'description' => 'Snippit in Control Pannel'
	),
	'footer_link' => array(
		'title' => 'Footer Link',
		'description' => ''
	),
	'broken_links' => array(
		'title' => 'Check and 301 Broken Links',
		'description' => ''
	),
	'robots_txt' => array(
		'title' => 'Optimized robots.txt',
		'description' => 'Ensure admin directories are disallowed, style directories are allowed, and the sitemap is linked'
	),
	'page_speed' => array(
		'title' => 'Check Page Speed',
		'description' => '<a href="https://developers.google.com/speed/pagespeed/insights#" target="_blank">Chrome Addon</a>'
	),
	'schema' => array(
		'title' => 'Implement Structured Data',
		'description' => ''
	),
	'consistent_nap' => array(
		'title' => 'Consistent NAP (Name, Address, Phone Number)',
		'description' => 'Anytime you see their NAP number make sure it\'s consistant in their citations.xml file.'
	),
	'freebase_entities' => array(
		'title' => 'Add Client and Organization to Freebase',
		'description' => ''
	),
		'google_fetch' => array(
		'title' => 'Fetch all Pages in GWT and Bingbot',
		'description' => ''
	),

);

 ?>