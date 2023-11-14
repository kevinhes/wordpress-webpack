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

const addQaBtn = document.querySelector('.addQaBtn');
addQaBtn.addEventListener('click', (e) => {
  e.preventDefault();
  const postId = addQaBtn.dataset.postid;
  let postIds = getCookie("postIds");
  if (postIds) {
    postIds = postIds.split(','); // 如果 Cookie 存在，將字符串轉換成數組
  } else {
    postIds = [];
  }

  console.log(postIds);

  if (!postIds.includes(postId)) {
    // 添加新的 postId 到數組
    postIds.push(postId);

    let expires = new Date();
    expires.setTime(expires.getTime() + (24 * 60 * 60 * 1000)); // 當前時間加上 24 小時

    // 更新 Cookie，包括過期時間
    document.cookie = "postIds=" + postIds.join(',') + "; expires=" + expires.toUTCString() + "; path=/";
  }
})

function getCookie(name) {
  let cookies = document.cookie.split('; ');
  for (let i = 0; i < cookies.length; i++) {
    let parts = cookies[i].split('=');
    if (parts[0] == name) {
      return parts[1];
    }
  }
  return "";
}