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
  <body <?php body_class();?>>
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
                <?php if ($image = get_field('list_thumbnail', get_the_ID())): ?>
                <figure class="home-services-card__image">
                  <img src="<?php echo $image['url'] ?>" alt="<?php the_title()?>" />
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

      <?php if ($advantages = get_field('advantages')): ?>
      <section class="home-advantages">
        <div class="ui-container">
          <div class="home-advantages__title"><?php echo $advantages['title'] ?></div>
          <div class="home-advantages__list">
            <div class="home-advantages-list">
              <?php foreach ($advantages['list'] as $key => $item): ?>
              <div class="home-advantages-list__item">
                <article class="home-advantages-card">
                  <div class="home-advantages-card__number">
                    <?php echo $key + 1 ?>
                  </div>
                  <div class="home-advantages-card__title">
                    <?php echo $item['text'] ?>
                  </div>
                </article>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </section>
      <?php endif; ?>

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
                <div class="home-projects-section__date">с 2013 по 2020 годы</div>
                <a href="#" class="home-projects-section__more">Смотреть все</a>
              </div>
            </div>
            <div class="home-projects-layout__info">
              <div class="home-projects-info">
                <div class="home-projects-info__title">
                  Многофункциональный Распределительный Центр X5. 36 000 м2
                </div>
                <div class="home-projects-info__desc">
                  Воронежская обл. Рамонский район, Айдаровское сельское поселение, Территория промышленная зона 4. II кв. 2014 г.- II кв. 2015
                </div>
              </div>
            </div>
            <div class="home-projects-layout__gallery">
              <div class="swiper projects-swiper-main">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <img src="<?php bloginfo('template_url') ?>/dist/images/slide.png" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php bloginfo('template_url') ?>/dist/images/slide.png" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php bloginfo('template_url') ?>/dist/images/slide.png" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php bloginfo('template_url') ?>/dist/images/slide.png" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php bloginfo('template_url') ?>/dist/images/slide.png" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php bloginfo('template_url') ?>/dist/images/slide.png" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php bloginfo('template_url') ?>/dist/images/slide.png" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php bloginfo('template_url') ?>/dist/images/slide.png" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php bloginfo('template_url') ?>/dist/images/slide.png" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php bloginfo('template_url') ?>/dist/images/slide.png" />
                  </div>
                </div>
              </div>
              <div thumbsSlider class="swiper projects-swiper-thumbs">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <img src="<?php bloginfo('template_url') ?>/dist/images/slide.png" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php bloginfo('template_url') ?>/dist/images/slide.png" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php bloginfo('template_url') ?>/dist/images/slide.png" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php bloginfo('template_url') ?>/dist/images/slide.png" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php bloginfo('template_url') ?>/dist/images/slide.png" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php bloginfo('template_url') ?>/dist/images/slide.png" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php bloginfo('template_url') ?>/dist/images/slide.png" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php bloginfo('template_url') ?>/dist/images/slide.png" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php bloginfo('template_url') ?>/dist/images/slide.png" />
                  </div>
                  <div class="swiper-slide">
                    <img src="<?php bloginfo('template_url') ?>/dist/images/slide.png" />
                  </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
              </div>
            </div>
          </div>
        </div>
      </section>


      <?php if ($partners = get_field('partners')): ?>
      <section class="home-partners">
        <div class="ui-container">
          <div class="home-partners__title"><?php echo $partners['title'] ?></div>
          <div class="home-partners__list">
            <div class="home-partners-list">
              <?php foreach ($partners['items'] as $key => $item): ?>
              <div class="home-partners-list__item">
                <div class="home-partners-item">
                  <img src="<?php echo $item['image']['url'] ?>" alt="" class="home-partners-item__image">
                  <?php if ($item['description']): ?>
                    <div class="home-partners-item__description">
                      <?php echo $item['description'] ?>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </section>
      <?php endif; ?>

      <section class="home-order">
        <div class="ui-container">
          <div class="home-order__title">Отправьте заявку или позвоните</div>

          <form action="/wp-json/contact-form-7/v1/contact-forms/234/feedback" method="post" class="home-order-form js-form">
            <div class="home-order-form__work-type">
              <input type="text" name="work-type" class="home-order-form__input" placeholder="Вид работ" />
            </div>

            <div class="home-order-form__address">
              <input type="text" name="address" class="home-order-form__input" placeholder="Местонахождение участка (область, край)" />
            </div>

            <div class="home-order-form__assignment">
              <input type="text" name="assignment" class="home-order-form__input" placeholder="Назначение объекта" />
            </div>
  
            <div class="home-order-form__contact-person">
              <span class="wpcf7-form-control-wrap contact-person">
                <input type="text" name="contact-person" class="home-order-form__input" placeholder="Контактное лицо*" />
              </span>
            </div>

            <div class="home-order-form__area">
              <input type="text" name="area" class="home-order-form__input" placeholder="Ориентировочная площадь, м2" />
            </div>

            <div class="home-order-form__contact-phone">
              <span class="wpcf7-form-control-wrap contact-phone">
                <input type="text" name="contact-phone" class="home-order-form__input" placeholder="Телефон*" />
              </span>
            </div>

            <div class="home-order-form__file">
              <span class="wpcf7-form-control-wrap your-file">
                <div class="ui-input-file">
                  <div class="ui-input-file__label">
                    <div class="ui-input-file__icon">
                      <svg width="16px" height="16px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.463 5.576c-.688-.75-1.929-.796-2.756.031l-8.1 8.1c-.21.21-.21.476 0 .686.21.21.476.21.686 0l6.7-6.7a1 1 0 0 1 1.414 1.414l-6.7 6.7a2.45 2.45 0 0 1-3.514 0 2.45 2.45 0 0 1 0-3.514l8.1-8.1c1.567-1.568 4.115-1.619 5.63.015 1.552 1.569 1.597 4.104-.03 5.613l-9.486 9.486c-2.19 2.19-5.624 2.19-7.814 0-2.19-2.19-2.19-5.624 0-7.814l8.1-8.1a1 1 0 0 1 1.414 1.414l-8.1 8.1c-1.41 1.41-1.41 3.576 0 4.986 1.41 1.41 3.576 1.41 4.986 0l9.5-9.5.031-.03c.75-.687.796-1.929-.031-2.756l-.03-.031z" />
                      </svg>
                    </div>
                    <div class="ui-input-file__filename">
                      Прикрепить файл
                    </div>
                  </div>
                  <div class="ui-input-file__desc">(не более 30 Мб)</div>
                  <input type="file" name="your-file" class="ui-input-file__input" />
                </div>
              </span>
            </div>

            <div class="home-order-form__rules">
              <span class="wpcf7-form-acceptance-wrap">
                <label class="ui-rules">
                  <input type="checkbox" name="rules" value="1" class="form-checkbox">
                  <span></span>
                  Прочитал(-а) <a href="<?php the_permalink(49) ?>" target="_blank">Пользовательское соглашение</a> и&nbsp;соглашаюсь с&nbsp;<a href="<?php the_permalink(3) ?>" target="_blank">Политикой конфиденциальности</a>
                </label>
              </span>
            </div>

            <div class="home-order-form__captcha">
              капча
            </div>

            <div class="home-order-form__submit">
              <button type="submit" class="home-order-form__submit-button">
                <span class="ui-loader-square home-order-form__loader"></span>
                Отправить
              </button>
            </div>

            <div class="home-order-form__success">
              <div class="home-order-result home-order-result_success">
                <div class="home-order-result__head">
                  <div class="home-order-result__head-icon"></div>
                  <div class="home-order-result__head-title">
                    Ваше сообщение
                    успешно отправлено
                  </div>
                </div>
                <div class="home-order-result__body">
                  <div class="home-order-result__body-text">
                    В ближайшее время мы свяжемся с вами.
                  </div>
                  <div class="home-order-result__body-close wpcf7-form-status-reset">
                    Закрыть окно
                  </div>
                </div>
              </div>
            </div>

            <div class="home-order-form__failed">
              <div class="home-order-result home-order-result_failed">
                <div class="home-order-result__head">
                  <div class="home-order-result__head-icon"></div>
                  <div class="home-order-result__head-title">
                    Возникла ошибка
                  </div>
                </div>
                <div class="home-order-result__body">
                  <div class="home-order-result__body-text">
                    Не удалось отправить сообщение
                  </div>
                  <div class="home-order-result__body-close wpcf7-form-status-reset">
                    Закрыть окно
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </section>
      
      <?php get_template_part('partials/footer');?>
    </div>
  </body>
</html>
