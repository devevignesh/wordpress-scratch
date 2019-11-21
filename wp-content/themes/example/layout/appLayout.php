<?php
    /**
     * Template Name: App Layout
     */

    $pageDetail = get_queried_object();

    set_query_var("pageTitle", get_the_title());

    get_header();
?>
    <div class="container">
        <?php echo getPostFormattedContent($pageDetail->post_content); ?>
    </div>
    
<?php get_footer(); ?>