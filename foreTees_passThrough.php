<?php
/**
* Plugin Name: ForeTees Member Pass-Through
* Plugin URI: https://github.com/FreshyMichael/ForeTees_passThrough
* Description: Creates ForeTees Member ID Meta Field, and pass through form function - [foretees_passThru]
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

// Member Meta Field

add_action( 'show_user_profile', 'foreTees_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'foreTees_show_extra_profile_fields' );

function foreTees_show_extra_profile_fields( $user ) { ?>

	<h3>ForeTees Membership Information</h3>

	<table class="form-table">

		<tr>
			<th><label for="memberID">Member ID</label></th>

			<td>
				<input type="text" name="memberID" id="memberID" value="<?php echo esc_attr( get_the_author_meta( 'memberID', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Please enter your Member ID for ForeTees.</span>
			</td>
		</tr>

	</table>
<?php }

add_action( 'personal_options_update', 'foreTees_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'foreTees_save_extra_profile_fields' );

function foreTees_save_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	/* Copy and paste this line for additional fields. Make sure to change 'memberID' to the field ID. */
	update_usermeta( $user_id, 'memberID', $_POST['memberID'] );
}



//Short Code Start
add_shortcode('foretees_passThru', 'foretees_passThru_function');
function foretees_init(){
function foretees_passThru_function(){
		//Get the current Username
		$current_user = wp_get_current_user();
		$meta_key = 'memberID';
		$user_name = get_the_author_meta( $meta_key, $user_id );

		/*Golf Login Form*/
		echo "<div id='foreteesForm' style='max-width:80%;padding-left:10%;'><form action='https://www1.foretees.com/v5/servlet/Login' method='POST' target='_blank'><select id='activity' name='Activity' style='padding:8px 15px 8px 15px;'><option value=''>Select Activity...</option><option value='0'>Golf</option><option value='9999'>Dining/Events</option></select><div class='hiddenPassThrough' style='display:none;'><input type='text' id='clubname' name='clubname' value='binghamtoncc'><input type='text' id='user_name' name='user_name' value='$user_name'><input type='text' id='caller' name='caller' value='PDG4735'></div><input type='submit' name='Submit' class='ft_lgn_bttn' value='ForeTees Login'></form></div>";

	}
}
add_action('init', 'foretees_init');



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
