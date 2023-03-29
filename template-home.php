<?php
/*
Template Name: Главная
*/
$sticky = get_option('sticky_posts');
$sticky_posts = new WP_Query([
	'posts_per_page' => 3,
  'post_type' => 'post',
  'order' => 'DESC',
  'orderby' => 'date',
  'cat' => 7,
  'post__in' => $sticky,
]);
$post_news = new WP_Query([
	'posts_per_page' => 3,
  'post_type' => 'post',
  'order' => 'DESC',
  'orderby' => 'date',
  'cat' => 5,
]);
$products = new WP_Query([
  'post_type' => 'page',
  'post_parent' => 52,
  'order' => 'ASC',
  'orderby' => 'menu_order',
]);
$service_pages = new WP_Query([
  'post_type' => 'page',
  'post_parent' => 11,
  'order' => 'ASC',
  'orderby' => 'menu_order',
]);
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes();?> itemscope itemtype="http://schema.org/WebSite">
  <head>
    <?php get_template_part('partials/head');?>
  </head>
  <body <?php body_class('page-transparent-header');?>>
    <?php wp_body_open();?>

    <div class="ui-wrapper">
      <?php get_template_part('partials/header');?>

      <?php if ($intro = get_field('intro')): ?>
      <section class="intro">
        <div class="swiper intro-swiper">
          <div class="swiper-wrapper">
            <?php foreach ($intro['images'] as $item): ?>
            <div class="swiper-slide intro-slide">
              <div class="intro-slide__bg" style="background-image: url(<?php echo $item['image']['url'] ?>)"></div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="intro__content">
          <div class="intro-logo">
            <div class="intro-logo__image"></div>
            <div class="intro-logo__text">
              ФинСтройКонсалт
            </div>
          </div>
          <?php if ($intro['link']): ?>
          <div class="intro-link">
            <a href="<?php echo $intro['link'] ?>"  class="intro-link__button">Узнать больше</a>
          </div>
          <?php endif; ?>
        </div>
        <div class="intro__pagination swiper-pagination"></div>
      </section>
      <?php endif; ?>

      <?php if ($services = get_field('services')): ?>
      <section class="home-services">
        <div class="ui-container">
          <div class="home-services__title"><?php echo $services['title'] ?></div>
          <div class="home-services__list">
            <?php while ($service_pages->have_posts()): ?>
            <?php $service_pages->the_post()?>
            <div class="home-services__item">
              <article class="home-services-card">
                <?php if ($icon = get_field('icon', get_the_ID())): ?>
                <figure class="home-services-card__image">
                  <?php echo $icon ?>
                </figure>
                <?php endif; ?>
                <h2 class="home-services-card__title">
                  <a href="<?php the_permalink() ?>" class="home-services-card__link"><?php the_title() ?></a>
                </h2>
              </article>
            </div>
            <?php endwhile?>
            <?php wp_reset_postdata()?>
          </div>
          <?php if ($services['content_title'] || $services['content_text']): ?>
          <div class="home-services-content">
            <?php if ($services['content_title']): ?>
            <div class="home-services-content__title">
              <?php echo $services['content_title'] ?>
            </div>
            <?php endif; ?>
            <?php if ($services['content_text']): ?>
            <div class="home-services-content__text">
              <?php echo $services['content_text'] ?>
            </div>
            <?php endif; ?>
          </div>
          <?php endif; ?>
        </div>
      </section>
      <?php endif; ?>

      <?php get_template_part('partials/section-advantages') ?>

      <?php if ($post_news->have_posts()): ?>
      <section class="home-news">
        <div class="ui-container">
          <div class="home-news__title">
            Новости
          </div>

          <div class="home-news__list">
              <div class="home-news-list">
              <?php while ($post_news->have_posts()): ?>
              <?php $post_news->the_post()?>
              <div class="home-news-list__item">
                <article class="home-news-card">
                  <figure class="home-news-card__image">
                    <img src="<?php the_post_thumbnail_url('theme-medium')?>" alt="<?php the_title()?>" />
                  </figure>
                  <div class="home-news-card__body">
                    <div class="home-news-card__date">
                      <?php echo get_the_date('d.m.Y')?>
                    </div>
                    <div class="home-news-card__title">
                      <a href="<?php the_permalink()?>">
                        <?php echo \DomenART\Theme\Services\Theme::cut_string(get_the_title(), 120, ' «...»') ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="15" viewBox="0 0 25 15"><path d="M18 14.998v-6h-8v-3s5.38.021 8 0V0l6.068 7.95zm-13-9h3v3H5zm-5 0h3v3H0z"/></svg>
                      </a>
                    </div>
                  </div>
                </article>
              </div>
              <?php endwhile?>
              <?php wp_reset_postdata()?>
            </div>
          </div>
        </div>
      </section>
      <?php endif; ?>

      <section class="home-projects">
        <div class="ui-container">
          <div class="home-projects-layout">
            <div class="home-projects-layout__section">
              <div class="home-projects-section">
                <div class="home-projects-section__title">Наши объекты</div>
                <div class="home-projects-section__date">с 2013 по 2023 годы</div>
                <a href="/category/obekty" class="home-projects-section__more">Смотреть все</a>
              </div>
            </div>
            <div class="home-projects-layout__info">
              <div class="home-projects-info">
                <div class="home-projects-info__title">
                  <?php echo get_the_title(301) ?>
                </div>
                <div class="home-projects-info__desc">
                  <?php the_field('description', 301) ?>
                </div>
              </div>
            </div>
            <?php if ($gallery = get_field('gallery', 301)): ?>
            <div class="home-projects-layout__gallery">
              <div class="swiper projects-swiper-main">
                <div class="swiper-wrapper">
                  <?php foreach ($gallery as $item): ?>
                  <div class="swiper-slide">
                    <img src="<?php echo $item['sizes']['medium'] ?>" alt="<?php echo $item['alt'] ?>" />
                  </div>
                  <?php endforeach ?>
                </div>
              </div>
              <div thumbsSlider class="swiper projects-swiper-thumbs">
                <div class="swiper-wrapper">
                  <?php foreach ($gallery as $item): ?>
                  <div class="swiper-slide">
                    <img src="<?php echo $item['sizes']['medium'] ?>" alt="<?php echo $item['alt'] ?>" />
                  </div>
                  <?php endforeach ?>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
              </div>
            </div>
            <?php endif ?>
          </div>
        </div>
      </section>

			<?php get_template_part('partials/section-partners') ?>
			
      <?php get_template_part('partials/section-order') ?>

      <?php get_template_part('partials/footer');?>
    </div>
  </body>
</html>
