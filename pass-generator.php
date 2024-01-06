<?php
/*
Plugin Name: Faith PassGenerator
Description: A simple password generator. The Password Generator plugin allows you to easily generate random passwords on your WordPress site. 
Version: 1.0
Author: Md Abdullah Al Arif
*/

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

// Enqueue styles and scripts
function enqueue_password_generator_scripts() {
    wp_enqueue_style('password-generator-style', plugins_url('style.css', __FILE__), array(), '1.0');
    wp_enqueue_script('password-generator-script', plugins_url('password-generator.js', __FILE__), array('jquery'), '1.0', true);

    // Pass variables to JavaScript
    wp_localize_script('password-generator-script', 'password_generator_vars', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_password_generator_scripts');
add_action('admin_enqueue_scripts', 'enqueue_password_generator_scripts');

if ( ! function_exists( 'password_generator_shortcode' ) ){
function password_generator_shortcode() {
    ob_start();
    ?>
    <div class="container">
        <h1>Generate your random password</h1>
        <div class="display">
            <input type="text" id="password" placeholder="password" />
            <img src="<?php echo esc_url(plugins_url('images/copy.png', __FILE__)); ?>" alt="" onclick="passwordGeneratorCopyPassword();" />
        </div>
        <div class="button-area">
            <button onclick="passwordGeneratorCreatePassword();">
                <img src="<?php echo esc_url(plugins_url('images/generate.png', __FILE__)); ?>" alt="" />Generate password
            </button>
            <button onclick="passwordGeneratorResetPassword();">Reset password</button>
        </div>
    </div>
    <?php
    return ob_get_clean();
}}
add_shortcode('password_generator', 'password_generator_shortcode');


if ( ! function_exists( 'password_generator_settings_page' ) ){
function password_generator_settings_page() {
    ?>
    <div class="wrap">
        <h1>Password Generator Settings</h1>
        <p>Insert the following shortcode into your page or post to display the password generator:</p>
        <code>[password_generator]</code>
        <hr>
       
        <div class="container">
            <h3>Generate your random password</h3>
            <div class="display">
                <input type="text" id="settings-password" placeholder="password" />
                <img src="<?php echo esc_url(plugins_url('images/copy.png', __FILE__)); ?>" alt="" onclick="settingsPasswordGeneratorCopyPassword();" />
            </div>
            <div class="button-area">
                <button onclick="settingsPasswordGeneratorCreatePassword();">
                    <img src="<?php echo esc_url(plugins_url('images/generate.png', __FILE__)); ?>" alt="" />Generate password
                </button>
                <button onclick="settingsPasswordGeneratorResetPassword();">Reset password</button>
            </div>
        </div>
    </div>
    <?php
}}
if ( ! function_exists( 'wporg_init' ) ){
function password_generator_add_settings_link($links) {
    $settings_link = '<a href="options-general.php?page=password-generator-settings">Settings</a>';
    array_push($links, $settings_link);
    return $links;
}}
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'password_generator_add_settings_link');

if ( ! function_exists( 'wporg_init' ) ){
function password_generator_add_settings_page() {
    add_options_page('Password Generator Settings', 'Password Generator', 'manage_options', 'password-generator-settings', 'password_generator_settings_page');
}}
add_action('admin_menu', 'password_generator_add_settings_page');
?>