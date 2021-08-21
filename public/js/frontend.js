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
/* harmony import */ var _components_video360Exchange_vue__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../components/video360Exchange.vue */ "./resources/js/components/video360Exchange.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
    ProductViewer: _components_productViewer360__WEBPACK_IMPORTED_MODULE_0__.default,
    video360Exchange: _components_video360Exchange_vue__WEBPACK_IMPORTED_MODULE_2__.default
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
  mounted: function mounted() {// if (mutualVar.css.innerWidth<500) {
    //     this.fileName = 'thm-'
    // }
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
    selectingItem: function selectingItem(index) {
      if (this.currentUpperIndex == this.carouselUpperItemsToArray.length - 1) {
        return this.currentUpperIndex = 0;
      }

      if (this.currentUpperIndex == 0) {
        return this.currentUpperIndex = this.carouselUpperItemsToArray.length - 1;
      }

      this.currentUpperIndex += index;
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
          size: 120
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
          text: '',
          postId: ''
        });
      }

      for (var i = this.items.length - 1; i >= 0; i--) {
        if (this.items[i].images[0].image && this.items[i].video) {
          arr.push({
            src: this.items[i].video,
            type: this.items[i].video360 ? 'video360' : 'video',
            video360: this.items[i].video360,
            thumb: this.items[i].images[0].image,
            text: this.items[i].texts.content,
            postId: this.items[i].id
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  props: ['folder', 'filename', 'size', 'id', 'thumb'],
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
      width: 1100,
      height: 618,
      viewer: {
        progress: 0,
        lastProgress: 0,
        stage: ''
      },
      rotatingTime: 70,
      interval: '',
      rotate: 1,
      lastRotate: 0,
      loading: true,
      init: 1
    };
  },
  methods: {
    pauseOrStart: function pauseOrStart() {
      if (this.init) {
        return this.clearInit();
      }

      if (this.rotate > 0 || this.rotate < 0) {
        this.lastRotate = this.rotate;
        this.rotate = 0;
        this.clearInterval();
      } else {
        this.rotate = this.lastRotate;
        this.setRotation(this.rotate);
      }
    },
    clearInit: function clearInit() {
      this.init = 0;
      this.setRotation(this.rotate);
    },
    viewerProgress: function viewerProgress(step) {
      this.lastRotate = step;
      this.rotate = 0;
      this.viewer.progress += step;
      this.checkProgressOver();
      this.drawImg();
    },
    startDrag: function startDrag(e) {
      e = e.changedTouches ? e.changedTouches[0] : e;
      this.dragging = true;
      this.start.x = e.pageX;
      this.start.y = e.pageY;
      document.body.style.cursor = 'ew-resize';
    },
    onDrag: function onDrag(e) {
      e = e.changedTouches ? e.changedTouches[0] : e;

      if (this.dragging) {
        this.c.x = 160 + (e.pageX - this.start.x);
        this.c.y = 160 + (e.pagey - this.start.y);

        if (e.pageX > this.start.x) {
          this.rotate = -1;
          this.start.x = e.pageX - 1;
        }

        if (e.pageX < this.start.x) {
          this.rotate = 1;
          this.start.x = e.pageX + 1;
        } // this.setRotation(this.rotate)


        this.rotateDirection();
      }
    },
    setRotation: function setRotation() {
      var _this = this;

      this.clearInterval();
      this.interval = setInterval(function () {
        if (!_this.dragging) {
          _this.rotateDirection();
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
    rotateDirection: function rotateDirection() {
      this.viewer.progress += this.rotate; // console.log(this.viewer.progress)

      this.checkProgressOver();
      this.drawImg();
    },
    checkProgressOver: function checkProgressOver() {
      if (this.lastRotate == -1 || this.rotate == -1) {
        if (this.viewer.progress < 0) {
          this.viewer.progress = this.size - 1;
        }
      }

      if (this.lastRotate == 1 || this.rotate == 1) {
        if (this.viewer.progress > this.size - 1) {
          this.viewer.progress = 0;
        }
      }
    },
    stopDrag: function stopDrag() {
      if (this.dragging) {
        this.dragging = false;
        document.body.style.cursor = 'auto';
      }
    },
    setPoster: function setPoster() {
      var myCanvas = document.getElementById(this.id);
      var ctx = myCanvas.getContext('2d');
      var img = new Image();
      img.src = this.thumb; // console.log('draw',i)
      // console.log(this.viewer.progress)

      img.onload = function () {
        // console.log('i',i)
        // console.log('vm',vm.viewer.progress)
        ctx.drawImage(img, 88, 0, 936, 618); // Or at whatever offset you like
      }; // console.log(this.viewer.progress)

    },
    drawImg: function drawImg() {
      var myCanvas = document.getElementById(this.id);
      var ctx = myCanvas.getContext('2d');
      var img = new Image();
      var i = this.viewer.progress;
      var vm = this;
      img.src = this.folder + this.filename + this.viewer.progress + '.jpg'; // console.log('draw',i)
      // console.log(this.viewer.progress)

      img.onload = function () {
        // console.log('i',i)
        // console.log('vm',vm.viewer.progress)
        if (i == vm.viewer.progress) {
          ctx.drawImage(img, 0, 0, 1100, 618); // Or at whatever offset you like
        }
      }; // console.log(this.viewer.progress)

    },
    loadImages: function loadImages() {
      for (var i = 0; this.size - 1 > i; i++) {
        this.loadImg(i);
      }

      this.loading = false;
    },
    loadImg: function loadImg(i) {
      var myCanvas = document.getElementById('loadingImg');
      var ctx = myCanvas.getContext('2d');
      var img = new Image();
      var loadedImage = false;
      var size = this.size - 1;
      img.src = this.folder + this.filename + i + '.jpg';

      img.onload = function () {
        // console.log(i)
        ctx.drawImage(img, 0, 0, 0, 0); // Or at whatever offset you like
      };
    }
  },
  computed: {},
  components: {},
  watch: {
    'folder': 'loadImages'
  },
  destroyed: function destroyed() {
    this.clearInterval();
  },
  mounted: function mounted() {
    // this.setRotation(this.rotate)
    this.setPoster();
    this.loadImages();
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
      langs: langs
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
      var cart = mutualVar.cookiesInfo.shoppingCart;

      if (cart.selectingIndex != 0 && cart.selectingIndex > cart.items.length - 1 && cart.items.length) {
        if (cart.items.length) {
          cart.selectingIndex = cart.items.length - 1;
        }
      }

      this.sendCookies();
    },
    addItemIndex: function addItemIndex() {
      var cart = mutualVar.cookiesInfo.shoppingCart;

      if (cart.mode == 'create' && cart.items[cart.items.length - 1]) {
        if (cart.items[cart.items.length - 1].addedCart == 1) {
          this.addItemSample();
          cart.selectingIndex += 1;
          this.sendCookies();
        }
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

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/shoppingCart/icon.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/shoppingCart/icon.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************************************************************/
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
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  data: function data() {
    return {
      mutualVar: mutualVar
    };
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
/* harmony import */ var _helpers_cookie__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../helpers/cookie */ "./resources/js/helpers/cookie.js");
/* harmony import */ var _helpers_extraWorkingDates__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../helpers/extraWorkingDates */ "./resources/js/helpers/extraWorkingDates.js");
/* harmony import */ var _shoppingCart_stripeCheckoutForm_vue__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../shoppingCart/stripeCheckoutForm.vue */ "./resources/js/components/shoppingCart/stripeCheckoutForm.vue");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
      extraWorkingDates: _helpers_extraWorkingDates__WEBPACK_IMPORTED_MODULE_2__.extraWorkingDates,
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
    if ((0,_helpers_cookie__WEBPACK_IMPORTED_MODULE_1__.getCookie)('coupon_code')) {
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

      if ((0,_helpers_cookie__WEBPACK_IMPORTED_MODULE_1__.getCookie)('coupon_code')) {
        mutualVar.cookiesInfo.coupon_code = (0,_helpers_cookie__WEBPACK_IMPORTED_MODULE_1__.getCookie)('coupon_code');
      }

      if ((0,_helpers_cookie__WEBPACK_IMPORTED_MODULE_1__.getCookie)('checkout')) {
        mutualVar.cookiesInfo.checkout = JSON.parse((0,_helpers_cookie__WEBPACK_IMPORTED_MODULE_1__.getCookie)('checkout'));
      }
    },
    sendCookies: function sendCookies() {
      var cookies = mutualVar.cookiesInfo.shoppingCart;
      this.shortenName = mutualVar.cookiesInfo.shoppingCart.items;
      localStorage.setItem('shoppingCart', encodeURIComponent(JSON.stringify(cookies)), 10080);
      (0,_helpers_cookie__WEBPACK_IMPORTED_MODULE_1__.setCookie)('coupon_code', mutualVar.cookiesInfo.coupon_code, 10080);
      (0,_helpers_cookie__WEBPACK_IMPORTED_MODULE_1__.setCookie)('checkout', JSON.stringify(mutualVar.cookiesInfo.checkout), 10080);
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

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/shoppingCart/progress.vue?vue&type=script&lang=js&":
/*!****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/shoppingCart/progress.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _helpers_cookie__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../helpers/cookie */ "./resources/js/helpers/cookie.js");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
      langs: langs
    };
  },
  watch: {},
  created: function created() {
    this.fetchCookies();
  },
  computed: {
    orderProcedures: function orderProcedures() {
      var procedures = {
        engagementRings: ['engagementRings', 'diamonds', 'review'],
        diamonds: ['diamonds', 'engagementRings', 'review']
      };
      return procedures[this.selectingType];
    },
    selectingType: function selectingType() {
      var type = '';
      var urls = [{
        url: '/gia-loose-diamonds',
        type: 'diamonds'
      }, {
        url: '/engagement-rings',
        type: 'engagementRings'
      }, {
        url: '/diamond-ring-review',
        type: 'review'
      }];

      for (var i = 0; urls.length > i; i++) {
        if (window.location.pathname.includes(urls[i].url)) {
          type = urls[i].type;
        }
      }

      return type;
    },
    shortenName: function shortenName() {
      if (mutualVar.cookiesInfo.shoppingCart.items.length > 0) {
        return mutualVar.cookiesInfo.shoppingCart.items[mutualVar.cookiesInfo.shoppingCart.selectingIndex].pairItems;
      }
    },
    currentUrl: function currentUrl() {
      return window.location.pathname.slice(3);
    }
  },
  methods: {
    fetchCookies: function fetchCookies() {
      var data = window.mutualVar.cookiesInfo;
      data.shoppingCart = data.fetchCookies('shoppingCart', data.shoppingCart);
    },
    sendCookies: function sendCookies() {
      var data = window.mutualVar.cookiesInfo;
      data.shoppingCart = data.sendCookies('shoppingCart', data.shoppingCart);
    },
    directTo: function directTo(item) {
      var urlId = 0;
      console.log(item);

      if (Number.isInteger(item)) {
        urlId = mutualVar.cookiesInfo.shoppingCart.items[mutualVar.cookiesInfo.shoppingCart.selectingIndex].pairItems[item].url + mutualVar.cookiesInfo.shoppingCart.items[mutualVar.cookiesInfo.shoppingCart.selectingIndex].pairItems[item].id;
      } else {
        if (item == 'engagementRings') {
          urlId = '/engagement-rings';
        }

        if (item == 'diamonds') {
          urlId = '/gia-loose-diamonds';
        }

        urlId = '/' + this.locale + urlId;
      }

      window.open(urlId, '_self');
    },
    directToUrl: function directToUrl(url) {
      window.open(this.locale + url, '_self');
    },
    removeItem: function removeItem(item) {
      var pairItems = mutualVar.cookiesInfo.shoppingCart.items[mutualVar.cookiesInfo.shoppingCart.selectingIndex].pairItems;
      var url = pairItems[item].url;

      if (pairItems.length > 1) {
        pairItems.splice(2, 1);
      }

      pairItems.splice(item, 1);
      this.sendCookies();
      window.open(url, '_self');
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

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/video360Exchange.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/video360Exchange.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************************************************************************************************************************************/
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

/* eslint-disable */


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  name: "vide360Exchange",
  components: {
    videoPlayer: _components_videoPlayer_vue__WEBPACK_IMPORTED_MODULE_1__.default,
    ProductViewer: _components_productViewer360__WEBPACK_IMPORTED_MODULE_0__.default
  },
  props: ['src', 'img', 'vid360'],
  data: function data() {
    return {
      cdn: mutualVar.storage[mutualVar.storage.live],
      videoSelecting: 'video360',
      langs: langs
    };
  },
  mounted: function mounted() {// this.setVideo()
    // this.setVideo360()
  },
  computed: {
    video360: function video360() {
      var video360 = {
        src: this.vid360,
        type: "video360",
        thumb: this.cdn + 'public/images/' + this.img,
        size: 120,
        rotate: 1,
        fileName: ''
      };
      return video360;
    },
    videoOptions: function videoOptions() {
      var videoOptions = {
        // videojs options
        muted: true,
        language: 'en',
        playbackRates: [0.7, 1.0, 1.5, 2.0],
        sources: [{
          type: "video/mp4",
          src: this.cdn + 'public/videos/' + this.src
        }],
        poster: this.cdn + 'public/images/' + this.img,
        fluid: true,
        buttered: [0.00, 3.46],
        preload: "auto",
        readyState: 1,
        autoplay: false
      };
      return videoOptions;
    }
  },
  methods: {
    videoReload: function videoReload() {
      this.videoSelecting = 'video360';
    },
    video360Reload: function video360Reload() {
      this.videoSelecting = 'video';
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
    return {
      myVideo: 'myVideo' + Math.floor(Math.random() * 99999)
    };
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
      var myPlayer = videojs(this.myVideo, {
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
      videojs(this.myVideo).poster(this.options.poster);
      videojs(this.myVideo).src(this.options.sources[0].src);
      videojs(this.myVideo).autoplay(false);
    },
    hasLoaded: function hasLoaded() {
      // console.log(videojs.getPlayer(this.myVideo))
      return videojs.getPlayer(this.myVideo) != undefined;
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

/***/ "./resources/js/views/frontEnd/customerJewellery/show.js":
/*!***************************************************************!*\
  !*** ./resources/js/views/frontEnd/customerJewellery/show.js ***!
  \***************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _components_videoPlayer_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../components/videoPlayer.vue */ "./resources/js/components/videoPlayer.vue");
/* harmony import */ var _components_productViewer360_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../components/productViewer360.vue */ "./resources/js/components/productViewer360.vue");
/* harmony import */ var _components_video360Exchange_vue__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../components/video360Exchange.vue */ "./resources/js/components/video360Exchange.vue");
/* harmony import */ var _components_carousel_vue__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../components/carousel.vue */ "./resources/js/components/carousel.vue");
// import Auth from '../../store/auth'
// import { get, del } from '../../../helpers/api'
// import Flash from '../../helpers/flash'
// import {videoPlayer} from '../../../../../node_modules/vue-video-player/dist/vue-video-player'




/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  el: '#customerJewelleryShow',
  components: {
    videoPlayer: _components_videoPlayer_vue__WEBPACK_IMPORTED_MODULE_0__.default,
    ProductViewer: _components_productViewer360_vue__WEBPACK_IMPORTED_MODULE_1__.default,
    video360Exchange: _components_video360Exchange_vue__WEBPACK_IMPORTED_MODULE_2__.default,
    Carousel: _components_carousel_vue__WEBPACK_IMPORTED_MODULE_3__.default
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
      langs: langs,
      video360: '',
      videoOptions: {
        // videojs options
        muted: true,
        language: 'en',
        playbackRates: [0.7, 1.0, 1.5, 2.0],
        sources: [{
          type: "video/mp4",
          src: null
        }],
        poster: null,
        fluid: true,
        buttered: [0.00, 3.46],
        preload: "auto",
        readyState: 1,
        autoplay: false
      }
    };
  },
  watch: {
    '$route': 'fetchData',
    'videoJs.src': 'videoOptions'
  },
  beforeMount: function beforeMount() {
    this.fetchData();
  },
  methods: {
    fetchData: function fetchData() {
      var _this = this;

      get("/api/invoicePosts/".concat(window.location.pathname.slice(23)), window.location.pathname.slice(1, 3)).then(function (res) {
        _this.post = res.data.model;

        _this.setVideo360(); // this.ProceedVideoEng()
        // this.ProceedVideoWed()
        // this.ProceedVideoJew()
        // this.ProceedVideoPost()
        // this.setPublished()

      });
    },
    setVideo360: function setVideo360() {
      this.video360 = {
        src: this.post.video360,
        type: "video360",
        thumb: mutualVar.storage[mutualVar.storage.live] + 'public/video360/' + this.post.video360 + '/thm-0.jpg',
        size: 120,
        rotate: 1,
        fileName: '' // fileName: mutualVar.css.innerWidth<500 ? 'thm-' :'',

      };
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
/* harmony import */ var _components_imageCarousel_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../components/imageCarousel.vue */ "./resources/js/components/imageCarousel.vue");

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  el: '#customerJewelleryIndex',
  components: {
    ImageCarousel: _components_imageCarousel_vue__WEBPACK_IMPORTED_MODULE_0__.default
  },
  data: function data() {
    return {
      mutualVar: mutualVar,
      locale: mutualVar.langs.localeCode,
      query: {
        per_page: 10
      },
      langs: langs,
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

      get("/api/customerMoments?per_page=".concat(this.query.per_page), window.location.pathname.slice(1, 3)).then(function (res) {
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
// import Auth from '../../store/auth'
 // import xiaohungshu from '../../../components/xiaohungshu.vue'
// import Appointment from '../../../components/appointment.vue'

 // import Carousel from '../../../components/carousel.vue'

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
      langs: langs,
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
  computed: {// localeHref(){
    // 	return window.location.pathname.slice(0,4)
    // },
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
        } // mutualVar.viewer.src = this.diamond.video_link.includes('http')?this.diamond.video_link.replace('http','https'):this.diamond.video_link 

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
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  el: '#education',
  data: function data() {
    return {
      query: {
        per_page: 10
      },
      mutualVar: mutualVar,
      langs: langs,
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

      get("/api/invPosts?per_page=".concat(this.query.per_page), window.location.pathname.slice(1, 3)).then(function (res) {
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
      extraWorkingDates: _helpers_extraWorkingDates__WEBPACK_IMPORTED_MODULE_1__.extraWorkingDates,
      shoppingCart: window.mutualVar.cookiesInfo.shoppingCart
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
      return this.shoppingCart.items[this.shoppingCart.selectingIndex].pairItems;
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
      localStorage.setItem('shoppingCart', encodeURIComponent(JSON.stringify(cookies)), mutualVar.cookiesInfo.cookieLast);
    },
    getEngagementRing: function getEngagementRing() {
      var _this = this;

      var engagementRingId = this.shoppingCart.items[this.shoppingCart.selectingIndex].pairItems.filter(function (data) {
        return data.type == 'engagementRings';
      })[0].id;
      get("/api/engagementRings/".concat(engagementRingId)).then(function (res) {
        _this.carouselItem.upperitems = res.data.model; // this.filterNotPostable(res.data.posts.invoicePosts, engagementRingId)

        _this.carouselItem.items = res.data.posts.invoicePosts ? res.data.posts.invoicePosts : [];
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
        _this.customerItems = res.data.posts.invoicePosts ? res.data.posts.invoicePosts : []; // this.UpperWeddingRings()
        // this.filterNotPostable(res.data.posts.invoicePosts)
        // this.assignCarouselItem()
        // this.LowerWeddingRings()
      });
    } // UpperWeddingRings(){ 
    // 	var obj = {images: [],
    // 				video: null,
    // 				video360: null,
    // 		}
    // 	if (this.weddingRing.images) {
    // 	obj.images.push(this.weddingRing.images)
    // 	}
    // 	if (this.weddingRing.video) {
    // 		obj.video = []
    // 		obj.video.push(this.weddingRing.video)
    // 	}
    // 	console.log(this.weddingRing.video360)
    // 	if (this.weddingRing.video360) {
    // 		obj.video360 = []
    // 		obj.video360.push(this.weddingRing.video360)
    // 	}
    // 	return this.combinedUpperWeddingRings = obj
    // },
    // assignCarouselItem(){
    // 	this.carouselItem.active = this.carouselState
    // 	this.carouselItem.upperitems = this.weddingRing
    // 	this.carouselItem.items = this.customerItems.slice(0,1)
    // },
    // filterNotPostable(data){
    // 	var type = 'App/WeddingRing'
    // 	var id = this.weddingRing.id
    // 	var filteredData = []
    // 	// console.log(data)
    // 	for (var i = 0 ; data.length > i ; i++) {
    // 		if (data[i].postable_type == type && data[i].postable_id == id) {
    // 			console.log(data[i])
    // 			filteredData.push(data[i])
    // 		}
    // 	}
    // 	this.customerItems = filteredData
    // },
    // LowerWeddingRings(){ 
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

/***/ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-8[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-8[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/shoppingCart/progress.vue?vue&type=style&index=0&module=true&lang=css&":
/*!************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??clonedRuleSet-8[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-8[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/shoppingCart/progress.vue?vue&type=style&index=0&module=true&lang=css& ***!
  \************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__);
// Imports

var ___CSS_LOADER_EXPORT___ = _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default()(function(i){return i[1]});
// Module
___CSS_LOADER_EXPORT___.push([module.id, "\n._3FRAbMoBHKDyiRtykh0USZ {\n  width: 0; \n  height: 0; \n  border-top: 30px solid transparent ;\n  border-bottom: 30px solid transparent;\t  \n  border-left: 30px solid ;\n  border-left-color: #81cdf3;\n}\n\n", ""]);
// Exports
___CSS_LOADER_EXPORT___.locals = {
	"arrow": "_3FRAbMoBHKDyiRtykh0USZ"
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/carousel.vue?vue&type=style&index=0&lang=css&":
/*!***********************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/carousel.vue?vue&type=style&index=0&lang=css& ***!
  \***********************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
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
___CSS_LOADER_EXPORT___.push([module.id, "\n.st0{fill-rule:evenodd;clip-rule:evenodd;}", ""]);
// Exports
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (___CSS_LOADER_EXPORT___);


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
___CSS_LOADER_EXPORT___.push([module.id, "\n/*\tcanvas {\n\t  background-color:#fff;\n\t  margin:50px;\n\t},*/\n.productViewer {\n\t  height: auto;\n\t  width: 100%;\n}\n", ""]);
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
    }).join("");
  }; // import a list of modules into the list
  // eslint-disable-next-line func-names


  list.i = function (modules, mediaQuery, dedupe) {
    if (typeof modules === "string") {
      // eslint-disable-next-line no-param-reassign
      modules = [[null, modules, ""]];
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

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-8[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-8[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/shoppingCart/progress.vue?vue&type=style&index=0&module=true&lang=css&":
/*!****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-8[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-8[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/shoppingCart/progress.vue?vue&type=style&index=0&module=true&lang=css& ***!
  \****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_css_loader_dist_cjs_js_clonedRuleSet_8_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_8_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_progress_vue_vue_type_style_index_0_module_true_lang_css___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-8[0].rules[0].use[1]!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-8[0].rules[0].use[2]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./progress.vue?vue&type=style&index=0&module=true&lang=css& */ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-8[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-8[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/shoppingCart/progress.vue?vue&type=style&index=0&module=true&lang=css&");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_node_modules_css_loader_dist_cjs_js_clonedRuleSet_8_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_8_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_progress_vue_vue_type_style_index_0_module_true_lang_css___WEBPACK_IMPORTED_MODULE_1__.default, options);



/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_css_loader_dist_cjs_js_clonedRuleSet_8_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_8_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_progress_vue_vue_type_style_index_0_module_true_lang_css___WEBPACK_IMPORTED_MODULE_1__.default.locals || {});

/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/carousel.vue?vue&type=style&index=0&lang=css&":
/*!***************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/carousel.vue?vue&type=style&index=0&lang=css& ***!
  \***************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_carousel_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./carousel.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/carousel.vue?vue&type=style&index=0&lang=css&");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_carousel_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__.default, options);



/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_carousel_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_1__.default.locals || {});

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
/* harmony import */ var _carousel_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./carousel.vue?vue&type=style&index=0&lang=css& */ "./resources/js/components/carousel.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! !../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");



;


/* normalize component */

var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__.default)(
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

/***/ "./resources/js/components/shoppingCart/icon.vue":
/*!*******************************************************!*\
  !*** ./resources/js/components/shoppingCart/icon.vue ***!
  \*******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _icon_vue_vue_type_template_id_13c306c5___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./icon.vue?vue&type=template&id=13c306c5& */ "./resources/js/components/shoppingCart/icon.vue?vue&type=template&id=13c306c5&");
/* harmony import */ var _icon_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./icon.vue?vue&type=script&lang=js& */ "./resources/js/components/shoppingCart/icon.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _icon_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _icon_vue_vue_type_template_id_13c306c5___WEBPACK_IMPORTED_MODULE_0__.render,
  _icon_vue_vue_type_template_id_13c306c5___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/shoppingCart/icon.vue"
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

/***/ "./resources/js/components/shoppingCart/progress.vue":
/*!***********************************************************!*\
  !*** ./resources/js/components/shoppingCart/progress.vue ***!
  \***********************************************************/
/***/ ((module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _progress_vue_vue_type_template_id_65f94f0e___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./progress.vue?vue&type=template&id=65f94f0e& */ "./resources/js/components/shoppingCart/progress.vue?vue&type=template&id=65f94f0e&");
/* harmony import */ var _progress_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./progress.vue?vue&type=script&lang=js& */ "./resources/js/components/shoppingCart/progress.vue?vue&type=script&lang=js&");
/* harmony import */ var _progress_vue_vue_type_style_index_0_module_true_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./progress.vue?vue&type=style&index=0&module=true&lang=css& */ "./resources/js/components/shoppingCart/progress.vue?vue&type=style&index=0&module=true&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! !../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");
/* module decorator */ module = __webpack_require__.hmd(module);



;

var cssModules = {}
var disposed = false

function injectStyles (context) {
  if (disposed) return
  
        cssModules["$style"] = (_progress_vue_vue_type_style_index_0_module_true_lang_css___WEBPACK_IMPORTED_MODULE_2__.default.locals || _progress_vue_vue_type_style_index_0_module_true_lang_css___WEBPACK_IMPORTED_MODULE_2__.default)
        Object.defineProperty(this, "$style", {
          configurable: true,
          get: function () {
            return cssModules["$style"]
          }
        })
      
}


  module.hot && 0



        module.hot && 0

/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__.default)(
  _progress_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _progress_vue_vue_type_template_id_65f94f0e___WEBPACK_IMPORTED_MODULE_0__.render,
  _progress_vue_vue_type_template_id_65f94f0e___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  injectStyles,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/shoppingCart/progress.vue"
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

/***/ "./resources/js/components/video360Exchange.vue":
/*!******************************************************!*\
  !*** ./resources/js/components/video360Exchange.vue ***!
  \******************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _video360Exchange_vue_vue_type_template_id_621d67e0___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./video360Exchange.vue?vue&type=template&id=621d67e0& */ "./resources/js/components/video360Exchange.vue?vue&type=template&id=621d67e0&");
/* harmony import */ var _video360Exchange_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./video360Exchange.vue?vue&type=script&lang=js& */ "./resources/js/components/video360Exchange.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _video360Exchange_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _video360Exchange_vue_vue_type_template_id_621d67e0___WEBPACK_IMPORTED_MODULE_0__.render,
  _video360Exchange_vue_vue_type_template_id_621d67e0___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/video360Exchange.vue"
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

/***/ "./resources/js/components/shoppingCart/icon.vue?vue&type=script&lang=js&":
/*!********************************************************************************!*\
  !*** ./resources/js/components/shoppingCart/icon.vue?vue&type=script&lang=js& ***!
  \********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_icon_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./icon.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/shoppingCart/icon.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_icon_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

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

/***/ "./resources/js/components/shoppingCart/progress.vue?vue&type=script&lang=js&":
/*!************************************************************************************!*\
  !*** ./resources/js/components/shoppingCart/progress.vue?vue&type=script&lang=js& ***!
  \************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_progress_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./progress.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/shoppingCart/progress.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_progress_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

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

/***/ "./resources/js/components/video360Exchange.vue?vue&type=script&lang=js&":
/*!*******************************************************************************!*\
  !*** ./resources/js/components/video360Exchange.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_video360Exchange_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./video360Exchange.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/video360Exchange.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_video360Exchange_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

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

/***/ "./resources/js/components/shoppingCart/progress.vue?vue&type=style&index=0&module=true&lang=css&":
/*!********************************************************************************************************!*\
  !*** ./resources/js/components/shoppingCart/progress.vue?vue&type=style&index=0&module=true&lang=css& ***!
  \********************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_8_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_8_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_progress_vue_vue_type_style_index_0_module_true_lang_css___WEBPACK_IMPORTED_MODULE_0__.default)
/* harmony export */ });
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_8_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_8_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_progress_vue_vue_type_style_index_0_module_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader/dist/cjs.js!../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-8[0].rules[0].use[1]!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-8[0].rules[0].use[2]!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./progress.vue?vue&type=style&index=0&module=true&lang=css& */ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-8[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-8[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/shoppingCart/progress.vue?vue&type=style&index=0&module=true&lang=css&");
 

/***/ }),

/***/ "./resources/js/components/carousel.vue?vue&type=style&index=0&lang=css&":
/*!*******************************************************************************!*\
  !*** ./resources/js/components/carousel.vue?vue&type=style&index=0&lang=css& ***!
  \*******************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_carousel_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/style-loader/dist/cjs.js!../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./carousel.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/carousel.vue?vue&type=style&index=0&lang=css&");


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

/***/ "./resources/js/components/shoppingCart/icon.vue?vue&type=template&id=13c306c5&":
/*!**************************************************************************************!*\
  !*** ./resources/js/components/shoppingCart/icon.vue?vue&type=template&id=13c306c5& ***!
  \**************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_icon_vue_vue_type_template_id_13c306c5___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_icon_vue_vue_type_template_id_13c306c5___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_icon_vue_vue_type_template_id_13c306c5___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./icon.vue?vue&type=template&id=13c306c5& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/shoppingCart/icon.vue?vue&type=template&id=13c306c5&");


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

/***/ "./resources/js/components/shoppingCart/progress.vue?vue&type=template&id=65f94f0e&":
/*!******************************************************************************************!*\
  !*** ./resources/js/components/shoppingCart/progress.vue?vue&type=template&id=65f94f0e& ***!
  \******************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_progress_vue_vue_type_template_id_65f94f0e___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_progress_vue_vue_type_template_id_65f94f0e___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_progress_vue_vue_type_template_id_65f94f0e___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./progress.vue?vue&type=template&id=65f94f0e& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/shoppingCart/progress.vue?vue&type=template&id=65f94f0e&");


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

/***/ "./resources/js/components/video360Exchange.vue?vue&type=template&id=621d67e0&":
/*!*************************************************************************************!*\
  !*** ./resources/js/components/video360Exchange.vue?vue&type=template&id=621d67e0& ***!
  \*************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_video360Exchange_vue_vue_type_template_id_621d67e0___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_video360Exchange_vue_vue_type_template_id_621d67e0___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_video360Exchange_vue_vue_type_template_id_621d67e0___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./video360Exchange.vue?vue&type=template&id=621d67e0& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/video360Exchange.vue?vue&type=template&id=621d67e0&");


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
                      "\n                  " +
                        _vm._s(index + 1) +
                        "\n           "
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
                    "\n                      " +
                      _vm._s(index + 1) +
                      "\n               "
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
                  img.type == "video360"
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
                          _c(
                            "svg",
                            {
                              staticClass: "w-8 fill-current text-white ",
                              staticStyle: {
                                "enable-background": "new 0 0 122.88 65.79"
                              },
                              attrs: {
                                version: "1.1",
                                id: "Layer_1",
                                xmlns: "http://www.w3.org/2000/svg",
                                "xmlns:xlink": "http://www.w3.org/1999/xlink",
                                x: "0px",
                                y: "0px",
                                viewBox: "0 0 122.88 65.79",
                                "xml:space": "preserve"
                              }
                            },
                            [
                              _c("g", [
                                _c("path", {
                                  attrs: {
                                    d:
                                      "M13.37,31.32c-22.23,12.2,37.65,19.61,51.14,19.49v-7.44l11.21,11.2L64.51,65.79v-6.97 C37.4,59.85-26.41,42.4,11.97,27.92c0.36,1.13,0.8,2.2,1.3,3.2L13.37,31.32L13.37,31.32z M108.36,8.31c0-2.61,0.47-4.44,1.41-5.48 c0.94-1.04,2.37-1.56,4.3-1.56c0.92,0,1.69,0.12,2.28,0.34c0.59,0.23,1.08,0.52,1.45,0.89c0.38,0.36,0.67,0.75,0.89,1.15 c0.22,0.4,0.39,0.87,0.52,1.41c0.26,1.02,0.38,2.09,0.38,3.21c0,2.49-0.42,4.32-1.27,5.47c-0.84,1.15-2.29,1.73-4.36,1.73 c-1.15,0-2.09-0.19-2.8-0.55c-0.71-0.37-1.3-0.91-1.75-1.62c-0.33-0.51-0.59-1.2-0.77-2.07C108.45,10.34,108.36,9.38,108.36,8.31 L108.36,8.31z M26.47,10.49l-9-1.6c0.75-2.86,2.18-5.06,4.31-6.59C23.9,0.77,26.91,0,30.8,0c4.47,0,7.69,0.83,9.69,2.5 c1.99,1.67,2.98,3.77,2.98,6.29c0,1.48-0.41,2.82-1.21,4.01c-0.81,1.2-2.02,2.25-3.65,3.15c1.32,0.33,2.34,0.71,3.03,1.15 c1.14,0.7,2.02,1.63,2.65,2.77c0.63,1.15,0.95,2.51,0.95,4.1c0,2-0.52,3.91-1.56,5.75c-1.05,1.83-2.55,3.24-4.51,4.23 c-1.96,0.99-4.54,1.48-7.74,1.48c-3.11,0-5.57-0.37-7.36-1.1c-1.8-0.73-3.28-1.8-4.44-3.22c-1.16-1.41-2.05-3.19-2.67-5.33 l9.53-1.27c0.38,1.92,0.95,3.26,1.74,4.01c0.78,0.74,1.78,1.12,3,1.12c1.27,0,2.33-0.47,3.18-1.4c0.85-0.93,1.27-2.18,1.27-3.74 c0-1.59-0.41-2.82-1.22-3.69c-0.81-0.87-1.92-1.31-3.32-1.31c-0.74,0-1.77,0.18-3.07,0.56l0.49-6.81c0.52,0.08,0.93,0.12,1.22,0.12 c1.23,0,2.26-0.4,3.08-1.19c0.82-0.79,1.24-1.72,1.24-2.81c0-1.05-0.31-1.88-0.93-2.49c-0.62-0.62-1.48-0.93-2.55-0.93 c-1.12,0-2.02,0.34-2.72,1.01C27.19,7.62,26.72,8.8,26.47,10.49L26.47,10.49z M75.15,8.27l-9.48,1.16 c-0.25-1.32-0.66-2.24-1.24-2.78c-0.59-0.54-1.31-0.81-2.16-0.81c-1.54,0-2.74,0.77-3.59,2.33c-0.62,1.13-1.09,3.52-1.38,7.19 c1.14-1.16,2.31-2.01,3.5-2.56c1.2-0.55,2.59-0.83,4.16-0.83c3.06,0,5.64,1.09,7.75,3.27c2.11,2.19,3.17,4.96,3.17,8.31 c0,2.26-0.53,4.32-1.6,6.2c-1.07,1.87-2.55,3.29-4.44,4.25c-1.9,0.96-4.27,1.44-7.13,1.44c-3.43,0-6.18-0.58-8.25-1.76 c-2.07-1.17-3.73-3.03-4.97-5.59c-1.24-2.56-1.86-5.95-1.86-10.18c0-6.18,1.3-10.71,3.91-13.59C54.13,1.44,57.74,0,62.36,0 c2.73,0,4.88,0.31,6.46,0.94c1.58,0.63,2.9,1.56,3.94,2.76C73.81,4.92,74.61,6.44,75.15,8.27L75.15,8.27z M57.62,23.55 c0,1.86,0.47,3.31,1.4,4.36c0.94,1.05,2.08,1.58,3.44,1.58c1.25,0,2.3-0.48,3.14-1.43c0.84-0.95,1.26-2.37,1.26-4.26 c0-1.93-0.44-3.41-1.31-4.42c-0.88-1.01-1.96-1.52-3.26-1.52c-1.32,0-2.44,0.49-3.34,1.48C58.06,20.32,57.62,21.72,57.62,23.55 L57.62,23.55z M77.91,17.57c0-6.51,1.17-11.07,3.52-13.67C83.77,1.3,87.35,0,92.14,0c2.31,0,4.2,0.29,5.68,0.85 c1.48,0.57,2.69,1.31,3.62,2.22c0.94,0.91,1.68,1.87,2.21,2.87c0.54,1.01,0.97,2.18,1.3,3.52c0.64,2.55,0.96,5.22,0.96,8 c0,6.22-1.05,10.76-3.16,13.64c-2.1,2.88-5.72,4.32-10.87,4.32c-2.88,0-5.21-0.46-6.99-1.38c-1.78-0.92-3.23-2.27-4.37-4.05 c-0.82-1.26-1.47-2.98-1.93-5.17C78.14,22.64,77.91,20.22,77.91,17.57L77.91,17.57z M87.34,17.59c0,4.36,0.38,7.34,1.16,8.94 c0.77,1.6,1.89,2.39,3.36,2.39c0.97,0,1.8-0.34,2.51-1.01c0.71-0.68,1.23-1.76,1.56-3.22c0.34-1.47,0.5-3.75,0.5-6.85 c0-4.55-0.38-7.6-1.16-9.18c-0.77-1.56-1.93-2.35-3.47-2.35c-1.58,0-2.71,0.8-3.42,2.39C87.69,10.31,87.34,13.27,87.34,17.59 L87.34,17.59z M112.14,8.32c0,1.75,0.15,2.94,0.46,3.58c0.31,0.64,0.76,0.96,1.35,0.96c0.39,0,0.72-0.13,1.01-0.41 c0.28-0.27,0.49-0.7,0.63-1.29c0.13-0.59,0.2-1.5,0.2-2.74c0-1.82-0.15-3.05-0.46-3.68c-0.31-0.63-0.77-0.94-1.39-0.94 c-0.63,0-1.09,0.32-1.37,0.96C112.28,5.4,112.14,6.59,112.14,8.32L112.14,8.32z M109.3,30.23c10.56,5.37,8.04,12.99-10.66,17.62 c-5.3,1.31-11.29,2.5-17.86,2.99v6.05c7.31-0.51,14.11-2.19,20.06-3.63c28.12-6.81,27.14-18.97,9.36-25.83 C109.95,28.42,109.65,29.35,109.3,30.23L109.3,30.23z"
                                  }
                                })
                              ])
                            ]
                          )
                        ]
                      )
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
                    on: {
                      click: function($event) {
                        return _vm.selectingItem(+1)
                      }
                    }
                  })
                : _vm._e(),
              _vm._v(" "),
              _vm.currentItem.type == "video"
                ? _c("video-player", {
                    attrs: { options: _vm.videoOptions, autoplay: "false" }
                  })
                : _vm._e(),
              _vm._v(" "),
              _vm.currentItem.video360
                ? _c("video-360-exchange", {
                    attrs: {
                      src: _vm.currentItem.src,
                      img: _vm.currentItem.thumb,
                      vid360: _vm.currentItem.video360
                    }
                  })
                : _vm._e(),
              _vm._v(" "),
              _vm.chunkedItems[_vm.currentIndex]
                ? _c(
                    "a",
                    {
                      attrs: {
                        href:
                          "/" +
                          _vm.mutualVar.langs.locale +
                          "/customer-jewellery/" +
                          _vm.chunkedItems[_vm.currentIndex].postId,
                        target: "_blank"
                      }
                    },
                    [
                      _vm.chunkedItems.length && !_vm.showUpper
                        ? _c(
                            "p",
                            {
                              staticClass:
                                "bg-blue-300 hover:bg-blue-400 text-white text-center p-4"
                            },
                            [
                              _vm._v(
                                _vm._s(_vm.chunkedItems[_vm.currentIndex].text)
                              )
                            ]
                          )
                        : _vm._e(),
                      _vm._v(" "),
                      _c(
                        "p",
                        {
                          staticClass:
                            "text-xl font-light bg-blue-400 text-white"
                        },
                        [_vm._v(_vm._s(_vm.currentItem.title))]
                      ),
                      _vm._v(" "),
                      _c(
                        "p",
                        {
                          staticClass:
                            "text-lg font-light bg-blue-400 text-white"
                        },
                        [_vm._v(" " + _vm._s(_vm.currentItem.desc) + " ")]
                      )
                    ]
                  )
                : _vm._e(),
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
            _c("a", [_vm._v(_vm._s(_vm._f("transJs")("Customer Jewelleries")))])
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
                    : _vm._e(),
                  _vm._v(" "),
                  img.type == "video360"
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
                          _c(
                            "svg",
                            {
                              staticClass: "w-8 fill-current text-white ",
                              staticStyle: {
                                "enable-background": "new 0 0 122.88 65.79"
                              },
                              attrs: {
                                version: "1.1",
                                id: "Layer_1",
                                xmlns: "http://www.w3.org/2000/svg",
                                "xmlns:xlink": "http://www.w3.org/1999/xlink",
                                x: "0px",
                                y: "0px",
                                viewBox: "0 0 122.88 65.79",
                                "xml:space": "preserve"
                              }
                            },
                            [
                              _c("g", [
                                _c("path", {
                                  attrs: {
                                    d:
                                      "M13.37,31.32c-22.23,12.2,37.65,19.61,51.14,19.49v-7.44l11.21,11.2L64.51,65.79v-6.97 C37.4,59.85-26.41,42.4,11.97,27.92c0.36,1.13,0.8,2.2,1.3,3.2L13.37,31.32L13.37,31.32z M108.36,8.31c0-2.61,0.47-4.44,1.41-5.48 c0.94-1.04,2.37-1.56,4.3-1.56c0.92,0,1.69,0.12,2.28,0.34c0.59,0.23,1.08,0.52,1.45,0.89c0.38,0.36,0.67,0.75,0.89,1.15 c0.22,0.4,0.39,0.87,0.52,1.41c0.26,1.02,0.38,2.09,0.38,3.21c0,2.49-0.42,4.32-1.27,5.47c-0.84,1.15-2.29,1.73-4.36,1.73 c-1.15,0-2.09-0.19-2.8-0.55c-0.71-0.37-1.3-0.91-1.75-1.62c-0.33-0.51-0.59-1.2-0.77-2.07C108.45,10.34,108.36,9.38,108.36,8.31 L108.36,8.31z M26.47,10.49l-9-1.6c0.75-2.86,2.18-5.06,4.31-6.59C23.9,0.77,26.91,0,30.8,0c4.47,0,7.69,0.83,9.69,2.5 c1.99,1.67,2.98,3.77,2.98,6.29c0,1.48-0.41,2.82-1.21,4.01c-0.81,1.2-2.02,2.25-3.65,3.15c1.32,0.33,2.34,0.71,3.03,1.15 c1.14,0.7,2.02,1.63,2.65,2.77c0.63,1.15,0.95,2.51,0.95,4.1c0,2-0.52,3.91-1.56,5.75c-1.05,1.83-2.55,3.24-4.51,4.23 c-1.96,0.99-4.54,1.48-7.74,1.48c-3.11,0-5.57-0.37-7.36-1.1c-1.8-0.73-3.28-1.8-4.44-3.22c-1.16-1.41-2.05-3.19-2.67-5.33 l9.53-1.27c0.38,1.92,0.95,3.26,1.74,4.01c0.78,0.74,1.78,1.12,3,1.12c1.27,0,2.33-0.47,3.18-1.4c0.85-0.93,1.27-2.18,1.27-3.74 c0-1.59-0.41-2.82-1.22-3.69c-0.81-0.87-1.92-1.31-3.32-1.31c-0.74,0-1.77,0.18-3.07,0.56l0.49-6.81c0.52,0.08,0.93,0.12,1.22,0.12 c1.23,0,2.26-0.4,3.08-1.19c0.82-0.79,1.24-1.72,1.24-2.81c0-1.05-0.31-1.88-0.93-2.49c-0.62-0.62-1.48-0.93-2.55-0.93 c-1.12,0-2.02,0.34-2.72,1.01C27.19,7.62,26.72,8.8,26.47,10.49L26.47,10.49z M75.15,8.27l-9.48,1.16 c-0.25-1.32-0.66-2.24-1.24-2.78c-0.59-0.54-1.31-0.81-2.16-0.81c-1.54,0-2.74,0.77-3.59,2.33c-0.62,1.13-1.09,3.52-1.38,7.19 c1.14-1.16,2.31-2.01,3.5-2.56c1.2-0.55,2.59-0.83,4.16-0.83c3.06,0,5.64,1.09,7.75,3.27c2.11,2.19,3.17,4.96,3.17,8.31 c0,2.26-0.53,4.32-1.6,6.2c-1.07,1.87-2.55,3.29-4.44,4.25c-1.9,0.96-4.27,1.44-7.13,1.44c-3.43,0-6.18-0.58-8.25-1.76 c-2.07-1.17-3.73-3.03-4.97-5.59c-1.24-2.56-1.86-5.95-1.86-10.18c0-6.18,1.3-10.71,3.91-13.59C54.13,1.44,57.74,0,62.36,0 c2.73,0,4.88,0.31,6.46,0.94c1.58,0.63,2.9,1.56,3.94,2.76C73.81,4.92,74.61,6.44,75.15,8.27L75.15,8.27z M57.62,23.55 c0,1.86,0.47,3.31,1.4,4.36c0.94,1.05,2.08,1.58,3.44,1.58c1.25,0,2.3-0.48,3.14-1.43c0.84-0.95,1.26-2.37,1.26-4.26 c0-1.93-0.44-3.41-1.31-4.42c-0.88-1.01-1.96-1.52-3.26-1.52c-1.32,0-2.44,0.49-3.34,1.48C58.06,20.32,57.62,21.72,57.62,23.55 L57.62,23.55z M77.91,17.57c0-6.51,1.17-11.07,3.52-13.67C83.77,1.3,87.35,0,92.14,0c2.31,0,4.2,0.29,5.68,0.85 c1.48,0.57,2.69,1.31,3.62,2.22c0.94,0.91,1.68,1.87,2.21,2.87c0.54,1.01,0.97,2.18,1.3,3.52c0.64,2.55,0.96,5.22,0.96,8 c0,6.22-1.05,10.76-3.16,13.64c-2.1,2.88-5.72,4.32-10.87,4.32c-2.88,0-5.21-0.46-6.99-1.38c-1.78-0.92-3.23-2.27-4.37-4.05 c-0.82-1.26-1.47-2.98-1.93-5.17C78.14,22.64,77.91,20.22,77.91,17.57L77.91,17.57z M87.34,17.59c0,4.36,0.38,7.34,1.16,8.94 c0.77,1.6,1.89,2.39,3.36,2.39c0.97,0,1.8-0.34,2.51-1.01c0.71-0.68,1.23-1.76,1.56-3.22c0.34-1.47,0.5-3.75,0.5-6.85 c0-4.55-0.38-7.6-1.16-9.18c-0.77-1.56-1.93-2.35-3.47-2.35c-1.58,0-2.71,0.8-3.42,2.39C87.69,10.31,87.34,13.27,87.34,17.59 L87.34,17.59z M112.14,8.32c0,1.75,0.15,2.94,0.46,3.58c0.31,0.64,0.76,0.96,1.35,0.96c0.39,0,0.72-0.13,1.01-0.41 c0.28-0.27,0.49-0.7,0.63-1.29c0.13-0.59,0.2-1.5,0.2-2.74c0-1.82-0.15-3.05-0.46-3.68c-0.31-0.63-0.77-0.94-1.39-0.94 c-0.63,0-1.09,0.32-1.37,0.96C112.28,5.4,112.14,6.59,112.14,8.32L112.14,8.32z M109.3,30.23c10.56,5.37,8.04,12.99-10.66,17.62 c-5.3,1.31-11.29,2.5-17.86,2.99v6.05c7.31-0.51,14.11-2.19,20.06-3.63c28.12-6.81,27.14-18.97,9.36-25.83 C109.95,28.42,109.65,29.35,109.3,30.23L109.3,30.23z"
                                  }
                                })
                              ])
                            ]
                          )
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
  return _c("div", { staticClass: "grid grid-cols-12 " }, [
    _c("div", { staticClass: "col-span-12" }, [
      _c(
        "div",
        {
          staticClass: "bg-black relative",
          on: {
            click: function($event) {
              return _vm.pauseOrStart()
            }
          }
        },
        [
          _c("canvas", {
            staticClass: "flex productViewer",
            attrs: { id: _vm.id, width: _vm.width, height: _vm.height },
            on: {
              mousedown: _vm.startDrag,
              touchstart: _vm.startDrag,
              mousemove: _vm.onDrag,
              touchmove: _vm.onDrag,
              mouseup: _vm.stopDrag,
              touchend: _vm.stopDrag,
              mouseleave: _vm.stopDrag
            }
          }),
          _vm._v(" "),
          _vm.init
            ? _c(
                "div",
                {
                  staticClass:
                    "absolute left-1/2 top-1/2 border border-white border-2 bg-black p-1 px-4 rounded-lg hover:bg-gray-700 opacity-50"
                },
                [
                  _c(
                    "svg",
                    {
                      staticClass: "w-12 fill-current text-white ",
                      staticStyle: {
                        "enable-background": "new 0 0 122.88 65.79"
                      },
                      attrs: {
                        version: "1.1",
                        id: "Layer_1",
                        xmlns: "http://www.w3.org/2000/svg",
                        "xmlns:xlink": "http://www.w3.org/1999/xlink",
                        x: "0px",
                        y: "0px",
                        viewBox: "0 0 122.88 65.79",
                        "xml:space": "preserve"
                      }
                    },
                    [
                      _c("g", [
                        _c("path", {
                          attrs: {
                            d:
                              "M13.37,31.32c-22.23,12.2,37.65,19.61,51.14,19.49v-7.44l11.21,11.2L64.51,65.79v-6.97 C37.4,59.85-26.41,42.4,11.97,27.92c0.36,1.13,0.8,2.2,1.3,3.2L13.37,31.32L13.37,31.32z M108.36,8.31c0-2.61,0.47-4.44,1.41-5.48 c0.94-1.04,2.37-1.56,4.3-1.56c0.92,0,1.69,0.12,2.28,0.34c0.59,0.23,1.08,0.52,1.45,0.89c0.38,0.36,0.67,0.75,0.89,1.15 c0.22,0.4,0.39,0.87,0.52,1.41c0.26,1.02,0.38,2.09,0.38,3.21c0,2.49-0.42,4.32-1.27,5.47c-0.84,1.15-2.29,1.73-4.36,1.73 c-1.15,0-2.09-0.19-2.8-0.55c-0.71-0.37-1.3-0.91-1.75-1.62c-0.33-0.51-0.59-1.2-0.77-2.07C108.45,10.34,108.36,9.38,108.36,8.31 L108.36,8.31z M26.47,10.49l-9-1.6c0.75-2.86,2.18-5.06,4.31-6.59C23.9,0.77,26.91,0,30.8,0c4.47,0,7.69,0.83,9.69,2.5 c1.99,1.67,2.98,3.77,2.98,6.29c0,1.48-0.41,2.82-1.21,4.01c-0.81,1.2-2.02,2.25-3.65,3.15c1.32,0.33,2.34,0.71,3.03,1.15 c1.14,0.7,2.02,1.63,2.65,2.77c0.63,1.15,0.95,2.51,0.95,4.1c0,2-0.52,3.91-1.56,5.75c-1.05,1.83-2.55,3.24-4.51,4.23 c-1.96,0.99-4.54,1.48-7.74,1.48c-3.11,0-5.57-0.37-7.36-1.1c-1.8-0.73-3.28-1.8-4.44-3.22c-1.16-1.41-2.05-3.19-2.67-5.33 l9.53-1.27c0.38,1.92,0.95,3.26,1.74,4.01c0.78,0.74,1.78,1.12,3,1.12c1.27,0,2.33-0.47,3.18-1.4c0.85-0.93,1.27-2.18,1.27-3.74 c0-1.59-0.41-2.82-1.22-3.69c-0.81-0.87-1.92-1.31-3.32-1.31c-0.74,0-1.77,0.18-3.07,0.56l0.49-6.81c0.52,0.08,0.93,0.12,1.22,0.12 c1.23,0,2.26-0.4,3.08-1.19c0.82-0.79,1.24-1.72,1.24-2.81c0-1.05-0.31-1.88-0.93-2.49c-0.62-0.62-1.48-0.93-2.55-0.93 c-1.12,0-2.02,0.34-2.72,1.01C27.19,7.62,26.72,8.8,26.47,10.49L26.47,10.49z M75.15,8.27l-9.48,1.16 c-0.25-1.32-0.66-2.24-1.24-2.78c-0.59-0.54-1.31-0.81-2.16-0.81c-1.54,0-2.74,0.77-3.59,2.33c-0.62,1.13-1.09,3.52-1.38,7.19 c1.14-1.16,2.31-2.01,3.5-2.56c1.2-0.55,2.59-0.83,4.16-0.83c3.06,0,5.64,1.09,7.75,3.27c2.11,2.19,3.17,4.96,3.17,8.31 c0,2.26-0.53,4.32-1.6,6.2c-1.07,1.87-2.55,3.29-4.44,4.25c-1.9,0.96-4.27,1.44-7.13,1.44c-3.43,0-6.18-0.58-8.25-1.76 c-2.07-1.17-3.73-3.03-4.97-5.59c-1.24-2.56-1.86-5.95-1.86-10.18c0-6.18,1.3-10.71,3.91-13.59C54.13,1.44,57.74,0,62.36,0 c2.73,0,4.88,0.31,6.46,0.94c1.58,0.63,2.9,1.56,3.94,2.76C73.81,4.92,74.61,6.44,75.15,8.27L75.15,8.27z M57.62,23.55 c0,1.86,0.47,3.31,1.4,4.36c0.94,1.05,2.08,1.58,3.44,1.58c1.25,0,2.3-0.48,3.14-1.43c0.84-0.95,1.26-2.37,1.26-4.26 c0-1.93-0.44-3.41-1.31-4.42c-0.88-1.01-1.96-1.52-3.26-1.52c-1.32,0-2.44,0.49-3.34,1.48C58.06,20.32,57.62,21.72,57.62,23.55 L57.62,23.55z M77.91,17.57c0-6.51,1.17-11.07,3.52-13.67C83.77,1.3,87.35,0,92.14,0c2.31,0,4.2,0.29,5.68,0.85 c1.48,0.57,2.69,1.31,3.62,2.22c0.94,0.91,1.68,1.87,2.21,2.87c0.54,1.01,0.97,2.18,1.3,3.52c0.64,2.55,0.96,5.22,0.96,8 c0,6.22-1.05,10.76-3.16,13.64c-2.1,2.88-5.72,4.32-10.87,4.32c-2.88,0-5.21-0.46-6.99-1.38c-1.78-0.92-3.23-2.27-4.37-4.05 c-0.82-1.26-1.47-2.98-1.93-5.17C78.14,22.64,77.91,20.22,77.91,17.57L77.91,17.57z M87.34,17.59c0,4.36,0.38,7.34,1.16,8.94 c0.77,1.6,1.89,2.39,3.36,2.39c0.97,0,1.8-0.34,2.51-1.01c0.71-0.68,1.23-1.76,1.56-3.22c0.34-1.47,0.5-3.75,0.5-6.85 c0-4.55-0.38-7.6-1.16-9.18c-0.77-1.56-1.93-2.35-3.47-2.35c-1.58,0-2.71,0.8-3.42,2.39C87.69,10.31,87.34,13.27,87.34,17.59 L87.34,17.59z M112.14,8.32c0,1.75,0.15,2.94,0.46,3.58c0.31,0.64,0.76,0.96,1.35,0.96c0.39,0,0.72-0.13,1.01-0.41 c0.28-0.27,0.49-0.7,0.63-1.29c0.13-0.59,0.2-1.5,0.2-2.74c0-1.82-0.15-3.05-0.46-3.68c-0.31-0.63-0.77-0.94-1.39-0.94 c-0.63,0-1.09,0.32-1.37,0.96C112.28,5.4,112.14,6.59,112.14,8.32L112.14,8.32z M109.3,30.23c10.56,5.37,8.04,12.99-10.66,17.62 c-5.3,1.31-11.29,2.5-17.86,2.99v6.05c7.31-0.51,14.11-2.19,20.06-3.63c28.12-6.81,27.14-18.97,9.36-25.83 C109.95,28.42,109.65,29.35,109.3,30.23L109.3,30.23z"
                          }
                        })
                      ])
                    ]
                  )
                ]
              )
            : _vm._e()
        ]
      ),
      _vm._v(" "),
      _c("div", { staticClass: "flex justify-center bg-gray-300 opacity-50" }, [
        _c(
          "div",
          {
            staticClass:
              "border border-white border-2 bg-black p-1 px-4 rounded-lg opacity-50 hover:bg-gray-700",
            on: {
              click: function($event) {
                return _vm.viewerProgress(1)
              }
            }
          },
          [
            _c("i", {
              staticClass:
                "hidden sm:block fa fa-chevron-left text-white fa-2x",
              attrs: { "aria-hidden": "true" }
            }),
            _vm._v(" "),
            _c("i", {
              staticClass: "sm:hidden fa fa-chevron-left text-white ",
              attrs: { "aria-hidden": "true" }
            })
          ]
        ),
        _vm._v(" "),
        _c(
          "div",
          {
            staticClass:
              "border border-white border-2 bg-black p-1 px-4 rounded-lg opacity-50 hover:bg-gray-700",
            on: {
              click: function($event) {
                return _vm.pauseOrStart()
              }
            }
          },
          [
            _c("i", {
              staticClass: "hidden sm:block fa fa-play text-white fa-2x",
              attrs: { "aria-hidden": "true" }
            }),
            _vm._v(" "),
            _c("i", {
              staticClass: "sm:hidden fa fa-play text-white ",
              attrs: { "aria-hidden": "true" }
            })
          ]
        ),
        _vm._v(" "),
        _c(
          "div",
          {
            staticClass:
              "border border-white border-2 bg-black p-1 px-4 rounded-lg opacity-50 hover:bg-gray-700",
            on: {
              click: function($event) {
                return _vm.viewerProgress(-1)
              }
            }
          },
          [
            _c("i", {
              staticClass:
                "hidden sm:block fa fa-chevron-right text-white fa-2x",
              attrs: { "aria-hidden": "true" }
            }),
            _vm._v(" "),
            _c("i", {
              staticClass: "sm:hidden fa fa-chevron-right text-white ",
              attrs: { "aria-hidden": "true" }
            })
          ]
        )
      ]),
      _vm._v(" "),
      _c("canvas", {
        staticClass: "flex",
        attrs: { id: "loadingImg", width: "0", height: "0" }
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
        [_vm._v(_vm._s(_vm._f("transJs")("Select this Item")))]
      ),
      _vm._v(" "),
      _vm.shoppingCart.haveShoppingCart
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
              _vm.shoppingCart.modalActive
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
                                                                  )(option.text)
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
                                                      .text
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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/shoppingCart/icon.vue?vue&type=template&id=13c306c5&":
/*!*****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/shoppingCart/icon.vue?vue&type=template&id=13c306c5& ***!
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
  return _vm.mutualVar.cookiesInfo.shoppingCart.items.length != 0
    ? _c("sup", [
        _vm._v(
          " " +
            _vm._s(_vm.mutualVar.cookiesInfo.shoppingCart.items.length) +
            "\n    "
        )
      ])
    : _vm._e()
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
                                    _vm._f("transJs")(item.pairItems[0].type)
                                  ) + " "
                                )
                              ]),
                              item.pairItems[1]
                                ? _c("strong", [
                                    _vm._v(
                                      " + " +
                                        _vm._s(
                                          _vm._f("transJs")(
                                            item.pairItems[1].type
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
                                    staticClass: "btn",
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
                                      _vm._s(_vm._f("transJs")("Back to")) +
                                        _vm._s(
                                          _vm._f("transJs")(
                                            item.pairItems[0].type
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
                                staticClass: "btn",
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
                                  _vm._s(_vm._f("transJs")("Remove")) + "  "
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
                                                                )("Ring Size")
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
                                                  )("Engrave")
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
                                                _vm._f("transJs")("change")
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
                _vm._v(_vm._s(_vm._f("transJs")("Precautions")) + "：")
              ]),
              _vm._v(" "),
              _c("small", [
                _c("p", [
                  _vm._v(
                    _vm._s(
                      _vm._f("transJs")(
                        "All amounts of the company are subject to Hong Kong dollar settlement"
                      )
                    )
                  )
                ]),
                _vm._v(" "),
                _c("p", [
                  _vm._v(
                    _vm._s(
                      _vm._f("transJs")(
                        "The customer is required to pay the full amount and withdraw the goods within two months after the order is placed, otherwise the company reserves the right to terminate the transaction."
                      )
                    )
                  )
                ]),
                _vm._v(" "),
                _c("p", [
                  _vm._v(
                    _vm._s(
                      _vm._f("transJs")(
                        "In order to protect the interests of both parties, unless the diamond does not match the GIA report, the order will not be returned after confirmation."
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
                            "Today Order, Diamond Gets Free shipment"
                          )
                        ) + "\n                            "
                      ),
                      _c("strong", [
                        _vm._v(_vm._s(_vm._f("transJs")("On")) + " "),
                        _c("a", { staticClass: "text-blue-600" }, [
                          _vm._v(
                            " " +
                              _vm._s(
                                _vm._f("transJs")(
                                  _vm.extraWorkingDates(
                                    _vm.maxDeliveryDate,
                                    "months"
                                  )
                                )
                              ) +
                              " " +
                              _vm._s(
                                _vm.extraWorkingDates(_vm.maxDeliveryDate)
                              ) +
                              " " +
                              _vm._s(_vm._f("transJs")("day")) +
                              ",  " +
                              _vm._s(
                                _vm._f("transJs")(
                                  _vm.extraWorkingDates(
                                    _vm.maxDeliveryDate,
                                    "dates"
                                  )
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
                    [_vm._v(_vm._s(_vm._f("transJs")("Apply Coupon")))]
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
                    placeholder: _vm._f("transJs")("Enter Coupon Code"),
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
                        _vm._v(_vm._s(_vm._f("transJs")("not valid")))
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
                    _c("p", [_vm._v(_vm._s(_vm._f("transJs")("Total")) + " ")]),
                    _vm._v(" "),
                    _c("p", { staticClass: "text-red-500" }, [
                      _vm._v(_vm._s(_vm._f("transJs")("Disounted Total")))
                    ])
                  ])
                : _c("div", [
                    _c("p", [_vm._v(_vm._s(_vm._f("transJs")("Total")) + " ")])
                  ]),
              _vm._v(" "),
              _c("p", { staticClass: "text-lg text-gray-600" }, [
                _vm._v(_vm._s(_vm._f("transJs")("Deposit (20%)")))
              ]),
              _vm._v(" "),
              _c("div", {}, [
                _c("p", { staticClass: "text-lg text-blue-600" }, [
                  _vm._v(
                    _vm._s(_vm._f("transJs")("Balance (80%)")) +
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
                          " " + _vm._s(_vm._f("transJs")(paymentOption.name))
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
                        "you only need to pay deposit, balance will pay after 100% satisfied"
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
                            _vm._v(_vm._s(_vm._f("transJs")("checkout")))
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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/shoppingCart/progress.vue?vue&type=template&id=65f94f0e&":
/*!*********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/shoppingCart/progress.vue?vue&type=template&id=65f94f0e& ***!
  \*********************************************************************************************************************************************************************************************************************************/
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
  return _vm.selectingType == "diamonds" ||
    _vm.selectingType == "engagementRings" ||
    _vm.selectingType == "review"
    ? _c("div", [
        _vm.mutualVar.cookiesInfo.shoppingCart.items.length
          ? _c("div", [
              _vm.shortenName[0]
                ? _c(
                    "div",
                    { staticClass: "flex flex-col space-y-7 md:mb-16" },
                    [
                      _c(
                        "div",
                        {
                          staticClass:
                            "flex md:items-center justify-between lg:justify-around px-5 md:px-0 font-suranna"
                        },
                        [
                          _c(
                            "div",
                            {
                              staticClass:
                                "flex flex-col md:flex-row items-center space-y-2 md:space-y-0 md:space-x-10"
                            },
                            [
                              _c(
                                "div",
                                { staticClass: "relative shopping-bar-box" },
                                [
                                  _c("img", {
                                    attrs: {
                                      src: _vm.shortenName[0].image,
                                      alt: ""
                                    },
                                    on: {
                                      click: function($event) {
                                        return _vm.directTo(0)
                                      }
                                    }
                                  }),
                                  _vm._v(" "),
                                  _c(
                                    "button",
                                    { staticClass: "absolute top-1 left-1" },
                                    [
                                      _c(
                                        "svg",
                                        {
                                          attrs: {
                                            width: "20",
                                            height: "20",
                                            viewBox: "0 0 20 20",
                                            fill: "none",
                                            xmlns: "http://www.w3.org/2000/svg"
                                          },
                                          on: {
                                            click: function($event) {
                                              return _vm.removeItem(0)
                                            }
                                          }
                                        },
                                        [
                                          _c(
                                            "g",
                                            {
                                              attrs: {
                                                "clip-path": "url(#clip0)"
                                              }
                                            },
                                            [
                                              _c("path", {
                                                attrs: {
                                                  d:
                                                    "M4.1074 15.8926C0.854709 12.6399 0.854709 7.36013 4.1074 4.10744C7.36009 0.854752 12.6398 0.854752 15.8925 4.10744C19.1452 7.36014 19.1452 12.6399 15.8925 15.8926C12.6398 19.1452 7.36009 19.1452 4.1074 15.8926Z",
                                                  fill: "#666666"
                                                }
                                              }),
                                              _vm._v(" "),
                                              _c("path", {
                                                attrs: {
                                                  d:
                                                    "M13.5355 7.64298L11.1785 10L13.5355 12.357L12.357 13.5355L9.99998 11.1785L7.64296 13.5355L6.46444 12.357L8.82147 10L6.46444 7.64298L7.64296 6.46447L9.99998 8.82149L12.357 6.46447L13.5355 7.64298Z",
                                                  fill: "white"
                                                }
                                              })
                                            ]
                                          ),
                                          _vm._v(" "),
                                          _c("defs", [
                                            _c(
                                              "clipPath",
                                              { attrs: { id: "clip0" } },
                                              [
                                                _c("rect", {
                                                  attrs: {
                                                    width: "20",
                                                    height: "20",
                                                    fill: "white"
                                                  }
                                                })
                                              ]
                                            )
                                          ])
                                        ]
                                      )
                                    ]
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c(
                                "span",
                                {
                                  staticClass:
                                    "md:text-xl font-suranna text-center md:text-left"
                                },
                                [
                                  _vm._v(
                                    _vm._s(
                                      _vm._f("transJs")(
                                        _vm.shortenName[0].type ==
                                          "engagementRings"
                                          ? "Select Setting"
                                          : "Select Diamond"
                                      )
                                    ) + " \n\t\t                    "
                                  ),
                                  _c(
                                    "a",
                                    {
                                      staticClass:
                                        "block md:inline md:ml-3 text-brown underline",
                                      attrs: { href: "#" },
                                      on: {
                                        click: function($event) {
                                          return _vm.directTo(0)
                                        }
                                      }
                                    },
                                    [_vm._v(_vm._s(_vm._f("transJs")("View")))]
                                  )
                                ]
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass:
                                "flex flex-col md:flex-row items-center space-y-2 md:space-y-0 md:space-x-10"
                            },
                            [
                              !_vm.shortenName[1] &&
                              _vm.shortenName[0].type == "engagementRings"
                                ? _c(
                                    "div",
                                    { staticClass: "shopping-bar-box" },
                                    [
                                      _c(
                                        "svg",
                                        {
                                          attrs: {
                                            width: "42",
                                            height: "36",
                                            viewBox: "0 0 42 36",
                                            fill: "none",
                                            xmlns: "http://www.w3.org/2000/svg"
                                          }
                                        },
                                        [
                                          _c("path", {
                                            attrs: {
                                              d:
                                                "M41.781 12.0392L35.5895 0.950954C35.2765 0.391036 34.6102 0 33.969 0H8.0312C7.3897 0 6.72323 0.391161 6.41055 0.951203L0.219043 12.0391C-0.11214 12.6319 -0.0637101 13.429 0.336764 13.9773L15.7194 35.0456C16.0709 35.5271 16.7074 35.8503 17.3034 35.8503H24.6964C25.2924 35.8503 25.929 35.5269 26.2804 35.0456L41.6632 13.9772C42.0638 13.4289 42.1121 12.6318 41.781 12.0392ZM38.7172 11.7813C36.9088 11.7813 33.3452 11.7813 31.4821 11.7813C31.2463 11.7813 31.3156 11.6459 31.3156 11.6459L34.1228 3.40359C34.1228 3.40359 34.2152 3.33008 34.2637 3.41601C35.4555 5.53039 38.3234 10.6829 38.8508 11.6303C38.9054 11.7284 38.8646 11.7813 38.7172 11.7813ZM27.0781 11.7813C23.9498 11.7813 17.7548 11.7813 14.5644 11.7813C14.3383 11.7813 14.4547 11.635 14.4547 11.635L20.2666 2.42209C20.2666 2.42209 20.2806 2.35913 20.3986 2.35913C20.6444 2.35913 21.0768 2.35913 21.303 2.35913C21.4012 2.35913 21.4235 2.4242 21.4235 2.4242L27.2465 11.6543C27.2465 11.6545 27.3534 11.7813 27.0781 11.7813ZM24.321 2.35926C26.08 2.35926 31.0673 2.35926 31.8753 2.35926C32.008 2.35926 31.9395 2.49709 31.9395 2.49709C31.9395 2.49709 30.0175 8.14284 29.3234 10.1787C29.28 10.3055 29.1315 10.2205 29.1315 10.2205L24.2303 2.4514C24.2302 2.45152 24.1537 2.35926 24.321 2.35926ZM12.4286 10.0604C11.7924 8.19202 9.88878 2.58104 9.88878 2.58104C9.88878 2.58104 9.78956 2.35926 10.0033 2.35926C11.6917 2.35926 16.4156 2.35926 17.3537 2.35926C17.5134 2.35926 17.4143 2.52193 17.4143 2.52193L12.6453 10.0815C12.6454 10.0815 12.4908 10.2433 12.4286 10.0604ZM27.893 14.1406C27.9779 14.1406 27.9552 14.1956 27.9552 14.1956L21.3986 33.4446C21.3986 33.4446 21.3817 33.4913 21.335 33.4913C21.1107 33.4913 20.6741 33.4913 20.4379 33.4913C20.3765 33.4913 20.3665 33.4373 20.3665 33.4373L13.8406 14.2191C13.8406 14.2191 13.8185 14.1405 13.9181 14.1405C17.4321 14.1406 24.3992 14.1406 27.893 14.1406ZM7.76881 3.67517C8.4169 5.53325 10.1483 10.6731 10.4697 11.6276C10.5032 11.7272 10.5145 11.7813 10.3276 11.7813C8.56815 11.7813 5.09725 11.7813 3.28934 11.7813C3.06321 11.7813 3.15299 11.6234 3.15299 11.6234L7.63309 3.60066C7.63309 3.60066 7.70486 3.49176 7.76881 3.67517ZM3.51559 14.1406C5.46742 14.1406 9.33445 14.1406 11.2457 14.1406C11.3491 14.1406 11.3559 14.2387 11.3559 14.2387L17.8656 33.409C17.8656 33.409 17.8945 33.4913 17.8257 33.4913C17.7649 33.4913 17.6602 33.4913 17.5825 33.4913C17.5039 33.4913 17.4498 33.4147 17.4498 33.4147L3.44829 14.2379C3.44817 14.2379 3.36062 14.1406 3.51559 14.1406ZM24.4413 33.4913C24.3159 33.4913 24.0786 33.4913 23.94 33.4913C23.8614 33.4913 23.8979 33.4242 23.8979 33.4242L30.4468 14.1968C30.4468 14.1968 30.4597 14.1406 30.547 14.1406C32.566 14.1406 36.5513 14.1406 38.5524 14.1406C38.6237 14.1406 38.5894 14.1866 38.5894 14.1866L24.5214 33.454C24.5213 33.454 24.5028 33.4913 24.4413 33.4913Z",
                                              fill: "#CCCCCC"
                                            }
                                          })
                                        ]
                                      )
                                    ]
                                  )
                                : _vm._e(),
                              _vm._v(" "),
                              !_vm.shortenName[1] &&
                              _vm.shortenName[0].type == "diamonds"
                                ? _c(
                                    "div",
                                    { staticClass: "shopping-bar-box" },
                                    [
                                      _c(
                                        "svg",
                                        {
                                          attrs: {
                                            width: "40",
                                            height: "40",
                                            viewBox: "0 0 40 40",
                                            fill: "none",
                                            xmlns: "http://www.w3.org/2000/svg"
                                          }
                                        },
                                        [
                                          _c("path", {
                                            attrs: {
                                              d:
                                                "M20 40C8.98758 40 0 31.0118 0 20C0 8.98758 8.9882 0 20 0C31.0124 0 40 8.9882 40 20C40 31.0124 31.0118 40 20 40ZM20 2.34375C10.2643 2.34375 2.34375 10.2643 2.34375 20C2.34375 29.7357 10.2643 37.6562 20 37.6562C29.7357 37.6562 37.6562 29.7357 37.6562 20C37.6562 10.2643 29.7357 2.34375 20 2.34375Z",
                                              fill: "#CCCCCC"
                                            }
                                          }),
                                          _vm._v(" "),
                                          _c("path", {
                                            attrs: {
                                              d:
                                                "M20 35.3125C11.5896 35.3125 4.6875 28.4088 4.6875 20C4.6875 11.5896 11.5912 4.6875 20 4.6875C28.4104 4.6875 35.3125 11.5912 35.3125 20C35.3125 28.4104 28.4088 35.3125 20 35.3125ZM20 7.03125C12.849 7.03125 7.03125 12.849 7.03125 20C7.03125 27.151 12.849 32.9688 20 32.9688C27.151 32.9688 32.9688 27.151 32.9688 20C32.9688 12.849 27.151 7.03125 20 7.03125Z",
                                              fill: "#CCCCCC"
                                            }
                                          })
                                        ]
                                      )
                                    ]
                                  )
                                : _vm._e(),
                              _vm._v(" "),
                              _vm.shortenName[1]
                                ? _c(
                                    "div",
                                    {
                                      staticClass: "relative shopping-bar-box"
                                    },
                                    [
                                      _c("img", {
                                        attrs: {
                                          src: _vm.shortenName[1].image,
                                          alt: ""
                                        },
                                        on: {
                                          click: function($event) {
                                            return _vm.directTo(1)
                                          }
                                        }
                                      }),
                                      _vm._v(" "),
                                      _c(
                                        "button",
                                        {
                                          staticClass: "absolute top-1 left-1"
                                        },
                                        [
                                          _c(
                                            "svg",
                                            {
                                              attrs: {
                                                width: "20",
                                                height: "20",
                                                viewBox: "0 0 20 20",
                                                fill: "none",
                                                xmlns:
                                                  "http://www.w3.org/2000/svg"
                                              },
                                              on: {
                                                click: function($event) {
                                                  return _vm.removeItem(1)
                                                }
                                              }
                                            },
                                            [
                                              _c(
                                                "g",
                                                {
                                                  attrs: {
                                                    "clip-path": "url(#clip0)"
                                                  }
                                                },
                                                [
                                                  _c("path", {
                                                    attrs: {
                                                      d:
                                                        "M4.1074 15.8926C0.854709 12.6399 0.854709 7.36013 4.1074 4.10744C7.36009 0.854752 12.6398 0.854752 15.8925 4.10744C19.1452 7.36014 19.1452 12.6399 15.8925 15.8926C12.6398 19.1452 7.36009 19.1452 4.1074 15.8926Z",
                                                      fill: "#666666"
                                                    }
                                                  }),
                                                  _vm._v(" "),
                                                  _c("path", {
                                                    attrs: {
                                                      d:
                                                        "M13.5355 7.64298L11.1785 10L13.5355 12.357L12.357 13.5355L9.99998 11.1785L7.64296 13.5355L6.46444 12.357L8.82147 10L6.46444 7.64298L7.64296 6.46447L9.99998 8.82149L12.357 6.46447L13.5355 7.64298Z",
                                                      fill: "white"
                                                    }
                                                  })
                                                ]
                                              ),
                                              _vm._v(" "),
                                              _c("defs", [
                                                _c(
                                                  "clipPath",
                                                  { attrs: { id: "clip0" } },
                                                  [
                                                    _c("rect", {
                                                      attrs: {
                                                        width: "20",
                                                        height: "20",
                                                        fill: "white"
                                                      }
                                                    })
                                                  ]
                                                )
                                              ])
                                            ]
                                          )
                                        ]
                                      )
                                    ]
                                  )
                                : _vm._e(),
                              _vm._v(" "),
                              _c(
                                "span",
                                {
                                  staticClass:
                                    "md:text-xl font-suranna text-center md:text-left"
                                },
                                [
                                  _vm._v(
                                    _vm._s(
                                      _vm._f("transJs")(
                                        _vm.shortenName[0].type ==
                                          "engagementRings"
                                          ? "Select Diamond"
                                          : "Select Setting"
                                      )
                                    ) + "\n\t\t                \t"
                                  ),
                                  _c(
                                    "a",
                                    {
                                      staticClass:
                                        "block md:inline md:ml-3 text-brown underline",
                                      attrs: { href: "#" },
                                      on: {
                                        click: function($event) {
                                          return _vm.directTo(1)
                                        }
                                      }
                                    },
                                    [_vm._v(_vm._s(_vm._f("transJs")("View")))]
                                  )
                                ]
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass:
                                "flex flex-col md:flex-row items-center space-y-2 md:space-y-0 md:space-x-10"
                            },
                            [
                              _c("div", { staticClass: "shopping-bar-box" }, [
                                _c(
                                  "svg",
                                  {
                                    staticClass: "w-10",
                                    attrs: {
                                      height: "38",
                                      viewBox: "0 0 50 38",
                                      fill: "none",
                                      xmlns: "http://www.w3.org/2000/svg"
                                    }
                                  },
                                  [
                                    _c("path", {
                                      attrs: {
                                        d:
                                          "M25 0.669556C11.215 0.669556 0 7.59202 0 16.1012C0 22.4404 6.05918 28.0029 15.4708 30.3628C16.7913 34.5124 20.6453 37.3305 25 37.3305C29.3547 37.3305 33.2087 34.5124 34.5292 30.3628C43.9408 28.0029 50 22.4404 50 16.1012C50 7.59202 38.785 0.669556 25 0.669556ZM17.035 24.8828L20 25.8729V28.7995L17.035 29.7896C16.5417 28.1911 16.5417 26.4812 17.035 24.8828ZM25 9.83616C33.0691 9.83616 40.0983 12.392 42 15.9562C40.8167 18.2604 37.57 20.2753 33.0417 21.4154C31.165 18.8509 28.1778 17.3353 25 17.3353C21.8223 17.3353 18.835 18.8509 16.9583 21.4154C12.43 20.2753 9.1833 18.2604 8 15.9562C9.90166 12.392 16.9309 9.83616 25 9.83616ZM7.52832 13.7645C7.8333 9.3511 15.6967 5.66946 25 5.66946C34.3033 5.66946 42.1667 9.3511 42.4717 13.7645C39.4642 10.3961 32.75 8.16946 25 8.16946C17.25 8.16946 10.5358 10.3962 7.52832 13.7645ZM21.6675 29.0196V25.6604C21.686 25.6304 21.7024 25.5992 21.7166 25.567C21.7166 25.562 21.7166 25.5562 21.7166 25.5512L23.2166 24.0512C23.2225 24.0512 23.2274 24.0512 23.2324 24.0512C23.2612 24.0366 23.2891 24.0201 23.3157 24.0021H26.6857C26.7125 24.0201 26.7403 24.0366 26.769 24.0512C26.774 24.0512 26.779 24.0512 26.7849 24.0512L28.2849 25.5512C28.2849 25.5562 28.2849 25.562 28.2849 25.567C28.2991 25.5992 28.3155 25.6304 28.334 25.6604V29.0203C28.3159 29.0471 28.2994 29.0749 28.2849 29.1036C28.2849 29.1086 28.2849 29.1145 28.2849 29.1195L26.7849 30.6187C26.7799 30.6187 26.7749 30.6187 26.7698 30.6187C26.741 30.6333 26.7132 30.6497 26.6865 30.6678H23.3148C23.2881 30.6497 23.2603 30.6332 23.2315 30.6187C23.2266 30.6187 23.2216 30.6187 23.2165 30.6187L21.7165 29.1187C21.7165 29.1137 21.7165 29.1078 21.7165 29.1029C21.7021 29.0741 21.6856 29.0462 21.6675 29.0196ZM21.0061 20.0253L21.9767 22.9337L20.5958 24.3146L17.6866 23.3429C18.4554 21.944 19.6068 20.7932 21.0061 20.0253ZM22.5458 19.3729C24.1447 18.8795 25.8552 18.8795 27.4541 19.3729L26.4641 22.3363H23.5357L22.5458 19.3729ZM28.02 22.9337L28.9908 20.0245C30.3907 20.7924 31.5427 21.9436 32.3116 23.3429H32.31L29.4008 24.3146L28.02 22.9337ZM21.0075 34.6479C19.6082 33.8797 18.4568 32.7286 17.6884 31.3295L20.5976 30.3578L21.9784 31.7387L21.0075 34.6479ZM22.5458 35.2995L23.5358 32.3362H26.4642L27.4542 35.2995C25.8553 35.7929 24.1447 35.7929 22.5458 35.2995ZM28.9925 34.6479L28.0217 31.7387L29.4025 30.3578L32.3117 31.3295C31.5432 32.7286 30.3918 33.8797 28.9925 34.6479ZM32.9634 29.7895L30 28.7995V25.8729L32.9634 24.8828C33.4566 26.4812 33.4566 28.1911 32.9634 29.7895ZM34.9208 28.5362C35.1691 26.6035 34.8309 24.6408 33.95 22.9029C40.28 21.1929 44.1667 17.8462 44.1667 14.0229C44.1667 8.40452 35.75 4.00286 25 4.00286C14.25 4.00286 5.8333 8.40452 5.8333 14.0229C5.8333 17.8462 9.71992 21.1896 16.05 22.9029C15.1705 24.6413 14.8338 26.6039 15.0833 28.5362C7.00664 26.2854 1.6667 21.3912 1.6667 16.1012C1.6667 8.51116 12.1342 2.33616 25 2.33616C37.8658 2.33616 48.3333 8.51116 48.3333 16.1012C48.3333 21.3912 42.9934 26.2854 34.9208 28.5362Z",
                                        fill: "#CCCCCC"
                                      }
                                    })
                                  ]
                                )
                              ]),
                              _vm._v(" "),
                              _c(
                                "span",
                                {
                                  staticClass:
                                    "md:text-xl font-suranna text-center md:text-left"
                                },
                                [_vm._v(_vm._s(_vm._f("transJs")("Finish")))]
                              )
                            ]
                          )
                        ]
                      ),
                      _vm._v(" "),
                      _c(
                        "nav",
                        {
                          staticClass: "overflow-hidden",
                          attrs: { "aria-label": "Progress" }
                        },
                        [
                          _c("ol", { staticClass: "flex items-center py-2" }, [
                            _vm._m(0),
                            _vm._v(" "),
                            _c(
                              "li",
                              {
                                staticClass:
                                  "relative pl-18 md:pl-52 lg:pl-64 xl:pl-100 2xl:pl-131"
                              },
                              [
                                _c(
                                  "div",
                                  {
                                    staticClass: "progress-bar-line",
                                    attrs: { "aria-hidden": "true" }
                                  },
                                  [
                                    _c("div", {
                                      staticClass: "line",
                                      class: { active: _vm.shortenName[0] }
                                    })
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "a",
                                  {
                                    class: { active: _vm.shortenName[0] },
                                    attrs: {
                                      href: "#",
                                      id: "progress-bar-quare"
                                    }
                                  },
                                  [
                                    _c(
                                      "span",
                                      { class: { active: _vm.shortenName[0] } },
                                      [_vm._v("2")]
                                    )
                                  ]
                                )
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "li",
                              {
                                staticClass:
                                  "relative pl-18 md:pl-52 lg:pl-64 xl:pl-100 2xl:pl-131 pr-12 md:pr-20 lg:pr-36 2xl:pr-48"
                              },
                              [
                                _c(
                                  "div",
                                  {
                                    staticClass: "progress-bar-line",
                                    attrs: { "aria-hidden": "true" }
                                  },
                                  [
                                    _c("div", {
                                      staticClass: "line",
                                      class: {
                                        active: _vm.currentUrl.includes(
                                          "diamond-ring-review"
                                        )
                                      }
                                    })
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "a",
                                  {
                                    class: {
                                      active: _vm.currentUrl.includes(
                                        "diamond-ring-review"
                                      )
                                    },
                                    attrs: {
                                      href: "#",
                                      id: "progress-bar-quare"
                                    }
                                  },
                                  [
                                    _c(
                                      "span",
                                      {
                                        class: {
                                          active: _vm.currentUrl.includes(
                                            "diamond-ring-review"
                                          )
                                        }
                                      },
                                      [_vm._v("3")]
                                    )
                                  ]
                                )
                              ]
                            )
                          ])
                        ]
                      )
                    ]
                  )
                : _vm._e()
            ])
          : _vm._e()
      ])
    : _vm._e()
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "li",
      { staticClass: "relative pl-12 md:pl-28 lg:pl-44 xl:pl-52 2xl:pl-64" },
      [
        _c(
          "div",
          {
            staticClass: "progress-bar-line",
            attrs: { "aria-hidden": "true" }
          },
          [_c("div", { staticClass: "line active" })]
        ),
        _vm._v(" "),
        _c(
          "a",
          {
            staticClass: "active",
            attrs: { href: "#", id: "progress-bar-quare" }
          },
          [_c("span", { staticClass: "active" }, [_vm._v("1")])]
        )
      ]
    )
  }
]
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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/video360Exchange.vue?vue&type=template&id=621d67e0&":
/*!****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/video360Exchange.vue?vue&type=template&id=621d67e0& ***!
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
  return _c("div", { staticClass: "relative sm:p-2" }, [
    _c(
      "div",
      {
        staticClass: "absolute z-10",
        staticStyle: { top: "5%", left: "5%", opacity: "50%" }
      },
      [
        _vm.videoSelecting == "video360"
          ? _c(
              "div",
              {
                staticClass:
                  " border border-white border-2 bg-black p-1 px-4 rounded-lg hover:bg-gray-700 text-center",
                on: {
                  click: function($event) {
                    return _vm.video360Reload()
                  }
                }
              },
              [
                _c("p", { staticClass: "text-white" }, [
                  _vm._v(_vm._s(_vm._f("transJs")("Video")) + "\n            "),
                  _c("i", {
                    staticClass: "hidden sm:block fa fa-play text-white fa-2x",
                    attrs: { "aria-hidden": "true" }
                  }),
                  _vm._v(" "),
                  _c("i", {
                    staticClass: "sm:hidden fa fa-play text-white ",
                    attrs: { "aria-hidden": "true" }
                  })
                ])
              ]
            )
          : _vm._e(),
        _vm._v(" "),
        _vm.videoSelecting == "video"
          ? _c(
              "div",
              {
                staticClass:
                  " border border-white border-2 bg-black p-1 px-4 rounded-lg hover:bg-gray-700",
                on: {
                  click: function($event) {
                    return _vm.videoReload()
                  }
                }
              },
              [
                _c(
                  "svg",
                  {
                    staticClass: "w-12 fill-current text-white ",
                    staticStyle: {
                      "enable-background": "new 0 0 122.88 65.79"
                    },
                    attrs: {
                      version: "1.1",
                      id: "Layer_1",
                      xmlns: "http://www.w3.org/2000/svg",
                      "xmlns:xlink": "http://www.w3.org/1999/xlink",
                      x: "0px",
                      y: "0px",
                      viewBox: "0 0 122.88 65.79",
                      "xml:space": "preserve"
                    }
                  },
                  [
                    _c("g", [
                      _c("path", {
                        attrs: {
                          d:
                            "M13.37,31.32c-22.23,12.2,37.65,19.61,51.14,19.49v-7.44l11.21,11.2L64.51,65.79v-6.97 C37.4,59.85-26.41,42.4,11.97,27.92c0.36,1.13,0.8,2.2,1.3,3.2L13.37,31.32L13.37,31.32z M108.36,8.31c0-2.61,0.47-4.44,1.41-5.48 c0.94-1.04,2.37-1.56,4.3-1.56c0.92,0,1.69,0.12,2.28,0.34c0.59,0.23,1.08,0.52,1.45,0.89c0.38,0.36,0.67,0.75,0.89,1.15 c0.22,0.4,0.39,0.87,0.52,1.41c0.26,1.02,0.38,2.09,0.38,3.21c0,2.49-0.42,4.32-1.27,5.47c-0.84,1.15-2.29,1.73-4.36,1.73 c-1.15,0-2.09-0.19-2.8-0.55c-0.71-0.37-1.3-0.91-1.75-1.62c-0.33-0.51-0.59-1.2-0.77-2.07C108.45,10.34,108.36,9.38,108.36,8.31 L108.36,8.31z M26.47,10.49l-9-1.6c0.75-2.86,2.18-5.06,4.31-6.59C23.9,0.77,26.91,0,30.8,0c4.47,0,7.69,0.83,9.69,2.5 c1.99,1.67,2.98,3.77,2.98,6.29c0,1.48-0.41,2.82-1.21,4.01c-0.81,1.2-2.02,2.25-3.65,3.15c1.32,0.33,2.34,0.71,3.03,1.15 c1.14,0.7,2.02,1.63,2.65,2.77c0.63,1.15,0.95,2.51,0.95,4.1c0,2-0.52,3.91-1.56,5.75c-1.05,1.83-2.55,3.24-4.51,4.23 c-1.96,0.99-4.54,1.48-7.74,1.48c-3.11,0-5.57-0.37-7.36-1.1c-1.8-0.73-3.28-1.8-4.44-3.22c-1.16-1.41-2.05-3.19-2.67-5.33 l9.53-1.27c0.38,1.92,0.95,3.26,1.74,4.01c0.78,0.74,1.78,1.12,3,1.12c1.27,0,2.33-0.47,3.18-1.4c0.85-0.93,1.27-2.18,1.27-3.74 c0-1.59-0.41-2.82-1.22-3.69c-0.81-0.87-1.92-1.31-3.32-1.31c-0.74,0-1.77,0.18-3.07,0.56l0.49-6.81c0.52,0.08,0.93,0.12,1.22,0.12 c1.23,0,2.26-0.4,3.08-1.19c0.82-0.79,1.24-1.72,1.24-2.81c0-1.05-0.31-1.88-0.93-2.49c-0.62-0.62-1.48-0.93-2.55-0.93 c-1.12,0-2.02,0.34-2.72,1.01C27.19,7.62,26.72,8.8,26.47,10.49L26.47,10.49z M75.15,8.27l-9.48,1.16 c-0.25-1.32-0.66-2.24-1.24-2.78c-0.59-0.54-1.31-0.81-2.16-0.81c-1.54,0-2.74,0.77-3.59,2.33c-0.62,1.13-1.09,3.52-1.38,7.19 c1.14-1.16,2.31-2.01,3.5-2.56c1.2-0.55,2.59-0.83,4.16-0.83c3.06,0,5.64,1.09,7.75,3.27c2.11,2.19,3.17,4.96,3.17,8.31 c0,2.26-0.53,4.32-1.6,6.2c-1.07,1.87-2.55,3.29-4.44,4.25c-1.9,0.96-4.27,1.44-7.13,1.44c-3.43,0-6.18-0.58-8.25-1.76 c-2.07-1.17-3.73-3.03-4.97-5.59c-1.24-2.56-1.86-5.95-1.86-10.18c0-6.18,1.3-10.71,3.91-13.59C54.13,1.44,57.74,0,62.36,0 c2.73,0,4.88,0.31,6.46,0.94c1.58,0.63,2.9,1.56,3.94,2.76C73.81,4.92,74.61,6.44,75.15,8.27L75.15,8.27z M57.62,23.55 c0,1.86,0.47,3.31,1.4,4.36c0.94,1.05,2.08,1.58,3.44,1.58c1.25,0,2.3-0.48,3.14-1.43c0.84-0.95,1.26-2.37,1.26-4.26 c0-1.93-0.44-3.41-1.31-4.42c-0.88-1.01-1.96-1.52-3.26-1.52c-1.32,0-2.44,0.49-3.34,1.48C58.06,20.32,57.62,21.72,57.62,23.55 L57.62,23.55z M77.91,17.57c0-6.51,1.17-11.07,3.52-13.67C83.77,1.3,87.35,0,92.14,0c2.31,0,4.2,0.29,5.68,0.85 c1.48,0.57,2.69,1.31,3.62,2.22c0.94,0.91,1.68,1.87,2.21,2.87c0.54,1.01,0.97,2.18,1.3,3.52c0.64,2.55,0.96,5.22,0.96,8 c0,6.22-1.05,10.76-3.16,13.64c-2.1,2.88-5.72,4.32-10.87,4.32c-2.88,0-5.21-0.46-6.99-1.38c-1.78-0.92-3.23-2.27-4.37-4.05 c-0.82-1.26-1.47-2.98-1.93-5.17C78.14,22.64,77.91,20.22,77.91,17.57L77.91,17.57z M87.34,17.59c0,4.36,0.38,7.34,1.16,8.94 c0.77,1.6,1.89,2.39,3.36,2.39c0.97,0,1.8-0.34,2.51-1.01c0.71-0.68,1.23-1.76,1.56-3.22c0.34-1.47,0.5-3.75,0.5-6.85 c0-4.55-0.38-7.6-1.16-9.18c-0.77-1.56-1.93-2.35-3.47-2.35c-1.58,0-2.71,0.8-3.42,2.39C87.69,10.31,87.34,13.27,87.34,17.59 L87.34,17.59z M112.14,8.32c0,1.75,0.15,2.94,0.46,3.58c0.31,0.64,0.76,0.96,1.35,0.96c0.39,0,0.72-0.13,1.01-0.41 c0.28-0.27,0.49-0.7,0.63-1.29c0.13-0.59,0.2-1.5,0.2-2.74c0-1.82-0.15-3.05-0.46-3.68c-0.31-0.63-0.77-0.94-1.39-0.94 c-0.63,0-1.09,0.32-1.37,0.96C112.28,5.4,112.14,6.59,112.14,8.32L112.14,8.32z M109.3,30.23c10.56,5.37,8.04,12.99-10.66,17.62 c-5.3,1.31-11.29,2.5-17.86,2.99v6.05c7.31-0.51,14.11-2.19,20.06-3.63c28.12-6.81,27.14-18.97,9.36-25.83 C109.95,28.42,109.65,29.35,109.3,30.23L109.3,30.23z"
                        }
                      })
                    ])
                  ]
                )
              ]
            )
          : _vm._e()
      ]
    ),
    _vm._v(" "),
    _c("div", { staticClass: "grid grid-cols-12 sm:p-1" }, [
      _c("div", { staticClass: "col-span-12" }, [
        _c("div", { staticClass: "box" }, [
          _c("article", [
            _c(
              "div",
              [
                _c("center", [
                  _vm.videoSelecting == "video360"
                    ? _c(
                        "div",
                        { staticClass: " sm:p-1" },
                        [
                          _vm.vid360
                            ? _c("product-viewer", {
                                key: Math.random(),
                                attrs: {
                                  id: Math.random(),
                                  folder:
                                    _vm.cdn +
                                    "public/video360/" +
                                    _vm.video360.src +
                                    "/",
                                  filename: _vm.video360.fileName,
                                  size: _vm.video360.size,
                                  thumb: _vm.video360.thumb,
                                  rotate: _vm.video360.rotate
                                }
                              })
                            : _vm._e()
                        ],
                        1
                      )
                    : _vm._e(),
                  _vm._v(" "),
                  _vm.videoSelecting == "video" && _vm.videoOptions.poster
                    ? _c(
                        "div",
                        [
                          _vm.src
                            ? _c("video-player", {
                                attrs: {
                                  options: _vm.videoOptions,
                                  autoplay: "false"
                                }
                              })
                            : _vm._e()
                        ],
                        1
                      )
                    : _vm._e()
                ])
              ],
              1
            )
          ])
        ])
      ])
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
        attrs: { id: _vm.myVideo }
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
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			id: moduleId,
/******/ 			loaded: false,
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Flag the module as loaded
/******/ 		module.loaded = true;
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
/******/ 	/* webpack/runtime/harmony module decorator */
/******/ 	(() => {
/******/ 		__webpack_require__.hmd = (module) => {
/******/ 			module = Object.create(module);
/******/ 			if (!module.children) module.children = [];
/******/ 			Object.defineProperty(module, 'exports', {
/******/ 				enumerable: true,
/******/ 				set: () => {
/******/ 					throw new Error('ES Modules may not assign module.exports or exports.*, Use ESM export syntax, instead: ' + module.id);
/******/ 				}
/******/ 			});
/******/ 			return module;
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
/*!**********************************!*\
  !*** ./resources/js/frontend.js ***!
  \**********************************/
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
/* harmony import */ var _components_shoppingCart_progress_vue__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ./components/shoppingCart/progress.vue */ "./resources/js/components/shoppingCart/progress.vue");
/* harmony import */ var _components_shoppingCart_icon_vue__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! ./components/shoppingCart/icon.vue */ "./resources/js/components/shoppingCart/icon.vue");
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



var header = new Vue({
  el: '#header',
  data: function data() {
    return {
      mutualVar: mutualVar // burgerOpen:false,
      // headerSection:0,

    };
  },
  methods: {// onClickedHeader(section){
    //     if (this.headerSection == section) {
    //         return this.headerSection = 0
    //     }
    //     this.headerSection = section
    // },
  },
  created: function created() {// mutualVar.css.innerWidth = window.innerWidth
  },
  destroyed: function destroyed() {},
  components: {
    ShoppingCartProgress: _components_shoppingCart_progress_vue__WEBPACK_IMPORTED_MODULE_11__.default,
    ShoppingCartIcon: _components_shoppingCart_icon_vue__WEBPACK_IMPORTED_MODULE_12__.default
  },
  computed: {// shoppingCartNumber(){
    //     return mutualVar.cookiesInfo.shoppingCart.items.filter((data)=>{return data.addedCart == 1}).length
    // },
  }
});

if (mutualVar.vComponents.findIndex(function (data) {
  return data['progressBar'];
}) > -1) {
  var progressBar = new Vue({
    el: '#progress-bar',
    data: function data() {
      return {
        mutualVar: mutualVar
      };
    },
    components: {
      ShoppingCartProgress: _components_shoppingCart_progress_vue__WEBPACK_IMPORTED_MODULE_11__.default
    }
  });
} // const footer = new Vue({
//     el: '#footer',
//     data(){
//         return{
//             footerSection:1,
//             mutualVar,
//         }
//     },
//     methods:{
//         onClickedFooter(section){
//             this.footerSection = section
//         },
//     },
// });
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
} // if ( pUrl.includes('login') ) {
//     const login =  new Vue(Login);
// }
// const diamondViewer = new Vue({
//     el: '#diamondViewer'
// });
})();

/******/ })()
;