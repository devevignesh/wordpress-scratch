<?php

    //Default
    require get_template_directory() . "/lib/ajax.php";
    require get_template_directory() . "/lib/scripts.php";

    require get_template_directory() . "/lib/page.php";

    require get_template_directory() . '/inc/settings.php';

    function footer_custom_script() {
    ?>
        <script type="text/javascript">
            var ajaxUrl = "<?php echo admin_url("admin-ajax.php"); ?>";
        </script>
    <?php
    }
    add_action("wp_footer", "footer_custom_script");

    add_filter( 'body_class', 'body_class_for_pages' );
    /**
     * Adds a css class to the body element
     *
     * @param  array $classes the current body classes
     * @return array $classes modified classes
     */
    function body_class_for_pages( $classes ) {

        if ( is_singular( 'page' ) ) {
            global $post;
            $classes[] = 'page-' . $post->post_name;
        }

        return $classes;
    }