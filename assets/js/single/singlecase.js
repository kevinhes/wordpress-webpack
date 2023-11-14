import { Popover } from 'bootstrap';
import { Swiper } from 'swiper/bundle';
import Swal from 'sweetalert2/dist/sweetalert2.js';

const productThumbSwiper = new Swiper( '.productThumbSwiper', {
	slidesPerView: 4,
	spaceBetween: 10,
	navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
	},
	// watchSlidesVisibility: true,
} );

const productMainSwiper = new Swiper( '.productMainSwiper', { //eslint-disable-line
	thumbs: {
		swiper: productThumbSwiper,
	},
} );

function insertColroStyle( arr ) {
	const colorStyle = document.createElement( 'style' );
	arr.forEach( ( color ) => {
		colorStyle.innerHTML += `
    .bg-${ color } {
      background-color: #${ color };
    }
    `;
	} );
	document.head.appendChild( colorStyle );
}

function popoverInit() {
	const popoverTriggerList = document.querySelectorAll(
		'[data-bs-toggle="popover"]'
	);
	const popoverList = [ ...popoverTriggerList ].map( ( popoverTriggerEl ) => { //eslint-disable-line
		const title = popoverTriggerEl.dataset.title;
		const rgb = popoverTriggerEl.dataset.rgb;
		const cymk = popoverTriggerEl.dataset.cymk;
		const hex = popoverTriggerEl.dataset.hex;
		const colorId = popoverTriggerEl.dataset.colorid;
		const colorPopover = new Popover( popoverTriggerEl, {
			content: `
      <div class="tile-color bg-${ hex } me-6"></div>
      <div>
        <div class="d-flex align-items-center mb-2">
          <h2 class="me-2 mb-0">${ title }</h2>
          <a href="#" class="addQaColorBtn btn btn-y-center btn-secondary">
            <img src="${ search_icon }" alt="info icon" class="me-2"/>
            <span>加入詢問箱</span>
            <span class="postid d-none">${ colorId }</span>
          </a>
        </div>
        <div class="mb-2 d-flex align-items-center text-small">
          <p class="btn btn-gray3 w-35 text-center me-2">CMYK</p>
          <p class="w-65">${ cymk }</p>
        </div>
        <div class="mb-2 d-flex align-items-center text-small">
          <p class="btn btn-gray3 w-35 text-center me-2">RGB</p>
          <p class="w-65">${ rgb }</p>
        </div>
        <a href="" class="btn btn-lg btn-outline-secondary text-center">
          相關案例
        </a>
      </div>
    `,
			html: true,
			trigger: 'manual',
		} );
		popoverTriggerEl.addEventListener( 'click', () => {
			colorPopover.show();
			const addQaBtn = document.querySelector( '.addQaColorBtn' );
			addQaBtn.addEventListener( 'click', ( e ) => {
				e.preventDefault();
				const postId = addQaBtn.querySelector( '.postid' ).textContent;
				let postIds = getCookie( 'postIds' );
				if ( postIds ) {
					postIds = postIds.split( ',' ); // 如果 Cookie 存在，將字符串轉換成數組
				} else {
					postIds = [];
				}

				if ( ! postIds.includes( postId ) ) {
					// 添加新的 postId 到數組
					postIds.push( postId );

					const expires = new Date();
					expires.setTime( expires.getTime() + ( 24 * 60 * 60 * 1000 ) ); // 當前時間加上 24 小時

					// 更新 Cookie，包括過期時間
					document.cookie =
						'postIds=' +
						postIds.join( ',' ) +
						'; expires=' +
						expires.toUTCString() +
						'; path=/';
					Swal.fire( {
						text: '已加入提問箱',
						iconHtml: `<svg xmlns="http://www.w3.org/2000/svg" width="41" height="40" viewBox="0 0 41 40" fill="none">
          <rect x="1.5" y="1" width="38" height="38" rx="19" stroke="white" stroke-width="2"/>
          <path d="M9.5 21.5002L15.5 27.5002L30.5 12.5002" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>`,
						showConfirmButton: false,
						timer: 2000,
					} );
				} else {
					Swal.fire( {
						text: '已在提問箱內',
						iconHtml: `<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
          <rect x="1" y="1" width="38" height="38" rx="19" stroke="white" stroke-width="2"/>
          <path d="M11 11L29 29M29 11L11 29" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
          </svg>
          `,
						showConfirmButton: false,
						timer: 2000,
					} );
				}
			} );
		} );

		// 点击其他地方关闭 Popover
		document.addEventListener( 'click', function( e ) {
			if ( ! popoverTriggerEl.contains( e.target ) ) {
				colorPopover.hide();
			}
		} );
	} );
}
insertColroStyle( color_arr ); //eslint-disable-line
popoverInit();

const addQaBtn = document.querySelector( '.addQaBtn' );
addQaBtn.addEventListener( 'click', ( e ) => {
	e.preventDefault();
	const postId = addQaBtn.dataset.postid;
	let postIds = getCookie( 'postIds' );
	if ( postIds ) {
		postIds = postIds.split( ',' ); // 如果 Cookie 存在，將字符串轉換成數組
	} else {
		postIds = [];
	}

	if ( ! postIds.includes( postId ) ) {
		// 添加新的 postId 到數組
		postIds.push( postId );

		const expires = new Date();
		expires.setTime( expires.getTime() + ( 24 * 60 * 60 * 1000 ) ); // 當前時間加上 24 小時

		// 更新 Cookie，包括過期時間
		document.cookie =
			'postIds=' +
			postIds.join( ',' ) +
			'; expires=' +
			expires.toUTCString() +
			'; path=/';
		Swal.fire( {
			text: '已加入提問箱',
			iconHtml: `<svg xmlns="http://www.w3.org/2000/svg" width="41" height="40" viewBox="0 0 41 40" fill="none">
      <rect x="1.5" y="1" width="38" height="38" rx="19" stroke="white" stroke-width="2"/>
      <path d="M9.5 21.5002L15.5 27.5002L30.5 12.5002" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>`,
			showConfirmButton: false,
			timer: 2000,
		} );
	} else {
		Swal.fire( {
			text: '已在提問箱內',
			iconHtml: `<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
      <rect x="1" y="1" width="38" height="38" rx="19" stroke="white" stroke-width="2"/>
      <path d="M11 11L29 29M29 11L11 29" stroke="white" stroke-width="1.5" stroke-linecap="round"/>
      </svg>
      `,
			showConfirmButton: false,
			timer: 2000,
		} );
	}
} );

function getCookie( name ) {
	const cookies = document.cookie.split( '; ' );
	for ( let i = 0; i < cookies.length; i++ ) {
		const parts = cookies[ i ].split( '=' );
		if ( parts[ 0 ] === name ) {
			return parts[ 1 ];
		}
	}
	return '';
}
