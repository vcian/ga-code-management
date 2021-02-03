<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://viitorcloud.com/
 * @since      1.0.0
 *
 * @package    Analytics_Code_Management
 * @subpackage Analytics_Code_Management/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Analytics_Code_Management
 * @subpackage Analytics_Code_Management/public
 * @author     kinjal dalwadi <kinjal.dalwadi@iprojectlab.com>
 */
class Analytics_Code_Management_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Analytics_Code_Management_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Analytics_Code_Management_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/analytics-code-management-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Analytics_Code_Management_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Analytics_Code_Management_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/analytics-code-management-public.js', array( 'jquery' ), $this->version, false );

	}
	
	 /**
     * function for add analytics code in front view
     *
     */
    function add_custom_analytics_code() {
        global $wpdb, $post, $wp;

        //get analytics code option
        $get_analytic_settings = get_option(ACM_PLUGIN_GLOBAL_SETTING_KEY);
        //unserialize analytics code option
        $get_analytic_settings = maybe_unserialize($get_analytic_settings);
        //check analytics code not null or empty
        if (isset($get_analytic_settings['include_analytics_codes']) && !empty($get_analytic_settings['include_analytics_codes'])) {
            //add analytics code in fornt view ?>
		    <script>
             (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                 (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
                ga('create', '<?php echo esc_html($get_analytic_settings['include_analytics_codes']);?>', 'auto');
                ga('send', 'pageview');
            </script>
		   <?php
        }
    }
	

}
