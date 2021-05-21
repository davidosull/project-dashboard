<?php $updates = get_field('updates'); ?>
<?php $core = get_field('updates', 'option'); ?>

<section id="updates" class="updates">
  <div class="wrap wrap--grid">
    <div class="updates__intro intro">
      <h3>06. Project Updates</h3>
      <?php echo ($core) ? $core : ''; ?>
    </div>
  </div>

  <div class="wrap wrap--grid wrap--gap">
    <?php if ($updates) : ?>
    <h5>Updates Feed:</h5>
    <div class="updates__group">
      <?php foreach ($updates as $u) : ?>
      <div class="update">
        <div class="update__content">
          <?php echo $u['content']; ?>
        </div>
        <div class="update__date">
          <p class="textIcon textIcon--small"><small><?php echo $u['date']; ?></small></p>
        </div>
      </div>
      <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</section>