<?php 

/**
 * If not logged in redirect to another page
 * @return type
 */
function redirect_from_mission()
{
	if(!is_user_logged_in() && is_page( 'mission-control' )){
		wp_redirect("/login-page/");
		exit();
	}
}
add_action( 'template_redirect', 'redirect_from_mission', 10, 1 );
