const fullURL = window.location.href;

const pageSelect = document.querySelector( '.form-select' );

// 根據當前網址選中相應的選項
Array.from( pageSelect.options ).forEach( ( option ) => {
	if ( option.value === fullURL ) {
		option.selected = true;
	}
} );

pageSelect.addEventListener( 'change', ( e ) => {
	const url = e.target.value;
	window.location = url;
} );
