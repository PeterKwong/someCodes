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
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/axios/index.js":
/*!*************************************!*\
  !*** ./node_modules/axios/index.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! ./lib/axios */ "./node_modules/axios/lib/axios.js");

/***/ }),

/***/ "./node_modules/axios/lib/adapters/xhr.js":
/*!************************************************!*\
  !*** ./node_modules/axios/lib/adapters/xhr.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var utils = __webpack_require__(/*! ./../utils */ "./node_modules/axios/lib/utils.js");
var settle = __webpack_require__(/*! ./../core/settle */ "./node_modules/axios/lib/core/settle.js");
var buildURL = __webpack_require__(/*! ./../helpers/buildURL */ "./node_modules/axios/lib/helpers/buildURL.js");
var buildFullPath = __webpack_require__(/*! ../core/buildFullPath */ "./node_modules/axios/lib/core/buildFullPath.js");
var parseHeaders = __webpack_require__(/*! ./../helpers/parseHeaders */ "./node_modules/axios/lib/helpers/parseHeaders.js");
var isURLSameOrigin = __webpack_require__(/*! ./../helpers/isURLSameOrigin */ "./node_modules/axios/lib/helpers/isURLSameOrigin.js");
var createError = __webpack_require__(/*! ../core/createError */ "./node_modules/axios/lib/core/createError.js");

module.exports = function xhrAdapter(config) {
  return new Promise(function dispatchXhrRequest(resolve, reject) {
    var requestData = config.data;
    var requestHeaders = config.headers;

    if (utils.isFormData(requestData)) {
      delete requestHeaders['Content-Type']; // Let the browser set it
    }

    var request = new XMLHttpRequest();

    // HTTP basic authentication
    if (config.auth) {
      var username = config.auth.username || '';
      var password = config.auth.password || '';
      requestHeaders.Authorization = 'Basic ' + btoa(username + ':' + password);
    }

    var fullPath = buildFullPath(config.baseURL, config.url);
    request.open(config.method.toUpperCase(), buildURL(fullPath, config.params, config.paramsSerializer), true);

    // Set the request timeout in MS
    request.timeout = config.timeout;

    // Listen for ready state
    request.onreadystatechange = function handleLoad() {
      if (!request || request.readyState !== 4) {
        return;
      }

      // The request errored out and we didn't get a response, this will be
      // handled by onerror instead
      // With one exception: request that using file: protocol, most browsers
      // will return status as 0 even though it's a successful request
      if (request.status === 0 && !(request.responseURL && request.responseURL.indexOf('file:') === 0)) {
        return;
      }

      // Prepare the response
      var responseHeaders = 'getAllResponseHeaders' in request ? parseHeaders(request.getAllResponseHeaders()) : null;
      var responseData = !config.responseType || config.responseType === 'text' ? request.responseText : request.response;
      var response = {
        data: responseData,
        status: request.status,
        statusText: request.statusText,
        headers: responseHeaders,
        config: config,
        request: request
      };

      settle(resolve, reject, response);

      // Clean up request
      request = null;
    };

    // Handle browser request cancellation (as opposed to a manual cancellation)
    request.onabort = function handleAbort() {
      if (!request) {
        return;
      }

      reject(createError('Request aborted', config, 'ECONNABORTED', request));

      // Clean up request
      request = null;
    };

    // Handle low level network errors
    request.onerror = function handleError() {
      // Real errors are hidden from us by the browser
      // onerror should only fire if it's a network error
      reject(createError('Network Error', config, null, request));

      // Clean up request
      request = null;
    };

    // Handle timeout
    request.ontimeout = function handleTimeout() {
      var timeoutErrorMessage = 'timeout of ' + config.timeout + 'ms exceeded';
      if (config.timeoutErrorMessage) {
        timeoutErrorMessage = config.timeoutErrorMessage;
      }
      reject(createError(timeoutErrorMessage, config, 'ECONNABORTED',
        request));

      // Clean up request
      request = null;
    };

    // Add xsrf header
    // This is only done if running in a standard browser environment.
    // Specifically not if we're in a web worker, or react-native.
    if (utils.isStandardBrowserEnv()) {
      var cookies = __webpack_require__(/*! ./../helpers/cookies */ "./node_modules/axios/lib/helpers/cookies.js");

      // Add xsrf header
      var xsrfValue = (config.withCredentials || isURLSameOrigin(fullPath)) && config.xsrfCookieName ?
        cookies.read(config.xsrfCookieName) :
        undefined;

      if (xsrfValue) {
        requestHeaders[config.xsrfHeaderName] = xsrfValue;
      }
    }

    // Add headers to the request
    if ('setRequestHeader' in request) {
      utils.forEach(requestHeaders, function setRequestHeader(val, key) {
        if (typeof requestData === 'undefined' && key.toLowerCase() === 'content-type') {
          // Remove Content-Type if data is undefined
          delete requestHeaders[key];
        } else {
          // Otherwise add header to the request
          request.setRequestHeader(key, val);
        }
      });
    }

    // Add withCredentials to request if needed
    if (!utils.isUndefined(config.withCredentials)) {
      request.withCredentials = !!config.withCredentials;
    }

    // Add responseType to request if needed
    if (config.responseType) {
      try {
        request.responseType = config.responseType;
      } catch (e) {
        // Expected DOMException thrown by browsers not compatible XMLHttpRequest Level 2.
        // But, this can be suppressed for 'json' type as it can be parsed by default 'transformResponse' function.
        if (config.responseType !== 'json') {
          throw e;
        }
      }
    }

    // Handle progress if needed
    if (typeof config.onDownloadProgress === 'function') {
      request.addEventListener('progress', config.onDownloadProgress);
    }

    // Not all browsers support upload events
    if (typeof config.onUploadProgress === 'function' && request.upload) {
      request.upload.addEventListener('progress', config.onUploadProgress);
    }

    if (config.cancelToken) {
      // Handle cancellation
      config.cancelToken.promise.then(function onCanceled(cancel) {
        if (!request) {
          return;
        }

        request.abort();
        reject(cancel);
        // Clean up request
        request = null;
      });
    }

    if (requestData === undefined) {
      requestData = null;
    }

    // Send the request
    request.send(requestData);
  });
};


/***/ }),

/***/ "./node_modules/axios/lib/axios.js":
/*!*****************************************!*\
  !*** ./node_modules/axios/lib/axios.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var utils = __webpack_require__(/*! ./utils */ "./node_modules/axios/lib/utils.js");
var bind = __webpack_require__(/*! ./helpers/bind */ "./node_modules/axios/lib/helpers/bind.js");
var Axios = __webpack_require__(/*! ./core/Axios */ "./node_modules/axios/lib/core/Axios.js");
var mergeConfig = __webpack_require__(/*! ./core/mergeConfig */ "./node_modules/axios/lib/core/mergeConfig.js");
var defaults = __webpack_require__(/*! ./defaults */ "./node_modules/axios/lib/defaults.js");

/**
 * Create an instance of Axios
 *
 * @param {Object} defaultConfig The default config for the instance
 * @return {Axios} A new instance of Axios
 */
function createInstance(defaultConfig) {
  var context = new Axios(defaultConfig);
  var instance = bind(Axios.prototype.request, context);

  // Copy axios.prototype to instance
  utils.extend(instance, Axios.prototype, context);

  // Copy context to instance
  utils.extend(instance, context);

  return instance;
}

// Create the default instance to be exported
var axios = createInstance(defaults);

// Expose Axios class to allow class inheritance
axios.Axios = Axios;

// Factory for creating new instances
axios.create = function create(instanceConfig) {
  return createInstance(mergeConfig(axios.defaults, instanceConfig));
};

// Expose Cancel & CancelToken
axios.Cancel = __webpack_require__(/*! ./cancel/Cancel */ "./node_modules/axios/lib/cancel/Cancel.js");
axios.CancelToken = __webpack_require__(/*! ./cancel/CancelToken */ "./node_modules/axios/lib/cancel/CancelToken.js");
axios.isCancel = __webpack_require__(/*! ./cancel/isCancel */ "./node_modules/axios/lib/cancel/isCancel.js");

// Expose all/spread
axios.all = function all(promises) {
  return Promise.all(promises);
};
axios.spread = __webpack_require__(/*! ./helpers/spread */ "./node_modules/axios/lib/helpers/spread.js");

module.exports = axios;

// Allow use of default import syntax in TypeScript
module.exports.default = axios;


/***/ }),

/***/ "./node_modules/axios/lib/cancel/Cancel.js":
/*!*************************************************!*\
  !*** ./node_modules/axios/lib/cancel/Cancel.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


/**
 * A `Cancel` is an object that is thrown when an operation is canceled.
 *
 * @class
 * @param {string=} message The message.
 */
function Cancel(message) {
  this.message = message;
}

Cancel.prototype.toString = function toString() {
  return 'Cancel' + (this.message ? ': ' + this.message : '');
};

Cancel.prototype.__CANCEL__ = true;

module.exports = Cancel;


/***/ }),

/***/ "./node_modules/axios/lib/cancel/CancelToken.js":
/*!******************************************************!*\
  !*** ./node_modules/axios/lib/cancel/CancelToken.js ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var Cancel = __webpack_require__(/*! ./Cancel */ "./node_modules/axios/lib/cancel/Cancel.js");

/**
 * A `CancelToken` is an object that can be used to request cancellation of an operation.
 *
 * @class
 * @param {Function} executor The executor function.
 */
function CancelToken(executor) {
  if (typeof executor !== 'function') {
    throw new TypeError('executor must be a function.');
  }

  var resolvePromise;
  this.promise = new Promise(function promiseExecutor(resolve) {
    resolvePromise = resolve;
  });

  var token = this;
  executor(function cancel(message) {
    if (token.reason) {
      // Cancellation has already been requested
      return;
    }

    token.reason = new Cancel(message);
    resolvePromise(token.reason);
  });
}

/**
 * Throws a `Cancel` if cancellation has been requested.
 */
CancelToken.prototype.throwIfRequested = function throwIfRequested() {
  if (this.reason) {
    throw this.reason;
  }
};

/**
 * Returns an object that contains a new `CancelToken` and a function that, when called,
 * cancels the `CancelToken`.
 */
CancelToken.source = function source() {
  var cancel;
  var token = new CancelToken(function executor(c) {
    cancel = c;
  });
  return {
    token: token,
    cancel: cancel
  };
};

module.exports = CancelToken;


/***/ }),

/***/ "./node_modules/axios/lib/cancel/isCancel.js":
/*!***************************************************!*\
  !*** ./node_modules/axios/lib/cancel/isCancel.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


module.exports = function isCancel(value) {
  return !!(value && value.__CANCEL__);
};


/***/ }),

/***/ "./node_modules/axios/lib/core/Axios.js":
/*!**********************************************!*\
  !*** ./node_modules/axios/lib/core/Axios.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var utils = __webpack_require__(/*! ./../utils */ "./node_modules/axios/lib/utils.js");
var buildURL = __webpack_require__(/*! ../helpers/buildURL */ "./node_modules/axios/lib/helpers/buildURL.js");
var InterceptorManager = __webpack_require__(/*! ./InterceptorManager */ "./node_modules/axios/lib/core/InterceptorManager.js");
var dispatchRequest = __webpack_require__(/*! ./dispatchRequest */ "./node_modules/axios/lib/core/dispatchRequest.js");
var mergeConfig = __webpack_require__(/*! ./mergeConfig */ "./node_modules/axios/lib/core/mergeConfig.js");

/**
 * Create a new instance of Axios
 *
 * @param {Object} instanceConfig The default config for the instance
 */
function Axios(instanceConfig) {
  this.defaults = instanceConfig;
  this.interceptors = {
    request: new InterceptorManager(),
    response: new InterceptorManager()
  };
}

/**
 * Dispatch a request
 *
 * @param {Object} config The config specific for this request (merged with this.defaults)
 */
Axios.prototype.request = function request(config) {
  /*eslint no-param-reassign:0*/
  // Allow for axios('example/url'[, config]) a la fetch API
  if (typeof config === 'string') {
    config = arguments[1] || {};
    config.url = arguments[0];
  } else {
    config = config || {};
  }

  config = mergeConfig(this.defaults, config);

  // Set config.method
  if (config.method) {
    config.method = config.method.toLowerCase();
  } else if (this.defaults.method) {
    config.method = this.defaults.method.toLowerCase();
  } else {
    config.method = 'get';
  }

  // Hook up interceptors middleware
  var chain = [dispatchRequest, undefined];
  var promise = Promise.resolve(config);

  this.interceptors.request.forEach(function unshiftRequestInterceptors(interceptor) {
    chain.unshift(interceptor.fulfilled, interceptor.rejected);
  });

  this.interceptors.response.forEach(function pushResponseInterceptors(interceptor) {
    chain.push(interceptor.fulfilled, interceptor.rejected);
  });

  while (chain.length) {
    promise = promise.then(chain.shift(), chain.shift());
  }

  return promise;
};

Axios.prototype.getUri = function getUri(config) {
  config = mergeConfig(this.defaults, config);
  return buildURL(config.url, config.params, config.paramsSerializer).replace(/^\?/, '');
};

// Provide aliases for supported request methods
utils.forEach(['delete', 'get', 'head', 'options'], function forEachMethodNoData(method) {
  /*eslint func-names:0*/
  Axios.prototype[method] = function(url, config) {
    return this.request(utils.merge(config || {}, {
      method: method,
      url: url
    }));
  };
});

utils.forEach(['post', 'put', 'patch'], function forEachMethodWithData(method) {
  /*eslint func-names:0*/
  Axios.prototype[method] = function(url, data, config) {
    return this.request(utils.merge(config || {}, {
      method: method,
      url: url,
      data: data
    }));
  };
});

module.exports = Axios;


/***/ }),

/***/ "./node_modules/axios/lib/core/InterceptorManager.js":
/*!***********************************************************!*\
  !*** ./node_modules/axios/lib/core/InterceptorManager.js ***!
  \***********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var utils = __webpack_require__(/*! ./../utils */ "./node_modules/axios/lib/utils.js");

function InterceptorManager() {
  this.handlers = [];
}

/**
 * Add a new interceptor to the stack
 *
 * @param {Function} fulfilled The function to handle `then` for a `Promise`
 * @param {Function} rejected The function to handle `reject` for a `Promise`
 *
 * @return {Number} An ID used to remove interceptor later
 */
InterceptorManager.prototype.use = function use(fulfilled, rejected) {
  this.handlers.push({
    fulfilled: fulfilled,
    rejected: rejected
  });
  return this.handlers.length - 1;
};

/**
 * Remove an interceptor from the stack
 *
 * @param {Number} id The ID that was returned by `use`
 */
InterceptorManager.prototype.eject = function eject(id) {
  if (this.handlers[id]) {
    this.handlers[id] = null;
  }
};

/**
 * Iterate over all the registered interceptors
 *
 * This method is particularly useful for skipping over any
 * interceptors that may have become `null` calling `eject`.
 *
 * @param {Function} fn The function to call for each interceptor
 */
InterceptorManager.prototype.forEach = function forEach(fn) {
  utils.forEach(this.handlers, function forEachHandler(h) {
    if (h !== null) {
      fn(h);
    }
  });
};

module.exports = InterceptorManager;


/***/ }),

/***/ "./node_modules/axios/lib/core/buildFullPath.js":
/*!******************************************************!*\
  !*** ./node_modules/axios/lib/core/buildFullPath.js ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var isAbsoluteURL = __webpack_require__(/*! ../helpers/isAbsoluteURL */ "./node_modules/axios/lib/helpers/isAbsoluteURL.js");
var combineURLs = __webpack_require__(/*! ../helpers/combineURLs */ "./node_modules/axios/lib/helpers/combineURLs.js");

/**
 * Creates a new URL by combining the baseURL with the requestedURL,
 * only when the requestedURL is not already an absolute URL.
 * If the requestURL is absolute, this function returns the requestedURL untouched.
 *
 * @param {string} baseURL The base URL
 * @param {string} requestedURL Absolute or relative URL to combine
 * @returns {string} The combined full path
 */
module.exports = function buildFullPath(baseURL, requestedURL) {
  if (baseURL && !isAbsoluteURL(requestedURL)) {
    return combineURLs(baseURL, requestedURL);
  }
  return requestedURL;
};


/***/ }),

/***/ "./node_modules/axios/lib/core/createError.js":
/*!****************************************************!*\
  !*** ./node_modules/axios/lib/core/createError.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var enhanceError = __webpack_require__(/*! ./enhanceError */ "./node_modules/axios/lib/core/enhanceError.js");

/**
 * Create an Error with the specified message, config, error code, request and response.
 *
 * @param {string} message The error message.
 * @param {Object} config The config.
 * @param {string} [code] The error code (for example, 'ECONNABORTED').
 * @param {Object} [request] The request.
 * @param {Object} [response] The response.
 * @returns {Error} The created error.
 */
module.exports = function createError(message, config, code, request, response) {
  var error = new Error(message);
  return enhanceError(error, config, code, request, response);
};


/***/ }),

/***/ "./node_modules/axios/lib/core/dispatchRequest.js":
/*!********************************************************!*\
  !*** ./node_modules/axios/lib/core/dispatchRequest.js ***!
  \********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var utils = __webpack_require__(/*! ./../utils */ "./node_modules/axios/lib/utils.js");
var transformData = __webpack_require__(/*! ./transformData */ "./node_modules/axios/lib/core/transformData.js");
var isCancel = __webpack_require__(/*! ../cancel/isCancel */ "./node_modules/axios/lib/cancel/isCancel.js");
var defaults = __webpack_require__(/*! ../defaults */ "./node_modules/axios/lib/defaults.js");

/**
 * Throws a `Cancel` if cancellation has been requested.
 */
function throwIfCancellationRequested(config) {
  if (config.cancelToken) {
    config.cancelToken.throwIfRequested();
  }
}

/**
 * Dispatch a request to the server using the configured adapter.
 *
 * @param {object} config The config that is to be used for the request
 * @returns {Promise} The Promise to be fulfilled
 */
module.exports = function dispatchRequest(config) {
  throwIfCancellationRequested(config);

  // Ensure headers exist
  config.headers = config.headers || {};

  // Transform request data
  config.data = transformData(
    config.data,
    config.headers,
    config.transformRequest
  );

  // Flatten headers
  config.headers = utils.merge(
    config.headers.common || {},
    config.headers[config.method] || {},
    config.headers
  );

  utils.forEach(
    ['delete', 'get', 'head', 'post', 'put', 'patch', 'common'],
    function cleanHeaderConfig(method) {
      delete config.headers[method];
    }
  );

  var adapter = config.adapter || defaults.adapter;

  return adapter(config).then(function onAdapterResolution(response) {
    throwIfCancellationRequested(config);

    // Transform response data
    response.data = transformData(
      response.data,
      response.headers,
      config.transformResponse
    );

    return response;
  }, function onAdapterRejection(reason) {
    if (!isCancel(reason)) {
      throwIfCancellationRequested(config);

      // Transform response data
      if (reason && reason.response) {
        reason.response.data = transformData(
          reason.response.data,
          reason.response.headers,
          config.transformResponse
        );
      }
    }

    return Promise.reject(reason);
  });
};


/***/ }),

/***/ "./node_modules/axios/lib/core/enhanceError.js":
/*!*****************************************************!*\
  !*** ./node_modules/axios/lib/core/enhanceError.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


/**
 * Update an Error with the specified config, error code, and response.
 *
 * @param {Error} error The error to update.
 * @param {Object} config The config.
 * @param {string} [code] The error code (for example, 'ECONNABORTED').
 * @param {Object} [request] The request.
 * @param {Object} [response] The response.
 * @returns {Error} The error.
 */
module.exports = function enhanceError(error, config, code, request, response) {
  error.config = config;
  if (code) {
    error.code = code;
  }

  error.request = request;
  error.response = response;
  error.isAxiosError = true;

  error.toJSON = function() {
    return {
      // Standard
      message: this.message,
      name: this.name,
      // Microsoft
      description: this.description,
      number: this.number,
      // Mozilla
      fileName: this.fileName,
      lineNumber: this.lineNumber,
      columnNumber: this.columnNumber,
      stack: this.stack,
      // Axios
      config: this.config,
      code: this.code
    };
  };
  return error;
};


/***/ }),

/***/ "./node_modules/axios/lib/core/mergeConfig.js":
/*!****************************************************!*\
  !*** ./node_modules/axios/lib/core/mergeConfig.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var utils = __webpack_require__(/*! ../utils */ "./node_modules/axios/lib/utils.js");

/**
 * Config-specific merge-function which creates a new config-object
 * by merging two configuration objects together.
 *
 * @param {Object} config1
 * @param {Object} config2
 * @returns {Object} New object resulting from merging config2 to config1
 */
module.exports = function mergeConfig(config1, config2) {
  // eslint-disable-next-line no-param-reassign
  config2 = config2 || {};
  var config = {};

  var valueFromConfig2Keys = ['url', 'method', 'params', 'data'];
  var mergeDeepPropertiesKeys = ['headers', 'auth', 'proxy'];
  var defaultToConfig2Keys = [
    'baseURL', 'url', 'transformRequest', 'transformResponse', 'paramsSerializer',
    'timeout', 'withCredentials', 'adapter', 'responseType', 'xsrfCookieName',
    'xsrfHeaderName', 'onUploadProgress', 'onDownloadProgress',
    'maxContentLength', 'validateStatus', 'maxRedirects', 'httpAgent',
    'httpsAgent', 'cancelToken', 'socketPath'
  ];

  utils.forEach(valueFromConfig2Keys, function valueFromConfig2(prop) {
    if (typeof config2[prop] !== 'undefined') {
      config[prop] = config2[prop];
    }
  });

  utils.forEach(mergeDeepPropertiesKeys, function mergeDeepProperties(prop) {
    if (utils.isObject(config2[prop])) {
      config[prop] = utils.deepMerge(config1[prop], config2[prop]);
    } else if (typeof config2[prop] !== 'undefined') {
      config[prop] = config2[prop];
    } else if (utils.isObject(config1[prop])) {
      config[prop] = utils.deepMerge(config1[prop]);
    } else if (typeof config1[prop] !== 'undefined') {
      config[prop] = config1[prop];
    }
  });

  utils.forEach(defaultToConfig2Keys, function defaultToConfig2(prop) {
    if (typeof config2[prop] !== 'undefined') {
      config[prop] = config2[prop];
    } else if (typeof config1[prop] !== 'undefined') {
      config[prop] = config1[prop];
    }
  });

  var axiosKeys = valueFromConfig2Keys
    .concat(mergeDeepPropertiesKeys)
    .concat(defaultToConfig2Keys);

  var otherKeys = Object
    .keys(config2)
    .filter(function filterAxiosKeys(key) {
      return axiosKeys.indexOf(key) === -1;
    });

  utils.forEach(otherKeys, function otherKeysDefaultToConfig2(prop) {
    if (typeof config2[prop] !== 'undefined') {
      config[prop] = config2[prop];
    } else if (typeof config1[prop] !== 'undefined') {
      config[prop] = config1[prop];
    }
  });

  return config;
};


/***/ }),

/***/ "./node_modules/axios/lib/core/settle.js":
/*!***********************************************!*\
  !*** ./node_modules/axios/lib/core/settle.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var createError = __webpack_require__(/*! ./createError */ "./node_modules/axios/lib/core/createError.js");

/**
 * Resolve or reject a Promise based on response status.
 *
 * @param {Function} resolve A function that resolves the promise.
 * @param {Function} reject A function that rejects the promise.
 * @param {object} response The response.
 */
module.exports = function settle(resolve, reject, response) {
  var validateStatus = response.config.validateStatus;
  if (!validateStatus || validateStatus(response.status)) {
    resolve(response);
  } else {
    reject(createError(
      'Request failed with status code ' + response.status,
      response.config,
      null,
      response.request,
      response
    ));
  }
};


/***/ }),

/***/ "./node_modules/axios/lib/core/transformData.js":
/*!******************************************************!*\
  !*** ./node_modules/axios/lib/core/transformData.js ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var utils = __webpack_require__(/*! ./../utils */ "./node_modules/axios/lib/utils.js");

/**
 * Transform the data for a request or a response
 *
 * @param {Object|String} data The data to be transformed
 * @param {Array} headers The headers for the request or response
 * @param {Array|Function} fns A single function or Array of functions
 * @returns {*} The resulting transformed data
 */
module.exports = function transformData(data, headers, fns) {
  /*eslint no-param-reassign:0*/
  utils.forEach(fns, function transform(fn) {
    data = fn(data, headers);
  });

  return data;
};


/***/ }),

/***/ "./node_modules/axios/lib/defaults.js":
/*!********************************************!*\
  !*** ./node_modules/axios/lib/defaults.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
/* WEBPACK VAR INJECTION */(function(process) {

var utils = __webpack_require__(/*! ./utils */ "./node_modules/axios/lib/utils.js");
var normalizeHeaderName = __webpack_require__(/*! ./helpers/normalizeHeaderName */ "./node_modules/axios/lib/helpers/normalizeHeaderName.js");

var DEFAULT_CONTENT_TYPE = {
  'Content-Type': 'application/x-www-form-urlencoded'
};

function setContentTypeIfUnset(headers, value) {
  if (!utils.isUndefined(headers) && utils.isUndefined(headers['Content-Type'])) {
    headers['Content-Type'] = value;
  }
}

function getDefaultAdapter() {
  var adapter;
  if (typeof XMLHttpRequest !== 'undefined') {
    // For browsers use XHR adapter
    adapter = __webpack_require__(/*! ./adapters/xhr */ "./node_modules/axios/lib/adapters/xhr.js");
  } else if (typeof process !== 'undefined' && Object.prototype.toString.call(process) === '[object process]') {
    // For node use HTTP adapter
    adapter = __webpack_require__(/*! ./adapters/http */ "./node_modules/axios/lib/adapters/xhr.js");
  }
  return adapter;
}

var defaults = {
  adapter: getDefaultAdapter(),

  transformRequest: [function transformRequest(data, headers) {
    normalizeHeaderName(headers, 'Accept');
    normalizeHeaderName(headers, 'Content-Type');
    if (utils.isFormData(data) ||
      utils.isArrayBuffer(data) ||
      utils.isBuffer(data) ||
      utils.isStream(data) ||
      utils.isFile(data) ||
      utils.isBlob(data)
    ) {
      return data;
    }
    if (utils.isArrayBufferView(data)) {
      return data.buffer;
    }
    if (utils.isURLSearchParams(data)) {
      setContentTypeIfUnset(headers, 'application/x-www-form-urlencoded;charset=utf-8');
      return data.toString();
    }
    if (utils.isObject(data)) {
      setContentTypeIfUnset(headers, 'application/json;charset=utf-8');
      return JSON.stringify(data);
    }
    return data;
  }],

  transformResponse: [function transformResponse(data) {
    /*eslint no-param-reassign:0*/
    if (typeof data === 'string') {
      try {
        data = JSON.parse(data);
      } catch (e) { /* Ignore */ }
    }
    return data;
  }],

  /**
   * A timeout in milliseconds to abort a request. If set to 0 (default) a
   * timeout is not created.
   */
  timeout: 0,

  xsrfCookieName: 'XSRF-TOKEN',
  xsrfHeaderName: 'X-XSRF-TOKEN',

  maxContentLength: -1,

  validateStatus: function validateStatus(status) {
    return status >= 200 && status < 300;
  }
};

defaults.headers = {
  common: {
    'Accept': 'application/json, text/plain, */*'
  }
};

utils.forEach(['delete', 'get', 'head'], function forEachMethodNoData(method) {
  defaults.headers[method] = {};
});

utils.forEach(['post', 'put', 'patch'], function forEachMethodWithData(method) {
  defaults.headers[method] = utils.merge(DEFAULT_CONTENT_TYPE);
});

module.exports = defaults;

/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! ./../../process/browser.js */ "./node_modules/process/browser.js")))

/***/ }),

/***/ "./node_modules/axios/lib/helpers/bind.js":
/*!************************************************!*\
  !*** ./node_modules/axios/lib/helpers/bind.js ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


module.exports = function bind(fn, thisArg) {
  return function wrap() {
    var args = new Array(arguments.length);
    for (var i = 0; i < args.length; i++) {
      args[i] = arguments[i];
    }
    return fn.apply(thisArg, args);
  };
};


/***/ }),

/***/ "./node_modules/axios/lib/helpers/buildURL.js":
/*!****************************************************!*\
  !*** ./node_modules/axios/lib/helpers/buildURL.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var utils = __webpack_require__(/*! ./../utils */ "./node_modules/axios/lib/utils.js");

function encode(val) {
  return encodeURIComponent(val).
    replace(/%40/gi, '@').
    replace(/%3A/gi, ':').
    replace(/%24/g, '$').
    replace(/%2C/gi, ',').
    replace(/%20/g, '+').
    replace(/%5B/gi, '[').
    replace(/%5D/gi, ']');
}

/**
 * Build a URL by appending params to the end
 *
 * @param {string} url The base of the url (e.g., http://www.google.com)
 * @param {object} [params] The params to be appended
 * @returns {string} The formatted url
 */
module.exports = function buildURL(url, params, paramsSerializer) {
  /*eslint no-param-reassign:0*/
  if (!params) {
    return url;
  }

  var serializedParams;
  if (paramsSerializer) {
    serializedParams = paramsSerializer(params);
  } else if (utils.isURLSearchParams(params)) {
    serializedParams = params.toString();
  } else {
    var parts = [];

    utils.forEach(params, function serialize(val, key) {
      if (val === null || typeof val === 'undefined') {
        return;
      }

      if (utils.isArray(val)) {
        key = key + '[]';
      } else {
        val = [val];
      }

      utils.forEach(val, function parseValue(v) {
        if (utils.isDate(v)) {
          v = v.toISOString();
        } else if (utils.isObject(v)) {
          v = JSON.stringify(v);
        }
        parts.push(encode(key) + '=' + encode(v));
      });
    });

    serializedParams = parts.join('&');
  }

  if (serializedParams) {
    var hashmarkIndex = url.indexOf('#');
    if (hashmarkIndex !== -1) {
      url = url.slice(0, hashmarkIndex);
    }

    url += (url.indexOf('?') === -1 ? '?' : '&') + serializedParams;
  }

  return url;
};


/***/ }),

/***/ "./node_modules/axios/lib/helpers/combineURLs.js":
/*!*******************************************************!*\
  !*** ./node_modules/axios/lib/helpers/combineURLs.js ***!
  \*******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


/**
 * Creates a new URL by combining the specified URLs
 *
 * @param {string} baseURL The base URL
 * @param {string} relativeURL The relative URL
 * @returns {string} The combined URL
 */
module.exports = function combineURLs(baseURL, relativeURL) {
  return relativeURL
    ? baseURL.replace(/\/+$/, '') + '/' + relativeURL.replace(/^\/+/, '')
    : baseURL;
};


/***/ }),

/***/ "./node_modules/axios/lib/helpers/cookies.js":
/*!***************************************************!*\
  !*** ./node_modules/axios/lib/helpers/cookies.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var utils = __webpack_require__(/*! ./../utils */ "./node_modules/axios/lib/utils.js");

module.exports = (
  utils.isStandardBrowserEnv() ?

  // Standard browser envs support document.cookie
    (function standardBrowserEnv() {
      return {
        write: function write(name, value, expires, path, domain, secure) {
          var cookie = [];
          cookie.push(name + '=' + encodeURIComponent(value));

          if (utils.isNumber(expires)) {
            cookie.push('expires=' + new Date(expires).toGMTString());
          }

          if (utils.isString(path)) {
            cookie.push('path=' + path);
          }

          if (utils.isString(domain)) {
            cookie.push('domain=' + domain);
          }

          if (secure === true) {
            cookie.push('secure');
          }

          document.cookie = cookie.join('; ');
        },

        read: function read(name) {
          var match = document.cookie.match(new RegExp('(^|;\\s*)(' + name + ')=([^;]*)'));
          return (match ? decodeURIComponent(match[3]) : null);
        },

        remove: function remove(name) {
          this.write(name, '', Date.now() - 86400000);
        }
      };
    })() :

  // Non standard browser env (web workers, react-native) lack needed support.
    (function nonStandardBrowserEnv() {
      return {
        write: function write() {},
        read: function read() { return null; },
        remove: function remove() {}
      };
    })()
);


/***/ }),

/***/ "./node_modules/axios/lib/helpers/isAbsoluteURL.js":
/*!*********************************************************!*\
  !*** ./node_modules/axios/lib/helpers/isAbsoluteURL.js ***!
  \*********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


/**
 * Determines whether the specified URL is absolute
 *
 * @param {string} url The URL to test
 * @returns {boolean} True if the specified URL is absolute, otherwise false
 */
module.exports = function isAbsoluteURL(url) {
  // A URL is considered absolute if it begins with "<scheme>://" or "//" (protocol-relative URL).
  // RFC 3986 defines scheme name as a sequence of characters beginning with a letter and followed
  // by any combination of letters, digits, plus, period, or hyphen.
  return /^([a-z][a-z\d\+\-\.]*:)?\/\//i.test(url);
};


/***/ }),

/***/ "./node_modules/axios/lib/helpers/isURLSameOrigin.js":
/*!***********************************************************!*\
  !*** ./node_modules/axios/lib/helpers/isURLSameOrigin.js ***!
  \***********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var utils = __webpack_require__(/*! ./../utils */ "./node_modules/axios/lib/utils.js");

module.exports = (
  utils.isStandardBrowserEnv() ?

  // Standard browser envs have full support of the APIs needed to test
  // whether the request URL is of the same origin as current location.
    (function standardBrowserEnv() {
      var msie = /(msie|trident)/i.test(navigator.userAgent);
      var urlParsingNode = document.createElement('a');
      var originURL;

      /**
    * Parse a URL to discover it's components
    *
    * @param {String} url The URL to be parsed
    * @returns {Object}
    */
      function resolveURL(url) {
        var href = url;

        if (msie) {
        // IE needs attribute set twice to normalize properties
          urlParsingNode.setAttribute('href', href);
          href = urlParsingNode.href;
        }

        urlParsingNode.setAttribute('href', href);

        // urlParsingNode provides the UrlUtils interface - http://url.spec.whatwg.org/#urlutils
        return {
          href: urlParsingNode.href,
          protocol: urlParsingNode.protocol ? urlParsingNode.protocol.replace(/:$/, '') : '',
          host: urlParsingNode.host,
          search: urlParsingNode.search ? urlParsingNode.search.replace(/^\?/, '') : '',
          hash: urlParsingNode.hash ? urlParsingNode.hash.replace(/^#/, '') : '',
          hostname: urlParsingNode.hostname,
          port: urlParsingNode.port,
          pathname: (urlParsingNode.pathname.charAt(0) === '/') ?
            urlParsingNode.pathname :
            '/' + urlParsingNode.pathname
        };
      }

      originURL = resolveURL(window.location.href);

      /**
    * Determine if a URL shares the same origin as the current location
    *
    * @param {String} requestURL The URL to test
    * @returns {boolean} True if URL shares the same origin, otherwise false
    */
      return function isURLSameOrigin(requestURL) {
        var parsed = (utils.isString(requestURL)) ? resolveURL(requestURL) : requestURL;
        return (parsed.protocol === originURL.protocol &&
            parsed.host === originURL.host);
      };
    })() :

  // Non standard browser envs (web workers, react-native) lack needed support.
    (function nonStandardBrowserEnv() {
      return function isURLSameOrigin() {
        return true;
      };
    })()
);


/***/ }),

/***/ "./node_modules/axios/lib/helpers/normalizeHeaderName.js":
/*!***************************************************************!*\
  !*** ./node_modules/axios/lib/helpers/normalizeHeaderName.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var utils = __webpack_require__(/*! ../utils */ "./node_modules/axios/lib/utils.js");

module.exports = function normalizeHeaderName(headers, normalizedName) {
  utils.forEach(headers, function processHeader(value, name) {
    if (name !== normalizedName && name.toUpperCase() === normalizedName.toUpperCase()) {
      headers[normalizedName] = value;
      delete headers[name];
    }
  });
};


/***/ }),

/***/ "./node_modules/axios/lib/helpers/parseHeaders.js":
/*!********************************************************!*\
  !*** ./node_modules/axios/lib/helpers/parseHeaders.js ***!
  \********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var utils = __webpack_require__(/*! ./../utils */ "./node_modules/axios/lib/utils.js");

// Headers whose duplicates are ignored by node
// c.f. https://nodejs.org/api/http.html#http_message_headers
var ignoreDuplicateOf = [
  'age', 'authorization', 'content-length', 'content-type', 'etag',
  'expires', 'from', 'host', 'if-modified-since', 'if-unmodified-since',
  'last-modified', 'location', 'max-forwards', 'proxy-authorization',
  'referer', 'retry-after', 'user-agent'
];

/**
 * Parse headers into an object
 *
 * ```
 * Date: Wed, 27 Aug 2014 08:58:49 GMT
 * Content-Type: application/json
 * Connection: keep-alive
 * Transfer-Encoding: chunked
 * ```
 *
 * @param {String} headers Headers needing to be parsed
 * @returns {Object} Headers parsed into an object
 */
module.exports = function parseHeaders(headers) {
  var parsed = {};
  var key;
  var val;
  var i;

  if (!headers) { return parsed; }

  utils.forEach(headers.split('\n'), function parser(line) {
    i = line.indexOf(':');
    key = utils.trim(line.substr(0, i)).toLowerCase();
    val = utils.trim(line.substr(i + 1));

    if (key) {
      if (parsed[key] && ignoreDuplicateOf.indexOf(key) >= 0) {
        return;
      }
      if (key === 'set-cookie') {
        parsed[key] = (parsed[key] ? parsed[key] : []).concat([val]);
      } else {
        parsed[key] = parsed[key] ? parsed[key] + ', ' + val : val;
      }
    }
  });

  return parsed;
};


/***/ }),

/***/ "./node_modules/axios/lib/helpers/spread.js":
/*!**************************************************!*\
  !*** ./node_modules/axios/lib/helpers/spread.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


/**
 * Syntactic sugar for invoking a function and expanding an array for arguments.
 *
 * Common use case would be to use `Function.prototype.apply`.
 *
 *  ```js
 *  function f(x, y, z) {}
 *  var args = [1, 2, 3];
 *  f.apply(null, args);
 *  ```
 *
 * With `spread` this example can be re-written.
 *
 *  ```js
 *  spread(function(x, y, z) {})([1, 2, 3]);
 *  ```
 *
 * @param {Function} callback
 * @returns {Function}
 */
module.exports = function spread(callback) {
  return function wrap(arr) {
    return callback.apply(null, arr);
  };
};


/***/ }),

/***/ "./node_modules/axios/lib/utils.js":
/*!*****************************************!*\
  !*** ./node_modules/axios/lib/utils.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";


var bind = __webpack_require__(/*! ./helpers/bind */ "./node_modules/axios/lib/helpers/bind.js");

/*global toString:true*/

// utils is a library of generic helper functions non-specific to axios

var toString = Object.prototype.toString;

/**
 * Determine if a value is an Array
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is an Array, otherwise false
 */
function isArray(val) {
  return toString.call(val) === '[object Array]';
}

/**
 * Determine if a value is undefined
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if the value is undefined, otherwise false
 */
function isUndefined(val) {
  return typeof val === 'undefined';
}

/**
 * Determine if a value is a Buffer
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a Buffer, otherwise false
 */
function isBuffer(val) {
  return val !== null && !isUndefined(val) && val.constructor !== null && !isUndefined(val.constructor)
    && typeof val.constructor.isBuffer === 'function' && val.constructor.isBuffer(val);
}

/**
 * Determine if a value is an ArrayBuffer
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is an ArrayBuffer, otherwise false
 */
function isArrayBuffer(val) {
  return toString.call(val) === '[object ArrayBuffer]';
}

/**
 * Determine if a value is a FormData
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is an FormData, otherwise false
 */
function isFormData(val) {
  return (typeof FormData !== 'undefined') && (val instanceof FormData);
}

/**
 * Determine if a value is a view on an ArrayBuffer
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a view on an ArrayBuffer, otherwise false
 */
function isArrayBufferView(val) {
  var result;
  if ((typeof ArrayBuffer !== 'undefined') && (ArrayBuffer.isView)) {
    result = ArrayBuffer.isView(val);
  } else {
    result = (val) && (val.buffer) && (val.buffer instanceof ArrayBuffer);
  }
  return result;
}

/**
 * Determine if a value is a String
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a String, otherwise false
 */
function isString(val) {
  return typeof val === 'string';
}

/**
 * Determine if a value is a Number
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a Number, otherwise false
 */
function isNumber(val) {
  return typeof val === 'number';
}

/**
 * Determine if a value is an Object
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is an Object, otherwise false
 */
function isObject(val) {
  return val !== null && typeof val === 'object';
}

/**
 * Determine if a value is a Date
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a Date, otherwise false
 */
function isDate(val) {
  return toString.call(val) === '[object Date]';
}

/**
 * Determine if a value is a File
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a File, otherwise false
 */
function isFile(val) {
  return toString.call(val) === '[object File]';
}

/**
 * Determine if a value is a Blob
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a Blob, otherwise false
 */
function isBlob(val) {
  return toString.call(val) === '[object Blob]';
}

/**
 * Determine if a value is a Function
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a Function, otherwise false
 */
function isFunction(val) {
  return toString.call(val) === '[object Function]';
}

/**
 * Determine if a value is a Stream
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a Stream, otherwise false
 */
function isStream(val) {
  return isObject(val) && isFunction(val.pipe);
}

/**
 * Determine if a value is a URLSearchParams object
 *
 * @param {Object} val The value to test
 * @returns {boolean} True if value is a URLSearchParams object, otherwise false
 */
function isURLSearchParams(val) {
  return typeof URLSearchParams !== 'undefined' && val instanceof URLSearchParams;
}

/**
 * Trim excess whitespace off the beginning and end of a string
 *
 * @param {String} str The String to trim
 * @returns {String} The String freed of excess whitespace
 */
function trim(str) {
  return str.replace(/^\s*/, '').replace(/\s*$/, '');
}

/**
 * Determine if we're running in a standard browser environment
 *
 * This allows axios to run in a web worker, and react-native.
 * Both environments support XMLHttpRequest, but not fully standard globals.
 *
 * web workers:
 *  typeof window -> undefined
 *  typeof document -> undefined
 *
 * react-native:
 *  navigator.product -> 'ReactNative'
 * nativescript
 *  navigator.product -> 'NativeScript' or 'NS'
 */
function isStandardBrowserEnv() {
  if (typeof navigator !== 'undefined' && (navigator.product === 'ReactNative' ||
                                           navigator.product === 'NativeScript' ||
                                           navigator.product === 'NS')) {
    return false;
  }
  return (
    typeof window !== 'undefined' &&
    typeof document !== 'undefined'
  );
}

/**
 * Iterate over an Array or an Object invoking a function for each item.
 *
 * If `obj` is an Array callback will be called passing
 * the value, index, and complete array for each item.
 *
 * If 'obj' is an Object callback will be called passing
 * the value, key, and complete object for each property.
 *
 * @param {Object|Array} obj The object to iterate
 * @param {Function} fn The callback to invoke for each item
 */
function forEach(obj, fn) {
  // Don't bother if no value provided
  if (obj === null || typeof obj === 'undefined') {
    return;
  }

  // Force an array if not already something iterable
  if (typeof obj !== 'object') {
    /*eslint no-param-reassign:0*/
    obj = [obj];
  }

  if (isArray(obj)) {
    // Iterate over array values
    for (var i = 0, l = obj.length; i < l; i++) {
      fn.call(null, obj[i], i, obj);
    }
  } else {
    // Iterate over object keys
    for (var key in obj) {
      if (Object.prototype.hasOwnProperty.call(obj, key)) {
        fn.call(null, obj[key], key, obj);
      }
    }
  }
}

/**
 * Accepts varargs expecting each argument to be an object, then
 * immutably merges the properties of each object and returns result.
 *
 * When multiple objects contain the same key the later object in
 * the arguments list will take precedence.
 *
 * Example:
 *
 * ```js
 * var result = merge({foo: 123}, {foo: 456});
 * console.log(result.foo); // outputs 456
 * ```
 *
 * @param {Object} obj1 Object to merge
 * @returns {Object} Result of all merge properties
 */
function merge(/* obj1, obj2, obj3, ... */) {
  var result = {};
  function assignValue(val, key) {
    if (typeof result[key] === 'object' && typeof val === 'object') {
      result[key] = merge(result[key], val);
    } else {
      result[key] = val;
    }
  }

  for (var i = 0, l = arguments.length; i < l; i++) {
    forEach(arguments[i], assignValue);
  }
  return result;
}

/**
 * Function equal to merge with the difference being that no reference
 * to original objects is kept.
 *
 * @see merge
 * @param {Object} obj1 Object to merge
 * @returns {Object} Result of all merge properties
 */
function deepMerge(/* obj1, obj2, obj3, ... */) {
  var result = {};
  function assignValue(val, key) {
    if (typeof result[key] === 'object' && typeof val === 'object') {
      result[key] = deepMerge(result[key], val);
    } else if (typeof val === 'object') {
      result[key] = deepMerge({}, val);
    } else {
      result[key] = val;
    }
  }

  for (var i = 0, l = arguments.length; i < l; i++) {
    forEach(arguments[i], assignValue);
  }
  return result;
}

/**
 * Extends object a by mutably adding to it the properties of object b.
 *
 * @param {Object} a The object to be extended
 * @param {Object} b The object to copy properties from
 * @param {Object} thisArg The object to bind function to
 * @return {Object} The resulting value of object a
 */
function extend(a, b, thisArg) {
  forEach(b, function assignValue(val, key) {
    if (thisArg && typeof val === 'function') {
      a[key] = bind(val, thisArg);
    } else {
      a[key] = val;
    }
  });
  return a;
}

module.exports = {
  isArray: isArray,
  isArrayBuffer: isArrayBuffer,
  isBuffer: isBuffer,
  isFormData: isFormData,
  isArrayBufferView: isArrayBufferView,
  isString: isString,
  isNumber: isNumber,
  isObject: isObject,
  isUndefined: isUndefined,
  isDate: isDate,
  isFile: isFile,
  isBlob: isBlob,
  isFunction: isFunction,
  isStream: isStream,
  isURLSearchParams: isURLSearchParams,
  isStandardBrowserEnv: isStandardBrowserEnv,
  forEach: forEach,
  merge: merge,
  deepMerge: deepMerge,
  extend: extend,
  trim: trim
};


/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/notification.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/notification.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
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
//
 // import Auth from '../store/auth'
// import Images from './helpers/images'
// import Locale from './helpers/locale'
// import {get} from './helpers/api'

/* harmony default export */ __webpack_exports__["default"] = ({
  created: function created() {// Auth.initialize()
  },
  data: function data() {
    return {
      flash: _helpers_flash__WEBPACK_IMPORTED_MODULE_0__["default"].state,
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

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/notification.vue?vue&type=style&index=0&lang=css&":
/*!******************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--7-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--7-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/notification.vue?vue&type=style&index=0&lang=css& ***!
  \******************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "*{\n  box-sizing: border-box;\n}\n\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/css-loader/lib/css-base.js":
/*!*************************************************!*\
  !*** ./node_modules/css-loader/lib/css-base.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*
	MIT License http://www.opensource.org/licenses/mit-license.php
	Author Tobias Koppers @sokra
*/
// css base code, injected by the css-loader
module.exports = function(useSourceMap) {
	var list = [];

	// return the list of modules as css string
	list.toString = function toString() {
		return this.map(function (item) {
			var content = cssWithMappingToString(item, useSourceMap);
			if(item[2]) {
				return "@media " + item[2] + "{" + content + "}";
			} else {
				return content;
			}
		}).join("");
	};

	// import a list of modules into the list
	list.i = function(modules, mediaQuery) {
		if(typeof modules === "string")
			modules = [[null, modules, ""]];
		var alreadyImportedModules = {};
		for(var i = 0; i < this.length; i++) {
			var id = this[i][0];
			if(typeof id === "number")
				alreadyImportedModules[id] = true;
		}
		for(i = 0; i < modules.length; i++) {
			var item = modules[i];
			// skip already imported module
			// this implementation is not 100% perfect for weird media query combinations
			//  when a module is imported multiple times with different media queries.
			//  I hope this will never occur (Hey this way we have smaller bundles)
			if(typeof item[0] !== "number" || !alreadyImportedModules[item[0]]) {
				if(mediaQuery && !item[2]) {
					item[2] = mediaQuery;
				} else if(mediaQuery) {
					item[2] = "(" + item[2] + ") and (" + mediaQuery + ")";
				}
				list.push(item);
			}
		}
	};
	return list;
};

function cssWithMappingToString(item, useSourceMap) {
	var content = item[1] || '';
	var cssMapping = item[3];
	if (!cssMapping) {
		return content;
	}

	if (useSourceMap && typeof btoa === 'function') {
		var sourceMapping = toComment(cssMapping);
		var sourceURLs = cssMapping.sources.map(function (source) {
			return '/*# sourceURL=' + cssMapping.sourceRoot + source + ' */'
		});

		return [content].concat(sourceURLs).concat([sourceMapping]).join('\n');
	}

	return [content].join('\n');
}

// Adapted from convert-source-map (MIT)
function toComment(sourceMap) {
	// eslint-disable-next-line no-undef
	var base64 = btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap))));
	var data = 'sourceMappingURL=data:application/json;charset=utf-8;base64,' + base64;

	return '/*# ' + data + ' */';
}


/***/ }),

/***/ "./node_modules/process/browser.js":
/*!*****************************************!*\
  !*** ./node_modules/process/browser.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// shim for using process in browser
var process = module.exports = {};

// cached from whatever global is present so that test runners that stub it
// don't break things.  But we need to wrap it in a try catch in case it is
// wrapped in strict mode code which doesn't define any globals.  It's inside a
// function because try/catches deoptimize in certain engines.

var cachedSetTimeout;
var cachedClearTimeout;

function defaultSetTimout() {
    throw new Error('setTimeout has not been defined');
}
function defaultClearTimeout () {
    throw new Error('clearTimeout has not been defined');
}
(function () {
    try {
        if (typeof setTimeout === 'function') {
            cachedSetTimeout = setTimeout;
        } else {
            cachedSetTimeout = defaultSetTimout;
        }
    } catch (e) {
        cachedSetTimeout = defaultSetTimout;
    }
    try {
        if (typeof clearTimeout === 'function') {
            cachedClearTimeout = clearTimeout;
        } else {
            cachedClearTimeout = defaultClearTimeout;
        }
    } catch (e) {
        cachedClearTimeout = defaultClearTimeout;
    }
} ())
function runTimeout(fun) {
    if (cachedSetTimeout === setTimeout) {
        //normal enviroments in sane situations
        return setTimeout(fun, 0);
    }
    // if setTimeout wasn't available but was latter defined
    if ((cachedSetTimeout === defaultSetTimout || !cachedSetTimeout) && setTimeout) {
        cachedSetTimeout = setTimeout;
        return setTimeout(fun, 0);
    }
    try {
        // when when somebody has screwed with setTimeout but no I.E. maddness
        return cachedSetTimeout(fun, 0);
    } catch(e){
        try {
            // When we are in I.E. but the script has been evaled so I.E. doesn't trust the global object when called normally
            return cachedSetTimeout.call(null, fun, 0);
        } catch(e){
            // same as above but when it's a version of I.E. that must have the global object for 'this', hopfully our context correct otherwise it will throw a global error
            return cachedSetTimeout.call(this, fun, 0);
        }
    }


}
function runClearTimeout(marker) {
    if (cachedClearTimeout === clearTimeout) {
        //normal enviroments in sane situations
        return clearTimeout(marker);
    }
    // if clearTimeout wasn't available but was latter defined
    if ((cachedClearTimeout === defaultClearTimeout || !cachedClearTimeout) && clearTimeout) {
        cachedClearTimeout = clearTimeout;
        return clearTimeout(marker);
    }
    try {
        // when when somebody has screwed with setTimeout but no I.E. maddness
        return cachedClearTimeout(marker);
    } catch (e){
        try {
            // When we are in I.E. but the script has been evaled so I.E. doesn't  trust the global object when called normally
            return cachedClearTimeout.call(null, marker);
        } catch (e){
            // same as above but when it's a version of I.E. that must have the global object for 'this', hopfully our context correct otherwise it will throw a global error.
            // Some versions of I.E. have different rules for clearTimeout vs setTimeout
            return cachedClearTimeout.call(this, marker);
        }
    }



}
var queue = [];
var draining = false;
var currentQueue;
var queueIndex = -1;

function cleanUpNextTick() {
    if (!draining || !currentQueue) {
        return;
    }
    draining = false;
    if (currentQueue.length) {
        queue = currentQueue.concat(queue);
    } else {
        queueIndex = -1;
    }
    if (queue.length) {
        drainQueue();
    }
}

function drainQueue() {
    if (draining) {
        return;
    }
    var timeout = runTimeout(cleanUpNextTick);
    draining = true;

    var len = queue.length;
    while(len) {
        currentQueue = queue;
        queue = [];
        while (++queueIndex < len) {
            if (currentQueue) {
                currentQueue[queueIndex].run();
            }
        }
        queueIndex = -1;
        len = queue.length;
    }
    currentQueue = null;
    draining = false;
    runClearTimeout(timeout);
}

process.nextTick = function (fun) {
    var args = new Array(arguments.length - 1);
    if (arguments.length > 1) {
        for (var i = 1; i < arguments.length; i++) {
            args[i - 1] = arguments[i];
        }
    }
    queue.push(new Item(fun, args));
    if (queue.length === 1 && !draining) {
        runTimeout(drainQueue);
    }
};

// v8 likes predictible objects
function Item(fun, array) {
    this.fun = fun;
    this.array = array;
}
Item.prototype.run = function () {
    this.fun.apply(null, this.array);
};
process.title = 'browser';
process.browser = true;
process.env = {};
process.argv = [];
process.version = ''; // empty string to avoid regexp issues
process.versions = {};

function noop() {}

process.on = noop;
process.addListener = noop;
process.once = noop;
process.off = noop;
process.removeListener = noop;
process.removeAllListeners = noop;
process.emit = noop;
process.prependListener = noop;
process.prependOnceListener = noop;

process.listeners = function (name) { return [] }

process.binding = function (name) {
    throw new Error('process.binding is not supported');
};

process.cwd = function () { return '/' };
process.chdir = function (dir) {
    throw new Error('process.chdir is not supported');
};
process.umask = function() { return 0; };


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/notification.vue?vue&type=style&index=0&lang=css&":
/*!**********************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--7-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--7-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/notification.vue?vue&type=style&index=0&lang=css& ***!
  \**********************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../node_modules/css-loader??ref--7-1!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/src??ref--7-2!../../../node_modules/vue-loader/lib??vue-loader-options!./notification.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/notification.vue?vue&type=style&index=0&lang=css&");

if(typeof content === 'string') content = [[module.i, content, '']];

var transform;
var insertInto;



var options = {"hmr":true}

options.transform = transform
options.insertInto = undefined;

var update = __webpack_require__(/*! ../../../node_modules/style-loader/lib/addStyles.js */ "./node_modules/style-loader/lib/addStyles.js")(content, options);

if(content.locals) module.exports = content.locals;

if(false) {}

/***/ }),

/***/ "./node_modules/style-loader/lib/addStyles.js":
/*!****************************************************!*\
  !*** ./node_modules/style-loader/lib/addStyles.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/*
	MIT License http://www.opensource.org/licenses/mit-license.php
	Author Tobias Koppers @sokra
*/

var stylesInDom = {};

var	memoize = function (fn) {
	var memo;

	return function () {
		if (typeof memo === "undefined") memo = fn.apply(this, arguments);
		return memo;
	};
};

var isOldIE = memoize(function () {
	// Test for IE <= 9 as proposed by Browserhacks
	// @see http://browserhacks.com/#hack-e71d8692f65334173fee715c222cb805
	// Tests for existence of standard globals is to allow style-loader
	// to operate correctly into non-standard environments
	// @see https://github.com/webpack-contrib/style-loader/issues/177
	return window && document && document.all && !window.atob;
});

var getTarget = function (target, parent) {
  if (parent){
    return parent.querySelector(target);
  }
  return document.querySelector(target);
};

var getElement = (function (fn) {
	var memo = {};

	return function(target, parent) {
                // If passing function in options, then use it for resolve "head" element.
                // Useful for Shadow Root style i.e
                // {
                //   insertInto: function () { return document.querySelector("#foo").shadowRoot }
                // }
                if (typeof target === 'function') {
                        return target();
                }
                if (typeof memo[target] === "undefined") {
			var styleTarget = getTarget.call(this, target, parent);
			// Special case to return head of iframe instead of iframe itself
			if (window.HTMLIFrameElement && styleTarget instanceof window.HTMLIFrameElement) {
				try {
					// This will throw an exception if access to iframe is blocked
					// due to cross-origin restrictions
					styleTarget = styleTarget.contentDocument.head;
				} catch(e) {
					styleTarget = null;
				}
			}
			memo[target] = styleTarget;
		}
		return memo[target]
	};
})();

var singleton = null;
var	singletonCounter = 0;
var	stylesInsertedAtTop = [];

var	fixUrls = __webpack_require__(/*! ./urls */ "./node_modules/style-loader/lib/urls.js");

module.exports = function(list, options) {
	if (typeof DEBUG !== "undefined" && DEBUG) {
		if (typeof document !== "object") throw new Error("The style-loader cannot be used in a non-browser environment");
	}

	options = options || {};

	options.attrs = typeof options.attrs === "object" ? options.attrs : {};

	// Force single-tag solution on IE6-9, which has a hard limit on the # of <style>
	// tags it will allow on a page
	if (!options.singleton && typeof options.singleton !== "boolean") options.singleton = isOldIE();

	// By default, add <style> tags to the <head> element
        if (!options.insertInto) options.insertInto = "head";

	// By default, add <style> tags to the bottom of the target
	if (!options.insertAt) options.insertAt = "bottom";

	var styles = listToStyles(list, options);

	addStylesToDom(styles, options);

	return function update (newList) {
		var mayRemove = [];

		for (var i = 0; i < styles.length; i++) {
			var item = styles[i];
			var domStyle = stylesInDom[item.id];

			domStyle.refs--;
			mayRemove.push(domStyle);
		}

		if(newList) {
			var newStyles = listToStyles(newList, options);
			addStylesToDom(newStyles, options);
		}

		for (var i = 0; i < mayRemove.length; i++) {
			var domStyle = mayRemove[i];

			if(domStyle.refs === 0) {
				for (var j = 0; j < domStyle.parts.length; j++) domStyle.parts[j]();

				delete stylesInDom[domStyle.id];
			}
		}
	};
};

function addStylesToDom (styles, options) {
	for (var i = 0; i < styles.length; i++) {
		var item = styles[i];
		var domStyle = stylesInDom[item.id];

		if(domStyle) {
			domStyle.refs++;

			for(var j = 0; j < domStyle.parts.length; j++) {
				domStyle.parts[j](item.parts[j]);
			}

			for(; j < item.parts.length; j++) {
				domStyle.parts.push(addStyle(item.parts[j], options));
			}
		} else {
			var parts = [];

			for(var j = 0; j < item.parts.length; j++) {
				parts.push(addStyle(item.parts[j], options));
			}

			stylesInDom[item.id] = {id: item.id, refs: 1, parts: parts};
		}
	}
}

function listToStyles (list, options) {
	var styles = [];
	var newStyles = {};

	for (var i = 0; i < list.length; i++) {
		var item = list[i];
		var id = options.base ? item[0] + options.base : item[0];
		var css = item[1];
		var media = item[2];
		var sourceMap = item[3];
		var part = {css: css, media: media, sourceMap: sourceMap};

		if(!newStyles[id]) styles.push(newStyles[id] = {id: id, parts: [part]});
		else newStyles[id].parts.push(part);
	}

	return styles;
}

function insertStyleElement (options, style) {
	var target = getElement(options.insertInto)

	if (!target) {
		throw new Error("Couldn't find a style target. This probably means that the value for the 'insertInto' parameter is invalid.");
	}

	var lastStyleElementInsertedAtTop = stylesInsertedAtTop[stylesInsertedAtTop.length - 1];

	if (options.insertAt === "top") {
		if (!lastStyleElementInsertedAtTop) {
			target.insertBefore(style, target.firstChild);
		} else if (lastStyleElementInsertedAtTop.nextSibling) {
			target.insertBefore(style, lastStyleElementInsertedAtTop.nextSibling);
		} else {
			target.appendChild(style);
		}
		stylesInsertedAtTop.push(style);
	} else if (options.insertAt === "bottom") {
		target.appendChild(style);
	} else if (typeof options.insertAt === "object" && options.insertAt.before) {
		var nextSibling = getElement(options.insertAt.before, target);
		target.insertBefore(style, nextSibling);
	} else {
		throw new Error("[Style Loader]\n\n Invalid value for parameter 'insertAt' ('options.insertAt') found.\n Must be 'top', 'bottom', or Object.\n (https://github.com/webpack-contrib/style-loader#insertat)\n");
	}
}

function removeStyleElement (style) {
	if (style.parentNode === null) return false;
	style.parentNode.removeChild(style);

	var idx = stylesInsertedAtTop.indexOf(style);
	if(idx >= 0) {
		stylesInsertedAtTop.splice(idx, 1);
	}
}

function createStyleElement (options) {
	var style = document.createElement("style");

	if(options.attrs.type === undefined) {
		options.attrs.type = "text/css";
	}

	if(options.attrs.nonce === undefined) {
		var nonce = getNonce();
		if (nonce) {
			options.attrs.nonce = nonce;
		}
	}

	addAttrs(style, options.attrs);
	insertStyleElement(options, style);

	return style;
}

function createLinkElement (options) {
	var link = document.createElement("link");

	if(options.attrs.type === undefined) {
		options.attrs.type = "text/css";
	}
	options.attrs.rel = "stylesheet";

	addAttrs(link, options.attrs);
	insertStyleElement(options, link);

	return link;
}

function addAttrs (el, attrs) {
	Object.keys(attrs).forEach(function (key) {
		el.setAttribute(key, attrs[key]);
	});
}

function getNonce() {
	if (false) {}

	return __webpack_require__.nc;
}

function addStyle (obj, options) {
	var style, update, remove, result;

	// If a transform function was defined, run it on the css
	if (options.transform && obj.css) {
	    result = typeof options.transform === 'function'
		 ? options.transform(obj.css) 
		 : options.transform.default(obj.css);

	    if (result) {
	    	// If transform returns a value, use that instead of the original css.
	    	// This allows running runtime transformations on the css.
	    	obj.css = result;
	    } else {
	    	// If the transform function returns a falsy value, don't add this css.
	    	// This allows conditional loading of css
	    	return function() {
	    		// noop
	    	};
	    }
	}

	if (options.singleton) {
		var styleIndex = singletonCounter++;

		style = singleton || (singleton = createStyleElement(options));

		update = applyToSingletonTag.bind(null, style, styleIndex, false);
		remove = applyToSingletonTag.bind(null, style, styleIndex, true);

	} else if (
		obj.sourceMap &&
		typeof URL === "function" &&
		typeof URL.createObjectURL === "function" &&
		typeof URL.revokeObjectURL === "function" &&
		typeof Blob === "function" &&
		typeof btoa === "function"
	) {
		style = createLinkElement(options);
		update = updateLink.bind(null, style, options);
		remove = function () {
			removeStyleElement(style);

			if(style.href) URL.revokeObjectURL(style.href);
		};
	} else {
		style = createStyleElement(options);
		update = applyToTag.bind(null, style);
		remove = function () {
			removeStyleElement(style);
		};
	}

	update(obj);

	return function updateStyle (newObj) {
		if (newObj) {
			if (
				newObj.css === obj.css &&
				newObj.media === obj.media &&
				newObj.sourceMap === obj.sourceMap
			) {
				return;
			}

			update(obj = newObj);
		} else {
			remove();
		}
	};
}

var replaceText = (function () {
	var textStore = [];

	return function (index, replacement) {
		textStore[index] = replacement;

		return textStore.filter(Boolean).join('\n');
	};
})();

function applyToSingletonTag (style, index, remove, obj) {
	var css = remove ? "" : obj.css;

	if (style.styleSheet) {
		style.styleSheet.cssText = replaceText(index, css);
	} else {
		var cssNode = document.createTextNode(css);
		var childNodes = style.childNodes;

		if (childNodes[index]) style.removeChild(childNodes[index]);

		if (childNodes.length) {
			style.insertBefore(cssNode, childNodes[index]);
		} else {
			style.appendChild(cssNode);
		}
	}
}

function applyToTag (style, obj) {
	var css = obj.css;
	var media = obj.media;

	if(media) {
		style.setAttribute("media", media)
	}

	if(style.styleSheet) {
		style.styleSheet.cssText = css;
	} else {
		while(style.firstChild) {
			style.removeChild(style.firstChild);
		}

		style.appendChild(document.createTextNode(css));
	}
}

function updateLink (link, options, obj) {
	var css = obj.css;
	var sourceMap = obj.sourceMap;

	/*
		If convertToAbsoluteUrls isn't defined, but sourcemaps are enabled
		and there is no publicPath defined then lets turn convertToAbsoluteUrls
		on by default.  Otherwise default to the convertToAbsoluteUrls option
		directly
	*/
	var autoFixUrls = options.convertToAbsoluteUrls === undefined && sourceMap;

	if (options.convertToAbsoluteUrls || autoFixUrls) {
		css = fixUrls(css);
	}

	if (sourceMap) {
		// http://stackoverflow.com/a/26603875
		css += "\n/*# sourceMappingURL=data:application/json;base64," + btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap)))) + " */";
	}

	var blob = new Blob([css], { type: "text/css" });

	var oldSrc = link.href;

	link.href = URL.createObjectURL(blob);

	if(oldSrc) URL.revokeObjectURL(oldSrc);
}


/***/ }),

/***/ "./node_modules/style-loader/lib/urls.js":
/*!***********************************************!*\
  !*** ./node_modules/style-loader/lib/urls.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports) {


/**
 * When source maps are enabled, `style-loader` uses a link element with a data-uri to
 * embed the css on the page. This breaks all relative urls because now they are relative to a
 * bundle instead of the current page.
 *
 * One solution is to only use full urls, but that may be impossible.
 *
 * Instead, this function "fixes" the relative urls to be absolute according to the current page location.
 *
 * A rudimentary test suite is located at `test/fixUrls.js` and can be run via the `npm test` command.
 *
 */

module.exports = function (css) {
  // get current location
  var location = typeof window !== "undefined" && window.location;

  if (!location) {
    throw new Error("fixUrls requires window.location");
  }

	// blank or null?
	if (!css || typeof css !== "string") {
	  return css;
  }

  var baseUrl = location.protocol + "//" + location.host;
  var currentDir = baseUrl + location.pathname.replace(/\/[^\/]*$/, "/");

	// convert each url(...)
	/*
	This regular expression is just a way to recursively match brackets within
	a string.

	 /url\s*\(  = Match on the word "url" with any whitespace after it and then a parens
	   (  = Start a capturing group
	     (?:  = Start a non-capturing group
	         [^)(]  = Match anything that isn't a parentheses
	         |  = OR
	         \(  = Match a start parentheses
	             (?:  = Start another non-capturing groups
	                 [^)(]+  = Match anything that isn't a parentheses
	                 |  = OR
	                 \(  = Match a start parentheses
	                     [^)(]*  = Match anything that isn't a parentheses
	                 \)  = Match a end parentheses
	             )  = End Group
              *\) = Match anything and then a close parens
          )  = Close non-capturing group
          *  = Match anything
       )  = Close capturing group
	 \)  = Match a close parens

	 /gi  = Get all matches, not the first.  Be case insensitive.
	 */
	var fixedCss = css.replace(/url\s*\(((?:[^)(]|\((?:[^)(]+|\([^)(]*\))*\))*)\)/gi, function(fullMatch, origUrl) {
		// strip quotes (if they exist)
		var unquotedOrigUrl = origUrl
			.trim()
			.replace(/^"(.*)"$/, function(o, $1){ return $1; })
			.replace(/^'(.*)'$/, function(o, $1){ return $1; });

		// already a full url? no change
		if (/^(#|data:|http:\/\/|https:\/\/|file:\/\/\/|\s*$)/i.test(unquotedOrigUrl)) {
		  return fullMatch;
		}

		// convert the url to a full url
		var newUrl;

		if (unquotedOrigUrl.indexOf("//") === 0) {
		  	//TODO: should we add protocol?
			newUrl = unquotedOrigUrl;
		} else if (unquotedOrigUrl.indexOf("/") === 0) {
			// path should be relative to the base url
			newUrl = baseUrl + unquotedOrigUrl; // already starts with '/'
		} else {
			// path should be relative to current directory
			newUrl = currentDir + unquotedOrigUrl.replace(/^\.\//, ""); // Strip leading './'
		}

		// send back the fixed url(...)
		return "url(" + JSON.stringify(newUrl) + ")";
	});

	// send back the fixed css
	return fixedCss;
};


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/notification.vue?vue&type=template&id=05d56994&":
/*!***************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/notification.vue?vue&type=template&id=05d56994& ***!
  \***************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
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
                                                  "p",
                                                  {
                                                    staticClass: "text-lg p-1",
                                                    class:
                                                      _vm.notification
                                                        .contactMessage.type
                                                  },
                                                  [
                                                    _vm._v(
                                                      "\n                              " +
                                                        _vm._s(dat) +
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
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return normalizeComponent; });
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


/***/ }),

/***/ "./resources/js/components/notification.vue":
/*!**************************************************!*\
  !*** ./resources/js/components/notification.vue ***!
  \**************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _notification_vue_vue_type_template_id_05d56994___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./notification.vue?vue&type=template&id=05d56994& */ "./resources/js/components/notification.vue?vue&type=template&id=05d56994&");
/* harmony import */ var _notification_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./notification.vue?vue&type=script&lang=js& */ "./resources/js/components/notification.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _notification_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./notification.vue?vue&type=style&index=0&lang=css& */ "./resources/js/components/notification.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _notification_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _notification_vue_vue_type_template_id_05d56994___WEBPACK_IMPORTED_MODULE_0__["render"],
  _notification_vue_vue_type_template_id_05d56994___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/notification.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/notification.vue?vue&type=script&lang=js&":
/*!***************************************************************************!*\
  !*** ./resources/js/components/notification.vue?vue&type=script&lang=js& ***!
  \***************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_notification_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./notification.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/notification.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_notification_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/notification.vue?vue&type=style&index=0&lang=css&":
/*!***********************************************************************************!*\
  !*** ./resources/js/components/notification.vue?vue&type=style&index=0&lang=css& ***!
  \***********************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_7_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_vue_loader_lib_index_js_vue_loader_options_notification_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/style-loader!../../../node_modules/css-loader??ref--7-1!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/src??ref--7-2!../../../node_modules/vue-loader/lib??vue-loader-options!./notification.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/notification.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_7_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_vue_loader_lib_index_js_vue_loader_options_notification_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_7_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_vue_loader_lib_index_js_vue_loader_options_notification_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_7_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_vue_loader_lib_index_js_vue_loader_options_notification_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_7_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_vue_loader_lib_index_js_vue_loader_options_notification_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_7_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_7_2_node_modules_vue_loader_lib_index_js_vue_loader_options_notification_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./resources/js/components/notification.vue?vue&type=template&id=05d56994&":
/*!*********************************************************************************!*\
  !*** ./resources/js/components/notification.vue?vue&type=template&id=05d56994& ***!
  \*********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_notification_vue_vue_type_template_id_05d56994___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./notification.vue?vue&type=template&id=05d56994& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/notification.vue?vue&type=template&id=05d56994&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_notification_vue_vue_type_template_id_05d56994___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_notification_vue_vue_type_template_id_05d56994___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/helpers/api.js":
/*!*************************************!*\
  !*** ./resources/js/helpers/api.js ***!
  \*************************************/
/*! exports provided: curlGet, rapPost, get, authGet, post, put, del */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "curlGet", function() { return curlGet; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "rapPost", function() { return rapPost; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "get", function() { return get; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "authGet", function() { return authGet; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "post", function() { return post; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "put", function() { return put; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "del", function() { return del; });
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _store_auth__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../store/auth */ "./resources/js/store/auth.js");
/* harmony import */ var _helpers_locale__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../helpers/locale */ "./resources/js/helpers/locale.js");



function curlGet(url) {
  // lang = this.$route.fullPath.slice(0,3)
  // Locale.setLastUrl(url)
  return axios__WEBPACK_IMPORTED_MODULE_0___default()({
    method: 'GET',
    url: url,
    headers: {
      'Content-Type': 'application/json',
      'Accept-Encoding': 'gzip, deflate'
    }
  });
}
function rapPost(url, data) {
  return axios__WEBPACK_IMPORTED_MODULE_0___default()({
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
  return axios__WEBPACK_IMPORTED_MODULE_0___default()({
    method: 'GET',
    url: url,
    headers: {
      'Authorization': "Bearer ".concat(_store_auth__WEBPACK_IMPORTED_MODULE_1__["default"].state.api_token),
      'api_token': _store_auth__WEBPACK_IMPORTED_MODULE_1__["default"].state.api_token,
      'X-localization': window.location.pathname.slice(1, 3)
    }
  });
}
function authGet(url) {
  // lang = this.$route.fullPath.slice(0,3)
  // Locale.setLastUrl(url)
  return axios__WEBPACK_IMPORTED_MODULE_0___default()({
    method: 'GET',
    url: url,
    headers: {
      'Authorization': "Bearer ".concat(document.head.querySelector('meta[name="api-token"]') ? document.head.querySelector('meta[name="api-token"]').content : null),
      'X-localization': window.location.pathname.slice(1, 3)
    }
  });
}
function post(url, data) {
  return axios__WEBPACK_IMPORTED_MODULE_0___default()({
    method: 'POST',
    url: url,
    data: data,
    headers: {
      'Authorization': "Bearer ".concat(_store_auth__WEBPACK_IMPORTED_MODULE_1__["default"].state.api_token),
      'X-localization': window.location.pathname.slice(1, 3) // 'Content-Type': 'application/json',

    }
  });
}
function put(url, data) {
  return axios__WEBPACK_IMPORTED_MODULE_0___default()({
    method: 'PUT',
    url: url,
    data: data,
    headers: {
      'Authorization': "Bearer ".concat(_store_auth__WEBPACK_IMPORTED_MODULE_1__["default"].state.api_token)
    }
  });
}
function del(url) {
  return axios__WEBPACK_IMPORTED_MODULE_0___default()({
    method: 'DELETE',
    url: url,
    // data: data,
    headers: {
      'Authorization': "Bearer ".concat(_store_auth__WEBPACK_IMPORTED_MODULE_1__["default"].state.api_token)
    }
  });
}

/***/ }),

/***/ "./resources/js/helpers/cookie.js":
/*!****************************************!*\
  !*** ./resources/js/helpers/cookie.js ***!
  \****************************************/
/*! exports provided: setCookie, getCookie, clearCookie, checkCookie */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "setCookie", function() { return setCookie; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getCookie", function() { return getCookie; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "clearCookie", function() { return clearCookie; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "checkCookie", function() { return checkCookie; });
//设置cookie
function setCookie(cname, cvalue, mins) {
  var d = new Date(); // d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));

  d.setTime(d.getTime() + mins * 60 * 1000);
  var expires = "expires=" + d.toGMTString(); // console.info(cname + "=" + cvalue + "; " + expires + "; path=/");

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
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ({
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

/***/ "./resources/js/helpers/locale.js":
/*!****************************************!*\
  !*** ./resources/js/helpers/locale.js ***!
  \****************************************/
/*! exports provided: default, getLocaleCode, getLocale, getCurrentURl */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getLocaleCode", function() { return getLocaleCode; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getLocale", function() { return getLocale; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getCurrentURl", function() { return getCurrentURl; });
/* harmony default export */ __webpack_exports__["default"] = ({
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

/***/ "./resources/js/helpers/mutualVar.js":
/*!*******************************************!*\
  !*** ./resources/js/helpers/mutualVar.js ***!
  \*******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _locale__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./locale */ "./resources/js/helpers/locale.js");

/* harmony default export */ __webpack_exports__["default"] = ({
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
    },
    contactMessage: {
      active: false,
      title: '',
      data: [],
      type: '',
      trans: true,
      next: {
        nextUrl: '',
        nextText: ''
      }
    }
  },
  langs: {
    localeCode: Object(_locale__WEBPACK_IMPORTED_MODULE_0__["getLocaleCode"])(),
    locale: Object(_locale__WEBPACK_IMPORTED_MODULE_0__["getLocale"])()
  },
  storage: {
    live: 'cfront',
    s3: 'https://s3.tingdiamond.com/',
    cfront: 'https://cfr.tingdiamond.com/'
  },
  screen: {
    x: 0,
    y: 0,
    scrollable: false
  },
  namepath: Object(_locale__WEBPACK_IMPORTED_MODULE_0__["getCurrentURl"])(),
  css: {
    jsReady: true,
    innerWidth: 0
  },
  tabs: {
    sideBar: '4cs'
  }
});

/***/ }),

/***/ "./resources/js/helpers/transJs.js":
/*!*****************************************!*\
  !*** ./resources/js/helpers/transJs.js ***!
  \*****************************************/
/*! exports provided: transJs */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "transJs", function() { return transJs; });
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

/***/ "./resources/js/store/auth.js":
/*!************************************!*\
  !*** ./resources/js/store/auth.js ***!
  \************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ({
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
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
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
    this.mutualVar.langs.localeCode = Object(_helpers_locale__WEBPACK_IMPORTED_MODULE_11__["getLocaleCode"])();
    this.mutualVar.langs.locale = Object(_helpers_locale__WEBPACK_IMPORTED_MODULE_11__["getLocale"])();
  },
  components: {
    Notification: _components_notification_vue__WEBPACK_IMPORTED_MODULE_10__["default"]
  },
  computed: {}
});
var pUrl = window.location.pathname.slice(3);

if (pUrl == '/account') {
  var account = new Vue(_views_frontEnd_account_index__WEBPACK_IMPORTED_MODULE_0__["default"]);
}

if (pUrl.includes('account/setting')) {
  var setting = new Vue(_views_frontEnd_account_setting__WEBPACK_IMPORTED_MODULE_1__["default"]);
}

if (pUrl == '/account/pending') {
  var pending = new Vue(_views_frontEnd_account_pending__WEBPACK_IMPORTED_MODULE_2__["default"]);
}

if (pUrl.includes('account/pending/')) {
  var pendingShow = new Vue(_views_frontEnd_account_pendingShow__WEBPACK_IMPORTED_MODULE_3__["default"]);
}

if (pUrl == '/account/invoices') {
  var invoices = new Vue(_views_frontEnd_account_invoices__WEBPACK_IMPORTED_MODULE_4__["default"]);
}

if (pUrl.includes('account/orders')) {
  var order = new Vue(_views_frontEnd_account_order__WEBPACK_IMPORTED_MODULE_9__["default"]);
}

if (pUrl.includes('account/invoices/')) {
  var invoiceShow = new Vue(_views_frontEnd_account_invoiceShow__WEBPACK_IMPORTED_MODULE_5__["default"]);
}

if (pUrl.includes('referral/coupon-code')) {
  var couponCode = new Vue(_views_frontEnd_account_referral_couponCode__WEBPACK_IMPORTED_MODULE_6__["default"]);
}

if (pUrl.includes('account/referral/records')) {
  var referralRecords = new Vue(_views_frontEnd_account_referral_records__WEBPACK_IMPORTED_MODULE_7__["default"]);
}

if (pUrl.includes('account/referral/refund')) {
  var referralRefund = new Vue(_views_frontEnd_account_referral_refund__WEBPACK_IMPORTED_MODULE_8__["default"]);
}

/***/ }),

/***/ "./resources/js/views/frontEnd/account/index.js":
/*!******************************************************!*\
  !*** ./resources/js/views/frontEnd/account/index.js ***!
  \******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../helpers/transJs */ "./resources/js/helpers/transJs.js");
/* harmony import */ var _helpers_locale__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../helpers/locale */ "./resources/js/helpers/locale.js");



/* harmony default export */ __webpack_exports__["default"] = ({
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
      return Object(_helpers_locale__WEBPACK_IMPORTED_MODULE_2__["getLocaleCode"])();
    }
  },
  filters: {
    transJs: _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__["transJs"]
  },
  methods: {
    fetchData: function fetchData() {
      var _this = this;

      Object(_helpers_api__WEBPACK_IMPORTED_MODULE_0__["get"])("/api/account/user").then(function (res) {
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
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../helpers/transJs */ "./resources/js/helpers/transJs.js");
/* harmony import */ var _helpers_locale__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../helpers/locale */ "./resources/js/helpers/locale.js");


 // import DataViewer from '../../../components/user/DataViewer.vue'

/* harmony default export */ __webpack_exports__["default"] = ({
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
      return Object(_helpers_locale__WEBPACK_IMPORTED_MODULE_2__["getLocaleCode"])();
    }
  },
  filters: {
    transJs: _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__["transJs"]
  },
  methods: {
    fetchData: function fetchData() {
      var _this = this;

      Object(_helpers_api__WEBPACK_IMPORTED_MODULE_0__["get"])("/api/account/invoices/".concat(window.location.pathname.slice(21))).then(function (res) {
        _this.model = res.data.model;
        _this.company = res.data.company;
      });
    },
    directTo: function directTo(id) {
      window.open(Object(_helpers_locale__WEBPACK_IMPORTED_MODULE_2__["getLocale"])() + '/account/invoices/' + id, '_self');
    }
  }
});

/***/ }),

/***/ "./resources/js/views/frontEnd/account/invoices.js":
/*!*********************************************************!*\
  !*** ./resources/js/views/frontEnd/account/invoices.js ***!
  \*********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../helpers/transJs */ "./resources/js/helpers/transJs.js");
/* harmony import */ var _helpers_locale__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../helpers/locale */ "./resources/js/helpers/locale.js");
/* harmony import */ var _langs_shoppingCart__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../langs/shoppingCart */ "./resources/js/langs/shoppingCart.js");



 // import DataViewer from '../../../components/user/DataViewer.vue'

/* harmony default export */ __webpack_exports__["default"] = ({
  el: '#invoices',
  data: function data() {
    return {
      mutualVar: mutualVar,
      data: '',
      langs: _langs_shoppingCart__WEBPACK_IMPORTED_MODULE_3__["default"]
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
      return Object(_helpers_locale__WEBPACK_IMPORTED_MODULE_2__["getLocaleCode"])();
    }
  },
  filters: {
    transJs: _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__["transJs"]
  },
  methods: {
    fetchData: function fetchData() {
      var _this = this;

      Object(_helpers_api__WEBPACK_IMPORTED_MODULE_0__["get"])("/api/account/invoices").then(function (res) {
        _this.data = res.data.model;
      });
    },
    directTo: function directTo(id) {
      window.open(Object(_helpers_locale__WEBPACK_IMPORTED_MODULE_2__["getLocale"])() + '/account/invoices/' + id, '_self');
    }
  }
});

/***/ }),

/***/ "./resources/js/views/frontEnd/account/order.js":
/*!******************************************************!*\
  !*** ./resources/js/views/frontEnd/account/order.js ***!
  \******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../helpers/transJs */ "./resources/js/helpers/transJs.js");
/* harmony import */ var _helpers_locale__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../helpers/locale */ "./resources/js/helpers/locale.js");



/* harmony default export */ __webpack_exports__["default"] = ({
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
      return Object(_helpers_locale__WEBPACK_IMPORTED_MODULE_2__["getLocaleCode"])();
    }
  },
  filters: {
    transJs: _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__["transJs"]
  },
  methods: {
    fetchData: function fetchData() {
      var _this = this;

      Object(_helpers_api__WEBPACK_IMPORTED_MODULE_0__["get"])("/api/account/user").then(function (res) {
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
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _helpers_cookie__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../helpers/cookie */ "./resources/js/helpers/cookie.js");
/* harmony import */ var _helpers_transJs__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../helpers/transJs */ "./resources/js/helpers/transJs.js");
/* harmony import */ var _helpers_locale__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../helpers/locale */ "./resources/js/helpers/locale.js");
/* harmony import */ var _langs_shoppingCart__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../../../langs/shoppingCart */ "./resources/js/langs/shoppingCart.js");




 // import DataViewer from '../../../components/user/DataViewer.vue'

/* harmony default export */ __webpack_exports__["default"] = ({
  el: '#pending',
  data: function data() {
    return {
      mutualVar: mutualVar,
      data: '',
      langs: _langs_shoppingCart__WEBPACK_IMPORTED_MODULE_4__["default"]
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
      return Object(_helpers_locale__WEBPACK_IMPORTED_MODULE_3__["getLocaleCode"])();
    },
    couponCode: function couponCode() {
      return Object(_helpers_cookie__WEBPACK_IMPORTED_MODULE_1__["getCookie"])('coupon_code');
    }
  },
  filters: {
    transJs: _helpers_transJs__WEBPACK_IMPORTED_MODULE_2__["transJs"]
  },
  methods: {
    fetchData: function fetchData() {
      var _this = this;

      Object(_helpers_api__WEBPACK_IMPORTED_MODULE_0__["get"])("/api/account/pending").then(function (res) {
        _this.data = res.data.model;
      });
    },
    directTo: function directTo(id) {
      window.open(Object(_helpers_locale__WEBPACK_IMPORTED_MODULE_3__["getLocale"])() + '/account/pending/' + id, '_self');
    }
  }
});

/***/ }),

/***/ "./resources/js/views/frontEnd/account/pendingShow.js":
/*!************************************************************!*\
  !*** ./resources/js/views/frontEnd/account/pendingShow.js ***!
  \************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../helpers/transJs */ "./resources/js/helpers/transJs.js");
/* harmony import */ var _helpers_locale__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../helpers/locale */ "./resources/js/helpers/locale.js");



/* harmony default export */ __webpack_exports__["default"] = ({
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
      return Object(_helpers_locale__WEBPACK_IMPORTED_MODULE_2__["getLocaleCode"])();
    }
  },
  filters: {
    transJs: _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__["transJs"]
  },
  methods: {
    fetchData: function fetchData() {
      var _this = this;

      Object(_helpers_api__WEBPACK_IMPORTED_MODULE_0__["get"])("/api/account/pending/".concat(window.location.pathname.slice(20))).then(function (res) {
        _this.data = res.data.model;
        _this.customer = res.data.customer;
      });
    },
    directTo: function directTo(id) {
      window.open(Object(_helpers_locale__WEBPACK_IMPORTED_MODULE_2__["getLocale"])() + '/account/pending/' + id, '_self');
    }
  }
});

/***/ }),

/***/ "./resources/js/views/frontEnd/account/referral/couponCode.js":
/*!********************************************************************!*\
  !*** ./resources/js/views/frontEnd/account/referral/couponCode.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../../helpers/transJs */ "./resources/js/helpers/transJs.js");
/* harmony import */ var _helpers_locale__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../helpers/locale */ "./resources/js/helpers/locale.js");
/* harmony import */ var _helpers_flash__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../helpers/flash */ "./resources/js/helpers/flash.js");
/* harmony import */ var _components_notification_vue__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../../../../components/notification.vue */ "./resources/js/components/notification.vue");
/* harmony import */ var _helpers_mutualVar__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../../../../helpers/mutualVar */ "./resources/js/helpers/mutualVar.js");
 // import router from '../../../../router'






/* harmony default export */ __webpack_exports__["default"] = ({
  el: '#couponCode',
  // router,	
  components: {
    Notification: _components_notification_vue__WEBPACK_IMPORTED_MODULE_4__["default"]
  },
  data: function data() {
    return {
      model: '',
      mutualVar: _helpers_mutualVar__WEBPACK_IMPORTED_MODULE_5__["default"]
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
      return Object(_helpers_locale__WEBPACK_IMPORTED_MODULE_2__["getLocaleCode"])();
    },
    hostname: function hostname() {
      return window.location.hostname;
    }
  },
  filters: {
    transJs: _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__["transJs"]
  },
  methods: {
    fetchData: function fetchData() {
      var _this = this;

      Object(_helpers_api__WEBPACK_IMPORTED_MODULE_0__["get"])("/api/referral/code").then(function (res) {
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
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../../helpers/transJs */ "./resources/js/helpers/transJs.js");
/* harmony import */ var _helpers_locale__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../helpers/locale */ "./resources/js/helpers/locale.js");
/* harmony import */ var _langs_shoppingCart__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../langs/shoppingCart */ "./resources/js/langs/shoppingCart.js");
/* harmony import */ var _helpers_flash__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../../../../helpers/flash */ "./resources/js/helpers/flash.js");
/* harmony import */ var _components_notification_vue__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../../../../components/notification.vue */ "./resources/js/components/notification.vue");
/* harmony import */ var _helpers_mutualVar__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../../../../helpers/mutualVar */ "./resources/js/helpers/mutualVar.js");







/* harmony default export */ __webpack_exports__["default"] = ({
  el: '#records',
  components: {
    Notification: _components_notification_vue__WEBPACK_IMPORTED_MODULE_5__["default"]
  },
  data: function data() {
    return {
      model: '',
      coupon: '',
      mutualVar: _helpers_mutualVar__WEBPACK_IMPORTED_MODULE_6__["default"],
      langs: _langs_shoppingCart__WEBPACK_IMPORTED_MODULE_3__["default"],
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
      return Object(_helpers_locale__WEBPACK_IMPORTED_MODULE_2__["getLocaleCode"])();
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
    transJs: _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__["transJs"],
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

      Object(_helpers_api__WEBPACK_IMPORTED_MODULE_0__["get"])("/api/referral/records").then(function (res) {
        _this.model = res.data.model;
      });
      Object(_helpers_api__WEBPACK_IMPORTED_MODULE_0__["get"])("/api/referral/code").then(function (res) {
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
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../../helpers/transJs */ "./resources/js/helpers/transJs.js");
/* harmony import */ var _helpers_locale__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../helpers/locale */ "./resources/js/helpers/locale.js");
/* harmony import */ var _langs_shoppingCart__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../langs/shoppingCart */ "./resources/js/langs/shoppingCart.js");
/* harmony import */ var _helpers_flash__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../../../../helpers/flash */ "./resources/js/helpers/flash.js");
/* harmony import */ var _components_notification_vue__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../../../../components/notification.vue */ "./resources/js/components/notification.vue");
/* harmony import */ var _helpers_mutualVar__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../../../../helpers/mutualVar */ "./resources/js/helpers/mutualVar.js");







/* harmony default export */ __webpack_exports__["default"] = ({
  el: '#refund',
  components: {
    Notification: _components_notification_vue__WEBPACK_IMPORTED_MODULE_5__["default"]
  },
  data: function data() {
    return {
      model: '',
      mutualVar: _helpers_mutualVar__WEBPACK_IMPORTED_MODULE_6__["default"],
      langs: _langs_shoppingCart__WEBPACK_IMPORTED_MODULE_3__["default"]
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
      return Object(_helpers_locale__WEBPACK_IMPORTED_MODULE_2__["getLocaleCode"])();
    },
    hostname: function hostname() {
      return window.location.hostname;
    }
  },
  filters: {
    transJs: _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__["transJs"],
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

      Object(_helpers_api__WEBPACK_IMPORTED_MODULE_0__["get"])("/api/referral/refund").then(function (res) {
        _this.model = res.data.model;
      });
      Object(_helpers_api__WEBPACK_IMPORTED_MODULE_0__["get"])("/api/referral/code").then(function (res) {
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
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../helpers/transJs */ "./resources/js/helpers/transJs.js");
/* harmony import */ var _helpers_locale__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../helpers/locale */ "./resources/js/helpers/locale.js");



/* harmony default export */ __webpack_exports__["default"] = ({
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
      return Object(_helpers_locale__WEBPACK_IMPORTED_MODULE_2__["getLocaleCode"])();
    }
  },
  filters: {
    transJs: _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__["transJs"]
  },
  methods: {
    fetchData: function fetchData() {
      var _this = this;

      Object(_helpers_api__WEBPACK_IMPORTED_MODULE_0__["get"])("/api/account/user").then(function (res) {
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
        Object(_helpers_api__WEBPACK_IMPORTED_MODULE_0__["post"])('/api/account/user', this.form).then(function (res) {
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

/***/ 4:
/*!*******************************************!*\
  !*** multi ./resources/js/userAccount.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/chillkwong/Dropbox/code/TD7/resources/js/userAccount.js */"./resources/js/userAccount.js");


/***/ })

/******/ });