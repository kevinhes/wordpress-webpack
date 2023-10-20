import { Swiper } from 'swiper/bundle';

const caseSwiper = new Swiper( '.caseSwiper', {
	slidesPerView: 4,
	navigation: {
		nextEl: ".swiper-button-next",
		prevEl: ".swiper-button-prev",
	},
} );

const shareSwiper = new Swiper( '.shareSwiper', {
	slidesPerView: 1,
	pagination: {
		el: '.shareSwiper-pagination',
		clickable: true,
		bulletClass: 'shareSwiper-pagination-bullet',
		bulletActiveClass: 'shareSwiper-pagination-bullet-active',
		renderBullet( index, className ) {
			return '<div class="' + className + '">' + '0' + ( index + 1 ) + '</div>';
		},
	},
	navigation: {
		nextEl: '.shareSwiper-btn-next',
		prevEl: '.shareSwiper-btn-prev',
	},
} );
