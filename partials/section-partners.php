<?php if ($partners = get_field('partners', 2)): ?>
<section class="home-partners">
  <div class="ui-container">
    <div class="home-partners__title"><?php echo $partners['title'] ?></div>
    <div class="home-partners__list">
      <div class="home-partners-list">
        <?php foreach ($partners['items'] as $key => $item): ?>
        <div class="home-partners-list__item">
          <div class="home-partners-item">
            <img src="<?php echo $item['image']['url'] ?>" alt="" class="home-partners-item__image">
            <?php if ($item['description']): ?>
              <div class="home-partners-item__description">
                <?php echo $item['description'] ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
