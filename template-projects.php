<?php
/*
Template Name: Проекты
 */
function _get_children_ids( $post_parent ) {
  $results = new WP_Query( array(
      'post_type' => 'page',
      'post_parent' => $post_parent,
  ) );

  $child_ids = array();
  if ( $results->found_posts > 0 )
      foreach ( $results->posts as $post ) // add each child id to array
          $child_ids[] = $post->ID;

  if ( ! empty( $child_ids ) )
      foreach ( $child_ids as $child_id ) // add further children to array
          $child_ids = array_merge( $child_ids, _get_children_ids( $child_id ) );

  return $child_ids;
}
$ids = _get_children_ids(get_the_ID());
print_r($ids);
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
  'meta_value' => 'template-project.php'
  'post__in' => $ids
  // 'post_parent' => get_the_ID(),
  // 'meta_key' => '_wp_page_template',
  // 'meta_value' => 'template-project.php'
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
                    <a href="<?php the_permalink($post_parent_id) ?>" class="projects-nav__link"><?php echo get_the_title($post_parent_id) ?></a>
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
              <div class="home-news-list">
                <?php while ($projects->have_posts()): ?>
                <?php $projects->the_post()?>
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
