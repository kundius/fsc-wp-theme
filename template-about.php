<?php
/*
Template Name: О компании
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
  <body <?php body_class();?>>
    <?php wp_body_open();?>

    <div class="ui-wrapper">
      <?php get_template_part('partials/header') ?>

      <div class="page-main">
        <div class="ui-container">
          <div class="page-headline">
            <h1 class="page-headline__title"><?php the_title() ?></h1>
          </div>

          <div class="page-about-layout">
            <div class="page-about-layout__nav">
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

            <div class="page-about-layout__content ui-content">
              <?php the_content() ?>
            </div>
          </div>
        </div>
      </div>

      <?php get_template_part('partials/footer')?>
    </div>
  </body>
</html>
