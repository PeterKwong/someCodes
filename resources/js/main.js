
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

//jquery Plugin

//Home


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app'
// });

// import router from './router'
// import ActiveTab from './helpers/session'

// try {
//     window.Popper = require('popper.js').default;
//     window.$ = window.jQuery = require('jquery');

//     require('bootstrap');
// } catch (e) {}

// import './jqueryPlugin/owlCarousel'

// import './jqueryPlugin/rangeslider'

//home

import mutualVar from './helpers/mutualVar'
window.mutualVar = mutualVar


import { get,post } from './helpers/api'
window.get = get
window.post = post


window.pUrl = window.location.pathname.slice(3)


import { setCookie,getCookie } from './helpers/cookie'
window.setCookie = setCookie
window.getCookie = getCookie

import { setParams,setUrl } from './helpers/get-parameter'
window.setUrl = setUrl
window.setParams = setParams


import {camelize} from './helpers/camelize'
window.camelize = camelize


// import HomeIndex from './views/frontEnd/home/index'

// if (window.location.pathname == '/' || window.location.pathname == '/en' || 
//     window.location.pathname == '/hk' || window.location.pathname == '/cn') 
//     {
//         const home =  new Vue(HomeIndex);
//     }



// import Notification from './components/notification.vue'
// import contactMessage from './components/contactMessage.vue'
