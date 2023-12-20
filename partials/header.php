<section class="header">
  <div class="ui-container header__container">
    <?php if (is_new_year()): ?>
    <div class="header_new_year_left_top_2"></div>
    <div class="header_new_year_right_top_2"></div>
    <div class="header_new_year_middle_top_1"></div>
    <?php endif; ?>
    
    <button class="header__toggle">
      <span></span>
      <span></span>
      <span></span>
    </button>

    <div class="header-logo">
      <a href="/" class="header-logo__link">
        <img src="<?php bloginfo('template_url') ?>/dist/images/logo-small.png" alt="<?php bloginfo('name') ?>" class="header-logo__image" />
        <span class="header-logo__text">ФинСтройКонсалт</span>
      </a>
    </div>

    <?php wp_nav_menu([
      'container' => false,
      'theme_location' => 'menu-main',
      'menu_class' => 'header__menu'
    ]); ?>

    <div class="header-contacts">
      <div class="header-contacts__links">
        <a href="tel:<?php the_field('theme_phone', 'options') ?>" class="header-contacts__phone js-callback-or-modal">
          <?php the_field('theme_phone', 'options') ?>
        </a>
        <a href="mailto:<?php the_field('theme_email', 'options') ?>" class="header-contacts__email">
          <svg xmlns="http://www.w3.org/2000/svg" width="19px" height="14px" viewBox="0 0 15 11">
            <path d="M0.794,10.758 L14.325,10.758 C14.362,10.758 14.398,10.750 14.430,10.735 L9.794,6.388 L7.559,9.093 L5.325,6.388 L0.689,10.735 C0.721,10.750 0.757,10.758 0.794,10.758 ZM0.547,10.383 L4.580,5.486 L0.547,0.604 L0.547,10.383 ZM0.869,0.240 L0.985,0.328 L7.559,7.340 L14.134,0.328 L14.250,0.240 L0.869,0.240 ZM14.572,0.604 L10.539,5.486 L14.572,10.383 L14.572,0.604 Z" />
          </svg>
          <?php the_field('theme_email', 'options') ?>
        </a>
      </div>

      <button class="header-contacts__button header-contacts__button-feedback" data-hystmodal="#feedback">
        <svg xmlns="http://www.w3.org/2000/svg" width="19px" height="14px" viewBox="0 0 15 11">
          <path d="M0.794,10.758 L14.325,10.758 C14.362,10.758 14.398,10.750 14.430,10.735 L9.794,6.388 L7.559,9.093 L5.325,6.388 L0.689,10.735 C0.721,10.750 0.757,10.758 0.794,10.758 ZM0.547,10.383 L4.580,5.486 L0.547,0.604 L0.547,10.383 ZM0.869,0.240 L0.985,0.328 L7.559,7.340 L14.134,0.328 L14.250,0.240 L0.869,0.240 ZM14.572,0.604 L10.539,5.486 L14.572,10.383 L14.572,0.604 Z" />
        </svg>
      </button>

      <a href="tel:<?php the_field('theme_phone', 'options') ?>" class="header-contacts__button header-contacts__button-callback js-callback-or-modal">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
          <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z" clip-rule="evenodd" />
        </svg>
      </a>
    </div>

  </div>
</section>

<div class="header-placeholder"></div>
