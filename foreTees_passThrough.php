<?php
/**
* Plugin Name: ForeTees Member Pass-Through
* Plugin URI: https://github.com/FreshyMichael/ForeTees_passThrough
* Description: Add a Description
* Version: 1.0.0
* Author: FreshySites
* Author URI: https://freshysites.com/
* License: GNU v3.0
*/

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

/* ForeTees Member Pass-Through Start */
//______________________________________________________________________________


function fortees_passThru_function(){

		$current_user = wp_get_current_user();
		$user_name= esc_html( $current_user->user_login );
		/*Golf Login Form*/
		echo "<form action='https://www1.foretees.com/v5/servlet/Login' method='POST' target='_blank'><div class='hiddenPassThrough' style='display:none;'><input type='text' id='clubname' name='clubname' value='binghamtoncc'><input type='text' id='user_name' name='user_name' value='$user_name'><input type='text' id='activity' name='activity' value='0'><input type='text' id='caller' name='caller' value='PDG4735'></div><input type='submit' class='ft_lgn_bttn' value='ForeTees Login'></form>";
			
	}

add_shortcode('fortees_passThru', 'fortees_passThru_function');
/* Plugin Styles */
function foreTees_styles() {
    wp_enqueue_style('foreTees_styles', plugin_dir_url(__FILE__) . 'includes/foretees_styles.css', false, '1.0.0', 'all');
}
add_action( 'wp_enqueue_scripts', 'foreTees_styles' );
//______________________________________________________________________________
// All About Updates

//  Begin Version Control | Auto Update Checker
require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
// ***IMPORTANT*** Update this path to New Github Repository Master Branch Path
	'https://github.com/FreshyMichael/ForeTees_passThrough',
	__FILE__,
// ***IMPORTANT*** Update this to New Repository Master Branch Path
	'ForeTees_passThrough'
);
//Enable Releases
$myUpdateChecker->getVcsApi()->enableReleaseAssets();
//Optional: If you're using a private repository, specify the access token like this:
//
//
//Future Update Note: Comment in these sections and add token and branch information once private git established
//
//
//$myUpdateChecker->setAuthentication('your-token-here');
//Optional: Set the branch that contains the stable release.
//$myUpdateChecker->setBranch('stable-branch-name');

//______________________________________________________________________________
/* ForeTees Member Pass-Through End */
?>
