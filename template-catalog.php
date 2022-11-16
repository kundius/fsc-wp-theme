<?php
/*
Template Name: Каталог
 */

$products = new WP_Query([
    'post_type' => 'page',
    'post_parent' => get_the_ID(),
    'order' => 'ASC',
    'orderby' => 'menu_order',
]);
$special_offer = get_field('special-offer');
$emulsifier = get_field('emulsifier');
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
      <?php get_template_part('partials/page-breadcrumbs') ?>
      <?php get_template_part('partials/page-headline') ?>

      <div class="page-body catalog-body">
        <div class="ui-container">

          <?php if ($intro_text = get_field('intro-text')): ?>
          <div class="catalog-body__intro-text">
            <?php echo $intro_text ?>
          </div>
          <?php endif?>

          <?php if ($special_offer && $special_offer['show']): ?>
          <div class="catalog-body__special-offer">
            <div class="special-offer-sm">
              <div class="special-offer-sm__title" data-hystmodal-order>
                <?php echo $special_offer['title'] ?>
                <div class="special-offer-sm__date">
                  <?php echo $special_offer['date'] ?>
                </div>
              </div>
              <div class="special-offer-sm__description" data-hystmodal-order>
                <?php echo $special_offer['description'] ?>
              </div>
              <button class="special-offer-sm__close"></button>
            </div>
          </div>
          <?php endif?>

          <?php if ($products->have_posts()): ?>
          <div class="catalog-body__products">
            <div class="catalog-grid">
              <?php while ($products->have_posts()): ?>
              <?php $products->the_post()?>
              <div class="catalog-grid__cell">
                <article class="catalog-card">
                  <figure class="catalog-card__image">
                    <img src="<?php the_post_thumbnail_url('theme-medium')?>" alt="<?php the_title()?>" />
                    <button class="catalog-card__order" data-hystmodal-order="<?php the_title()?>">
                      <span>Отправить заявку на аренду</span>
                    </button>
                  </figure>
                  <div class="catalog-card__body">
                    <div class="catalog-card__headline">
                      <h2 class="catalog-card__title">
                        <?php the_title()?>
                      </h2>
                      <div class="catalog-card__subtitle">
                        <?php the_field('product_price')?>
                      </div>
                    </div>
                    <div class="catalog-card__description">
                        <?php the_field('product_description')?>
                    </div>
                    <div class="catalog-card__more">
                      <a href="<?php the_permalink()?>" class="ui-button-more">
                        Узнать больше
                        <span class="ui-arrow-right"></span>
                      </a>
                    </div>
                  </div>
                </article>
              </div>
              <?php endwhile?>
              <?php wp_reset_postdata()?>
            </div>
          </div>
          <?php endif?>

          <?php if ($emulsifier && $emulsifier['show']): ?>
          <div class="catalog-body__emulsifier">
            <div class="emulsifier">
              <div class="emulsifier__image">

              </div>
              <div class="emulsifier__description">
                <?php echo $emulsifier['description'] ?>
              </div>
            </div>
          </div>
          <?php endif?>

          <div class="catalog-body__content ui-content">
            <?php the_content()?>
          </div>

        </div>
      </div>

      <?php get_template_part('partials/section-formwork-advantages')?>

      <?php get_template_part('partials/section-how-we-work')?>

      <?php get_template_part('partials/section-get-estimate')?>

      <?php get_template_part('partials/footer')?>
    </div>
  </body>
</html>
