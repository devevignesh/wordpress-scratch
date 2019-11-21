<?php
    function getPageIdBySlug($slug) {
        global $wpdb;
        return $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_type != 'nav_menu_item' AND (post_name = '$slug' OR post_name = '" . $slug . "__trashed')");
    }

    function insertPages($defaultPages) {
        $currentUserId = get_current_user_id();
        foreach ($defaultPages as $defaultPage) {
            $pageId = getPageIdBySlug($defaultPage["slug"]);
            $pageDetail = array(
                "post_type" => "page",
                "post_title" => $defaultPage["title"],
                "post_status" => "publish",
                "post_author" => $currentUserId,
                "post_name" => $defaultPage["slug"]
            );

            if (isset($defaultPage["content"])) {
                $pageDetail["post_content"] = $defaultPage["content"];
            }

            if (isset($defaultPage["template"])) {
                $pageDetail["page_template"] = "templates/" . $defaultPage["template"];
            } else {
                $pageDetail["page_template"] = "default";
            }

            if (isset($defaultPage["parentPage"])) {
                $parentPageId = getPageIdBySlug($defaultPage["parentPage"]);
                if ($parentPageId) {
                    $pageDetail["post_parent"] = $parentPageId;
                }
            }

            if (!$pageId) {
                wp_insert_post($pageDetail);
            } else {
                $pageDetail["ID"] = $pageId;
                wp_update_post($pageDetail);
            }
        }
    }