<?php $details = get_field('details'); ?>
<?php $core = get_field('progress', 'option'); ?>
<?php $email = get_field('email', 'option'); ?>
<?php $phone = get_field('phone', 'option'); ?>

<section id="details" class="details">
  <div class="wrap wrap--grid">
    <div class="details__intro intro">
      <h3>02. Project & Contact Details</h3>
      <?php echo ($core) ? $core : ''; ?>
    </div>
  </div>

  <div class="wrap wrap--grid wrap--gap">
    <?php if ($details['company']) : ?>
    <div class="details__card project__card--details card card--simple">
      <h5>Project Details</h5>
      <p class="details__company textIcon"><?php echo $details['company']; ?></p>
      <div class="details__dates">
        <p class="details__date details__date--start textIcon"><strong>Start:</strong>
          <?php echo $details['start']; ?></p>
        <p class="details__date details__date--end textIcon"><strong>End:</strong>
          <?php echo $details['end']; ?></p>
        <p class="details__value textIcon">£<?php echo $details['value']; ?></p>
      </div>
    </div>
    <?php endif; ?>

    <div class="details__card project__card--inovo card card--simple">
      <h5>Contact: Inovo Media</h5>
      <p class="details__contact textIcon">David O'Sullivan</p>
      <a href="<?php echo 'mailto:' . $email; ?>" class=" details__email textIcon"><?php echo $email; ?></a>
      <a href="<?php echo 'tel:' . $phone; ?>" class="details__phone textIcon"><?php echo $phone; ?>
      </a>
    </div>

    <?php if ($details['company']) : ?>
    <div class="details__card project__card--client card card--simple">
      <h5>Contact: Client</h5>
      <p class="details__contact textIcon">
        <?php echo '<span class="first">' . $details['name_first'] . '</span> <span class="last">' . $details['name_last'] . '</span>'; ?>
      </p>
      <a href="<?php echo 'mailto:' . $details['email']; ?>"
        class=" details__email textIcon"><?php echo $details['email']; ?></a>
      <a href="<?php echo 'tel:' . $details['phone']; ?>"
        class="details__phone textIcon"><?php echo $details['phone']; ?></a>
    </div>
    <?php endif; ?>

  </div>
</section>