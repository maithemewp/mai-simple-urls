<?php
/**
 * Plugin Name: Mai Simple URLs
 * Plugin URI: https://bizbudding.com
 * GitHub Plugin URI: maithemewp/mai-simple-urls
 * Description: Mai Simple URLs is a fork of the original Simple URLs plugin from StudioPress, before it became Lasso. It's a complete URL management system that allows you create, manage, and track outbound links from your site by using custom post types and 301 redirects.
 * Author: BizBudding
 * Author URI:  https://bizbudding.com
 * Version: 1.0.2
 *
 * Text Domain: simple-urls
 * Domain Path: /languages

 * License: GNU General Public License v2.0 (or later)
 * License URI: http://www.opensource.org/licenses/gpl-license.php
 *
 * @package simple-urls
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Must be at the top of the file.
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

define( 'MAI_SIMPLE_URLS_DIR', plugin_dir_path( __FILE__ ) );
define( 'MAI_SIMPLE_URLS_URL', plugins_url( '', __FILE__ ) );

// Include vendor libraries.
require_once __DIR__ . '/vendor/autoload.php';

add_action( 'plugins_loaded', 'mai_surls_updater' );
/**
 * Setup the updater.
 * composer require yahnis-elsts/plugin-update-checker
 *
 * @since 1.0.0
 *
 * @uses https://github.com/YahnisElsts/plugin-update-checker/
 *
 * @return void
 */
function mai_surls_updater() {
	// Bail if plugin updater is not loaded.
	if ( ! class_exists( 'YahnisElsts\PluginUpdateChecker\v5\PucFactory' ) ) {
		return;
	}

	// Setup the updater.
	$updater = PucFactory::buildUpdateChecker( 'https://github.com/maithemewp/mai-simple-urls/', __FILE__, 'simple-urls' );

	// Maybe set github api token.
	if ( defined( 'MAI_GITHUB_API_TOKEN' ) ) {
		$updater->setAuthentication( MAI_GITHUB_API_TOKEN );
	}

	// Add icons for Dashboard > Updates screen.
	if ( function_exists( 'mai_get_updater_icons' ) && $icons = mai_get_updater_icons() ) {
		$updater->addResultFilter(
			function ( $info ) use ( $icons ) {
				$info->icons = $icons;
				return $info;
			}
		);
	}
}

add_action( 'plugins_loaded', 'mai_surls_run' );
/**
 * Runs plugin after checking if Lasso is already running.
 *
 * @since 1.0.0
 *
 * @return void
 */
function mai_surls_run() {
	if ( class_exists( 'Simple_Urls' ) ) {
		add_action( 'admin_notices', 'mai_surl_admin_notice' );
		return;
	}

	require_once MAI_SIMPLE_URLS_DIR . '/includes/class-simple-urls.php';

	new Mai_Simple_Urls();

	if ( is_admin() ) {
		require_once MAI_SIMPLE_URLS_DIR . '/includes/class-simple-urls-admin.php';
		new Mai_Simple_Urls_Admin();
	}
}

/**
 * Adds admin notice if Lasso is running.
 *
 * @since 1.0.0
 *
 * @return void
 */
function mai_surl_admin_notice() {
	printf( '<div class="notice notice-error is-dismissible"><p>%s&nbsp;&nbsp;<a class="button-primary" href="%s">%s</a></p></div>',
		__( 'Mai Simple URLs is a replacement for Simple URLs by Lasso. Please deactivate Simple URLs by Lasso in order to use Mai Simple URLs.', 'simple-urls' ),
		admin_url( 'plugins.php?s=Lasso+Lite' ),
		__( 'Deactivate Now', 'simple-urls' )
	);
}
