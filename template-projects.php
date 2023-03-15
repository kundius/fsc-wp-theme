<?php
/*
Template Name: Проекты
 */

$post_parent_id = wp_get_post_parent_id() === 0 ? get_the_ID() : wp_get_post_parent_id();

$nav = new WP_Query([
  'post_type' => 'page',
  'post_parent' => $post_parent_id,
  'order' => 'ASC',
  'orderby' => 'menu_order',
  'meta_key' => '_wp_page_template',
  'meta_value' => 'template-projects.php'
]);

$projects = new WP_Query([
  'posts_per_page' => 6,
  'paged' => get_query_var('paged'),
  'post_type' => 'page',
  'order' => 'DESC',
  'orderby' => 'date',
  'meta_key' => '_wp_page_template',
  'meta_value' => 'template-project.php',
  'post__in' => \DomenART\Theme\Services\Theme::get_children_ids(get_the_ID())
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
          <h1 class="page-main__title"><?php the_title() ?></h1>

          <div class="projects-layout">
            <div class="projects-layout__nav">
              <div class="projects-nav">
                <ul class="projects-nav__list">
                  <li class="projects-nav__item<?php if (is_page($post_parent_id)): ?> projects-nav__item_active<?php endif ?>">
                    <a href="<?php the_permalink($post_parent_id) ?>" class="projects-nav__link">Все</a>
                  </li>
                  <?php while ($nav->have_posts()): ?>
                  <?php $nav->the_post() ?>
                  <li class="projects-nav__item<?php if (is_page(get_the_ID())): ?> projects-nav__item_active<?php endif ?>">
                    <a href="<?php the_permalink() ?>" class="projects-nav__link"><?php the_title() ?></a>
                  </li>
                  <?php endwhile ?>
                  <?php wp_reset_postdata() ?>
                </ul>
              </div>
            </div>

            <?php if ($projects->have_posts()): ?>
            <div class="projects-layout__list">
              <div class="projects-list">
                <?php $index = 0; while ($projects->have_posts()): ?>
                <?php $projects->the_post() ?>

                <?php if ($index === 0): ?>
                <div class="projects-list__item projects-list__item_wide">
                  <article class="projects-card-wide">
                    <figure class="projects-card-wide__image">
                      <img src="<?php the_post_thumbnail_url('theme-medium')?>" alt="<?php the_title() ?>" />
                    </figure>

                    <div class="projects-card-wide__date">
                      <?php the_field('project_date', 'II кв. 2014 г.- II кв. 2015') ?>
                    </div>

                    <div class="projects-card-wide__title">
                      <?php the_title() ?>
                    </div>

                    <div class="projects-card-wide__excerpt">
                      <?php echo \DomenART\Theme\Services\Theme::excerpt(['maxchar' => 160]) ?>
                    </div>

                    <div class="projects-card-wide__more">
                      <a href="<?php the_permalink($item->ID) ?>" class="ui-button-more ui-button-more_with-arrow ui-button-more_upper">Подробнее</a>
                    </div>
                  </article>
                </div>
                <?php else: ?>
                <div class="projects-list__item">
                  <article class="projects-card">
                    <figure class="projects-card__image">
                      <img src="<?php the_post_thumbnail_url('medium')?>" alt="<?php the_title() ?>" />
                    </figure>

                    <div class="projects-card__date">
                      <?php the_field('project_date', 'II кв. 2014 г.- II кв. 2015') ?>
                    </div>

                    <div class="projects-card__title">
                      <?php the_title() ?>
                    </div>

                    <div class="projects-card__excerpt">
                      <?php echo \DomenART\Theme\Services\Theme::excerpt(['maxchar' => 400]) ?>
                    </div>

                    <div class="projects-card__more">
                      <a href="<?php the_permalink($item->ID) ?>" class="projects-card__more-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="15" viewBox="0 0 25 15"><path d="M18 14.998v-6h-8v-3s5.38.021 8 0V0l6.068 7.95zm-13-9h3v3H5zm-5 0h3v3H0z"/>
                      </svg>
                    </a>
                    </div>
                  </article>
                </div>
                <?php endif ?>
                <?php $index++; endwhile ?>
              </div>
            </div>

            <div class="projects-layout__pagination">
              <?php wp_pagenavi(['query' => $projects]) ?>
            </div>
            <?php wp_reset_postdata() ?>
            <?php endif ?>
          </div>
        </div>
      </div>

      <?php get_template_part('partials/footer')?>
    </div>
  </body>
</html>
