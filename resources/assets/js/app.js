
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.swal = require('sweetalert2');
// import $ from 'jquery';
// import 'datatables.net';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('item', require('./components/Item.vue'));
Vue.component('acara', require('./components/Acara.vue'));
Vue.component('order',require('./components/Order.vue'));
Vue.component('course-item',require('./components/CourseItem.vue'));


const app = new Vue({
    el: '#app'
});
