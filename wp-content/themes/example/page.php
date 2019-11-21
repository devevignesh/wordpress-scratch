<?php
    get_header();

    if (get_queried_object()->ID) {
        set_query_var("pageTitle", get_the_title());
    }
?>
    <?php echo getHeaderBannerByPost(get_the_ID()); ?>

    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; ?>
    </div>
<?php get_footer(); ?>
