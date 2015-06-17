<?php

$checklist_name = 'security';//Will be used for metabox slug

$checklistItems = array(
	'malware_check' => array(
		'title' => 'Check for Malware',
		'description' => 'Use <a href="http://sitecheck.sucuri.net/scanner/" target="_blank">Sucuri SiteCheck</a> to scan for malware'
	),
	'check_backup' => array(
		'title' => 'Check MainWP Backup',
		'description' => 'If it hasn\'t been set up - Name it: Weekly Backup (Domain) and make sure Plugins are being backed up. Create Dropbox Acct using client@optimizehere.co email. Save to Folder & Dropbox acct for client. Exlcude /backup/ folder. Limit number of backups to 8.  (If it is already set up - just ensure that the backups are being made.)'
	),
	'delete_admin' => array(
		'title' => 'Delete Admin Username',
		'description' => ''
	),
	'strong_passwords' => array(
		'title' => 'Use Strong Passwords',
		'description' => ''
	),
	'remove_plugins' => array(
		'title' => 'Remove Unnecessary or Inactive Plugins',
		'description' => ''
	),
	'update_wordpress' => array(
		'title' => 'Update WordPress',
		'description' => ''
	),
	'update_plugins' => array(
		'title' => 'Update Plugins',
		'description' => ''
	),
	'change_prefix' => array(
		'title' => 'Change Database Prefix',
		'description' => '<a href="https://docs.google.com/a/optimizehere.co/document/d/1GpXILNerV9BA-K4NYXL6WFzmOBwQW2HhNCzqIIw48-w/">Documentation</a>'
	),
	'harden_htaccess' => array(
		'title' => 'Harden .htaccess',
		'description' => 'Done by default. <a href="http://cp.optimizehere.co/reference/hardened-htaccess/">Here is a reference</a>'
	),
	'change_permissions' => array(
		'title' => 'Change File and Folder Permissions',
		'description' => '755 for directories and 644 for files'
	),
	'login_plugin' => array(
		'title' => 'Install Limit Login Attempts Plugin',
		'description' => ''
	),
	'spam_plugin' => array(
		'title' => 'Install Growmap Anti-Spambot Plugin',
		'description' => ''
	),
	'check_mailchimp' => array(
		'title' => 'Check MailChimp',
		'description' => 'Upload a CSV file to the "WordPress Security & Backup (Clients)" list that includes the email address and a "Y" for the "Sec & Bak Service" column.'
	),
);

 ?>