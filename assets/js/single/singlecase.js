import { Popover } from 'bootstrap';
import { Swiper } from 'swiper/bundle';

const productThumbSwiper = new Swiper('.productThumbSwiper', {
  slidesPerView: 4,
  spaceBetween: 10,
  watchSlidesVisibility: true,
})
const productMainSwiper = new Swiper('.productMainSwiper', {
    thumbs: {
      swiper: productThumbSwiper
    }
})

function insertColroStyle(arr) {
  const colorStyle = document.createElement('style');
  arr.forEach( ( color ) => {
    colorStyle.innerHTML += `
    .bg-${color} {
      background-color: #${color};
    }
    `;
  } );
  document.head.appendChild(colorStyle);
}

function popoverInit() {
  const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
  const popoverList = [...popoverTriggerList].map( (popoverTriggerEl) => {
    const title = popoverTriggerEl.dataset.title;
    const rgb = popoverTriggerEl.dataset.rgb;
    const cymk = popoverTriggerEl.dataset.cymk;
    const hex = popoverTriggerEl.dataset.hex; 
    new Popover(popoverTriggerEl, {
    content: `
      <div class="tile-color bg-${hex} me-6"></div>
      <div>
        <div class="d-flex align-items-center mb-2">
          <h2 class="me-2 mb-0">${title}</h2>
          <a href="#" class="btn btn-y-center btn-secondary">
            <img src="${search_icon}" alt="info icon" class="me-2"/>
            <span>加入詢問箱</span>
          </a>
        </div>
        <div class="mb-2 d-flex align-items-center text-small">
          <p class="btn btn-gray3 w-35 text-center me-2">CMYK</p>
          <p class="w-65">${cymk}</p>
        </div>
        <div class="mb-2 d-flex align-items-center text-small">
          <p class="btn btn-gray3 w-35 text-center me-2">RGB</p>
          <p class="w-65">${rgb}</p>
        </div>
        <a href="" class="btn btn-lg btn-outline-secondary text-center">
          相關案例
        </a>
      </div>
    `,
    html: true,
    trigger: 'focus'
  })})
}
insertColroStyle(color_arr)
popoverInit()