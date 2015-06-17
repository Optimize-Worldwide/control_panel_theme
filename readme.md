# Control Panel
## A WordPress theme for WordPress development

This WordPress theme is brought to you by [Optimize Worldwide](http://optimizehere.co/), an online marketing company. We create and manage hundreds of WordPress websites and needed a better way to keep track of them all than storing information in text files - and what better way to manage WordPress than with WordPress?

This theme is designed to aid development & management of multiple websites, with advanced features for WordPress-based websites. Keep track of client information and internal reference documents. Useful for teams or companies of many sizes.

### The Site File
Optimize Worldwide manages online marketing for our clients through citation management, technical optimization, copywriting, and social media promotion. What has become known around the office as 'the site file' is our record of information needed to manage a website's content & search engine optimization. This site file contains a number of cards:

#### Business Information
Store pertinents about the site's associated business, like locations and contact points. Sites can be associated with a client for easy reference.

#### Hosting, FTP, and CMS
The hosting, FTP, and CMS cards contain reference information for accessing a client's hosting solution, server files, and content-management system. Leave login links, credentials, and database information here.

#### Citations
The citations card contains all information pertaining to third-party representations of a business (e.g. Facebook, Google+, Yellow Pages). Store login credentials, take notes on citation completeness, mark in-progress validations for later reference.

#### Snippets
The snippets card contains code snippets that have been automatically generated from other information in the site file. Currently these are:

- **sftp-config.json**: For those developing with Sublime Text & the SFTP plugin, this snippet can be pasted into an sftp-config.json file in the root of your development machine. If you've never used this configuration, we recommend checking out [Sublime Text](http://www.sublimetext.com/) & [Sublime SFTP](http://wbond.net/sublime_packages/sftp), which allows easy management of the link between local development files & the production site.
- **hCard**: As part of our SEO process, we embed an hCard into the websites we develop. This snippet generates the relevant code.
- **Email Forms**: For sites we develop with WordPress, we use the [Contact Form 7](http://contactform7.com/) Plugin. This snippet generates HTML tables to use as a template to paste into website contact forms.

#### Styles
The styles card contains a reference of the canonical colors & fonts used on a website. These swatches also determine the color of the site's card and control panel theme.

### Clients
The Control Panel can hold information about a client before or after their site has been developed. Make contact information available to all members of your team.

### MainWP
[MainWP](http://mainwp.com) is a WordPress plugin that handles connections to multiple WordPress websites, allowing the user to manage posts, pages, plugins, themes, upgrades, and backups. If you manage more than a few websites running WordPress, this plugin saves a lot of time.

### Checklists
These checklists can be attached to a website site file during its development or SEO management to keep track of the minimum tasks required to make a website search-engine friendly.

- Pre-Development
- Development
- Pre-Release
- Release
- Security & Backup
- SEO Sweep

### References
The reference section of the control panel organizes documents that your whole team or company frequently references during development or management. The default types of reference included in the theme are:

- HowTo
- Link
- Slideshow
- Snippet
- Style Guide
- Theme
- User Guide

### Features
Additional features of the control panel not listed above include:

- **Password-concealing**: so that you can use the control panel in public without revealing sensitive information, password fields are concealed until clicked or tapped on.
- **Responsive**: The control panel can be used on any device, and changes color schemes at night
- **User Roles**: The theme registers several new user roles based on our marketing team's positions and assigns them relevant permissions.

### Plugin Dependencies
This theme uses several third-party plugins that are required & included using [TGM Plugin Activation](http://tgmpluginactivation.com/). None of them are absolutely crucial to using the Control Panel, but all provide useful functionality and we use them for development. This theme makes extensive use of [Custom MetaBoxes 2](https://github.com/WebDevStudios/Custom-Metaboxes-and-Fields-for-WordPress), which is a fantastic resource for attaching custom metadata to posts and custom post types.

#### Dave's WordPress Live Search
This plugin allows for live filtering of all documents in the Control Panel via the search in the upper-right-hand corner of the website.

#### MainWP Dashboard
Control plugin for MainWP, described above.

#### Stream
Not required, but provides a useful list of actions performed by members of your team. Create a login for each person working on the website and see their activity.

#### WP-SCSS
This theme is built with the Bones starter theme, which uses SCSS to generate styles. If you won't be changing styles, this plugin is not required.

#### WP User Avatar
Allows attaching non-gravatar images to users. Checklists will display this image next to items that a user has completed.

### Roadmap
Optimize Worldwide is not a software development company, but we have a few goals for this theme that will subsume other tasks we use older technology for currently.

#### User Guides
Automatically generate WordPress user guides for clients, depending on website features. Contains instructions for laymen on how to log in, create & edit posts, manage an online store, &c.

#### Project management
Currently we use Trello for project management, but integrating a task-management system into our internal website will help us keep track of project statuses more than simple checklists.

#### Internal communication
Instead of sending emails around the office with industry-relevant links, we hope to have an internal message-board system that allows team members to post relevant information for everyone to see.


Built with [Bones](http://themble.com/bones/). Love to Eddie Machado for developing & releasing this fantastic starter theme into the open-source environment.

Primary development by [Tyler Shuster](https://github.com/herrshuster).