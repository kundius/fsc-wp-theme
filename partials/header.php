<section class="header">
  <div class="ui-container header__container">
    
    <button class="header__toggle">
      <span></span>
      <span></span>
      <span></span>
    </button>

    <div class="header__logo">
      <a href="/">
        <img src="<?php bloginfo('template_url') ?>/dist/images/logo.png" alt="<?php bloginfo('name') ?>" />
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

      <button class="header-contacts__button" data-hystmodal="#feedback">
        <svg xmlns="http://www.w3.org/2000/svg" width="19px" height="14px" viewBox="0 0 15 11">
          <path d="M0.794,10.758 L14.325,10.758 C14.362,10.758 14.398,10.750 14.430,10.735 L9.794,6.388 L7.559,9.093 L5.325,6.388 L0.689,10.735 C0.721,10.750 0.757,10.758 0.794,10.758 ZM0.547,10.383 L4.580,5.486 L0.547,0.604 L0.547,10.383 ZM0.869,0.240 L0.985,0.328 L7.559,7.340 L14.134,0.328 L14.250,0.240 L0.869,0.240 ZM14.572,0.604 L10.539,5.486 L14.572,10.383 L14.572,0.604 Z" />
        </svg>
      </button>
    </div>

  </div>
</section>
