/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/notification.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/notification.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _helpers_flash__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../helpers/flash */ "./resources/js/helpers/flash.js");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
 // import Auth from '../store/auth'
// import Images from './helpers/images'
// import Locale from './helpers/locale'
// import {get} from './helpers/api'

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  created: function created() {// Auth.initialize()
  },
  data: function data() {
    return {
      flash: _helpers_flash__WEBPACK_IMPORTED_MODULE_0__.default.state,
      mutualVar: mutualVar,
      langs: langs // auth: Auth.state,
      // images: Images

    };
  },
  computed: {
    notification: function notification() {
      return mutualVar.notification;
    }
  },
  methods: {
    resetArray: function resetArray() {
      this.notification.state.success = null;
      this.notification.state.error = null;
      this.notification.contactMessage.active = false;
    }
  }
});

/***/ }),

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

/***/ "./resources/js/helpers/flash.js":
/*!***************************************!*\
  !*** ./resources/js/helpers/flash.js ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  state: {
    success: null,
    error: null
  },
  setSuccess: function setSuccess(message) {
    var _this = this;

    this.state.success = message;
    setTimeout(function () {
      _this.removeSuccess();
    }, 10000);
  },
  setError: function setError(message) {
    var _this2 = this;

    this.state.error = message;
    setTimeout(function () {
      _this2.removeError();
    }, 15000);
  },
  removeSuccess: function removeSuccess() {
    this.state.success = null;
  },
  removeError: function removeError() {
    this.state.error = null;
  }
});

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
/* harmony import */ var _getMeta__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./getMeta */ "./resources/js/helpers/getMeta.js");


window.getMeta = _getMeta__WEBPACK_IMPORTED_MODULE_1__.getMeta;
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
    }
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
    cfront: (0,_getMeta__WEBPACK_IMPORTED_MODULE_1__.getMeta)('meta-js-' + 'cfront')
  },
  screen: {
    x: 0,
    y: 0,
    scrollable: false
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
  }
});

/***/ }),

/***/ "./resources/js/helpers/transJs.js":
/*!*****************************************!*\
  !*** ./resources/js/helpers/transJs.js ***!
  \*****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "transJs": () => (/* binding */ transJs)
/* harmony export */ });
function transJs(data, ori, locale) {
  var temp = [];
  temp = ori.filter(function (da) {
    return da[data];
  });

  if (temp.hasOwnProperty(0)) {
    return temp[0][data][locale];
  } else {
    return '.' + data;
  }
}

/***/ }),

/***/ "./resources/js/langs/shoppingCart.js":
/*!********************************************!*\
  !*** ./resources/js/langs/shoppingCart.js ***!
  \********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ([{
  'Select this Item': ['Select this Item', '選擇商品', '选择商品']
}, {
  'diamonds': ['diamonds', '鑽石', '钻石']
}, {
  'engagementRings': ['engagementRings', '求婚戒指', '求婚戒指']
}, {
  'Back to': ['Back to', '回到', '回到']
}, {
  'Remove': ['Remove', '刪除', '删除']
}, {
  'Ring Size': ['Ring Size', '戒指號', '戒指号']
}, {
  'Engrave': ['Engrave', '刻字', '刻字']
}, {
  'change': ['change', '更改', '更改']
}, {
  'Apply Coupon': ['Apply Coupon', '使用優惠碼', '使用优惠码']
}, {
  'Enter Coupon Code': ['Enter Coupon Code', '輸入優惠碼', '输入优惠码']
}, {
  'Total': ['Total', '總數', '总数']
}, {
  'Deposit (20%)': ['Deposit (20%)', '訂金(20%)', '订金(20%)']
}, {
  'Balance (80%)': ['Balance (80%)', '餘額(80%)', '余额(80%)']
}, {
  'VISA': ['VISA/Master', 'VISA/Master', 'VISA/Master']
}, {
  'ESP(-1%)': ['ESP(-1%)', 'ESP(-1%)', 'ESP(-1%)']
}, {
  'Alipay(-1%)': ['Alipay(-1%)', '支付寶(-1%)', '支付宝(-1%)']
}, {
  'Wechat(-1%)': ['Wechat(-1%)', '微信(-1%)', '微信(-1%)']
}, {
  'Cash(-2%)': ['Cash(~1.7-2%)', '現金(~1.7-2%)', '现金(~1.7-2%)']
}, {
  'checkout': ['checkout', '結賬', '结账']
}, {
  'Name': ['Name', ' 名稱', ' 名称']
}, {
  'Mobile': ['Mobile', '電話號碼', '电话号码']
}, {
  'Address': ['Address', '地址', '地址']
}, {
  'Email': ['Email', '電郵地址', '电邮地址']
}, {
  'Area': ['Area', '地區', '地区']
}, {
  'HK': ['HK', '香港', '香港']
}, {
  'CN': ['CN', '中國', '中国']
}, {
  'Add A Diamond': ['Add A Diamond', '加入鑽石', '加入钻石']
}, {
  'Add A Engagement Ring': ['Add A Engagement Ring', '加入戒指款式', '加入戒指款式']
}, {
  'Add To Cart': ['Add To Cart', '加入購物車', '加入购物车']
}, {
  'Disounted Total': ['Disounted Total', '折扣總數', '折扣总数']
}, {
  'you only need to pay deposit, balance will pay after 100% satisfied': ['you only need to pay deposit, balance will pay after 100% satisfied', '只需先付定金，餘額在滿意成品後才付款', '只需先付定金，余额在满意成品后才付款']
}, {
  'Today Order, Diamond Gets Free shipment': ['Today Order, Diamond Gets Free shipment', '今天下單, 鑽石免費運送', '今天下单, 钻石免费运送']
}, {
  'On': ['On', '於', '於']
}, {
  'check your pending order': ['check your pending order', '查看你的待確認訂單', '查看你的待确认订单']
}, {
  '0': ['No', '否', '否']
}, {
  '1': ['Yes', '是', '是']
}, {
  'January': ['January', '1月', '1月']
}, {
  'February': ['February', '2月', '2月']
}, {
  'March': ['March', '3月', '3月']
}, {
  'April': ['April', '四4', '4月']
}, {
  'May': ['May', '5月', '5月']
}, {
  'June': ['June', '6月', '6月']
}, {
  'July': ['July', '7月', '7月']
}, {
  'August': ['August', '8月', '8月']
}, {
  'September': ['September', '9月', '9月']
}, {
  'October': ['October', '10月', '10月']
}, {
  'November': ['November', '11月', '11月']
}, {
  'December': ['December', '12月', '12月']
}, {
  'Sunday': ['Sunday', '星期日', '星期日']
}, {
  'Monday': ['Monday', '星期一', '星期一']
}, {
  'Tuesday': ['Tuesday', '星期二', '星期二']
}, {
  'Wednesday': ['Wednesday', '星期三', '星期三']
}, {
  'Thursday': ['Thursday', '星期四', '星期四']
}, {
  'Friday': ['Friday', '星期五', '星期五']
}, {
  'Saturday': ['Saturday', '星期六', '星期六']
}, {
  'day': ['', '日', '日']
}, {
  'Precautions': ['Precautions', '注意事項', '注意事项']
}, {
  'All amounts of the company are subject to Hong Kong dollar settlement': ['All amounts of the company are subject to Hong Kong dollar settlement', '本公司一切金額以港幣結算為準 (8萬元以上之鑽石定價為現金價，如以信用卡、支付寶、微信付款，需額外支付2%手續費。​ )', '本公司一切金额以港币结算为准（8万元以上之钻石定价为现金价，如以信用卡，支付宝，微信付款，需额外支付2％手续费。）']
}, {
  'The customer is required to pay the full amount and withdraw the goods within two months after the order is placed, otherwise the company reserves the right to terminate the transaction.': ['The customer is required to pay the full amount and withdraw the goods within two months after the order is placed, otherwise the company reserves the right to terminate the transaction.', '客戶必須在訂貨後一個月內，支付全額並提取貨物，否則本公司將保留終止交易的權利。​', '客户必须在预定后一个月内，支付全额并提取货物，否则本公司将保留终止交易的权利。']
}, {
  'In order to protect the interests of both parties, unless the diamond does not match the GIA report, the order will not be returned after confirmation.': ['In order to protect the interests of both parties, unless the diamond does not match the GIA report, the order will not be returned after confirmation.', '為保障雙方利益, 除了鑽石跟GIA報告不相符，否則確認訂單後恕不退換。', '为保障双方利益, 除了钻石跟GIA报告不相符，否则确认订单后恕不退换。']
}, {
  'The deposit amount is 20%, ranging from at least $ 3000 to at most $ 10,000.': ['The deposit amount is 20%, ranging from at least $ 3000 to at most $ 10,000.', '訂金數目為2成，由最少$3000到最多$10000。', '订金数量为2成，由最少$ 3000到最多$ 10000。']
}, {
  'We buy directly in foreign countries, and it takes about 4-5 working days to ship to Hong Kong ~': ['We buy directly in foreign countries, and it takes about 4-5 working days to ship to Hong Kong ~', '我們直接在外國全數購買,運到香港需時4-5個工作天左右~', '我们直接在外国全数购买,运到香港需时4-5个工作天左右~']
}, {
  'After the diamond arrives in Hong Kong, I will inform you ~ Provide photos and certificate physical map, and then pay the balance when you pick up the goods': ['After the diamond arrives in Hong Kong, I will inform you ~ Provide photos and certificate physical map, and then pay the balance when you pick up the goods', '鑽石運到香港後，我會通知你~提供相片同證書實物圖,然後你取貨時先付餘款', '钻石运到香港后，我会通知你~提供相片同证书实物图,然后你取货时先付余款']
}, {
  'Login to save coupon code': ['Login to save coupon code', '登入賬號,儲存優惠碼', '登入賬號,儲存優惠碼']
}, {
  'mounting fee': ['mounting fee', '鑲工', '镶工']
}]);

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

/***/ }),

/***/ "./resources/js/userAccount.js":
/*!*************************************!*\
  !*** ./resources/js/userAccount.js ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _views_frontEnd_account_index__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./views/frontEnd/account/index */ "./resources/js/views/frontEnd/account/index.js");
/* harmony import */ var _views_frontEnd_account_setting__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./views/frontEnd/account/setting */ "./resources/js/views/frontEnd/account/setting.js");
/* harmony import */ var _views_frontEnd_account_pending__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./views/frontEnd/account/pending */ "./resources/js/views/frontEnd/account/pending.js");
/* harmony import */ var _views_frontEnd_account_pendingShow__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./views/frontEnd/account/pendingShow */ "./resources/js/views/frontEnd/account/pendingShow.js");
/* harmony import */ var _views_frontEnd_account_invoices__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./views/frontEnd/account/invoices */ "./resources/js/views/frontEnd/account/invoices.js");
/* harmony import */ var _views_frontEnd_account_invoiceShow__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./views/frontEnd/account/invoiceShow */ "./resources/js/views/frontEnd/account/invoiceShow.js");
/* harmony import */ var _views_frontEnd_account_referral_couponCode__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./views/frontEnd/account/referral/couponCode */ "./resources/js/views/frontEnd/account/referral/couponCode.js");
/* harmony import */ var _views_frontEnd_account_referral_records__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./views/frontEnd/account/referral/records */ "./resources/js/views/frontEnd/account/referral/records.js");
/* harmony import */ var _views_frontEnd_account_referral_refund__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./views/frontEnd/account/referral/refund */ "./resources/js/views/frontEnd/account/referral/refund.js");
/* harmony import */ var _views_frontEnd_account_order__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./views/frontEnd/account/order */ "./resources/js/views/frontEnd/account/order.js");
/* harmony import */ var _components_notification_vue__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./components/notification.vue */ "./resources/js/components/notification.vue");
/* harmony import */ var _helpers_locale__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ./helpers/locale */ "./resources/js/helpers/locale.js");
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
// require('./bootstrap');





 //referral







/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// Vue.component('example', require('./components/Example.vue'));

var header = new Vue({
  el: '#userHeader',
  data: function data() {
    return {
      mutualVar: mutualVar
    };
  },
  created: function created() {
    this.mutualVar.langs.localeCode = (0,_helpers_locale__WEBPACK_IMPORTED_MODULE_11__.getLocaleCode)();
    this.mutualVar.langs.locale = (0,_helpers_locale__WEBPACK_IMPORTED_MODULE_11__.getLocale)();
  },
  components: {
    Notification: _components_notification_vue__WEBPACK_IMPORTED_MODULE_10__.default
  },
  computed: {}
});
var pUrl = window.location.pathname.slice(3);

if (pUrl == '/account') {
  var account = new Vue(_views_frontEnd_account_index__WEBPACK_IMPORTED_MODULE_0__.default);
}

if (pUrl.includes('account/setting')) {
  var setting = new Vue(_views_frontEnd_account_setting__WEBPACK_IMPORTED_MODULE_1__.default);
}

if (pUrl == '/account/pending') {
  var pending = new Vue(_views_frontEnd_account_pending__WEBPACK_IMPORTED_MODULE_2__.default);
}

if (pUrl.includes('account/pending/')) {
  var pendingShow = new Vue(_views_frontEnd_account_pendingShow__WEBPACK_IMPORTED_MODULE_3__.default);
}

if (pUrl == '/account/invoices') {
  var invoices = new Vue(_views_frontEnd_account_invoices__WEBPACK_IMPORTED_MODULE_4__.default);
}

if (pUrl.includes('account/orders')) {
  var order = new Vue(_views_frontEnd_account_order__WEBPACK_IMPORTED_MODULE_9__.default);
}

if (pUrl.includes('account/invoices/')) {
  var invoiceShow = new Vue(_views_frontEnd_account_invoiceShow__WEBPACK_IMPORTED_MODULE_5__.default);
}

if (pUrl.includes('referral/coupon-code')) {
  var couponCode = new Vue(_views_frontEnd_account_referral_couponCode__WEBPACK_IMPORTED_MODULE_6__.default);
}

if (pUrl.includes('account/referral/records')) {
  var referralRecords = new Vue(_views_frontEnd_account_referral_records__WEBPACK_IMPORTED_MODULE_7__.default);
}

if (pUrl.includes('account/referral/refund')) {
  var referralRefund = new Vue(_views_frontEnd_account_referral_refund__WEBPACK_IMPORTED_MODULE_8__.default);
}

/***/ }),

/***/ "./resources/js/views/frontEnd/account/index.js":
/*!******************************************************!*\
  !*** ./resources/js/views/frontEnd/account/index.js ***!
  \******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../helpers/transJs */ "./resources/js/helpers/transJs.js");
/* harmony import */ var _helpers_locale__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../helpers/locale */ "./resources/js/helpers/locale.js");



/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  el: '#account',
  data: function data() {
    return {
      user: ''
    };
  },
  watch: {
    '$route': 'fetchData'
  },
  beforeMount: function beforeMount() {
    this.fetchData();
  },
  computed: {
    locale: function locale() {
      return (0,_helpers_locale__WEBPACK_IMPORTED_MODULE_2__.getLocaleCode)();
    }
  },
  filters: {
    transJs: _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__.transJs
  },
  methods: {
    fetchData: function fetchData() {
      var _this = this;

      (0,_helpers_api__WEBPACK_IMPORTED_MODULE_0__.get)("/api/account/user").then(function (res) {
        _this.user = res.data.user;
      });
    }
  }
});

/***/ }),

/***/ "./resources/js/views/frontEnd/account/invoiceShow.js":
/*!************************************************************!*\
  !*** ./resources/js/views/frontEnd/account/invoiceShow.js ***!
  \************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../helpers/transJs */ "./resources/js/helpers/transJs.js");
/* harmony import */ var _helpers_locale__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../helpers/locale */ "./resources/js/helpers/locale.js");


 // import DataViewer from '../../../components/user/DataViewer.vue'

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  el: '#invoiceShow',
  data: function data() {
    return {
      mutualVar: mutualVar,
      data: '',
      customer: '',
      model: {},
      company: []
    };
  },
  watch: {
    '$route': 'fetchData'
  },
  beforeMount: function beforeMount() {
    this.fetchData();
  },
  computed: {
    locale: function locale() {
      return (0,_helpers_locale__WEBPACK_IMPORTED_MODULE_2__.getLocaleCode)();
    }
  },
  filters: {
    transJs: _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__.transJs
  },
  methods: {
    fetchData: function fetchData() {
      var _this = this;

      (0,_helpers_api__WEBPACK_IMPORTED_MODULE_0__.get)("/api/account/invoices/".concat(window.location.pathname.slice(21))).then(function (res) {
        _this.model = res.data.model;
        _this.company = res.data.company;
      });
    },
    directTo: function directTo(id) {
      window.open((0,_helpers_locale__WEBPACK_IMPORTED_MODULE_2__.getLocale)() + '/account/invoices/' + id, '_self');
    }
  }
});

/***/ }),

/***/ "./resources/js/views/frontEnd/account/invoices.js":
/*!*********************************************************!*\
  !*** ./resources/js/views/frontEnd/account/invoices.js ***!
  \*********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../helpers/transJs */ "./resources/js/helpers/transJs.js");
/* harmony import */ var _helpers_locale__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../helpers/locale */ "./resources/js/helpers/locale.js");
/* harmony import */ var _langs_shoppingCart__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../langs/shoppingCart */ "./resources/js/langs/shoppingCart.js");



 // import DataViewer from '../../../components/user/DataViewer.vue'

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  el: '#invoices',
  data: function data() {
    return {
      mutualVar: mutualVar,
      data: '',
      langs: _langs_shoppingCart__WEBPACK_IMPORTED_MODULE_3__.default
    };
  },
  watch: {
    '$route': 'fetchData'
  },
  beforeMount: function beforeMount() {
    this.fetchData();
  },
  computed: {
    locale: function locale() {
      return (0,_helpers_locale__WEBPACK_IMPORTED_MODULE_2__.getLocaleCode)();
    }
  },
  filters: {
    transJs: _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__.transJs
  },
  methods: {
    fetchData: function fetchData() {
      var _this = this;

      (0,_helpers_api__WEBPACK_IMPORTED_MODULE_0__.get)("/api/account/invoices").then(function (res) {
        _this.data = res.data.model;
      });
    },
    directTo: function directTo(id) {
      window.open((0,_helpers_locale__WEBPACK_IMPORTED_MODULE_2__.getLocale)() + '/account/invoices/' + id, '_self');
    }
  }
});

/***/ }),

/***/ "./resources/js/views/frontEnd/account/order.js":
/*!******************************************************!*\
  !*** ./resources/js/views/frontEnd/account/order.js ***!
  \******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../helpers/transJs */ "./resources/js/helpers/transJs.js");
/* harmony import */ var _helpers_locale__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../helpers/locale */ "./resources/js/helpers/locale.js");



/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  el: '#account',
  data: function data() {
    return {
      user: ''
    };
  },
  watch: {
    '$route': 'fetchData'
  },
  beforeMount: function beforeMount() {
    this.fetchData();
  },
  computed: {
    locale: function locale() {
      return (0,_helpers_locale__WEBPACK_IMPORTED_MODULE_2__.getLocaleCode)();
    }
  },
  filters: {
    transJs: _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__.transJs
  },
  methods: {
    fetchData: function fetchData() {
      var _this = this;

      (0,_helpers_api__WEBPACK_IMPORTED_MODULE_0__.get)("/api/account/user").then(function (res) {
        _this.user = res.data.user;
      });
    }
  }
});

/***/ }),

/***/ "./resources/js/views/frontEnd/account/pending.js":
/*!********************************************************!*\
  !*** ./resources/js/views/frontEnd/account/pending.js ***!
  \********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _helpers_cookie__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../helpers/cookie */ "./resources/js/helpers/cookie.js");
/* harmony import */ var _helpers_transJs__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../helpers/transJs */ "./resources/js/helpers/transJs.js");
/* harmony import */ var _helpers_locale__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../helpers/locale */ "./resources/js/helpers/locale.js");
/* harmony import */ var _langs_shoppingCart__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../../../langs/shoppingCart */ "./resources/js/langs/shoppingCart.js");




 // import DataViewer from '../../../components/user/DataViewer.vue'

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  el: '#pending',
  data: function data() {
    return {
      mutualVar: mutualVar,
      data: '',
      langs: _langs_shoppingCart__WEBPACK_IMPORTED_MODULE_4__.default
    };
  },
  watch: {
    '$route': 'fetchData'
  },
  beforeMount: function beforeMount() {
    this.fetchData();
  },
  computed: {
    locale: function locale() {
      return (0,_helpers_locale__WEBPACK_IMPORTED_MODULE_3__.getLocaleCode)();
    },
    couponCode: function couponCode() {
      return (0,_helpers_cookie__WEBPACK_IMPORTED_MODULE_1__.getCookie)('coupon_code');
    }
  },
  filters: {
    transJs: _helpers_transJs__WEBPACK_IMPORTED_MODULE_2__.transJs
  },
  methods: {
    fetchData: function fetchData() {
      var _this = this;

      (0,_helpers_api__WEBPACK_IMPORTED_MODULE_0__.get)("/api/account/pending").then(function (res) {
        _this.data = res.data.model;
      });
    },
    directTo: function directTo(id) {
      window.open((0,_helpers_locale__WEBPACK_IMPORTED_MODULE_3__.getLocale)() + '/account/pending/' + id, '_self');
    }
  }
});

/***/ }),

/***/ "./resources/js/views/frontEnd/account/pendingShow.js":
/*!************************************************************!*\
  !*** ./resources/js/views/frontEnd/account/pendingShow.js ***!
  \************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../helpers/transJs */ "./resources/js/helpers/transJs.js");
/* harmony import */ var _helpers_locale__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../helpers/locale */ "./resources/js/helpers/locale.js");



/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  el: '#pendingShow',
  data: function data() {
    return {
      mutualVar: mutualVar,
      data: '',
      customer: ''
    };
  },
  watch: {
    '$route': 'fetchData'
  },
  beforeMount: function beforeMount() {
    this.fetchData();
  },
  computed: {
    locale: function locale() {
      return (0,_helpers_locale__WEBPACK_IMPORTED_MODULE_2__.getLocaleCode)();
    }
  },
  filters: {
    transJs: _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__.transJs
  },
  methods: {
    fetchData: function fetchData() {
      var _this = this;

      (0,_helpers_api__WEBPACK_IMPORTED_MODULE_0__.get)("/api/account/pending/".concat(window.location.pathname.slice(20))).then(function (res) {
        _this.data = res.data.model;
        _this.customer = res.data.customer;
      });
    },
    directTo: function directTo(id) {
      window.open((0,_helpers_locale__WEBPACK_IMPORTED_MODULE_2__.getLocale)() + '/account/pending/' + id, '_self');
    }
  }
});

/***/ }),

/***/ "./resources/js/views/frontEnd/account/referral/couponCode.js":
/*!********************************************************************!*\
  !*** ./resources/js/views/frontEnd/account/referral/couponCode.js ***!
  \********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../../helpers/transJs */ "./resources/js/helpers/transJs.js");
/* harmony import */ var _helpers_locale__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../helpers/locale */ "./resources/js/helpers/locale.js");
/* harmony import */ var _helpers_flash__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../helpers/flash */ "./resources/js/helpers/flash.js");
/* harmony import */ var _components_notification_vue__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../../../../components/notification.vue */ "./resources/js/components/notification.vue");
/* harmony import */ var _helpers_mutualVar__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../../../../helpers/mutualVar */ "./resources/js/helpers/mutualVar.js");
 // import router from '../../../../router'






/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  el: '#couponCode',
  // router,	
  components: {
    Notification: _components_notification_vue__WEBPACK_IMPORTED_MODULE_4__.default
  },
  data: function data() {
    return {
      model: '',
      mutualVar: _helpers_mutualVar__WEBPACK_IMPORTED_MODULE_5__.default
    };
  },
  watch: {
    '$route': 'fetchData'
  },
  created: function created() {
    this.fetchData();
  },
  computed: {
    locale: function locale() {
      return (0,_helpers_locale__WEBPACK_IMPORTED_MODULE_2__.getLocaleCode)();
    },
    hostname: function hostname() {
      return window.location.hostname;
    }
  },
  filters: {
    transJs: _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__.transJs
  },
  methods: {
    fetchData: function fetchData() {
      var _this = this;

      (0,_helpers_api__WEBPACK_IMPORTED_MODULE_0__.get)("/api/referral/code").then(function (res) {
        _this.model = res.data.model;
      });
    }
  }
});

/***/ }),

/***/ "./resources/js/views/frontEnd/account/referral/records.js":
/*!*****************************************************************!*\
  !*** ./resources/js/views/frontEnd/account/referral/records.js ***!
  \*****************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../../helpers/transJs */ "./resources/js/helpers/transJs.js");
/* harmony import */ var _helpers_locale__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../helpers/locale */ "./resources/js/helpers/locale.js");
/* harmony import */ var _langs_shoppingCart__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../langs/shoppingCart */ "./resources/js/langs/shoppingCart.js");
/* harmony import */ var _helpers_flash__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../../../../helpers/flash */ "./resources/js/helpers/flash.js");
/* harmony import */ var _components_notification_vue__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../../../../components/notification.vue */ "./resources/js/components/notification.vue");
/* harmony import */ var _helpers_mutualVar__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../../../../helpers/mutualVar */ "./resources/js/helpers/mutualVar.js");







/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  el: '#records',
  components: {
    Notification: _components_notification_vue__WEBPACK_IMPORTED_MODULE_5__.default
  },
  data: function data() {
    return {
      model: '',
      coupon: '',
      mutualVar: _helpers_mutualVar__WEBPACK_IMPORTED_MODULE_6__.default,
      langs: _langs_shoppingCart__WEBPACK_IMPORTED_MODULE_3__.default,
      refundAmount: 0
    };
  },
  watch: {
    '$route': 'fetchData'
  },
  created: function created() {
    this.fetchData();
  },
  computed: {
    locale: function locale() {
      return (0,_helpers_locale__WEBPACK_IMPORTED_MODULE_2__.getLocaleCode)();
    },
    hostname: function hostname() {
      return window.location.hostname;
    },
    refundAmountSum: function refundAmountSum() {
      var data = this.model.data;
      var rate = '';

      for (var i = 0; i < data.length; i++) {
        if (data[i].status != 'taken') {
          if (data[i].invoice) {
            for (var j = 0; j < data[i].invoice.inv_diamonds.length; j++) {
              this.refundAmount += this.discountRateCheckMet(data[i].invoice.inv_diamonds[j].price) * data[i].invoice.inv_diamonds[j].price;
            }
          }
        }
      }

      this.refundAmount = Math.round(this.refundAmount * 100) / 100;
      return this.refundAmount;
    },
    refunded: function refunded() {
      var data = this.model.data;
      var rate = '';
      var refunded = 0;

      for (var i = 0; i < data.length; i++) {
        if (data[i].status == 'taken') {
          if (data[i].invoice) {
            for (var j = 0; j < data[i].invoice.inv_diamonds.length; j++) {
              refunded += this.discountRateCheckMet(data[i].invoice.inv_diamonds[j].price) * data[i].invoice.inv_diamonds[j].price;
            }
          }
        }
      }

      refunded = Math.round(refunded * 100) / 100;
      return refunded;
    }
  },
  filters: {
    transJs: _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__.transJs,
    discountRateCheck: function discountRateCheck(data, coupon) {
      var rate = data[0];

      for (var i = 0; i < coupon.length; i++) {
        if (coupon[i].upperAmount > data && coupon[i].lowerAmount < data) {
          rate = coupon[i].refund;
          return rate;
        }
      }
    },
    hideInfo: function hideInfo(data) {
      var data = data.toString();
      var x = 'x';
      x = x.repeat(data.length / 2);
      return data.slice(0, data.length / 2).concat(x);
    }
  },
  methods: {
    fetchData: function fetchData() {
      var _this = this;

      (0,_helpers_api__WEBPACK_IMPORTED_MODULE_0__.get)("/api/referral/records").then(function (res) {
        _this.model = res.data.model;
      });
      (0,_helpers_api__WEBPACK_IMPORTED_MODULE_0__.get)("/api/referral/code").then(function (res) {
        _this.coupon = res.data.model;
      });
    },
    discountRateCheckMet: function discountRateCheckMet(data) {
      var rate = '';

      for (var k = 0; k < this.coupon.discountRate.length; k++) {
        if (this.coupon.discountRate[k].upperAmount > data && this.coupon.discountRate[k].lowerAmount < data) {
          rate = this.coupon.discountRate[k].refund;
          return rate;
        }
      }
    }
  }
});

/***/ }),

/***/ "./resources/js/views/frontEnd/account/referral/refund.js":
/*!****************************************************************!*\
  !*** ./resources/js/views/frontEnd/account/referral/refund.js ***!
  \****************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../../helpers/transJs */ "./resources/js/helpers/transJs.js");
/* harmony import */ var _helpers_locale__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../helpers/locale */ "./resources/js/helpers/locale.js");
/* harmony import */ var _langs_shoppingCart__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../langs/shoppingCart */ "./resources/js/langs/shoppingCart.js");
/* harmony import */ var _helpers_flash__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../../../../helpers/flash */ "./resources/js/helpers/flash.js");
/* harmony import */ var _components_notification_vue__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../../../../components/notification.vue */ "./resources/js/components/notification.vue");
/* harmony import */ var _helpers_mutualVar__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../../../../helpers/mutualVar */ "./resources/js/helpers/mutualVar.js");







/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  el: '#refund',
  components: {
    Notification: _components_notification_vue__WEBPACK_IMPORTED_MODULE_5__.default
  },
  data: function data() {
    return {
      model: '',
      mutualVar: _helpers_mutualVar__WEBPACK_IMPORTED_MODULE_6__.default,
      langs: _langs_shoppingCart__WEBPACK_IMPORTED_MODULE_3__.default
    };
  },
  watch: {
    '$route': 'fetchData'
  },
  created: function created() {
    this.fetchData();
  },
  computed: {
    locale: function locale() {
      return (0,_helpers_locale__WEBPACK_IMPORTED_MODULE_2__.getLocaleCode)();
    },
    hostname: function hostname() {
      return window.location.hostname;
    }
  },
  filters: {
    transJs: _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__.transJs,
    discountRateCheck: function discountRateCheck(data, coupon) {
      var rate = data[0];

      for (var i = 0; i < coupon.length; i++) {
        if (coupon[i].upperAmount > data && coupon[i].lowerAmount < data) {
          rate = coupon[i].rate;
          return rate;
        }
      }
    },
    hideInfo: function hideInfo(data) {
      var data = data.toString();
      var x = 'x';
      x = x.repeat(data.length / 2);
      return data.slice(0, data.length / 2).concat(x);
    }
  },
  methods: {
    fetchData: function fetchData() {
      var _this = this;

      (0,_helpers_api__WEBPACK_IMPORTED_MODULE_0__.get)("/api/referral/refund").then(function (res) {
        _this.model = res.data.model;
      });
      (0,_helpers_api__WEBPACK_IMPORTED_MODULE_0__.get)("/api/referral/code").then(function (res) {
        _this.model = res.data.model;
      });
    }
  }
});

/***/ }),

/***/ "./resources/js/views/frontEnd/account/setting.js":
/*!********************************************************!*\
  !*** ./resources/js/views/frontEnd/account/setting.js ***!
  \********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../helpers/transJs */ "./resources/js/helpers/transJs.js");
/* harmony import */ var _helpers_locale__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../helpers/locale */ "./resources/js/helpers/locale.js");



/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  el: '#setting',
  data: function data() {
    return {
      mutualVar: mutualVar,
      form: {
        user: '',
        password: {
          current: '',
          "new": '',
          confirm: '',
          disable: true
        }
      },
      nullPassword: '',
      data: '',
      isProcessing: false,
      errors: {
        user: '',
        password: ''
      }
    };
  },
  watch: {
    '$route': 'fetchData'
  },
  beforeMount: function beforeMount() {
    this.fetchData();
  },
  computed: {
    locale: function locale() {
      return (0,_helpers_locale__WEBPACK_IMPORTED_MODULE_2__.getLocaleCode)();
    }
  },
  filters: {
    transJs: _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__.transJs
  },
  methods: {
    fetchData: function fetchData() {
      var _this = this;

      (0,_helpers_api__WEBPACK_IMPORTED_MODULE_0__.get)("/api/account/user").then(function (res) {
        _this.form.user = res.data.user;
        _this.nullPassword = res.data.nullPassword;
      });
    },
    save: function save() {
      var _this2 = this;

      var checkingBeforePost = false;
      checkingBeforePost = this.checkComfirmPassword();
      this.isProcessing = true;

      if (checkingBeforePost) {
        (0,_helpers_api__WEBPACK_IMPORTED_MODULE_0__.post)('/api/account/user', this.form).then(function (res) {
          if (res.data.saved) {
            _this2.mutualVar.notification.state.success = res.data.message;
          }
        })["catch"](function (err) {
          if (err.response.status === 422) {
            _this2.mutualVar.notification.state.error = err.response.data.message;
          }
        });
      }
    },
    checkComfirmPassword: function checkComfirmPassword() {
      var confirm = true;

      if (this.form.password["new"] != '') {
        if (this.form.password["new"] == this.form.password.confirm) {
          confirm = true;
        } else {
          alert('Passwords are not the same');
          confirm = false;
        }
      }

      return confirm;
    }
  }
});

/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/notification.vue?vue&type=style&index=0&lang=css&":
/*!***************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/notification.vue?vue&type=style&index=0&lang=css& ***!
  \***************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__);
// Imports

var ___CSS_LOADER_EXPORT___ = _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default()(function(i){return i[1]});
// Module
___CSS_LOADER_EXPORT___.push([module.id, "\n*{\n  box-sizing: border-box;\n}\n\n", ""]);
// Exports
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/css-loader/dist/runtime/api.js":
/*!*****************************************************!*\
  !*** ./node_modules/css-loader/dist/runtime/api.js ***!
  \*****************************************************/
/***/ ((module) => {



/*
  MIT License http://www.opensource.org/licenses/mit-license.php
  Author Tobias Koppers @sokra
*/
// css base code, injected by the css-loader
// eslint-disable-next-line func-names
module.exports = function (cssWithMappingToString) {
  var list = []; // return the list of modules as css string

  list.toString = function toString() {
    return this.map(function (item) {
      var content = cssWithMappingToString(item);

      if (item[2]) {
        return "@media ".concat(item[2], " {").concat(content, "}");
      }

      return content;
    }).join('');
  }; // import a list of modules into the list
  // eslint-disable-next-line func-names


  list.i = function (modules, mediaQuery, dedupe) {
    if (typeof modules === 'string') {
      // eslint-disable-next-line no-param-reassign
      modules = [[null, modules, '']];
    }

    var alreadyImportedModules = {};

    if (dedupe) {
      for (var i = 0; i < this.length; i++) {
        // eslint-disable-next-line prefer-destructuring
        var id = this[i][0];

        if (id != null) {
          alreadyImportedModules[id] = true;
        }
      }
    }

    for (var _i = 0; _i < modules.length; _i++) {
      var item = [].concat(modules[_i]);

      if (dedupe && alreadyImportedModules[item[0]]) {
        // eslint-disable-next-line no-continue
        continue;
      }

      if (mediaQuery) {
        if (!item[2]) {
          item[2] = mediaQuery;
        } else {
          item[2] = "".concat(mediaQuery, " and ").concat(item[2]);
        }
      }

      list.push(item);
    }
  };

  return list;
};

/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/notification.vue?vue&type=style&index=0&lang=css&":
/*!*******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/notification.vue?vue&type=style&index=0&lang=css& ***!
  \*******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_notification_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./notification.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/notification.vue?vue&type=style&index=0&lang=css&");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_notification_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__.default, options);



/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_notification_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__.default.locals || {});

/***/ }),

/***/ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js":
/*!****************************************************************************!*\
  !*** ./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js ***!
  \****************************************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {



var isOldIE = function isOldIE() {
  var memo;
  return function memorize() {
    if (typeof memo === 'undefined') {
      // Test for IE <= 9 as proposed by Browserhacks
      // @see http://browserhacks.com/#hack-e71d8692f65334173fee715c222cb805
      // Tests for existence of standard globals is to allow style-loader
      // to operate correctly into non-standard environments
      // @see https://github.com/webpack-contrib/style-loader/issues/177
      memo = Boolean(window && document && document.all && !window.atob);
    }

    return memo;
  };
}();

var getTarget = function getTarget() {
  var memo = {};
  return function memorize(target) {
    if (typeof memo[target] === 'undefined') {
      var styleTarget = document.querySelector(target); // Special case to return head of iframe instead of iframe itself

      if (window.HTMLIFrameElement && styleTarget instanceof window.HTMLIFrameElement) {
        try {
          // This will throw an exception if access to iframe is blocked
          // due to cross-origin restrictions
          styleTarget = styleTarget.contentDocument.head;
        } catch (e) {
          // istanbul ignore next
          styleTarget = null;
        }
      }

      memo[target] = styleTarget;
    }

    return memo[target];
  };
}();

var stylesInDom = [];

function getIndexByIdentifier(identifier) {
  var result = -1;

  for (var i = 0; i < stylesInDom.length; i++) {
    if (stylesInDom[i].identifier === identifier) {
      result = i;
      break;
    }
  }

  return result;
}

function modulesToDom(list, options) {
  var idCountMap = {};
  var identifiers = [];

  for (var i = 0; i < list.length; i++) {
    var item = list[i];
    var id = options.base ? item[0] + options.base : item[0];
    var count = idCountMap[id] || 0;
    var identifier = "".concat(id, " ").concat(count);
    idCountMap[id] = count + 1;
    var index = getIndexByIdentifier(identifier);
    var obj = {
      css: item[1],
      media: item[2],
      sourceMap: item[3]
    };

    if (index !== -1) {
      stylesInDom[index].references++;
      stylesInDom[index].updater(obj);
    } else {
      stylesInDom.push({
        identifier: identifier,
        updater: addStyle(obj, options),
        references: 1
      });
    }

    identifiers.push(identifier);
  }

  return identifiers;
}

function insertStyleElement(options) {
  var style = document.createElement('style');
  var attributes = options.attributes || {};

  if (typeof attributes.nonce === 'undefined') {
    var nonce =  true ? __webpack_require__.nc : 0;

    if (nonce) {
      attributes.nonce = nonce;
    }
  }

  Object.keys(attributes).forEach(function (key) {
    style.setAttribute(key, attributes[key]);
  });

  if (typeof options.insert === 'function') {
    options.insert(style);
  } else {
    var target = getTarget(options.insert || 'head');

    if (!target) {
      throw new Error("Couldn't find a style target. This probably means that the value for the 'insert' parameter is invalid.");
    }

    target.appendChild(style);
  }

  return style;
}

function removeStyleElement(style) {
  // istanbul ignore if
  if (style.parentNode === null) {
    return false;
  }

  style.parentNode.removeChild(style);
}
/* istanbul ignore next  */


var replaceText = function replaceText() {
  var textStore = [];
  return function replace(index, replacement) {
    textStore[index] = replacement;
    return textStore.filter(Boolean).join('\n');
  };
}();

function applyToSingletonTag(style, index, remove, obj) {
  var css = remove ? '' : obj.media ? "@media ".concat(obj.media, " {").concat(obj.css, "}") : obj.css; // For old IE

  /* istanbul ignore if  */

  if (style.styleSheet) {
    style.styleSheet.cssText = replaceText(index, css);
  } else {
    var cssNode = document.createTextNode(css);
    var childNodes = style.childNodes;

    if (childNodes[index]) {
      style.removeChild(childNodes[index]);
    }

    if (childNodes.length) {
      style.insertBefore(cssNode, childNodes[index]);
    } else {
      style.appendChild(cssNode);
    }
  }
}

function applyToTag(style, options, obj) {
  var css = obj.css;
  var media = obj.media;
  var sourceMap = obj.sourceMap;

  if (media) {
    style.setAttribute('media', media);
  } else {
    style.removeAttribute('media');
  }

  if (sourceMap && typeof btoa !== 'undefined') {
    css += "\n/*# sourceMappingURL=data:application/json;base64,".concat(btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap)))), " */");
  } // For old IE

  /* istanbul ignore if  */


  if (style.styleSheet) {
    style.styleSheet.cssText = css;
  } else {
    while (style.firstChild) {
      style.removeChild(style.firstChild);
    }

    style.appendChild(document.createTextNode(css));
  }
}

var singleton = null;
var singletonCounter = 0;

function addStyle(obj, options) {
  var style;
  var update;
  var remove;

  if (options.singleton) {
    var styleIndex = singletonCounter++;
    style = singleton || (singleton = insertStyleElement(options));
    update = applyToSingletonTag.bind(null, style, styleIndex, false);
    remove = applyToSingletonTag.bind(null, style, styleIndex, true);
  } else {
    style = insertStyleElement(options);
    update = applyToTag.bind(null, style, options);

    remove = function remove() {
      removeStyleElement(style);
    };
  }

  update(obj);
  return function updateStyle(newObj) {
    if (newObj) {
      if (newObj.css === obj.css && newObj.media === obj.media && newObj.sourceMap === obj.sourceMap) {
        return;
      }

      update(obj = newObj);
    } else {
      remove();
    }
  };
}

module.exports = function (list, options) {
  options = options || {}; // Force single-tag solution on IE6-9, which has a hard limit on the # of <style>
  // tags it will allow on a page

  if (!options.singleton && typeof options.singleton !== 'boolean') {
    options.singleton = isOldIE();
  }

  list = list || [];
  var lastIdentifiers = modulesToDom(list, options);
  return function update(newList) {
    newList = newList || [];

    if (Object.prototype.toString.call(newList) !== '[object Array]') {
      return;
    }

    for (var i = 0; i < lastIdentifiers.length; i++) {
      var identifier = lastIdentifiers[i];
      var index = getIndexByIdentifier(identifier);
      stylesInDom[index].references--;
    }

    var newLastIdentifiers = modulesToDom(newList, options);

    for (var _i = 0; _i < lastIdentifiers.length; _i++) {
      var _identifier = lastIdentifiers[_i];

      var _index = getIndexByIdentifier(_identifier);

      if (stylesInDom[_index].references === 0) {
        stylesInDom[_index].updater();

        stylesInDom.splice(_index, 1);
      }
    }

    lastIdentifiers = newLastIdentifiers;
  };
};

/***/ }),

/***/ "./resources/js/components/notification.vue":
/*!**************************************************!*\
  !*** ./resources/js/components/notification.vue ***!
  \**************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _notification_vue_vue_type_template_id_05d56994___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./notification.vue?vue&type=template&id=05d56994& */ "./resources/js/components/notification.vue?vue&type=template&id=05d56994&");
/* harmony import */ var _notification_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./notification.vue?vue&type=script&lang=js& */ "./resources/js/components/notification.vue?vue&type=script&lang=js&");
/* harmony import */ var _notification_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./notification.vue?vue&type=style&index=0&lang=css& */ "./resources/js/components/notification.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! !../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");



;


/* normalize component */

var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__.default)(
  _notification_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _notification_vue_vue_type_template_id_05d56994___WEBPACK_IMPORTED_MODULE_0__.render,
  _notification_vue_vue_type_template_id_05d56994___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/notification.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/notification.vue?vue&type=script&lang=js&":
/*!***************************************************************************!*\
  !*** ./resources/js/components/notification.vue?vue&type=script&lang=js& ***!
  \***************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_notification_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./notification.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/notification.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_notification_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/components/notification.vue?vue&type=style&index=0&lang=css&":
/*!***********************************************************************************!*\
  !*** ./resources/js/components/notification.vue?vue&type=style&index=0&lang=css& ***!
  \***********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_notification_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/style-loader/dist/cjs.js!../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./notification.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/notification.vue?vue&type=style&index=0&lang=css&");


/***/ }),

/***/ "./resources/js/components/notification.vue?vue&type=template&id=05d56994&":
/*!*********************************************************************************!*\
  !*** ./resources/js/components/notification.vue?vue&type=template&id=05d56994& ***!
  \*********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_notification_vue_vue_type_template_id_05d56994___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_notification_vue_vue_type_template_id_05d56994___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_notification_vue_vue_type_template_id_05d56994___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./notification.vue?vue&type=template&id=05d56994& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/notification.vue?vue&type=template&id=05d56994&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/notification.vue?vue&type=template&id=05d56994&":
/*!************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/notification.vue?vue&type=template&id=05d56994& ***!
  \************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "z-10" }, [
    _vm.notification.state.success ||
    _vm.notification.state.error ||
    _vm.notification.contactMessage.active
      ? _c(
          "div",
          {
            on: {
              click: function($event) {
                return _vm.resetArray()
              }
            }
          },
          [
            _c("transition", { attrs: { name: "modal" } }, [
              _c("div", { staticClass: "modal-mask" }, [
                _c("button", {
                  staticClass: "modal-button",
                  attrs: { tabindex: "-1" }
                }),
                _vm._v(" "),
                _c("div", { staticClass: "modal-wrapper" }, [
                  _c(
                    "div",
                    {
                      staticClass: "modal-dialog modal-dialog-centered",
                      attrs: { role: "document" },
                      on: {
                        click: function($event) {
                          return _vm.resetArray()
                        }
                      }
                    },
                    [
                      _c("div", { staticClass: "modal-content" }, [
                        _c("div", { staticClass: "modal-header border-b" }, [
                          _c("h5", { staticClass: "modal-title" }),
                          _vm._v(" "),
                          _c(
                            "button",
                            {
                              staticClass: "close",
                              attrs: {
                                type: "button",
                                "data-dismiss": "modal",
                                "aria-label": "Close"
                              }
                            },
                            [
                              _c(
                                "span",
                                {
                                  attrs: { "aria-hidden": "true" },
                                  on: {
                                    click: function($event) {
                                      return _vm.resetArray()
                                    }
                                  }
                                },
                                [_vm._v("×")]
                              )
                            ]
                          )
                        ]),
                        _vm._v(" "),
                        _c("div", { staticClass: "modal-body p-2" }, [
                          _vm.notification.state.success
                            ? _c("div", [
                                !Array.isArray(_vm.notification.state.success)
                                  ? _c(
                                      "div",
                                      {
                                        staticClass: "notification is-info w-64"
                                      },
                                      [
                                        _c("center", [
                                          _vm._v(
                                            "\n                        " +
                                              _vm._s(
                                                _vm.notification.state.success
                                              ) +
                                              "\n                      "
                                          )
                                        ])
                                      ],
                                      1
                                    )
                                  : _vm._e(),
                                _vm._v(" "),
                                Array.isArray(_vm.notification.state.success)
                                  ? _c(
                                      "div",
                                      {
                                        staticClass: "notification is-info w-64"
                                      },
                                      [
                                        _c(
                                          "ol",
                                          { attrs: { type: "1" } },
                                          _vm._l(
                                            _vm.notification.state.success,
                                            function(message) {
                                              return _c("div", [
                                                _c("li", [
                                                  _vm._v(_vm._s(message))
                                                ])
                                              ])
                                            }
                                          ),
                                          0
                                        )
                                      ]
                                    )
                                  : _vm._e()
                              ])
                            : _vm._e(),
                          _vm._v(" "),
                          _vm.notification.state.error
                            ? _c("div", [
                                !Array.isArray(_vm.notification.state.error)
                                  ? _c(
                                      "div",
                                      {
                                        staticClass: "notification is-info w-64"
                                      },
                                      [
                                        _c("center", [
                                          _vm._v(
                                            "\n                        " +
                                              _vm._s(
                                                _vm.notification.state.error
                                              ) +
                                              "\n                      "
                                          )
                                        ])
                                      ],
                                      1
                                    )
                                  : _vm._e(),
                                _vm._v(" "),
                                Array.isArray(_vm.notification.state.error)
                                  ? _c(
                                      "div",
                                      {
                                        staticClass: "notification is-info w-64"
                                      },
                                      [
                                        _c(
                                          "ol",
                                          { attrs: { type: "1" } },
                                          _vm._l(
                                            _vm.notification.state.error,
                                            function(message) {
                                              return _c("div", [
                                                _c("li", [
                                                  _vm._v(_vm._s(message))
                                                ])
                                              ])
                                            }
                                          ),
                                          0
                                        )
                                      ]
                                    )
                                  : _vm._e()
                              ])
                            : _vm._e(),
                          _vm._v(" "),
                          _vm.notification.contactMessage.active
                            ? _c("div", { staticClass: "grid grid-cols-12" }, [
                                _c("div", { staticClass: "col-span-4" }, [
                                  _c("img", {
                                    attrs: {
                                      width: "128",
                                      src:
                                        "/images/front-end/aboutUs/wechat.jpg"
                                    }
                                  })
                                ]),
                                _vm._v(" "),
                                _c("div", { staticClass: "col-span-8" }, [
                                  _c("div", { staticClass: "content" }, [
                                    _vm.notification.contactMessage.trans
                                      ? _c(
                                          "div",
                                          [
                                            _c(
                                              "p",
                                              { staticClass: "text-2xl p-1" },
                                              [
                                                _c("strong", [
                                                  _vm._v(
                                                    _vm._s(
                                                      _vm._f("transJs")(
                                                        _vm.notification
                                                          .contactMessage.title,
                                                        _vm.langs
                                                      )
                                                    )
                                                  )
                                                ]),
                                                _vm._v(" "),
                                                _c("small", [_vm._v("@Admin")]),
                                                _vm._v(" "),
                                                _c("br")
                                              ]
                                            ),
                                            _vm._v(" "),
                                            _vm._l(
                                              _vm.notification.contactMessage
                                                .data,
                                              function(dat) {
                                                return _c(
                                                  "p",
                                                  {
                                                    class:
                                                      _vm.notification
                                                        .contactMessage.type
                                                  },
                                                  [
                                                    _vm._v(
                                                      "\n                              " +
                                                        _vm._s(
                                                          _vm._f("transJs")(
                                                            dat,
                                                            _vm.langs
                                                          )
                                                        ) +
                                                        "\n                            "
                                                    )
                                                  ]
                                                )
                                              }
                                            ),
                                            _vm._v(" "),
                                            _c(
                                              "a",
                                              {
                                                attrs: {
                                                  href:
                                                    _vm.notification
                                                      .contactMessage.next
                                                      .nextUrl,
                                                  target: "_blank"
                                                }
                                              },
                                              [
                                                _c("i", {
                                                  staticClass:
                                                    "fas fa-search-plus"
                                                }),
                                                _vm._v(
                                                  "\n                              " +
                                                    _vm._s(
                                                      _vm._f("transJs")(
                                                        _vm.notification
                                                          .contactMessage.next
                                                          .nextText,
                                                        _vm.langs
                                                      )
                                                    ) +
                                                    "\n                            "
                                                )
                                              ]
                                            )
                                          ],
                                          2
                                        )
                                      : _c(
                                          "div",
                                          [
                                            _c("p", [
                                              _c("strong", [
                                                _vm._v(
                                                  _vm._s(
                                                    _vm.notification
                                                      .contactMessage.title
                                                  )
                                                )
                                              ]),
                                              _vm._v(" "),
                                              _c("small", [_vm._v("@Admin")]),
                                              _vm._v(" "),
                                              _c("br")
                                            ]),
                                            _vm._v(" "),
                                            _vm._l(
                                              _vm.notification.contactMessage
                                                .data,
                                              function(dat) {
                                                return _c(
                                                  "span",
                                                  {
                                                    staticClass: "text-lg p-1",
                                                    class:
                                                      _vm.notification
                                                        .contactMessage.type,
                                                    staticStyle: {
                                                      "white-space": "pre-line"
                                                    }
                                                  },
                                                  [
                                                    _vm._v(
                                                      "\n                              " +
                                                        _vm._s(dat)
                                                    )
                                                  ]
                                                )
                                              }
                                            ),
                                            _vm._v(" "),
                                            _c(
                                              "a",
                                              {
                                                staticClass: "text-lg p-1",
                                                attrs: {
                                                  href:
                                                    _vm.notification
                                                      .contactMessage.next
                                                      .nextUrl,
                                                  target: "_blank"
                                                }
                                              },
                                              [
                                                _c("i", {
                                                  staticClass:
                                                    "fas fa-search-plus"
                                                }),
                                                _vm._v(
                                                  "\n                              " +
                                                    _vm._s(
                                                      _vm.mutualVar.notification
                                                        .contactMessage.next
                                                        .nextText
                                                    ) +
                                                    "\n                            "
                                                )
                                              ]
                                            )
                                          ],
                                          2
                                        )
                                  ]),
                                  _vm._v(" "),
                                  _c("div", { staticClass: "flex p-1" }, [
                                    _c(
                                      "a",
                                      {
                                        staticClass: "text-blue-500",
                                        attrs: {
                                          "aria-label": "reply",
                                          href:
                                            "https://api.whatsapp.com/send?phone=85252376008",
                                          target: "_blank"
                                        }
                                      },
                                      [
                                        _vm._v(
                                          "\n                              Whatsapp\n                            "
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _c(
                                      "a",
                                      {
                                        staticClass: "text-green-500",
                                        attrs: {
                                          "aria-label": "reply",
                                          href:
                                            "https://api.whatsapp.com/send?phone=85252376008",
                                          target: "_blank"
                                        }
                                      },
                                      [
                                        _c(
                                          "span",
                                          { staticClass: "icon is-large" },
                                          [
                                            _c(
                                              "span",
                                              { staticClass: "fa-stack fa-lg" },
                                              [
                                                _c("i", {
                                                  staticClass:
                                                    "fab fa-whatsapp-square"
                                                })
                                              ]
                                            )
                                          ]
                                        )
                                      ]
                                    )
                                  ])
                                ])
                              ])
                            : _vm._e()
                        ])
                      ])
                    ]
                  )
                ])
              ])
            ])
          ],
          1
        )
      : _vm._e()
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js":
/*!********************************************************************!*\
  !*** ./node_modules/vue-loader/lib/runtime/componentNormalizer.js ***!
  \********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ normalizeComponent)
/* harmony export */ });
/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file (except for modules).
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

function normalizeComponent (
  scriptExports,
  render,
  staticRenderFns,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier, /* server only */
  shadowMode /* vue-cli only */
) {
  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (render) {
    options.render = render
    options.staticRenderFns = staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = 'data-v-' + scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = shadowMode
      ? function () {
        injectStyles.call(
          this,
          (options.functional ? this.parent : this).$root.$options.shadowRoot
        )
      }
      : injectStyles
  }

  if (hook) {
    if (options.functional) {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functional component in vue file
      var originalRender = options.render
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return originalRender(h, context)
      }
    } else {
      // inject component registration as beforeCreate hook
      var existing = options.beforeCreate
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    }
  }

  return {
    exports: scriptExports,
    options: options
  }
}


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		if(__webpack_module_cache__[moduleId]) {
/******/ 			return __webpack_module_cache__[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			id: moduleId,
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
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
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
/******/ 	// startup
/******/ 	// Load entry module
/******/ 	__webpack_require__("./resources/js/userAccount.js");
/******/ 	// This entry module used 'exports' so it can't be inlined
/******/ })()
;