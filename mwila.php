<?php
/*
*Plugin Name: Script Manager
*Description: This allows you to add Scripts to your Header and Footer
*/


	// This gives users the option of adding header or footer scripts
	
	function fsi_admin_menu_option() {
    add_menu_page ('Header & Footer Scripts','Site Scripts','manage_options','fsi-admin-menu','fsi_scripts_page','',200);
	}

	add_action('admin_menu','fsi_admin_menu_option');

	// call back function
	function fsi_scripts_page() {

	if(array_key_exists('submit_scripts_update',$_POST)){

	update_option('fsi_header_scripts',$_POST['header_script']);
	update_option('fsi_footer_scripts',$_POST['footer_script']);
	?>
	<div id="setting-error-settigs_updated" class="updated settings-error notice-is-dismissable"><strong>Settings have been saved</strong> </div>

	<?php

	
	}

	$header_scripts = get_option('fsi_header_scripts','none');
	$footer_scripts = get_option('fsi_footer_scripts','none');

		?>
		<div class="wrap"> 
		<h2> Update Scripts on the header and footer</h2>
		<form method="post" action="">
		<label for="header_scripts">Header Scripts</label>
		<textarea name="header_script" class="large-text"><?php print $header_scripts;?></textarea>
		<label for="footer_scripts">Footer Scripts</label>
		<textarea name="footer_script" class="large-text"><?php print $footer_scripts;?></textarea>
		<br/><br/>
		<input type="submit" name="submit_scripts_update" class="button button-primary" value="UPDATE SCRIPTS"  >
		</form>
		</div>

	<?php 
	}

	// Display the entered scripts on to every page of website
	
	function fsi_display_header_scripts() {
		$header_scripts = get_option('fsi_header_scripts','none');
		print $header_scripts;
		}

	add_action('wp_head','fsi_display_header_scripts');

	function fsi_display_footer_scripts() {
		$footer_scripts = get_option('fsi_footer_scripts','none');
		print $footer_scripts;
	}

	add_action('wp_footer','fsi_display_footer_scripts');



?>   
 