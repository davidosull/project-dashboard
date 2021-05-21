<?php $banner = get_field('banner'); ?>
<?php $core = get_field('banner', 'option'); ?>

<section class="banner">
  <div class="wrap wrap--grid wrap--gap">
    <div class="banner__intro intro">
      <h3>Hi, <?php echo $details['name_first']; ?>.</h3>
      <?php echo $core['content']; ?>
    </div>
  </div>
</section>
