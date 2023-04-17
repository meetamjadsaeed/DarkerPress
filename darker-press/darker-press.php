<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://#
 * @since             1.0.0
 * @package           Darker_Press
 *
 * @wordpress-plugin
 * Plugin Name:       Darker Press
 * Plugin URI:        #
 * Description:       Experience your website in a whole new way with our dark mode plugin for WordPress. Switch to a sleek, modern design that's easy on the eyes and perfect for browsing in low light conditions. With customizable settings and a simple installation process, it's never been easier to give your visitors the ultimate user experience.
 * Version:           1.0.0
 * Author:            Amjad Saeed
 * Author URI:        https://github.com/meetamjadsaeed
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       darker-press
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('DARKER_PRESS_VERSION', '1.0.0');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-darker-press-activator.php
 */
function activate_darker_press()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-darker-press-activator.php';
	Darker_Press_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-darker-press-deactivator.php
 */
function deactivate_darker_press()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-darker-press-deactivator.php';
	Darker_Press_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_darker_press');
register_deactivation_hook(__FILE__, 'deactivate_darker_press');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-darker-press.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_darker_press()
{

	$plugin = new Darker_Press();
	$plugin->run();
}
run_darker_press();



// Register shortcode
function darker_press_shortcode()
{
	return ' <div class="darkmode-wrapper">
	<div class="darkmode">
		<input type="checkbox" class="dark-checkbox" id="dark-checkbox">
		<label for="dark-checkbox" class="dark-label">
			<i class="fas fa-moon darkmode-moon"></i>
			<i class="fas fa-sun darkmode-sun"></i>
			<div class="dark-mode-ball"></div>
		</label>
	</div>
</div>';
}
add_shortcode('darker_press', 'darker_press_shortcode');
