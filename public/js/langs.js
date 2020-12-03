/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/langs/diamondViewer.js":
/*!*********************************************!*\
  !*** ./resources/js/langs/diamondViewer.js ***!
  \*********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ([{
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
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ([{
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

/***/ "./resources/js/langs/jewelleries.js":
/*!*******************************************!*\
  !*** ./resources/js/langs/jewelleries.js ***!
  \*******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ([{
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
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _jewelleries__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./jewelleries */ "./resources/js/langs/jewelleries.js");
/* harmony import */ var _diamondViewer__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./diamondViewer */ "./resources/js/langs/diamondViewer.js");
/* harmony import */ var _engagementRings__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./engagementRings */ "./resources/js/langs/engagementRings.js");
/* harmony import */ var _weddingRings__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./weddingRings */ "./resources/js/langs/weddingRings.js");
/* harmony import */ var _shoppingCart__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./shoppingCart */ "./resources/js/langs/shoppingCart.js");





window.langs = _diamondViewer__WEBPACK_IMPORTED_MODULE_1__["default"].concat(_engagementRings__WEBPACK_IMPORTED_MODULE_2__["default"], _weddingRings__WEBPACK_IMPORTED_MODULE_3__["default"], _jewelleries__WEBPACK_IMPORTED_MODULE_0__["default"], _shoppingCart__WEBPACK_IMPORTED_MODULE_4__["default"]);

/***/ }),

/***/ "./resources/js/langs/shoppingCart.js":
/*!********************************************!*\
  !*** ./resources/js/langs/shoppingCart.js ***!
  \********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ([{
  'Select this Item': ['Select this Item', '選擇商品', '选择商品']
}, {
  'message': ['message', '信息', '信息']
}, {
  'same diamond on the list': ['same diamond on the list', '相同商品已在購物車中', '相同商品已在购物车中']
}, {
  'find other diamond': ['find other diamond', '尋找其他鑽石', '寻找其他钻石']
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
  'All amounts of the company are subject to Hong Kong dollar settlement': ['All amounts of the company are subject to Hong Kong dollar settlement', '本公司一切金額以港幣結算為準 (我們8萬塊以上已經是現金價，在本公司鑲嵌戒指托，可以有1.7-2%左右優惠，如果需要付支付寶/微信, 或是刷卡, 需要付手續費的 )', '本公司一切金额以港币结算为准（我们8万块以上已经是现金价，在本公司镶嵌戒指托，可以有1.7-2%左右优惠，如果需要付支付宝/微信，要么刷卡，需要付手续费的）']
}, {
  'The customer is required to pay the full amount and withdraw the goods within two months after the order is placed, otherwise the company reserves the right to terminate the transaction.': ['The customer is required to pay the full amount and withdraw the goods within two months after the order is placed, otherwise the company reserves the right to terminate the transaction.', '客戶需在訂貨後一個月內付完全額並提取貨物，否則本公司保留終止交易的權利。', '客户需在订货一个月内付完全额并提取货物，否则本公司保留终止交易的权利。']
}, {
  'In order to protect the interests of both parties, unless the diamond does not match the GIA report, the order will not be returned after confirmation.': ['In order to protect the interests of both parties, unless the diamond does not match the GIA report, the order will not be returned after confirmation.', '為保障雙方利益, 除非鑽石跟GIA報告不相符，否則確認訂單後恕不退換。', '为保障双方利益, 除非钻石跟GIA报告不相符，否则确认订单后恕不退换。']
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
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ([{
  'Classic': ['Classic', '經典款式', '经典款式']
}, {
  'classic': ['Classic', '經典款式', '经典款式']
}, {
  'Japanese': ['Japanese', '日本款', '日本款']
}, {
  'Vintage': ['Vintage', '歐洲款', '欧洲款']
}, {
  '18KW': ['18K White Gold', '18K 白金', '18K 白金']
}, {
  '18KY': ['18K Yellow Gold', '18K 黃金', '18K 黃金']
}, {
  '18KR': ['18K Rose Gold', '18K 玫瑰', '18K 玫瑰']
}, {
  '18KRG': ['18K Rose Gold', '18K 玫瑰', '18K 玫瑰']
}, {
  '18K White': ['18K White Gold', '18K 白金', '18K 白金']
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

/***/ 3:
/*!*******************************************!*\
  !*** multi ./resources/js/langs/langs.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/chillkwong/Dropbox/code/TD7/resources/js/langs/langs.js */"./resources/js/langs/langs.js");


/***/ })

/******/ });