import '../scss/all.scss';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
gsap.registerPlugin( ScrollTrigger );

const siteHeader = document.querySelector( '.site-header' );
const headerNavbar = document.querySelector( '.header-navbar' );
const logoText = document.querySelector( '.logo-text' );
let isLightNavbar = false;
let initColor = '';
if ( headerNavbar.classList.contains( 'header-navbar-light' ) ) {
	isLightNavbar = true;
	initColor = 'transparent';
} else {
	isLightNavbar = false;
	initColor = '#ffffff80';
}

gsap.fromTo( siteHeader,
	{
		backgroundColor: initColor,
	},
	{
		backgroundColor: 'white',
		scrollTrigger: {
			trigger: siteHeader,
			start: '1 top',
			end: 'bottom bottom',
			// markers: true,
			toggleActions: 'play none none reverse',
			onEnter: () => {
				if ( isLightNavbar ) {
					headerNavbar.classList.remove( 'header-navbar-light' );
					logoText.classList.remove( 'text-light' );
				}
			},
			onLeaveBack: () => {
				if ( isLightNavbar ) {
					headerNavbar.classList.add( 'header-navbar-light' );
					logoText.classList.add( 'text-light' );
				}
			},
		},
	} );
