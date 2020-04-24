/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue');

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/follow-button.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('follow-button', require('./components/follow-button.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});


// Post Page Resizing
var fitComponentsSize = function () {

    $('#post-col-2').css('height', $('#post-col-1').height() + 'px');

    fitCommentsBlock()
}
var fitCommentsBlock = function () {

    $('#post-comments').css('height', ($('#post-col-2').height() - $('#post-footer').height() - $('#post-header').height()) + 'px');
}

if ($(window).width() >= 768) {
    fitComponentsSize();
}

$(window).resize(function () {
    if ($(window).width() >= 768) {
        fitComponentsSize();
    } else {

        $('#post-col-2').css('height', '100%');
        $('#post-comments').css('height', '100%');
        fitCommentsBlock();
    }
});

$('a').click(function () {
    var href = $(this).attr("href");

    var animDuration = 600;

    // Do animation here; duration = animDuration.
    $('#content').css('animation', 'disappear-animation .6s forwards 0s linear');

    setTimeout(function () {
        window.location = href;
    }, animDuration);

    return false; // prevent user navigation away until animation's finished
});

$('#sidebar').css({"top":$('nav').outerHeight(true)});

