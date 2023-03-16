<?php
/*
Template Name: Услуга
 */
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

      <div class="page-main page-main_service">
        <div class="ui-container">
          <div class="page-headline">
            <h1 class="page-headline__title"><?php the_title() ?></h1>
          </div>

          <div class="service-layout">
            <?php if ($description = get_field('description')): ?>
            <div class="service-layout__details">
              <div class="service-details">
                <?php if ($icon = get_field('icon')): ?>
                <figure class="service-details__thumbnail">
                  <?php echo $icon ?>
                </figure>
                <?php endif; ?>
                <div class="service-details__description">
                  <?php echo $description ?>
                </div>
              </div>
            </div>
            <?php endif; ?>

            <div class="service-layout__content">
              <div class="service-content">
                <?php the_content() ?>
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
