import { modal } from './modal'

const specialOfferSmItems = document.querySelectorAll('.special-offer-sm') || [];

specialOfferSmItems.forEach(function (item) {
  const close = item.querySelector('.special-offer-sm__close');
  close.addEventListener('click', () => {
    item.style.display = 'none';
  });
});
const callbackOrModalItems = document.querySelectorAll('.js-callback-or-modal') || [];

callbackOrModalItems.forEach(function (item) {
  item.addEventListener('click', (e) => {
    if (window.matchMedia("(min-width: 640px)").matches) {
      e.preventDefault();
      modal.open("#modal-callback");
    }
  });
});
