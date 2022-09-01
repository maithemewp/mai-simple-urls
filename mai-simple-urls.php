<?php
/**
 * Plugin Name: Mai Simple URLs
 * Plugin URI: https://bizbudding.com
 * Description: Simple URLs is a complete URL management system that allows you create, manage, and track outbound links from your site by using custom post types and 301 redirects.
 * Author: BizBudding
 * Author URI:  https://bizbudding.com
 * Version: 1.0.0

 * Text Domain: mai-simple-urls
 * Domain Path: /languages

 * License: GNU General Public License v2.0 (or later)
 * License URI: http://www.opensource.org/licenses/gpl-license.php
 *
 * @package mai-simple-urls
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SIMPLE_URLS_DIR', plugin_dir_path( __FILE__ ) );
define( 'SIMPLE_URLS_URL', plugins_url( '', __FILE__ ) );

require_once SIMPLE_URLS_DIR . '/includes/class-simple-urls.php';

new Simple_Urls();

if ( is_admin() ) {
	require_once SIMPLE_URLS_DIR . '/includes/class-simple-urls-admin.php';
	new Simple_Urls_Admin();
}
