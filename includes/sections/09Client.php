<?php $core = get_field('client', 'option'); ?>

<section id="form" class="client">
  <div class="wrap wrap--grid">
    <div class="client__intro intro">
      <h3>09. Client Communication</h3>
      <?php echo ($core) ? $core : ''; ?>
    </div>
  </div>

  <div class="wrap wrap--grid wrap--gap">
    <div class="client__form form">
      <?php echo do_shortcode('[gravityform id="2" title="false" description="false" ajax="true"]'); ?>
    </div>
  </div>
</section>