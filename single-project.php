<?php
$details = get_field('details');

get_header();
include(TEMPLATEPATH . '/includes/sections/00banner.php');
include(TEMPLATEPATH . '/includes/sections/01progress.php');
include(TEMPLATEPATH . '/includes/sections/02details.php');
include(TEMPLATEPATH . '/includes/sections/03assets.php');
include(TEMPLATEPATH . '/includes/sections/04prototype.php');
include(TEMPLATEPATH . '/includes/sections/05development.php');
include(TEMPLATEPATH . '/includes/sections/06updates.php');
include(TEMPLATEPATH . '/includes/sections/07documents.php');
include(TEMPLATEPATH . '/includes/sections/08links.php');
include(TEMPLATEPATH . '/includes/sections/09videos.php');
include(TEMPLATEPATH . '/includes/sections/10client.php');
include(TEMPLATEPATH . '/includes/sections/11admin.php');
get_footer();