
//diamond
// import DiamondViewerIndex from './views/frontEnd/diamondViewer/index'
import DiamondViewerShow from './views/frontEnd/diamondViewer/show'

//Engagement Ring
// import EngagementRingIndex from './views/frontEnd/engagementRing/index'
import EngagementRingShow from './views/frontEnd/engagementRing/show'

//wedding Ring
// import WeddingRingIndex from './views/frontEnd/weddingRing/index'
import WeddingRingShow from './views/frontEnd/weddingRing/show'

//jewellry Ring
// import JewelleryIndex from './views/frontEnd/jewellery/index'
import JewelleryShow from './views/frontEnd/jewellery/show'

//wedding Ring
// import CustomerJewelleryIndex from './views/frontEnd/customerJewellery/index'
import CustomerJewelleryShow from './views/frontEnd/customerJewellery/show'

//wedding Ring
import CustomerMomentIndex from './views/frontEnd/customerMoment/index'

//Education
import EducationIndex from './views/frontEnd/education/index'

//shopping cart
import ShoppingCartIndex from './views/frontEnd/shoppingCart/index.vue'
import DiamondRingReview from './views/frontEnd/shoppingCart/diamondRingReview'
import ShopBagBill from './views/frontEnd/shoppingCart/shopBagBill'

import AboutUs from './views/frontEnd/aboutUs/index'

// import Login from './views/frontEnd/account/login'


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example', require('./components/Example.vue'));
// Vue.component('Notification', require('./components/Notification.vue'));
//components



// const app = new Vue({
//     el: '#root',
//     components: {App},
//     template: `<app></app>`,
//     router
// });


// const glob = new XMLHttpRequest();
// glob.onreadystatechange = function() {
//     if (glob.readyState == XMLHttpRequest.DONE) {
//         alert(glob.responseText);
//     }
// }

// glob.open('GET', 'http://example.com', true);
// glob.send(null);


import ShoppingCartProgress from './components/shoppingCart/progress.vue'
import ShoppingCartIcon from './components/shoppingCart/icon.vue'



const header = new Vue({
    el: '#header',
    data(){
        return{
            mutualVar,
            burgerOpen:false,
            headerSection:0,
 
        }
    },
    methods:{
        onClickedHeader(section){
            if (this.headerSection == section) {
                return this.headerSection = 0
            }
            this.headerSection = section
        },
    },
    created(){
        mutualVar.css.innerWidth = window.innerWidth

    }, 
    destroyed () {
    },
    components:{ ShoppingCartProgress, ShoppingCartIcon },
    computed:{
        shoppingCartNumber(){
            return mutualVar.cookiesInfo.shoppingCart.items.filter((data)=>{return data.addedCart == 1}).length
        },

    },

});

// console.log(mutualVar.vComponents.keys())

if (mutualVar.vComponents.includes('progressBar')) {
    console.log('progressBar')
    const progressBar = new Vue({
        el: '#progress-bar',
        data(){
            return{
                mutualVar,
            }
        },

        components:{ ShoppingCartProgress },

    });    
}


const footer = new Vue({
    el: '#footer',
    data(){
        return{
            footerSection:1,
            mutualVar,

        }
    },
    methods:{
        onClickedFooter(section){
            this.footerSection = section
        },
    },

});



//diamond
// if (pUrl == '/gia-loose-diamonds' || pUrl == '/gia-loose-diamonds/' || 
//     pUrl.includes('/gia-loose-diamonds/round-cut') || pUrl.includes('/gia-loose-diamonds/fancy-cut-diamond') || 
//     pUrl.includes('/gia-loose-diamonds/fancy-color')) 
//     {
//         const diamondViewerIndex =  new Vue(DiamondViewerIndex);
//     }

if (!pUrl.includes('/gia-loose-diamonds/round-cut') && !pUrl.includes('/gia-loose-diamonds/fancy-cut-diamond') && 
    !pUrl.includes('/gia-loose-diamonds/fancy-color') && window.location.pathname.slice(4,23) == 'gia-loose-diamonds/') 
    {
        const diamondViewerShow =  new Vue(DiamondViewerShow);
    }

//engagement rings
// if (pUrl == '/engagement-rings' || pUrl == '/engagement-rings/' || 
//     pUrl.includes('/engagement-rings/solitaire-ring-setting') || pUrl.includes('/engagement-rings/side-stones-setting') || 
//     pUrl.includes('/engagement-rings/halo-setting')) 
//     {
//         const engagementRingIndex =  new Vue(EngagementRingIndex);
//     }

if (!pUrl.includes('/engagement-rings/solitaire-ring-setting') && 
    !pUrl.includes('/engagement-rings/side-stones-setting') && !pUrl.includes('/engagement-rings/halo-setting') && 
    window.location.pathname.slice(4,21) == 'engagement-rings/') 
    {
        const engagementRingShow =  new Vue(EngagementRingShow);
    }

//wedding rings
// if (pUrl == '/wedding-rings' || pUrl == '/wedding-rings/' || pUrl.includes('/wedding-rings/classic') || 
//     pUrl.includes('/wedding-rings/japanese') || pUrl.includes('/wedding-rings/vintage')) 
//     {
//         const weddingRingIndex =  new Vue(WeddingRingIndex);
//     }

if (!pUrl.includes('/wedding-rings/classic') && !pUrl.includes('/wedding-rings/japanese') && 
    !pUrl.includes('/wedding-rings/vintage') && window.location.pathname.slice(4,18) == 'wedding-rings/') 
    {
        const weddingRingShow =  new Vue(WeddingRingShow);
    }

//jewellery
// if (pUrl == '/jewellery' || pUrl == '/jewellery/' || pUrl.includes('/jewellery/necklaces') || 
//     pUrl.includes('/jewellery/earrings') || pUrl.includes('/jewellery/pendants') || 
//     pUrl.includes('/jewellery/rings') || pUrl.includes('/jewellery/diamond-rings') || 
//     pUrl.includes('/jewellery/fancy-diamond-rings') || pUrl.includes('/jewellery/bracelets')) 
//     {
//         const jewelleryIndex =  new Vue(JewelleryIndex);
//     }

if (!pUrl.includes('/jewellery/necklaces') && !pUrl.includes('/jewellery/earrings') && 
    !pUrl.includes('/jewellery/rings') && !pUrl.includes('/jewellery/diamond-rings') && 
    !pUrl.includes('/jewellery/fancy-diamond-rings') && !pUrl.includes('/jewellery/bracelets') && 
    !pUrl.includes('/jewellery/pendants') && window.location.pathname.slice(4,14) == 'jewellery/') 
    {
        const jewelleryShow =  new Vue(JewelleryShow);
    }

//Customer share

// if (pUrl =='/customer-jewellery' || pUrl.includes('/engagement-tips')) {
//     const customerJewelleryIndex =  new Vue(CustomerJewelleryIndex);
// }


if (window.location.pathname.slice(4,23) == 'customer-jewellery/') {
    const customerJewelleryShow =  new Vue(CustomerJewelleryShow);
}

if (pUrl.includes('/customer-moments') || pUrl.includes('/engagement-tips')) {
    const customerMomentIndex =  new Vue(CustomerMomentIndex);
}

//Education
if (pUrl.includes('/education-diamond-grading')) {
    const educationIndex =  new Vue(EducationIndex);
}

//buying procedure
if ( pUrl.includes('about-us') || pUrl.includes('buying-procedure') ) {
    const aboutUs =  new Vue(AboutUs);
}

//shopping cart

if ( pUrl.includes('diamond-ring-review') ) {
    const diamondRingReview =  new Vue(DiamondRingReview);
}

if ( pUrl.includes('shopping-cart') ) {
    const shoppingCartIndex =  new Vue(ShoppingCartIndex);
}

if ( pUrl.includes('shop-bag-bill') ) {
    const shopBagBill =  new Vue(ShopBagBill);
}

// if ( pUrl.includes('login') ) {
//     const login =  new Vue(Login);
// }



// const diamondViewer = new Vue({
//     el: '#diamondViewer'
// });