<?php

/**
 * Fired during plugin activation
 *
 * @link       https://viitorcloud.com/
 * @since      1.0.0
 *
 * @package    Analytics_Code_Management
 * @subpackage Analytics_Code_Management/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Analytics_Code_Management
 * @subpackage Analytics_Code_Management/includes
 * @author     kinjal dalwadi <kinjal.dalwadi@iprojectlab.com>
 */
class Analytics_Code_Management_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		//Set Transist once pluign activated
		set_transient( '_welcome_screen_tab_activation_redirect_data', true, 30 );
	}

}
