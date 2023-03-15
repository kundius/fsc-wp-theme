
<section class="home-order">
  <div class="ui-container">
    <div class="home-order__title">Отправьте заявку или позвоните</div>
      
    <form action="/wp-json/contact-form-7/v1/contact-forms/5/feedback" method="post" class="home-order-form js-form">
      <div class="home-order-form__grid">
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

        <!-- <div class="home-order-form__captcha">
          капча
        </div> -->

        <div class="home-order-form__submit">
          <button type="submit" class="home-order-form__submit-button">
            <span class="ui-loader-square home-order-form__loader"></span>
            Отправить
          </button>
        </div>
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
