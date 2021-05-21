<?php $development = get_field('development'); ?>
<?php $progress = get_field('progress'); ?>
<?php $core = get_field('development', 'option'); ?>

<section id="dev" class="development">
  <div class="wrap wrap--grid wrap--gap">
    <div class="development__intro intro">
      <h3>05. Development Site</h3>
      <?php
      if ($progress['development']['status']['value'] !== 'not-started') { ?>
      <p>Please follow <a href="<?php echo $development['link']; ?>" target="_blank">this link</a> to view the
        development version of your website.</p>
      <?php echo $core['after']; ?>
      <?php } else { ?>
      <?php echo $core['before']; ?>
      <?php }; ?>
    </div>
  </div>
</section>