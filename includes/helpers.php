<?php
if ( ! function_exists( 'fauzanoptions' ) ) {
    function fauzanoptions($opt_name = null)
    {
        global $fauzanclone;
        if (!empty($opt_name)) {
                return !empty($fauzanclone[$opt_name]) ? $fauzanclone[$opt_name] : null;
            } else {
                return !empty($fauzanclone[$opt_name]) ? $fauzanclone[$opt_name] : null;
            }

        return false;
    }

    require_once get_template_directory() . '/includes/helpers/comment.php';
}
?>