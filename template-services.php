<?php
/*
Template Name: Услуги
 */
$service_pages = new WP_Query([
  'post_type' => 'page',
  'post_parent' => get_the_ID(),
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

      <div class="page-main page-main_services">
        <div class="ui-container">
          <div class="page-headline">
            <h1 class="page-headline__title"><?php the_title() ?></h1>
          </div>

          <div class="services-layout">
            <div class="services-layout__list">
              <div class="services-list">
                <?php while ($service_pages->have_posts()): ?>
                <?php $service_pages->the_post()?>
                <div class="services-list__item">
                  <article class="services-card">
                    <?php if ($icon = get_field('icon', get_the_ID())): ?>
                    <figure class="services-card__image">
                      <?php echo $icon ?>
                    </figure>
                    <?php endif; ?>
                    <h2 class="services-card__title">
                      <a href="<?php the_permalink() ?>" class="services-card__link"><?php the_title() ?></a>
                    </h2>
                    <div class="services-card__content">
                      <?php the_field('listing', get_the_ID()) ?>
                    </div>
                  </article>
                </div>
                <?php endwhile?>
                <?php wp_reset_postdata()?>
              </div>
            </div>

            <div class="services-layout__content">
              <div class="services-content">
                <?php the_content() ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php get_template_part('partials/section-advantages') ?>
      <?php get_template_part('partials/section-order') ?>

      <?php get_template_part('partials/footer')?>
    </div>
  </body>
</html>
