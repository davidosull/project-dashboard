<?php
$tracking = get_field('tracking', 'option');
$cta = get_field('call_to_action', 'option');
$brand = get_field('brand', 'option');
?>

<!DOCTYPE html>
<!--[if IE 8]><html <?php language_attributes(); ?> class     = "ie8"><![endif]-->
<!--[if lte IE 9]><html <?php language_attributes(); ?> class = "ie9"><![endif]-->
<html <?php language_attributes(); ?>>

<head>

  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=2.0">
  <link rel="dns-prefetch" href="//google-analytics.com">
  <link rel="dns-prefetch" href="//ajax.googleapis.com">

  <link rel="apple-touch-icon" sizes="180x180"
    href="<?php bloginfo('template_url'); ?>/res/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32"
    href="<?php bloginfo('template_url'); ?>/res/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16"
    href="<?php bloginfo('template_url'); ?>/res/favicon/favicon-16x16.png">
  <link rel="manifest" href="<?php bloginfo('template_url'); ?>/res/favicon/site.webmanifest">
  <link rel="mask-icon" href="<?php bloginfo('template_url'); ?>/res/favicon/safari-pinned-tab.svg" color="#e65778">
  <meta name="msapplication-TileColor" content="#00113d">
  <meta name="theme-color" content="#00113d">

  <?php wp_head(); ?>

  <!--[if lt IE 10]>
        <script src = "//cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script>
        <![endif]-->
  <!--[if lt IE 9]>
        <script src = "//cdnjs.cloudflare.com/ajax/libs/livingston-css3-mediaqueries-js/1.0.0/css3-mediaqueries.min.js"></script>
        <script src = "//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
        <script src = "//cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js"></script>
        <![endif]-->
</head>

<body <?php body_class(); ?>>

  <header class="header">
    <div class="wrap wrap--flex">

      <a href="https://inovomedia.co.uk" class="header__logo">
        <img class="logo--mark"
          src="<?php echo $brand['logomark'] ? $brand['logomark']['url'] : $brand['logo']['url']; ?>"
          alt="<?php echo get_bloginfo('title'); ?>" width="48" height="48">
        <img class="logo--full" src="<?php echo $brand['logo']['url']; ?>" alt="<?php echo get_bloginfo('title'); ?>"
          width="128" height="48">
      </a>

      <div class="header__actions">
        <?php if (!is_front_page()) :  ?>
        <nav class="header__nav">
          <?php wp_nav_menu([
              'theme_location' => 'header',
            ]); ?>
        </nav>
        <button class="header__menu hamburger" aria-label="open close menu"><span class="hamburger__inner"></span>
        </button>
      </div>
      <?php endif; ?>
    </div>
  </header>
  <main role="main">