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
  return window.location.pathname.slice(0, 3);
}
function getCurrentURl() {
  return window.location.pathname.slice(3);
}

/***/ }),

/***/ "./resources/js/langs/diamondViewer.js":
/*!*********************************************!*\
  !*** ./resources/js/langs/diamondViewer.js ***!
  \*********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ([{
  'shape': ['shape', '型狀', '型状']
}, {
  'imageLink': ['imageLink', '圖像', '图像']
}, {
  'price': ['price', '價格', '价格']
}, {
  'weight': ['weight', '重量', '重量']
}, {
  'color': ['color', '顏色', '颜色']
}, {
  'clarity': ['clarity', '淨度', '净度']
}, {
  'cut': ['cut', '切工', '切工']
}, {
  'polish': ['polish', '打磨', '打磨']
}, {
  'symmetry': ['symmetry', '對稱', '对称']
}, {
  'fluorescence': ['fluorescence', '螢光', '荧光']
}, {
  'certificate': ['certificate', '證書編號', '证书编号']
}, {
  'lab': ['lab', '檢驗中心', '检验中心']
}, {
  'fluorescence': ['fluorescence', '螢光', '荧光']
}, {
  'starred': ['starred', '精選', '精选']
}, {
  'location': ['status', '狀態', '状态']
}, {
  'stock no': ['stock no', '貨號', '货号']
}, {
  'has_image': ['has_image', '圖像', '图像']
}, {
  'RD': ['RD', '圓形', '圆形']
}, {
  'Round': ['Round', 'Round', 'Round']
}, {
  'ROUND': ['Round', 'Round', 'Round']
}, {
  'PS': ['PS', '梨形', '梨形']
}, {
  'Pear': ['Pear', 'Pear', 'Pear']
}, {
  'PEAR': ['Pear', 'Pear', 'Pear']
}, {
  'EM': ['EM', '祖母綠形', '祖母绿形']
}, {
  'Emerald': ['Emerald', 'Emerald', 'Emerald']
}, {
  'EMERALD': ['Emerald', 'Emerald', 'Emerald']
}, {
  'PR': ['PR', '公主方形', '公主方形']
}, {
  'Princess': ['Princess', 'Princess', 'Princess']
}, {
  'PRINCESS': ['Princess', 'Princess', 'Princess']
}, {
  'MQ': ['MQ', '馬眼形', '马眼形']
}, {
  'Marquise': ['Marquise', 'Marquise', 'Marquise']
}, {
  'MARQUISE': ['Marquise', 'Marquise', 'Marquise']
}, {
  'CU': ['CU', '枕形', '枕形']
}, {
  'Cushion': ['Cushion', 'Cushion', 'Cushion']
}, {
  'CUSHION': ['Cushion', 'Cushion', 'Cushion']
}, {
  'AC': ['AC', '上丁方形', '上丁方形']
}, {
  'Asscher': ['Asscher', 'Asscher', 'Asscher']
}, {
  'ASSCHER': ['Asscher', 'Asscher', 'Asscher']
}, {
  'OV': ['OV', '橢圓形', '椭圆形']
}, {
  'Oval': ['Oval', 'Oval', 'Oval']
}, {
  'OVAL': ['Oval', 'Oval', 'Oval']
}, {
  'HT': ['HT', '心形', '心形']
}, {
  'Heart': ['Heart', 'Heart', 'Heart']
}, {
  'HEART': ['Heart', 'Heart', 'Heart']
}, {
  'RA': ['RA', '雷地恩形', '雷地恩形']
}, {
  'Radiant': ['Radiant', 'Radiant', 'Radiant']
}, {
  'RADIANT': ['Radiant', 'Radiant', 'Radiant']
}, {
  'carat': ['carat', '重量', '重量']
}, {
  'diamond': ['diamond', '鑽石', '钻石']
}, {
  'Diamond': ['Diamond', '鑽石', '钻石']
}, {
  'your name': ['your name', '提供名字', '提供名字']
}, {
  'your Phone No.': ['your Phone No.', '提供電話號碼', '提供电话号码']
}, {
  'Appointment': ['Appointment', '預約', '预约']
}, {
  'Details fo Appointment': ['Details fo Appointment', '預約細節', '预约细节']
}, {
  'Contact Us': ['Contact Us', '聯絡我們', '联络我们']
}, {
  'Very Good': ['VG', 'VG', 'VG']
}, {
  'Good': ['GD', 'GD', 'GD']
}, {
  'Excellent': ['EX', 'EX', 'EX']
}, {
  'VG': ['VG', 'VG', 'VG']
}, {
  'GD': ['GD', 'GD', 'GD']
}, {
  'EX': ['EX', 'EX', 'EX']
}, {
  'NoneCut': [' ', ' ', ' ']
}, {
  'NONE': ['NONE', '無', '无']
}, {
  'None': ['None', '無', '无']
}, {
  'NON': ['NON', '無', '无']
}, {
  'FAINT': ['FAINT', '微', '微']
}, {
  'Faint': ['Faint', '微', '微']
}, {
  'FNT': ['FNT', '微', '微']
}, {
  'Fnt': ['Fnt', '微', '微']
}, {
  'MEDIUM': ['MEDIUM', '中度', '中度']
}, {
  'Medium': ['Medium', '中度', '中度']
}, {
  'MED': ['MED', '中度', '中度']
}, {
  'Med': ['Med', '中度', '中度']
}, {
  'STRONG': ['STRONG', '強', '強']
}, {
  'Strong': ['Strong', '強', '強']
}, {
  'Very Strong': ['Very Strong', '非常強', '非常強']
}, {
  'VST': ['Very Strong', '非常強', '非常強']
}, {
  'STR': ['STR', '強', '強']
}, {
  'STG': ['STG', '強', '強']
}, {
  'Order': ['Order', '需預訂', '需预订']
}, {
  'Carat Diamond Ring': ['Carat Diamond Ring', '卡鑽石戒指', '卡钻石戒指']
}, {
  'fancy diamond': ['fancy diamond', '彩色鑽石', '彩色钻石']
}, {
  'Fancy Diamond': ['Fancy Diamond', '彩色鑽石', '彩色钻石']
}, {
  'Only On Stock': ['Only On Stock', '只選現貨', '只選現貨']
}, {
  'True': ['Yes', '是', '是']
}, {
  'False': ['No', '否', '否']
}, {
  'Yes': ['Yes', '是', '是']
}, {
  '1': ['Yes', '是', '是']
}, {
  'No': ['No', '否', '否']
}, {
  '0': ['No', '否', '否']
}]);

/***/ }),

/***/ "./resources/js/langs/engagementRings.js":
/*!***********************************************!*\
  !*** ./resources/js/langs/engagementRings.js ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ([{
  'Solitaire': ['Solitaire', '單石', '单石']
}, {
  'solitaire': ['Solitaire', '單石', '单石']
}, {
  'Side-stone': ['Side-stone', '輔石', '辅石']
}, {
  'side-stone': ['Side-stone', '輔石', '辅石']
}, {
  'sideStone': ['side-stone', '輔石', '辅石']
}, {
  'ct': ['ct', '重量', '重量']
}, {
  'Halo': ['Halo', '圍圈', '围圈']
}, {
  'halo': ['Halo', '圍圈', '围圈']
}, {
  '4-claw prong': ['4-prong', '四爪', '四爪']
}, {
  '6-claw prong': ['6-prong', '六爪', '六爪']
}, {
  '3-prong': ['3-prong', '三爪', '三爪']
}, {
  '4-prong': ['4-prong', '四爪', '四爪']
}, {
  '5-prong': ['5-prong', '五爪', '五爪']
}, {
  '6-prong': ['6-prong', '六爪', '六爪']
}, {
  '8-prong': ['8-prong', '八爪', '八爪']
}, {
  'Tapering': ['Tapering', '尖臂', '尖臂']
}, {
  'tapering': ['Tapering', '尖臂', '尖臂']
}, {
  'Parallel': ['Parallel', '平臂', '平臂']
}, {
  'parallel': ['Parallel', '平臂', '平臂']
}, {
  'Twisted': ['Twisted', '扭臂', '扭臂']
}, {
  'twisted': ['Twisted', '扭臂', '扭臂']
}, {
  'prong': ['prong', '爪數', '爪数']
}, {
  'unit_price': ['unit_price', '價格', '价格']
}, {
  'Shoulder': ['Shoulder', '臂', '臂']
}, {
  'shoulder': ['shoulder', '臂位', '臂位']
}, {
  'stock': ['stock', '輔鑽石', '辅钻石']
}, {
  'name': ['name', '名稱', '名称']
}, {
  'description': ['description', '名稱', '名称']
}, {
  'engagementRing': ['Engagement Ring', '求婚戒指', '求婚戒指']
}, {
  'Ring': ['Ring', '戒指', '戒指']
}, {
  'ring': ['ring', '戒指', '戒指']
}, {
  'Engagement Ring': ['Engagement Ring', '求婚戒指', '求婚戒指']
}, {
  'Engagement Ring Setting': ['Engagement Ring Setting', '求婚戒指托', '求婚戒指托']
}, {
  'your name': ['your name', '客人稱呼', '客人称呼']
}, {
  'your Phone No.': ['your Phone No.', '客人電話號碼', '客人电话号码']
}, {
  'Appointment': ['Appointment', '請預約', '请预约']
}, {
  'Details fo Appointment': ['Details fo Appointment', '預約詳情', '预约详情']
}, {
  'Contact Us': ['Contact Us', '聯絡我們', '联络我们']
}, {
  'Review': ['Review', '完成', '完成']
}, {
  'undefined': ['undefined', 'undefined', 'undefined']
}, {
  'True': ['Yes', '是', '是']
}, {
  'False': ['No', '否', '否']
}, {
  'Yes': ['Yes', '是', '是']
}, {
  '1': ['Yes', '是', '是']
}, {
  'No': ['No', '否', '否']
}, {
  '0': ['No', '否', '否']
}]);

/***/ }),

/***/ "./resources/js/langs/header.js":
/*!**************************************!*\
  !*** ./resources/js/langs/header.js ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ([{
  'Customer Jewelleries': ['Customer Jewelleries', '客人首飾', '客人首饰']
}]);

/***/ }),

/***/ "./resources/js/langs/jewelleries.js":
/*!*******************************************!*\
  !*** ./resources/js/langs/jewelleries.js ***!
  \*******************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ([{
  'Accessory': ['Accessory', '配飾', '配飾']
}, {
  'Bracelet': ['Bracelet', '手鍊', '手链']
}, {
  'Bracelet Setting': ['Bracelet Setting', '手鍊托', '手链托']
}, {
  'Necklace': ['Necklace', '項鍊', '项链']
}, {
  'Necklace Setting': ['Necklace Setting', '項鍊托', '项链托']
}, {
  'Earring': ['Earring', '耳環', '耳环']
}, {
  'Earring Setting': ['Earring Setting', '耳環托', '耳环托']
}, {
  'Pendant': ['Pendant', '吊咀', '吊坠']
}, {
  'Pendant Setting': ['Pendant Setting', '吊咀托', '吊坠托']
}, {
  'Ring': ['Ring', '戒指', '戒指']
}, {
  'Misc': ['Misc', 'Misc', 'Misc']
}, {
  '': ['', '', '']
}, {
  'unit_price': ['unit_price', '價格', '价格']
}, {
  'metal': ['metal', '金屬', '金属']
}, {
  'type': ['type', '款式', '款式']
}, {
  'gemstone': ['gemstone', '寶石', '寶石']
}, {
  'setting': ['setting', '托', '托']
}, {
  'sideStone': ['side stone', '輔石', '辅石']
}, {
  'stock': ['stock', '款號', '款号']
}, {
  'name': ['name', '名稱', '名称']
}, {
  'description': ['description', '詳情描述', '详情描述']
}, {
  'ct': ['ct', '重量', '重量']
}, {
  'Wedding Ring': ['Wedding Ring', '結婚對戒', '结婚对戒']
}, {
  'your name': ['your name', '客人稱呼', '客人称呼']
}, {
  'your Phone No.': ['your Phone No.', '客人電話號碼', '客人电话号码']
}, {
  'Appointment': ['Appointment', '請預約', '请预约']
}, {
  'Details fo Appointment': ['Details fo Appointment', '預約詳情', '预约详情']
}, {
  'Contact Us': ['Contact Us', '聯絡我們', '联络我们']
}, {
  'jewellery': ['jewellery', '首飾', '首饰']
}, {
  'Pearl': ['Pearl', '珍珠', '珍珠']
}, {
  'pearl': ['pearl', '珍珠', '珍珠']
}, {
  'True': ['Yes', '是', '是']
}, {
  'False': ['No', '否', '否']
}, {
  'Yes': ['Yes', '是', '是']
}, {
  '1': ['Yes', '是', '是']
}, {
  'No': ['No', '否', '否']
}, {
  '0': ['No', '否', '否']
}, {
  'doesntHave': ['No', '無', '無']
}]);

/***/ }),

/***/ "./resources/js/langs/langs.js":
/*!*************************************!*\
  !*** ./resources/js/langs/langs.js ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _header__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./header */ "./resources/js/langs/header.js");
/* harmony import */ var _jewelleries__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./jewelleries */ "./resources/js/langs/jewelleries.js");
/* harmony import */ var _diamondViewer__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./diamondViewer */ "./resources/js/langs/diamondViewer.js");
/* harmony import */ var _engagementRings__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./engagementRings */ "./resources/js/langs/engagementRings.js");
/* harmony import */ var _weddingRings__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./weddingRings */ "./resources/js/langs/weddingRings.js");
/* harmony import */ var _shoppingCart__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./shoppingCart */ "./resources/js/langs/shoppingCart.js");
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../helpers/api */ "./resources/js/helpers/api.js");







window.langs = _diamondViewer__WEBPACK_IMPORTED_MODULE_2__.default.concat(_header__WEBPACK_IMPORTED_MODULE_0__.default, _engagementRings__WEBPACK_IMPORTED_MODULE_3__.default, _weddingRings__WEBPACK_IMPORTED_MODULE_4__.default, _jewelleries__WEBPACK_IMPORTED_MODULE_1__.default, _shoppingCart__WEBPACK_IMPORTED_MODULE_5__.default); // function fetchTranslate(){
// 	get(`/api/langs`)
// 	.then((res)=>{
// 		console.log(res.data)
// 	})
// }
// fetchTranslate()

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

/***/ "./resources/js/langs/weddingRings.js":
/*!********************************************!*\
  !*** ./resources/js/langs/weddingRings.js ***!
  \********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ([{
  'Classic': ['Classic', '經典款式', '经典款式']
}, {
  'classic': ['Classic', '經典款式', '经典款式']
}, {
  'Japanese': ['Japanese', '日本款', '日本款']
}, {
  'japanese': ['Japanese', '日本款', '日本款']
}, {
  'Vintage': ['Vintage', '歐洲款', '欧洲款']
}, {
  'vintage': ['Vintage', '歐洲款', '欧洲款']
}, {
  'japan': ['japan', '日本', '日本']
}, {
  'straight': ['straight', '直身', '直身']
}, {
  'v-shape': ['v-shape', 'V形', 'V形']
}, {
  'wave': ['wave', '波浪', '波浪']
}, {
  'cross': ['cross', '交叉', '交叉']
}, {
  'high polish': ['high polish', '光身', '光身']
}, {
  'matte': ['matte', '噴沙', '噴沙']
}, {
  'brushed': ['brushed', '拉絲', '拉絲']
}, {
  'hammered': ['hammered', '錘面', '錘面']
}, {
  'milgrain': ['milgrain', '珠邊', '珠邊']
}, {
  'puzzle': ['puzzle', '拼合', '拼合']
}, {
  'forge': ['forge', '鍛造', '鍛造']
}, {
  'angerosa': ['angerosa', 'angerosa', 'angerosa']
}, {
  'feerie ported': ['feerie ported', 'feerie ported', 'feerie ported']
}, {
  'timeless ones': ['timeless ones', 'timeless ones', 'timeless ones']
}, {
  '18KW': ['18K White Gold', '18K白金', '18K白金']
}, {
  '18KY': ['18K Yellow Gold', '18K黃金', '18K黃金']
}, {
  '18KR': ['18K Rose Gold', '18K玫瑰', '18K玫瑰']
}, {
  '18KRG': ['18K Rose Gold', '18K玫瑰', '18K玫瑰']
}, {
  '18K White': ['18K White Gold', '18K白金', '18K白金']
}, {
  '18K Rose Gold': ['18K Rose Gold', '18K玫瑰金', '18K玫瑰金']
}, {
  'PT': ['PT', '鉑金', '鉑金']
}, {
  'PT950/900': ['PT', '鉑金', '鉑金']
}, {
  'Mixed': ['Mixed', '混金', '混金']
}, {
  'Men': ['Men', '男士款式', '男士款式']
}, {
  'Female': ['Female', '女士款式', '女士款式']
}, {
  'm': ['Men', '男士款式', '男士款式']
}, {
  'f': ['Female', '女士款式', '女士款式']
}, {
  'unit_price': ['unit_price', '價格', '价格']
}, {
  'metal': ['metal', '金屬', '金属']
}, {
  'sideStone': ['side stone', '輔石', '辅石']
}, {
  'stock': ['stock', '款號', '款号']
}, {
  'name': ['name', '名稱', '名称']
}, {
  'description': ['description', '詳情描述', '详情描述']
}, {
  'ct': ['ct', '重量', '重量']
}, {
  'Wedding Ring': ['Wedding Ring', '結婚對戒', '结婚对戒']
}, {
  'your name': ['your name', '客人稱呼', '客人称呼']
}, {
  'your Phone No.': ['your Phone No.', '客人電話號碼', '客人电话号码']
}, {
  'Appointment': ['Appointment', '請預約', '请预约']
}, {
  'Details fo Appointment': ['Details fo Appointment', '預約詳情', '预约详情']
}, {
  'Contact Us': ['Contact Us', '聯絡我們', '联络我们']
}, {
  'True': ['Yes', '是', '是']
}, {
  'False': ['No', '否', '否']
}, {
  'Yes': ['Yes', '是', '是']
}, {
  '1': ['Yes', '是', '是']
}, {
  'No': ['No', '否', '否']
}, {
  '0': ['No', '否', '否']
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
/******/ 	// startup
/******/ 	// Load entry module
/******/ 	__webpack_require__("./resources/js/langs/langs.js");
/******/ 	// This entry module used 'exports' so it can't be inlined
/******/ })()
;