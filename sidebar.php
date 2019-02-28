<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.1
 */
if ( is_active_sidebar( 'sidebar-principal' ) ) :

	echo '<aside id="sidebar">';
		dynamic_sidebar( 'sidebar-principal' );
	echo '</aside>';

endif;