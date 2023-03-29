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
            <h1 class="page-headline__title"><?php echo single_cat_title( '', false ) ?></h1>
          </div>

          <?php $template = get_field('template', get_queried_object_id()) ?>

          <?php echo $template ?>
          <?php echo get_queried_object_id() ?>
        </div>
      </div>

      <?php get_template_part('partials/footer')?>
    </div>
  </body>
</html>
