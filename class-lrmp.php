<?php
class lrmp_registration_form
{
     
        // form properties
        private $username;
        private $email;
        private $password;
        private $website;
        private $first_name;
        private $last_name;
        private $nickname;
        private $bio;

    	function __construct()
    {
        add_shortcode('lrmp_registration_form', array($this, 'shortcode'));	
        add_action('wp_enqueue_scripts', array($this, 'cflrf_flat_ui_kit'));
    }
    public function registration_form()
        {
            require_once('/registration_form.php');
     
            ?>
            
     

            
        <?php
        }
    	function validation()
        {
     
            if (empty($this->username) || empty($this->password) || empty($this->email)) {
                return new WP_Error('field', 'Required form field is missing');
            }
     
            if (strlen($this->username) < 4) {
                return new WP_Error('username_length', 'Username too short. At least 4 characters is required');
            }
     
            if (strlen($this->password) < 5) {
                return new WP_Error('password', 'Password length must be greater than 5');
            }
     
            if (!is_email($this->email)) {
                return new WP_Error('email_invalid', 'Email is not valid');
            }
     
            if (email_exists($this->email)) {
                return new WP_Error('email', 'Email Already in use');
            }
     
            if (!empty($website)) {
                if (!filter_var($this->website, FILTER_VALIDATE_URL)) {
                    return new WP_Error('website', 'Website is not a valid URL');
                }
            }
     
            $details = array('Username' => $this->username,
                'First Name' => $this->first_name,
                'Last Name' => $this->last_name,
                'Nickname' => $this->nickname,
                'bio' => $this->bio
            );
     
            foreach ($details as $field => $detail) {
                if (!validate_username($detail)) {
                    return new WP_Error('name_invalid', 'Sorry, the "' . $field . '" you entered is not valid');
                }
            }
     
        }
    	function registration()
    {
     
        $userdata = array(
            'user_login' => esc_attr($this->username),
            'user_email' => esc_attr($this->email),
            'user_pass' => esc_attr($this->password),
            'user_url' => esc_attr($this->website),
            'first_name' => esc_attr($this->first_name),
            'last_name' => esc_attr($this->last_name),
            'nickname' => esc_attr($this->nickname),
            'description' => esc_attr($this->bio),
        );
     
        if (is_wp_error($this->validation())) {
            echo '<div style="margin-bottom: 6px" class="btn btn-block btn-lg btn-danger">';
            echo '<strong>' . $this->validation()->get_error_message() . '</strong>';
            echo '</div>';
        } else {
            $register_user = wp_insert_user($userdata);
            if (!is_wp_error($register_user)) {
     
                echo '<div style="margin-bottom: 6px" class="btn btn-block btn-lg btn-danger">';
                echo '<strong>Registration complete.</strong>';
                echo '</div>';
            } else {
                echo '<div style="margin-bottom: 6px" class="btn btn-block btn-lg btn-danger">';
                echo '<strong>' . $register_user->get_error_message() . '</strong>';
                echo '</div>';
            }
        }
     
    }
    function shortcode()
        {
     
            ob_start();
     
            if ($_REQUEST['reg_submit']) {
                $this->username = $_REQUEST['reg_name'];
                $this->email = $_REQUEST['reg_email'];
                $this->password = $_REQUEST['reg_password'];
                $this->website = $_REQUEST['reg_website'];
                $this->first_name = $_REQUEST['reg_fname'];
                $this->last_name = $_REQUEST['reg_lname'];
                $this->nickname = $_REQUEST['reg_nickname'];
                $this->bio = $_REQUEST['reg_bio'];
     
                $this->validation();
                $this->registration();
            }
     
            $this->registration_form();
            return ob_get_clean();
        }
    	function cflrf_flat_ui_kit()
    {
        wp_enqueue_style('bootstrap-css', plugins_url('bootstrap/css/bootstrap.css', __FILE__), false, false, 'screen');
        wp_enqueue_style('flat-ui-kit', plugins_url('css/flat-ui.css', __FILE__), false, false, 'screen');
     
    }
}