<?php $assets = get_field('assets'); ?>
<?php $core = get_field('assets', 'option'); ?>

<section id="assets" class="assets">
  <div class="wrap wrap--grid">
    <div class="assets__intro intro">
      <h3>03. Design Assets</h3>
      <?php echo ($core) ? $core : ''; ?>
    </div>
  </div>

  <div class="wrap wrap--grid wrap--gap">
    <?php if ($assets) : ?>
    <?php foreach ($assets as $a) : ?>

    <div class="assets__card card card--simple card--link">
      <a class="card__image" href="<?php echo $a['file']['url']; ?>" target="_blank">
        <img src="<?php echo $a['file']['url']; ?>" alt="">
      </a>
      <div class="card__desc">
        <a class="textIcon textIcon--small" href="<?php echo $a['file']['url']; ?>"
          target="_blank"><?php echo $a['file']['filename']; ?></a>
      </div>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
  </div>

</section>