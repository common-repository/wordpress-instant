=== Plugin Name ===
Contributors: idesigneco
Donate link: http://wordpressinstant.com
Tags: search, instant, instant search
Requires at least: 2.9
Tested up to: 3.1

Instant search like Google Instant (TM) for WordPress. Attaches to WordPress's default searchbox, or your own custom search box. 

== Description ==

Instant search like Google Instant (TM) for WordPress. Attaches to WordPress's default searchbox, or your own custom search box. 

== Installation ==

1. Upload the `wpinstant` directory to your WordPress installation's `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress

## Usage
The plugin automatically attaches itself to the WordPress search box widget. Alternatively, you can enable instant search on any input box by adding the 'wpinstant' css class to it. For example, <input type="text" name="mysearch" class="wpinstant" />

To enable instant search on a page or post, simply add the [WPINSTANT] tag. This adds WordPress's search form and an instant results area in the page or post.

If you don't want the search box to appear and only the results area (for instance, to show results of search performed in a search widget), use the tag [WPINSTANT_RESULTS].

## PHP in templates
`<?php wpinstant_full(); ?>` prints the WordPress search form and the results area

`<?php wpinstant_container(); ?>` prints the results area

## Customization
The search results template can be customized by editing `template.php` and `wpinstant.css' in the plugin directory

== Screenshots ==

1. This screen shot description corresponds to screenshot-1.(png|jpg|jpeg|gif). Note that the screenshot is taken from
the directory of the stable readme.txt, so in this case, `/tags/4.3/screenshot-1.png` (or jpg, jpeg, gif)
2. This is the second screen shot

== Changelog ==

= 1.0 =
* First release