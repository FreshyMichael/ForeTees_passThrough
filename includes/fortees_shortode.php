function fortees_passThru_function(){

		$current_user = wp_get_current_user();
		$user_name= esc_html( $current_user->user_login );
		/*Golf Login Form*/
		echo "<form action='https://www1.foretees.com/v5/servlet/Login' method='POST' target='_blank'><div class='hiddenPassThrough' style='display:none;'><input type='text' id='clubname' name='clubname' value='binghamtoncc'><input type='text' id='user_name' name='user_name' value='$user_name'><input type='text' id='activity' name='activity' value='0'><input type='text' id='caller' name='caller' value='PDG4735'></div><input type='submit' class='ft_lgn_bttn' value='ForeTees Login'></form>";
			
	}

add_shortcode('fortees_passThru', 'fortees_passThru_function');
