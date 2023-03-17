<?php
/*
Template Name: О компании
 */
$nav = new WP_Query([
  'post_type' => 'page',
  'post_parent' => wp_get_post_parent_id() === 0 ? get_the_ID() : wp_get_post_parent_id(),
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

      <div class="page-main">
        <div class="ui-container">
          <div class="page-headline">
            <h1 class="page-headline__title"><?php the_title() ?></h1>
          </div>

          <div class="page-about-layout">
            <?php if ($subtitle = get_field('subtitle')): ?>
            <div class="page-about-layout__subtitle">
              <div class="about-subtitle">
                <?php echo $subtitle ?>
              </div>
            </div>
            <?php endif ?>

            <?php if ($object = get_field('object')): ?>
            <div class="page-about-layout__object">
              <div class="about-object">
                <div class="about-object__image">
                  <img src="<?php echo $object['image']['url'] ?>" alt="<?php echo $object['image']['alt'] ?>">
                </div>
                <div class="about-object__desc">
                  <?php echo $object['description'] ?>
                </div>
              </div>
            </div>
            <?php endif ?>

            <?php if ($proposal = get_field('proposal')): ?>
            <div class="page-about-layout__proposal">
              <div class="about-proposal">
                <div class="about-proposal__desc">
                  <?php echo $proposal['description'] ?>
                </div>
                  <div class="about-proposal__title">
                    <?php echo $proposal['title'] ?>
                  </div>
              </div>
            </div>
            <?php endif ?>

            <?php if ($benefits = get_field('benefits')): ?>
            <div class="page-about-layout__benefits">
              <div class="about-benefits">
                <?php foreach ($benefits as $key => $item): ?>
                  <div class="about-benefits-item">
                    <div class="about-benefits-item__num">
                      <?php echo $key + 1 ?>
                    </div>
                    <div class="about-benefits-item__icon">
                      <?php echo $item['icon'] ?>
                    </div>
                    <div class="about-benefits-item__title">
                      <?php echo $item['text'] ?>
                    </div>
                  </div>
                <?php endforeach ?>
              </div>
            </div>
            <?php endif ?>
          </div>
        </div>
      </div>

			<?php get_template_part('partials/section-partners') ?>

      <?php get_template_part('partials/footer')?>
    </div>
  </body>
</html>
