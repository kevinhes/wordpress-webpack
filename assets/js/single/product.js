import * as DropDown from '../components/dropdownbanner.js';
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