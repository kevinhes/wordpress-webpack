import $ from 'jquery';
import { Popover } from 'bootstrap';

function tabChage() {
	const tabList = document.querySelectorAll( '.tab-link' );

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
        data-hex="${ color.hex }">
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
	const popoverList = [ ...popoverTriggerList ].map( ( popoverTriggerEl ) => {
		//eslint-disable-line
		const title = popoverTriggerEl.dataset.title;
		const rgb = popoverTriggerEl.dataset.rgb;
		const cymk = popoverTriggerEl.dataset.cymk;
		const hex = popoverTriggerEl.dataset.hex;
		const colorPopover = new Popover( popoverTriggerEl, {
			content: `
      <div class="tile-color bg-${ hex } me-6"></div>
      <div>
        <div class="d-flex align-items-center mb-2">
          <h2 class="me-2 mb-0">${ title }</h2>
          <a href="#" class="btn btn-y-center btn-secondary">
            <img src="${ search_icon }" alt="info icon" class="me-2"/>
            <span>加入詢問箱</span>
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
		} );

		// 在 Popover 内部点击时防止关闭
		// document.querySelector( '.popover' ).addEventListener( 'click', function( e ) {
		// 	e.stopPropagation();
		// } );

		// 点击其他地方关闭 Popover
		document.addEventListener( 'click', function( e ) {
			if ( ! popoverTriggerEl.contains( e.target ) ) {
				colorPopover.hide();
			}
		} );
	} );
}

function init() {
	tabChage();
	getPostsArr();
}

init();
