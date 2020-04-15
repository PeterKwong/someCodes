
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

import Account from './views/frontEnd/account/index'
import Setting from './views/frontEnd/account/setting'

import Pending from './views/frontEnd/account/pending'
import PendingShow from './views/frontEnd/account/pendingShow'

import Invoices from './views/frontEnd/account/invoices'
import InvoiceShow from './views/frontEnd/account/invoiceShow'

//referral
import CouponCode from './views/frontEnd/account/referral/couponCode'
import ReferralRecords from './views/frontEnd/account/referral/records'
import ReferralRefund from './views/frontEnd/account/referral/refund'

import Order from './views/frontEnd/account/order'

import Notification from './components/notification.vue'

import { getLocale, getLocaleCode } from './helpers/locale'


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example', require('./components/Example.vue'));


const header = new Vue({
    el: '#userHeader',
    data(){
    	return{
    		    mutualVar,

    	}
    },
    created(){
        this.mutualVar.langs.localeCode = getLocaleCode()
        this.mutualVar.langs.locale = getLocale()
    }, 
    components:{Notification},
    computed:{
    },
});


 var pUrl = window.location.pathname.slice(3)

if ( pUrl == '/account' ) {
    const account =  new Vue(Account);
}

if ( pUrl.includes('account/setting') ) {
    const setting =  new Vue(Setting);
}

if ( pUrl == '/account/pending') {
    const pending =  new Vue(Pending);
}

if ( pUrl.includes('account/pending/') ) {
    const pendingShow =  new Vue(PendingShow);
}

if ( pUrl == '/account/invoices') {
    const invoices =  new Vue(Invoices);
}

if ( pUrl.includes('account/orders') ) {
    const order =  new Vue(Order);
}

if ( pUrl.includes('account/invoices/') ) {
    const invoiceShow =  new Vue(InvoiceShow);
}

if ( pUrl.includes('referral/coupon-code') ) {
    const couponCode =  new Vue(CouponCode);
}

if ( pUrl.includes('account/referral/records') ) {
    const referralRecords =  new Vue(ReferralRecords);
}

if ( pUrl.includes('account/referral/refund') ) {
    const referralRefund =  new Vue(ReferralRefund);
}

