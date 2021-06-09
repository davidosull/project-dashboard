<?php
$core = get_field('videos', 'option');
$videos = get_field('videos');
?>

<section id="videos" class="videos">
  <div class="wrap wrap--grid">
    <div class="videos__intro intro">
      <h3>09. Videos</h3>
      <?php if (!$videos) {
        echo $core['before'];
      } else {
        echo $core['after'];
      }
      ?>
    </div>
  </div>

  <div class="wrap wrap--grid wrap--gap">
    <?php if ($videos) : ?>
    <?php foreach ($videos as $v) : ?>
    <div class="videos__card card card--simple card--link">
      <a data-fancybox class="card__image" href="<?php echo $v['video']['video']; ?>">
        <img src="<?php echo $v['video']['thumbnail']['url']; ?>" alt="">
      </a>
      <div class="card__desc">
        <a data-fancybox class="textIcon" href="<?php echo $v['video']['video']; ?>" target="_blank"
          rel="noopener noreferrer"><?php echo $v['video']['title']; ?></a>
      </div>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
  </div>
</section>