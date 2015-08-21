# WordPress Components API [draft]

__TL;DR - Widget + Shortcode = Component.__

WordPress currently has two different expressions of a partial html view and each has it's own API for registering them. Inside the Visual editor, there are shortcodes, inside sidebars there are widgets, and in template files there are template parts. Widgets have always had a way of expressing fields through the form() method but currently requires you to write the connections for saving those fields. Shortcodes have always accepted attributes as their input but with the recent work on the Shortcake plugin being recommended for core inclusion, shortcodes go a step further and have their own fields API for declaring their fields. Template parts do not currently have any sort of input fields expression beyond the second "variant" parameter passed to the get_template_part() function but could benefit from them greatly.

Because these 3 expressions seek to accomplish essentially the same goal, output something visual and reusable, this leads me to suggest that WordPress might benefit from a unified format. Declare once, use everywhere.

## Benefits
Build one part that can be used in mulitple places. In the event you'd want to modify your output or style your component differently, a context variable containing either "widget", "shortcode", or "template" is passed to the render method of your component class.

### A Case for Template Part Fields
Template parts are simply glorified includes with the benefits that they don't break when the file isn't found, and they participate in the template heirarchy with parent themes and part variations. However templates and template parts have never had an expression of "fields" of their own. Individual posts have metadata, and the system has options, but there is no concept of template-fields. Following the notion of Shortcodes and Widgets having input (instance) fields, I think it would be beneficial for a new type of template part that does as well.

## Usage
Instead of creating a widget and/or creating a shortcode, component is designed to be both (if desired). Simply subclass WP_Component just as you would have WP_Widget.
```php
class MY_Component extends WP_Component {

    function __construct() {
        parent::__construct(array(
            'handle' => 'my-component',
            'label' => 'My Component',
            'description' => 'This is a component to display something I like.',
            'icon' => 'dashicons-editor-insertmore'
        ));
    }

    function fields() {
        return array(
            array(
                'label' => 'Link',
                'attr'  => 'link_url',
                'type'  => 'url',
                'meta' => array(
                    'size' => '80'
                )
            ),
            array(
                'label' => 'CSS',
                'attr'  => 'style',
                'type'  => 'text',
                'meta' => array(
                    'size' => '120'
                )
            ),
            array(
                'label' => 'Classes',
                'attr'  => 'class',
                'type'  => 'text',
                'meta' => array(
                    'size' => '80'
                )
            )
        );
    }

    function render($context) {
        ?>
        <div <?php component_class()?> >
            <div>something great here</div>
        </div>
        <?php
    }
}

add_action('plugins_loaded', function() {
    register_component('MY_Component');
});
```
The WP_Component class does all the setup work for you.
