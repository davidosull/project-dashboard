<?php $links = get_field('links'); ?>
<?php $core = get_field('links', 'option'); ?>

<section class="links">
  <div class="wrap wrap--grid">
    <div class="links__intro intro">
      <h3>08. Important Links</h3>
      <?php echo ($core) ? $core : ''; ?>
    </div>
  </div>
  <div class="wrap wrap--grid wrap--gap">
    <div class="links__card card card--simple card--link">
      <a class="textIcon textIcon--small textIcon--link" href="<?php echo $links['dropbox']; ?>" target="_blank">Shared
        Dropbox Folder</a>
    </div>
    <?php if ($links['links'][0]) : ?>
    <?php foreach ($links['links'][0] as $l) : ?>
    <div class="links__card card card--simple card--link">
      <a class="textIcon textIcon--small textIcon--link" href="<?php echo $l['url']; ?>"
        target="_blank"><?php echo $l['title']; ?></a>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
  </div>
</section>