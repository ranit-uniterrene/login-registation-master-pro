<?php
/*
  Plugin Name: Login and Registration Master Pro
  Plugin URI: http://dropsofvisions.com/
  Description: Simple Plugin to add login and registrtion forms where you want. 

  Version: 1.0
  Author: Ranit Majumder
  Author URI: http://www.facebook.com/ranit.majumder
  License: GPL2
 */

//===========================================================


add_action('admin_menu','lmp_admin_menu');
    function lmp_admin_menu(){
        add_menu_page(
            'Login and Registration Master Pro v1.0', // page title
            'LRMP Options', // menu title
            'manage_options',// capability
            'login-settings',  // menu slug
            'lmp_dash' // callback function
        );
    }
    function lmp_dash()
    {  
        include('/dashboard_form.php');
    }

//==========================================================


add_action('admin_enqueue_scripts','dev_plugin_scripts');
    function dev_plugin_scripts(){
        
        wp_register_style('bootstrap', plugins_url( '/css/bootstrap.min.css' ,__FILE__));
        wp_register_style('custom', plugins_url( '/css/custom.css' ,__FILE__));
        wp_enqueue_style('bootstrap');
        wp_enqueue_style('custom');
    }

//===========================================================

//Including the registration form

 require_once('/class-lrmp.php');
    new lrmp_registration_form;


//===========================================================

// custom frontend login form

function lmp_login_form() {

    require_once('/custom_login_form.php');
 
}

function login_check( $username, $password ) {
    global $user;
    $creds = array();
    $creds['user_login'] = $username;
    $creds['user_password'] =  $password;
    $creds['remember'] = true;
    $user = wp_signon( $creds, false );
    if ( is_wp_error($user) ) {
    echo $user->get_error_message();
    }
    if ( !is_wp_error($user) ) {
    wp_redirect(home_url('wp-admin'));
    }
}
function login_check_process() {
    if (isset($_POST['login_submit'])) {
        login_check($_POST['login_name'], $_POST['login_password']);
    }
     
    lmp_login_form();
}
function lrmp_custom_ui_kit() {
    wp_enqueue_style('bootstrap-css', plugins_url('bootstrap/css/bootstrap.css', __FILE__));
    wp_enqueue_style('flat-ui-kit', plugins_url('css/flat-ui.css', __FILE__));
 
}

//===========================================================
 
add_action('wp_enqueue_scripts', 'lrmp_custom_ui_kit');
function lrmp_login_shortcode() {
// ob_start();
// login_check_process();
// return ob_get_clean();

    wp_login_form();
}

//===========================================================
 
add_shortcode('lrmp_login_form', 'lrmp_login_shortcode');