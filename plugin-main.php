<?php
/*
Plugin Name: Lead Call Buttons
Plugin URI: http://getyoursmartsiteon.com
Description: When enabled adds Lead Call buttons to the mobile view of the website. The button icon, text, and link is configurable from plugin-settings.
Author: Team Smart Site
Author URI: http://getyoursmartsiteon.com
Version: 1.0.0
*/


/* Adding Latest jQuery from Wordpress */
function lead_call_button_latest_jquery() {
	wp_enqueue_script('jquery');
}

add_action('init', 'lead_call_button_latest_jquery');

/* Main Class */
class LCBMain {

    private $plugin_path;
    private $plugin_url;
    private $frame_work;
    private $LCB;

    function __construct() {	
        
        $this->plugin_path = plugin_dir_path( __FILE__ );
        $this->plugin_url = plugin_dir_url( __FILE__ );
        $this->frame_work = 'lead-call-button-frame';
        add_action( 'admin_menu', array(&$this, 'admin_menu'), 99 );
        
        // Create New Framework
        require_once( $this->plugin_path .'lead-call-button-frame.php' );
		
		// Set Up
		define('LEAD_CALL_BUTTON_HOOK', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
		wp_enqueue_style('lead_call_button_css', LEAD_CALL_BUTTON_HOOK.'css/plugin-main.css');

		function lead_call_button_active_hook() {
			include_once( 'lead-call-buttons.php' );
		}
		add_action('wp_footer', 'lead_call_button_active_hook');
		
		function lead_call_button_font_awesome_css() {?>
			<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet"/>		
		<?php
		}
		add_action('wp_head', 'lead_call_button_font_awesome_css');
		
		function lead_call_button_custom_css() {?>
			<style type="text/css">
				<?php echo LCB_get_setting( 'lead_call_buttons', 'general', 'custom-css' ); ?>
			</style>		
		<?php
		}
		add_action('wp_head', 'lead_call_button_custom_css');
		
        $this->LCB = new LCB_setting( $this->plugin_path .'settings/lead-call-button-settings-general.php' );
        // Add an optional settings validation filter (recommended)
        add_filter( $this->LCB->get_option_group() .'_settings_validate', array(&$this, 'validate_settings') );
    }
    
    function admin_menu(){
        $page_hook = add_menu_page( __( 'Lead Call Buttons', $this->frame_work ), __( 'Lead Call Buttons', $this->frame_work ), 'update_core', 'Lead Call Buttons', array(&$this, 'settings_page') );
        add_submenu_page( 'LCB', __( 'Settings', $this->frame_work ), __( 'Settings', $this->frame_work ), 'update_core', 'LCB', array(&$this, 'settings_page') );
    }
    
    function settings_page(){	    
	    ?>
		<div class="wrap">
			<div id="icon-options-general" class="icon32"></div>
			<h2>Lead Call Buttons Settings</h2>
			<?php 
			// Output your settings form
			 $this->LCB->settings(); 
			?>
		</div>
		<?php
	}
	
	function validate_settings( $input ){
    	return $input;
	}
}

new LCBMain();

?>