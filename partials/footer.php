<?php
$service_pages = new WP_Query([
  'post_type' => 'page',
  'post_parent' => 11,
  'order' => 'ASC',
  'orderby' => 'menu_order',
]);
?>
<section class="footer-section">
  <div class="ui-container">
    <div class="underground">
      <div class="underground-layout">
        <div class="underground-layout__contacts">
          <div class="underground-contacts" itemscope="" itemtype="http://schema.org/Organization">
            <div class="underground-contacts__title">Контакты</div>
            <div class="underground-contacts__details">
              <div class="underground-contacts__address">
                <span itemprop="name">ООО «ФинСтройКонсалт»</span><br />
                <span itemprop="address"><?php the_field('theme_address', 'options') ?></span>
              </div>
              <div class="underground-contacts__phone">
                <a href="tel:<?php echo preg_replace('/[^0-9]/', '', get_field('theme_phone', 'options')) ?>">
                  <svg xmlns="http://www.w3.org/2000/svg" width="25px" height="25px" viewBox="0 0 25 25">
                    <path d="M12.912,24.142 C6.282,24.142 0.907,18.741 0.907,12.78 C0.907,5.415 6.282,0.14 12.912,0.14 C19.542,0.14 24.916,5.415 24.916,12.78 C24.916,18.741 19.542,24.142 12.912,24.142 ZM12.815,2.359 C7.460,2.359 3.119,6.722 3.119,12.104 C3.119,17.484 7.460,21.848 12.815,21.848 C18.170,21.848 22.511,17.484 22.511,12.104 C22.511,6.722 18.170,2.359 12.815,2.359 ZM17.63,16.688 L17.61,16.689 C17.62,16.690 16.283,17.150 16.283,17.150 L14.652,14.380 L15.430,13.917 C15.599,13.817 15.816,13.870 15.916,14.40 C15.917,14.42 17.187,16.196 17.187,16.196 L17.187,16.196 C17.283,16.360 17.241,16.582 17.63,16.688 ZM10.901,13.515 C8.611,9.514 9.835,7.749 10.267,7.424 L11.936,10.255 C11.534,10.493 11.727,11.31 11.967,11.556 C11.970,11.581 13.127,13.538 13.137,13.546 C13.735,14.359 14.59,14.734 14.444,14.506 L16.71,17.270 C15.610,17.556 13.314,17.731 10.901,13.515 ZM12.928,9.666 L12.927,9.667 C12.927,9.669 12.149,10.130 12.149,10.130 L10.482,7.296 L11.260,6.833 C11.428,6.734 11.645,6.787 11.746,6.958 C11.746,6.959 13.53,9.175 13.53,9.175 L13.53,9.177 C13.148,9.340 13.106,9.560 12.928,9.666 Z"/>
                  </svg>
                  <span itemprop="telephone"><?php the_field('theme_phone', 'options') ?></span>
                </a>
              </div>
              <div class="underground-contacts__email">
                <a href="mailto:<?php the_field('theme_email', 'options') ?>">
                  <svg xmlns="http://www.w3.org/2000/svg" width="19px" height="14px" viewBox="0 0 15 11">
                    <path d="M0.794,10.758 L14.325,10.758 C14.362,10.758 14.398,10.750 14.430,10.735 L9.794,6.388 L7.559,9.093 L5.325,6.388 L0.689,10.735 C0.721,10.750 0.757,10.758 0.794,10.758 ZM0.547,10.383 L4.580,5.486 L0.547,0.604 L0.547,10.383 ZM0.869,0.240 L0.985,0.328 L7.559,7.340 L14.134,0.328 L14.250,0.240 L0.869,0.240 ZM14.572,0.604 L10.539,5.486 L14.572,10.383 L14.572,0.604 Z" />
                  </svg>
                  <span itemprop="email"><?php the_field('theme_email', 'options') ?></span>
                </a>
              </div>
              <div class="underground-contacts__map">
                <a href="<?php the_field('theme_map-link', 'options') ?>" target="_blank">
                  <svg xmlns="http://www.w3.org/2000/svg" width="15" height="20" viewBox="0 0 15 20">
                    <path d="M7.5 0c3.672 0 5.364 2.187 6.25 3.75.573 1.01 1.32 2.835 1.25 4.374-.043.954-.625 1.875-.625 1.875L7.5 20v-7.5a5 5 0 1 0 0-10zm0 20L.625 10S.043 9.077 0 8.123C-.07 6.584.677 4.76 1.25 3.75 2.135 2.187 3.828 0 7.5 0"/>
                  </svg>
                  Мы на карте
                </a>
              </div>
            </div>
            <ul class="underground-contacts__links">
              <li>
                <a href="<?php the_permalink(49)?>" target="_blank">Пользовательское соглашение</a>
              </li>
              <li>
                <a href="<?php the_permalink(3)?>" target="_blank">Политика обработки персональных данных</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="underground-layout__services">
            <div class="underground-services__title">Услуги</div>
            <ul class="underground-services__list">
              <?php while ($service_pages->have_posts()): ?>
              <?php $service_pages->the_post()?>
              <li>
                <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
              </li>
              <?php endwhile?>
              <?php wp_reset_postdata()?>
            </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="ui-container">
    <div class="footer">
      <div class="footer__copyright">
        <?php the_field('theme_copyright', 'options') ?>
      </div>
      <div class="footer__gap-1"></div>
      <div class="footer__map">
        <a href="<?php the_permalink(297) ?>">Карта сайта</a>
      </div>
      <div class="footer__gap-2"></div>
      <div class="footer__counters">
        <?php the_field('theme_counters', 'options') ?>
      </div>
      <div class="footer__gap-3"></div>
      <div class="footer__creator">
        <a href="https://domenart-studio.ru/" target="_blank">
          <img src="<?php bloginfo('template_url')?>/dist/images/creator.png" alt="Разработка и продвижение сайтов «ДоменАРТ»" />
        </a>
      </div>
    </div>
  </div>
</section>

<button class="scroll-up">
  <span>Наверх</span>
</button>

<div class="drawer">
  <button class="drawer__overlay"></button>

  <div class="drawer__body">
    <button class="drawer__close"></button>

    <div class="drawer__content">
      <div class="drawer-headline">
        <div class="drawer-headline__about">
          <a href="/" class="drawer-headline__logo">
            <img src="<?php bloginfo('template_url')?>/dist/images/logo.png" alt="<?php bloginfo('name')?>" />
          </a>
          <a href="tel:<?php the_field('theme_phone', 'options') ?>" class="drawer-headline__phone">
            <?php the_field('theme_phone', 'options') ?>
          </a>
        </div>
        <button class="drawer-headline__feedback" data-hystmodal="#feedback">
          <svg xmlns="http://www.w3.org/2000/svg" width="19px" height="14px" viewBox="0 0 15 11">
            <path d="M0.794,10.758 L14.325,10.758 C14.362,10.758 14.398,10.750 14.430,10.735 L9.794,6.388 L7.559,9.093 L5.325,6.388 L0.689,10.735 C0.721,10.750 0.757,10.758 0.794,10.758 ZM0.547,10.383 L4.580,5.486 L0.547,0.604 L0.547,10.383 ZM0.869,0.240 L0.985,0.328 L7.559,7.340 L14.134,0.328 L14.250,0.240 L0.869,0.240 ZM14.572,0.604 L10.539,5.486 L14.572,10.383 L14.572,0.604 Z" />
          </svg>
        </button>
      </div>

      <?php wp_nav_menu([
        'container' => false,
        'theme_location' => 'menu-main',
        'menu_class' => 'drawer-menu',
      ]);?>

      <div class="drawer-contacts">
        <a href="mail:info@euromonolit.com" class="drawer-contacts__email">
          <span class="drawer-contacts__email-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="19px" height="14px" viewBox="0 0 15 11">
              <path d="M0.794,10.758 L14.325,10.758 C14.362,10.758 14.398,10.750 14.430,10.735 L9.794,6.388 L7.559,9.093 L5.325,6.388 L0.689,10.735 C0.721,10.750 0.757,10.758 0.794,10.758 ZM0.547,10.383 L4.580,5.486 L0.547,0.604 L0.547,10.383 ZM0.869,0.240 L0.985,0.328 L7.559,7.340 L14.134,0.328 L14.250,0.240 L0.869,0.240 ZM14.572,0.604 L10.539,5.486 L14.572,10.383 L14.572,0.604 Z" />
            </svg>
          </span>
          <span class="drawer-contacts__email-text">info@euromonolit.com</span>
        </a>
        <div class="drawer-contacts__time">
          <strong>График работы:</strong><br />
            <?php the_field('theme_schedule', 'options') ?>
        </div>
      </div>

      <div class="drawer-addess">
        <div class="drawer-addess__item">
          <div class="drawer-addess__item-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="13px" height="18px" viewBox="0 0 13 18">
              <path d="M6.499,3.308 C8.306,3.308 9.774,4.833 9.774,6.709 C9.774,8.586 8.306,10.110 6.499,10.110 C4.692,10.110 3.224,8.586 3.224,6.709 C3.224,4.834 4.694,3.308 6.499,3.308 L6.499,3.308 ZM6.504,0.6 C10.106,0.41 12.999,2.973 12.999,6.741 C12.999,6.994 12.984,7.255 12.957,7.506 C12.592,10.863 9.174,15.473 6.925,17.809 C6.690,18.53 6.308,18.53 6.73,17.809 C3.824,15.473 0.406,10.863 0.41,7.506 C0.14,7.255 0.0,6.994 0.0,6.741 C0.0,2.980 2.893,0.34 6.494,0.6 L6.504,0.6 L6.504,0.6 ZM6.499,1.239 C3.564,1.276 1.204,3.674 1.204,6.741 C1.204,6.865 1.207,6.969 1.211,7.55 C1.369,10.55 4.550,14.333 6.499,16.470 C8.397,14.389 11.447,10.263 11.762,7.369 C11.784,7.157 11.794,6.954 11.794,6.741 C11.794,3.674 9.434,1.276 6.499,1.239 L6.499,1.239 ZM6.499,4.559 C5.352,4.559 4.429,5.518 4.429,6.709 C4.429,7.897 5.354,8.859 6.499,8.859 C7.643,8.859 8.569,7.898 8.569,6.709 C8.569,5.519 7.644,4.559 6.499,4.559 L6.499,4.559 Z" />
            </svg>
          </div>
          <div class="drawer-addess__item-body">
            <div class="drawer-addess__item-title">Офис:</div>
            <div class="drawer-addess__item-content">
              <?php the_field('theme_address-office', 'options') ?>
            </div>
          </div>
        </div>
        <div class="drawer-addess__item">
          <div class="drawer-addess__item-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="13px" height="18px" viewBox="0 0 13 18">
              <path d="M6.499,3.308 C8.306,3.308 9.774,4.833 9.774,6.709 C9.774,8.586 8.306,10.110 6.499,10.110 C4.692,10.110 3.224,8.586 3.224,6.709 C3.224,4.834 4.694,3.308 6.499,3.308 L6.499,3.308 ZM6.504,0.6 C10.106,0.41 12.999,2.973 12.999,6.741 C12.999,6.994 12.984,7.255 12.957,7.506 C12.592,10.863 9.174,15.473 6.925,17.809 C6.690,18.53 6.308,18.53 6.73,17.809 C3.824,15.473 0.406,10.863 0.41,7.506 C0.14,7.255 0.0,6.994 0.0,6.741 C0.0,2.980 2.893,0.34 6.494,0.6 L6.504,0.6 L6.504,0.6 ZM6.499,1.239 C3.564,1.276 1.204,3.674 1.204,6.741 C1.204,6.865 1.207,6.969 1.211,7.55 C1.369,10.55 4.550,14.333 6.499,16.470 C8.397,14.389 11.447,10.263 11.762,7.369 C11.784,7.157 11.794,6.954 11.794,6.741 C11.794,3.674 9.434,1.276 6.499,1.239 L6.499,1.239 ZM6.499,4.559 C5.352,4.559 4.429,5.518 4.429,6.709 C4.429,7.897 5.354,8.859 6.499,8.859 C7.643,8.859 8.569,7.898 8.569,6.709 C8.569,5.519 7.644,4.559 6.499,4.559 L6.499,4.559 Z" />
            </svg>
          </div>
          <div class="drawer-addess__item-body">
            <div class="drawer-addess__item-title">Склад:</div>
            <div class="drawer-addess__item-content">
              <?php the_field('theme_address-warehouse', 'options') ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_template_part('partials/modals') ?>

<?php wp_footer() ?>
