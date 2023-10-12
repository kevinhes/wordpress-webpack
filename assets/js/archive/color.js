import $ from 'jquery';
import { Popover } from 'bootstrap';

function tabChage() {
  const tabList = document.querySelectorAll('.tab-link');

  if ( tabList ) {
    tabList.forEach( tab => {
      tab.addEventListener('click', function(e) {
        e.preventDefault();
        if ( tab.classList.contains('active') ) {
          return;
        } else {
          tabList.forEach( item => {
            item.classList.remove('active');
          } );
          tab.classList.add('active');
        }
      });
    });
  }
}

let colorArr = [];
const tileList = document.querySelector('.tile-list');

function getPostsArr() {
	const data = {
		action: 'get_post_arr',
		nonce: ajax_link.nonce, //eslint-disable-line
    post_type: 'type_mineral_color',
    post_num: -1,
	};

	$.ajax( {
		type: 'POST',
		url: ajax_link.ajax_url, //eslint-disable-line
		data,
		success: ( res ) => {
      colorArr = res;
			renderTileList(colorArr)
      insertColroStyle(colorArr)
		},
	} );
}

function insertColroStyle(arr) {
  const colorStyle = document.createElement('style');
  arr.forEach( ( color ) => {
    const { hex } = color;
    colorStyle.innerHTML += `
    .bg-${hex} {
      background-color: #${hex};
    }
    `;
  } );
  document.head.appendChild(colorStyle);
}

function renderTileList( arr ) {
  let str = '';
  arr.forEach( ( color ) => {
    console.log(color);
    str +=`
    <li>
      <button
        tabindex="0" 
        type="button"
        class="tile-block bg-${color.hex}"
        data-bs-toggle="popover"
        data-bs-placement="bottom"
        data-title="${color.title}"
        data-rgb="${color.rgb}"
        data-cymk="${color.cmyk}"
        data-hex="${color.hex}">
      </button>
    </li>
    `
  } );
  tileList.innerHTML = str;
  popoverInit()
}

const icon = `
<svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14" fill="none" class="me-2">
  <g clip-path="url(#clip0_741_3651)">
    <path d="M6.52574 4.125C5.50956 4.125 4.6875 4.94706 4.6875 5.96324C4.6875 6.03636 4.71655 6.1065 4.76826 6.15821C4.81997 6.20992 4.89011 6.23897 4.96324 6.23897C5.03636 6.23897 5.1065 6.20992 5.15821 6.15821C5.20992 6.1065 5.23897 6.03636 5.23897 5.96324C5.23897 5.25147 5.81397 4.67647 6.52574 4.67647C7.2375 4.67647 7.8125 5.25147 7.8125 5.96324C7.8125 6.27647 7.73088 6.48529 7.61802 6.64706C7.4989 6.81728 7.33603 6.94963 7.13934 7.1L7.0886 7.1386C6.71728 7.42096 6.25 7.7761 6.25 8.53676V8.62868C6.25 8.70181 6.27905 8.77194 6.33076 8.82365C6.38247 8.87536 6.45261 8.90441 6.52574 8.90441C6.59887 8.90441 6.669 8.87536 6.72071 8.82365C6.77242 8.77194 6.80147 8.70181 6.80147 8.62868V8.53676C6.80147 8.05257 7.06397 7.85184 7.45772 7.55073L7.47463 7.53787C7.66838 7.38971 7.89632 7.21176 8.07022 6.96287C8.25037 6.70515 8.36397 6.38566 8.36397 5.96324C8.36397 4.94706 7.54191 4.125 6.52574 4.125ZM6.52574 10.375C6.62324 10.375 6.71675 10.3363 6.7857 10.2673C6.85465 10.1984 6.89338 10.1049 6.89338 10.0074C6.89338 9.90985 6.85465 9.81633 6.7857 9.74739C6.71675 9.67844 6.62324 9.63971 6.52574 9.63971C6.42823 9.63971 6.33472 9.67844 6.26577 9.74739C6.19682 9.81633 6.15809 9.90985 6.15809 10.0074C6.15809 10.1049 6.19682 10.1984 6.26577 10.2673C6.33472 10.3363 6.42823 10.375 6.52574 10.375Z" fill="white"/>
    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.520833 7.25C0.520833 10.4141 3.08587 12.9792 6.25 12.9792C9.41413 12.9792 11.9792 10.4141 11.9792 7.25C11.9792 4.08587 9.41413 1.52083 6.25 1.52083C3.08587 1.52083 0.520833 4.08587 0.520833 7.25ZM6.25 1C2.79822 1 0 3.79822 0 7.25C0 10.7018 2.79822 13.5 6.25 13.5C9.70178 13.5 12.5 10.7018 12.5 7.25C12.5 3.79822 9.70178 1 6.25 1Z" fill="white"/>
  </g>
  <defs>
    <clipPath id="clip0_741_3651">
      <rect y="0.5" width="13" height="13" rx="6.5" fill="white"/>
    </clipPath>
  </defs>
</svg>
`

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

function init() {
  tabChage();
  getPostsArr();
}



init();
