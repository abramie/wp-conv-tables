<?php
// /wp-content/plugins/conv_tables/includes/class-conv_tables.php
class Conv_Tables
{
    const ID = 'conv-tables';
	
	
	protected $views = array(
        'view0' => 'views/view0',
        //'view1' => 'views/view1',
        //'view2' => 'views/view2',
       // 'alerts' => 'views/alerts',
       // 'not-found' => 'views/not-found'
    );
	
	private $default_values = array();
    private $current_page = '';
    public function init()
    {
        add_action('admin_menu', array($this, 'add_menu_page'), 20);
    }
    public function get_id()
    {
        return self::ID;
    }
    public function add_menu_page()
    {
        add_menu_page(
            esc_html__('My menu section', 'ct-admin'),
            esc_html__('My menu section test', 'ct-admin'),
            'manage_options',
            'test',
            array( $this, 'my_custom_menu_page'),
            'dashicons-admin-page'
        );
       /* add_submenu_page(
            $this->get_id(),
            esc_html__('Submenu', 'ct-admin'),
            esc_html__('Submenu', 'ct-admin'),
            'manage_options',
            $this->get_id() . '_view1',
            array(&$this, 'load_view')
        );*/
    }
	/**
 * Display a custom menu page
 */
	public function my_custom_menu_page(){
		
		$this->current_page = 'view0';
		$current_views = isset($this->views[$this->current_page]) ? $this->views[$this->current_page] : $this->views['not-found'];
		echo '<div class="ct-admin-forms ' . $this->current_page . '">';

        echo '<div class="container container1">';
        echo '<div class="inner">';

        $this->includeWithVariables(ct_admin_template_server_path('views/alerts', false));

        $this->includeWithVariables(ct_admin_template_server_path($current_views, false));

        echo '</div>';
        echo '</div>';

        echo '</div> <!-- / ct-admin-forms -->';
		
		return esc_html_e( 'Admin Page Test', 'textdomain' );	
	}
	
	function includeWithVariables($filePath, $variables = array(), $print = true)
    {
        $output = NULL;
        if (file_exists($filePath)) {
            // Extract the variables to a local namespace
            extract($variables);

            // Start output buffering
            ob_start();

            // Include the template file
            include $filePath;

            // End buffering and return its contents
            $output = ob_get_clean();
        }
        if ($print) {
            print $output;
        }
        return $output;

    }
}
