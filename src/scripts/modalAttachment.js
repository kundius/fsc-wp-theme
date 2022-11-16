import { modal } from './modal'

let queue = [];
let current = null;

const triggerButtons = document.querySelectorAll("[data-modal-attachment]") || [];
const modalAttachment = document.getElementById("modal-attachment");
const title = modalAttachment.querySelector('.modal-attachment__title');
const description = modalAttachment.querySelector('.modal-attachment__description');
const image = modalAttachment.querySelector('.modal-attachment__figure-image');
const prev = modalAttachment.querySelector('.modal-attachment__prev');
const next = modalAttachment.querySelector('.modal-attachment__next');

function loadAttachment (id) {
  const formData = new FormData();
  formData.append("id", id);
  formData.append("action", "get_attachment");

  const request = new XMLHttpRequest();
  request.open("POST", theme_ajax.url, true);
  request.addEventListener("readystatechange", function () {
    if (this.readyState != 4) return;

    const response = JSON.parse(request.response);

    if (response.success) {
      title.innerHTML = response.data.title;
      description.innerHTML = response.data.caption;
      image.src = response.data.url;

      modal.open("#modal-attachment");
    }
  });

  request.send(formData);
}

prev.addEventListener('click', (e) => {
  e.preventDefault();

  if (queue.length <= 1) return;

  const indexCurrent = queue.indexOf(current);

  if (indexCurrent == -1) return;

  if (indexCurrent == 0) {
    current = queue[queue.length - 1];
  } else {
    current = queue[indexCurrent - 1];
  }

  loadAttachment(current);
});

next.addEventListener('click', (e) => {
  e.preventDefault();

  if (queue.length <= 1) return;

  const indexCurrent = queue.indexOf(current);

  if (indexCurrent == -1) return;

  if (indexCurrent == queue.length - 1) {
    current = queue[0];
  } else {
    current = queue[indexCurrent + 1];
  }

  loadAttachment(current);
});

triggerButtons.forEach((button) => {
  button.addEventListener("click", (e) => {
    e.preventDefault();
    current = button.dataset.modalAttachment;
    if (button.dataset.modalAttachmentQueue) {
      queue = button.dataset.modalAttachmentQueue.split(',');
    }
    loadAttachment(current);
  });
});
