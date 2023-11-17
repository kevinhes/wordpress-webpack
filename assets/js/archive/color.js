import $ from 'jquery';
import { Popover } from 'bootstrap';
import Swal from 'sweetalert2/dist/sweetalert2.js';

const searchInput = document.querySelector('.search-color-input');
const tabList = document.querySelectorAll( '.tab-link' );

function tabChage() {
	if ( tabList ) {
		tabList.forEach( ( tab ) => {
			tab.addEventListener( 'click', function( e ) {
				const cat = tab.dataset.cat;
				e.preventDefault();
				if ( tab.classList.contains( 'active' ) ) {
				} else {
					tabList.forEach( ( item ) => {
						item.classList.remove( 'active' );
					} );
					tab.classList.add( 'active' );
					getPostsArr( cat );
				}
			} );
		} );
	}
}

let colorArr = [];
const tileList = document.querySelector( '.tile-list' );

function getPostsArr( cat = 'mineral-color' ) {
	const data = {
		action: 'get_post_arr',
		nonce: ajax_link.nonce, //eslint-disable-line
		post_type: 'type_mineral_color',
		post_num: -1,
		taxonomy: 'tax_mineral_color',
		cat,
	};

	$.ajax( {
		type: 'POST',
		url: ajax_link.ajax_url, //eslint-disable-line
		data,
		success: ( res ) => {
			colorArr = res;
			renderTileList( colorArr );
			insertColorStyle( colorArr );
		},
	} );
}

// search eventlistener
function searchEvent() {
  const searchBtn = document.querySelector('.search-color-btn');
  searchInput.addEventListener('keydown', (e) => {
    if ( e.key === 'Enter' ) {
      const keyword = searchInput.value;
      e.preventDefault();
      searchColorArr(keyword);
      tabList.forEach( ( item ) => {
        item.classList.remove( 'active' );
      } );
    }
  });
  searchBtn.addEventListener('click', (e) => {
    const keyword = searchInput.value;
    searchColorArr(keyword);
    tabList.forEach( ( item ) => {
      item.classList.remove( 'active' );
    } );
  });
}

// search reset
function searchReset() {
  const searchResetBtn = document.querySelector('.search-color-reset');
  searchResetBtn.addEventListener('click', (e) => {
    searchInput.value = '';
    tabList.forEach( ( item ) => {
      item.classList.remove( 'active' );
    } );
    tabList.forEach( ( item ) => {
      if ( item.dataset.cat === 'mineral-color' ) {
        item.classList.add( 'active' );
      }
    } );
    getPostsArr();
  })
}

// search function
function searchColorArr( keyword ) {
	const data = {
		action: 'search_color_arr',
		nonce: ajax_link.nonce, //eslint-disable-line
    keyword,
	};

	$.ajax( {
		type: 'POST',
		url: ajax_link.ajax_url, //eslint-disable-line
		data,
		success: ( res ) => {
      console.log(res);
			colorArr = res;
      colorArr = Object.values(colorArr);
			renderTileList( colorArr );
			insertColorStyle( colorArr );
		},
	} );
}

function insertColorStyle( arr ) {
	const colorStyle = document.createElement( 'style' );
	arr.forEach( ( color ) => {
		const { hex } = color;
		colorStyle.innerHTML += `
    .bg-${ hex } {
      background-color: #${ hex };
    }
    `;
	} );
	document.head.appendChild( colorStyle );
}

function renderTileList( arr ) {
	let str = '';
	arr.forEach( ( color ) => {
		str += `
    <li>
      <button
        tabindex="0" 
        type="button"
        class="tile-block bg-${ color.hex }"
        data-bs-toggle="popover"
        data-bs-placement="bottom"
        data-title="${ color.title }"
        data-rgb="${ color.rgb }"
        data-cymk="${ color.cmyk }"
        data-hex="${ color.hex }"
        data-colorid="${ color.id }">
      </button>
    </li>
    `;
	} );
	tileList.innerHTML = str;
	popoverInit();
}

function popoverInit() {
	const popoverTriggerList = document.querySelectorAll(
		'[data-bs-toggle="popover"]'
	);
	const popoverList = [ ...popoverTriggerList ].map( ( popoverTriggerEl ) => { //eslint-disable-line
		//eslint-disable-line
		//eslint-disable-line
		const title = popoverTriggerEl.dataset.title;
		const colorId = popoverTriggerEl.dataset.colorid;
		const rgb = popoverTriggerEl.dataset.rgb;
		const cymk = popoverTriggerEl.dataset.cymk;
		const hex = popoverTriggerEl.dataset.hex;
		const colorPopover = new Popover( popoverTriggerEl, {
			content: `
      <div class="tile-color bg-${ hex } me-6"></div>
      <div>
        <div class="d-flex align-items-center mb-2">
          <h2 class="me-2 mb-0">${ title }</h2>
          <a href="#" class="addQaBtn btn btn-y-center btn-secondary">
            <img src="${ search_icon }" alt="info icon" class="me-2"/>
            <span>加入詢問箱</span>
            <span class="postid d-none">${ colorId }</span>
          </a>
        </div>
        <div class="mb-2 d-flex align-items-center text-small">
          <p class="btn btn-gray3 w-35 text-center me-2">CMYK</p>
          <p class="w-65">${ rgb }</p>
        </div>
        <div class="mb-2 d-flex align-items-center text-small">
          <p class="btn btn-gray3 w-35 text-center me-2">RGB</p>
          <p class="w-65">${ cymk }</p>
        </div>
        <a href="https://www.google.com.tw" class="btn btn-lg btn-outline-secondary text-center">
          相關案例
        </a>
      </div>
    `,
			html: true,
			trigger: 'manual',
		} );

		popoverTriggerEl.addEventListener( 'click', () => {
			colorPopover.show();
			const addQaBtn = document.querySelector( '.addQaBtn' );
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

function init() {
	tabChage();
  searchEvent();
  searchReset();
	getPostsArr();
}

init();
