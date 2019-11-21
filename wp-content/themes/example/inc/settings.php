<?php

// function settings() {}

function admin_menu() {
    add_menu_page('Example', 'Example', 'administrator', 'general', 'general_settings');
}

if (is_admin()){
    add_action('admin_menu', 'admin_menu');
}

function media_selector_print_scripts() {
    ?>
    <script type='text/javascript'>
		function createDefaultPages() {
			jQuery.ajax({
				url: ajaxurl,
				data: {
					action: "create_default_pages"
				},
				success: function(result){
                    console.log(result)
					jQuery(".reindexNotice p").html(result.message);
					jQuery(".reindexNotice").show();
				},
                error: function(error) {
                    console.log(error)
                }
			});
		}
    </script>
    <?php
}
add_action('admin_footer','media_selector_print_scripts');

function general_settings() {
    wp_enqueue_media();
    ?>
    <div class="wrap">
        <h1>General Settings</h1>
        <div class="updated notice reindexNotice" style="display: none;"><p></p></div>
        <form method="post" action="options.php">
            <?php
                settings_fields("general-group");
                do_settings_sections("general-group");
            ?>
            <table class="form-table">
                <tr valign="top">
                    <th colspan="2" style="font-weight: normal;">
                        <button class="button button-secondary" type="button" onclick="return createDefaultPages();" style="margin-right: 10px;">Create Default Pages</button>
                    </th>
                </tr>
            </table>
        </form>
    </div>
    <?php
}
?>
