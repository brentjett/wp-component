<?php

function component_classes($additional_classes = null) {
    $classes = $additional_classes;
    $classes = "class='$classes'";
    print $classes;
}

function wp_get_component() {
    // used to get component as template part.
}

?>
