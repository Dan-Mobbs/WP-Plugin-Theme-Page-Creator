<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              Theme Page Creator
 * @since             1.0.0
 * @package           Theme Page Creator
 *
 * @wordpress-plugin
 * Plugin Name:       Theme Page Creator
 * Plugin URI:        #
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Dan Mobbs
 * Author URI:        da
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       Theme Page Creator
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

function create_page_if_null($target){
    if ( get_page_by_title($target) == null ) {
        create_page($target);
    }
}

function checkPageExcists() 
{
   create_page_if_null('Home');
   create_page_if_null('About');
   create_page_if_null('Blog');
   create_page_if_null('Contact');
   
}
add_action('init', 'checkPageExcists');

function create_page($pageName) 
{
    $createPages = array(
        'post_title'    => $pageName,
        'post_content'  => 'Starter Content', 
        'post_status'   => 'draft',
        'post_author'   => 1,
        'post_type'     => 'page',
        'post_name'     => $pageName
    );

    wp_insert_post( $createPages);        
}

// 1. Make them into a class!
// 2. Streamline code!
// 
