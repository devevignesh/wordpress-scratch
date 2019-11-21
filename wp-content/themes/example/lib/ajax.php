<?php
function ajaxCreateDefaultPages()
{
    error_log("ajax");
    $defaultPages = array(
        array(
            "title" => "About",
            "slug" => "about",
            "template" => "about.php",
            // "content" => "[account page='somePage']",
            // "parentPage" => "account"
        ),
    );

    insertPages($defaultPages);

    wp_send_json(array(
        "success" => 1,
        "message" => "Successfully Created Default Pages"
    ));

    wp_die();
}
add_action("wp_ajax_create_default_pages", "ajaxCreateDefaultPages");
