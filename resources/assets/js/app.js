window.$ = window.jQuery = require('jquery')
require('bootstrap-sass')

$(document).ready(function(){
    console.log($.fn.tooltip.Constructor.VERSION);
    [].slice.call( document.querySelectorAll( '.tabs' ) ).forEach( function( el ) {
        new CBPFWTabs( el );
    });
});
