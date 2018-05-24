
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});

Echo.private(`App.User.1`)
    .notification((notification) => {
        console.log(notification.type);
    });



Echo.private('chat')
    .whisper('typing', {
        // name: this.user.name
    });

Echo.private('chat')
    .listenForWhisper('typing', (e) => {
        console.log(e.name);
    });

Echo.channel('global')
    .listen('Test', (e) => {
        console.log(e);
    });