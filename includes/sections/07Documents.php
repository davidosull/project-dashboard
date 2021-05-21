<?php $docs = get_field('documents'); ?>
<?php $core = get_field('documents', 'option'); ?>

<section class="documents">
  <div class="wrap wrap--grid">
    <div class="documents__intro intro">
      <h3>07. Project Documents</h3>
      <?php echo ($core) ? $core : ''; ?>
    </div>
  </div>
  <div class="wrap wrap--grid wrap--gap">
    <?php if ($docs) : ?>
    <?php foreach ($docs as $d) : ?>
    <div class="documents__card card card--simple card--link">
      <a class="textIcon textIcon--small" href="<?php echo $d['file']['url']; ?>"
        target="_blank"><?php echo $d['file']['filename']; ?></a>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
  </div>
</section>