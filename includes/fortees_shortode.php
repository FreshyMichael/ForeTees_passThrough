function fortees_passThru_function(){
		//Get the current Username
		$current_user = wp_get_current_user();
		$user_name = esc_html( $current_user->user_login );
		
		/*Golf Login Form*/
		echo "<div id='foreteesForm' style='max-width:80%;padding-left:10%;'><form action='https://www1.foretees.com/v5/servlet/Login' method='POST' target='_blank'><select id='activity' name='Activity' style='padding:8px 15px 8px 15px;'><option value=''>Select Activity...</option><option value='0'>Golf</option><option value='9999'>Dining/Events</option></select><div class='hiddenPassThrough' style='display:none;'><input type='text' id='clubname' name='clubname' value='binghamtoncc'><input type='text' id='user_name' name='user_name' value='$user_name'><input type='text' id='caller' name='caller' value='PDG4735'></div><input type='submit' name='Submit' class='ft_lgn_bttn' value='ForeTees Login'></form></div>";
			
	}

add_shortcode('fortees_passThru', 'fortees_passThru_function');
