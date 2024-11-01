<?php
/*
Plugin Name: SW Chosen
Plugin URI: http://seanwuapps.com/products/sw-chosen/
Description: Converts the select boxes of your WordPress site into Chosen autocomplete boxes
Version: 1.0
Author: Sean Wu
Author URI: http://www.seanwuapps.com/
License: GPL3
 
SW Chosen is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
any later version.
 
SW Chosen is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with SW Chosen. If not, see <http://www.gnu.org/licenses/>.
*/

/**
 * define chosen version
 */
define('sw_chosen_ver', '1.0');

require_once dirname(__FILE__).'/admin/admin.php';



$apply_to_admin = get_option('sw_chosen_apply_to_admin');
$apply_to_front = get_option('sw_chosen_apply_to_front');



function enqueue_chosen_scripts() {

	$selector_string = get_option('sw_chosen_selector');
	
	wp_enqueue_script('jquery');
	
	wp_enqueue_style( 'chosen.css', WP_PLUGIN_URL.'/sw-chosen/lib/chosen/chosen.min.css');
	wp_enqueue_script( 'chosen.js', WP_PLUGIN_URL. '/sw-chosen/lib/chosen/chosen.jquery.min.js', array('jquery'), '1.0.0', true );
	
	
	wp_enqueue_script('apply-chosen.js',WP_PLUGIN_URL. '/sw-chosen/js/apply-chosen.js' );
	
	if(empty($selector_string)){
		$selector_string = 'select';//default to apply to all select boxes
	}
	$selector_value = array('selectors' => $selector_string);
	wp_localize_script('apply-chosen.js', 'options', $selector_value);
	
}
if($apply_to_admin){
	add_action( 'admin_enqueue_scripts', 'enqueue_chosen_scripts' , 99);
}
if($apply_to_front){
	add_action( 'wp_enqueue_scripts', 'enqueue_chosen_scripts' , 99);
}