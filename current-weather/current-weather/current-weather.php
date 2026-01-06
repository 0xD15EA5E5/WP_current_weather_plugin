<?php 
/*
 * Plugin Name: Current weather - Coding test
 * Description: Coding test that displays the current temp and description via a shortcode [Markweather]
 * Version: 1.0
 * Author: Mark Richardson
 */

define( 'CURRENTWEATHER__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once CURRENTWEATHER__PLUGIN_DIR . 'class.current-weather.php';
require_once CURRENTWEATHER__PLUGIN_DIR . 'class.current-weather-admin.php';
require_once CURRENTWEATHER__PLUGIN_DIR . 'class.current-weather-api.php';

register_activation_hook( __FILE__, array('Markweather', 'plugin_activation'));
register_deactivation_hook( __FILE__, array( 'Markweather', 'plugin_deactivation' ) );

add_shortcode('weather_widget', array('Markweather', 'displayweather'));

add_action( 'admin_init', array('Markweather_Admin', 'settings_init') );
add_action( 'admin_menu', array('Markweather_Admin', 'currentweather_options_page') );
