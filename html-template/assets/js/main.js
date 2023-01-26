const upload_btn = document.querySelector(".upload");
const close_btn = document.querySelector(".close-btn");
const modal = document.querySelector(".modal-nav");
const modal_content = document.querySelector(".modal-con");

function open_modal() {
  modal.classList.toggle("hide");
  modal_content.classList.toggle("hide");
}

modal.addEventListener("click", open_modal);
close_btn.addEventListener("click", open_modal);
