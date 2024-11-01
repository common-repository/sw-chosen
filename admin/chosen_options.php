<?php
//
if(isset($_POST['submit'])){
	update_option('sw_chosen_selector', $_POST['sw_chosen_selector']);

	if(isset($_POST['sw_chosen_apply_to_admin'])){
		update_option('sw_chosen_apply_to_admin', true);
	}else{
		update_option('sw_chosen_apply_to_admin', false);
	}
	if(isset($_POST['sw_chosen_apply_to_front'])){
		update_option('sw_chosen_apply_to_front', true);
	}else{
		update_option('sw_chosen_apply_to_front', false);
	}
	
}

$selector = get_option('sw_chosen_selector');
$apply_to_admin = get_option('sw_chosen_apply_to_admin');
$apply_to_front = get_option('sw_chosen_apply_to_front');


?>
<style>
	input[type="text"]{
		display:block;
	}
</style>

<h1>SW Chosen Settings</h1>
<form action="" method="post">
	<div>
		<label for="sw_chosen_selector">jQuery/CSS selector to apply chosen to:</label>
		<input type="text" name="sw_chosen_selector" value="<?php echo (!empty($selector)) ? $selector : '' ?>"  />
		<em>e.g. To apply Chosen to all select element with a class named "chosen", type in "select.chosen" (without the quotation marks). Defaults to all select elements</em>
	</div>
	
	<div>
		<label for="sw_chosen_apply_to_admin">Apply Chosen to admin pages? </label>
		<input type="checkbox" name="sw_chosen_apply_to_admin" <?php echo ($apply_to_admin) ? 'checked="checked"':'' ?> />
	</div>
	
	<div>
		<label for="sw_chosen_apply_to_front">Apply Chosen to public pages? </label>
		<input type="checkbox" name="sw_chosen_apply_to_front" <?php echo ($apply_to_front) ? 'checked="checked"':'' ?> />
	</div>
	
	<div>
		<button type="submit" name="submit" class="button button-primary">Save</button>
	</div>
</form>


<?php /*
echo '<h2>SW Chosen Settings</h2>';

open_form();

echo '<div>';
create_input_field('text', 'sw_chosen_selector', 'jQuery selector to apply chosen to: ','',$selector,false);
echo '(default to all select boxes)</div>';



create_input_field('checkbox', 'sw_chosen_apply_to_admin', 'Apply Chosen to admin pages? ','', '', false, ($apply_to_admin) ? 'checked="checked"':'',true, 'form-control','','');


create_input_field('checkbox', 'sw_chosen_apply_to_front', 'Apply Chosen to public pages? ','', '', false, ($apply_to_front) ? 'checked="checked"':'',true, 'form-control','','');


create_button('submit','Save','','name="submit" class="button button-primary"','<div>','</div>');
close_form();

*/

