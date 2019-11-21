<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php
        $postId = get_queried_object_id();
        $queriedObject = get_post($postId);

	    $title = $queriedObject->term_id ? $queriedObject->name : $queriedObject->post_title;

        $imageUrl = $imageUrl ? $imageUrl : wp_get_attachment_url(get_option("banner_image"));
        $description = getMetaDescriptionByPost($queriedObject);

        $isLoggedIn = (int)is_user_logged_in();
    ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <meta property="og:title" content="<?php echo $title; ?>" />
    <meta property="og:image" content="<?php echo $imageUrl; ?>" />
    <?php if($description) { ?>
        <meta property="og:description" content="<?php echo $description; ?>" />
    <?php } ?>
	<?php wp_head(); ?>
    <script></script>
</head>

<body <?php body_class(); ?>>
    <div>
        <?php get_template_part("layout/sideNav"); ?>
        <header>
            <div class="sticky-header">
                <div class="headerNav">
                    <div class="container">
                        <nav class="navbar navbar-default"  role="navigation">
                            <div class="collapse navbar-collapse">
                                <ul class="nav navbar-nav">
                                    <li><a href="/about">About</a></li>
