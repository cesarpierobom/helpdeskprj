
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component("example-component", require("./components/ExampleComponent.vue"));

const app = new Vue({
    el: "#app"
});

if (Laravel.user.id != null && Laravel.user.id != "") {
    Echo.private("App.User." + Laravel.user.id)
        .notification((notification) => {
            console.log(notification);
            var notif = $("<a href='" + notification.linkweb + "' class='dropdown-item whitespace_wrap'><span class='badge badge-notif badge-success'>new</span><p>" + notification.mensagem + "</p></a>");
            $("#container_notificacoes").prepend(notif);
            console.log(notif);
            if ($("#badge_notificacoes").length == 0) {
                $("#icone_notificacoes").after("<span id='badge_notificacoes' class='badge badge-success'>new</span>");
            }
            
        });
}


Echo.channel("global")
    .listen("Test", (e) => {
        console.log(e);
    });
