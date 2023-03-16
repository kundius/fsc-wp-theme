<?php if ($advantages = get_field('advantages', 2)): ?>
<section class="home-advantages">
  <div class="ui-container">
    <div class="home-advantages__title"><?php echo $advantages['title'] ?></div>
    <div class="home-advantages__list">
      <div class="home-advantages-list">
        <?php foreach ($advantages['list'] as $key => $item): ?>
        <div class="home-advantages-list__item">
          <article class="home-advantages-card">
            <div class="home-advantages-card__number">
              <?php echo $key + 1 ?>
            </div>
            <div class="home-advantages-card__title">
              <?php echo $item['text'] ?>
            </div>
          </article>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
