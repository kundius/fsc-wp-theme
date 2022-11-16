<?php
$products = new WP_Query([
  'post_type' => 'page',
  'post_parent' => 52,
  'order' => 'ASC',
  'orderby' => 'menu_order',
]);
?>

<div class="hystmodal hystmodal--small" id="feedback" aria-hidden="true">
  <div class="hystmodal__wrap">
    <div class="hystmodal__window" role="dialog" aria-modal="true">
      <button data-hystclose class="hystmodal__close"></button>

      <form action="/wp-json/contact-form-7/v1/contact-forms/234/feedback" method="post" class="modal-form js-form">
        <div class="modal-form__title">
          Заказать расчет
        </div>

        <div class="modal-form__field">
          <input type="text" name="your-name" class="ui-input" placeholder="Контактное лицо:" />
        </div>

        <div class="modal-form__field">
          <input type="text" name="your-company" class="ui-input" placeholder="Компания:" />
        </div>

        <div class="modal-form__field">
          <span class="wpcf7-form-control-wrap your-phone">
            <input type="tel" name="your-phone" value="" class="ui-input" placeholder="Телефон*">
          </span>
        </div>

        <div class="modal-form__field">
          <input type="email" name="your-email" class="ui-input" placeholder="E-mail:" />
        </div>

        <div class="modal-form__field">
          <textarea rows="4" name="your-message" class="ui-textarea" placeholder="Техническое задание:"></textarea>
        </div>

        <div class="modal-form__file">
          <span class="wpcf7-form-control-wrap your-file">
            <div class="ui-input-file">
              <div class="ui-input-file__icon">
                <svg width="16px" height="16px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path d="M19.463 5.576c-.688-.75-1.929-.796-2.756.031l-8.1 8.1c-.21.21-.21.476 0 .686.21.21.476.21.686 0l6.7-6.7a1 1 0 0 1 1.414 1.414l-6.7 6.7a2.45 2.45 0 0 1-3.514 0 2.45 2.45 0 0 1 0-3.514l8.1-8.1c1.567-1.568 4.115-1.619 5.63.015 1.552 1.569 1.597 4.104-.03 5.613l-9.486 9.486c-2.19 2.19-5.624 2.19-7.814 0-2.19-2.19-2.19-5.624 0-7.814l8.1-8.1a1 1 0 0 1 1.414 1.414l-8.1 8.1c-1.41 1.41-1.41 3.576 0 4.986 1.41 1.41 3.576 1.41 4.986 0l9.5-9.5.031-.03c.75-.687.796-1.929-.031-2.756l-.03-.031z" />
                </svg>
              </div>
              <div class="ui-input-file__label">Прикрепить файл</div>
              <div class="ui-input-file__desc">(не более 30 Мб)</div>
              <input type="file" name="your-file" class="ui-input-file__input" />
            </div>
          </span>
        </div>

        <div class="modal-form__note">
          Поля, отмеченные *, обязательны для заполнения
        </div>

        <div class="modal-form__rules">
          <span class="wpcf7-form-acceptance-wrap">
            <label class="ui-rules">
              <input type="checkbox" name="rules" value="1" class="form-checkbox">
              <span></span>
              Прочитал(-а) <a href="<?php the_permalink(49) ?>" target="_blank">Пользовательское соглашение</a> и&nbsp;соглашаюсь с&nbsp;<a href="<?php the_permalink(3) ?>" target="_blank">Политикой конфиденциальности</a>
            </label>
          </span>
        </div>

        <div class="modal-form__submit">
          <button type="submit" class="ui-button-submit ui-button-submit_glare">
            <span class="ui-loader-square modal-form__loader"></span>
            Отправить
          </button>
        </div>

        <div class="modal-form__success">
          <div class="modal-form-result modal-form-result_success">
            <div class="modal-form-result__head">
              <div class="modal-form-result__head-icon"></div>
              <div class="modal-form-result__head-title">
                Ваше сообщение
                успешно отправлено
              </div>
            </div>
            <div class="modal-form-result__body">
              <div class="modal-form-result__body-text">
                В ближайшее время<br />
                мы свяжемся с вами.
              </div>
              <div class="modal-form-result__body-close wpcf7-form-status-reset">
                Закрыть окно
              </div>
            </div>
          </div>
        </div>

        <div class="modal-form__failed">
          <div class="modal-form-result modal-form-result_failed">
            <div class="modal-form-result__head">
              <div class="modal-form-result__head-icon"></div>
              <div class="modal-form-result__head-title">
                Возникла ошибка
              </div>
            </div>
            <div class="modal-form-result__body">
              <div class="modal-form-result__body-text">
                Не удалось<br />
                отправить сообщение
              </div>
              <div class="modal-form-result__body-close wpcf7-form-status-reset">
                Закрыть окно
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="hystmodal hystmodal--small" id="modal-callback" aria-hidden="true">
  <div class="hystmodal__wrap">
    <div class="hystmodal__window" role="dialog" aria-modal="true">
      <button data-hystclose class="hystmodal__close"></button>

      <form action="/wp-json/contact-form-7/v1/contact-forms/19/feedback" method="post" class="modal-form js-form">
        <div class="modal-form__title">
          Заказать<br />
          обратный звонок
        </div>

        <div class="modal-form__field">
          <input type="text" name="your-name" class="ui-input" placeholder="Имя:" />
        </div>

        <div class="modal-form__field">
          <span class="wpcf7-form-control-wrap your-phone">
            <input type="tel" name="your-phone" value="" class="ui-input" placeholder="Телефон*">
          </span>
        </div>

        <div class="modal-form__note">
          Поля, отмеченные *, обязательны для заполнения
        </div>

        <div class="modal-form__rules">
          <span class="wpcf7-form-acceptance-wrap">
            <label class="ui-rules">
              <input type="checkbox" name="rules" value="1" class="form-checkbox">
              <span></span>
              Прочитал(-а) <a href="<?php the_permalink(49) ?>" target="_blank">Пользовательское соглашение</a> и&nbsp;соглашаюсь с&nbsp;<a href="<?php the_permalink(3) ?>" target="_blank">Политикой конфиденциальности</a>
            </label>
          </span>
        </div>

        <div class="modal-form__submit">
          <button type="submit" class="ui-button-submit ui-button-submit_glare">
            <span class="ui-loader-square modal-form__loader"></span>
            Отправить
          </button>
        </div>

        <div class="modal-form__success">
          <div class="modal-form-result modal-form-result_success">
            <div class="modal-form-result__head">
              <div class="modal-form-result__head-icon"></div>
              <div class="modal-form-result__head-title">
                Ваше сообщение
                успешно отправлено
              </div>
            </div>
            <div class="modal-form-result__body">
              <div class="modal-form-result__body-text">
                В ближайшее время<br />
                мы свяжемся с вами.
              </div>
              <div class="modal-form-result__body-close wpcf7-form-status-reset">
                Закрыть окно
              </div>
            </div>
          </div>
        </div>

        <div class="modal-form__failed">
          <div class="modal-form-result modal-form-result_failed">
            <div class="modal-form-result__head">
              <div class="modal-form-result__head-icon"></div>
              <div class="modal-form-result__head-title">
                Возникла ошибка
              </div>
            </div>
            <div class="modal-form-result__body">
              <div class="modal-form-result__body-text">
                Не удалось<br />
                отправить сообщение
              </div>
              <div class="modal-form-result__body-close wpcf7-form-status-reset">
                Закрыть окно
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="hystmodal hystmodal--order" id="modal-order" aria-hidden="true">
  <div class="hystmodal__wrap">
    <div class="hystmodal__window" role="dialog" aria-modal="true">
      <button data-hystclose class="hystmodal__close"></button>

      <form action="/wp-json/contact-form-7/v1/contact-forms/12/feedback" method="post" class="order-form js-form">
        <input type="hidden" name="pre-product" value="" />

        <div class="order-form__process">
          <div class="order-form-headline">
            <div class="order-form-headline__title">
              Заказать аренду
            </div>
            <div class="order-form-headline__subtitle">
            </div>
            <div class="order-form-headline__desc">
              Поля, отмеченные *, обязательны для заполнения
            </div>
          </div>

          <div class="order-form-data">
            <div class="order-form-data__item">
              <input type="text" name="your-name" class="ui-input" placeholder="Имя:" />
            </div>

            <div class="order-form-data__item">
              <input type="text" name="your-company" class="ui-input" placeholder="Компания:" />
            </div>

            <div class="order-form-data__item">
              <span class="wpcf7-form-control-wrap your-phone">
                <input type="tel" name="your-phone" value="" class="ui-input" placeholder="Телефон*:">
              </span>
            </div>

            <div class="order-form-data__item">
              <span class="wpcf7-form-control-wrap your-email">
                <input type="email" name="your-email" value="" class="ui-input" placeholder="E-mail:">
              </span>
            </div>
          </div>

          <div class="order-form-products">
            <div class="order-form-products__title">Хочу арендовать:</div>
            
            <div class="order-form-products__group">
              <?php while ($products->have_posts()): ?>
              <?php $products->the_post()?>
              <div class="order-form-products__group-item">
                <label class="ui-checkbox-field">
                  <input type="checkbox" name="product" value="<?php the_title() ?>">
                  <span></span>
                  <?php the_title() ?>
                </label>
              </div>
              <?php endwhile?>
              <?php wp_reset_postdata()?>
            </div>
          </div>

          <div class="order-form__field">
            <textarea rows="4" name="your-message" class="ui-textarea" placeholder="Техническое задание:"></textarea>
          </div>

          <div class="order-form__file">
            <span class="wpcf7-form-control-wrap your-file">
              <div class="ui-input-file">
                <div class="ui-input-file__icon">
                  <svg width="16px" height="16px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.463 5.576c-.688-.75-1.929-.796-2.756.031l-8.1 8.1c-.21.21-.21.476 0 .686.21.21.476.21.686 0l6.7-6.7a1 1 0 0 1 1.414 1.414l-6.7 6.7a2.45 2.45 0 0 1-3.514 0 2.45 2.45 0 0 1 0-3.514l8.1-8.1c1.567-1.568 4.115-1.619 5.63.015 1.552 1.569 1.597 4.104-.03 5.613l-9.486 9.486c-2.19 2.19-5.624 2.19-7.814 0-2.19-2.19-2.19-5.624 0-7.814l8.1-8.1a1 1 0 0 1 1.414 1.414l-8.1 8.1c-1.41 1.41-1.41 3.576 0 4.986 1.41 1.41 3.576 1.41 4.986 0l9.5-9.5.031-.03c.75-.687.796-1.929-.031-2.756l-.03-.031z" />
                  </svg>
                </div>
                <div class="ui-input-file__label">Прикрепить файл</div>
                <div class="ui-input-file__desc">(не более 30 Мб)</div>
                <input type="file" name="your-file" class="ui-input-file__input" />
              </div>
            </span>
          </div>

          <div class="order-form__rules">
            <span class="wpcf7-form-acceptance-wrap">
              <label class="ui-rules">
                <input type="checkbox" name="rules" value="1" class="form-checkbox">
                <span></span>
                Прочитал(-а) <a href="<?php the_permalink(49) ?>" target="_blank">Пользовательское соглашение</a> и&nbsp;соглашаюсь с&nbsp;<a href="<?php the_permalink(3) ?>" target="_blank">Политикой конфиденциальности</a>
              </label>
            </span>
          </div>

          <div class="order-form__submit">
            <button type="submit" class="ui-button-submit ui-button-submit_glare">
              <span class="ui-loader-square order-form__loader"></span>
              Отправить
            </button>
          </div>
        </div>

        <div class="order-form__success">
          <div class="order-form-result order-form-result_success">
            <div class="order-form-result__head">
              <div class="order-form-result__head-icon"></div>
              <div class="order-form-result__head-title">
                Ваше сообщение
                успешно отправлено
              </div>
            </div>
            <div class="order-form-result__body">
              <div class="order-form-result__body-text">
                В ближайшее время<br />
                мы свяжемся с вами.
              </div>
              <div class="order-form-result__body-close wpcf7-form-status-reset">
                Закрыть окно
              </div>
            </div>
          </div>
        </div>

        <div class="order-form__failed">
          <div class="order-form-result order-form-result_failed">
            <div class="order-form-result__head">
              <div class="order-form-result__head-icon"></div>
              <div class="order-form-result__head-title">
                Возникла ошибка
              </div>
            </div>
            <div class="order-form-result__body">
              <div class="order-form-result__body-text">
                Не удалось<br />
                отправить сообщение
              </div>
              <div class="order-form-result__body-close wpcf7-form-status-reset">
                Закрыть окно
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="hystmodal hystmodal--attachment" id="modal-attachment" aria-hidden="true">
  <div class="hystmodal__wrap">
    <div class="hystmodal__window" role="dialog" aria-modal="true">
      <button data-hystclose class="hystmodal__close"></button>

      <div class="modal-attachment">
        <div class="modal-attachment__figure">
          <div class="modal-attachment__figure-wrap">
            <img src="" alt="" class="modal-attachment__figure-image" />
          </div>
          <button class="modal-attachment__prev"></button>
          <button class="modal-attachment__next"></button>
        </div>
        <div class="modal-attachment__info">
          <div class="modal-attachment__title"></div>
          <div class="modal-attachment__description"></div>
        </div>
      </div>
    </div>
  </div>
</div>
