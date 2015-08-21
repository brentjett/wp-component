<?php
/**
* WP_Component Class
* Base class for object-oriented component specification.
*/
class WP_Component extends WP_Widget {

    /**
    * @var string - short name for widget or shortcode.
    * Used as tag name for shortcodes: [my_handle]
    */
    public $handle;

    /**
    * @var string - longform name, for display in admin UI. "MY Component"
    */
    public $label;

    /**
    * @var array - array of input fields for instance data
    */
    public $fields;

    /**
    * @var string - Description of what the component does.
    */
    public $description;

    /**
    * @var string - dashicon class or url to icon file
    */
    public $icon;

    function __construct($args = array()) {
        $this->handle = $args['handle'];
        $this->label = $args['label'];
        $this->icon = $args['icon'];
        $this->description = $args['description'];
        $this->fields = $args['fields'];

        parent::__construct($this->handle, $this->label, $this->args);

        add_action('widgets_init', array($this, 'register_widget'));
        $this->register_shortcode();
    }

    public function register_widget() {
        register_widget(get_class($this));
    }

    public function register_shortcode() {
        add_shortcode($this->handle, array($this, 'shortcode'));

    	if (function_exists('shortcode_ui_register_for_shortcode')) {
            $shortcode_args = array();
            $shortcode_args['label'] = $this->label;
            $shortcode_args['listItemImage'] = $this->icon;
            $shortcode_args['attrs'] = $this->fields;
            $shortcode_args['inner_content'] = array(
                'label' => 'Content'
            );
    		shortcode_ui_register_for_shortcode($this->handle, $shortcode_args);
    	}
    }

    public function form() {
        print_r($this->fields);
    }

    public function widget() {
        print $this->render('widget');
    }

    public function shortcode() {
        return $this->render('shortcode');
    }

}
?>
