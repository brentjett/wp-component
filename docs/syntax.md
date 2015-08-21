# Syntax

The syntax for a component could go one of two primary ways. Either object oriented like the current way you specify a widget, or a pattern of functions the way shortcodes are specified.

## Object-Oriented Approach
A class would be the simplest way to implement a component API because WP_Widget already exists as a class and you pass a class name to register_widget() to set one up. This might look a little foreign to people who are only used to specifying shortcodes or themers who aren't that confident with PHP outside of template tags.

```php
<?php
class extends WP_Component {

    function __construct() {}

    function render($context) {
        // output your html here.
        // If there are differences between how something might render as a widget vs. a shortcode, use $context to specify conditions ($context == 'widget' or $context == 'shortcode').
    }

}
?>
```

## Functional Approach

## File Reference Approach
