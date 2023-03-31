<?php
/*
Template Name: Проект
Template Post Type: post
*/
$categories = get_the_category($post->ID);
$category_ids = [];
foreach ($categories as $individual_category) {
  $category_ids[] = $individual_category->term_id;
}
$prevID = get_previous_post();
$nextID = get_next_post();
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

      <div class="project-main page-main_project">
        <div class="ui-container">
          <div class="page-headline">
            <h1 class="page-headline__title"><?php the_title() ?></h1>
            <?php if ($description = get_field('description')): ?>
            <div class="page-headline__description"><?php echo $description ?></div>
            <?php endif ?>
          </div>

          <div class="project-layout">
            <?php if (count($category_ids) > 1): ?>
            <div class="project-layout__nav">
              <div class="projects-nav">
                <ul class="projects-nav__list">
                  <?php foreach ($category_ids as $category_id): $term = get_term_by('id', $category_id, 'category'); ?>
                  <li class="projects-nav__item">
                    <a href="<?php echo get_term_link($term) ?>" class="projects-nav__link"><?php echo esc_html($term->name) ?></a>
                  </li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </div>
            <?php endif ?>

            <div class="project-layout__details">
              <div class="project-details">
                <div class="project-details__image">
                  <img src="<?php the_post_thumbnail_url('medium')?>" alt="<?php the_title() ?>" />
                </div>
                <div class="project-details__body">
                  <div class="project-details__content">
                    <?php the_content() ?>
                  </div>
                </div>
              </div>
            </div>

            <?php if ($gallery = get_field('gallery')): ?>
            <div class="project-layout__gallery">
              <div class="project-gallery-list">
                <?php foreach ($gallery as $item): ?>
                <div class="project-gallery-list__item">
                  <div class="project-gallery-card">
                    <a href="<?php echo $item['url'] ?>" data-fslightbox="lightbox">
                      <img src="<?php echo $item['sizes']['medium'] ?>" alt="<?php echo $item['alt'] ?>" />
                    </a>
                  </div>
                </div>
                <?php endforeach ?>
              </div>
            </div>
            <?php endif ?>

            <div class="project-layout__neighbors">
              <div class="project-neighbors">
                <?php if (!empty($prevID)): ?>
                <a href="<?php echo get_permalink($prevID) ?>" title="<?php echo get_the_title($prevID) ?>" class="project-neighbors__prev">
                  <span></span>
                  предыдущий
                </a>
                <?php endif ?>
                <div></div>
                <?php if (!empty($nextID)): ?>
                <a href="<?php echo get_permalink($nextID) ?>" title="<?php echo get_the_title($nextID) ?>" class="project-neighbors__next">
                  следующий
                  <span></span>
                </a>
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
