<?php
/*
Template Name: Услуга
*/
$gallery = get_field('product_gallery');
$ids = implode(',', array_map(function($item) { return $item['id']; }, $gallery));
array_unshift($ids , get_post_thumbnail_id());
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes();?> itemscope itemtype="http://schema.org/WebSite">
  <head>
    <?php get_template_part('partials/head');?>
  </head>
  <body <?php body_class() ?>>
    <?php wp_body_open() ?>

    <div class="ui-wrapper">
      <?php get_template_part('partials/header') ?>
      <?php get_template_part('partials/page-breadcrumbs') ?>
      <?php get_template_part('partials/page-headline') ?>

      <div class="page-body product-body">
        <div class="ui-container">
          <div class="product-layout">
            <?php if ($gallery): ?>
            <div class="product-layout__gallery">
              <div class="product-gallery">
                <figure class="product-gallery__main">
                  <a href="<?php the_post_thumbnail_url('full') ?>" class="product-gallery__main-link" data-modal-attachment="<?php echo get_post_thumbnail_id() ?>" data-modal-attachment-queue="<?php echo $ids ?>">
                    <img src="<?php the_post_thumbnail_url('theme-medium') ?>" alt="<?php the_title() ?>" />
                  </a>
                  <button class="product-gallery__main-order" data-hystmodal="#modal-order">
                    <span>Отправить заявку на аренду</span>
                  </button>
                </figure>
                <?php foreach ($gallery as $item): ?>
                <figure class="product-gallery__thumb">
                  <a href="<?php echo $item['url'] ?>" class="product-gallery__thumb-link" data-modal-attachment="<?php echo $item['id'] ?>" data-modal-attachment-queue="<?php echo $ids ?>">
                    <img src="<?php echo $item['sizes']['theme-medium'] ?>" alt="<?php echo $item['title'] ?>" />
                  </a>
                </figure>
                <?php endforeach ?>
              </div>
            </div>
            <?php endif ?>
            <?php if ($introtext = get_field('product_introtext')): ?>
            <div class="product-layout__intro">
              <div class="product-intro">
                <div class="product-intro__text">
                  <?php echo $introtext ?>
                </div>
                <div class="product-intro__more">
                  <button class="ui-button-more" data-hystmodal="#modal-order">
                    Заказать аренду
                  </button>
                </div>
              </div>
            </div>
            <?php else: ?>
            <div class="product-layout__order">
              <button class="ui-button-more" data-hystmodal="#modal-order">
                Заказать аренду
              </button>
            </div>
            <?php endif ?>
          </div>

          <?php if ($tabs = get_field('product_tabs')): ?>
          <div class="product-body__tabs">
            <div class="tabs">
              <div class="tabs-nav">
                <div class="tabs-nav__wrapper">
                  <div class="tabs-nav__content">
                    <?php foreach ($tabs as $key => $item): ?>
                    <button class="tabs-nav__item<?php echo ($key == 0 ? ' tabs-nav__item_active' : '') ?>">
                      <?php echo $item['name'] ?>
                    </button>
                    <?php endforeach ?>
                  </div>
                </div>
                <button class="tabs-nav__btn tabs-nav__btn_left"></button>
                <button class="tabs-nav__btn tabs-nav__btn_right"></button>
              </div>
              <div class="tabs-body">
                <?php foreach ($tabs as $key => $item): ?>
                <div class="tabs-body__item<?php echo ($key == 0 ? ' tabs-body__item_active' : '') ?>">
                  <?php if ($item['content-type'] == 'content-custom'): ?>
                  <div class="ui-content">
                    <?php echo $item['content-custom'] ?>
                  </div>
                  <?php endif ?>
                  <?php if ($item['content-type'] == 'content-appointment'): ?>
                  <div class="content-appointment">
                    <?php if ($image = $item['content-appointment']['image']): ?>
                    <div class="content-appointment__image">
                      <span><img src="<?php echo $image['url'] ?>" alt=""></span>
                    </div>
                    <?php endif ?>
                    <div class="content-appointment__description">
                      <?php echo $item['content-appointment']['description'] ?>
                    </div>
                  </div>
                  <?php endif ?>
                  <?php if ($item['content-type'] == 'content-construction'): ?>
                  <div class="content-construction">
                    <?php foreach($item['content-construction'] as $key => $row): ?>
                    <div class="content-construction__row">
                      <div class="content-construction__info">
                        <div class="content-construction__number">
                          <?php echo ($key + 1) ?>.
                        </div>
                        <div class="content-construction__description">
                          <?php echo $row['description'] ?>
                        </div>
                      </div>
                      <div class="content-construction__image">
                        <?php if ($image = $row['image']): ?>
                        <span>
                          <img src="<?php echo $image['url'] ?>" alt="">
                        </span>
                        <?php endif ?>
                      </div>
                    </div>
                    <?php endforeach ?>
                  </div>
                  <?php endif ?>
                  <?php if ($item['content-type'] == 'content-specifications'): ?>
                  <div class="content-specifications">
                    <?php foreach($item['content-specifications'] as $key => $row): ?>
                    <div class="content-specifications__row">
                      <div class="content-specifications__info">
                        <div class="content-specifications__number">
                          <?php echo ($key + 1) ?>.
                        </div>
                        <div class="content-specifications__name">
                          <?php echo $row['name'] ?>
                        </div>
                      </div>
                      <div class="content-specifications__value">
                        <?php echo $row['value'] ?>
                      </div>
                    </div>
                    <?php endforeach ?>
                  </div>
                  <?php endif ?>
                </div>
                <?php endforeach ?>
              </div>
            </div>
          </div>
          <?php endif ?>

          <div class="product-body__content ui-content">
            <?php the_content() ?>
          </div>
        </div>
      </div>

      <?php get_template_part('partials/section-formwork-advantages') ?>

      <?php get_template_part('partials/section-how-we-work') ?>

      <?php get_template_part('partials/section-get-estimate') ?>

      <?php get_template_part('partials/footer') ?>
    </div>
  </body>
</html>
