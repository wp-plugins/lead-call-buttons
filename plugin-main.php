<?php
/*
Plugin Name: Lead Call Buttons
Plugin URI: http://getyoursmartsiteon.com
Description: Make it easy for website visitors to reach you. When enabled adds customizable buttons to the mobile view of the website, i.e. Call, Map, Schedule.
Author: Team Smart Site
Author URI: http://getyoursmartsiteon.com
Version: 1.0.3
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
        add_action( 'admin_menu', array(&$this, 'admin_menu') );
        add_filter( 'plugin_action_links', array(&$this, 'settings_link'), 10, 2);
        
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
        $page_hook = add_options_page( __( 'Lead Call Buttons', $this->frame_work ), __( 'Lead Call Buttons', $this->frame_work ), 'manage_options', 'lead_call_buttons', array(&$this, 'settings_page') );
    }
       
    function settings_link($links, $file) {
    	static $this_plugin;
    	if (!$this_plugin) $this_plugin = plugin_basename(__FILE__);
     
    	if ($file == $this_plugin){
    		$settings_link = '<a href="admin.php?page=lead_call_buttons">'.__("Settings").'</a>';
    		array_unshift($links, $settings_link);
    	}
    	return $links;
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