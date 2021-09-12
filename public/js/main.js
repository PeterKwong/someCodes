/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/helpers/api.js":
/*!*************************************!*\
  !*** ./resources/js/helpers/api.js ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "curlGet": () => (/* binding */ curlGet),
/* harmony export */   "rapPost": () => (/* binding */ rapPost),
/* harmony export */   "get": () => (/* binding */ get),
/* harmony export */   "post": () => (/* binding */ post),
/* harmony export */   "put": () => (/* binding */ put),
/* harmony export */   "del": () => (/* binding */ del)
/* harmony export */ });
/* harmony import */ var _store_auth__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../store/auth */ "./resources/js/store/auth.js");
/* harmony import */ var _helpers_locale__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../helpers/locale */ "./resources/js/helpers/locale.js");
/* harmony import */ var _helpers_cookie__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../helpers/cookie */ "./resources/js/helpers/cookie.js");



var header = {
  'Authorization': "Bearer ".concat(decodeURI((0,_helpers_cookie__WEBPACK_IMPORTED_MODULE_2__.getCookie)('api-token')))
};
function curlGet(url) {
  // lang = this.$route.fullPath.slice(0,3)
  // Locale.setLastUrl(url)
  return axios({
    method: 'GET',
    url: url,
    headers: {
      'Content-Type': 'application/json',
      'Accept-Encoding': 'gzip, deflate'
    }
  });
}
function rapPost(url, data) {
  return axios({
    method: 'POST',
    url: url,
    data: data,
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded'
    }
  });
}
function get(url) {
  // lang = this.$route.fullPath.slice(0,3)
  // Locale.setLastUrl(url)
  return axios({
    method: 'GET',
    url: url,
    headers: header
  });
}
function post(url, data) {
  return axios({
    method: 'POST',
    url: url,
    data: data,
    headers: header
  });
}
function put(url, data) {
  return axios({
    method: 'PUT',
    url: url,
    data: data,
    headers: header
  });
}
function del(url) {
  return axios({
    method: 'DELETE',
    url: url,
    // data: data,
    headers: header
  });
}

/***/ }),

/***/ "./resources/js/helpers/cookie.js":
/*!****************************************!*\
  !*** ./resources/js/helpers/cookie.js ***!
  \****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "setCookie": () => (/* binding */ setCookie),
/* harmony export */   "getCookie": () => (/* binding */ getCookie),
/* harmony export */   "clearCookie": () => (/* binding */ clearCookie),
/* harmony export */   "checkCookie": () => (/* binding */ checkCookie)
/* harmony export */ });
//设置cookie
function setCookie(cname, cvalue, mins) {
  var d = new Date(); // d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));

  d.setTime(d.getTime() + mins * 60 * 1000);
  var expires = "expires=" + d.toGMTString(); // console.info(cname + "=" + cvalue + "; " + expires + "; path=/");

  console.log(cname + "=" + cvalue + "; " + expires + "; path=/");
  window.location.pathname;
  document.cookie = cname + "=" + cvalue + "; " + expires + "; path=/"; // console.info(document.cookie);
} //获取cookie

function getCookie(cname) {
  var name = cname + "=";
  var ca = document.cookie.split(';');

  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];

    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }

    if (c.indexOf(name) != -1) return c.substring(name.length, c.length);
  }

  return "";
} //清除cookie

function clearCookie(cname) {
  this.setCookie(cname, "", -1);
}
function checkCookie() {
  var user = this.getCookie("username");

  if (user != "") {
    alert("Welcome again " + user);
  } else {
    user = prompt("Please enter your name:", "");

    if (user != "" && user != null) {
      this.setCookie("username", user, 365);
    }
  }
}

/***/ }),

/***/ "./resources/js/helpers/draggableItem.js":
/*!***********************************************!*\
  !*** ./resources/js/helpers/draggableItem.js ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "draggableItem": () => (/* binding */ draggableItem)
/* harmony export */ });
function draggableItem(item) {
  var isDown = false;
  var startX;
  var scrollLeft;
  item.addEventListener('mousedown', function (e) {
    isDown = true;
    item.classList.add('active');
    startX = e.pageX - item.offsetLeft;
    scrollLeft = item.scrollLeft;
  });
  item.addEventListener('mouseleave', function () {
    isDown = false;
    item.classList.remove('active');
  });
  item.addEventListener('mouseup', function () {
    isDown = false;
    item.classList.remove('active');
  });
  item.addEventListener('mousemove', function (e) {
    if (!isDown) return;
    e.preventDefault();
    var x = e.pageX - item.offsetLeft;
    var walk = (x - startX) * 3; //scroll-fast

    item.scrollLeft = scrollLeft - walk;
  });
}

/***/ }),

/***/ "./resources/js/helpers/getMeta.js":
/*!*****************************************!*\
  !*** ./resources/js/helpers/getMeta.js ***!
  \*****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "getMeta": () => (/* binding */ getMeta)
/* harmony export */ });
function getMeta(meta) {
  return document.head.querySelector("meta[name=\"".concat(meta, "\"]")) ? document.head.querySelector("meta[name=\"".concat(meta, "\"]")).content : null;
}

/***/ }),

/***/ "./resources/js/helpers/local-storage.js":
/*!***********************************************!*\
  !*** ./resources/js/helpers/local-storage.js ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "fetchLocalStorage": () => (/* binding */ fetchLocalStorage),
/* harmony export */   "sendLocalStorage": () => (/* binding */ sendLocalStorage)
/* harmony export */ });
function fetchLocalStorage(name, data) {
  if (localStorage.getItem(name)) {
    data = JSON.parse(decodeURIComponent(localStorage.getItem(name)));
  }

  return data;
}
function sendLocalStorage(name, data) {
  var cookies = data;
  localStorage.setItem(name, encodeURIComponent(JSON.stringify(cookies)), 10080);
  return data;
}

/***/ }),

/***/ "./resources/js/helpers/locale.js":
/*!****************************************!*\
  !*** ./resources/js/helpers/locale.js ***!
  \****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__),
/* harmony export */   "getLocaleCode": () => (/* binding */ getLocaleCode),
/* harmony export */   "getLocale": () => (/* binding */ getLocale),
/* harmony export */   "getCurrentURl": () => (/* binding */ getCurrentURl)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  temp: {
    currentLocale: '',
    lastUrl: ''
  },
  setLocale: function setLocale(locale) {
    this.temp.currentLocale = locale;
  },
  setLastUrl: function setLastUrl(url) {
    this.temp.lastUrl = url;
  }
});
function getLocaleCode() {
  var location = {
    'en': 0,
    'hk': 1,
    'cn': 2
  };
  return location[window.location.pathname.slice(1, 3)];
}
function getLocale() {
  return window.location.pathname.slice(1, 3);
}
function getCurrentURl() {
  return window.location.pathname.slice(3);
}

/***/ }),

/***/ "./resources/js/helpers/mutualVar.js":
/*!*******************************************!*\
  !*** ./resources/js/helpers/mutualVar.js ***!
  \*******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _locale__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./locale */ "./resources/js/helpers/locale.js");
/* harmony import */ var _local_storage__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./local-storage */ "./resources/js/helpers/local-storage.js");
/* harmony import */ var _getMeta__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./getMeta */ "./resources/js/helpers/getMeta.js");
/* harmony import */ var _draggableItem__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./draggableItem */ "./resources/js/helpers/draggableItem.js");



window.getMeta = _getMeta__WEBPACK_IMPORTED_MODULE_2__.getMeta;

window.draggableItem = _draggableItem__WEBPACK_IMPORTED_MODULE_3__.draggableItem;
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  cookiesInfo: {
    cookieLast: 60,
    diamondSearch: '',
    engagementSearch: '',
    weddingRingSearch: '',
    jewellery: '',
    coupon_code: '',
    shoppingCart: {
      items: [],
      haveShoppingCart: 0,
      selectingIndex: 0,
      selectingPairIndex: 0,
      selectingType: '',
      modalActive: 0,
      mode: 'create'
    },
    checkout: {
      balancePaymentMethod: 'VISA',
      subTotal: 0,
      discountedSubTotal: 0,
      discountedDeposit: 0,
      deposit: 0,
      depositPaymentMethod: 'VISA',
      balance: 0,
      processingOrderId: ''
    },
    shoppingCartCarousel: {
      items: []
    },
    fetchCookies: _local_storage__WEBPACK_IMPORTED_MODULE_1__.fetchLocalStorage,
    sendCookies: _local_storage__WEBPACK_IMPORTED_MODULE_1__.sendLocalStorage
  },
  notification: {
    state: {
      success: null,
      error: null
    }
  },
  langs: {
    localeCode: (0,_locale__WEBPACK_IMPORTED_MODULE_0__.getLocaleCode)(),
    locale: (0,_locale__WEBPACK_IMPORTED_MODULE_0__.getLocale)()
  },
  storage: {
    live: 'cfront',
    s3: 'https://s3.tingdiamond.com/',
    cfront: (0,_getMeta__WEBPACK_IMPORTED_MODULE_2__.getMeta)('meta-js-' + 'cfront')
  },
  screen: {
    x: 0,
    y: 0,
    scrollable: false,
    scrollingDown: false,
    scrollingUp: false,
    footerToTop: 0
  },
  namepath: (0,_locale__WEBPACK_IMPORTED_MODULE_0__.getCurrentURl)(),
  css: {
    jsReady: true,
    innerWidth: 0
  },
  tabs: {
    sideBar: '4cs'
  },
  status: {
    isProcessing: false
  },
  components: {
    slider: ''
  },
  vComponents: [],
  lw: {
    customerJewellery: {
      engagementRings: '',
      weddingRings: '',
      jewelleries: '',
      show: {
        videoSelecting: ''
      }
    },
    carousel: {
      src: '',
      thumb: '',
      type: '',
      video360: false
    }
  }
});

/***/ }),

/***/ "./resources/js/store/auth.js":
/*!************************************!*\
  !*** ./resources/js/store/auth.js ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  state: {
    api_token: document.head.querySelector('meta[name="api-token"]') ? document.head.querySelector('meta[name="api-token"]').content : null,
    user_id: null,
    user_role: null
  },
  initialize: function initialize() {
    this.state.api_token = localStorage.getItem('api_token');
    this.state.user_role = localStorage.getItem('user_role');
    this.state.user_id = parseInt(localStorage.getItem('user_id'));
  },
  set: function set(api_token, user_id, user_role) {
    localStorage.setItem('api_token', api_token);
    localStorage.setItem('user_id', user_id);
    localStorage.setItem('user_role', user_role);
    this.initialize();
  },
  remove: function remove() {
    localStorage.removeItem('api_token');
    localStorage.removeItem('user_id');
    localStorage.removeItem('user_role');
    this.initialize();
  }
});

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!******************************!*\
  !*** ./resources/js/main.js ***!
  \******************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers_mutualVar__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./helpers/mutualVar */ "./resources/js/helpers/mutualVar.js");
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _helpers_cookie__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./helpers/cookie */ "./resources/js/helpers/cookie.js");
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

window.mutualVar = _helpers_mutualVar__WEBPACK_IMPORTED_MODULE_0__.default;

window.get = _helpers_api__WEBPACK_IMPORTED_MODULE_1__.get;
window.post = _helpers_api__WEBPACK_IMPORTED_MODULE_1__.post;
window.pUrl = window.location.pathname.slice(3);

window.setCookie = _helpers_cookie__WEBPACK_IMPORTED_MODULE_2__.setCookie;
window.getCookie = _helpers_cookie__WEBPACK_IMPORTED_MODULE_2__.getCookie; // import HomeIndex from './views/frontEnd/home/index'
// if (window.location.pathname == '/' || window.location.pathname == '/en' || 
//     window.location.pathname == '/hk' || window.location.pathname == '/cn') 
//     {
//         const home =  new Vue(HomeIndex);
//     }
// import Notification from './components/notification.vue'
// import contactMessage from './components/contactMessage.vue'
})();

/******/ })()
;