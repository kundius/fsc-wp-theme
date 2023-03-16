import { modal } from './modal'

const callbackOrModalItems = document.querySelectorAll('.js-callback-or-modal') || [];
callbackOrModalItems.forEach(function (item) {
  item.addEventListener('click', (e) => {
    if (window.matchMedia("(min-width: 640px)").matches) {
      e.preventDefault();
      modal.open("#modal-callback");
    }
  });
});
