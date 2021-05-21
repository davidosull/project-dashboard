<?php
$details = get_field('details');

get_header();
include(TEMPLATEPATH . '/includes/sections/00Banner.php');
include(TEMPLATEPATH . '/includes/sections/01Progress.php');
include(TEMPLATEPATH . '/includes/sections/02Details.php');
include(TEMPLATEPATH . '/includes/sections/03Assets.php');
include(TEMPLATEPATH . '/includes/sections/04Prototype.php');
include(TEMPLATEPATH . '/includes/sections/05Development.php');
include(TEMPLATEPATH . '/includes/sections/06Updates.php');
include(TEMPLATEPATH . '/includes/sections/07Documents.php');
include(TEMPLATEPATH . '/includes/sections/08Links.php');
include(TEMPLATEPATH . '/includes/sections/09Client.php');
include(TEMPLATEPATH . '/includes/sections/10Admin.php');
get_footer();