/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/carousel.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/carousel.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _components_productViewer360__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../components/productViewer360 */ "./resources/js/components/productViewer360.vue");
/* harmony import */ var _components_videoPlayer_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../components/videoPlayer.vue */ "./resources/js/components/videoPlayer.vue");
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
// import {videoPlayer} from '../../../node_modules/vue-video-player/dist/vue-video-player'

 // import VideoPlayer from './VueVideoPlayer.vue'

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  name: 'carousel',
  components: {
    videoPlayer: _components_videoPlayer_vue__WEBPACK_IMPORTED_MODULE_1__.default,
    ProductViewer: _components_productViewer360__WEBPACK_IMPORTED_MODULE_0__.default // VideoPlayer

  },
  props: {
    items: {
      Type: Array
    },
    width: '',
    height: '',
    active: '',
    upperitems: ''
  },
  created: function created() {
    this.currentIndex = 0;
  },
  mounted: function mounted() {
    if (mutualVar.css.innerWidth < 500) {
      this.fileName = 'thm-';
    }
  },
  data: function data() {
    return {
      currentIndex: 0,
      currentUpperIndex: 0,
      showUpper: true,
      rel: '?rel=0',
      images: mutualVar.storage[mutualVar.storage.live] + 'public/images/',
      carouselUpperItems: '',
      chunkedUpperItemsData: '',
      videoType: 'video/mp4',
      videoPath: mutualVar.storage[mutualVar.storage.live] + 'public/videos/',
      mutualVar: mutualVar,
      langs: langs,
      fileName: '',
      folder: mutualVar.storage[mutualVar.storage.live] + 'public/video360/'
    };
  },
  methods: {
    // onClick:function(event)
    // {
    //     if(event.target.className == 'disabled')
    //     {
    //         return;
    //     }
    //     event.target.className = 'disabled';
    // },
    nextItem: function nextItem() {
      var index = this.currentIndex;

      if (this.showUpper) {
        index = this.currentUpperIndex;
      }

      if (this.index == this.carouselUpperItemsToArray.length - 1) {
        this.index = 0;
      } else {
        this.index++;
      }
    },
    prevItem: function prevItem() {
      var index = this.currentIndex;

      if (this.showUpper) {
        index = this.currentUpperIndex;
      }

      if (this.index == 0) {
        this.index = this.carouselUpperItemsToArray.length - 1;
      } else {
        this.index--;
      }
    },
    currentSelectedItem: function currentSelectedItem(index, upper) {
      // console.log(index)
      // console.log(upper)
      // if (index < 0) {
      //     index = 0
      // }
      // if (index > this.items.length -1) {
      //     index = this.items.length
      // }
      if (index >= 0) {
        if (upper == 'upper') {
          this.currentUpperIndex = index;
          return this.showUpper = true;
        }

        this.showUpper = false;
        this.currentIndex = 0;
        this.currentIndex = index;
      }
    }
  },
  computed: {
    currentItem: function currentItem() {
      if (this.showUpper) {
        return this.carouselUpperItemsToArray[this.currentUpperIndex];
      }

      return this.carouselItemsToArray[this.currentIndex];
    },
    videoOptions: function videoOptions() {
      return {
        // videojs options
        muted: true,
        language: 'en',
        playbackRates: [0.7, 1.0, 1.5, 2.0],
        sources: [{
          type: "video/mp4",
          src: this.videoPath + this.currentItem.src
        }],
        poster: this.images + this.currentItem.thumb,
        fluid: true,
        buttered: [0.00, 3.46],
        preload: "auto",
        readyState: 1,
        autoplay: false
      };
    },
    carouselUpperItemsToArray: function carouselUpperItemsToArray() {
      var arr = [];

      if (this.upperitems.video360) {
        arr.push({
          src: this.upperitems.video360,
          type: "video360",
          thumb: this.folder + this.upperitems.video360 + '/thm-0.jpg',
          size: 120,
          rotate: 1
        });
      }

      if (!this.upperitems.video360 && this.upperitems.video) {
        arr.push({
          src: this.upperitems.video,
          type: "video",
          thumb: this.upperitems.images[0].image
        });
      }

      if (this.upperitems.images.length > 0) {
        for (var i = 0; this.upperitems.images.length - 1 >= i; i++) {
          arr.push({
            src: this.upperitems.images[i].image,
            type: "img",
            thumb: this.upperitems.images[i].image
          });
        }

        this.carouselUpperItems = arr;
        return arr;
      }
    },
    chunkedUpperItems: function chunkedUpperItems() {
      var chunk1 = [];
      var chunk2 = [];
      var chunk3 = [];
      var index = this.currentUpperIndex;

      if (!this.carouselUpperItemsToArray) {
        return chunk1;
      }

      if (index <= 1) {
        chunk1 = this.carouselUpperItemsToArray.slice(0, 3);
        chunk2 = this.carouselUpperItemsToArray.slice(3, this.carouselUpperItemsToArray.length).fill('');
        return chunk1.concat(chunk2);
      }

      chunk1 = this.carouselUpperItemsToArray.slice(0, index - 1).fill('');
      chunk2 = this.carouselUpperItemsToArray.slice(index - 1, index + 2);
      chunk3 = this.carouselUpperItemsToArray.slice(index + 2, this.carouselUpperItemsToArray.length).fill('');
      return chunk1.concat(chunk2, chunk3);
    },
    carouselItemsToArray: function carouselItemsToArray() {
      var arr = [];
      this.items.reverse();

      if (!this.items) {
        return arr.push({
          src: '',
          type: '',
          thumb: '',
          text: ''
        });
      }

      for (var i = this.items.length - 1; i >= 0; i--) {
        if (this.items[i].images[0].image && this.items[i].video) {
          arr.push({
            src: this.items[i].video,
            type: "video",
            thumb: this.items[i].images[0].image,
            text: this.items[i].texts.content
          });
        } else {
          arr.push({
            src: this.items[i].images[0].image,
            type: "img",
            thumb: this.items[i].images[0].image,
            text: this.items[i].texts.content
          });
        }
      }

      return arr;
    },
    chunkedItems: function chunkedItems() {
      var chunk1 = [];
      var chunk2 = [];
      var chunk3 = [];

      if (!this.items) {
        return chunk1;
      }

      if (this.currentIndex <= 1) {
        chunk1 = this.carouselItemsToArray.slice(0, 3);
        chunk2 = this.carouselItemsToArray.slice(3, this.carouselItemsToArray.length).fill('');
        return chunk1.concat(chunk2);
      }

      chunk1 = this.carouselItemsToArray.slice(0, this.currentIndex - 1).fill('');
      chunk2 = this.carouselItemsToArray.slice(this.currentIndex - 1, this.currentIndex + 2);
      chunk3 = this.carouselItemsToArray.slice(this.currentIndex + 2, this.carouselItemsToArray.length).fill('');
      return chunk1.concat(chunk2, chunk3);
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/imageCarousel.vue?vue&type=script&lang=js&":
/*!********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/imageCarousel.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _helpers_mutualVar__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../helpers/mutualVar */ "./resources/js/helpers/mutualVar.js");
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

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  name: 'imageCarousel',
  props: {
    items: {
      Type: Array
    },
    active: '',
    title: ''
  },
  created: function created() {
    this.currentIndex = 0;
  },
  data: function data() {
    return {
      mutualVar: _helpers_mutualVar__WEBPACK_IMPORTED_MODULE_0__.default,
      currentIndex: 0,
      showUpper: true,
      youtube: 'http://www.youtube.com/embed/',
      rel: '?rel=0',
      images: _helpers_mutualVar__WEBPACK_IMPORTED_MODULE_0__.default.storage[_helpers_mutualVar__WEBPACK_IMPORTED_MODULE_0__.default.storage.live] + 'public' + '/images/'
    };
  },
  methods: {
    // onClick:function(event)
    // {
    //     if(event.target.className == 'disabled')
    //     {
    //         return;
    //     }
    //     event.target.className = 'disabled';
    // },
    nextItem: function nextItem() {
      if (this.currentIndex == this.items.length - 1) {
        this.currentIndex = 0;
      } else {
        this.currentIndex++;
      }
    },
    prevItem: function prevItem() {
      if (this.currentIndex < 1) {
        this.currentIndex = this.items.length - 1;
      } else {
        this.currentIndex--;
      }
    },
    showAtIndex: function showAtIndex(index) {
      this.currentIndex = index;
    },
    currentSelectedItem: function currentSelectedItem(index) {
      this.currentIndex = index;
    }
  },
  computed: {
    currentItem: function currentItem() {
      return this.carouselItemsToArray[this.currentIndex];
    },
    carouselItemsToArray: function carouselItemsToArray() {
      this.currentIndex = 0;
      var arr = [];

      if (!this.items) {
        return arr.push({
          src: '',
          type: '',
          thumb: ''
        });
      }

      for (var i = this.items.length - 1; i >= 0; i--) {
        if (this.items[i].image) {
          arr.push({
            src: this.items[i].image,
            type: "img",
            thumb: this.items[i].image
          });
        }
      }

      return arr;
    },
    chunkedItemsDesktop: function chunkedItemsDesktop() {
      var chunk1 = [];
      var chunk2 = [];
      var chunk3 = [];

      if (!this.items) {
        return chunk1;
      }

      if (this.currentIndex <= 2) {
        chunk1 = this.carouselItemsToArray.slice(0, 4);
        chunk2 = this.carouselItemsToArray.slice(4, this.carouselItemsToArray.length).fill('');
        return chunk1.concat(chunk2);
      }

      chunk1 = this.carouselItemsToArray.slice(0, this.currentIndex - 2).fill('');
      chunk2 = this.carouselItemsToArray.slice(this.currentIndex - 2, this.currentIndex + 2);
      chunk3 = this.carouselItemsToArray.slice(this.currentIndex + 2, this.carouselItemsToArray.length).fill('');
      return chunk1.concat(chunk2, chunk3);
    },
    chunkedItemsMobile: function chunkedItemsMobile() {
      var chunk1 = [];
      var chunk2 = [];
      var chunk3 = [];

      if (!this.items) {
        return chunk1;
      }

      if (this.currentIndex <= 1) {
        chunk1 = this.carouselItemsToArray.slice(0, 3);
        chunk2 = this.carouselItemsToArray.slice(3, this.carouselItemsToArray.length).fill('');
        return chunk1.concat(chunk2);
      }

      chunk1 = this.carouselItemsToArray.slice(0, this.currentIndex - 1).fill('');
      chunk2 = this.carouselItemsToArray.slice(this.currentIndex - 1, this.currentIndex + 2);
      chunk3 = this.carouselItemsToArray.slice(this.currentIndex + 2, this.carouselItemsToArray.length).fill('');
      return chunk1.concat(chunk2, chunk3);
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/productViewer360.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/productViewer360.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
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
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  props: ['folder', 'filename', 'size', 'rotate'],
  data: function data() {
    return {
      dragging: false,
      // quadratic bezier control point
      c: {
        x: 160,
        y: 160
      },
      // record drag start point
      start: {
        x: 0,
        y: 0
      },
      width: 1080,
      height: 720,
      viewer: {
        width: 1080,
        heigh: 720,
        progress: 0,
        stage: ''
      },
      rotatingTime: 80,
      interval: ''
    };
  },
  methods: {
    startDrag: function startDrag(e) {
      e = e.changedTouches ? e.changedTouches[0] : e;
      this.dragging = true;
      this.start.x = e.pageX;
      this.start.y = e.pageY;
      document.body.style.cursor = 'ew-resize';
    },
    onDrag: function onDrag(e) {
      var moved = 0;
      e = e.changedTouches ? e.changedTouches[0] : e;

      if (this.dragging) {
        this.c.x = 160 + (e.pageX - this.start.x);
        this.c.y = 160 + (e.pagey - this.start.y);

        if (e.pageX > this.start.x) {
          moved = -1;
          this.start.x = e.pageX - 1;
        }

        if (e.pageX < this.start.x) {
          moved = 1;
          this.start.x = e.pageX + 1;
        } // this.setRotation(moved)


        this.rotateDirection(moved);
      }
    },
    setRotation: function setRotation(moved) {
      var _this = this;

      this.clearInterval();
      this.interval = setInterval(function () {
        if (!_this.dragging) {
          _this.nextImage(moved);
        }
      }, this.rotatingTime);
    },
    clearInterval: function (_clearInterval) {
      function clearInterval() {
        return _clearInterval.apply(this, arguments);
      }

      clearInterval.toString = function () {
        return _clearInterval.toString();
      };

      return clearInterval;
    }(function () {
      clearInterval(this.interval); // console.log('clear')
    }),
    nextImage: function nextImage(moved) {
      // console.log(moved)
      this.rotateDirection(moved);
    },
    rotateDirection: function rotateDirection(moved) {
      this.viewer.progress += moved; // console.log(this.viewer.progress)

      this.drawImg();

      if (this.viewer.progress <= 0 && moved == -1) {
        this.viewer.progress = this.size - 1;
      }

      if (this.viewer.progress >= this.size - 1 && moved == 1) {
        this.viewer.progress = 0;
      }
    },
    stopDrag: function stopDrag() {
      if (this.dragging) {
        this.dragging = false;
        document.body.style.cursor = 'auto';
      }
    },
    drawImg: function drawImg() {
      var myCanvas = document.getElementById('productViewer');
      var ctx = myCanvas.getContext('2d');
      var img = new Image();
      img.src = this.folder + this.filename + this.viewer.progress + '.jpg';

      img.onload = function () {
        ctx.drawImage(img, 0, 0, 1080, 720); // Or at whatever offset you like
      }; // console.log(this.viewer.progress)

    }
  },
  computed: {},
  components: {},
  destroyed: function destroyed() {
    this.clearInterval();
  },
  mounted: function mounted() {
    this.drawImg();
    this.setRotation(this.rotate);
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/shoppingCart/cart.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/shoppingCart/cart.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _helpers_cookie__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../helpers/cookie */ "./resources/js/helpers/cookie.js");
/* harmony import */ var _helpers_locale__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../helpers/locale */ "./resources/js/helpers/locale.js");
/* harmony import */ var _helpers_transJs__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../helpers/transJs */ "./resources/js/helpers/transJs.js");
/* harmony import */ var _langs_shoppingCart__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../langs/shoppingCart */ "./resources/js/langs/shoppingCart.js");
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




/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  components: {},
  props: {
    item: '',
    type: '',
    title: '',
    carouselItem: ''
  },
  data: function data() {
    return {
      mutualVar: mutualVar,
      langs: _langs_shoppingCart__WEBPACK_IMPORTED_MODULE_3__.default
    };
  },
  watch: {
    'mutualVar.cookiesInfo.fetchStatus': 'updateMutualVar',
    '$route': 'fetchData'
  },
  created: function created() {
    this.fetchCookies();
    this.maxItemIndex();
    this.addItemIndex();
  },
  computed: {
    singularType: function singularType() {
      return this.type.replace(/s/gi, '');
    },
    shoppingCart: function shoppingCart() {
      return mutualVar.cookiesInfo.shoppingCart;
    },
    totalAddedCartItems: function totalAddedCartItems() {
      var totalItems = 0;
      var shoppingCart = mutualVar.cookiesInfo.shoppingCart;

      for (var i = 0; shoppingCart.items.length > i; i++) {
        if (this.type == 'engagementRings' || this.type == 'diamonds') {
          if (shoppingCart.items[i].addedCart) {
            totalItems += 1;
          }
        }
      }

      return totalItems;
    },
    nextProcedure: function nextProcedure() {
      var procedures = {
        engagementRings: {
          modalOptions: [{
            text: 'Add A Diamond',
            url: window.location.pathname.slice(0, 3) + '/gia-loose-diamonds',
            clickable: true
          }],
          addToCart: {
            text: 'Add To Cart',
            url: '',
            clickable: false
          }
        },
        diamonds: {
          modalOptions: [{
            text: 'Add A Engagement Ring',
            url: window.location.pathname.slice(0, 3) + '/engagement-rings',
            clickable: true
          } // {text : 'Add A Jewellery Setting', url: window.location.pathname.slice(0,3) + '/jewellery', clickable: true},
          ],
          addToCart: {
            text: 'Add To Cart',
            url: '',
            clickable: true
          }
        }
      };
      var engagementClickable = '';
      var shoppingCart = mutualVar.cookiesInfo.shoppingCart;

      if (shoppingCart.items.length > 0) {
        if (this.type == 'engagementRings') {
          engagementClickable = shoppingCart.items[shoppingCart.selectingIndex].pairItems.filter(function (data) {
            return data.type == 'diamonds';
          });
          console.log(engagementClickable[0]);

          if (engagementClickable.length) {
            if (engagementClickable[0].id) {
              procedures[this.type].addToCart.clickable = true;
            }
          }
        }
      }

      return procedures[this.type];
    }
  },
  methods: {
    fetchCookies: function fetchCookies() {
      if (localStorage.getItem('shoppingCart')) {
        this.shoppingCart = JSON.parse(decodeURIComponent(localStorage.getItem('shoppingCart')));
      }
    },
    sendCookies: function sendCookies() {
      var cookies = this.shoppingCart;
      localStorage.setItem('shoppingCart', encodeURIComponent(JSON.stringify(cookies)), 10080);
    },
    maxItemIndex: function maxItemIndex() {
      if (this.shoppingCart.selectingIndex != 0 && this.shoppingCart.selectingIndex > this.shoppingCart.items.length - 1 && this.shoppingCart.items.length) {
        if (this.shoppingCart.items.length) {
          this.shoppingCart.selectingIndex = this.shoppingCart.items.length - 1;
        }
      }

      this.sendCookies();
    },
    addItemIndex: function addItemIndex() {
      if (this.shoppingCart.mode == 'create' && this.shoppingCart.items[this.shoppingCart.items.length - 1].addedCart == 1) {
        this.addItemSample();
        this.shoppingCart.selectingIndex += 1;
        this.sendCookies();
      }
    },
    updateMutualVar: function updateMutualVar() {
      this.sendCookies();
    },
    addItemSample: function addItemSample() {
      var itemsSample = {
        addedCart: 0,
        pairItems: []
      };
      this.shoppingCart.items.push(itemsSample);
    },
    checkSameDiamondInCart: function checkSameDiamondInCart() {
      var _this = this;

      var counteditem = this.shoppingCart.items;

      for (var i = 0; counteditem.length > i; i++) {
        var item = [];
        console.log('checkingSame');

        if (counteditem[i].pairItems.length > 0 && i != this.shoppingCart.selectingIndex) {
          item = counteditem[i].pairItems.filter(function (data) {
            if (data.type == 'diamonds' && data.id == _this.item.id) {
              return data;
            }
          });

          if (item.length > 0) {
            Livewire.emit('notifiication-flash', 'warning,Same diamond on the list,Find other diamond');
            return 1;
          }
        }
      }
    },
    selectItem: function selectItem() {
      // this.fetchCookies()
      if (this.checkSameDiamondInCart() == 1) {
        return;
      }

      var item = {
        id: '',
        image: '',
        unit_price: '',
        title: '',
        url: '',
        type: '',
        ringSize: 0,
        available: 1,
        engrave: '',
        delivery: 2,
        diamondSize: ''
      };
      var shoppingCart = this.shoppingCart;
      this.toggleModal();
      shoppingCart.selectingType = this.type;
      shoppingCart.haveShoppingCart = 1;

      if (shoppingCart.items.length == 0) {
        this.addItemSample();
      }

      item.id = this.item.id;
      item.title = this.title;

      if (this.type == 'engagementRings') {
        item.type = 'engagementRings';
        item.unit_price = this.item.unit_price;
        item.image = mutualVar.storage[mutualVar.storage.live] + 'public/images/' + this.item.images.find(function (data) {
          return data.type == 'cover';
        }).image;
        item.url = '/' + (0,_helpers_locale__WEBPACK_IMPORTED_MODULE_1__.getLocale)() + '/engagement-rings/';
      }

      if (this.type == 'diamonds') {
        item.type = 'diamonds';
        item.unit_price = this.item.price;
        item.diamondSize = parseFloat(this.item.weight);
        item.url = '/' + (0,_helpers_locale__WEBPACK_IMPORTED_MODULE_1__.getLocale)() + '/gia-loose-diamonds/';

        if (this.item.image_cache == 1) {
          item.image = mutualVar.storage[mutualVar.storage.live] + 'public/diamond/images/' + this.item.id + '.jpg';
        } else {
          item.image = '/images/front-end/diamond_show/RoundDiamonds_sample.png';
        }

        if (this.item.location != '1Hong Kong') {
          item.delivery = 7;
        }
      }

      if (shoppingCart.items[shoppingCart.selectingIndex].pairItems.length == 0) {
        shoppingCart.items[shoppingCart.selectingIndex].pairItems.push(item);
      } else {
        var sameItem = 0;

        for (var i = 0; shoppingCart.items[shoppingCart.selectingIndex].pairItems.length > i; i++) {
          if (shoppingCart.items[shoppingCart.selectingIndex].pairItems[i].type == this.type) {
            sameItem = 1;
            shoppingCart.items[shoppingCart.selectingIndex].pairItems[i] = item;
          }
        }

        if (sameItem == 0) {
          shoppingCart.items[shoppingCart.selectingIndex].pairItems.push(item);
        }
      }

      if (shoppingCart.items[shoppingCart.selectingIndex].addedCart == 1) {
        this.addItemSample();
      }

      this.sendCookies();

      if (shoppingCart.items[shoppingCart.selectingIndex].pairItems.length == 3) {
        this.directToReview();
      }

      if (shoppingCart.items[shoppingCart.selectingIndex].pairItems.length == 2) {
        var langCode = (0,_helpers_locale__WEBPACK_IMPORTED_MODULE_1__.getLocaleCode)();
        var mountingFee = {
          id: '',
          image: '/images/front-end/shoppingCart/mountingFee.png',
          unit_price: 500,
          title: this.langs.find(function (data) {
            return data['mounting fee'];
          })['mounting fee'][langCode],
          url: '/' + (0,_helpers_locale__WEBPACK_IMPORTED_MODULE_1__.getLocale)() + '/buying-procedure/diamond-inlay-engrave',
          type: 'mountingFee',
          available: 1
        }; // console.log(getLocaleCode())

        var fee = [{
          amount: 1000,
          size: 500,
          id: 211
        }, {
          amount: 700,
          size: 2.99,
          id: 177
        }, {
          amount: 500,
          size: 1.39,
          id: 5
        }];

        for (var i = 0; fee.length > i; i++) {
          if (fee[i].size > shoppingCart.items[shoppingCart.selectingIndex].pairItems.find(function (data) {
            return data.type == 'diamonds';
          }).diamondSize) {
            mountingFee.unit_price = fee[i].amount;
            mountingFee.id = fee[i].id;
          }
        }

        shoppingCart.items[shoppingCart.selectingIndex].pairItems.push(mountingFee);
        this.directToReview();
      }
    },
    directToReview: function directToReview() {
      this.toggleModal();
      this.sendCookies();
      window.open('/' + (0,_helpers_locale__WEBPACK_IMPORTED_MODULE_1__.getLocale)() + '/diamond-ring-review', '_self');
    },
    addItemToCart: function addItemToCart() {
      this.shoppingCart.items[this.shoppingCart.selectingIndex].addedCart = 1;
      this.shoppingCart.mode = 'create';
      this.addItemSample();
      this.sendCookies();
      this.toggleModal();
      window.open('/' + (0,_helpers_locale__WEBPACK_IMPORTED_MODULE_1__.getLocale)() + '/shopping-cart', '_self');
    },
    toggleModal: function toggleModal() {
      this.shoppingCart.modalActive = !this.shoppingCart.modalActive;
      this.sendCookies();
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/shoppingCart/item.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/shoppingCart/item.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _carousel_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../carousel.vue */ "./resources/js/components/carousel.vue");
/* harmony import */ var _helpers_locale__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../helpers/locale */ "./resources/js/helpers/locale.js");
/* harmony import */ var _helpers_cookie__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../helpers/cookie */ "./resources/js/helpers/cookie.js");
/* harmony import */ var _helpers_extraWorkingDates__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../helpers/extraWorkingDates */ "./resources/js/helpers/extraWorkingDates.js");
/* harmony import */ var _shoppingCart_stripeCheckoutForm_vue__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../shoppingCart/stripeCheckoutForm.vue */ "./resources/js/components/shoppingCart/stripeCheckoutForm.vue");
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





/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  data: function data() {
    return {
      mutualVar: mutualVar,
      locale: mutualVar.langs.locale,
      windowHref: window.location.href,
      langs: langs,
      selectingCarousel: 'engagementRings',
      maxDeliveryDate: false,
      extraWorkingDates: _helpers_extraWorkingDates__WEBPACK_IMPORTED_MODULE_3__.extraWorkingDates,
      showCheckout: 0,
      couponValid: null,
      discountRate: '',
      ringSizeOptions: [null, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22],
      paymentOptions: [{
        'name': 'VISA',
        'discount': 1
      }, {
        'name': 'ESP(-1%)',
        'discount': 0.99
      }, {
        'name': 'Alipay(-1%)',
        'discount': 0.99
      }, {
        'name': 'Wechat(-1%)',
        'discount': 0.99
      }, {
        'name': 'Cash(-2%)',
        'discount': 0.98
      }],
      apiToken: getMeta('api-token'),
      shortenName: mutualVar.cookiesInfo.shoppingCart.items,
      model: ''
    };
  },
  watch: {},
  created: function created() {
    this.fetchCookies();
    this.deleteNotAddedToCart();

    if (mutualVar.cookiesInfo.shoppingCart.items.length > 0) {
      this.updateCartItems();
    }

    if (mutualVar.cookiesInfo.shoppingCart.items.length == 0) {
      this.fetchCartItems();
    }

    this.checkAvailableOfDiamond();

    if (this.apiToken) {
      this.authGetCouponCode();
    }
  },
  mounted: function mounted() {
    if ((0,_helpers_cookie__WEBPACK_IMPORTED_MODULE_2__.getCookie)('coupon_code')) {
      this.checkCouponCodeValid();
    }

    this.updateDiscountedPrices();
  },
  computed: {
    carousel: function carousel() {
      return mutualVar.cookiesInfo.shoppingCartCarousel.items[mutualVar.cookiesInfo.shoppingCart.selectingIndex];
    },
    types: function types() {
      var procedures = {
        engagementRings: ['engagementRing', 'diamond', 'review'],
        diamonds: ['diamond', 'engagementRing', 'review']
      };
      return procedures[this.selectingType];
    },
    selectingType: function selectingType() {
      var type = '';
      var urls = [{
        url: 'gia-loose-diamonds',
        type: 'diamonds'
      }, {
        url: 'engagement-rings',
        type: 'engagementRings'
      }];

      for (var i = 0; urls.length > i; i++) {
        if (window.location.pathname.includes(urls[i].url)) {
          type = urls[i].type;
        }
      }

      return type;
    },
    calculatedDiscountRate: function calculatedDiscountRate() {
      for (var i = 0; this.paymentOptions.length > i; i++) {
        if (this.paymentOptions[i].name == mutualVar.cookiesInfo.checkout.balancePaymentMethod) {
          return this.paymentOptions[i].discount;
        }
      }
    },
    subTotal: function subTotal() {
      var subTotal = 0;

      for (var i = 0; this.shortenName.length > i; i++) {
        for (var j = 0; this.shortenName[i].pairItems.length > j; j++) {
          subTotal += parseInt(this.shortenName[i].pairItems[j].unit_price);

          if (this.maxDeliveryDate < this.shortenName[i].pairItems[j].delivery) {
            this.maxDeliveryDate = this.shortenName[i].pairItems[j].delivery;
          }
        }
      }

      mutualVar.cookiesInfo.checkout.deposit = parseInt(subTotal * 0.2);

      if (mutualVar.cookiesInfo.checkout.deposit > 10000) {
        mutualVar.cookiesInfo.checkout.deposit = 10000;
      }

      if (subTotal > 3000 && subTotal < 15000) {
        mutualVar.cookiesInfo.checkout.deposit = 3000;
      }

      if (subTotal <= 3000) {
        mutualVar.cookiesInfo.checkout.deposit = subTotal;
      }

      return mutualVar.cookiesInfo.checkout.subTotal = subTotal;
    },
    discountedSubTotal: function discountedSubTotal() {
      var subTotal = 0;
      var discountRate = this.calculatedDiscountRate;

      for (var i = 0; this.shortenName.length > i; i++) {
        for (var j = 0; this.shortenName[i].pairItems.length > j; j++) {
          if (this.shortenName[i].pairItems[j].discounted_unit_price > 80000) {
            discountRate = 1;
          }

          subTotal += parseInt(this.shortenName[i].pairItems[j].discounted_unit_price * discountRate);
          discountRate = this.calculatedDiscountRate;
        }
      }

      subTotal = Math.floor(subTotal);
      return mutualVar.cookiesInfo.checkout.discountedSubTotal = subTotal;
    },
    balance: function balance() {
      var balance = 0;

      if (this.couponValid || this.calculatedDiscountRate != 1) {
        mutualVar.cookiesInfo.checkout.discountedDeposit = mutualVar.cookiesInfo.checkout.deposit;
        balance = this.discountedSubTotal - mutualVar.cookiesInfo.checkout.discountedDeposit;
      } else {
        balance = this.subTotal - mutualVar.cookiesInfo.checkout.deposit;
      }

      return mutualVar.cookiesInfo.checkout.balance = balance;
    },
    checkoutClickable: function checkoutClickable() {
      var items = mutualVar.cookiesInfo.shoppingCart.items;
      var allItemsClickable = 1;

      for (var i = 0; items.length > i; i++) {
        for (var j = 0; items[i]['pairItems'].length > j; j++) {
          if (items[i]['pairItems'][j].available != 1) {
            allItemsClickable = 0;
          }
        }
      }

      return allItemsClickable;
    }
  },
  methods: {
    fetchCookies: function fetchCookies() {
      if (localStorage.getItem('shoppingCart')) {
        mutualVar.cookiesInfo.shoppingCart = JSON.parse(decodeURIComponent(localStorage.getItem('shoppingCart')));
      }

      if ((0,_helpers_cookie__WEBPACK_IMPORTED_MODULE_2__.getCookie)('coupon_code')) {
        mutualVar.cookiesInfo.coupon_code = (0,_helpers_cookie__WEBPACK_IMPORTED_MODULE_2__.getCookie)('coupon_code');
      }

      if ((0,_helpers_cookie__WEBPACK_IMPORTED_MODULE_2__.getCookie)('checkout')) {
        mutualVar.cookiesInfo.checkout = JSON.parse((0,_helpers_cookie__WEBPACK_IMPORTED_MODULE_2__.getCookie)('checkout'));
      }
    },
    sendCookies: function sendCookies() {
      var cookies = mutualVar.cookiesInfo.shoppingCart;
      this.shortenName = mutualVar.cookiesInfo.shoppingCart.items;
      localStorage.setItem('shoppingCart', encodeURIComponent(JSON.stringify(cookies)), 10080);
      (0,_helpers_cookie__WEBPACK_IMPORTED_MODULE_2__.setCookie)('coupon_code', mutualVar.cookiesInfo.coupon_code, 10080);
      (0,_helpers_cookie__WEBPACK_IMPORTED_MODULE_2__.setCookie)('checkout', JSON.stringify(mutualVar.cookiesInfo.checkout), 10080);
    },
    updateCartItems: function updateCartItems() {
      var _this = this;

      var data = {
        'api_token': this.apiToken,
        'data': mutualVar.cookiesInfo.shoppingCart.items,
        'order': 0
      };

      if (this.apiToken) {
        post('/api/update-cart-items', data).then(function (res) {
          _this.model = res.data.model;
        });
        this.sendCookies();
      }
    },
    fetchCartItems: function fetchCartItems() {
      var _this2 = this;

      var data = {
        'api_token': this.apiToken,
        'data': mutualVar.cookiesInfo.shoppingCart.items,
        'order': 0
      };

      if (this.apiToken) {
        post('/api/fetch-cart-items', data).then(function (res) {
          _this2.model = res.data.model;

          if (_this2.model.length > 0) {
            _this2.assignCartItems();
          }
        });
        this.sendCookies();
      }
    },
    assignCartItems: function assignCartItems() {
      function assignDetails(model, varItem) {
        var item = {
          id: '',
          image: '',
          unit_price: '',
          title: '',
          url: '',
          type: '',
          ringSize: 0,
          available: 1,
          engrave: ''
        };

        if (varItem.length == model.pair_item_id) {
          varItem.push({
            'pairItems': [],
            'addedCart': 1
          });
          console.log('hi');
        }

        item.id = model.cart_itemable_id;
        item.type = typeOptions[model.cart_itemable_type].type;
        item.engrave = model.engrave;
        item.image = model.image;
        item.ringSize = model.ring_size;
        item.title = model.title;
        item.unit_price = model.unit_price;
        item.url = typeOptions[model.cart_itemable_type].url;
        console.log(item);
        varItem[model.pair_item_id].pairItems.push(item);
      }

      var typeOptions = {
        'App/Diamond': {
          'type': 'diamonds',
          'url': '/' + this.locale + '/gia-loose-diamonds/'
        },
        'App/EngagementRing': {
          'type': 'engagementRings',
          'url': '/' + this.locale + '/engagement-rings/'
        },
        'App/Jewellery': {
          'type': 'mountingFee',
          'url': '/' + this.locale + '/buying-procedure/diamond-inlay-engrave'
        }
      };

      for (var i = 0; this.model.length > i; i++) {
        assignDetails(this.model[i], mutualVar.cookiesInfo.shoppingCart.items);
      }

      this.sendCookies();
    },
    discountedCouponPrice: function discountedCouponPrice(discountedPrice, item) {
      for (var i = 0; this.discountRate.length > i; i++) {
        if (item.type == 'engagementRings') {
          if (discountedPrice < this.discountRate[i].upperAmount) {
            return Math.round(discountedPrice * (1 - this.discountRate[i].rate));
          }
        }
      }

      return discountedPrice;
    },
    updateDiscountedPrices: function updateDiscountedPrices() {
      var items = mutualVar.cookiesInfo.shoppingCart.items;
      var cookiesItems = mutualVar.cookiesInfo.shoppingCart.items;

      for (var i = 0; items.length > i; i++) {
        for (var j = 0; items[i]['pairItems'].length > j; j++) {
          items[i]['pairItems'][j].discounted_unit_price = this.discountedCouponPrice(cookiesItems[i]['pairItems'][j].unit_price, items[i]['pairItems'][j]);
        }
      }
    },
    checkCouponCodeValid: function checkCouponCodeValid() {
      var _this3 = this;

      get('/api/coupon/valid?code=' + mutualVar.cookiesInfo.coupon_code).then(function (res) {
        _this3.couponValid = res.data.valid;
        _this3.discountRate = res.data.model;

        if (res.data.valid) {
          _this3.updateDiscountedPrices();
        }
      });
      this.sendCookies();
    },
    authGetCouponCode: function authGetCouponCode() {
      var _this4 = this;

      get('/api/fetch-customer-coupon-code').then(function (res) {
        if (res.data.valid) {
          _this4.couponValid = res.data.valid;
          _this4.discountRate = res.data.model;
          mutualVar.cookiesInfo.coupon_code = res.data.coupon_code.code;

          _this4.updateDiscountedPrices();
        }
      });
      this.sendCookies();
    },
    checkAvailableOfDiamond: function checkAvailableOfDiamond() {
      var items = mutualVar.cookiesInfo.shoppingCart.items;
      var countedItem = '';

      function axiosGet(item, i, j) {
        if (item.type == 'diamonds') {
          get('/api/diamonds/' + item.id).then(function (res) {
            item.available = res.data.diamond.available;
            item.unit_price = res.data.diamond.price;
          });
        }
      }

      for (var i = 0; items.length > i; i++) {
        for (var j = 0; items[i]['pairItems'].length > j; j++) {
          var vm = this;
          var item = mutualVar.cookiesInfo.shoppingCart.items[i]['pairItems'][j];
          axiosGet(item, i, j);
        } // console.log(countedItem)

      }

      this.sendCookies();
    },
    shiftIndex: function shiftIndex(index) {
      mutualVar.cookiesInfo.shoppingCart.selectingIndex = index;
      this.sendCookies();
    },
    addItemSample: function addItemSample() {
      var itemsSample = {
        addedCart: 0,
        pairItems: []
      };
      mutualVar.cookiesInfo.shoppingCart.items.push(itemsSample);
    },
    deleteNotAddedToCart: function deleteNotAddedToCart() {
      var items = mutualVar.cookiesInfo.shoppingCart.items;

      for (var i = 0; items.length > i; i++) {
        if (items[i].addedCart == 0 || items[i].pairItems.length == 0) {
          items.splice(i, 1);
        }
      }

      if (items.length > 0) {
        mutualVar.cookiesInfo.shoppingCart.selectingIndex = items.length;
      }

      this.sendCookies();
    },
    directTo: function directTo(item) {
      var urlId = 0;
      mutualVar.cookiesInfo.shoppingCart.mode = 'edit';
      this.sendCookies();

      if (Number.isInteger(item)) {
        urlId = mutualVar.cookiesInfo.shoppingCart.items[mutualVar.cookiesInfo.shoppingCart.selectingIndex].pairItems[item].url + mutualVar.cookiesInfo.shoppingCart.items[mutualVar.cookiesInfo.shoppingCart.selectingIndex].pairItems[item].id;
      } else {
        if (item == 'engagementRings') {
          urlId = '/engagement-rings';
        }

        if (item == 'diamonds') {
          urlId = '/gia-loose-diamonds';
        }

        if (item == '/shopping-cart/') {
          urlId = '/shopping-cart/';
        }

        urlId = '/' + this.locale + urlId;
      }

      window.open(urlId, '_self');
    },
    removeItem: function removeItem(index) {
      mutualVar.cookiesInfo.shoppingCart.items.splice(index, 1);
      this.sendCookies();
      this.updateCartItems();
    },
    addItemToCart: function addItemToCart() {
      var itemsSample = {
        addedCart: 0,
        pairItems: []
      };
      mutualVar.cookiesInfo.shoppingCart.items[mutualVar.cookiesInfo.shoppingCart.selectingIndex].addedCart = 1;
      mutualVar.cookiesInfo.shoppingCart.selectingIndex += 1;
      mutualVar.cookiesInfo.shoppingCart.items.push(itemsSample);
      this.sendCookies();
      this.directTo('/shopping-cart/');
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/shoppingCart/stripeCheckoutForm.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/shoppingCart/stripeCheckoutForm.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
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
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  props: ['clickable', 'deposit', 'paymentmodalactive', 'user', 'title', 'billformdata'],
  data: function data() {
    return {
      formData: {
        stripeEmail: '',
        stripeToken: ''
      },
      mutualVar: mutualVar,
      stripe: '',
      error: ''
    };
  },
  created: function created() {},
  methods: {
    buy: function buy() {
      this.StripeConFigure();
      this.stripe.open({
        name: 'Ting Diamond Limited',
        description: this.title,
        zipCode: true,
        amount: this.deposit * 100,
        currency: 'hkd'
      });
    },
    StripeConFigure: function StripeConFigure() {
      var _this = this;

      this.stripe = StripeCheckout.configure({
        key: StripeVariables.stripeKey,
        image: '/images/front-end/logo/logo_2019_grey.png',
        locale: 'auto',
        email: this.user.email,
        token: function token(_token) {
          _this.formData.stripeToken = _token.id;
          _this.formData.stripeEmail = _token.email;
          console.log(_this.billformdata);
          _this.billformdata.depositPaymentMethod = 'VISA';
          _this.billformdata.stripeToken = _token.id;
          mutualVar.status.isProcessing = true;
          post('/api/place-order', _this.billformdata).then(function (res) {
            if (res.data.saved) {
              _this.receivedPayment(res.data.message);

              mutualVar.status.isProcessing = false;
            }
          })["catch"](function (error) {
            _this.$emit('paymentModalActive', null);

            mutualVar.notification.state.error = error.response.data.message;
          });
        }
      });
    },
    receivedPayment: function receivedPayment(mes) {
      // var message = mutualVar.notification.contactMessage
      // message.title = 'message'
      // message.type = 'is-danger'
      // message.data.push(mes)
      // message.next = { nextUrl: mutualVar.langs.locale + '/account/pending', nextText: 'check your pending order'} 
      // message.active = true
      mutualVar.cookiesInfo.shoppingCart.items = [];
      mutualVar.cookiesInfo.shoppingCart.selectingIndex = 0;
      this.$parent.sendCookies();
      this.$parent.updateCartItems();
      window.open(mutualVar.langs.locale + '/thank-you', '_self');
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/videoPlayer.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/videoPlayer.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
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

/* eslint-disable */
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  name: "videPlayer",
  props: ['options', 'autoplay'],
  data: function data() {
    return {};
  },
  mounted: function mounted() {
    // console.log(this.hasLoaded())
    if (!this.hasLoaded()) {
      this.initVideo();
    }

    this.updateVideo();
  },
  watch: {
    'options': 'updateVideo'
  },
  methods: {
    initVideo: function initVideo() {
      //初始化视频方法
      var myPlayer = videojs('myVideo', {
        //确定播放器是否具有用户可以与之交互的控件。没有控件，启动视频播放的唯一方法是使用autoplay属性或通过Player API。
        controls: true,
        //自动播放属性,muted:静音播放
        autoplay: this.autoplay,
        //建议浏览器是否应在<video>加载元素后立即开始下载视频数据。
        preload: "auto",
        //设置视频播放器的显示宽度（以像素为单位）
        poster: this.options.poster
      });
    },
    updateVideo: function updateVideo() {
      videojs('myVideo').poster(this.options.poster);
      videojs('myVideo').src(this.options.sources[0].src);
      videojs('myVideo').autoplay(false);
    },
    hasLoaded: function hasLoaded() {
      // console.log(videojs.getPlayer('myVideo'))
      return videojs.getPlayer('myVideo') != undefined;
    }
  },
  beforeDestroy: function beforeDestroy() {
    if (this.hasLoaded()) {
      videojs.getPlayer('myVideo').dispose();
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/frontEnd/shoppingCart/index.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/frontEnd/shoppingCart/index.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _components_shoppingCart_item_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../components/shoppingCart/item.vue */ "./resources/js/components/shoppingCart/item.vue");
/* harmony import */ var _components_shoppingCart_stripeCheckoutForm_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../components/shoppingCart/stripeCheckoutForm.vue */ "./resources/js/components/shoppingCart/stripeCheckoutForm.vue");
//


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  el: '#shoppingCart',
  components: {
    stripeCheckoutForm: _components_shoppingCart_stripeCheckoutForm_vue__WEBPACK_IMPORTED_MODULE_1__.default,
    shoppingCartItem: _components_shoppingCart_item_vue__WEBPACK_IMPORTED_MODULE_0__.default
  },
  data: function data() {
    return {};
  }
});

/***/ }),

/***/ "./resources/js/frontend.js":
/*!**********************************!*\
  !*** ./resources/js/frontend.js ***!
  \**********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _views_frontEnd_diamondViewer_show__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./views/frontEnd/diamondViewer/show */ "./resources/js/views/frontEnd/diamondViewer/show.js");
/* harmony import */ var _views_frontEnd_engagementRing_show__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./views/frontEnd/engagementRing/show */ "./resources/js/views/frontEnd/engagementRing/show.js");
/* harmony import */ var _views_frontEnd_weddingRing_show__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./views/frontEnd/weddingRing/show */ "./resources/js/views/frontEnd/weddingRing/show.js");
/* harmony import */ var _views_frontEnd_jewellery_show__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./views/frontEnd/jewellery/show */ "./resources/js/views/frontEnd/jewellery/show.js");
/* harmony import */ var _views_frontEnd_customerJewellery_show__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./views/frontEnd/customerJewellery/show */ "./resources/js/views/frontEnd/customerJewellery/show.js");
/* harmony import */ var _views_frontEnd_customerMoment_index__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./views/frontEnd/customerMoment/index */ "./resources/js/views/frontEnd/customerMoment/index.js");
/* harmony import */ var _views_frontEnd_education_index__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./views/frontEnd/education/index */ "./resources/js/views/frontEnd/education/index.js");
/* harmony import */ var _views_frontEnd_shoppingCart_index_vue__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./views/frontEnd/shoppingCart/index.vue */ "./resources/js/views/frontEnd/shoppingCart/index.vue");
/* harmony import */ var _views_frontEnd_shoppingCart_diamondRingReview__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./views/frontEnd/shoppingCart/diamondRingReview */ "./resources/js/views/frontEnd/shoppingCart/diamondRingReview.js");
/* harmony import */ var _views_frontEnd_shoppingCart_shopBagBill__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./views/frontEnd/shoppingCart/shopBagBill */ "./resources/js/views/frontEnd/shoppingCart/shopBagBill.js");
/* harmony import */ var _views_frontEnd_aboutUs_index__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./views/frontEnd/aboutUs/index */ "./resources/js/views/frontEnd/aboutUs/index.js");
/* harmony import */ var _views_frontEnd_account_login__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ./views/frontEnd/account/login */ "./resources/js/views/frontEnd/account/login.js");
//diamond
// import DiamondViewerIndex from './views/frontEnd/diamondViewer/index'
 //Engagement Ring
// import EngagementRingIndex from './views/frontEnd/engagementRing/index'

 //wedding Ring
// import WeddingRingIndex from './views/frontEnd/weddingRing/index'

 //jewellry Ring
// import JewelleryIndex from './views/frontEnd/jewellery/index'

 //wedding Ring
// import CustomerJewelleryIndex from './views/frontEnd/customerJewellery/index'

 //wedding Ring

 //Education

 //shopping cart






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
//diamond
// if (pUrl == '/gia-loose-diamonds' || pUrl == '/gia-loose-diamonds/' || 
//     pUrl.includes('/gia-loose-diamonds/round-cut') || pUrl.includes('/gia-loose-diamonds/fancy-cut-diamond') || 
//     pUrl.includes('/gia-loose-diamonds/fancy-color')) 
//     {
//         const diamondViewerIndex =  new Vue(DiamondViewerIndex);
//     }

if (!pUrl.includes('/gia-loose-diamonds/round-cut') && !pUrl.includes('/gia-loose-diamonds/fancy-cut-diamond') && !pUrl.includes('/gia-loose-diamonds/fancy-color') && window.location.pathname.slice(4, 23) == 'gia-loose-diamonds/') {
  var diamondViewerShow = new Vue(_views_frontEnd_diamondViewer_show__WEBPACK_IMPORTED_MODULE_0__.default);
} //engagement rings
// if (pUrl == '/engagement-rings' || pUrl == '/engagement-rings/' || 
//     pUrl.includes('/engagement-rings/solitaire-ring-setting') || pUrl.includes('/engagement-rings/side-stones-setting') || 
//     pUrl.includes('/engagement-rings/halo-setting')) 
//     {
//         const engagementRingIndex =  new Vue(EngagementRingIndex);
//     }


if (!pUrl.includes('/engagement-rings/solitaire-ring-setting') && !pUrl.includes('/engagement-rings/side-stones-setting') && !pUrl.includes('/engagement-rings/halo-setting') && window.location.pathname.slice(4, 21) == 'engagement-rings/') {
  var engagementRingShow = new Vue(_views_frontEnd_engagementRing_show__WEBPACK_IMPORTED_MODULE_1__.default);
} //wedding rings
// if (pUrl == '/wedding-rings' || pUrl == '/wedding-rings/' || pUrl.includes('/wedding-rings/classic') || 
//     pUrl.includes('/wedding-rings/japanese') || pUrl.includes('/wedding-rings/vintage')) 
//     {
//         const weddingRingIndex =  new Vue(WeddingRingIndex);
//     }


if (!pUrl.includes('/wedding-rings/classic') && !pUrl.includes('/wedding-rings/japanese') && !pUrl.includes('/wedding-rings/vintage') && window.location.pathname.slice(4, 18) == 'wedding-rings/') {
  var weddingRingShow = new Vue(_views_frontEnd_weddingRing_show__WEBPACK_IMPORTED_MODULE_2__.default);
} //jewellery
// if (pUrl == '/jewellery' || pUrl == '/jewellery/' || pUrl.includes('/jewellery/necklaces') || 
//     pUrl.includes('/jewellery/earrings') || pUrl.includes('/jewellery/pendants') || 
//     pUrl.includes('/jewellery/rings') || pUrl.includes('/jewellery/diamond-rings') || 
//     pUrl.includes('/jewellery/fancy-diamond-rings') || pUrl.includes('/jewellery/bracelets')) 
//     {
//         const jewelleryIndex =  new Vue(JewelleryIndex);
//     }


if (!pUrl.includes('/jewellery/necklaces') && !pUrl.includes('/jewellery/earrings') && !pUrl.includes('/jewellery/rings') && !pUrl.includes('/jewellery/diamond-rings') && !pUrl.includes('/jewellery/fancy-diamond-rings') && !pUrl.includes('/jewellery/bracelets') && !pUrl.includes('/jewellery/pendants') && window.location.pathname.slice(4, 14) == 'jewellery/') {
  var jewelleryShow = new Vue(_views_frontEnd_jewellery_show__WEBPACK_IMPORTED_MODULE_3__.default);
} //Customer share
// if (pUrl =='/customer-jewellery' || pUrl.includes('/engagement-tips')) {
//     const customerJewelleryIndex =  new Vue(CustomerJewelleryIndex);
// }


if (window.location.pathname.slice(4, 23) == 'customer-jewellery/') {
  var customerJewelleryShow = new Vue(_views_frontEnd_customerJewellery_show__WEBPACK_IMPORTED_MODULE_4__.default);
}

if (pUrl.includes('/customer-moments') || pUrl.includes('/engagement-tips')) {
  var customerMomentIndex = new Vue(_views_frontEnd_customerMoment_index__WEBPACK_IMPORTED_MODULE_5__.default);
} //Education


if (pUrl.includes('/education-diamond-grading')) {
  var educationIndex = new Vue(_views_frontEnd_education_index__WEBPACK_IMPORTED_MODULE_6__.default);
} //buying procedure


if (pUrl.includes('about-us') || pUrl.includes('buying-procedure')) {
  var aboutUs = new Vue(_views_frontEnd_aboutUs_index__WEBPACK_IMPORTED_MODULE_10__.default);
} //shopping cart


if (pUrl.includes('diamond-ring-review')) {
  var diamondRingReview = new Vue(_views_frontEnd_shoppingCart_diamondRingReview__WEBPACK_IMPORTED_MODULE_8__.default);
}

if (pUrl.includes('shopping-cart')) {
  var shoppingCartIndex = new Vue(_views_frontEnd_shoppingCart_index_vue__WEBPACK_IMPORTED_MODULE_7__.default);
}

if (pUrl.includes('shop-bag-bill')) {
  var shopBagBill = new Vue(_views_frontEnd_shoppingCart_shopBagBill__WEBPACK_IMPORTED_MODULE_9__.default);
}

if (pUrl.includes('login')) {
  var login = new Vue(_views_frontEnd_account_login__WEBPACK_IMPORTED_MODULE_11__.default);
} // const diamondViewer = new Vue({
//     el: '#diamondViewer'
// });

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

/***/ "./resources/js/helpers/extraWorkingDates.js":
/*!***************************************************!*\
  !*** ./resources/js/helpers/extraWorkingDates.js ***!
  \***************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "extraWorkingDates": () => (/* binding */ extraWorkingDates)
/* harmony export */ });
function extraWorkingDates(extraDates) {
  var monthOrDate = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '';
  return function (extraDates) {
    var extraDates = extraDates || 0;
    var d = new Date();
    var data = {
      dates: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
      months: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
    };
    d.setDate(d.getDate() + extraDates);

    if (monthOrDate == 'months') {
      return data[monthOrDate][d.getMonth()];
    }

    if (monthOrDate == 'dates') {
      return data[monthOrDate][d.getDay()];
    }

    if (monthOrDate == '') {
      return d.getDate();
    }
  }(extraDates);
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

/***/ "./resources/js/langs/customerJewellry.js":
/*!************************************************!*\
  !*** ./resources/js/langs/customerJewellry.js ***!
  \************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ([{
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

/***/ }),

/***/ "./resources/js/views/frontEnd/aboutUs/index.js":
/*!******************************************************!*\
  !*** ./resources/js/views/frontEnd/aboutUs/index.js ***!
  \******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../helpers/api */ "./resources/js/helpers/api.js");

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  el: '#aboutUs',
  data: function data() {
    return {
      activedSubTab: 'Appointment First',
      mutualVar: mutualVar
    };
  },
  watch: {
    '$route': 'fetchData'
  },
  computed: {
    partialUrl: function partialUrl() {
      return window.location.pathname.slice(4);
    }
  },
  beforeMount: function beforeMount() {
    this.fetchData();
    console.log(window.location.pathname.slice(12));

    if (window.location.pathname.includes('buying-procedure')) {
      return this.activedSubTab = window.location.pathname.slice(21) ? window.location.pathname.slice(21) : 'Appointment First';
    }

    if (window.location.pathname.includes('about-us')) {
      return this.activedSubTab = window.location.pathname.slice(12) ? window.location.pathname.slice(12) : 'Contact Us';
    }

    this.activedSubTab = window.location.pathname.slice(20) ? window.location.pathname.slice(20) : 'Appointment First';
  },
  methods: {
    activeSubTab: function activeSubTab(tab) {
      this.activedSubTab = tab;
    },
    fetchData: function fetchData() {
      var _this = this;

      (0,_helpers_api__WEBPACK_IMPORTED_MODULE_0__.get)("/api/buyingProcedure").then(function (res) {
        _this.trans = res.data.trans;
      });
    }
  }
});

/***/ }),

/***/ "./resources/js/views/frontEnd/account/login.js":
/*!******************************************************!*\
  !*** ./resources/js/views/frontEnd/account/login.js ***!
  \******************************************************/
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
  el: '#login',
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
  beforeMount: function beforeMount() {},
  created: function created() {
    if (this.couponCode != '' && this.referral == 1) {
      this.mutualVar.notification.state.success = (0,_helpers_transJs__WEBPACK_IMPORTED_MODULE_2__.transJs)('Login to save coupon code', _langs_shoppingCart__WEBPACK_IMPORTED_MODULE_4__.default, mutualVar.langs.localeCode);
    }
  },
  computed: {
    couponCode: function couponCode() {
      return (0,_helpers_cookie__WEBPACK_IMPORTED_MODULE_1__.getCookie)('coupon_code');
    },
    referral: function referral() {
      return (0,_helpers_cookie__WEBPACK_IMPORTED_MODULE_1__.getCookie)('referral');
    }
  },
  methods: {}
});

/***/ }),

/***/ "./resources/js/views/frontEnd/customerJewellery/show.js":
/*!***************************************************************!*\
  !*** ./resources/js/views/frontEnd/customerJewellery/show.js ***!
  \***************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _helpers_transJs__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../helpers/transJs */ "./resources/js/helpers/transJs.js");
/* harmony import */ var _langs_diamondViewer__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../langs/diamondViewer */ "./resources/js/langs/diamondViewer.js");
/* harmony import */ var _langs_engagementRings__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../langs/engagementRings */ "./resources/js/langs/engagementRings.js");
/* harmony import */ var _langs_weddingRings__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../langs/weddingRings */ "./resources/js/langs/weddingRings.js");
/* harmony import */ var _components_videoPlayer_vue__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../../../components/videoPlayer.vue */ "./resources/js/components/videoPlayer.vue");
/* harmony import */ var _components_productViewer360_vue__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../../../components/productViewer360.vue */ "./resources/js/components/productViewer360.vue");
// import Auth from '../../store/auth'
// import { get, del } from '../../../helpers/api'
// import Flash from '../../helpers/flash'



 // import langs from '../../../langs/customerJewellry'
// import {videoPlayer} from '../../../../../node_modules/vue-video-player/dist/vue-video-player'



/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  el: '#customerJewelleryShow',
  components: {
    videoPlayer: _components_videoPlayer_vue__WEBPACK_IMPORTED_MODULE_4__.default,
    // videoPlayer,
    ProductViewer: _components_productViewer360_vue__WEBPACK_IMPORTED_MODULE_5__.default
  },
  data: function data() {
    return {
      // auth: Auth.state,
      mutualVar: mutualVar,
      isRemoving: false,
      post: {
        invoice: {},
        content: []
      },
      videoOpts: [{
        videoEng: ''
      }, {
        videoWed: ''
      }, {
        videoJew: ''
      }, {
        videoPost: ''
      }],
      videoPath: mutualVar.storage[mutualVar.storage.live] + 'public/videos/',
      imagePath: mutualVar.storage[mutualVar.storage.live] + 'public/images/',
      langs: _langs_diamondViewer__WEBPACK_IMPORTED_MODULE_1__.default.concat(_langs_engagementRings__WEBPACK_IMPORTED_MODULE_2__.default, _langs_weddingRings__WEBPACK_IMPORTED_MODULE_3__.default),
      invoice: '',
      published: {
        engagementRings: 0,
        weddingRings: 0,
        jewelleries: 0
      },
      langHref: '/' + window.location.pathname.slice(1, 3),
      video360: ''
    };
  },
  watch: {
    '$route': 'fetchData'
  },
  beforeMount: function beforeMount() {
    this.fetchData();
  },
  filters: {
    transJs: _helpers_transJs__WEBPACK_IMPORTED_MODULE_0__.transJs
  },
  methods: {
    transJsMet: function transJsMet(data, ori, langs) {
      return (0,_helpers_transJs__WEBPACK_IMPORTED_MODULE_0__.transJs)(data, ori, langs);
    },
    fetchData: function fetchData() {
      var _this = this;

      get("/api/invoicePosts/".concat(window.location.pathname.slice(23)), window.location.pathname.slice(1, 3)).then(function (res) {
        _this.post = res.data.model;
        _this.invoice = res.data.invoice;

        _this.ProceedVideoEng();

        _this.ProceedVideoWed();

        _this.ProceedVideoJew();

        _this.ProceedVideoPost();

        _this.setPublished();

        _this.setVideo360();
      });
    },
    setVideo360: function setVideo360() {
      this.video360 = {
        src: this.post.video360,
        type: "video360",
        thumb: mutualVar.storage[mutualVar.storage.live] + 'public/video360/' + this.post.video360 + '/thm-0.jpg',
        size: 120,
        rotate: 1,
        fileName: mutualVar.css.innerWidth < 500 ? 'thm-' : ''
      };
    },
    setPublished: function setPublished() {
      if (this.post.invoice.engagement_rings[0]) {
        if (this.post.invoice.engagement_rings[0].published) {
          this.published.engagementRings = this.post.invoice.engagement_rings[0].published;
        }
      }

      if (this.post.invoice.wedding_rings[0]) {
        if (this.post.invoice.wedding_rings[0].published) {
          this.published.weddingRings = this.post.invoice.wedding_rings[0].published;
        }
      }

      if (this.post.invoice.jewelleries[0]) {
        if (this.post.invoice.jewelleries[0].published) {
          this.published.jewelleries = this.post.invoice.jewelleries[0].published;
        }
      }
    },
    generateOptions: function generateOptions() {
      return {
        muted: true,
        language: 'en',
        playbackRates: [0.7, 1.0, 1.5, 2.0],
        sources: [{
          type: "video/mp4",
          src: "/videos/"
        }],
        poster: "/images/",
        fluid: true,
        autoplay: ''
      };
    },
    ProceedVideoEng: function ProceedVideoEng() {
      var opt = this.generateOptions();

      if (this.post.invoice.engagement_rings[0]) {
        if (this.post.invoice.engagement_rings[0].published) {
          this.videoOpts[0].videoEng = opt;
          this.videoOpts[0].videoEng.sources[0].src = this.videoPath + this.post.invoice.engagement_rings[0].video;
          this.videoOpts[0].videoEng.poster = this.imagePath + this.post.invoice.engagement_rings[0].images.filter(function (img) {
            return img.type == 'cover';
          })[0].image;
        }
      }
    },
    ProceedVideoWed: function ProceedVideoWed() {
      var opt = this.generateOptions();

      if (this.post.invoice.wedding_rings[0]) {
        if (this.post.invoice.wedding_rings[0].published) {
          this.videoOpts[1].videoWed = opt;
          this.videoOpts[1].videoWed.sources[0].src = this.videoPath + this.post.invoice.wedding_rings[0].video;
          this.videoOpts[1].videoWed.poster = this.imagePath + this.post.invoice.wedding_rings[0].images.filter(function (img) {
            return img.type == 'cover';
          })[0].image;
        }
      }
    },
    ProceedVideoPost: function ProceedVideoPost() {
      var opt = this.generateOptions();

      if (this.post.video) {
        this.videoOpts[3].videoPost = opt;
        this.videoOpts[3].videoPost.sources[0].src = this.videoPath + this.post.video;
        this.videoOpts[3].videoPost.poster = this.imagePath + this.post.images.filter(function (img) {
          return img.type == 'cover';
        })[0].image;
      }
    },
    ProceedVideoJew: function ProceedVideoJew() {
      var opt = this.generateOptions();

      if (this.post.invoice.jewelleries[0] && this.post.invoice.jewelleries[0].type != 'Misc') {
        if (this.post.invoice.jewelleries[0].published) {
          this.videoOpts[2].videoJew = opt;
          this.videoOpts[2].videoJew.sources[0].src = this.videoPath + this.post.invoice.jewelleries[0].video;
          this.videoOpts[2].videoJew.poster = this.imagePath + this.post.invoice.jewelleries[0].images.filter(function (img) {
            return img.type == 'cover';
          })[0].image;
        }
      }
    }
  }
});

/***/ }),

/***/ "./resources/js/views/frontEnd/customerMoment/index.js":
/*!*************************************************************!*\
  !*** ./resources/js/views/frontEnd/customerMoment/index.js ***!
  \*************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../helpers/transJs */ "./resources/js/helpers/transJs.js");
/* harmony import */ var _langs_customerJewellry__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../langs/customerJewellry */ "./resources/js/langs/customerJewellry.js");
/* harmony import */ var _components_imageCarousel_vue__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../components/imageCarousel.vue */ "./resources/js/components/imageCarousel.vue");




/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  el: '#customerJewelleryIndex',
  components: {
    ImageCarousel: _components_imageCarousel_vue__WEBPACK_IMPORTED_MODULE_3__.default
  },
  data: function data() {
    return {
      mutualVar: mutualVar,
      query: {
        per_page: 10
      },
      langs: _langs_customerJewellry__WEBPACK_IMPORTED_MODULE_2__.default,
      customers: [],
      chunkedItemsDesktop: {},
      chunkedItemsMobile: {},
      carouselActive: false,
      carouselItems: '',
      scrolled: false,
      originY: 900
    };
  },
  watch: {
    '$route': 'fetchData'
  },
  beforeMount: function beforeMount() {
    this.fetchData();
  },
  created: function created() {
    window.addEventListener('scroll', this.handleScroll);
  },
  destroyed: function destroyed() {
    window.removeEventListener('scroll', this.handleScroll);
  },
  computed: {
    locale: function locale() {
      if (window.location.pathname.slice(1, 3) == 'en') {
        return 0;
      }

      if (window.location.pathname.slice(1, 3) == 'hk') {
        return 1;
      }

      if (window.location.pathname.slice(1, 3) == 'cn') {
        return 2;
      }
    }
  },
  filters: {
    transJs: _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__.transJs
  },
  methods: {
    selectedCarouselItems: function selectedCarouselItems(images) {
      this.carouselItems = images;
      this.carouselActive = !this.carouselActive;
    },
    more: function more() {
      this.query.per_page += 10;
      this.fetchData();
    },
    handleScroll: function handleScroll() {
      if (window.pageYOffset > this.originY) {
        this.originY += 900;
        this.more();
      }
    },
    chunkItems: function chunkItems() {
      var chunk1 = [];
      var chunk2 = [];

      for (var i = 0; this.customers.data.length - 1 >= i;) {
        chunk1.push(this.customers.data.slice(i, i + 4));
        i += 4;
      }

      this.chunkedItemsDesktop = chunk1;

      for (var i = 0; this.customers.data.length - 1 >= i;) {
        chunk2.push(this.customers.data.slice(i, i + 2));
        i += 2;
      }

      this.chunkedItemsMobile = chunk2;
      return;
    },
    clickRow: function clickRow(row, index) {
      this.onClickedRow = row.id;
      window.open('customer-jewellries/' + row.id);
    },
    fetchData: function fetchData() {
      var _this = this;

      (0,_helpers_api__WEBPACK_IMPORTED_MODULE_0__.get)("/api/customerMoments?per_page=".concat(this.query.per_page), window.location.pathname.slice(1, 3)).then(function (res) {
        _this.customers = res.data.customers;

        _this.chunkItems();
      });
    }
  }
});

/***/ }),

/***/ "./resources/js/views/frontEnd/diamondViewer/show.js":
/*!***********************************************************!*\
  !*** ./resources/js/views/frontEnd/diamondViewer/show.js ***!
  \***********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _components_shoppingCart_cart_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../components/shoppingCart/cart.vue */ "./resources/js/components/shoppingCart/cart.vue");
/* harmony import */ var _helpers_transJs__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../helpers/transJs */ "./resources/js/helpers/transJs.js");
/* harmony import */ var _langs_diamondViewer__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../langs/diamondViewer */ "./resources/js/langs/diamondViewer.js");
// import Auth from '../../store/auth'
 // import xiaohungshu from '../../../components/xiaohungshu.vue'
// import Appointment from '../../../components/appointment.vue'

 // import Carousel from '../../../components/carousel.vue'
// import Flash from '../../helpers/flash'



/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  el: '#diamondViewerShow',
  components: {
    ShoppingCart: _components_shoppingCart_cart_vue__WEBPACK_IMPORTED_MODULE_1__.default
  },
  data: function data() {
    return {
      // auth: Auth.state,
      isRemoving: false,
      // appointmentState: false,
      title: '',
      langs: _langs_diamondViewer__WEBPACK_IMPORTED_MODULE_3__.default,
      text: {
        carat: 'carat',
        diamond: 'diamond'
      },
      mutualVar: mutualVar,
      diamond: {
        weight: ''
      },
      columns: ['price', 'shape', 'weight', 'color', 'clarity', 'cut', 'polish', 'symmetry', 'fluorescence', 'certificate', 'lab'],
      storeURL: '/api/diamonds/appointment',
      post: {
        invoice: {},
        content: []
      },
      loadingStatus: {
        image: 0,
        cert: 0
      },
      storageURL: mutualVar.storage[mutualVar.storage.live] + 'public/diamond/',
      isLoading: true,
      selectingShowType: null,
      invoice: '',
      shoppingCartType: 'diamonds'
    };
  },
  watch: {},
  beforeMount: function beforeMount() {
    this.fetchData();
  },
  filters: {
    transJs: _helpers_transJs__WEBPACK_IMPORTED_MODULE_2__.transJs
  },
  computed: {
    localeHref: function localeHref() {
      return window.location.pathname.slice(0, 4);
    }
  },
  methods: {
    fetchData: function fetchData() {
      var _this = this;

      (0,_helpers_api__WEBPACK_IMPORTED_MODULE_0__.get)("/api/diamonds/".concat(window.location.pathname.slice(23))).then(function (res) {
        _this.diamond = res.data.diamond;
      });
      (0,_helpers_api__WEBPACK_IMPORTED_MODULE_0__.get)("/api/diamondsLoadingImage/".concat(window.location.pathname.slice(23))).then(function (res) {
        _this.isLoading = false;
        _this.diamond = res.data.diamond;
        _this.loadingStatus.image = res.data.loading.image;

        if (res.data.diamond.image_cache) {
          _this.selectingShowType = 'image';
        }

        if (res.data.diamond.video_link) {
          _this.selectingShowType = 'video';
        }

        mutualVar.viewer.src = _this.diamond.video_link.includes('http') ? _this.diamond.video_link.replace('http', 'https') : _this.diamond.video_link;
      });
      (0,_helpers_api__WEBPACK_IMPORTED_MODULE_0__.get)("/api/diamondsLoadingCert/".concat(window.location.pathname.slice(23))).then(function (res) {
        _this.isLoading = false;
        _this.diamond = res.data.diamond;
        _this.loadingStatus.cert = res.data.loading.cert;
      });
    },
    scrollDown: function scrollDown() {
      this.loading = !this.loading;
    }
  }
});

/***/ }),

/***/ "./resources/js/views/frontEnd/education/index.js":
/*!********************************************************!*\
  !*** ./resources/js/views/frontEnd/education/index.js ***!
  \********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../helpers/transJs */ "./resources/js/helpers/transJs.js");
/* harmony import */ var _langs_customerJewellry__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../langs/customerJewellry */ "./resources/js/langs/customerJewellry.js");



/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  el: '#education',
  data: function data() {
    return {
      query: {
        per_page: 10
      },
      mutualVar: mutualVar,
      langs: _langs_customerJewellry__WEBPACK_IMPORTED_MODULE_2__.default,
      posts: [],
      chunkedItemsDesktop: {},
      chunkedItemsMobile: {},
      activedSubTab: 'carat'
    };
  },
  watch: {
    '$route': 'fetchData'
  },
  beforeMount: function beforeMount() {
    this.fetchData();

    if (window.location.pathname.includes('education-diamond-grading/gia-report/4cs')) {
      return this.activedSubTab = window.location.pathname.slice(45) ? window.location.pathname.slice(45) : 'carat';
    }

    if (window.location.pathname.includes('education-diamond-grading/gia-report/')) {
      return this.activedSubTab = window.location.pathname.slice(41) ? window.location.pathname.slice(41) : 'carat';
    }

    this.activedSubTab = window.location.pathname.slice(30) ? window.location.pathname.slice(30) : 'carat';
  },
  computed: {
    locale: function locale() {
      var location = {
        'en': 0,
        'hk': 1,
        'cn': 2
      };
      return location[window.location.pathname.slice(1, 3)];
    }
  },
  filters: {
    transJs: _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__.transJs
  },
  methods: {
    activeSubTab: function activeSubTab(tab) {
      this.activedSubTab = tab;
    },
    more: function more() {
      this.query.per_page += 10;
      this.fetchData();
    },
    chunkItems: function chunkItems() {
      var chunk1 = [];
      var chunk2 = [];

      for (var i = 0; this.posts.data.length - 1 >= i;) {
        chunk1.push(this.posts.data.slice(i, i + 4));
        i += 4;
      }

      this.chunkedItemsDesktop = chunk1;

      for (var i = 0; this.posts.data.length - 1 >= i;) {
        chunk2.push(this.posts.data.slice(i, i + 2));
        i += 2;
      }

      this.chunkedItemsMobile = chunk2;
      return;
    },
    clickRow: function clickRow(row, index) {
      this.onClickedRow = row.id;
      window.open('customer-jewellries/' + row.id, '_self');
    },
    fetchData: function fetchData() {
      var _this = this;

      (0,_helpers_api__WEBPACK_IMPORTED_MODULE_0__.get)("/api/invPosts?per_page=".concat(this.query.per_page), window.location.pathname.slice(1, 3)).then(function (res) {
        _this.posts = res.data.posts; // this.chunkItems()
      });
    }
  }
});

/***/ }),

/***/ "./resources/js/views/frontEnd/engagementRing/show.js":
/*!************************************************************!*\
  !*** ./resources/js/views/frontEnd/engagementRing/show.js ***!
  \************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _components_carousel_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../components/carousel.vue */ "./resources/js/components/carousel.vue");
/* harmony import */ var _components_shoppingCart_cart_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../components/shoppingCart/cart.vue */ "./resources/js/components/shoppingCart/cart.vue");
// import Auth from '../../store/auth'
// import { get, del } from '../../../helpers/api'
// import Appointment from '../../../components/appointment.vue'
 // import ProductViewer from '../../../components/productViewer360.vue'

 // import Flash from '../../helpers/flash'
// import { transJs } from '../../../helpers/transJs'
// import { getLocaleCode } from '../../../helpers/locale'
// import langs from '../../../langs/engagementRings'

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  el: '#engagementRingsShow',
  components: {
    Carousel: _components_carousel_vue__WEBPACK_IMPORTED_MODULE_0__.default,
    ShoppingCart: _components_shoppingCart_cart_vue__WEBPACK_IMPORTED_MODULE_1__.default
  },
  data: function data() {
    return {
      // auth: Auth.state,
      isRemoving: false,
      carouselState: false,
      // appointmentState: false,
      title: '',
      langs: langs,
      // filename:'381_x264 ',
      mutualVar: mutualVar,
      text: {
        engagementRing: 'engagementRing'
      },
      hrefLangs: mutualVar.langs.locale,
      engagementRing: '',
      // columns:[
      // 'unit_price',
      //             'shoulder',
      //             'prong',
      //             'ct',
      //             'stock',
      //             'name',
      //             'description',
      //             ]
      // ,
      // storeURL: '',
      customerItems: [],
      shoppingCartType: 'engagementRings',
      carouselItem: {
        active: '',
        upperitems: '',
        items: '',
        title: 'customer jewellries'
      }
    };
  },
  watch: {
    '$route': 'fetchData'
  },
  beforeMount: function beforeMount() {
    this.fetchData();
  },
  computed: {// appointmentTitle(){
    // 	return transJs(this.engagementRing.shoulder,this.langs,this.locale)  +' ' + transJs(this.engagementRing.prong,this.langs,this.locale)  +' '+ transJs(this.text.engagementRing,this.langs,this.locale)  +' ' + this.engagementRing.stock 
    // },
    // locale(){
    // 	return getLocaleCode()
    // },
  },
  methods: {
    fetchData: function fetchData() {
      var _this = this;

      get("/api/engagementRings/".concat(window.location.pathname.slice(21), "?locale=").concat(this.hrefLangs)).then(function (res) {
        _this.engagementRing = res.data.model;
        _this.customerItems = res.data.posts.invoicePosts ? res.data.posts.invoicePosts : []; // this.filterNotPostable(res.data.posts.invoicePosts)

        _this.assignCarouselItem();
      });
    },
    filterNotPostable: function filterNotPostable(data) {
      var type = 'App/EngagementRing';
      var id = this.engagementRing.id;
      var filteredData = [];

      for (var i = 0; data.length > i; i++) {
        if (data[i].postable_type == type && data[i].postable_id == id) {
          filteredData.push(data[i]);
        }
      }

      this.customerItems = filteredData;
    },
    assignCarouselItem: function assignCarouselItem() {
      this.carouselItem.active = this.carouselState;
      this.carouselItem.upperitems = this.engagementRing;
      this.carouselItem.items = this.customerItems.slice(0, 1);
    }
  }
});

/***/ }),

/***/ "./resources/js/views/frontEnd/jewellery/show.js":
/*!*******************************************************!*\
  !*** ./resources/js/views/frontEnd/jewellery/show.js ***!
  \*******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _components_carousel_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../components/carousel.vue */ "./resources/js/components/carousel.vue");
// import Auth from '../../store/auth'
// import { get, del } from '../../../helpers/api'
// import Appointment from '../../../components/appointment.vue'
 // // import Flash from '../../helpers/flash'
// import { transJs } from '../../../helpers/transJs'
// import langsJew from '../../../langs/jewelleries'
// import langsDia from '../../../langs/diamondViewer'
// import langsEnga from '../../../langs/engagementRings'
// import langsWedd from '../../../langs/weddingRings'

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  el: '#jewellery',
  components: {
    Carousel: _components_carousel_vue__WEBPACK_IMPORTED_MODULE_0__.default
  },
  data: function data() {
    return {
      // auth: Auth.state,
      isRemoving: false,
      carouselState: false,
      appointmentState: false,
      title: '',
      langs: langs,
      text: {
        jewellery: 'jewellery'
      },
      jewellery: '',
      columns: ['unit_price', 'type', 'gemstone', 'metal', 'ct', 'stock', 'setting'],
      storeURL: '',
      customerItems: ''
    };
  },
  watch: {
    '$route': 'fetchData'
  },
  beforeMount: function beforeMount() {
    this.fetchData();
  },
  methods: {
    fetchData: function fetchData() {
      var _this = this;

      get("/api/jewellery/".concat(window.location.pathname.slice(14), "?locale=").concat(mutualVar.langs.locale)).then(function (res) {
        _this.jewellery = res.data.model;
        _this.customerItems = res.data.posts.invoicePosts ? res.data.posts.invoicePosts : []; // this.filterNotPostable(res.data.posts.invoicePosts)
      });
    },
    filterNotPostable: function filterNotPostable(data) {
      var type = 'App/Jewellery';
      var id = this.jewellery.id;
      var filteredData = [];

      for (var i = 0; data.length > i; i++) {
        if (data[i].postable_type == type && data[i].postable_id == id) {
          filteredData.push(data[i]);
        }
      }

      this.customerItems = filteredData;
    }
  }
});

/***/ }),

/***/ "./resources/js/views/frontEnd/shoppingCart/diamondRingReview.js":
/*!***********************************************************************!*\
  !*** ./resources/js/views/frontEnd/shoppingCart/diamondRingReview.js ***!
  \***********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _components_carousel_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../components/carousel.vue */ "./resources/js/components/carousel.vue");
/* harmony import */ var _helpers_extraWorkingDates__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../helpers/extraWorkingDates */ "./resources/js/helpers/extraWorkingDates.js");


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  components: {
    Carousel: _components_carousel_vue__WEBPACK_IMPORTED_MODULE_0__.default
  },
  el: '#diamondRingReview',
  data: function data() {
    return {
      mutualVar: mutualVar,
      selectingCarousel: 'engagementRings',
      engagementRing: '',
      maxDeliveryDate: 2,
      customerItems: '',
      carouselItem: {
        upperitems: '',
        items: [],
        active: false
      },
      extraWorkingDates: _helpers_extraWorkingDates__WEBPACK_IMPORTED_MODULE_1__.extraWorkingDates
    };
  },
  watch: {},
  created: function created() {
    this.fetchCookies();
    this.cleanLastEmptyItemAndMaxItemIndex();
    this.getEngagementRing();
    this.setCarouselType();
  },
  computed: {
    shortenName: function shortenName() {
      return this.mutualVar.cookiesInfo.shoppingCart.items[this.mutualVar.cookiesInfo.shoppingCart.selectingIndex].pairItems;
    },
    shoppingCart: function shoppingCart() {
      return this.mutualVar.cookiesInfo.shoppingCart;
    },
    subTotal: function subTotal() {
      var subTotal = 0;

      for (var i = 0; this.shortenName.length > i; i++) {
        subTotal += parseInt(this.shortenName[i].unit_price);

        if (this.maxDeliveryDate < this.shortenName[i].delivery) {
          this.maxDeliveryDate = this.shortenName[i].delivery;
        }
      }

      return subTotal;
    }
  },
  methods: {
    fetchCookies: function fetchCookies() {
      if (localStorage.getItem('shoppingCart')) {
        this.shoppingCart = JSON.parse(decodeURIComponent(localStorage.getItem('shoppingCart')));
      }
    },
    sendCookies: function sendCookies() {
      var cookies = this.shoppingCart;
      localStorage.setItem('shoppingCart', encodeURIComponent(JSON.stringify(cookies)), this.mutualVar.cookiesInfo.cookieLast);
    },
    getEngagementRing: function getEngagementRing() {
      var _this = this;

      var engagementRingId = this.shoppingCart.items[this.shoppingCart.selectingIndex].pairItems.filter(function (data) {
        return data.type == 'engagementRings';
      })[0].id;
      get("/api/engagementRings/".concat(engagementRingId)).then(function (res) {
        _this.carouselItem.upperitems = res.data.model;

        _this.filterNotPostable(res.data.posts.invoicePosts, engagementRingId);
      });
    },
    cleanLastEmptyItemAndMaxItemIndex: function cleanLastEmptyItemAndMaxItemIndex() {
      if (this.shoppingCart.items[this.shoppingCart.items.length - 1].pairItems.length == 0) {
        this.shoppingCart.items.pop();
      }

      if (this.shoppingCart.selectingIndex > this.shoppingCart.items.length - 1) {
        this.shoppingCart.selectingIndex = this.shoppingCart.items.length - 1;
      }

      this.sendCookies();
    },
    setCarouselType: function setCarouselType() {
      if (!this.shoppingCart.items[this.shoppingCart.selectingIndex].pairItems.filter(function (data) {
        return data.type == 'engagementRings';
      }).length > 0) {
        this.selectingCarousel = this.shoppingCart.items[this.shoppingCart.selectingIndex].pairItems[0].type;
      }
    },
    directTo: function directTo(item) {
      var urlId = 0;

      if (Number.isInteger(item)) {
        urlId = this.shoppingCart.items[this.shoppingCart.selectingIndex].pairItems[item].url + this.shoppingCart.items[mutualVar.cookiesInfo.shoppingCart.selectingIndex].pairItems[item].id;
      } else {
        if (item == 'engagementRings') {
          urlId = '/engagement-rings';
        }

        if (item == 'diamonds') {
          urlId = '/gia-loose-diamonds';
        }

        if (item == '/shopping-cart/') {
          urlId = '/shopping-cart/';
        }

        urlId = '/' + mutualVar.langs.locale + urlId;
      }

      window.open(urlId, '_self');
    },
    removeItem: function removeItem(item) {
      var url = this.shoppingCart.items[this.shoppingCart.selectingIndex].pairItems[item].url;
      this.shoppingCart.items[this.shoppingCart.selectingIndex].pairItems.splice(item, 1);
      this.sendCookies();
      window.open(url, '_self');
    },
    addItemToCart: function addItemToCart() {
      var itemsSample = {
        addedCart: 0,
        pairItems: []
      };
      this.shoppingCart.items[this.shoppingCart.selectingIndex].addedCart = 1;
      this.shoppingCart.mode = 'create';
      this.shoppingCart.selectingIndex += 1;
      this.shoppingCart.items.push(itemsSample);
      this.sendCookies();
      this.directTo('/shopping-cart/');
    },
    filterNotPostable: function filterNotPostable(data, id) {
      var type = 'App/EngagementRing';
      var filteredData = [];

      for (var i = 0; data.length > i; i++) {
        if (data[i].postable_type == type && data[i].postable_id == id) {
          filteredData.push(data[i]);
        }
      }

      this.carouselItem.items = filteredData;
    }
  }
});

/***/ }),

/***/ "./resources/js/views/frontEnd/shoppingCart/shopBagBill.js":
/*!*****************************************************************!*\
  !*** ./resources/js/views/frontEnd/shoppingCart/shopBagBill.js ***!
  \*****************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _components_shoppingCart_item_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../components/shoppingCart/item.vue */ "./resources/js/components/shoppingCart/item.vue");
/* harmony import */ var _components_shoppingCart_stripeCheckoutForm_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../components/shoppingCart/stripeCheckoutForm.vue */ "./resources/js/components/shoppingCart/stripeCheckoutForm.vue");
/* harmony import */ var _helpers_cookie__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../helpers/cookie */ "./resources/js/helpers/cookie.js");


 // import QRCode from 'qrcode'

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  el: '#shopBagBill',
  components: {
    shoppingCartItem: _components_shoppingCart_item_vue__WEBPACK_IMPORTED_MODULE_0__.default,
    stripeCheckoutForm: _components_shoppingCart_stripeCheckoutForm_vue__WEBPACK_IMPORTED_MODULE_1__.default
  },
  data: function data() {
    return {
      mutualVar: mutualVar,
      locale: mutualVar.langs.locale,
      cookies: mutualVar.cookiesInfo,
      form: {
        user: {
          'name': '',
          'email': '',
          'address': '',
          'country': 'HK',
          'mobile': '',
          'wechat': ''
        },
        onProgress: {
          'login': false,
          'customerInfo': false,
          'payment': false
        },
        onTab: 'login'
      },
      formError: '',
      paymentOption: {
        modal: false
      },
      formItems: [{
        data: 'name',
        display: 'Name',
        errorName: 'data.name',
        type: 'text'
      }, {
        data: 'phone',
        display: 'Mobile',
        errorName: 'data.phone',
        type: 'number'
      }, {
        data: 'address',
        display: 'Address',
        errorName: 'data.address',
        type: 'text'
      }, {
        data: 'email',
        display: 'Email',
        errorName: 'data.email',
        type: 'text'
      }],
      langs: langs,
      apiToken: '',
      customerInfo: {
        'email': ''
      },
      showCheckout: 0,
      paymentResponse: {
        'orderID': '',
        'is_success': false,
        'response': 0
      },
      decodeResponse: '',
      checkoutStatus: 'selectingPayment',
      orderStatus: '',
      orderData: ''
    };
  },
  watch: {},
  created: function created() {
    this.fetchCookies();
    this.apiToken = getMeta('api-token');
  },
  mounted: function mounted() {
    this.checkOnProgress();
  },
  computed: {
    shortenName: function shortenName() {
      return this.cookies.shoppingCart.items[this.cookies.shoppingCart.selectingIndex].pairItems;
    },
    isProcessing: function isProcessing() {
      return mutualVar.status.isProcessing;
    },
    checkoutClickable: function checkoutClickable() {
      var items = this.cookies.shoppingCart.items;
      var allItemsClickable = true;

      for (var i = 0; items.length > i; i++) {
        for (var j = 0; items[i]['pairItems'].length > j; j++) {
          if (items[i]['pairItems'][j].available != 1) {
            allItemsClickable = false;
          }
        }
      }

      if (items.length < 1) {
        allItemsClickable = false;
      }

      if (this.isProcessing) {
        allItemsClickable = false;
      }

      return allItemsClickable;
    },
    title: function title() {
      var items = this.cookies.shoppingCart.items;
      var title = '';

      for (var i = 0; items.length > i; i++) {
        for (var j = 0; items[i]['pairItems'].length > j; j++) {
          title += items[i]['pairItems'][j].title + ' / ';
        }
      }

      return title;
    },
    formData: function formData() {
      return {
        'user': this.form.user,
        'data': this.cookies.shoppingCart,
        'api_token': this.apiToken,
        'coupon_code': this.cookies.coupon_code,
        'balancePaymentMethod': this.cookies.checkout.balancePaymentMethod,
        'depositPaymentMethod': this.cookies.checkout.depositPaymentMethod,
        'orderID': this.paymentResponse.orderID,
        'status': this.orderStatus,
        'stripeToken': ''
      };
    },
    toQRcode: function toQRcode() {
      var _this = this;

      var data = this.paymentResponse.response.response.qrcode_url;
      QRCode.toDataURL(data).then(function (url) {
        console.log(url);
        _this.paymentResponse.response.response.qrcode_url = url;
      })["catch"](function (err) {
        console.error(err);
      });
      return data;
    }
  },
  filters: {},
  methods: {
    fetchCookies: function fetchCookies() {
      if (localStorage.getItem('shoppingCart')) {
        this.cookies.shoppingCart = JSON.parse(decodeURIComponent(localStorage.getItem('shoppingCart')));
      }

      if (localStorage.getItem('form')) {
        this.form = JSON.parse(decodeURIComponent(localStorage.getItem('form')));
      }

      if ((0,_helpers_cookie__WEBPACK_IMPORTED_MODULE_2__.getCookie)('coupon_code')) {
        this.cookies.coupon_code = (0,_helpers_cookie__WEBPACK_IMPORTED_MODULE_2__.getCookie)('coupon_code');
      }

      if ((0,_helpers_cookie__WEBPACK_IMPORTED_MODULE_2__.getCookie)('checkout')) {
        this.cookies.checkout = JSON.parse((0,_helpers_cookie__WEBPACK_IMPORTED_MODULE_2__.getCookie)('checkout'));
      }
    },
    sendCookies: function sendCookies() {
      var cookies = this.cookies.shoppingCart;
      localStorage.setItem('shoppingCart', encodeURIComponent(JSON.stringify(cookies)), this.cookies.cookieLast);
      localStorage.setItem('form', encodeURIComponent(JSON.stringify(this.form)), this.cookies.cookieLast);
      (0,_helpers_cookie__WEBPACK_IMPORTED_MODULE_2__.setCookie)('coupon_code', this.cookies.coupon_code, this.cookies.cookieLast);
      (0,_helpers_cookie__WEBPACK_IMPORTED_MODULE_2__.setCookie)('checkout', JSON.stringify(this.cookies.checkout), this.cookies.cookieLast);
    },
    updateCustomerInfo: function updateCustomerInfo() {
      var _this2 = this;

      if (this.apiToken == '' || this.isProcessing) {
        return;
      }

      this.isProcessing = true;
      var data = {
        'data': this.form.user,
        'api_token': this.apiToken
      };
      post('/api/update-customer-info', data).then(function (res) {
        if (res.data.model == 'updated' || res.data.model == 'created') {
          _this2.form.onProgress.customerInfo = true;
          _this2.form.onTab = 'payment';

          _this2.sendCookies();
        }

        _this2.isProcessing = false;
      })["catch"](function (err) {
        _this2.formError = err.response.data.errors;
      });
    },
    updateCartItems: function updateCartItems() {
      var _this3 = this;

      var data = {
        'api_token': this.apiToken,
        'data': this.cookies.shoppingCart.items,
        'order': 0
      };

      if (this.apiToken) {
        post('/api/update-cart-items', data).then(function (res) {
          _this3.model = res.data.model;
        });
        this.sendCookies();
      }
    },
    placeOrder: function placeOrder(payment) {
      var _this4 = this;

      if (this.apiToken == '' || !this.checkoutClickable || this.isProcessing) {
        return;
      }

      this.isProcessing = true; // this.updateCartItems()

      this.cookies.checkout.depositPaymentMethod = payment; // console.log(this.formData)
      // return  this.receivedPayment('hi')

      post('/api/place-order', this.formData).then(function (res) {
        // console.log(res.data)
        if (res.data.saved) {
          _this4.receivedPayment(res.data.message);

          _this4.isProcessing = false;
        }

        if (_this4.formData.depositPaymentMethod == "Alipay(-1%)") {
          _this4.responseToJson(res);

          _this4.checkOrderPaymentStatus();

          _this4.isProcessing = false;
        }

        if (_this4.formData.depositPaymentMethod == "Wechat(-1%)") {
          _this4.responseToJson(res);

          _this4.checkOrderPaymentStatus();

          _this4.isProcessing = false;
        } // window.open( window.location.pathname ,'_self')

      })["catch"](function (err) {
        mutualVar.notification.state.error = err.response.data.errors;
      });
    },
    alipay: function alipay() {
      var _this5 = this;

      var data = {
        'user': this.form.user,
        'data': this.cookies.shoppingCart,
        'api_token': this.apiToken,
        'coupon_code': this.cookies.coupon_code,
        'balancePaymentMethod': this.cookies.checkout.balancePaymentMethod
      };
      post('/purchases/alipay', data).then(function (res) {
        _this5.responseToJson(res);
      })["catch"](function (error) {
        _this5.$emit('paymentModalActive', null);

        mutualVar.notification.state.error = error.response.data.message;
      });
    },
    receivedPayment: function receivedPayment(mes) {
      // var message = mutualVar.notification.contactMessage
      // message.title = 'message'
      // message.type = 'is-danger'
      // message.data.push(mes)
      // message.next = { nextUrl: mutualVar.langs.locale + '/account/pending', nextText: 'check your pending order'} 
      // message.active = true
      this.cookies.shoppingCart.items = [];
      this.cookies.shoppingCart.selectingIndex = 0;
      this.sendCookies();
      this.updateCartItems();
      window.open('/' + this.locale + '/thank-you', '_self');
    },
    checkOrderPaymentStatus: function checkOrderPaymentStatus() {
      var count = 60;
      var vm = this;

      function getPaymentS(vm, isProcessing) {
        setTimeout(function () {
          if (vm.orderStatus != 'received money') {
            get('/api/order/payment-status/' + vm.paymentResponse.orderID).then(function (res) {
              vm.orderStatus = res.data.model;

              if (res.data.model == 'received money') {
                vm.receivedPayment(res.data.model);
              }
            });
          }
        }, 2000 * i);
      }

      for (var i = 0; count > i; i++) {
        getPaymentS(vm, i);
      }
    },
    responseToJson: function responseToJson(res) {
      // console.log(res.data)
      var n = ''; // this.decodeResponse = res.data

      n = JSON.parse(res.data.response);
      this.paymentResponse.orderID = res.data.orderID;
      this.paymentResponse.is_success = res.data.is_success;
      this.paymentResponse.response = n;
    },
    responseToJsonOld: function responseToJsonOld(res, urlLenght) {
      // console.log(res)
      var n = '';
      var n1 = '';
      this.decodeResponse = res.data;
      n = this.decodeResponse.lastIndexOf('API--->https://testapi.hipopay.com/');
      n1 = this.decodeResponse.lastIndexOf('{"orderID":');
      n = this.decodeResponse.slice(n + urlLenght, n1);
      n1 = this.decodeResponse.slice(n1 + 11, -1);
      n = JSON.parse(n);
      this.paymentResponse = {
        "orderID": n1,
        "response": n
      };
    },
    checkOnProgress: function checkOnProgress() {
      if (this.api_token != '') {
        this.form.onProgress.login = true;
        this.fetchUserInfo();
      } else {
        this.form.onProgress.login = false;
        this.form.onTab = 'login';
      }

      if (this.form.user.id != '') {
        this.form.onProgress.customerInfo = true;
      }
    },
    fetchUserInfo: function fetchUserInfo() {
      var _this6 = this;

      get('/api/fetch-customer-info').then(function (res) {
        if (res.data.model != null) {
          _this6.form.user = res.data.model;
        }
      });
    },
    changeOnTab: function changeOnTab(tab) {
      var nextTab = false;

      if (tab == 'login') {
        nextTab = true;
      }

      if (tab == 'customerInfo' && this.apiToken != '') {
        nextTab = true;
      }

      if (tab == 'payment' && this.form.onProgress.customerInfo == true && this.apiToken != '' && this.form.user.id) {
        nextTab = true;
      }

      if (nextTab) {
        this.form.onTab = tab;
        this.sendCookies();
      }
    }
  }
});

/***/ }),

/***/ "./resources/js/views/frontEnd/weddingRing/show.js":
/*!*********************************************************!*\
  !*** ./resources/js/views/frontEnd/weddingRing/show.js ***!
  \*********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _components_carousel_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../components/carousel.vue */ "./resources/js/components/carousel.vue");
// import Auth from '../../store/auth'
// import Appointment from '../../../components/appointment.vue'
 // import Flash from '../../helpers/flash'
// import { transJs } from '../../../helpers/transJs'
// import langs from '../../../langs/weddingRings'

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  el: '#weddingRingsShow',
  components: {
    Carousel: _components_carousel_vue__WEBPACK_IMPORTED_MODULE_0__.default
  },
  data: function data() {
    return {
      // auth: Auth.state,
      // isRemoving: false,
      carouselState: false,
      appointmentState: false,
      title: '',
      // langs,
      weddingRing: '',
      hrefLangs: mutualVar.langs.locale,
      // columns:[
      // 'unit_price',
      //             'metal',
      //             'ct',
      //             'stock',
      //             'name',
      //             'description',
      //             ]
      // ,
      // text:{
      // 	weddingRing: 'Wedding Ring', 
      // },
      langHref: '/' + window.location.pathname.slice(1, 3),
      storeURL: '',
      customerItems: [],
      combinedUpperWeddingRings: '',
      combinedLowerWeddingRings: '',
      carouselItem: {
        active: '',
        upperitems: '',
        items: '',
        title: 'customer jewellries'
      }
    };
  },
  watch: {
    '$route': 'fetchData'
  },
  created: function created() {
    this.fetchData();
  },
  computed: {// appointmentTitle(){
    // 	return transJs(this.weddingRing.wedding_rings[0].style,this.langs,this.locale)  + ' ' + transJs(this.weddingRing.wedding_rings[0].metal,this.langs,this.locale)  + transJs(this.text.weddingRing,this.langs,this.locale) 
    // },
    // locale(){
    // 	if (window.location.pathname.slice(1,3) == 'en') {
    // 		return 0
    // 	}
    // 	if (window.location.pathname.slice(1,3) == 'hk') {
    // 		return 1
    // 	}
    // 	if (window.location.pathname.slice(1,3) == 'cn') {
    // 		return 2
    // 	}
    // }
  },
  // filters:{
  // 	transJs,
  // },
  methods: {
    fetchData: function fetchData() {
      var _this = this;

      get("/api/weddingRings/".concat(window.location.pathname.slice(18), "?locale=").concat(this.hrefLangs)).then(function (res) {
        _this.weddingRing = res.data.model;
        _this.customerItems = res.data.posts.invoicePosts ? res.data.posts.invoicePosts : [];

        _this.UpperWeddingRings(); // this.filterNotPostable(res.data.posts.invoicePosts)


        _this.assignCarouselItem(); // this.LowerWeddingRings()

      });
    },
    UpperWeddingRings: function UpperWeddingRings() {
      var obj = {
        images: [],
        video: null,
        video360: null
      };

      for (var i = 0; this.weddingRing.wedding_rings[0].images.length > i; i++) {
        obj.images.push(this.weddingRing.wedding_rings[0].images[i]);
        console.log(obj);

        if (this.weddingRing.wedding_rings[1].images[i]) {
          obj.images.push(this.weddingRing.wedding_rings[1].images[i]);
        }
      }

      if (this.weddingRing.wedding_rings[0].video) {
        obj.video = [];
        obj.video.push(this.weddingRing.wedding_rings[0].video);
      } // console.log(this.weddingRing.wedding_rings[0].video360 == null)


      if (this.weddingRing.wedding_rings[0].video360) {
        obj.video360 = [];
        obj.video360.push(this.weddingRing.wedding_rings[0].video360);
      }

      return this.combinedUpperWeddingRings = obj;
    },
    filterNotPostable: function filterNotPostable(data) {
      var type = 'App/WeddingRing';
      var id = this.weddingRing.id;
      var filteredData = []; // console.log(data)

      for (var i = 0; data.length > i; i++) {
        if (data[i].postable_type == type && data[i].postable_id == id) {
          console.log(data[i]);
          filteredData.push(data[i]);
        }
      }

      this.customerItems = filteredData;
    },
    assignCarouselItem: function assignCarouselItem() {
      this.carouselItem.active = this.carouselState;
      this.carouselItem.upperitems = this.weddingRing;
      this.carouselItem.items = this.customerItems.slice(0, 1);
    } // LowerWeddingRings(){ 
    // 	var obj = []
    // 	if (this.customerItems.wedding_rings[0].invoices.length > 0) {
    // 		for (var i =0 ;this.customerItems.wedding_rings[0].invoices.length > i; i++) {
    // 			if (this.customerItems.wedding_rings[0].invoices[i].invoice_posts.length >0) {
    // 				if(this.customerItems.wedding_rings[0].invoices[i].invoice_posts[0].postable_type == 'App/WeddingRing' && this.customerItems.wedding_rings[0].invoices[i].invoice_posts[0].published != 0 ){					
    // 				obj.push(this.customerItems.wedding_rings[0].invoices[i].invoice_posts[0])
    // 				console.log(obj)
    // 				}
    // 			}
    // 		}
    // 	}
    // 	return this.combinedLowerWeddingRings = obj
    // },						

  }
});

/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/productViewer360.vue?vue&type=style&index=0&lang=css&":
/*!*******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/productViewer360.vue?vue&type=style&index=0&lang=css& ***!
  \*******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
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
___CSS_LOADER_EXPORT___.push([module.id, "\n/*\tcanvas {\n\t  background-color:#fff;\n\t  margin:50px;\n\t},*/\n#productViewer {\n\t  height: auto;\n\t  width: 100%;\n}\n", ""]);
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

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/productViewer360.vue?vue&type=style&index=0&lang=css&":
/*!***********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/productViewer360.vue?vue&type=style&index=0&lang=css& ***!
  \***********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_productViewer360_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./productViewer360.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/productViewer360.vue?vue&type=style&index=0&lang=css&");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_productViewer360_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__.default, options);



/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_productViewer360_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__.default.locals || {});

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

/***/ "./resources/js/components/carousel.vue":
/*!**********************************************!*\
  !*** ./resources/js/components/carousel.vue ***!
  \**********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _carousel_vue_vue_type_template_id_76e872ab___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./carousel.vue?vue&type=template&id=76e872ab& */ "./resources/js/components/carousel.vue?vue&type=template&id=76e872ab&");
/* harmony import */ var _carousel_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./carousel.vue?vue&type=script&lang=js& */ "./resources/js/components/carousel.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _carousel_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _carousel_vue_vue_type_template_id_76e872ab___WEBPACK_IMPORTED_MODULE_0__.render,
  _carousel_vue_vue_type_template_id_76e872ab___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/carousel.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/imageCarousel.vue":
/*!***************************************************!*\
  !*** ./resources/js/components/imageCarousel.vue ***!
  \***************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _imageCarousel_vue_vue_type_template_id_c5e34bc0___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./imageCarousel.vue?vue&type=template&id=c5e34bc0& */ "./resources/js/components/imageCarousel.vue?vue&type=template&id=c5e34bc0&");
/* harmony import */ var _imageCarousel_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./imageCarousel.vue?vue&type=script&lang=js& */ "./resources/js/components/imageCarousel.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _imageCarousel_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _imageCarousel_vue_vue_type_template_id_c5e34bc0___WEBPACK_IMPORTED_MODULE_0__.render,
  _imageCarousel_vue_vue_type_template_id_c5e34bc0___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/imageCarousel.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/productViewer360.vue":
/*!******************************************************!*\
  !*** ./resources/js/components/productViewer360.vue ***!
  \******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _productViewer360_vue_vue_type_template_id_4df11af7___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./productViewer360.vue?vue&type=template&id=4df11af7& */ "./resources/js/components/productViewer360.vue?vue&type=template&id=4df11af7&");
/* harmony import */ var _productViewer360_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./productViewer360.vue?vue&type=script&lang=js& */ "./resources/js/components/productViewer360.vue?vue&type=script&lang=js&");
/* harmony import */ var _productViewer360_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./productViewer360.vue?vue&type=style&index=0&lang=css& */ "./resources/js/components/productViewer360.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! !../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");



;


/* normalize component */

var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__.default)(
  _productViewer360_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _productViewer360_vue_vue_type_template_id_4df11af7___WEBPACK_IMPORTED_MODULE_0__.render,
  _productViewer360_vue_vue_type_template_id_4df11af7___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/productViewer360.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/shoppingCart/cart.vue":
/*!*******************************************************!*\
  !*** ./resources/js/components/shoppingCart/cart.vue ***!
  \*******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _cart_vue_vue_type_template_id_402299ec___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./cart.vue?vue&type=template&id=402299ec& */ "./resources/js/components/shoppingCart/cart.vue?vue&type=template&id=402299ec&");
/* harmony import */ var _cart_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./cart.vue?vue&type=script&lang=js& */ "./resources/js/components/shoppingCart/cart.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _cart_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _cart_vue_vue_type_template_id_402299ec___WEBPACK_IMPORTED_MODULE_0__.render,
  _cart_vue_vue_type_template_id_402299ec___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/shoppingCart/cart.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/shoppingCart/item.vue":
/*!*******************************************************!*\
  !*** ./resources/js/components/shoppingCart/item.vue ***!
  \*******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _item_vue_vue_type_template_id_f4232f42___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./item.vue?vue&type=template&id=f4232f42& */ "./resources/js/components/shoppingCart/item.vue?vue&type=template&id=f4232f42&");
/* harmony import */ var _item_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./item.vue?vue&type=script&lang=js& */ "./resources/js/components/shoppingCart/item.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _item_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _item_vue_vue_type_template_id_f4232f42___WEBPACK_IMPORTED_MODULE_0__.render,
  _item_vue_vue_type_template_id_f4232f42___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/shoppingCart/item.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/shoppingCart/stripeCheckoutForm.vue":
/*!*********************************************************************!*\
  !*** ./resources/js/components/shoppingCart/stripeCheckoutForm.vue ***!
  \*********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _stripeCheckoutForm_vue_vue_type_template_id_3c63c463___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./stripeCheckoutForm.vue?vue&type=template&id=3c63c463& */ "./resources/js/components/shoppingCart/stripeCheckoutForm.vue?vue&type=template&id=3c63c463&");
/* harmony import */ var _stripeCheckoutForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./stripeCheckoutForm.vue?vue&type=script&lang=js& */ "./resources/js/components/shoppingCart/stripeCheckoutForm.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _stripeCheckoutForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _stripeCheckoutForm_vue_vue_type_template_id_3c63c463___WEBPACK_IMPORTED_MODULE_0__.render,
  _stripeCheckoutForm_vue_vue_type_template_id_3c63c463___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/shoppingCart/stripeCheckoutForm.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/videoPlayer.vue":
/*!*************************************************!*\
  !*** ./resources/js/components/videoPlayer.vue ***!
  \*************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _videoPlayer_vue_vue_type_template_id_27614f7e_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./videoPlayer.vue?vue&type=template&id=27614f7e&scoped=true& */ "./resources/js/components/videoPlayer.vue?vue&type=template&id=27614f7e&scoped=true&");
/* harmony import */ var _videoPlayer_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./videoPlayer.vue?vue&type=script&lang=js& */ "./resources/js/components/videoPlayer.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _videoPlayer_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _videoPlayer_vue_vue_type_template_id_27614f7e_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render,
  _videoPlayer_vue_vue_type_template_id_27614f7e_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  "27614f7e",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/videoPlayer.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/views/frontEnd/shoppingCart/index.vue":
/*!************************************************************!*\
  !*** ./resources/js/views/frontEnd/shoppingCart/index.vue ***!
  \************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.vue?vue&type=script&lang=js& */ "./resources/js/views/frontEnd/shoppingCart/index.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");
var render, staticRenderFns
;



/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_1__.default)(
  _index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default,
  render,
  staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/frontEnd/shoppingCart/index.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/carousel.vue?vue&type=script&lang=js&":
/*!***********************************************************************!*\
  !*** ./resources/js/components/carousel.vue?vue&type=script&lang=js& ***!
  \***********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_carousel_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./carousel.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/carousel.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_carousel_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/components/imageCarousel.vue?vue&type=script&lang=js&":
/*!****************************************************************************!*\
  !*** ./resources/js/components/imageCarousel.vue?vue&type=script&lang=js& ***!
  \****************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_imageCarousel_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./imageCarousel.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/imageCarousel.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_imageCarousel_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/components/productViewer360.vue?vue&type=script&lang=js&":
/*!*******************************************************************************!*\
  !*** ./resources/js/components/productViewer360.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_productViewer360_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./productViewer360.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/productViewer360.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_productViewer360_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/components/shoppingCart/cart.vue?vue&type=script&lang=js&":
/*!********************************************************************************!*\
  !*** ./resources/js/components/shoppingCart/cart.vue?vue&type=script&lang=js& ***!
  \********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_cart_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./cart.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/shoppingCart/cart.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_cart_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/components/shoppingCart/item.vue?vue&type=script&lang=js&":
/*!********************************************************************************!*\
  !*** ./resources/js/components/shoppingCart/item.vue?vue&type=script&lang=js& ***!
  \********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_item_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./item.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/shoppingCart/item.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_item_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/components/shoppingCart/stripeCheckoutForm.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************!*\
  !*** ./resources/js/components/shoppingCart/stripeCheckoutForm.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_stripeCheckoutForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./stripeCheckoutForm.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/shoppingCart/stripeCheckoutForm.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_stripeCheckoutForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/components/videoPlayer.vue?vue&type=script&lang=js&":
/*!**************************************************************************!*\
  !*** ./resources/js/components/videoPlayer.vue?vue&type=script&lang=js& ***!
  \**************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_videoPlayer_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./videoPlayer.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/videoPlayer.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_videoPlayer_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/views/frontEnd/shoppingCart/index.vue?vue&type=script&lang=js&":
/*!*************************************************************************************!*\
  !*** ./resources/js/views/frontEnd/shoppingCart/index.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./index.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/frontEnd/shoppingCart/index.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/components/productViewer360.vue?vue&type=style&index=0&lang=css&":
/*!***************************************************************************************!*\
  !*** ./resources/js/components/productViewer360.vue?vue&type=style&index=0&lang=css& ***!
  \***************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_productViewer360_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/style-loader/dist/cjs.js!../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./productViewer360.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/productViewer360.vue?vue&type=style&index=0&lang=css&");


/***/ }),

/***/ "./resources/js/components/carousel.vue?vue&type=template&id=76e872ab&":
/*!*****************************************************************************!*\
  !*** ./resources/js/components/carousel.vue?vue&type=template&id=76e872ab& ***!
  \*****************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_carousel_vue_vue_type_template_id_76e872ab___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_carousel_vue_vue_type_template_id_76e872ab___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_carousel_vue_vue_type_template_id_76e872ab___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./carousel.vue?vue&type=template&id=76e872ab& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/carousel.vue?vue&type=template&id=76e872ab&");


/***/ }),

/***/ "./resources/js/components/imageCarousel.vue?vue&type=template&id=c5e34bc0&":
/*!**********************************************************************************!*\
  !*** ./resources/js/components/imageCarousel.vue?vue&type=template&id=c5e34bc0& ***!
  \**********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_imageCarousel_vue_vue_type_template_id_c5e34bc0___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_imageCarousel_vue_vue_type_template_id_c5e34bc0___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_imageCarousel_vue_vue_type_template_id_c5e34bc0___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./imageCarousel.vue?vue&type=template&id=c5e34bc0& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/imageCarousel.vue?vue&type=template&id=c5e34bc0&");


/***/ }),

/***/ "./resources/js/components/productViewer360.vue?vue&type=template&id=4df11af7&":
/*!*************************************************************************************!*\
  !*** ./resources/js/components/productViewer360.vue?vue&type=template&id=4df11af7& ***!
  \*************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_productViewer360_vue_vue_type_template_id_4df11af7___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_productViewer360_vue_vue_type_template_id_4df11af7___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_productViewer360_vue_vue_type_template_id_4df11af7___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./productViewer360.vue?vue&type=template&id=4df11af7& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/productViewer360.vue?vue&type=template&id=4df11af7&");


/***/ }),

/***/ "./resources/js/components/shoppingCart/cart.vue?vue&type=template&id=402299ec&":
/*!**************************************************************************************!*\
  !*** ./resources/js/components/shoppingCart/cart.vue?vue&type=template&id=402299ec& ***!
  \**************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_cart_vue_vue_type_template_id_402299ec___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_cart_vue_vue_type_template_id_402299ec___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_cart_vue_vue_type_template_id_402299ec___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./cart.vue?vue&type=template&id=402299ec& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/shoppingCart/cart.vue?vue&type=template&id=402299ec&");


/***/ }),

/***/ "./resources/js/components/shoppingCart/item.vue?vue&type=template&id=f4232f42&":
/*!**************************************************************************************!*\
  !*** ./resources/js/components/shoppingCart/item.vue?vue&type=template&id=f4232f42& ***!
  \**************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_item_vue_vue_type_template_id_f4232f42___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_item_vue_vue_type_template_id_f4232f42___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_item_vue_vue_type_template_id_f4232f42___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./item.vue?vue&type=template&id=f4232f42& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/shoppingCart/item.vue?vue&type=template&id=f4232f42&");


/***/ }),

/***/ "./resources/js/components/shoppingCart/stripeCheckoutForm.vue?vue&type=template&id=3c63c463&":
/*!****************************************************************************************************!*\
  !*** ./resources/js/components/shoppingCart/stripeCheckoutForm.vue?vue&type=template&id=3c63c463& ***!
  \****************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_stripeCheckoutForm_vue_vue_type_template_id_3c63c463___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_stripeCheckoutForm_vue_vue_type_template_id_3c63c463___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_stripeCheckoutForm_vue_vue_type_template_id_3c63c463___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./stripeCheckoutForm.vue?vue&type=template&id=3c63c463& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/shoppingCart/stripeCheckoutForm.vue?vue&type=template&id=3c63c463&");


/***/ }),

/***/ "./resources/js/components/videoPlayer.vue?vue&type=template&id=27614f7e&scoped=true&":
/*!********************************************************************************************!*\
  !*** ./resources/js/components/videoPlayer.vue?vue&type=template&id=27614f7e&scoped=true& ***!
  \********************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_videoPlayer_vue_vue_type_template_id_27614f7e_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_videoPlayer_vue_vue_type_template_id_27614f7e_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_videoPlayer_vue_vue_type_template_id_27614f7e_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./videoPlayer.vue?vue&type=template&id=27614f7e&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/videoPlayer.vue?vue&type=template&id=27614f7e&scoped=true&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/carousel.vue?vue&type=template&id=76e872ab&":
/*!********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/carousel.vue?vue&type=template&id=76e872ab& ***!
  \********************************************************************************************************************************************************************************************************************/
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
  return _c(
    "div",
    { staticClass: "p-2" },
    [
      _vm._l(_vm.upperitems.images, function(img, index) {
        return _c(
          "div",
          {
            staticClass: "nav-item",
            on: {
              click: function($event) {
                return _vm.$emit("active", null)
              }
            }
          },
          [
            !_vm.upperitems.images
              ? _c(
                  "a",
                  {
                    staticClass: "nav-link",
                    class: { active: _vm.currentUpperIndex == index },
                    on: {
                      click: function($event) {
                        return _vm.currentSelectedItem(index, "upper")
                      }
                    }
                  },
                  [
                    _vm._v(
                      "\n               " + _vm._s(index + 1) + "\n        "
                    )
                  ]
                )
              : _vm._e()
          ]
        )
      }),
      _vm._v(" "),
      _c(
        "div",
        { staticClass: "flex justify-center p-2" },
        _vm._l(_vm.chunkedUpperItems, function(img, index) {
          return _c(
            "div",
            {
              staticClass: "box ",
              on: {
                click: function($event) {
                  return _vm.$emit("btn-primary", null)
                }
              }
            },
            [
              _c(
                "a",
                {
                  staticClass: "btn",
                  class: { "btn-primary": _vm.currentUpperIndex == index },
                  on: {
                    click: function($event) {
                      return _vm.currentSelectedItem(index, "upper")
                    }
                  }
                },
                [
                  _vm._v(
                    "\n                   " +
                      _vm._s(index + 1) +
                      "\n            "
                  )
                ]
              )
            ]
          )
        }),
        0
      ),
      _vm._v(" "),
      _c(
        "div",
        { staticClass: "grid grid-cols-12" },
        _vm._l(_vm.chunkedUpperItems, function(img, index) {
          return img.thumb
            ? _c(
                "div",
                {
                  staticClass: "col-span-4 relative",
                  on: {
                    click: function($event) {
                      return _vm.currentSelectedItem(index, "upper")
                    }
                  }
                },
                [
                  img.type == "img" || img.type == "video"
                    ? _c("img", {
                        staticClass:
                          "w-full hover:opacity-75 rounded mx-auto p-2",
                        class: {
                          "border border-primary rounded":
                            _vm.currentUpperIndex == index
                        },
                        attrs: { src: _vm.images + img.thumb }
                      })
                    : _vm._e(),
                  _vm._v(" "),
                  img.type == "video360"
                    ? _c("img", {
                        staticClass:
                          "w-full hover:opacity-75 rounded mx-auto p-2",
                        class: {
                          "border border-primary rounded":
                            _vm.currentUpperIndex == index
                        },
                        attrs: { src: img.thumb }
                      })
                    : _vm._e(),
                  _vm._v(" "),
                  img.type == "video"
                    ? _c(
                        "div",
                        {
                          staticClass:
                            "absolute border border-white border-2 bg-black p-1 px-4 rounded-lg hover:bg-gray-700",
                          staticStyle: {
                            top: "35%",
                            left: "35%",
                            opacity: "50%"
                          }
                        },
                        [
                          _c("i", {
                            staticClass:
                              "hidden sm:block fa fa-play text-white fa-2x",
                            attrs: { "aria-hidden": "true" }
                          }),
                          _vm._v(" "),
                          _c("i", {
                            staticClass: "sm:hidden fa fa-play text-white ",
                            attrs: { "aria-hidden": "true" }
                          })
                        ]
                      )
                    : _vm._e()
                ]
              )
            : _vm._e()
        }),
        0
      ),
      _vm._v(" "),
      _c(
        "div",
        {
          staticClass: "grid grid-cols-12",
          on: {
            click: function($event) {
              return _vm.$emit("active", null)
            }
          }
        },
        [
          _c(
            "div",
            { staticClass: "col-span-12" },
            [
              _vm.currentItem.type == "img"
                ? _c("img", {
                    staticClass: "w-auto",
                    attrs: { src: _vm.images + _vm.currentItem.src },
                    on: { click: _vm.nextItem }
                  })
                : _vm._e(),
              _vm._v(" "),
              _vm.currentItem.type == "video"
                ? _c("video-player", {
                    attrs: { options: _vm.videoOptions, autoplay: "false" }
                  })
                : _vm._e(),
              _vm._v(" "),
              _vm.currentItem.type == "video360"
                ? _c("product-viewer", {
                    attrs: {
                      folder: _vm.folder + _vm.upperitems.video360 + "/",
                      filename: _vm.fileName,
                      size: _vm.currentItem.size,
                      rotate: _vm.currentItem.rotate
                    }
                  })
                : _vm._e(),
              _vm._v(" "),
              _vm.chunkedItems.length && !_vm.showUpper
                ? _c(
                    "p",
                    { staticClass: "bg-blue-300 text-white text-center p-4" },
                    [_vm._v(_vm._s(_vm.chunkedItems[_vm.currentIndex].text))]
                  )
                : _vm._e(),
              _vm._v(" "),
              _c(
                "p",
                { staticClass: "text-xl font-light bg-blue-400 text-white" },
                [_vm._v(_vm._s(_vm.currentItem.title))]
              ),
              _vm._v(" "),
              _c(
                "p",
                { staticClass: "text-lg font-light bg-blue-400 text-white" },
                [_vm._v(" " + _vm._s(_vm.currentItem.desc) + " ")]
              ),
              _vm._v(" "),
              _c("span", {
                domProps: { innerHTML: _vm._s(_vm.currentItem.other) }
              })
            ],
            1
          )
        ]
      ),
      _vm._v(" "),
      _vm.chunkedItems.length
        ? _c("center", [
            _c("a", [
              _vm._v(
                _vm._s(_vm._f("transJs")("Customer Jewelleries", _vm.langs))
              )
            ])
          ])
        : _vm._e(),
      _vm._v(" "),
      _c(
        "div",
        { staticClass: "grid grid-cols-12 justify-center" },
        _vm._l(_vm.chunkedItems, function(img, index) {
          return img.thumb
            ? _c(
                "div",
                {
                  staticClass: "col-span-4 relative",
                  on: {
                    click: function($event) {
                      return _vm.currentSelectedItem(index, "lower")
                    }
                  }
                },
                [
                  _c("img", {
                    staticClass:
                      "rounded mx-auto d-block image-background p-2 w-full hover:opacity-75",
                    class: {
                      " border border-primary rounded":
                        _vm.currentIndex == index
                    },
                    attrs: { src: _vm.images + img.thumb }
                  }),
                  _vm._v(" "),
                  img.type == "video"
                    ? _c(
                        "div",
                        {
                          staticClass:
                            "absolute border border-white border-2 bg-black p-1 px-4 rounded-lg hover:bg-gray-700",
                          staticStyle: {
                            top: "35%",
                            left: "35%",
                            opacity: "50%"
                          }
                        },
                        [
                          _c("i", {
                            staticClass:
                              "hidden sm:block fa fa-play text-white fa-2x",
                            attrs: { "aria-hidden": "true" }
                          }),
                          _vm._v(" "),
                          _c("i", {
                            staticClass: "sm:hidden fa fa-play text-white ",
                            attrs: { "aria-hidden": "true" }
                          })
                        ]
                      )
                    : _vm._e()
                ]
              )
            : _vm._e()
        }),
        0
      ),
      _vm._v(" "),
      _c("div", { attrs: { "aria-label": "Page navigation example" } }, [
        _c("div", { staticClass: "flex justify-center" }, [
          _c("div", { staticClass: "btn btn-outline" }, [
            _c(
              "a",
              {
                staticClass: "page-link",
                attrs: { "aria-label": "Previous" },
                on: {
                  click: function($event) {
                    return _vm.currentSelectedItem(0, "lower")
                  }
                }
              },
              [
                _c("span", { attrs: { "aria-hidden": "true" } }, [
                  _vm._v("1 «")
                ])
              ]
            )
          ]),
          _vm._v(" "),
          _c(
            "div",
            {
              staticClass: "btn btn-outline",
              class: { " disabled": _vm.currentIndex == 0 },
              on: {
                click: function($event) {
                  return _vm.currentSelectedItem(_vm.currentIndex - 1, "lower")
                }
              }
            },
            [
              _c("a", { staticClass: "page-link" }, [
                _vm._v(_vm._s(_vm.currentIndex))
              ])
            ]
          ),
          _vm._v(" "),
          _c("div", { staticClass: "btn btn-primary" }, [
            _c("a", { staticClass: "page-link" }, [
              _vm._v(_vm._s(_vm.currentIndex + 1))
            ])
          ]),
          _vm._v(" "),
          _c(
            "div",
            {
              staticClass: "btn btn-outline",
              on: {
                click: function($event) {
                  return _vm.currentSelectedItem(_vm.currentIndex + 1, "lower")
                }
              }
            },
            [
              _c("a", { staticClass: "page-link" }, [
                _vm._v(_vm._s(_vm.currentIndex + 2))
              ])
            ]
          ),
          _vm._v(" "),
          _c("div", { staticClass: "btn btn-outline" }, [
            _c(
              "a",
              {
                staticClass: "page-link",
                attrs: { "aria-label": "Next" },
                on: {
                  click: function($event) {
                    return _vm.currentSelectedItem(
                      _vm.items.length - 1,
                      "lower"
                    )
                  }
                }
              },
              [
                _c("span", { attrs: { "aria-hidden": "true" } }, [
                  _vm._v("» " + _vm._s(_vm.items.length + 1))
                ])
              ]
            )
          ])
        ])
      ])
    ],
    2
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/imageCarousel.vue?vue&type=template&id=c5e34bc0&":
/*!*************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/imageCarousel.vue?vue&type=template&id=c5e34bc0& ***!
  \*************************************************************************************************************************************************************************************************************************/
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
  return _vm.active
    ? _c(
        "div",
        {
          on: {
            click: function($event) {
              return _vm.$emit("active", null)
            }
          }
        },
        [
          _c(
            "transition",
            {
              attrs: {
                name: "modal",
                click:
                  "mutualVar.notification.contactMessage.active = !mutualVar.notification.contactMessage.active"
              }
            },
            [
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
                      staticClass: "modal-dialog",
                      attrs: { role: "document" },
                      on: {
                        click: function($event) {
                          _vm.mutualVar.notification.contactMessage.active = !_vm
                            .mutualVar.notification.contactMessage.active
                        }
                      }
                    },
                    [
                      _c("div", { staticClass: "modal-content" }, [
                        _c("div", { staticClass: "modal-header" }, [
                          _c("h5", { staticClass: "modal-title" }, [
                            _vm._v(_vm._s(_vm.title) + " ")
                          ]),
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
                                      _vm.mutualVar.notification.contactMessage.active = !_vm
                                        .mutualVar.notification.contactMessage
                                        .active
                                    }
                                  }
                                },
                                [_vm._v("×")]
                              )
                            ]
                          )
                        ]),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticClass: "modal-body",
                            on: {
                              click: function($event) {
                                return _vm.$emit("active", null)
                              }
                            }
                          },
                          [
                            _c("div", { staticClass: "flex justify-center" }, [
                              _c("div", {}, [
                                _c(
                                  "button",
                                  {
                                    staticClass:
                                      "btn box bg-blue-300 text-white",
                                    on: {
                                      click: function($event) {
                                        return _vm.currentSelectedItem(0)
                                      }
                                    }
                                  },
                                  [_vm._v(_vm._s(0))]
                                ),
                                _vm._v(" "),
                                _c(
                                  "button",
                                  {
                                    staticClass: "btn box",
                                    on: {
                                      click: function($event) {
                                        return _vm.prevItem()
                                      }
                                    }
                                  },
                                  [
                                    _vm._v(
                                      _vm._s(
                                        _vm.currentIndex - 1 > 0
                                          ? _vm.currentIndex - 1
                                          : 0
                                      )
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "button",
                                  { staticClass: "btn btn-primary" },
                                  [_vm._v(_vm._s(_vm.currentIndex + 1))]
                                ),
                                _vm._v(" "),
                                _c(
                                  "button",
                                  {
                                    staticClass: "btn box",
                                    on: {
                                      click: function($event) {
                                        return _vm.nextItem()
                                      }
                                    }
                                  },
                                  [
                                    _vm._v(
                                      _vm._s(
                                        _vm.currentIndex + 2 < _vm.items.length
                                          ? _vm.currentIndex + 2
                                          : _vm.items.length
                                      )
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "button",
                                  {
                                    staticClass:
                                      "btn box bg-blue-300 text-white",
                                    on: {
                                      click: function($event) {
                                        return _vm.currentSelectedItem(
                                          _vm.items.length - 1
                                        )
                                      }
                                    }
                                  },
                                  [_vm._v(_vm._s(_vm.items.length))]
                                )
                              ])
                            ]),
                            _vm._v(" "),
                            _c("div", { staticClass: "box" }, [
                              _c("div", {}, [
                                _vm.currentItem.type == "img"
                                  ? _c("img", {
                                      attrs: {
                                        src: _vm.images + _vm.currentItem.src
                                      },
                                      on: { click: _vm.nextItem }
                                    })
                                  : _vm._e(),
                                _vm._v(" "),
                                _c(
                                  "figcaption",
                                  { staticClass: "has-text-centered" },
                                  [
                                    _c("p", { staticClass: "title is-3" }, [
                                      _vm._v(_vm._s(_vm.currentItem.title))
                                    ]),
                                    _vm._v(" "),
                                    _c("p", { staticClass: "subtitle is-5" }, [
                                      _vm._v(
                                        " " + _vm._s(_vm.currentItem.desc) + " "
                                      )
                                    ]),
                                    _vm._v(" "),
                                    _c("span", {
                                      domProps: {
                                        innerHTML: _vm._s(_vm.currentItem.other)
                                      }
                                    })
                                  ]
                                )
                              ])
                            ])
                          ]
                        )
                      ])
                    ]
                  )
                ])
              ])
            ]
          )
        ],
        1
      )
    : _vm._e()
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/productViewer360.vue?vue&type=template&id=4df11af7&":
/*!****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/productViewer360.vue?vue&type=template&id=4df11af7& ***!
  \****************************************************************************************************************************************************************************************************************************/
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
  return _c("div", { staticClass: "row text-center" }, [
    _c("div", { staticClass: "col-12" }, [
      _c("canvas", {
        staticClass: "flex",
        attrs: { id: "productViewer", width: _vm.width, height: _vm.height },
        on: {
          mousedown: _vm.startDrag,
          touchstart: _vm.startDrag,
          mousemove: _vm.onDrag,
          touchmove: _vm.onDrag,
          mouseup: _vm.stopDrag,
          touchend: _vm.stopDrag,
          mouseleave: _vm.stopDrag
        }
      })
    ])
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/shoppingCart/cart.vue?vue&type=template&id=402299ec&":
/*!*****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/shoppingCart/cart.vue?vue&type=template&id=402299ec& ***!
  \*****************************************************************************************************************************************************************************************************************************/
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
  return _c(
    "div",
    { staticClass: "section", attrs: { id: "customerMoments" } },
    [
      _c(
        "button",
        {
          staticClass: "btn btn-primary",
          on: {
            click: function($event) {
              return _vm.selectItem()
            }
          }
        },
        [_vm._v(_vm._s(_vm._f("transJs")("Select this Item", _vm.langs)))]
      ),
      _vm._v(" "),
      _vm.mutualVar.cookiesInfo.shoppingCart.haveShoppingCart
        ? _c(
            "div",
            {
              on: {
                click: function($event) {
                  return _vm.toggleModal()
                }
              }
            },
            [
              _vm.mutualVar.cookiesInfo.shoppingCart.modalActive
                ? _c(
                    "div",
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
                                staticClass:
                                  "modal-dialog modal-dialog-centered",
                                attrs: { role: "document" },
                                on: {
                                  click: function($event) {
                                    return _vm.toggleModal()
                                  }
                                }
                              },
                              [
                                _c("div", { staticClass: "modal-content" }, [
                                  _c("div", { staticClass: "modal-header" }, [
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
                                                return _vm.toggleModal()
                                              }
                                            }
                                          },
                                          [_vm._v("×")]
                                        )
                                      ]
                                    )
                                  ]),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    { staticClass: "modal-body mx-12 mb-4" },
                                    [
                                      _c(
                                        "center",
                                        [
                                          _vm._l(
                                            _vm.nextProcedure.modalOptions,
                                            function(option) {
                                              return _c("div", [
                                                _c(
                                                  "div",
                                                  {
                                                    on: {
                                                      click: function($event) {
                                                        return _vm.toggleModal()
                                                      }
                                                    }
                                                  },
                                                  [
                                                    _c(
                                                      "a",
                                                      {
                                                        attrs: {
                                                          href: "" + option.url
                                                        }
                                                      },
                                                      [
                                                        _c(
                                                          "button",
                                                          {
                                                            staticClass:
                                                              "btn btn-primary",
                                                            attrs: {
                                                              disabled: !option.clickable
                                                            }
                                                          },
                                                          [
                                                            _vm._v(
                                                              "\n                                    " +
                                                                _vm._s(
                                                                  _vm._f(
                                                                    "transJs"
                                                                  )(
                                                                    option.text,
                                                                    _vm.langs
                                                                  )
                                                                ) +
                                                                "\n                                  "
                                                            )
                                                          ]
                                                        )
                                                      ]
                                                    )
                                                  ]
                                                )
                                              ])
                                            }
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "button",
                                            {
                                              staticClass:
                                                "btn btn-primary hover:bg-blue-500",
                                              class: {
                                                "opacity-50": !_vm.nextProcedure
                                                  .addToCart.clickable
                                              },
                                              attrs: {
                                                disabled: !_vm.nextProcedure
                                                  .addToCart.clickable
                                              },
                                              on: {
                                                click: function($event) {
                                                  return _vm.addItemToCart()
                                                }
                                              }
                                            },
                                            [
                                              _vm._v(
                                                _vm._s(
                                                  _vm._f("transJs")(
                                                    _vm.nextProcedure.addToCart
                                                      .text,
                                                    _vm.langs
                                                  )
                                                )
                                              )
                                            ]
                                          )
                                        ],
                                        2
                                      )
                                    ],
                                    1
                                  )
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
            ]
          )
        : _vm._e()
    ]
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/shoppingCart/item.vue?vue&type=template&id=f4232f42&":
/*!*****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/shoppingCart/item.vue?vue&type=template&id=f4232f42& ***!
  \*****************************************************************************************************************************************************************************************************************************/
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
  return _c(
    "div",
    { staticClass: "p-4" },
    [
      _vm._l(_vm.shortenName, function(item, firstIndex) {
        return _c(
          "div",
          { staticClass: "grid grid-cols-12 border rounded mt-1" },
          [
            item.pairItems.length > 0
              ? _c("div", { staticClass: "col-span-12" }, [
                  _c(
                    "div",
                    {
                      on: {
                        click: function($event) {
                          return _vm.shiftIndex(firstIndex)
                        }
                      }
                    },
                    [
                      _c(
                        "div",
                        {
                          staticClass:
                            "flex justify-between items-center text-white p-1",
                          class: item.pairItems.filter(function(data) {
                            return data.available != 1
                          }).length
                            ? "bg-red-300"
                            : "bg-blue-300"
                        },
                        [
                          _c("div", { staticClass: "px-4" }, [
                            _c("p", { staticClass: "text-xl font-light" }, [
                              _c("strong", [
                                _vm._v(
                                  _vm._s(
                                    _vm._f("transJs")(
                                      item.pairItems[0].type,
                                      _vm.langs
                                    )
                                  ) + " "
                                )
                              ]),
                              item.pairItems[1]
                                ? _c("strong", [
                                    _vm._v(
                                      " + " +
                                        _vm._s(
                                          _vm._f("transJs")(
                                            item.pairItems[1].type,
                                            _vm.langs
                                          )
                                        )
                                    )
                                  ])
                                : _vm._e()
                            ])
                          ]),
                          _vm._v(" "),
                          _c("div", { staticClass: "sm:px-4" }, [
                            _c(
                              "a",
                              {
                                attrs: {
                                  href:
                                    item.pairItems[0].url + item.pairItems[0].id
                                },
                                on: {
                                  click: function($event) {
                                    return _vm.directTo(item.pairItems[0].id)
                                  }
                                }
                              },
                              [
                                _c(
                                  "button",
                                  {
                                    staticClass: "btn btn-primary",
                                    class: item.pairItems.filter(function(
                                      data
                                    ) {
                                      return data.available != 1
                                    }).length
                                      ? "bg-red-500"
                                      : "btn-primary"
                                  },
                                  [
                                    _vm._v(
                                      _vm._s(
                                        _vm._f("transJs")("Back to", _vm.langs)
                                      ) +
                                        _vm._s(
                                          _vm._f("transJs")(
                                            item.pairItems[0].type,
                                            _vm.langs
                                          )
                                        )
                                    )
                                  ]
                                )
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "button",
                              {
                                staticClass: "btn btn-primary",
                                class: item.pairItems.filter(function(data) {
                                  return data.available != 1
                                }).length
                                  ? "bg-red-500"
                                  : "btn-primary",
                                on: {
                                  click: function($event) {
                                    return _vm.removeItem(firstIndex)
                                  }
                                }
                              },
                              [
                                _vm._v(
                                  _vm._s(
                                    _vm._f("transJs")("Remove", _vm.langs)
                                  ) + "  "
                                ),
                                _c("i", { staticClass: "fa fa-times-circle" })
                              ]
                            )
                          ])
                        ]
                      ),
                      _vm._v(" "),
                      _vm._l(item.pairItems, function(pairItem, secondIndex) {
                        return _c("div", [
                          _c(
                            "div",
                            {
                              staticClass:
                                "grid grid-cols-12 text-grey-300 border-b",
                              class: item.pairItems.filter(function(data) {
                                return data.available != 1
                              }).length
                                ? "bg-red-100"
                                : "bg-blue-100"
                            },
                            [
                              _c("div", { staticClass: "col-span-9" }, [
                                _c(
                                  "div",
                                  { staticClass: "grid grid-cols-12 " },
                                  [
                                    _c("div", { staticClass: "col-span-4" }, [
                                      _c(
                                        "div",
                                        { staticClass: "flex justify-center" },
                                        [
                                          _c(
                                            "a",
                                            {
                                              attrs: {
                                                href:
                                                  "" +
                                                  pairItem.url +
                                                  (pairItem.type ==
                                                  "mountingFee"
                                                    ? ""
                                                    : pairItem.id)
                                              },
                                              on: {
                                                click: function($event) {
                                                  return _vm.directTo(
                                                    pairItem.id
                                                  )
                                                }
                                              }
                                            },
                                            [
                                              _c("img", {
                                                staticClass:
                                                  "arounded border w-32 sm:w-48",
                                                attrs: { src: pairItem.image },
                                                on: {
                                                  click: function($event) {
                                                    _vm.selectingCarousel =
                                                      pairItem.type
                                                  }
                                                }
                                              })
                                            ]
                                          )
                                        ]
                                      )
                                    ]),
                                    _vm._v(" "),
                                    _c(
                                      "div",
                                      { staticClass: "col-span-8 text-center" },
                                      [
                                        _c(
                                          "a",
                                          {
                                            staticClass: "text-blue-600",
                                            attrs: {
                                              href:
                                                "" +
                                                pairItem.url +
                                                (pairItem.type == "mountingFee"
                                                  ? ""
                                                  : pairItem.id)
                                            },
                                            on: {
                                              click: function($event) {
                                                return _vm.directTo(pairItem.id)
                                              }
                                            }
                                          },
                                          [_vm._v(_vm._s(pairItem.title))]
                                        ),
                                        _vm._v(" "),
                                        pairItem.type == "engagementRings"
                                          ? _c("div", [
                                              _c(
                                                "div",
                                                {
                                                  staticClass:
                                                    "flex justify-center"
                                                },
                                                [
                                                  _c(
                                                    "div",
                                                    {
                                                      staticClass:
                                                        "bg-gray-300 p-1 rounded"
                                                    },
                                                    [
                                                      _c(
                                                        "label",
                                                        {
                                                          attrs: {
                                                            for:
                                                              "inputGroupSelect01"
                                                          }
                                                        },
                                                        [
                                                          _vm._v(
                                                            "\n                                                " +
                                                              _vm._s(
                                                                _vm._f(
                                                                  "transJs"
                                                                )(
                                                                  "Ring Size",
                                                                  _vm.langs
                                                                )
                                                              ) +
                                                              "\n                                            "
                                                          )
                                                        ]
                                                      )
                                                    ]
                                                  ),
                                                  _vm._v(" "),
                                                  _c(
                                                    "select",
                                                    {
                                                      directives: [
                                                        {
                                                          name: "model",
                                                          rawName: "v-model",
                                                          value:
                                                            pairItem.ringSize,
                                                          expression:
                                                            "pairItem.ringSize"
                                                        }
                                                      ],
                                                      staticClass: "rounded",
                                                      attrs: {
                                                        id: "inputGroupSelect01"
                                                      },
                                                      on: {
                                                        change: function(
                                                          $event
                                                        ) {
                                                          var $$selectedVal = Array.prototype.filter
                                                            .call(
                                                              $event.target
                                                                .options,
                                                              function(o) {
                                                                return o.selected
                                                              }
                                                            )
                                                            .map(function(o) {
                                                              var val =
                                                                "_value" in o
                                                                  ? o._value
                                                                  : o.value
                                                              return val
                                                            })
                                                          _vm.$set(
                                                            pairItem,
                                                            "ringSize",
                                                            $event.target
                                                              .multiple
                                                              ? $$selectedVal
                                                              : $$selectedVal[0]
                                                          )
                                                        }
                                                      }
                                                    },
                                                    _vm._l(
                                                      _vm.ringSizeOptions,
                                                      function(size) {
                                                        return _c(
                                                          "option",
                                                          {
                                                            domProps: {
                                                              value: size
                                                            }
                                                          },
                                                          [_vm._v(_vm._s(size))]
                                                        )
                                                      }
                                                    ),
                                                    0
                                                  )
                                                ]
                                              ),
                                              _vm._v(" "),
                                              _c("input", {
                                                directives: [
                                                  {
                                                    name: "model",
                                                    rawName: "v-model",
                                                    value: pairItem.engrave,
                                                    expression:
                                                      "pairItem.engrave"
                                                  }
                                                ],
                                                staticClass: "input is-small",
                                                attrs: {
                                                  id: "inputGroupSelect01",
                                                  type: "text",
                                                  name: "",
                                                  placeholder: _vm._f(
                                                    "transJs"
                                                  )("Engrave", _vm.langs)
                                                },
                                                domProps: {
                                                  value: pairItem.engrave
                                                },
                                                on: {
                                                  input: function($event) {
                                                    if (
                                                      $event.target.composing
                                                    ) {
                                                      return
                                                    }
                                                    _vm.$set(
                                                      pairItem,
                                                      "engrave",
                                                      $event.target.value
                                                    )
                                                  }
                                                }
                                              })
                                            ])
                                          : _vm._e()
                                      ]
                                    )
                                  ]
                                )
                              ]),
                              _vm._v(" "),
                              _c("div", { staticClass: "col-span-3" }, [
                                _c(
                                  "div",
                                  { staticClass: "grid grid-cols-12" },
                                  [
                                    _c("div", { staticClass: "col-span-6" }, [
                                      _c(
                                        "a",
                                        {
                                          staticClass: "text-blue-600",
                                          attrs: { href: pairItem.url },
                                          on: {
                                            click: function($event) {
                                              return _vm.directTo()
                                            }
                                          }
                                        },
                                        [
                                          _c("u", [
                                            _vm._v(
                                              _vm._s(
                                                _vm._f("transJs")(
                                                  "change",
                                                  _vm.langs
                                                )
                                              )
                                            )
                                          ])
                                        ]
                                      )
                                    ]),
                                    _vm._v(" "),
                                    _c(
                                      "div",
                                      {
                                        staticClass: "col-span-6",
                                        on: {
                                          click: function($event) {
                                            _vm.selectingCarousel =
                                              pairItem.type
                                          }
                                        }
                                      },
                                      [
                                        _c("img", {
                                          attrs: {
                                            width: "32",
                                            src:
                                              "/images/front-end/shoppingCart/" +
                                              pairItem.type +
                                              ".png"
                                          }
                                        }),
                                        _vm._v(" "),
                                        _vm.couponValid
                                          ? _c("div", [
                                              pairItem.available
                                                ? _c("a", [
                                                    pairItem.discounted_unit_price &&
                                                    pairItem.discounted_unit_price !=
                                                      pairItem.unit_price
                                                      ? _c("del", [
                                                          _vm._v(
                                                            "\n                                            " +
                                                              _vm._s(
                                                                "$" +
                                                                  pairItem.unit_price
                                                              ) +
                                                              "\n                                            "
                                                          )
                                                        ])
                                                      : _vm._e(),
                                                    _vm._v(" "),
                                                    pairItem.discounted_unit_price &&
                                                    pairItem.discounted_unit_price !=
                                                      pairItem.unit_price
                                                      ? _c(
                                                          "p",
                                                          {
                                                            staticStyle: {
                                                              color: "red"
                                                            }
                                                          },
                                                          [
                                                            _vm._v(
                                                              _vm._s(
                                                                "$" +
                                                                  pairItem.discounted_unit_price
                                                              )
                                                            )
                                                          ]
                                                        )
                                                      : _vm._e()
                                                  ])
                                                : _vm._e()
                                            ])
                                          : _vm._e(),
                                        _vm._v(" "),
                                        !_vm.couponValid ||
                                        pairItem.discounted_unit_price ==
                                          pairItem.unit_price
                                          ? _c("div", [
                                              _c(
                                                "p",
                                                {
                                                  staticClass:
                                                    "text-lg font-light text-gray-700"
                                                },
                                                [
                                                  _vm._v(
                                                    _vm._s(
                                                      "$" + pairItem.unit_price
                                                    )
                                                  )
                                                ]
                                              )
                                            ])
                                          : _vm._e(),
                                        _vm._v(" "),
                                        !pairItem.available
                                          ? _c(
                                              "p",
                                              { staticStyle: { color: "red" } },
                                              [
                                                _c("strong", [
                                                  _vm._v(_vm._s("sold"))
                                                ])
                                              ]
                                            )
                                          : _vm._e()
                                      ]
                                    )
                                  ]
                                )
                              ])
                            ]
                          )
                        ])
                      })
                    ],
                    2
                  )
                ])
              : _vm._e()
          ]
        )
      }),
      _vm._v(" "),
      _c("div", { staticClass: "grid grid-cols-12 p-1" }, [
        _c("div", { staticClass: "col-span-12 sm:col-span-8" }, [
          _c("div", { staticClass: "grid grid-cols-12" }, [
            _c("div", { staticClass: "col-span-12 p-2" }, [
              _c("p", [
                _vm._v(
                  _vm._s(_vm._f("transJs")("Precautions", _vm.langs)) + "："
                )
              ]),
              _vm._v(" "),
              _c("small", [
                _c("p", [
                  _vm._v(
                    _vm._s(
                      _vm._f("transJs")(
                        "All amounts of the company are subject to Hong Kong dollar settlement",
                        _vm.langs
                      )
                    )
                  )
                ]),
                _vm._v(" "),
                _c("p", [
                  _vm._v(
                    _vm._s(
                      _vm._f("transJs")(
                        "The customer is required to pay the full amount and withdraw the goods within two months after the order is placed, otherwise the company reserves the right to terminate the transaction.",
                        _vm.langs
                      )
                    )
                  )
                ]),
                _vm._v(" "),
                _c("p", [
                  _vm._v(
                    _vm._s(
                      _vm._f("transJs")(
                        "In order to protect the interests of both parties, unless the diamond does not match the GIA report, the order will not be returned after confirmation.",
                        _vm.langs
                      )
                    )
                  )
                ])
              ]),
              _vm._v(" "),
              _c("br"),
              _vm._v(" "),
              _c("div", { staticClass: "rounded border text-center p-10" }, [
                _vm.maxDeliveryDate
                  ? _c("p", [
                      _vm._v(
                        _vm._s(
                          _vm._f("transJs")(
                            "Today Order, Diamond Gets Free shipment",
                            _vm.langs
                          )
                        ) + "\n                            "
                      ),
                      _c("strong", [
                        _vm._v(
                          _vm._s(_vm._f("transJs")("On", _vm.langs)) + " "
                        ),
                        _c("a", { staticClass: "text-blue-600" }, [
                          _vm._v(
                            " " +
                              _vm._s(
                                _vm._f("transJs")(
                                  _vm.extraWorkingDates(
                                    _vm.maxDeliveryDate,
                                    "months"
                                  ),
                                  _vm.langs
                                )
                              ) +
                              " " +
                              _vm._s(
                                _vm.extraWorkingDates(_vm.maxDeliveryDate)
                              ) +
                              " " +
                              _vm._s(_vm._f("transJs")("day", _vm.langs)) +
                              ",  " +
                              _vm._s(
                                _vm._f("transJs")(
                                  _vm.extraWorkingDates(
                                    _vm.maxDeliveryDate,
                                    "dates"
                                  ),
                                  _vm.langs
                                )
                              )
                          )
                        ])
                      ])
                    ])
                  : _vm._e()
              ])
            ])
          ])
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "col-span-12 sm:col-span-4" }, [
          _c("div", { staticClass: "grid grid-cols-12" }, [
            _c("div", { staticClass: "col-span-12" }, [
              _c("div", { staticClass: "flex" }, [
                _c("div", { staticClass: "input-group-prepend" }, [
                  _c(
                    "button",
                    {
                      staticClass: "btn btn-primary is-small",
                      attrs: { type: "button", id: "button-addon1" },
                      on: { click: _vm.checkCouponCodeValid }
                    },
                    [
                      _vm._v(
                        _vm._s(_vm._f("transJs")("Apply Coupon", _vm.langs))
                      )
                    ]
                  )
                ]),
                _vm._v(" "),
                _c("input", {
                  directives: [
                    {
                      name: "model",
                      rawName: "v-model",
                      value: _vm.mutualVar.cookiesInfo.coupon_code,
                      expression: "mutualVar.cookiesInfo.coupon_code"
                    }
                  ],
                  staticClass: "input",
                  attrs: {
                    type: "text",
                    placeholder: _vm._f("transJs")(
                      "Enter Coupon Code",
                      _vm.langs
                    ),
                    "aria-label": "Example text with button addon",
                    "aria-describedby": "button-addon1"
                  },
                  domProps: { value: _vm.mutualVar.cookiesInfo.coupon_code },
                  on: {
                    focus: function($event) {
                      return $event.target.select()
                    },
                    input: function($event) {
                      if ($event.target.composing) {
                        return
                      }
                      _vm.$set(
                        _vm.mutualVar.cookiesInfo,
                        "coupon_code",
                        $event.target.value
                      )
                    }
                  }
                }),
                _vm._v(" "),
                _vm.couponValid == 0
                  ? _c("p", { staticStyle: { color: "red" } }, [
                      _c("small", [
                        _vm._v(
                          _vm._s(_vm._f("transJs")("not valid", _vm.langs))
                        )
                      ])
                    ])
                  : _vm._e()
              ])
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "grid grid-cols-12" }, [
            _c("div", { staticClass: "col-span-6" }, [
              _vm.couponValid || _vm.calculatedDiscountRate != 1
                ? _c("div", [
                    _c("p", [
                      _vm._v(
                        _vm._s(_vm._f("transJs")("Total", _vm.langs)) + " "
                      )
                    ]),
                    _vm._v(" "),
                    _c("p", { staticClass: "text-red-500" }, [
                      _vm._v(
                        _vm._s(_vm._f("transJs")("Disounted Total", _vm.langs))
                      )
                    ])
                  ])
                : _c("div", [
                    _c("p", [
                      _vm._v(
                        _vm._s(_vm._f("transJs")("Total", _vm.langs)) + " "
                      )
                    ])
                  ]),
              _vm._v(" "),
              _c("p", { staticClass: "text-lg text-gray-600" }, [
                _vm._v(_vm._s(_vm._f("transJs")("Deposit (20%)", _vm.langs)))
              ]),
              _vm._v(" "),
              _c("div", {}, [
                _c("p", { staticClass: "text-lg text-blue-600" }, [
                  _vm._v(
                    _vm._s(_vm._f("transJs")("Balance (80%)", _vm.langs)) +
                      "\n                        "
                  )
                ]),
                _vm._v(" "),
                _c(
                  "select",
                  {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value:
                          _vm.mutualVar.cookiesInfo.checkout
                            .balancePaymentMethod,
                        expression:
                          "mutualVar.cookiesInfo.checkout.balancePaymentMethod"
                      }
                    ],
                    staticClass: "border-2 border-gray-600",
                    on: {
                      change: function($event) {
                        var $$selectedVal = Array.prototype.filter
                          .call($event.target.options, function(o) {
                            return o.selected
                          })
                          .map(function(o) {
                            var val = "_value" in o ? o._value : o.value
                            return val
                          })
                        _vm.$set(
                          _vm.mutualVar.cookiesInfo.checkout,
                          "balancePaymentMethod",
                          $event.target.multiple
                            ? $$selectedVal
                            : $$selectedVal[0]
                        )
                      }
                    }
                  },
                  _vm._l(_vm.paymentOptions, function(paymentOption) {
                    return _c(
                      "option",
                      { domProps: { value: paymentOption.name } },
                      [
                        _vm._v(
                          " " +
                            _vm._s(
                              _vm._f("transJs")(paymentOption.name, _vm.langs)
                            )
                        )
                      ]
                    )
                  }),
                  0
                )
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "col-span-6 text-right" }, [
              _vm.couponValid || _vm.calculatedDiscountRate != 1
                ? _c("div", [
                    _c("del", [
                      _c("p", [_vm._v("HK$ " + _vm._s(_vm.subTotal))])
                    ]),
                    _vm._v(" "),
                    _c("p", { staticClass: "text-red-500" }, [
                      _vm._v("HK$ " + _vm._s(_vm.discountedSubTotal))
                    ]),
                    _vm._v(" "),
                    _c("p"),
                    _vm._v(" "),
                    _c("p", { staticClass: "text-lg text-gray-600" }, [
                      _c("strong", [
                        _vm._v(
                          " HK$ " +
                            _vm._s(
                              _vm.mutualVar.cookiesInfo.checkout
                                .discountedDeposit
                            ) +
                            " "
                        )
                      ])
                    ])
                  ])
                : _c("div", [
                    _c("p", [_vm._v("HK$ " + _vm._s(_vm.subTotal))]),
                    _vm._v(" "),
                    _c("p"),
                    _vm._v(" "),
                    _c("p", { staticClass: "text-lg text-gray-600" }, [
                      _c("strong", [
                        _vm._v(
                          " HK$ " +
                            _vm._s(_vm.mutualVar.cookiesInfo.checkout.deposit) +
                            " "
                        )
                      ])
                    ])
                  ]),
              _vm._v(" "),
              _c("p", { staticClass: "text-lg text-blue-600" }, [
                _c("strong", [_vm._v(" HK$ " + _vm._s(_vm.balance) + " ")])
              ])
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "flex justify-between " }, [
            _c("div", {}, [
              _c("p", { staticStyle: { color: "red" } }, [
                _vm._v(
                  "* " +
                    _vm._s(
                      _vm._f("transJs")(
                        "you only need to pay deposit, balance will pay after 100% satisfied",
                        _vm.langs
                      )
                    )
                )
              ])
            ]),
            _vm._v(" "),
            _vm.windowHref.includes("shopping-cart")
              ? _c(
                  "div",
                  {
                    on: {
                      click: function($event) {
                        return _vm.sendCookies()
                      }
                    }
                  },
                  [
                    _c(
                      "a",
                      { attrs: { href: "/" + _vm.locale + "/shop-bag-bill" } },
                      [
                        _c(
                          "button",
                          {
                            staticClass: "btn btn-primary",
                            class: { "opacity-25": !_vm.checkoutClickable },
                            attrs: { disabled: !_vm.checkoutClickable }
                          },
                          [
                            _c("i", { staticClass: "fas fa-shopping-cart" }),
                            _vm._v(
                              _vm._s(_vm._f("transJs")("checkout", _vm.langs))
                            )
                          ]
                        )
                      ]
                    )
                  ]
                )
              : _vm._e()
          ])
        ])
      ])
    ],
    2
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/shoppingCart/stripeCheckoutForm.vue?vue&type=template&id=3c63c463&":
/*!*******************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/shoppingCart/stripeCheckoutForm.vue?vue&type=template&id=3c63c463& ***!
  \*******************************************************************************************************************************************************************************************************************************************/
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
  return _c("div", [
    _c(
      "button",
      {
        staticClass: "btn btn-primary is-large",
        attrs: { href: "", disabled: _vm.clickable == 0, type: "submit" },
        on: {
          click: function($event) {
            $event.preventDefault()
            return _vm.buy($event)
          }
        }
      },
      [
        _c("center", [
          _c("i", { staticClass: "fab fa-cc-mastercard" }),
          _c("i", { staticClass: "fab fa-cc-visa" }),
          _vm._v("\n\t      \tVISA / Master\n      \t")
        ])
      ],
      1
    ),
    _vm._v(" "),
    _c("form", { attrs: { action: "/purchases", method: "POST" } }, [
      _c("input", {
        directives: [
          {
            name: "model",
            rawName: "v-model",
            value: _vm.formData.stripeToken,
            expression: "formData.stripeToken"
          }
        ],
        attrs: { type: "hidden", name: "stripeToken" },
        domProps: { value: _vm.formData.stripeToken },
        on: {
          input: function($event) {
            if ($event.target.composing) {
              return
            }
            _vm.$set(_vm.formData, "stripeToken", $event.target.value)
          }
        }
      }),
      _vm._v(" "),
      _c("input", {
        directives: [
          {
            name: "model",
            rawName: "v-model",
            value: _vm.formData.stripeEmail,
            expression: "formData.stripeEmail"
          }
        ],
        attrs: { type: "hidden", name: "stripeEmail" },
        domProps: { value: _vm.formData.stripeEmail },
        on: {
          input: function($event) {
            if ($event.target.composing) {
              return
            }
            _vm.$set(_vm.formData, "stripeEmail", $event.target.value)
          }
        }
      })
    ])
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/videoPlayer.vue?vue&type=template&id=27614f7e&scoped=true&":
/*!***********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/videoPlayer.vue?vue&type=template&id=27614f7e&scoped=true& ***!
  \***********************************************************************************************************************************************************************************************************************************/
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
  return _c("div", { staticClass: "videoPlayer" }, [
    _c(
      "video",
      {
        staticClass: "w-full h-auto video-js vjs-fluid vjs-big-play-centered",
        attrs: { id: "myVideo" }
      },
      [
        _c("source", {
          attrs: { src: _vm.options.sources[0].src, type: "video/mp4" }
        })
      ]
    )
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
/******/ 	__webpack_require__("./resources/js/frontend.js");
/******/ 	// This entry module used 'exports' so it can't be inlined
/******/ })()
;