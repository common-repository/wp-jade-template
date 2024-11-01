=== WP Jade Template ===
Contributors: xingxing
Tags: page, jade, template, advanced
Requires at least: 3.0.0
Tested up to: 3.9
License: GPLv2 or later



== Description ==

WP Jade Template enables to use jade template engine for the wordpress theme's template files.
To override the default template with Jade format, Just create a Jade Template and add the '.jade' before '.php' to its original name.

index.php
index.jade.php

single.php
single.jade.php

page-contact.jade.php
page-aboutus.jade.php
...

The overrided Jade Template will serve if it exists.

= Jade template examples =

index.jade.php:

<pre>
- get_header();
div#content
  div Hello world
- get_footer();
</pre>

To use jade header and footer:
<pre>
//rendering header-main.jade.php and footer-main.jade.php
- get_header('main.jade');
div#content
  div Hello world
- get_footer('main.jade');
</pre>

Page template example:
<pre>
//
// Template Name: Contact Page
//
- get_header();
- the_post();
div#content
  - the_content();
- get_footer();
</pre>




== Installation ==

1. Upload 'wp-jade-template' to the '/wp-content/plugins/' directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Thats it! Try to override some template files as jade templates (.jade.php)




== Changelog ==

= 1.0.2 =
* Description update

= 1.0.1 =
* Description update

= 1.0.0 =
* WP Jade Template