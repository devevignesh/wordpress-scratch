<?php
function initiateScripts() {
    $isHomePage = is_home() || is_front_page();
    wp_enqueue_script("jquery");

    // enqueueJSStyle("jquery-ui", "jquery-ui/jquery-ui.min.css", "1.12.1");
    // enqueueJS("jquery-ui", "jquery-ui/jquery-ui.min.js", "1.12.1");

    // enqueueCSS("bootstrap-css", "bootstrap.min.css", "3.3.7");
    // enqueueCSS("bootstrap-social-css", "bootstrap-social.css", "3.3.7");

    // enqueueCSS("header-css", "../scss/header.css");
    // enqueueCSS("footer-css", "../scss/footer.css");

    // if (is_page_template('templates/about.php')) {
    //     enqueueCSS("about-css", "../css/about.css");
    // }
    // enqueueThemeCSS("style-css", "style.css");

    // enqueueJS("bootstrap-js", "bootstrap.min.js", "3.3.7");
    // enqueueJS("functions-js", "functions.js");

    // if ($isHomePage) {
    //     enqueueCSS("home-scss", "../scss/pages/home.css");
    // }
}
add_action("wp_enqueue_scripts", "initiateScripts");

function initiateAdminScripts($hook) {
    $isPostPage = false;
}
add_action("admin_enqueue_scripts", "initiateAdminScripts", 10, 1);