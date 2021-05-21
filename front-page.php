<?php

/**
 * Template Name: Login
 */

get_header(); ?>

<section class="login">
  <div class="wrap">
    <div class="login__form">
      <?php wp_login_form($args); ?>
      <div class="login__reset">
        <a href="<?php echo esc_url(wp_lostpassword_url()); ?>"
          alt="<?php esc_attr_e('Lost Password?', 'textdomain'); ?>">
          <?php esc_html_e('Lost Password?', 'textdomain'); ?>
        </a>
      </div>
    </div>
  </div>
</section>

<?php get_footer();