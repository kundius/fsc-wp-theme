<?php
/*
Template Name: Проект
 */
$post_parent_id = wp_get_post_parent_id(wp_get_post_parent_id());
$nav = new WP_Query([
  'post_type' => 'page',
  'post_parent' => $post_parent_id,
  'order' => 'ASC',
  'orderby' => 'menu_order',
  'meta_key' => '_wp_page_template',
  'meta_value' => 'template-projects.php'
]);

$pagelist = get_pages('sort_column=menu_order&sort_order=asc&meta_key=_wp_page_template&meta_value=template-projects.php');
$pages = [];
foreach ($pagelist as $page) {
   $pages[] += $page->ID;
}

$current = array_search(get_the_ID(), $pages);
$prevID = $pages[$current-1];
$nextID = $pages[$current+1];
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
            <h1 class="page-headline__title"><?php the_title() ?></h1>
            <?php if ($description = get_field('description')): ?>
            <div class="page-headline__description"><?php echo $description ?></div>
            <?php endif ?>
          </div>

          <div class="project-layout">
            <div class="project-layout__nav">
              <div class="projects-nav">
                <ul class="projects-nav__list">
                  <li class="projects-nav__item<?php if ($post_parent_id == wp_get_post_parent_id()): ?> projects-nav__item_active<?php endif ?>">
                    <a href="<?php the_permalink($post_parent_id) ?>" class="projects-nav__link">Все</a>
                  </li>
                  <?php while ($nav->have_posts()): ?>
                  <?php $nav->the_post() ?>
                  <li class="projects-nav__item<?php if (get_the_ID() == wp_get_post_parent_id()): ?> projects-nav__item_active<?php endif ?>">
                    <a href="<?php the_permalink() ?>" class="projects-nav__link"><?php the_title() ?></a>
                  </li>
                  <?php endwhile ?>
                  <?php wp_reset_postdata() ?>
                </ul>
              </div>
            </div>

            <div class="project-layout__details">
              <div class="project-details">
                <div class="project-details__image">
                  <img src="<?php the_post_thumbnail_url('theme-medium')?>" alt="<?php the_title() ?>" />
                </div>
                <div class="project-details__content">
                  <?php the_content() ?>
                </div>
              </div>
            </div>

            <?php if ($gallery = get_field('gallery')): ?>
            <div class="project-layout__gallery">
              <div class="project-gallery-list">
                <?php foreach ($gallery as $item): ?>
                <div class="project-gallery-list__item">
                  <div class="project-gallery-card">
                    <img src="<?php echo $item['sizes']['theme-medium'] ?>" alt="<?php echo $item['alt'] ?>" />
                  </div>
                </div>
                <?php endforeach ?>
              </div>
            </div>
            <?php endif ?>

            <div class="project-layout__neighbors">
              <div class="project-neighbors">
                <?php if (!empty($prevID)): ?>
                <a href="<?php echo get_permalink($prevID) ?>" title="<?php echo get_the_title($prevID) ?>" class="project-neighbors__prev">предыдущий</a>
                <?php endif ?>
                <div></div>
                <?php if (!empty($nextID)): ?>
                <a href="<?php echo get_permalink($nextID) ?>" title="<?php echo get_the_title($nextID) ?>" class="project-neighbors__next">следующий</a>
                <?php endif ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php get_template_part('partials/section-order') ?>

      <?php get_template_part('partials/footer')?>
    </div>
  </body>
</html>
