
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

//jquery Plugin

import './jqueryPlugin/owlCarousel'
import './jqueryPlugin/rangeslider'

window.Vue = require('vue');


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

//home

import mutualVar from './helpers/mutualVar'

// Langs
import transJS from './helpers/transJs1'


import HomeIndex from './views/frontEnd/home/index'



window.mutualVar = mutualVar
window.pUrl = window.location.pathname.slice(3)


Vue.filter('transJs', transJS.transJs)



if (window.location.pathname == '/' || window.location.pathname == '/en' || 
    window.location.pathname == '/hk' || window.location.pathname == '/cn') 
    {
        const home =  new Vue(HomeIndex);
    }



import Notification from './components/notification.vue'
import contactMessage from './components/contactMessage.vue'

import ShoppingCartProgress from './components/shoppingCart/progress.vue'
import ShoppingCartIcon from './components/shoppingCart/icon.vue'



const header = new Vue({
    el: '#header',
    data(){
    	return{
            yPosition:'',
            mutualVar,
            notShowSubTab:['diamond-ring-review','shopping-cart', 'account','shop-bag-bill'],

 
    	}
    },
    methods:{
        updateYOffset(){
            this.yPosition = window.pageYOffset
        },
        scrollToTop(){
            window.scrollTo(500, 0);
        }
    },
    created(){
        window.addEventListener('scroll', this.updateYOffset);

    }, 
    destroyed () {
        window.removeEventListener('scroll', this.updateYOffset);
    },
    components:{Notification, ShoppingCartProgress, ShoppingCartIcon, contactMessage},
    computed:{
        shoppingCartNumber(){
            return this.mutualVar.cookiesInfo.shoppingCart.items.filter((data)=>{return data.addedCart == 1}).length
        },
        activeTab(){
            return window.location.pathname.slice(3)
        },
        partialUrl(){
            return window.location.pathname.slice(3)                
        }

    },

});
