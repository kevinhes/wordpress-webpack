import $ from 'jquery';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import Swal from 'sweetalert2/dist/sweetalert2.js';

gsap.registerPlugin( ScrollTrigger );

const catTab = document.querySelector( '.cat-tab' );

gsap.to( catTab, {
	scrollTrigger: {
		trigger: '.cat-tab',
		start: 'top 56',
		end: 'bottom bottom',
		toggleActions: 'play none none reverse',
		// markers: true,
		onEnter: () => {
			catTab.classList.add( 'active' );
		},
		onLeaveBack: () => {
			catTab.classList.remove( 'active' );
		},
	},
} );

let caseArr = [];
const caseList = document.querySelector( '.case-list' );
const catSlug = document.querySelector( '[data-slug]' ).dataset.slug;

function getPostsArr( paged = 1, cat = 'interior-design' ) {
	const data = {
		action: 'get_post_arr_with_cat_and_page',
		nonce: ajax_link.nonce, //eslint-disable-line
		post_type: 'type_case',
		post_num: -1,
		paged,
		taxonomy: 'tax_case',
		cat,
	};

	$.ajax( {
		type: 'POST',
		url: ajax_link.ajax_url, //eslint-disable-line
		data,
		success: ( res ) => {
			caseArr = res.post_data;
			renderCaseList( caseArr );
		},
	} );
}

function renderCaseList( data ) {
	let str = '';
	data.forEach( ( item ) => {
		str += `
    <li class="col-lg-3">
      <div class="card-with-overlay">
        <img src="${ item.thumbnail_url }" alt="" class="w-100 h-100 object-cover">
        <div class="card-overlay py-2 px-3 position-absolute w-100 h-100 top-0 start-0 d-flex align-items-end justify-content-between">
          <div class="w-77">
            <p class="text-samll text-secondary">
              室內案例
            </p>
            <p class="text-light">
              ${ item.title }
            </p>
          </div>
          <div class="w-21 bg-dark rounded-5px opacity-50 p-1 position-relative z-index-5">
            <a href="#" class="addQaBtn text-light" data-postid="${ item.id }">
              <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14" fill="none">
                <g clip-path="url(#clip0_741_3794)">
                  <path d="M6.52574 4.125C5.50956 4.125 4.6875 4.94706 4.6875 5.96324C4.6875 6.03636 4.71655 6.1065 4.76826 6.15821C4.81997 6.20992 4.89011 6.23897 4.96324 6.23897C5.03636 6.23897 5.1065 6.20992 5.15821 6.15821C5.20992 6.1065 5.23897 6.03636 5.23897 5.96324C5.23897 5.25147 5.81397 4.67647 6.52574 4.67647C7.2375 4.67647 7.8125 5.25147 7.8125 5.96324C7.8125 6.27647 7.73088 6.48529 7.61802 6.64706C7.4989 6.81728 7.33603 6.94963 7.13934 7.1L7.0886 7.1386C6.71728 7.42096 6.25 7.7761 6.25 8.53676V8.62868C6.25 8.70181 6.27905 8.77194 6.33076 8.82365C6.38247 8.87536 6.45261 8.90441 6.52574 8.90441C6.59887 8.90441 6.669 8.87536 6.72071 8.82365C6.77242 8.77194 6.80147 8.70181 6.80147 8.62868V8.53676C6.80147 8.05257 7.06397 7.85184 7.45772 7.55073L7.47463 7.53787C7.66838 7.38971 7.89632 7.21176 8.07022 6.96287C8.25037 6.70515 8.36397 6.38566 8.36397 5.96324C8.36397 4.94706 7.54191 4.125 6.52574 4.125ZM6.52574 10.375C6.62324 10.375 6.71675 10.3363 6.7857 10.2673C6.85465 10.1984 6.89338 10.1049 6.89338 10.0074C6.89338 9.90985 6.85465 9.81633 6.7857 9.74739C6.71675 9.67844 6.62324 9.63971 6.52574 9.63971C6.42823 9.63971 6.33472 9.67844 6.26577 9.74739C6.19682 9.81633 6.15809 9.90985 6.15809 10.0074C6.15809 10.1049 6.19682 10.1984 6.26577 10.2673C6.33472 10.3363 6.42823 10.375 6.52574 10.375Z" fill="#CACACA"/>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M0.520833 7.25C0.520833 10.4141 3.08587 12.9792 6.25 12.9792C9.41413 12.9792 11.9792 10.4141 11.9792 7.25C11.9792 4.08587 9.41413 1.52083 6.25 1.52083C3.08587 1.52083 0.520833 4.08587 0.520833 7.25ZM6.25 1C2.79822 1 0 3.79822 0 7.25C0 10.7018 2.79822 13.5 6.25 13.5C9.70178 13.5 12.5 10.7018 12.5 7.25C12.5 3.79822 9.70178 1 6.25 1Z" fill="#CACACA"/>
                </g>
                <defs>
                  <clipPath id="clip0_741_3794">
                    <rect y="0.5" width="13" height="13" rx="6.5" fill="white"/>
                  </clipPath>
                </defs>
              </svg>
              <span class="text-small">
                加入提問箱
              </span>
            </a>
          </div>
          <a href="${ item.link }" class="stretched-link"></a>
        </div>
      </div>
    </li>
    `;
	} );
	caseList.innerHTML = str;
	const addQaBtnList = document.querySelectorAll( '.addQaBtn' );
	addQaBtnList.forEach( ( btn ) => {
		btn.addEventListener( 'click', ( e ) => {
			e.preventDefault();
			const postId = btn.dataset.postid;
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
}

function init() {
	getPostsArr( 1, catSlug );
}

init();

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
