(()=>{"use strict";var t={6380:(t,e,n)=>{n.d(e,{Z:()=>i});var o=n(3645),a=n.n(o)()((function(t){return t[1]}));a.push([t.id,"*{box-sizing:border-box}",""]);const i=a},3645:t=>{t.exports=function(t){var e=[];return e.toString=function(){return this.map((function(e){var n=t(e);return e[2]?"@media ".concat(e[2]," {").concat(n,"}"):n})).join("")},e.i=function(t,n,o){"string"==typeof t&&(t=[[null,t,""]]);var a={};if(o)for(var i=0;i<this.length;i++){var r=this[i][0];null!=r&&(a[r]=!0)}for(var c=0;c<t.length;c++){var s=[].concat(t[c]);o&&a[s[0]]||(n&&(s[2]?s[2]="".concat(n," and ").concat(s[2]):s[2]=n),e.push(s))}},e}},3379:(t,e,n)=>{var o,a=function(){return void 0===o&&(o=Boolean(window&&document&&document.all&&!window.atob)),o},i=function(){var t={};return function(e){if(void 0===t[e]){var n=document.querySelector(e);if(window.HTMLIFrameElement&&n instanceof window.HTMLIFrameElement)try{n=n.contentDocument.head}catch(t){n=null}t[e]=n}return t[e]}}(),r=[];function c(t){for(var e=-1,n=0;n<r.length;n++)if(r[n].identifier===t){e=n;break}return e}function s(t,e){for(var n={},o=[],a=0;a<t.length;a++){var i=t[a],s=e.base?i[0]+e.base:i[0],u=n[s]||0,d="".concat(s," ").concat(u);n[s]=u+1;var l=c(d),f={css:i[1],media:i[2],sourceMap:i[3]};-1!==l?(r[l].references++,r[l].updater(f)):r.push({identifier:d,updater:v(f,e),references:1}),o.push(d)}return o}function u(t){var e=document.createElement("style"),o=t.attributes||{};if(void 0===o.nonce){var a=n.nc;a&&(o.nonce=a)}if(Object.keys(o).forEach((function(t){e.setAttribute(t,o[t])})),"function"==typeof t.insert)t.insert(e);else{var r=i(t.insert||"head");if(!r)throw new Error("Couldn't find a style target. This probably means that the value for the 'insert' parameter is invalid.");r.appendChild(e)}return e}var d,l=(d=[],function(t,e){return d[t]=e,d.filter(Boolean).join("\n")});function f(t,e,n,o){var a=n?"":o.media?"@media ".concat(o.media," {").concat(o.css,"}"):o.css;if(t.styleSheet)t.styleSheet.cssText=l(e,a);else{var i=document.createTextNode(a),r=t.childNodes;r[e]&&t.removeChild(r[e]),r.length?t.insertBefore(i,r[e]):t.appendChild(i)}}function h(t,e,n){var o=n.css,a=n.media,i=n.sourceMap;if(a?t.setAttribute("media",a):t.removeAttribute("media"),i&&"undefined"!=typeof btoa&&(o+="\n/*# sourceMappingURL=data:application/json;base64,".concat(btoa(unescape(encodeURIComponent(JSON.stringify(i))))," */")),t.styleSheet)t.styleSheet.cssText=o;else{for(;t.firstChild;)t.removeChild(t.firstChild);t.appendChild(document.createTextNode(o))}}var m=null,p=0;function v(t,e){var n,o,a;if(e.singleton){var i=p++;n=m||(m=u(e)),o=f.bind(null,n,i,!1),a=f.bind(null,n,i,!0)}else n=u(e),o=h.bind(null,n,e),a=function(){!function(t){if(null===t.parentNode)return!1;t.parentNode.removeChild(t)}(n)};return o(t),function(e){if(e){if(e.css===t.css&&e.media===t.media&&e.sourceMap===t.sourceMap)return;o(t=e)}else a()}}t.exports=function(t,e){(e=e||{}).singleton||"boolean"==typeof e.singleton||(e.singleton=a());var n=s(t=t||[],e);return function(t){if(t=t||[],"[object Array]"===Object.prototype.toString.call(t)){for(var o=0;o<n.length;o++){var a=c(n[o]);r[a].references--}for(var i=s(t,e),u=0;u<n.length;u++){var d=c(n[u]);0===r[d].references&&(r[d].updater(),r.splice(d,1))}n=i}}}}},e={};function n(o){var a=e[o];if(void 0!==a)return a.exports;var i=e[o]={id:o,exports:{}};return t[o](i,i.exports,n),i.exports}n.n=t=>{var e=t&&t.__esModule?()=>t.default:()=>t;return n.d(e,{a:e}),e},n.d=(t,e)=>{for(var o in e)n.o(e,o)&&!n.o(t,o)&&Object.defineProperty(t,o,{enumerable:!0,get:e[o]})},n.o=(t,e)=>Object.prototype.hasOwnProperty.call(t,e),(()=>{const t={el:"#account",data:function(){return{user:""}},watch:{$route:"fetchData"},beforeMount:function(){this.fetchData()},methods:{fetchData:function(){var t=this;get("/api/account/user").then((function(e){t.user=e.data.user}))}}},e={el:"#setting",data:function(){return{mutualVar,form:{user:"",password:{current:"",new:"",confirm:"",disable:!0}},nullPassword:"",data:"",isProcessing:!1,errors:{user:"",password:""}}},watch:{$route:"fetchData"},beforeMount:function(){this.fetchData()},methods:{fetchData:function(){var t=this;get("/api/account/user").then((function(e){t.form.user=e.data.user,t.nullPassword=e.data.nullPassword}))},save:function(){var t,e=this;t=this.checkComfirmPassword(),this.isProcessing=!0,t&&post("/api/account/user",this.form).then((function(t){t.data.saved&&(e.mutualVar.notification.state.success=t.data.message)})).catch((function(t){422===t.response.status&&(e.mutualVar.notification.state.error=t.response.data.message)}))},checkComfirmPassword:function(){var t=!0;return""!=this.form.password.new&&(this.form.password.new==this.form.password.confirm?t=!0:(alert("Passwords are not the same"),t=!1)),t}}},o={el:"#pending",data:function(){return{mutualVar,data:"",langs}},watch:{$route:"fetchData"},beforeMount:function(){this.fetchData()},methods:{fetchData:function(){var t=this;get("/api/account/pending").then((function(e){t.data=e.data.model}))},directTo:function(t){window.open(getLocale()+"/account/pending/"+t,"_self")}}},a={el:"#pendingShow",data:function(){return{mutualVar,data:"",customer:""}},watch:{$route:"fetchData"},beforeMount:function(){this.fetchData()},methods:{fetchData:function(){var t=this;get("/api/account/pending/".concat(window.location.pathname.slice(20))).then((function(e){t.data=e.data.model,t.customer=e.data.customer}))},directTo:function(t){window.open(getLocale()+"/account/pending/"+t,"_self")}}},i={el:"#invoices",data:function(){return{mutualVar,data:"",langs}},watch:{$route:"fetchData"},beforeMount:function(){this.fetchData()},methods:{fetchData:function(){var t=this;get("/api/account/invoices").then((function(e){t.data=e.data.model}))},directTo:function(t){window.open(getLocale()+"/account/invoices/"+t,"_self")}}},r={el:"#invoiceShow",data:function(){return{mutualVar,data:"",customer:"",model:{},company:[]}},watch:{$route:"fetchData"},beforeMount:function(){this.fetchData()},methods:{fetchData:function(){var t=this;get("/api/account/invoices/".concat(window.location.pathname.slice(21))).then((function(e){t.model=e.data.model,t.company=e.data.company}))},directTo:function(t){window.open(getLocale()+"/account/invoices/"+t,"_self")}}};document.head.querySelector('meta[name="api-token"]')&&document.head.querySelector('meta[name="api-token"]').content;function c(){return{en:0,hk:1,cn:2}[window.location.pathname.slice(1,3)]}function s(){return window.location.pathname.slice(1,3)}var u={Authorization:"Bearer ".concat(decodeURI(function(t){for(var e=t+"=",n=document.cookie.split(";"),o=0;o<n.length;o++){for(var a=n[o];" "==a.charAt(0);)a=a.substring(1);if(-1!=a.indexOf(e))return a.substring(e.length,a.length)}return""}("api-token")))};function d(t){return axios({method:"GET",url:t,headers:u})}const l={state:{success:null,error:null},setSuccess:function(t){var e=this;this.state.success=t,setTimeout((function(){e.removeSuccess()}),1e4)},setError:function(t){var e=this;this.state.error=t,setTimeout((function(){e.removeError()}),15e3)},removeSuccess:function(){this.state.success=null},removeError:function(){this.state.error=null}};const f={created:function(){},data:function(){return{flash:l.state,mutualVar,langs}},computed:{notification:function(){return mutualVar.notification}},methods:{resetArray:function(){this.notification.state.success=null,this.notification.state.error=null}}};var h=n(3379),m=n.n(h),p=n(6380),v={insert:"head",singleton:!1};m()(p.Z,v);p.Z.locals;const g=function(t,e,n,o,a,i,r,c){var s,u="function"==typeof t?t.options:t;if(e&&(u.render=e,u.staticRenderFns=n,u._compiled=!0),o&&(u.functional=!0),i&&(u._scopeId="data-v-"+i),r?(s=function(t){(t=t||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(t=__VUE_SSR_CONTEXT__),a&&a.call(this,t),t&&t._registeredComponents&&t._registeredComponents.add(r)},u._ssrRegister=s):a&&(s=c?function(){a.call(this,(u.functional?this.parent:this).$root.$options.shadowRoot)}:a),s)if(u.functional){u._injectStyles=s;var d=u.render;u.render=function(t,e){return s.call(e),d(t,e)}}else{var l=u.beforeCreate;u.beforeCreate=l?[].concat(l,s):[s]}return{exports:t,options:u}}(f,(function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"z-10"},[t.notification.state.success||t.notification.state.error?n("div",{on:{click:function(e){return t.resetArray()}}},[n("transition",{attrs:{name:"modal"}},[n("div",{staticClass:"modal-mask"},[n("button",{staticClass:"modal-button",attrs:{tabindex:"-1"}}),t._v(" "),n("div",{staticClass:"modal-wrapper"},[n("div",{staticClass:"modal-dialog modal-dialog-centered",attrs:{role:"document"},on:{click:function(e){return t.resetArray()}}},[n("div",{staticClass:"modal-content"},[n("div",{staticClass:"modal-header border-b"},[n("h5",{staticClass:"modal-title"}),t._v(" "),n("button",{staticClass:"close",attrs:{type:"button","data-dismiss":"modal","aria-label":"Close"}},[n("span",{attrs:{"aria-hidden":"true"},on:{click:function(e){return t.resetArray()}}},[t._v("×")])])]),t._v(" "),n("div",{staticClass:"modal-body p-2"},[t.notification.state.success?n("div",[Array.isArray(t.notification.state.success)?t._e():n("div",{staticClass:"notification is-info w-64"},[n("center",[t._v("\n                        "+t._s(t.notification.state.success)+"\n                      ")])],1),t._v(" "),Array.isArray(t.notification.state.success)?n("div",{staticClass:"notification is-info w-64"},[n("ol",{attrs:{type:"1"}},t._l(t.notification.state.success,(function(e){return n("div",[n("li",[t._v(t._s(e))])])})),0)]):t._e()]):t._e(),t._v(" "),t.notification.state.error?n("div",[Array.isArray(t.notification.state.error)?t._e():n("div",{staticClass:"notification is-info w-64"},[n("center",[t._v("\n                        "+t._s(t.notification.state.error)+"\n                      ")])],1),t._v(" "),Array.isArray(t.notification.state.error)?n("div",{staticClass:"notification is-info w-64"},[n("ol",{attrs:{type:"1"}},t._l(t.notification.state.error,(function(e){return n("div",[n("li",[t._v(t._s(e))])])})),0)]):t._e()]):t._e()])])])])])])],1):t._e()])}),[],!1,null,null,null).exports;function w(t){return document.head.querySelector('meta[name="'.concat(t,'"]'))?document.head.querySelector('meta[name="'.concat(t,'"]')).content:null}window.getMeta=w,window.draggableItem=function(t){var e,n,o=!1;t.addEventListener("mousedown",(function(a){o=!0,t.classList.add("active"),e=a.pageX-t.offsetLeft,n=t.scrollLeft})),t.addEventListener("mouseleave",(function(){o=!1,t.classList.remove("active")})),t.addEventListener("mouseup",(function(){o=!1,t.classList.remove("active")})),t.addEventListener("mousemove",(function(a){if(o){a.preventDefault();var i=3*(a.pageX-t.offsetLeft-e);t.scrollLeft=n-i}}))};const _={cookiesInfo:{cookieLast:60,diamondSearch:"",engagementSearch:"",weddingRingSearch:"",jewellery:"",coupon_code:"",shoppingCart:{items:[],haveShoppingCart:0,selectingIndex:0,selectingPairIndex:0,selectingType:"",modalActive:0,mode:"create"},checkout:{balancePaymentMethod:"VISA",subTotal:0,discountedSubTotal:0,discountedDeposit:0,deposit:0,depositPaymentMethod:"VISA",balance:0,processingOrderId:""},shoppingCartCarousel:{items:[]},fetchCookies:function(t,e){return localStorage.getItem(t)&&(e=JSON.parse(decodeURIComponent(localStorage.getItem(t)))),e},sendCookies:function(t,e){var n=e;return localStorage.setItem(t,encodeURIComponent(JSON.stringify(n)),10080),e}},notification:{state:{success:null,error:null}},langs:{localeCode:c(),locale:s()},storage:{live:"cfront",s3:"https://s3.tingdiamond.com/",cfront:w("meta-js-cfront")},screen:{x:0,y:0,scrollable:!1,scrollingDown:!1,scrollingUp:!1,footerToTop:0},namepath:window.location.pathname.slice(3),css:{jsReady:!0,innerWidth:0},tabs:{sideBar:"4cs"},status:{isProcessing:!1},components:{slider:""},vComponents:[],lw:{customerJewellery:{engagementRings:"",weddingRings:"",jewelleries:"",show:{videoSelecting:""}}}},b={el:"#couponCode",components:{Notification:g},data:function(){return{model:"",mutualVar:_}},watch:{$route:"fetchData"},created:function(){this.fetchData()},computed:{locale:function(){return c()},hostname:function(){return window.location.hostname}},methods:{fetchData:function(){var t=this;d("/api/referral/code").then((function(e){t.model=e.data.model}))}}},y={el:"#records",components:{Notification:g},data:function(){return{model:"",coupon:"",mutualVar:_,langs,refundAmount:0}},watch:{$route:"fetchData"},created:function(){this.fetchData()},computed:{locale:function(){return c()},hostname:function(){return window.location.hostname},refundAmountSum:function(){for(var t=this.model.data,e=0;e<t.length;e++)if("taken"!=t[e].status&&t[e].invoice)for(var n=0;n<t[e].invoice.inv_diamonds.length;n++)this.refundAmount+=this.discountRateCheckMet(t[e].invoice.inv_diamonds[n].price)*t[e].invoice.inv_diamonds[n].price;return this.refundAmount=Math.round(100*this.refundAmount)/100,this.refundAmount},refunded:function(){for(var t=this.model.data,e=0,n=0;n<t.length;n++)if("taken"==t[n].status&&t[n].invoice)for(var o=0;o<t[n].invoice.inv_diamonds.length;o++)e+=this.discountRateCheckMet(t[n].invoice.inv_diamonds[o].price)*t[n].invoice.inv_diamonds[o].price;return e=Math.round(100*e)/100,e}},filters:{discountRateCheck:function(t,e){t[0];for(var n=0;n<e.length;n++)if(e[n].upperAmount>t&&e[n].lowerAmount<t)return e[n].refund},hideInfo:function(t){t=t.toString();var e="x";return e=e.repeat(t.length/2),t.slice(0,t.length/2).concat(e)}},methods:{fetchData:function(){var t=this;d("/api/referral/records").then((function(e){t.model=e.data.model})),d("/api/referral/code").then((function(e){t.coupon=e.data.model}))},discountRateCheckMet:function(t){for(var e=0;e<this.coupon.discountRate.length;e++)if(this.coupon.discountRate[e].upperAmount>t&&this.coupon.discountRate[e].lowerAmount<t)return this.coupon.discountRate[e].refund}}},C={el:"#refund",components:{Notification:g},data:function(){return{model:"",mutualVar:_,langs}},watch:{$route:"fetchData"},created:function(){this.fetchData()},computed:{locale:function(){return c()},hostname:function(){return window.location.hostname}},filters:{discountRateCheck:function(t,e){t[0];for(var n=0;n<e.length;n++)if(e[n].upperAmount>t&&e[n].lowerAmount<t)return e[n].rate},hideInfo:function(t){t=t.toString();var e="x";return e=e.repeat(t.length/2),t.slice(0,t.length/2).concat(e)}},methods:{fetchData:function(){var t=this;d("/api/referral/refund").then((function(e){t.model=e.data.model})),d("/api/referral/code").then((function(e){t.model=e.data.model}))}}},S={el:"#account",data:function(){return{user:""}},watch:{$route:"fetchData"},beforeMount:function(){this.fetchData()},methods:{fetchData:function(){var t=this;get("/api/account/user").then((function(e){t.user=e.data.user}))}}};new Vue({el:"#userHeader",data:function(){return{mutualVar}},created:function(){this.mutualVar.langs.localeCode=c(),this.mutualVar.langs.locale=s()},components:{Notification:g},computed:{}});var V=window.location.pathname.slice(3);if("/account"==V)new Vue(t);if(V.includes("account/setting"))new Vue(e);if("/account/pending"==V)new Vue(o);if(V.includes("account/pending/"))new Vue(a);if("/account/invoices"==V)new Vue(i);if(V.includes("account/orders"))new Vue(S);if(V.includes("account/invoices/"))new Vue(r);if(V.includes("referral/coupon-code"))new Vue(b);if(V.includes("account/referral/records"))new Vue(y);if(V.includes("account/referral/refund"))new Vue(C)})()})();