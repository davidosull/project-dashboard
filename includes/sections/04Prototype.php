<?php $prototype = get_field('prototype'); ?>
<?php $progress = get_field('progress'); ?>
<?php $core = get_field('prototype', 'option'); ?>

<section id="prototype" class="prototype">
  <div class="wrap wrap--grid">
    <div class="prototype__intro intro">
      <h3>04. Design Prototype</h3>
      <?php
      if ($progress['design']['status']['value'] !== 'not-started') { ?>
      <?php echo $core['after']; ?>

      <?php if ($prototype['link']) : ?>
      <p>If you'd prefer, you can follow <a href="<?php echo $prototype['link']; ?>">this link</a> to view an
        interactive prototype of your new website.</p>
      <p>Please be aware the prototypes are not optimised for mobile devices.</p>
      <?php endif; ?>
      <?php } else { ?>
      <?php echo $core['before']; ?>
      <?php }; ?>
    </div>
  </div>
  <div class="wrap wrap--grid wrap--gap">
    <?php if ($prototype['images']) : ?>
    <?php foreach ($prototype['images'] as $i) : ?>
    <div class="prototype__card card card--simple card--link">
      <a class="card__image" href="<?php echo $i['image']['url']; ?>" target="_blank">
        <img src="<?php echo $i['image']['url']; ?>" alt="">
      </a>
      <div class="card__desc">
        <a class="textIcon" href="<?php echo $i['image']['url']; ?>"
          target="_blank"><?php echo $i['image']['filename']; ?></a>
      </div>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
  </div>

</section>