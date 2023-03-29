<?php
/*
Template Name: Новости
 */

$nav = new WP_Query([
  'post_type' => 'page',
  'post_parent' => wp_get_post_parent_id() === 0 ? get_the_ID() : wp_get_post_parent_id(),
  'order' => 'ASC',
  'orderby' => 'menu_order',
]);
$news = new WP_Query([
  'posts_per_page' => 9,
  'paged' => get_query_var('paged'),
  'post_type' => 'post',
  'order' => 'DESC',
  'orderby' => 'date',
  'cat' => 5,
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

          <div class="page-news-layout">
            <div class="page-news-layout__nav">
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

            <?php if ($news->have_posts()): ?>
            <div class="page-news-layout__list">
              <div class="home-news-list">
                <?php while ($news->have_posts()): ?>
                <?php $news->the_post()?>
                <div class="home-news-list__item">
                  <article class="home-news-card">
                    <figure class="home-news-card__image">
                      <img src="<?php the_post_thumbnail_url('theme-medium')?>" alt="<?php the_title() ?>" />
                    </figure>
                    <div class="home-news-card__body">
                      <div class="home-news-card__date">
                        <?php echo get_the_date('d.m.Y')?>
                      </div>
                      <div class="home-news-card__title">
                        <a href="<?php the_permalink() ?>">
                          <?php echo \DomenART\Theme\Services\Theme::cut_string(get_the_title(), 120, ' «...»') ?>
                          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="15" viewBox="0 0 25 15"><path d="M18 14.998v-6h-8v-3s5.38.021 8 0V0l6.068 7.95zm-13-9h3v3H5zm-5 0h3v3H0z"/></svg>
                        </a>
                      </div>
                    </div>
                  </article>
                </div>
                <?php endwhile ?>
              </div>
            </div>
            
            <div class="page-news-layout__pagination">
              <?php wp_pagenavi(['query' => $news]) ?>
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
