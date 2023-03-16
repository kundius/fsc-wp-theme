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

      <div class="service-main">
        <div class="ui-container">
          <div class="page-headline">
            <h1 class="page-headline__title"><?php the_title() ?></h1>
          </div>

          <div class="service-layout">
            <div class="service-layout__details">
              <div class="service-details">
                <?php if ($image = get_field('list_thumbnail')): ?>
                <figure class="service-details__thumbnail">
                  <img src="<?php echo $image['url'] ?>" alt="<?php the_title()?>" />
                </figure>
                <?php endif; ?>
                <?php if ($description = get_field('description')): ?>
                <div class="service-details__description">
                  <?php echo $description ?>
                </div>
                <?php endif; ?>
              </div>
            </div>

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
