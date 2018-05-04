window._ = require('lodash');
window.Popper = require('popper.js').default;

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery = require('jquery');
    window.dt = window.datatable = require('datatables.net');
    window.buttons               = require( 'datatables.net-buttons' );
    require('select2');
    require('datatables.net-dt/css/jquery.dataTables.css');
    require('bootstrap');
    require('select2/dist/css/select2.css');

    require('jszip');
    // require('pdfmake');
    require('datatables.net-autofill');
    require('datatables.net-buttons');
    require('datatables.net-buttons/js/buttons.colVis.js');
    require('datatables.net-buttons/js/buttons.flash.js');
    require('datatables.net-buttons/js/buttons.html5.js');
    require('datatables.net-buttons/js/buttons.print.js');
    require('datatables.net-colreorder');
    require('datatables.net-fixedcolumns');
    require('datatables.net-fixedheader');
    require('datatables.net-keytable');
    require('datatables.net-responsive');
    require('datatables.net-rowgroup');
    // require('datatables.net-rowreorder');
    require('datatables.net-scroller');
    require('datatables.net-select');

} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

let api_token = document.head.querySelector('meta[name="api_token"]');


if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

if(api_token){
    window.axios.defaults.headers.common['Authorization'] = "Bearer " + api_token.content;
}else{
    console.error('api token not found.');
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });
