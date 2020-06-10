
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

// window.Vue = require('vue');

import Vue from 'vue'
// import router from './backendRouter'

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example', require('./components/Example.vue'));

//admin Variables
import AdminVar from './helpers/adminVar'
import MutualVar from './helpers/mutualVar'

//Auth
import AdmLogin from './views/backEnd/Auth/adm_login.vue'
import Auth from './store/auth'

//Customer
import CustomerIndex from './views/backEnd/customer/index'
import CustomerShow from './views/backEnd/customer/show'
import CustomerForm from './views/backEnd/customer/form'

//invoice
import InvoiceIndex from './views/backEnd/invoice/index'
import InvoiceShow from './views/backEnd/invoice/show'
import InvoiceForm from './views/backEnd/invoice/form'
import InvoiceTotalSale from './views/backEnd/invoice/totalSale'

//invoice diamonds
import InvoiceDiamondIndex from './views/backEnd/invoiceDiamond/index'
import InvoiceDiamondShow from './views/backEnd/invoiceDiamond/show'
import InvoiceDiamondForm from './views/backEnd/invoiceDiamond/form'

//diamonds
import DiamondForm from './views/backEnd/diamond/form'
import DiamondBatchForm from './views/backEnd/diamond/batchform'
import DiamondIndex from './views/backEnd/diamond/index'
import DiamondDiscPrice from './views/backEnd/diamond/discPrice'
import DiamondPrintLabel from './views/backEnd/diamond/printLabel'

//Engagement Rings
import EngagementRingIndex from './views/backEnd/engagementRing/index'
import EngagementRingShow from './views/backEnd/engagementRing/show'
import EngagementRingForm from './views/backEnd/engagementRing/form'

//wedding Rings
import WeddingRingIndex from './views/backEnd/weddingRing/index'
import WeddingRingShow from './views/backEnd/weddingRing/show'
import WeddingRingForm from './views/backEnd/weddingRing/form'

//Jewellery
import JewelleryIndex from './views/backEnd/jewellery/index'
import JewelleryShow from './views/backEnd/jewellery/show'
import JewelleryForm from './views/backEnd/jewellery/form'

//customer Jewelleries
import CustomerJewIndex from './views/backEnd/customerJewellery/index'
import CustomerJewShow from './views/backEnd/customerJewellery/show'
import CustomerJewForm from './views/backEnd/customerJewellery/form'

//customer Moments
import CustomerMomentIndex from './views/backEnd/customerMoment/index'
import CustomerMomentShow from './views/backEnd/customerMoment/show'
import CustomerMomentForm from './views/backEnd/customerMoment/form'


//Purchase
import ProgressInvoice from './views/backEnd/purchase/progressInvoice'
import DuedProgressInvoice from './views/backEnd/purchase/duedProgressInvoice'
import OnStockDiamond from './views/backEnd/purchase/onStockDiamond'
import StarredDiamondsExport from './views/backEnd/purchase/starredDiamondsExport'

//Accounting
import InvoiceExport from './views/backEnd/accounting/invoiceExport'

//Order
import OrderIndex from './views/backEnd/order/index'
import OrderShow from './views/backEnd/order/show'
import OrderToInvoice from './views/backEnd/order/orderToInvoice'

import { get, post } from './helpers/api'

window.mutualVar = MutualVar
window.adminVar = AdminVar 
window.get = get
window.post = post

const app = new Vue({
    el: '#backend',
    data(){
        return  {
            auth: Auth.state,
            adminVar,
            mutualVar,
        }

    },
});


var pUrl = window.location.pathname.slice(0)



//Customer

if ( pUrl.includes('adm/customers') && !pUrl.includes('adm/customers/') ) {
    const customerIndex =  new Vue(CustomerIndex);
}

if ( pUrl.includes('adm/customers/create') ) {
    const customerForm =  new Vue(CustomerForm);
}

if ( pUrl.includes('adm/customers/') && pUrl.includes('edit') ) {
    const customerForm =  new Vue(CustomerForm);
}

if ( pUrl.includes('adm/customers/') && !pUrl.includes('adm/customers/create') && !pUrl.includes('/edit') 
     ) {
    const customerShow =  new Vue(CustomerShow);
}



//Invoice

if ( pUrl.includes('adm/invoices') && !pUrl.includes('adm/invoices/') ) {
    const invoiceIndex =  new Vue(InvoiceIndex);
}

if ( pUrl.includes('adm/invoices/create') ) {
    const invoiceForm =  new Vue(InvoiceForm);
}

if ( pUrl.includes('adm/invoices/') && pUrl.includes('edit') ) {
    const invoiceForm =  new Vue(InvoiceForm);
}

if ( pUrl.includes('adm/invoices/') && !pUrl.includes('adm/invoices/create') && !pUrl.includes('/edit') 
    || pUrl.includes('adm/invoices/pdf/')) {
    const invoiceShow =  new Vue(InvoiceShow);
}


//Invoice Diamond

if ( pUrl.includes('adm/invoice-diamonds') && !pUrl.includes('adm/invoice-diamonds/') ) {
    const invoiceDiamondIndex =  new Vue(InvoiceDiamondIndex);
}

if ( pUrl.includes('adm/invoice-diamonds/create') ) {
    const invoiceDiamondForm =  new Vue(InvoiceDiamondForm);
}

if ( pUrl.includes('adm/invoice-diamonds/') && pUrl.includes('edit') || pUrl.includes('adm/invoice-diamonds/ceate-from-diamond/')) {
    const invoiceDiamondForm =  new Vue(InvoiceDiamondForm);
}

if ( pUrl.includes('adm/invoice-diamonds/') && !pUrl.includes('adm/invoice-diamonds/create') && !pUrl.includes('/edit')  && !pUrl.includes('ceate-from-diamond/')
     ) {
    const invoiceDiamondShow =  new Vue(InvoiceDiamondShow);
}


//Diamond

if ( pUrl.includes('adm/diamonds') && !pUrl.includes('adm/diamonds/') ) {
    const diamondIndex =  new Vue(DiamondIndex);
}

if ( pUrl.includes('adm/diamonds/create') ) {
    const diamondForm =  new Vue(DiamondForm);
}

if ( pUrl.includes('adm/diamonds/batch-create') ) {
    const diamondBatchForm =  new Vue(DiamondBatchForm);
}

if ( pUrl.includes('adm/diamonds/disc-price') ) {
    const diamondDiscPrice =  new Vue(DiamondDiscPrice);
}

if ( pUrl.includes('adm/diamonds/print-label') ) {
    const diamondPrintLabel =  new Vue(DiamondPrintLabel);
}


//Engagement Ring

if ( pUrl.includes('adm/engagement-rings') && !pUrl.includes('adm/engagement-rings/') ) {
    const engagementRingIndex =  new Vue(EngagementRingIndex);
}

if ( pUrl.includes('adm/engagement-rings/create') ) {
    const engagementRingForm =  new Vue(EngagementRingForm);
}

if ( pUrl.includes('adm/engagement-rings/') && pUrl.includes('edit') ) {
    const engagementRingForm =  new Vue(EngagementRingForm);
}

if ( pUrl.includes('adm/engagement-rings/') && !pUrl.includes('adm/engagement-rings/create') && !pUrl.includes('/edit') 
     ) {
    const engagementRingShow =  new Vue(EngagementRingShow);
}

//Wedding Ring

if ( pUrl.includes('adm/wedding-rings') && !pUrl.includes('adm/wedding-rings/') ) {
    const weddingRingIndex =  new Vue(WeddingRingIndex);
}

if ( pUrl.includes('adm/wedding-rings/create') ) {
    const weddingRingForm =  new Vue(WeddingRingForm);
}

if ( pUrl.includes('adm/wedding-rings/') && pUrl.includes('edit') ) {
    const weddingRingForm =  new Vue(WeddingRingForm);
}

if ( pUrl.includes('adm/wedding-rings/') && !pUrl.includes('adm/wedding-rings/create') && !pUrl.includes('/edit') 
     ) {
    const weddingRingShow =  new Vue(WeddingRingShow);
}


//Jewellery

if ( pUrl.includes('adm/jewellery') && !pUrl.includes('adm/jewellery/') ) {
    const jewelleryIndex =  new Vue(JewelleryIndex);
}

if ( pUrl.includes('adm/jewellery/create') ) {
    const jewelleryForm =  new Vue(JewelleryForm);
}

if ( pUrl.includes('adm/jewellery/') && pUrl.includes('edit') ) {
    const jewelleryForm =  new Vue(JewelleryForm);
}

if ( pUrl.includes('adm/jewellery/') && !pUrl.includes('adm/jewellery/create') && !pUrl.includes('/edit') 
     ) {
    const jewelleryShow =  new Vue(JewelleryShow);
}


//Customer Jewellery

if ( pUrl.includes('adm/customer-jewelleries') && !pUrl.includes('adm/customer-jewelleries/') ) {
    const customerJewIndex =  new Vue(CustomerJewIndex);
}

if ( pUrl.includes('adm/customer-jewelleries/') && pUrl.includes('/create') ) {
    const customerJewForm =  new Vue(CustomerJewForm);
}

if ( pUrl.includes('adm/customer-jewelleries/') && pUrl.includes('edit') ) {
    const customerJewForm =  new Vue(CustomerJewForm);
}

if ( pUrl.includes('adm/customer-jewelleries/') && !pUrl.includes('adm/customer-jewelleries/create')
     && !pUrl.includes('/edit') && !pUrl.includes('/create')
     ) {
    const customerJewShow =  new Vue(CustomerJewShow);
}

//Customer Moment

if ( pUrl.includes('adm/customer-moments') && !pUrl.includes('adm/customer-moments/') ) {
    const customerMomentIndex =  new Vue(CustomerMomentIndex);
}

if ( pUrl.includes('adm/customer-moments/create') ) {
    const customerMomentForm =  new Vue(CustomerMomentForm);
}

if ( pUrl.includes('adm/customer-moments/') && pUrl.includes('edit') ) {
    const customerMomentForm =  new Vue(CustomerMomentForm);
}

if ( pUrl.includes('adm/customer-moments/') && !pUrl.includes('adm/customer-moments/create') && !pUrl.includes('/edit') 
     ) {
    const customerMomentShow =  new Vue(CustomerMomentShow);
}



//Order

if ( pUrl.includes('adm/orders') && !pUrl.includes('adm/orders/') ) {
    const orderIndex =  new Vue(OrderIndex);
}

if ( pUrl.includes('adm/orders/') ) {
    const orderShow =  new Vue(OrderShow);
}

if ( pUrl.includes('adm/order-to-invoice/') ) {
    const orderToInvoice =  new Vue(OrderToInvoice);
}


//Purchase

if ( pUrl.includes('adm/purchase/dued-progress-invoices') ) {
    const duedProgressInvoice =  new Vue(DuedProgressInvoice);
}

if ( pUrl.includes('adm/purchase/progress-invoices') ) {
    const progressInvoice =  new Vue(ProgressInvoice);
}

if ( pUrl.includes('adm/purchase/on-stock-diamonds') ) {
    const onStockDiamond =  new Vue(OnStockDiamond);
}

if ( pUrl.includes('adm/purchase/starred-diamonds-export') ) {
    const starredDiamondsExport =  new Vue(StarredDiamondsExport);
}


//Acoounting
if ( pUrl.includes('adm/accounting/invoice-export') ) {
    const invoiceExport =  new Vue(InvoiceExport);
}

//login
if ( pUrl == '/td-login' ) {
    const admLogin =  new Vue(AdmLogin);
}

//Invoice Diamond


