<?php

/* Plugin Name: NECMINSA CUSTOM DEV
 * Description: PLUGIN CUSTOMIZADO DE FUNCIONALIDAD PARA NECMINSA
 * Version: 1.0
 * Author: Antonio Zambrano
 * Author URI: http://obser.co
 */


define('geekshat_plugin_dir', plugin_dir_path( __FILE__ ));
define('geekshat_plugin_url', plugin_dir_url( __FILE__ ));

if ( defined( 'ABSPATH' ) && ! defined( 'RWMB_VER' ) ) {
	require_once geekshat_plugin_dir . '/includes/plugins/meta-box/meta-box.php';
}

	require_once geekshat_plugin_dir . '/includes/plugins/meta-box/addons/meta-box-conditional-logic/meta-box-conditional-logic.php';
	require_once geekshat_plugin_dir . '/includes/plugins/meta-box/addons/meta-box-columns/meta-box-columns.php';
	require_once geekshat_plugin_dir . '/includes/plugins/meta-box/addons/meta-box-group/meta-box-group.php';
	require_once geekshat_plugin_dir . '/includes/plugins/meta-box/addons/meta-box-tabs/meta-box-tabs.php';
	require_once geekshat_plugin_dir . '/convocatorias.php';
	require_once geekshat_plugin_dir . '/settings.php';

function wpse_89494_enqueue_scripts() {
  wp_enqueue_style( 'necminsa',  geekshat_plugin_url. '/includes/necminsa.css' );
}

add_action( 'wp_enqueue_scripts', 'wpse_89494_enqueue_scripts' );