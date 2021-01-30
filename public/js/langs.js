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
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../helpers/api */ "./resources/js/helpers/api.js");






window.langs = _diamondViewer__WEBPACK_IMPORTED_MODULE_1__["default"].concat(_engagementRings__WEBPACK_IMPORTED_MODULE_2__["default"], _weddingRings__WEBPACK_IMPORTED_MODULE_3__["default"], _jewelleries__WEBPACK_IMPORTED_MODULE_0__["default"], _shoppingCart__WEBPACK_IMPORTED_MODULE_4__["default"]); // function fetchTranslate(){
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

/***/ 3:
/*!*******************************************!*\
  !*** multi ./resources/js/langs/langs.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/chillkwong/Dropbox/code/TD7/resources/js/langs/langs.js */"./resources/js/langs/langs.js");


/***/ })

/******/ });