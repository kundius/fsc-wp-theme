<?php
/*
Template Name: Сертификаты
 */
$nav = new WP_Query([
  'post_type' => 'page',
  'post_parent' => wp_get_post_parent_id() === 0 ? get_the_ID() : wp_get_post_parent_id(),
  'order' => 'ASC',
  'orderby' => 'menu_order',
]);
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes()?> itemscope itemtype="http://schema.org/WebSite">
  <head>
    <?php get_template_part('partials/head');?>
  </head>
  <body <?php body_class() ?>>
    <?php wp_body_open() ?>

    <div class="ui-wrapper">
      <?php get_template_part('partials/header') ?>

      <div class="page-main">
        <div class="ui-container">
          <div class="page-headline">
            <h1 class="page-headline__title"><?php echo get_the_title(wp_get_post_parent_id()) ?></h1>
          </div>

          <div class="certificates-layout">
            <div class="certificates-layout__nav">
              <div class="about-nav">
                <ul class="about-nav__list">
                  <?php while ($nav->have_posts()): ?>
                  <?php $nav->the_post() ?>
                  <li class="about-nav__item<?php if (is_page(get_the_ID())): ?> about-nav__item_active<?php endif ?>">
                    <a href="<?php the_permalink() ?>" class="about-nav__link"><?php the_title() ?></a>
                  </li>
                  <?php endwhile ?>
                  <?php wp_reset_postdata() ?>
                </ul>
              </div>
            </div>

            <?php if ($gallery = get_field('gallery')): ?>
            <div class="certificates-layout__list">
              <div class="certificates-list">
                <?php foreach ($gallery as $item): ?>
                <div class="certificates-list__item">
                  <article class="certificates-card">
                    <div class="certificates-card__figure">
                      <img src="<?php echo $item['sizes']['medium'] ?>" alt="<?php echo $item['alt'] ?>" class="certificates-card__image" />
                      <div class="certificates-card__loupe">
                        <svg width="67" height="67" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:avocode="https://avocode.com/" viewBox="0 0 67 67"><defs></defs><desc>Generated with Avocode.</desc><g><g><title>лупа увеличить</title><path d="M65.51368,63.50331l-1.96175,1.9565c-1.96987,1.96434 -5.1638,1.96434 -7.13367,0l-12.34119,-12.30733c-4.42966,2.76777 -9.6666,4.3697 -15.27958,4.3697c-15.91667,0 -28.81977,-12.86763 -28.81977,-28.74032c0,-15.87287 12.9031,-28.74032 28.81977,-28.74032c15.91679,0 28.81977,12.86745 28.81977,28.74032c0,5.6302 -1.62483,10.88104 -4.43024,15.31476l12.32666,12.29274c1.96987,1.96452 1.96987,5.14961 0,7.11395zM49.64118,28.78187c0,-11.47982 -9.33208,-20.78628 -20.8437,-20.78628c-11.51161,0 -20.84358,9.30646 -20.84358,20.78628c0,11.47982 9.33197,20.7861 20.84358,20.7861c11.51161,0 20.8437,-9.30628 20.8437,-20.7861z" fill="#ffffff" fill-opacity="1"></path></g></g></svg>
                      </div>
                    </div>
                  </article>
                </div>
                <?php endforeach ?>
              </div>
            </div>
            <?php endif ?>
          </div>
        </div>
      </div>

      <?php get_template_part('partials/footer')?>
    </div>
  </body>
</html>
