<?php
/*
Plugin Name: WordPress Instant
Plugin URI: http://wordpressinstant.com
Description: Enable instant, live search on your WordPress blog.
Version: 1.0
Author: iDesignEco
Author URI: http://idesigneco.com
License: GPL2
*/

	// add results container to posts
	define('WPINSTANT_RESULTS', '[WPINSTANT_RESULTS]');
	define('WPINSTANT_FULL', '[WPINSTANT]');
	define('WPINSTANT_URL', plugins_url().'/'.basename(dirname(__FILE__)).'/');

	// queue js
	wp_enqueue_script('wpinstant', WPINSTANT_URL.'wpinstant.js', array('jquery'));
	wp_enqueue_style('wpinstant', WPINSTANT_URL.'wpinstant.css');

	// hooks
	add_filter('the_content', 'wpinstant_replace');
	add_filter('widget_text', 'wpinstant_replace');
	add_action('get_header', 'wpinstant_search');

	// ________________________________________________________
	
	function wpinstant_replace($text = '') {
		$text = wpinstant_container(false, $text);
		$text = wpinstant_full(false, $text);
		
		return $text;
	}
	
	function wpinstant_container($print = true, $text = '') {
		$html = '<div class="wp-instant"><img src="'.WPINSTANT_URL.'load.gif" alt="Loading.." class="wpinstant-load" /><ul class="wpinstant-results"> </ul></div>';
		
		if($print)
			echo $html;
		else
			return str_replace(WPINSTANT_RESULTS, $html, $text);
	}
	
	function wpinstant_full($print = true, $text = '') {
		global $wp_search_form;
		
		ob_start();
		get_search_form();
		$wp_search_form = ob_get_contents();
		ob_end_clean();

		$html = $wp_search_form.'<div class="wp-instant"><img src="'.WPINSTANT_URL.'load.gif" alt="Loading.." class="wpinstant-load" /><ul class="wpinstant-results"> </ul></div>';

		if($print)
			echo $html;
		else
			return str_replace(WPINSTANT_FULL, $html, $text);
	}

	function wpinstant_search() {
		if(is_search() && isset($_GET['wpinstant'])) {
			include dirname(__FILE__).'/template.php';
			exit;
		}
	}


?>