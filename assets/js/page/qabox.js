import $ from 'jquery';

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

let postIds = getCookie("postIds");
if (postIds) {
  postIds = postIds.split(','); // 如果 Cookie 存在，將字符串轉換成數組
} else {
  postIds = [];
}

const qaList  = document.querySelector('.qa-list');
const qaInput = document.querySelector('[name="textarea-593"]');
const formSubmit = document.querySelector('.wpcf7-submit');
let postsArr = [];

function getPostsArr() {
	const data = {
		action: 'get_post_arr_with_id',
		nonce: ajax_link.nonce, //eslint-disable-line
		posts_id: postIds,
	};

  $.ajax({
    type: 'POST',
    url: ajax_link.ajax_url, //eslint-disable-line
    data,
    success: (res) => {
      postsArr = res;
      renderPosts(postsArr);
    },
    error: (jqXHR, textStatus, errorThrown) => {
        // 在這裡處理錯誤
        console.error("AJAX Request Failed: ", textStatus, errorThrown);
        // jqXHR 可以提供更多錯誤相關的細節
    }
  });
}

let qaItem = '';

function renderPosts(arr) {
  let str = '';
  arr.forEach((post) => {
    let imgBlock = '';
    if (post.thumbnail_url) {
      imgBlock = `<img src="${post.thumbnail_url}" alt="" class="w-100 h-100 object-cover" />`
    }
    str += `
    <li class="row mb-5 qa-item" data-postid="${post.id}">
      <div class="col-lg-2">
        ${imgBlock}
      </div>
      <div class="col-lg-4 d-flex align-items-center">
        <p class="title">${post.title}</p>
      </div>
      <div class="col-lg-4 d-flex align-items-center">
        <textarea name="" id="" cols="30" class="w-100 h-100 p-3"></textarea>
      </div>
      <div class="col-lg-2 d-flex align-items-center justify-content-center">
        <button type="button" class="del-post-btn">
          <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36" fill="none">
            <g clip-path="url(#clip0_741_5496)">
              <rect width="36" height="36" rx="18" fill="#D62025" fill-opacity="0.2"/>
              <path d="M19.1511 17.9819L25.7654 11.3676C25.8961 11.215 25.9644 11.0186 25.9566 10.8178C25.9489 10.617 25.8656 10.4266 25.7235 10.2845C25.5814 10.1424 25.3909 10.0591 25.1901 10.0514C24.9893 10.0436 24.793 10.1119 24.6404 10.2426L18.0261 16.8569L11.4118 10.2346C11.2616 10.0844 11.0578 10 10.8454 10C10.6329 10 10.4291 10.0844 10.2789 10.2346C10.1286 10.3849 10.0442 10.5887 10.0442 10.8011C10.0442 11.0136 10.1286 11.2174 10.2789 11.3676L16.9011 17.9819L10.2789 24.5961C10.1954 24.6677 10.1275 24.7557 10.0796 24.8547C10.0318 24.9536 10.0048 25.0615 10.0006 25.1713C9.99635 25.2812 10.0149 25.3908 10.055 25.4932C10.0951 25.5956 10.1559 25.6886 10.2337 25.7663C10.3114 25.8441 10.4044 25.9049 10.5068 25.945C10.6092 25.9851 10.7188 26.0036 10.8287 25.9994C10.9385 25.9952 11.0464 25.9682 11.1453 25.9204C11.2443 25.8725 11.3323 25.8046 11.4039 25.7211L18.0261 19.1069L24.6404 25.7211C24.793 25.8518 24.9893 25.9201 25.1901 25.9124C25.3909 25.9046 25.5814 25.8214 25.7235 25.6793C25.8656 25.5372 25.9489 25.3467 25.9566 25.1459C25.9644 24.9451 25.8961 24.7488 25.7654 24.5961L19.1511 17.9819Z" fill="#D62025"/>
            </g>
            <defs>
              <clipPath id="clip0_741_5496">
                <rect width="36" height="36" rx="18" fill="white"/>
              </clipPath>
            </defs>
          </svg>
        </button>
      </div>
    </li>
    `;
  });
  qaList.innerHTML = str;
  qaItem = document.querySelectorAll('.qa-item');
  qaItem.forEach( ( item ) => {
    const postId = item.dataset.postid;
    const delBtn = item.querySelector('.del-post-btn');
    delBtn.addEventListener('click', () => {
      postIds = postIds.filter( ( id ) => {
        return id !== postId;
      } )
      let expires = new Date();
      expires.setTime(expires.getTime() + (24 * 60 * 60 * 1000)); // 當前時間加上 24 小時

        // 更新 Cookie，包括過期時間
      document.cookie = "postIds=" + postIds.join(',') + "; expires=" + expires.toUTCString() + "; path=/";
      getPostsArr();
    } )
  } )
}

function inputEventListen() {
  formSubmit.addEventListener('mouseenter', () => {
    let finalMessage = '';
    qaItem.forEach( ( item ) => {
      const title = item.querySelector('.title').textContent;
      const message = item.querySelector('textarea').value;
      const messageData = `${title}：${message}`;
      finalMessage += `${messageData};`
    } )
    qaInput.value = finalMessage;
  } )
}

document.addEventListener('wpcf7mailsent', function(event) {
  postIds = [];
  let expires = new Date();
  expires.setTime(expires.getTime() + (24 * 60 * 60 * 1000)); // 當前時間加上 24 小時

    // 更新 Cookie，包括過期時間
  document.cookie = "postIds=" + postIds.join(',') + "; expires=" + expires.toUTCString() + "; path=/";
  getPostsArr();
  location = thank_link; // 替換成你的目標URL
}, false);

getPostsArr()
inputEventListen();