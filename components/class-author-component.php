<?php
class Author_Component extends WP_Component {

    function __construct($args = array()) {

        parent::__construct(array(
            'handle' => 'author-component',
            'label' => 'Author Component',
            'description' => 'This is a component to display an author',
            'icon' => 'dashicons-editor-insertmore',
            'fields' => array(
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
            )
        ));
    }

    function render($context) {
        ?>
        <div <?php component_classes()?>>
            Display an author here. This is a component.
        </div>
        <?php
    }

}
