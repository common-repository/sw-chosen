<?php 
// create custom plugin settings menu
add_action('admin_menu', 'sw_chosen_admin_menu');




function sw_chosen_admin_menu() {
	//create new top-level menu
	add_submenu_page('options-general.php','SW Chosen Settings', 'SW Chosen Settings', 'manage_options', 'sw_chosen_settings', 'sw_chosen_settings_page', '');
}



function sw_chosen_settings_page() {
	require_once(dirname(__FILE__).'/chosen_options.php');
}

?>