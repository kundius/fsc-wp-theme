<?php
/*
Template Name: Проект
 */
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

          project
        </div>
      </div>

      <?php get_template_part('partials/footer')?>
    </div>
  </body>
</html>
