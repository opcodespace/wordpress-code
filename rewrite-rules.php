<?php
/**
 * Add rewrite tags
 *
 * @link https://codex.wordpress.org/Rewrite_API/add_rewrite_tag
 */
function myplugin_rewrite_tag() {
	add_rewrite_tag( '%state%', '([^&]+)' );
	add_rewrite_tag( '%postcode%', '([^&]+)' );
	add_rewrite_tag( '%suburb%', '([^&]+)' );
	add_rewrite_tag( '%lender%', '([^&]+)' );
	add_rewrite_tag( '%productname%', '([^&]+)' );
}
add_action('init', 'myplugin_rewrite_tag', 10, 0);

/**
 * Add rewrite rules
 *
 * @link https://codex.wordpress.org/Rewrite_API/add_rewrite_rule
 */
function myplugin_rewrite_rule() {
	# herobroker.org/au/state/postcode/lender/productname
	add_rewrite_rule( '^au/([^/]*)/([^/]*)/([^/]*)/homeloan/([^/]*)/([^/]*)/?', 'index.php?pagename=homeloans&state=$matches[1]&postcode=$matches[2]&suburb=$matches[3]&lender=$matches[4]&productname=$matches[5]','top' );
}
add_action('init', 'myplugin_rewrite_rule', 10, 0);


# on page 
global $wp_query;
print_r($wp_query->query['state']);
print_r($wp_query->query['postcode']);
print_r($wp_query->query['lender']);
print_r($wp_query->query['productname']);
