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



/**
 * Page Visibility in wp admin as per user role
 * @return type
 */
function exclude_this_page($query)
{
    global $current_user;
    $user_roles = $current_user->roles;

    //Ids of pages to be excluded
    $excluded_pages = [];

    global $pagenow;

    if ('edit.php' == $pagenow && (get_query_var('post_type') && 'page' == get_query_var('post_type'))) {
        if (in_array('webmaster', $user_roles)) {
            $query->set('post__not_in', $excluded_pages);
        }
    }
    return $query;
}
add_action('pre_get_posts', 'exclude_this_page');


/**
 * Add sub menu on top under dash
 * @return type
 */
function my_plugin_menu() {
    add_dashboard_page('Webmaster - Log out', 'Logout', 'read', 'webmaster', 'callbackfunc');
}
add_action('admin_menu', 'my_plugin_menu');

/**
 * Callback function
 * @return type
 */
function callbackfunc()
{
  wp_logout();
  wp_redirect( home_url(), 302 );
}
