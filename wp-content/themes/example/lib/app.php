<?php

function accountShortCode($attrs)
{
    $page = isset($attrs["page"]) ? $attrs["page"] : "profile";
    $filePath = get_template_directory() . "/account/$page.php";
    if (file_exists($filePath)) {
        include($filePath);
    }
}

add_shortcode("account", "accountShortCode");
