<?php
$current_user_id = get_current_user_id();
?>

<?php if (get_current_user_id() === 1) : ?>

<section class="admin">
  <div class="wrap wrap--grid">
    <div class="admin__intro intro">
      <h3>11. Admin</h3>
    </div>
  </div>

  <div class="wrap wrap--grid wrap--gap">
    <div class="admin__form form">
      <?php echo do_shortcode('[gravityform id="3" title="false" description="false" ajax="true"]'); ?>
    </div>
  </div>
</section>

<?php endif; ?>