<?php $cards = get_field('progress'); ?>
<?php $core = get_field('progress', 'option'); ?>

<section id="progress" class="progress">
  <div class="wrap wrap--grid">
    <div class="progress__intro intro">
      <h3>01. Project Progress</h3>
      <?php echo ($core) ? $core : ''; ?>
    </div>
  </div>

  <div class="wrap wrap--grid wrap--gap">
    <?php foreach ($cards as $c) : ?>
    <div class="progress__card card card--progress card--simple <?php echo 'card--' . $c['status']['value']; ?>">
      <div class="card__icon"></div>
      <div class="card__content">
        <h5><?php echo $c['label']; ?></h5>
        <span class="card__status h6"><?php echo $c['status']['label']; ?></span>
        <div class="card__dates">
          <span class="card__date card__date--dark card__date--start textIcon">
            <strong>Started: </strong><?php echo ($c['start']) ? $c['start'] : '-'; ?></span>
          <div class="card__date card__date--dark card__date--end textIcon">
            <strong>Completed: </strong><?php echo ($c['end']) ? $c['end'] : '-'; ?></span>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</section>