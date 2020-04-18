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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
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

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/appointment.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/appointment.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../helpers/transJs */ "./resources/js/helpers/transJs.js");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ __webpack_exports__["default"] = ({
  props: {
    value: {
      "default": null
    },
    active: false,
    title: '',
    columns: '',
    processing: '',
    langs: '',
    locale: ''
  },
  data: function data() {
    return {
      mutualVar: mutualVar,
      form: {
        name: '',
        phone: '',
        remark: 'Remark:',
        storeURL: 'tingdiamond.com' + window.location.pathname
      },
      hrefLangs: window.location.pathname.slice(0, 3),
      text: {
        title: 'Details fo Appointment',
        button: 'Contact Us',
        button1: 'Appointment',
        placeholderName: 'your name',
        placeholderNo: 'your Phone No.'
      }
    };
  },
  filters: {
    capitalize: function capitalize(value) {
      if (!value) return '';
      value = value.toString();
      return value.charAt(0).toUpperCase() + value.slice(1);
    },
    transJs: _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__["transJs"]
  },
  // computed: {
  //   formData(){
  //     return this.form + this.value
  //   }
  // },
  methods: {
    save: function save() {
      var _this = this;

      this.value.images = 0;
      this.value.texts = 0;
      var form = Object.assign({}, this.form, this.value, this.storeURL);
      Object(_helpers_api__WEBPACK_IMPORTED_MODULE_0__["post"])('/api/appointment', form).then(function (res) {
        if (res.data.saved) {
          _this.mutualVar.notification.state.success = res.data.message;

          _this.$emit('active', null);
        }
      })["catch"](function (err) {
        if (err.response.status === 422) {
          _this.mutualVar.notification.state.error = err.response.data;
        }
      });
      this.active = false;
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/carousel.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/carousel.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_video_player_dist_vue_video_player__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../node_modules/vue-video-player/dist/vue-video-player */ "./node_modules/vue-video-player/dist/vue-video-player.js");
/* harmony import */ var _node_modules_vue_video_player_dist_vue_video_player__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_vue_video_player_dist_vue_video_player__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _helpers_mutualVar__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../helpers/mutualVar */ "./resources/js/helpers/mutualVar.js");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

 // import VideoPlayer from './VueVideoPlayer.vue'

/* harmony default export */ __webpack_exports__["default"] = ({
  name: 'carousel',
  components: {
    videoPlayer: _node_modules_vue_video_player_dist_vue_video_player__WEBPACK_IMPORTED_MODULE_0__["videoPlayer"] // VideoPlayer

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
  data: function data() {
    return {
      currentIndex: 0,
      showUpper: true,
      youtube: 'http://www.youtube.com/embed/',
      rel: '?rel=0',
      images: _helpers_mutualVar__WEBPACK_IMPORTED_MODULE_1__["default"].storage[_helpers_mutualVar__WEBPACK_IMPORTED_MODULE_1__["default"].storage.live] + 'public/images/',
      carouselUpperItems: '',
      chunkedUpperItemsData: '',
      videoType: 'video/mp4',
      currentUpperIndex: 0,
      videoPath: _helpers_mutualVar__WEBPACK_IMPORTED_MODULE_1__["default"].storage[_helpers_mutualVar__WEBPACK_IMPORTED_MODULE_1__["default"].storage.live] + 'public/videos/'
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
      if (this.currentIndex == this.carouselUpperItemsToArray.length - 1) {
        this.currentIndex = 0;
      } else {
        this.currentIndex++;
      }
    },
    prevItem: function prevItem() {
      if (this.currentIndex == 0) {
        this.currentIndex = this.carouselUpperItemsToArray.length - 1;
      } else {
        this.currentIndex--;
      }
    },
    showAtIndex: function showAtIndex(index) {
      this.currentIndex = index;
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
          this.currentIndex = index;
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
        return this.carouselUpperItemsToArray[this.currentIndex];
      }

      return this.carouselItemsToArray[this.currentIndex];
    },
    title: function title() {
      if (window.location.pathname.slice(1, 3) == 'en') {
        return 'Customer Jewellires';
      }

      if (window.location.pathname.slice(1, 3) == 'hk') {
        return '客人首飾';
      }

      if (window.location.pathname.slice(1, 3) == 'cn') {
        return '客人首饰';
      }
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

      if (this.upperitems.video) {
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

      if (!this.carouselUpperItemsToArray) {
        return chunk1;
      }

      if (this.currentIndex <= 1) {
        chunk1 = this.carouselUpperItemsToArray.slice(0, 3);
        chunk2 = this.carouselUpperItemsToArray.slice(3, this.carouselUpperItemsToArray.length).fill('');
        return chunk1.concat(chunk2);
      }

      chunk1 = this.carouselUpperItemsToArray.slice(0, this.currentIndex - 1).fill('');
      chunk2 = this.carouselUpperItemsToArray.slice(this.currentIndex - 1, this.currentIndex + 2);
      chunk3 = this.carouselUpperItemsToArray.slice(this.currentIndex + 2, this.carouselUpperItemsToArray.length).fill('');
      return chunk1.concat(chunk2, chunk3);
    },
    carouselItemsToArray: function carouselItemsToArray() {
      var arr = [];
      this.items.reverse();

      if (!this.items) {
        return arr.push({
          src: '',
          type: '',
          thumb: ''
        });
      }

      for (var i = this.items.length - 1; i >= 0; i--) {
        if (this.items[i].images[0].image && this.items[i].video) {
          arr.push({
            src: this.items[i].video,
            type: "video",
            thumb: this.items[i].images[0].image
          });
        } else {
          arr.push({
            src: this.items[i].images[0].image,
            type: "img",
            thumb: this.items[i].images[0].image
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

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/imageCarousel.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/imageCarousel.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
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
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
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
      mutualVar: _helpers_mutualVar__WEBPACK_IMPORTED_MODULE_0__["default"],
      currentIndex: 0,
      showUpper: true,
      youtube: 'http://www.youtube.com/embed/',
      rel: '?rel=0',
      images: _helpers_mutualVar__WEBPACK_IMPORTED_MODULE_0__["default"].storage[_helpers_mutualVar__WEBPACK_IMPORTED_MODULE_0__["default"].storage.live] + 'public' + '/images/'
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
      if (this.currentIndex == 0) {
        this.currentIndex = this.items.length - 1;
      } else {
        this.currentIndex--;
      }
    },
    showAtIndex: function showAtIndex(index) {
      this.currentIndex = index;
    },
    currentSelectedItem: function currentSelectedItem(index, upper) {
      if (upper == 'upper') {
        this.currentIndex = index;
        return this.showUpper = true;
      }

      this.showUpper = false;
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

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/productViewer360.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/productViewer360.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  props: ['folder', 'filename'],
  data: function data() {
    return {
      autoPlay: true,
      status: 'grab'
    };
  },
  components: {},
  methods: {
    autoPlayToTrue: function autoPlayToTrue() {
      console.log('true');
      this.autoPlay = true;
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/shoppingCart/cart.vue?vue&type=script&lang=js&":
/*!****************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/shoppingCart/cart.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _helpers_cookie__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../helpers/cookie */ "./resources/js/helpers/cookie.js");
/* harmony import */ var _helpers_locale__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../helpers/locale */ "./resources/js/helpers/locale.js");
/* harmony import */ var _helpers_transJs__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../helpers/transJs */ "./resources/js/helpers/transJs.js");
/* harmony import */ var _langs_shoppingCart__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../../langs/shoppingCart */ "./resources/js/langs/shoppingCart.js");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//





/* harmony default export */ __webpack_exports__["default"] = ({
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
      langs: _langs_shoppingCart__WEBPACK_IMPORTED_MODULE_4__["default"]
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
  filters: {
    transJs: _helpers_transJs__WEBPACK_IMPORTED_MODULE_3__["transJs"]
  },
  computed: {
    singularType: function singularType() {
      return this.type.replace(/s/gi, '');
    },
    shoppingCart: function shoppingCart() {
      return this.mutualVar.cookiesInfo.shoppingCart;
    },
    totalAddedCartItems: function totalAddedCartItems() {
      var totalItems = 0;

      for (var i = 0; this.mutualVar.cookiesInfo.shoppingCart.items.length > i; i++) {
        if (this.type == 'engagementRings' || this.type == 'diamonds') {
          if (this.mutualVar.cookiesInfo.shoppingCart.items[i].addedCart) {
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

      if (this.mutualVar.cookiesInfo.shoppingCart.items.length > 0) {
        if (this.type == 'engagementRings') {
          engagementClickable = this.mutualVar.cookiesInfo.shoppingCart.items[this.mutualVar.cookiesInfo.shoppingCart.selectingIndex].pairItems.filter(function (data) {
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
      if (this.shoppingCart.selectingIndex != 0 && this.shoppingCart.selectingIndex > this.shoppingCart.items.length - 1) {
        this.shoppingCart.selectingIndex = this.shoppingCart.items.length - 1;
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

      for (var i = 0; this.shoppingCart.items.length > i; i++) {
        var item = [];

        if (counteditem[i].pairItems.length > 0 && i != this.shoppingCart.selectingIndex) {
          item = counteditem[i].pairItems.filter(function (data) {
            if (data.type == 'diamonds' && data.id == _this.item.id) {
              return data;
            }
          });

          if (item.length > 0) {
            var message = mutualVar.notification.contactMessage;
            message.active = true;
            message.title = 'message';
            message.type = 'is-danger';
            message.data = ['same diamond on the list'];
            message.next = {
              nextUrl: Object(_helpers_locale__WEBPACK_IMPORTED_MODULE_2__["getLocale"])() + '/gia-loose-diamonds/',
              nextText: 'find other diamond'
            };
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
      console.log();

      if (this.type == 'engagementRings') {
        item.type = 'engagementRings';
        item.unit_price = this.item.unit_price;
        item.image = mutualVar.storage[mutualVar.storage.live] + 'public/images/' + this.item.images.find(function (data) {
          return data.type == 'cover';
        }).image;
        console.log(item.image);
        item.url = Object(_helpers_locale__WEBPACK_IMPORTED_MODULE_2__["getLocale"])() + '/engagement-rings/';
      }

      if (this.type == 'diamonds') {
        item.type = 'diamonds';
        item.unit_price = this.item.price;
        item.diamondSize = parseFloat(this.item.weight);
        item.url = Object(_helpers_locale__WEBPACK_IMPORTED_MODULE_2__["getLocale"])() + '/gia-loose-diamonds/';

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
        var langCode = Object(_helpers_locale__WEBPACK_IMPORTED_MODULE_2__["getLocaleCode"])();
        var mountingFee = {
          id: '',
          image: '/images/front-end/shoppingCart/mountingFee.png',
          unit_price: 500,
          title: this.langs.find(function (data) {
            return data['mounting fee'];
          })['mounting fee'][langCode],
          url: Object(_helpers_locale__WEBPACK_IMPORTED_MODULE_2__["getLocale"])() + '/buying-procedure/diamond-inlay-engrave',
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
      window.open(Object(_helpers_locale__WEBPACK_IMPORTED_MODULE_2__["getLocale"])() + '/diamond-ring-review', '_self');
    },
    addItemToCart: function addItemToCart() {
      this.shoppingCart.items[this.shoppingCart.selectingIndex].addedCart = 1;
      this.shoppingCart.mode = 'create';
      this.addItemSample();
      this.sendCookies();
      this.toggleModal();
      window.open(Object(_helpers_locale__WEBPACK_IMPORTED_MODULE_2__["getLocale"])() + '/shopping-cart', '_self');
    },
    toggleModal: function toggleModal() {
      this.shoppingCart.modalActive = !this.shoppingCart.modalActive;
      this.sendCookies();
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/shoppingCart/item.vue?vue&type=script&lang=js&":
/*!****************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/shoppingCart/item.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _carousel_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../carousel.vue */ "./resources/js/components/carousel.vue");
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _helpers_locale__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../helpers/locale */ "./resources/js/helpers/locale.js");
/* harmony import */ var _helpers_cookie__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../helpers/cookie */ "./resources/js/helpers/cookie.js");
/* harmony import */ var _helpers_helperFunctions__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../../helpers/helperFunctions */ "./resources/js/helpers/helperFunctions.js");
/* harmony import */ var _helpers_getAuthUser__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../../helpers/getAuthUser */ "./resources/js/helpers/getAuthUser.js");
/* harmony import */ var _helpers_transJs__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../../helpers/transJs */ "./resources/js/helpers/transJs.js");
/* harmony import */ var _shoppingCart_stripeCheckoutForm_vue__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ../shoppingCart/stripeCheckoutForm.vue */ "./resources/js/components/shoppingCart/stripeCheckoutForm.vue");
var _data$watch$filters$c;

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//








/* harmony default export */ __webpack_exports__["default"] = (_data$watch$filters$c = {
  data: function data() {
    return {
      mutualVar: mutualVar,
      langs: langs,
      selectingCarousel: 'engagementRings',
      maxDeliveryDate: false,
      extraWorkingDates: _helpers_helperFunctions__WEBPACK_IMPORTED_MODULE_4__["extraWorkingDates"],
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
      apiToken: _helpers_getAuthUser__WEBPACK_IMPORTED_MODULE_5__["default"].api_token,
      shortenName: '',
      model: ''
    };
  },
  watch: {},
  filters: {
    transJs: _helpers_transJs__WEBPACK_IMPORTED_MODULE_6__["transJs"]
  },
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
    this.shortenName = mutualVar.cookiesInfo.shoppingCart.items;

    if (Object(_helpers_cookie__WEBPACK_IMPORTED_MODULE_3__["getCookie"])('coupon_code')) {
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
    locale: function locale() {
      return Object(_helpers_locale__WEBPACK_IMPORTED_MODULE_2__["getLocale"])();
    },
    windowHref: function windowHref() {
      return window.location.href;
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
  }
}, _defineProperty(_data$watch$filters$c, "filters", {
  transJs: _helpers_transJs__WEBPACK_IMPORTED_MODULE_6__["transJs"]
}), _defineProperty(_data$watch$filters$c, "methods", {
  fetchCookies: function fetchCookies() {
    if (localStorage.getItem('shoppingCart')) {
      mutualVar.cookiesInfo.shoppingCart = JSON.parse(decodeURIComponent(localStorage.getItem('shoppingCart')));
    }

    if (Object(_helpers_cookie__WEBPACK_IMPORTED_MODULE_3__["getCookie"])('coupon_code')) {
      mutualVar.cookiesInfo.coupon_code = Object(_helpers_cookie__WEBPACK_IMPORTED_MODULE_3__["getCookie"])('coupon_code');
    }

    if (Object(_helpers_cookie__WEBPACK_IMPORTED_MODULE_3__["getCookie"])('checkout')) {
      mutualVar.cookiesInfo.checkout = JSON.parse(Object(_helpers_cookie__WEBPACK_IMPORTED_MODULE_3__["getCookie"])('checkout'));
    }
  },
  sendCookies: function sendCookies() {
    var cookies = mutualVar.cookiesInfo.shoppingCart;
    localStorage.setItem('shoppingCart', encodeURIComponent(JSON.stringify(cookies)), 10080);
    Object(_helpers_cookie__WEBPACK_IMPORTED_MODULE_3__["setCookie"])('coupon_code', mutualVar.cookiesInfo.coupon_code, 10080);
    Object(_helpers_cookie__WEBPACK_IMPORTED_MODULE_3__["setCookie"])('checkout', JSON.stringify(mutualVar.cookiesInfo.checkout), 10080);
  },
  updateCartItems: function updateCartItems() {
    var _this = this;

    var data = {
      'api_token': this.apiToken,
      'data': mutualVar.cookiesInfo.shoppingCart.items,
      'order': 0
    };

    if (this.apiToken) {
      Object(_helpers_api__WEBPACK_IMPORTED_MODULE_1__["post"])('/api/update-cart-items', data).then(function (res) {
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
      Object(_helpers_api__WEBPACK_IMPORTED_MODULE_1__["post"])('/api/fetch-cart-items', data).then(function (res) {
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
        'url': Object(_helpers_locale__WEBPACK_IMPORTED_MODULE_2__["getLocale"])() + '/gia-loose-diamonds/'
      },
      'App/EngagementRing': {
        'type': 'engagementRings',
        'url': Object(_helpers_locale__WEBPACK_IMPORTED_MODULE_2__["getLocale"])() + '/engagement-rings/'
      },
      'App/Jewellery': {
        'type': 'mountingFee',
        'url': Object(_helpers_locale__WEBPACK_IMPORTED_MODULE_2__["getLocale"])() + '/buying-procedure/diamond-inlay-engrave'
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

    Object(_helpers_api__WEBPACK_IMPORTED_MODULE_1__["authGet"])('/api/coupon/valid?code=' + mutualVar.cookiesInfo.coupon_code).then(function (res) {
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

    Object(_helpers_api__WEBPACK_IMPORTED_MODULE_1__["authGet"])('/api/fetch-customer-coupon-code').then(function (res) {
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
        Object(_helpers_api__WEBPACK_IMPORTED_MODULE_1__["get"])('/api/diamonds/' + item.id).then(function (res) {
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
    for (var i = 0; this.shortenName.length > i; i++) {
      if (this.shortenName[i].addedCart == 0 || this.shortenName[i].pairItems.length == 0) {
        this.shortenName.splice(i, 1);
      }
    }

    mutualVar.cookiesInfo.shoppingCart.selectingIndex = this.shortenName.length;
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

      urlId = Object(_helpers_locale__WEBPACK_IMPORTED_MODULE_2__["getLocale"])() + urlId;
    }

    window.open(urlId, '_self');
  },
  removeItem: function removeItem(index) {
    this.shortenName.splice(index, 1);
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
}), _data$watch$filters$c);

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/shoppingCart/stripeCheckoutForm.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/shoppingCart/stripeCheckoutForm.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../helpers/api */ "./resources/js/helpers/api.js");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
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
          Object(_helpers_api__WEBPACK_IMPORTED_MODULE_0__["post"])('/api/place-order', _this.billformdata).then(function (res) {
            if (res.data.saved) {
              _this.receivedPayment(res.data.message);
            }
          })["catch"](function (error) {
            _this.$emit('paymentModalActive', null);

            mutualVar.notification.state.error = error.response.data.message;
          });
        }
      });
    },
    receivedPayment: function receivedPayment(mes) {
      var message = mutualVar.notification.contactMessage;
      message.title = 'message';
      message.type = 'is-danger';
      message.data.push(mes);
      message.next = {
        nextUrl: mutualVar.langs.locale + '/account/pending',
        nextText: 'check your pending order'
      };
      message.active = true;
      mutualVar.cookiesInfo.shoppingCart.items = [];
      mutualVar.cookiesInfo.shoppingCart.selectingIndex = 0;
      this.$parent.sendCookies();
      this.$parent.updateCartItems();
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/sliderBar.vue?vue&type=script&lang=js&":
/*!********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/sliderBar.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
// import vueSlider from 'vue-slider-component';
/* harmony default export */ __webpack_exports__["default"] = ({
  components: {// vueSlider
  },
  props: ['prices', 'logPrices'],
  data: function data() {
    return {
      value: [this.prices[0], this.prices[1]],
      width: "100%",
      height: 8,
      dotSize: 16,
      interval: 0.1,
      min: 6.907755278982137,
      max: 17.72753356339242,
      maxValue: 50000000,
      minValue: 1000,
      controlDots: [this.logMin, this.logMax],
      sliderValues: [0, 0],
      disabled: false,
      show: false,
      useKeyboard: true,
      tooltip: "false",
      formatter: "HK${value}",
      bgStyle: {
        "backgroundColor": "#fff",
        "boxShadow": "inset 0.5px 0.5px 3px 1px rgba(0,0,0,.36)"
      },
      tooltipStyle: {
        "backgroundColor": "#666",
        "borderColor": "#666"
      },
      processStyle: {
        "backgroundColor": "#999"
      }
    };
  },
  computed: {
    values: function values() {
      return this.logPrices;
    },
    logMin: function logMin() {
      return this.logValue(this.minValue);
    },
    logMax: function logMax() {
      return this.logValue(this.maxValue);
    },
    inputMinValue: function inputMinValue() {
      var min = this.logslider(this.logScalePage(this.prices[0]));
      return this.controlDots[0] = this.logValue(this.prices[0]);
    },
    inputMaxValue: function inputMaxValue() {
      var max = this.logslider(this.logScalePage(this.prices[1]));
      return this.controlDots[1] = this.logValue(this.prices[1]);
    },
    scaleFactor: function scaleFactor() {
      var minp = this.min;
      var maxp = this.max; // The result should be between 100 an 10000000

      var minv = Math.log(this.minValue);
      var maxv = Math.log(this.maxValue); // calculate adjustment factor

      var scale = (maxv - minv) / (maxp - minp);
      return scale;
    }
  },
  watch: {
    'prices': 'logPriceValues'
  },
  methods: {
    logslider: function logslider(position) {
      // position will be between 0 and 100
      var minp = this.min;
      var maxp = this.max; // The result should be between 100 an 10000000

      var minv = Math.log(this.minValue);
      var maxv = Math.log(this.maxValue); // calculate adjustment factor

      var scale = (maxv - minv) / (maxp - minp);
      return Math.exp(minv + scale * (position - minp));
    },
    logValue: function logValue(value) {
      return Math.log(value);
    },
    logScalePage: function logScalePage(value) {
      //90
      return Math.ceil((this.maxValue - Math.log(value)) / this.scaleFactor);
    },
    expSliderValues: function expSliderValues() {
      var values = this.$refs.slider.getValue();

      for (var i = 0; values.length > i; i++) {
        this.sliderValues[i] = Math.ceil(Math.exp(values[i]));
      }
    },
    logPriceValues: function logPriceValues() {
      var values = this.prices;

      for (var i = 0; values.length > i; i++) {
        this.value[i] = Math.log(values[i]);
      }
    },
    alertMe: function alertMe() {
      // alert('hi')
      this.expSliderValues();
      this.$emit('slider-bar-update', this.sliderValues);
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/xiaohungshu.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/xiaohungshu.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../helpers/api */ "./resources/js/helpers/api.js");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ __webpack_exports__["default"] = ({
  props: [''],
  // components: { Pagination},
  data: function data() {
    return {
      showFilter: true,
      model: {
        data: []
      },
      keywords: ['tingdiamond', 'ting diamond'],
      params: {
        column: 'id',
        direction: 'desc',
        per_page: 10,
        page: 1,
        search_operator: 'like',
        search_query_1: '',
        search_query_2: ''
      },
      operators: {
        like: 'LIKE',
        equal_to: '=',
        not_equal: '<>',
        less_than: '<',
        greater_than: '>',
        less_than_or_equal_to: '<=',
        greater_than_or_equal_to: '>=',
        "in": 'IN',
        not_in: 'NOT IN',
        between: 'BETWEEN'
      }
    };
  },
  beforeMount: function beforeMount() {
    this.fetchData();
  },
  methods: {
    next: function next() {
      if (this.model.next_page_url) {
        this.params.page++;
        this.fetchData();
      }
    },
    prev: function prev() {
      if (this.model.prev_page_url) {
        this.params.page--;
        this.fetchData();
      }
    },
    moveTo: function moveTo(page) {
      if (this.params.page + page > 0) {
        this.params.page = this.params.page + page;
        this.fetchData();
      }
    },
    sort: function sort(column) {
      if (column === this.params.column) {
        if (this.params.direction === 'desc') {
          this.params.direction = 'asc';
        } else {
          this.params.direction = 'desc';
        }
      } else {
        this.params.column = column;
        this.params.direction = 'asc';
      }

      this.fetchData();
    },
    fetchData: function fetchData() {
      var _this = this;

      var data = '';
      Object(_helpers_api__WEBPACK_IMPORTED_MODULE_0__["curlGet"])('/api/xiaohungshu').then(function (res) {
        // console.log(res.data.model)
        _this.model = res.data.model;
      })["catch"](function (error) {
        console.log(error);
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/frontEnd/shoppingCart/index.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/views/frontEnd/shoppingCart/index.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _components_carousel_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../components/carousel.vue */ "./resources/js/components/carousel.vue");
/* harmony import */ var _components_shoppingCart_item_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../components/shoppingCart/item.vue */ "./resources/js/components/shoppingCart/item.vue");
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _helpers_locale__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../helpers/locale */ "./resources/js/helpers/locale.js");
/* harmony import */ var _helpers_cookie__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../../../helpers/cookie */ "./resources/js/helpers/cookie.js");
/* harmony import */ var _helpers_helperFunctions__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../../../helpers/helperFunctions */ "./resources/js/helpers/helperFunctions.js");
/* harmony import */ var _helpers_getAuthUser__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../../../helpers/getAuthUser */ "./resources/js/helpers/getAuthUser.js");
/* harmony import */ var _components_shoppingCart_stripeCheckoutForm_vue__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ../../../components/shoppingCart/stripeCheckoutForm.vue */ "./resources/js/components/shoppingCart/stripeCheckoutForm.vue");
//








/* harmony default export */ __webpack_exports__["default"] = ({
  el: '#shoppingCart',
  components: {
    stripeCheckoutForm: _components_shoppingCart_stripeCheckoutForm_vue__WEBPACK_IMPORTED_MODULE_7__["default"],
    shoppingCartItem: _components_shoppingCart_item_vue__WEBPACK_IMPORTED_MODULE_1__["default"]
  },
  data: function data() {
    return {};
  }
});

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

/***/ "./node_modules/video.js/dist/video.cjs.js":
/*!*************************************************!*\
  !*** ./node_modules/video.js/dist/video.cjs.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

throw new Error("Module build failed: Error: ENOENT: no such file or directory, open '/Users/chillkwong/Dropbox/code/TD7/node_modules/video.js/dist/video.cjs.js'");

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/appointment.vue?vue&type=template&id=723e91b8&":
/*!**************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/appointment.vue?vue&type=template&id=723e91b8& ***!
  \**************************************************************************************************************************************************************************************************************/
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
          _c("transition", { attrs: { name: "modal" } }, [
            _c("div", { staticClass: "modal-mask" }, [
              _c("div", { staticClass: "modal-wrapper" }, [
                _c(
                  "div",
                  {
                    staticClass: "modal-dialog modal-dialog-centered",
                    attrs: { role: "document" },
                    on: {
                      click: function($event) {
                        return _vm.$emit("active", null)
                      }
                    }
                  },
                  [
                    _c("div", { staticClass: "modal-content" }, [
                      _c("div", { staticClass: "modal-header" }, [
                        _c("h5", { staticClass: "modal-title" }, [
                          _vm._v(_vm._s(_vm.title))
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
                                    return _vm.$emit("active", null)
                                  }
                                }
                              },
                              [_vm._v("×")]
                            )
                          ]
                        )
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "modal-body" }, [
                        _c("h1", { staticClass: "title is-6" }, [
                          _vm._v(
                            _vm._s(
                              _vm._f("capitalize")(
                                _vm._f("transJs")(
                                  _vm.text.title,
                                  _vm.langs,
                                  _vm.locale
                                )
                              )
                            )
                          )
                        ]),
                        _vm._v(" "),
                        _c("table", { staticClass: "table table-responsive" }, [
                          _c(
                            "tr",
                            _vm._l(_vm.columns, function(column) {
                              return _c("td", [
                                _vm._v(
                                  _vm._s(
                                    _vm._f("capitalize")(
                                      _vm._f("transJs")(
                                        column,
                                        _vm.langs,
                                        _vm.locale
                                      )
                                    )
                                  )
                                )
                              ])
                            }),
                            0
                          ),
                          _vm._v(" "),
                          _c(
                            "tr",
                            _vm._l(_vm.columns, function(column) {
                              return _c("td", [
                                _vm._v(_vm._s(_vm.value[column]))
                              ])
                            }),
                            0
                          )
                        ]),
                        _vm._v(" "),
                        _c(
                          "form",
                          {
                            on: {
                              submit: function($event) {
                                $event.preventDefault()
                                return _vm.save($event)
                              }
                            }
                          },
                          [
                            _c("input", {
                              directives: [
                                {
                                  name: "model",
                                  rawName: "v-model",
                                  value: _vm.form.name,
                                  expression: "form.name"
                                }
                              ],
                              staticClass: "form-control",
                              attrs: {
                                type: "text",
                                name: "name",
                                placeholder: _vm._f("transJs")(
                                  _vm.text.placeholderName,
                                  _vm.langs,
                                  _vm.locale
                                ),
                                required: ""
                              },
                              domProps: { value: _vm.form.name },
                              on: {
                                input: function($event) {
                                  if ($event.target.composing) {
                                    return
                                  }
                                  _vm.$set(
                                    _vm.form,
                                    "name",
                                    $event.target.value
                                  )
                                }
                              }
                            }),
                            _vm._v(" "),
                            _c("input", {
                              directives: [
                                {
                                  name: "model",
                                  rawName: "v-model",
                                  value: _vm.form.phone,
                                  expression: "form.phone"
                                }
                              ],
                              staticClass: "form-control",
                              attrs: {
                                type: "number",
                                name: "tel",
                                placeholder: _vm._f("transJs")(
                                  _vm.text.placeholderNo,
                                  _vm.langs,
                                  _vm.locale
                                ),
                                required: ""
                              },
                              domProps: { value: _vm.form.phone },
                              on: {
                                input: function($event) {
                                  if ($event.target.composing) {
                                    return
                                  }
                                  _vm.$set(
                                    _vm.form,
                                    "phone",
                                    $event.target.value
                                  )
                                }
                              }
                            }),
                            _vm._v(" "),
                            _c("textarea", {
                              directives: [
                                {
                                  name: "model",
                                  rawName: "v-model",
                                  value: _vm.form.remark,
                                  expression: "form.remark"
                                }
                              ],
                              staticClass: "form-control",
                              attrs: { rows: "5", cols: "50" },
                              domProps: { value: _vm.form.remark },
                              on: {
                                input: function($event) {
                                  if ($event.target.composing) {
                                    return
                                  }
                                  _vm.$set(
                                    _vm.form,
                                    "remark",
                                    $event.target.value
                                  )
                                }
                              }
                            }),
                            _vm._v(" "),
                            _c("div", [
                              _c(
                                "a",
                                {
                                  staticClass: "btn btn-primary",
                                  attrs: { href: _vm.hrefLangs + "/about-us" }
                                },
                                [
                                  _vm._v(
                                    _vm._s(
                                      _vm._f("transJs")(
                                        _vm.text.button,
                                        _vm.langs,
                                        _vm.locale
                                      )
                                    )
                                  )
                                ]
                              ),
                              _vm._v(" "),
                              _c(
                                "button",
                                {
                                  staticClass: "btn btn-success ",
                                  class: { "is-loading": _vm.processing },
                                  on: {
                                    submit: function($event) {
                                      $event.stopPropagation()
                                      return _vm.save($event)
                                    }
                                  }
                                },
                                [
                                  _vm._v(
                                    _vm._s(
                                      _vm._f("transJs")(
                                        _vm.text.button1,
                                        _vm.langs,
                                        _vm.locale
                                      )
                                    )
                                  )
                                ]
                              )
                            ])
                          ]
                        )
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
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/carousel.vue?vue&type=template&id=76e872ab&":
/*!***********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/carousel.vue?vue&type=template&id=76e872ab& ***!
  \***********************************************************************************************************************************************************************************************************/
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
  return _c(
    "div",
    [
      _c(
        "ul",
        { staticClass: "nav nav-pills justify-content-center" },
        _vm._l(_vm.upperitems.images, function(img, index) {
          return _c(
            "li",
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
                      class: { active: _vm.currentIndex == index },
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
                : _vm._e()
            ]
          )
        }),
        0
      ),
      _vm._v(" "),
      _c(
        "ul",
        { staticClass: "nav nav-pills justify-content-center" },
        _vm._l(_vm.chunkedUpperItems, function(img, index) {
          return _c(
            "li",
            {
              staticClass: "nav-item",
              on: {
                click: function($event) {
                  return _vm.$emit("active", null)
                }
              }
            },
            [
              _c(
                "a",
                {
                  staticClass: "nav-link",
                  class: { active: _vm.currentIndex == index },
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
      _c("div", { staticClass: "d-none d-sm-block" }, [
        _c(
          "div",
          { staticClass: "row justify-content-center" },
          _vm._l(_vm.chunkedUpperItems, function(img, index) {
            return img.thumb
              ? _c(
                  "div",
                  {
                    staticClass: "col-4",
                    on: {
                      click: function($event) {
                        return _vm.currentSelectedItem(index, "upper")
                      }
                    }
                  },
                  [
                    _c("img", {
                      staticClass:
                        "rounded mx-auto d-block image-background p-6",
                      class: {
                        "border border-primary rounded":
                          _vm.currentIndex == index
                      },
                      attrs: { src: _vm.images + img.thumb, width: "180" }
                    }),
                    _vm._v(" "),
                    img.type == "video"
                      ? _c("i", {
                          staticClass:
                            "far fa-play-circle fa-3x color-blue image-up-left",
                          staticStyle: { opacity: "0.5" },
                          attrs: { "aria-hidden": "true" }
                        })
                      : _vm._e()
                  ]
                )
              : _vm._e()
          }),
          0
        )
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "d-sm-none d-block" }, [
        _c(
          "div",
          { staticClass: "row justify-content-center" },
          _vm._l(_vm.chunkedUpperItems, function(img, index) {
            return img.thumb
              ? _c(
                  "div",
                  {
                    staticClass: "col-4",
                    on: {
                      click: function($event) {
                        return _vm.currentSelectedItem(index, "upper")
                      }
                    }
                  },
                  [
                    _c("img", {
                      staticClass:
                        "rounded mx-auto d-block image-background p-6",
                      class: {
                        "border border-primary rounded":
                          _vm.currentIndex == index
                      },
                      attrs: { src: _vm.images + img.thumb, width: "96" }
                    }),
                    _vm._v(" "),
                    img.type == "video"
                      ? _c("i", {
                          staticClass:
                            "far fa-play-circle fa-3lg color-blue image-up-left",
                          staticStyle: { opacity: "0.5" },
                          attrs: { "aria-hidden": "true" }
                        })
                      : _vm._e()
                  ]
                )
              : _vm._e()
          }),
          0
        )
      ]),
      _vm._v(" "),
      _c(
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
            "center",
            [
              _vm.currentItem.type == "img"
                ? _c("img", {
                    attrs: {
                      src: _vm.images + _vm.currentItem.src,
                      width: "80%"
                    },
                    on: { click: _vm.nextItem }
                  })
                : _vm._e(),
              _vm._v(" "),
              _vm.currentItem.type == "video"
                ? _c("video-player", { attrs: { options: _vm.videoOptions } })
                : _vm._e(),
              _vm._v(" "),
              _c("p", { staticClass: "title is-3" }, [
                _vm._v(_vm._s(_vm.currentItem.title))
              ]),
              _vm._v(" "),
              _c("p", { staticClass: "subtitle is-5" }, [
                _vm._v(" " + _vm._s(_vm.currentItem.desc) + " ")
              ]),
              _vm._v(" "),
              _c("span", {
                domProps: { innerHTML: _vm._s(_vm.currentItem.other) }
              })
            ],
            1
          )
        ],
        1
      ),
      _vm._v(" "),
      _vm.chunkedItemsDesktop.length
        ? _c("center", [_c("a", [_vm._v(_vm._s(_vm.title))])])
        : _vm._e(),
      _vm._v(" "),
      _c("div", { staticClass: "d-none d-sm-block" }, [
        _c(
          "div",
          { staticClass: "row justify-content-center" },
          _vm._l(_vm.chunkedItemsMobile, function(img, index) {
            return img.thumb
              ? _c(
                  "div",
                  {
                    staticClass: "col-4 ",
                    on: {
                      click: function($event) {
                        return _vm.currentSelectedItem(index, "lower")
                      }
                    }
                  },
                  [
                    _c("img", {
                      staticClass:
                        "rounded mx-auto d-block image-background p-6",
                      class: {
                        " border border-primary rounded":
                          _vm.currentIndex == index
                      },
                      attrs: { src: _vm.images + img.thumb, width: "256" }
                    }),
                    _vm._v(" "),
                    img.type == "video"
                      ? _c("i", {
                          staticClass:
                            "far fa-play-circle fa-3x color-blue image-up-left",
                          staticStyle: { opacity: "0.5" },
                          attrs: { "aria-hidden": "true" }
                        })
                      : _vm._e()
                  ]
                )
              : _vm._e()
          }),
          0
        )
      ]),
      _vm._v(" "),
      _c("div", { staticClass: "d-sm-none d-block" }, [
        _c(
          "div",
          { staticClass: "row justify-content-center" },
          _vm._l(_vm.chunkedItemsMobile, function(img, index) {
            return img.thumb
              ? _c(
                  "div",
                  {
                    staticClass: "col-4 ",
                    on: {
                      click: function($event) {
                        return _vm.currentSelectedItem(index, "lower")
                      }
                    }
                  },
                  [
                    _c("img", {
                      staticClass:
                        "rounded mx-auto d-block image-background p-6",
                      class: {
                        " border border-primary rounded":
                          _vm.currentIndex == index
                      },
                      attrs: { src: _vm.images + img.thumb, width: "96" }
                    }),
                    _vm._v(" "),
                    img.type == "video"
                      ? _c("i", {
                          staticClass:
                            "far fa-play-circle fa-lg color-blue image-up-left",
                          staticStyle: { opacity: "0.5" },
                          attrs: { "aria-hidden": "true" }
                        })
                      : _vm._e()
                  ]
                )
              : _vm._e()
          }),
          0
        )
      ]),
      _vm._v(" "),
      _c("nav", { attrs: { "aria-label": "Page navigation example" } }, [
        _c("ul", { staticClass: "pagination justify-content-center" }, [
          _c("li", { staticClass: "page-item" }, [
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
            "li",
            {
              staticClass: "page-item",
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
          _c("li", { staticClass: "page-item active" }, [
            _c("a", { staticClass: "page-link" }, [
              _vm._v(_vm._s(_vm.currentIndex + 1))
            ])
          ]),
          _vm._v(" "),
          _c(
            "li",
            {
              staticClass: "page-item",
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
          _c("li", { staticClass: "page-item" }, [
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
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/imageCarousel.vue?vue&type=template&id=c5e34bc0&":
/*!****************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/imageCarousel.vue?vue&type=template&id=c5e34bc0& ***!
  \****************************************************************************************************************************************************************************************************************/
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
          _c("transition", { attrs: { name: "modal" } }, [
            _c("div", { staticClass: "modal-mask" }, [
              _c("div", { staticClass: "modal-wrapper" }, [
                _c(
                  "div",
                  {
                    staticClass: "modal-dialog modal-dialog-centered",
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
                          _c("div", { staticClass: "box" }, [
                            _c("figure", { staticClass: "image" }, [
                              _vm.currentItem.type == "img"
                                ? _c("img", {
                                    attrs: {
                                      width: "100%",
                                      src: _vm.images + _vm.currentItem.src
                                    },
                                    on: { click: _vm.nextItem }
                                  })
                                : _vm._e(),
                              _vm._v(" "),
                              _vm.currentItem.type == "video"
                                ? _c("iframe", {
                                    attrs: {
                                      id: "iframe1",
                                      src:
                                        _vm.youtube +
                                        _vm.currentItem.src +
                                        _vm.rel,
                                      width: _vm.width,
                                      height: _vm.height
                                    }
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
                          ]),
                          _vm._v(" "),
                          _c(
                            "div",
                            { staticClass: "row justify-content-center" },
                            [
                              _c(
                                "div",
                                { staticClass: "col-md-12 text-center" },
                                _vm._l(_vm.items, function(item, index) {
                                  return _c("a", [
                                    _c(
                                      "button",
                                      {
                                        staticClass: "btn",
                                        class: {
                                          " btn-primary":
                                            _vm.currentIndex == index
                                        },
                                        on: {
                                          click: function($event) {
                                            return _vm.currentSelectedItem(
                                              index,
                                              "lower"
                                            )
                                          }
                                        }
                                      },
                                      [_vm._v(_vm._s(index + 1))]
                                    )
                                  ])
                                }),
                                0
                              )
                            ]
                          )
                        ]
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
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/productViewer360.vue?vue&type=template&id=4df11af7&":
/*!*******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/productViewer360.vue?vue&type=template&id=4df11af7& ***!
  \*******************************************************************************************************************************************************************************************************************/
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
  return _c("div", {
    staticClass: "cloudimage-360",
    style: { cursor: _vm.status },
    attrs: {
      "data-folder": _vm.folder,
      "data-filename": _vm.filename,
      "data-amount": "60",
      "data-spin-reverse": "true",
      "data-keys": _vm.autoPlay
    },
    on: {
      mouseover: function($event) {
        _vm.status = "grabbing"
      }
    }
  })
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/shoppingCart/cart.vue?vue&type=template&id=402299ec&":
/*!********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/shoppingCart/cart.vue?vue&type=template&id=402299ec& ***!
  \********************************************************************************************************************************************************************************************************************/
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
        [
          _vm._v(
            _vm._s(
              _vm._f("transJs")(
                "Select this Item",
                _vm.langs,
                _vm.mutualVar.langs.localeCode
              )
            )
          )
        ]
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
                                    { staticClass: "modal-body" },
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
                                                              "\n                                        " +
                                                                _vm._s(
                                                                  _vm._f(
                                                                    "transJs"
                                                                  )(
                                                                    option.text,
                                                                    _vm.langs,
                                                                    _vm
                                                                      .mutualVar
                                                                      .langs
                                                                      .localeCode
                                                                  )
                                                                ) +
                                                                "\n                                      "
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
                                              staticClass: "btn btn-primary",
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
                                                    _vm.langs,
                                                    _vm.mutualVar.langs
                                                      .localeCode
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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/shoppingCart/item.vue?vue&type=template&id=f4232f42&":
/*!********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/shoppingCart/item.vue?vue&type=template&id=f4232f42& ***!
  \********************************************************************************************************************************************************************************************************************/
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
  return _c(
    "div",
    [
      _vm._l(_vm.shortenName, function(item, firstIndex) {
        return _c(
          "div",
          {
            staticClass: "row border rounded ",
            staticStyle: { "margin-top": "10px" }
          },
          [
            item.pairItems.length > 0
              ? _c("div", { staticClass: "col" }, [
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
                            "row justify-content-between color-white ",
                          class: item.pairItems.filter(function(data) {
                            return data.available != 1
                          }).length
                            ? "background-danger"
                            : "background-primary"
                        },
                        [
                          _c("div", { staticClass: "col-auto mr-auto" }, [
                            _c("p", [
                              _c("strong", [
                                _vm._v(
                                  _vm._s(
                                    _vm._f("transJs")(
                                      item.pairItems[0].type,
                                      _vm.langs,
                                      _vm.mutualVar.langs.localeCode
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
                                            _vm.langs,
                                            _vm.mutualVar.langs.localeCode
                                          )
                                        )
                                    )
                                  ])
                                : _vm._e()
                            ])
                          ]),
                          _vm._v(" "),
                          _c("div", { staticClass: "col-auto" }, [
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
                                      ? "btn-danger"
                                      : "btn-primary"
                                  },
                                  [
                                    _vm._v(
                                      _vm._s(
                                        _vm._f("transJs")(
                                          "Back to",
                                          _vm.langs,
                                          _vm.mutualVar.langs.localeCode
                                        )
                                      ) +
                                        _vm._s(
                                          _vm._f("transJs")(
                                            item.pairItems[0].type,
                                            _vm.langs,
                                            _vm.mutualVar.langs.localeCode
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
                                  ? "btn-danger"
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
                                    _vm._f("transJs")(
                                      "Remove",
                                      _vm.langs,
                                      _vm.mutualVar.langs.localeCode
                                    )
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
                              staticClass: "row color-grey ",
                              class: item.pairItems.filter(function(data) {
                                return data.available != 1
                              }).length
                                ? "background-op-008-danger"
                                : "background-op-008-primary"
                            },
                            [
                              _c("div", { staticClass: "col-8" }, [
                                _c("div", { staticClass: "row " }, [
                                  _c("div", { staticClass: "col-6 p-10" }, [
                                    _c(
                                      "a",
                                      {
                                        attrs: {
                                          href: pairItem.url + pairItem.id
                                        },
                                        on: {
                                          click: function($event) {
                                            return _vm.directTo(pairItem.id)
                                          }
                                        }
                                      },
                                      [
                                        _c("img", {
                                          staticClass: "arounded border",
                                          attrs: {
                                            width: "128",
                                            src: pairItem.image
                                          },
                                          on: {
                                            click: function($event) {
                                              _vm.selectingCarousel =
                                                pairItem.type
                                            }
                                          }
                                        })
                                      ]
                                    )
                                  ]),
                                  _vm._v(" "),
                                  _c("div", { staticClass: "col" }, [
                                    _c(
                                      "a",
                                      {
                                        attrs: {
                                          href: pairItem.url + pairItem.id
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
                                            { staticClass: "input-group mb-3" },
                                            [
                                              _c(
                                                "div",
                                                {
                                                  staticClass:
                                                    "input-group-prepend"
                                                },
                                                [
                                                  _c(
                                                    "label",
                                                    {
                                                      staticClass:
                                                        "input-group-text",
                                                      attrs: {
                                                        for:
                                                          "inputGroupSelect01"
                                                      }
                                                    },
                                                    [
                                                      _vm._v(
                                                        "\n                                                " +
                                                          _vm._s(
                                                            _vm._f("transJs")(
                                                              "Ring Size",
                                                              _vm.langs,
                                                              _vm.mutualVar
                                                                .langs
                                                                .localeCode
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
                                                      value: pairItem.ringSize,
                                                      expression:
                                                        "pairItem.ringSize"
                                                    }
                                                  ],
                                                  staticClass: "custom-select",
                                                  attrs: {
                                                    id: "inputGroupSelect01",
                                                    required: ""
                                                  },
                                                  on: {
                                                    change: function($event) {
                                                      var $$selectedVal = Array.prototype.filter
                                                        .call(
                                                          $event.target.options,
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
                                                        $event.target.multiple
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
                                                  )(
                                                    "Engrave",
                                                    _vm.langs,
                                                    _vm.mutualVar.langs
                                                      .localeCode
                                                  )
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
                                            ]
                                          )
                                        ])
                                      : _vm._e()
                                  ])
                                ])
                              ]),
                              _vm._v(" "),
                              _c("div", { staticClass: "col-4" }, [
                                _c("div", { staticClass: "row " }, [
                                  _c("div", { staticClass: "col" }, [
                                    _c(
                                      "a",
                                      {
                                        staticClass: "title is-6",
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
                                                _vm.langs,
                                                _vm.mutualVar.langs.localeCode
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
                                      staticClass: "col",
                                      on: {
                                        click: function($event) {
                                          _vm.selectingCarousel = pairItem.type
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
                                            _c("p", [
                                              _vm._v(
                                                _vm._s(
                                                  "$" + pairItem.unit_price
                                                )
                                              )
                                            ])
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
                                ])
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
      _c("div", { staticClass: "row " }, [
        _c("div", { staticClass: "col-xl-auto mr-auto col-6" }, [
          _vm._m(0),
          _vm._v(" "),
          _c("div", { staticClass: "row" }, [
            _c("div", { staticClass: "col" }, [
              _c("p", [
                _vm._v(
                  _vm._s(
                    _vm._f("transJs")(
                      "Precautions",
                      _vm.langs,
                      _vm.mutualVar.langs.localeCode
                    )
                  ) + "："
                )
              ]),
              _vm._v(" "),
              _c("small", [
                _c("p", [
                  _vm._v(
                    _vm._s(
                      _vm._f("transJs")(
                        "All amounts of the company are subject to Hong Kong dollar settlement",
                        _vm.langs,
                        _vm.mutualVar.langs.localeCode
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
                        _vm.langs,
                        _vm.mutualVar.langs.localeCode
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
                        _vm.langs,
                        _vm.mutualVar.langs.localeCode
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
                            _vm.langs,
                            _vm.mutualVar.langs.localeCode
                          )
                        ) + "\n                            "
                      ),
                      _c("strong", [
                        _vm._v(
                          _vm._s(
                            _vm._f("transJs")(
                              "On",
                              _vm.langs,
                              _vm.mutualVar.langs.localeCode
                            )
                          ) + " "
                        ),
                        _c("a", { staticClass: "color-blue" }, [
                          _vm._v(
                            " " +
                              _vm._s(
                                _vm._f("transJs")(
                                  _vm.extraWorkingDates(
                                    _vm.maxDeliveryDate,
                                    "months"
                                  ),
                                  _vm.langs,
                                  _vm.mutualVar.langs.localeCode
                                )
                              ) +
                              " " +
                              _vm._s(
                                _vm.extraWorkingDates(_vm.maxDeliveryDate)
                              ) +
                              " " +
                              _vm._s(
                                _vm._f("transJs")(
                                  "day",
                                  _vm.langs,
                                  _vm.mutualVar.langs.localeCode
                                )
                              ) +
                              ",  " +
                              _vm._s(
                                _vm._f("transJs")(
                                  _vm.extraWorkingDates(
                                    _vm.maxDeliveryDate,
                                    "dates"
                                  ),
                                  _vm.langs,
                                  _vm.mutualVar.langs.localeCode
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
        _c("div", { staticClass: "col-xl-auto col-6" }, [
          _c("div", { staticClass: "row" }, [
            _c("div", { staticClass: "col" }, [
              _c("div", { staticClass: "level is-mobile" }, [
                _c("div", { staticClass: "input-group mb-3" }, [
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
                          _vm._s(
                            _vm._f("transJs")(
                              "Apply Coupon",
                              _vm.langs,
                              _vm.mutualVar.langs.localeCode
                            )
                          )
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
                    staticClass: "form-control",
                    attrs: {
                      type: "text",
                      placeholder: _vm._f("transJs")(
                        "Enter Coupon Code",
                        _vm.langs,
                        _vm.mutualVar.langs.localeCode
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
                  })
                ])
              ]),
              _vm._v(" "),
              _vm.couponValid == 0
                ? _c("p", { staticStyle: { color: "red" } }, [
                    _c("small", [
                      _vm._v(
                        _vm._s(
                          _vm._f("transJs")(
                            "not valid",
                            _vm.langs,
                            _vm.mutualVar.langs.localeCode
                          )
                        )
                      )
                    ])
                  ])
                : _vm._e()
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "row " }, [
            _c("div", { staticClass: "col-xl-auto mr-auto col-6" }, [
              _vm.couponValid || _vm.calculatedDiscountRate != 1
                ? _c("div", [
                    _c("p", [
                      _vm._v(
                        _vm._s(
                          _vm._f("transJs")(
                            "Total",
                            _vm.langs,
                            _vm.mutualVar.langs.localeCode
                          )
                        ) + " "
                      )
                    ]),
                    _vm._v(" "),
                    _c("p", [
                      _vm._v(
                        _vm._s(
                          _vm._f("transJs")(
                            "Disounted Total",
                            _vm.langs,
                            _vm.mutualVar.langs.localeCode
                          )
                        )
                      )
                    ])
                  ])
                : _c("div", [
                    _c("p", [
                      _vm._v(
                        _vm._s(
                          _vm._f("transJs")(
                            "Total",
                            _vm.langs,
                            _vm.mutualVar.langs.localeCode
                          )
                        ) + " "
                      )
                    ])
                  ]),
              _vm._v(" "),
              _c("p", [
                _vm._v(
                  _vm._s(
                    _vm._f("transJs")(
                      "Deposit (20%)",
                      _vm.langs,
                      _vm.mutualVar.langs.localeCode
                    )
                  )
                )
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "level" }, [
                _c("p", [
                  _vm._v(
                    _vm._s(
                      _vm._f("transJs")(
                        "Balance (80%)",
                        _vm.langs,
                        _vm.mutualVar.langs.localeCode
                      )
                    ) + "\n                        "
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
                              _vm._f("transJs")(
                                paymentOption.name,
                                _vm.langs,
                                _vm.mutualVar.langs.localeCode
                              )
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
            _c("div", { staticClass: "col-xl-auto col-6" }, [
              _vm.couponValid || _vm.calculatedDiscountRate != 1
                ? _c("div", [
                    _c("del", [
                      _c("p", [_vm._v("HK$ " + _vm._s(_vm.subTotal))])
                    ]),
                    _vm._v(" "),
                    _c("p", { staticStyle: { color: "red" } }, [
                      _vm._v("HK$ " + _vm._s(_vm.discountedSubTotal))
                    ]),
                    _vm._v(" "),
                    _c("p"),
                    _vm._v(" "),
                    _c("p", [
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
                    _c("p", [
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
              _c("p", [
                _c("strong", [_vm._v(" HK$ " + _vm._s(_vm.balance) + " ")])
              ])
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "row " }, [
            _c("div", { staticClass: "col-xl-auto mr-auto col-6" }, [
              _c("p", { staticStyle: { color: "red" } }, [
                _vm._v(
                  "* " +
                    _vm._s(
                      _vm._f("transJs")(
                        "you only need to pay deposit, balance will pay after 100% satisfied",
                        _vm.langs,
                        _vm.mutualVar.langs.localeCode
                      )
                    )
                )
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "col-xl-auto col-6" }, [
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
                        { attrs: { href: _vm.locale + "/shop-bag-bill" } },
                        [
                          _c(
                            "button",
                            {
                              staticClass: "btn btn-primary",
                              attrs: { disabled: !_vm.checkoutClickable }
                            },
                            [
                              _c("i", { staticClass: "fas fa-shopping-cart" }),
                              _vm._v(
                                _vm._s(
                                  _vm._f("transJs")(
                                    "checkout",
                                    _vm.langs,
                                    _vm.mutualVar.langs.localeCode
                                  )
                                )
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
      ])
    ],
    2
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "row " }, [
      _c("div", { staticClass: "col" }, [_c("p")])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/shoppingCart/stripeCheckoutForm.vue?vue&type=template&id=3c63c463&":
/*!**********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/shoppingCart/stripeCheckoutForm.vue?vue&type=template&id=3c63c463& ***!
  \**********************************************************************************************************************************************************************************************************************************/
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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/sliderBar.vue?vue&type=template&id=1e077692&":
/*!************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/sliderBar.vue?vue&type=template&id=1e077692& ***!
  \************************************************************************************************************************************************************************************************************/
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
  return _c(
    "div",
    { on: { click: _vm.alertMe } },
    [
      _c("vue-slider", {
        ref: "slider",
        attrs: {
          interval: _vm.interval,
          value: _vm.value,
          min: _vm.min,
          max: _vm.max,
          tooltip: _vm.tooltip
        }
      })
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/xiaohungshu.vue?vue&type=template&id=85054580&":
/*!**************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/xiaohungshu.vue?vue&type=template&id=85054580& ***!
  \**************************************************************************************************************************************************************************************************************/
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
  return _c("div", { staticClass: "container is-fluid" }, [
    _c("nav", { staticClass: "level" }, [
      _c("div", { staticClass: "level-left" }, [
        _c("div", { staticClass: "level-item" }, [
          _c("p", { staticClass: "subtitle is-5" }, [
            _c("strong", [_vm._v(_vm._s(_vm.title))])
          ])
        ])
      ]),
      _vm._v(" "),
      _c(
        "div",
        { staticClass: "level-right" },
        [
          _c(
            "router-link",
            { staticClass: "button is-primary", attrs: { to: _vm.create } },
            [_vm._v("Create")]
          ),
          _vm._v(" "),
          _c("p", { staticClass: "control" }, [
            _c(
              "button",
              {
                on: {
                  click: function($event) {
                    _vm.showFilter = !_vm.showFilter
                  }
                }
              },
              [_vm._v("Filter")]
            )
          ])
        ],
        1
      )
    ])
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
      ? function () { injectStyles.call(this, this.$root.$options.shadowRoot) }
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

/***/ "./node_modules/vue-video-player/dist/vue-video-player.js":
/*!****************************************************************!*\
  !*** ./node_modules/vue-video-player/dist/vue-video-player.js ***!
  \****************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

!function(e,t){ true?module.exports=t(__webpack_require__(/*! video.js */ "./node_modules/video.js/dist/video.cjs.js")):undefined}(this,function(e){return function(e){function t(i){if(n[i])return n[i].exports;var r=n[i]={i:i,l:!1,exports:{}};return e[i].call(r.exports,r,r.exports,t),r.l=!0,r.exports}var n={};return t.m=e,t.c=n,t.i=function(e){return e},t.d=function(e,n,i){t.o(e,n)||Object.defineProperty(e,n,{configurable:!1,enumerable:!0,get:i})},t.n=function(e){var n=e&&e.__esModule?function(){return e.default}:function(){return e};return t.d(n,"a",n),n},t.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},t.p="/",t(t.s=3)}([function(t,n){t.exports=e},function(e,t,n){"use strict";function i(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}Object.defineProperty(t,"__esModule",{value:!0});var r=n(0),o=function(e){return e&&e.__esModule?e:{default:e}}(r),s=window.videojs||o.default;"function"!=typeof Object.assign&&Object.defineProperty(Object,"assign",{value:function(e,t){if(null==e)throw new TypeError("Cannot convert undefined or null to object");for(var n=Object(e),i=1;i<arguments.length;i++){var r=arguments[i];if(null!=r)for(var o in r)Object.prototype.hasOwnProperty.call(r,o)&&(n[o]=r[o])}return n},writable:!0,configurable:!0});var a=["loadeddata","canplay","canplaythrough","play","pause","waiting","playing","ended","error"];t.default={name:"video-player",props:{start:{type:Number,default:0},crossOrigin:{type:String,default:""},playsinline:{type:Boolean,default:!1},customEventName:{type:String,default:"statechanged"},options:{type:Object,required:!0},events:{type:Array,default:function(){return[]}},globalOptions:{type:Object,default:function(){return{controls:!0,controlBar:{remainingTimeDisplay:!1,playToggle:{},progressControl:{},fullscreenToggle:{},volumeMenuButton:{inline:!1,vertical:!0}},techOrder:["html5"],plugins:{}}}},globalEvents:{type:Array,default:function(){return[]}}},data:function(){return{player:null,reseted:!0}},mounted:function(){this.player||this.initialize()},beforeDestroy:function(){this.player&&this.dispose()},methods:{initialize:function(){var e=this,t=Object.assign({},this.globalOptions,this.options);this.playsinline&&(this.$refs.video.setAttribute("playsinline",this.playsinline),this.$refs.video.setAttribute("webkit-playsinline",this.playsinline),this.$refs.video.setAttribute("x5-playsinline",this.playsinline),this.$refs.video.setAttribute("x5-video-player-type","h5"),this.$refs.video.setAttribute("x5-video-player-fullscreen",!1)),""!==this.crossOrigin&&(this.$refs.video.crossOrigin=this.crossOrigin,this.$refs.video.setAttribute("crossOrigin",this.crossOrigin));var n=function(t,n){t&&e.$emit(t,e.player),n&&e.$emit(e.customEventName,i({},t,n))};t.plugins&&delete t.plugins.__ob__;var r=this;this.player=s(this.$refs.video,t,function(){for(var e=this,t=a.concat(r.events).concat(r.globalEvents),i={},o=0;o<t.length;o++)"string"==typeof t[o]&&void 0===i[t[o]]&&function(t){i[t]=null,e.on(t,function(){n(t,!0)})}(t[o]);this.on("timeupdate",function(){n("timeupdate",this.currentTime())}),r.$emit("ready",this)})},dispose:function(e){var t=this;this.player&&this.player.dispose&&("Flash"!==this.player.techName_&&this.player.pause&&this.player.pause(),this.player.dispose(),this.player=null,this.$nextTick(function(){t.reseted=!1,t.$nextTick(function(){t.reseted=!0,t.$nextTick(function(){e&&e()})})}))}},watch:{options:{deep:!0,handler:function(e,t){var n=this;this.dispose(function(){e&&e.sources&&e.sources.length&&n.initialize()})}}}}},function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0});var i=n(1),r=n.n(i);for(var o in i)["default","default"].indexOf(o)<0&&function(e){n.d(t,e,function(){return i[e]})}(o);var s=n(5),a=n(4),l=a(r.a,s.a,!1,null,null,null);t.default=l.exports},function(e,t,n){"use strict";function i(e){return e&&e.__esModule?e:{default:e}}Object.defineProperty(t,"__esModule",{value:!0}),t.install=t.videoPlayer=t.videojs=void 0;var r=n(0),o=i(r),s=n(2),a=i(s),l=window.videojs||o.default,u=function(e,t){t&&(t.options&&(a.default.props.globalOptions.default=function(){return t.options}),t.events&&(a.default.props.globalEvents.default=function(){return t.events})),e.component(a.default.name,a.default)},d={videojs:l,videoPlayer:a.default,install:u};t.default=d,t.videojs=l,t.videoPlayer=a.default,t.install=u},function(e,t){e.exports=function(e,t,n,i,r,o){var s,a=e=e||{},l=typeof e.default;"object"!==l&&"function"!==l||(s=e,a=e.default);var u="function"==typeof a?a.options:a;t&&(u.render=t.render,u.staticRenderFns=t.staticRenderFns,u._compiled=!0),n&&(u.functional=!0),r&&(u._scopeId=r);var d;if(o?(d=function(e){e=e||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext,e||"undefined"==typeof __VUE_SSR_CONTEXT__||(e=__VUE_SSR_CONTEXT__),i&&i.call(this,e),e&&e._registeredComponents&&e._registeredComponents.add(o)},u._ssrRegister=d):i&&(d=i),d){var c=u.functional,f=c?u.render:u.beforeCreate;c?(u._injectStyles=d,u.render=function(e,t){return d.call(t),f(e,t)}):u.beforeCreate=f?[].concat(f,d):[d]}return{esModule:s,exports:a,options:u}}},function(e,t,n){"use strict";var i=function(){var e=this,t=e.$createElement,n=e._self._c||t;return e.reseted?n("div",{staticClass:"video-player"},[n("video",{ref:"video",staticClass:"video-js"})]):e._e()},r=[],o={render:i,staticRenderFns:r};t.a=o}])});

/***/ }),

/***/ "./resources/js/components/appointment.vue":
/*!*************************************************!*\
  !*** ./resources/js/components/appointment.vue ***!
  \*************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _appointment_vue_vue_type_template_id_723e91b8___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./appointment.vue?vue&type=template&id=723e91b8& */ "./resources/js/components/appointment.vue?vue&type=template&id=723e91b8&");
/* harmony import */ var _appointment_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./appointment.vue?vue&type=script&lang=js& */ "./resources/js/components/appointment.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _appointment_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _appointment_vue_vue_type_template_id_723e91b8___WEBPACK_IMPORTED_MODULE_0__["render"],
  _appointment_vue_vue_type_template_id_723e91b8___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/appointment.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/appointment.vue?vue&type=script&lang=js&":
/*!**************************************************************************!*\
  !*** ./resources/js/components/appointment.vue?vue&type=script&lang=js& ***!
  \**************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_appointment_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./appointment.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/appointment.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_appointment_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/appointment.vue?vue&type=template&id=723e91b8&":
/*!********************************************************************************!*\
  !*** ./resources/js/components/appointment.vue?vue&type=template&id=723e91b8& ***!
  \********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_appointment_vue_vue_type_template_id_723e91b8___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./appointment.vue?vue&type=template&id=723e91b8& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/appointment.vue?vue&type=template&id=723e91b8&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_appointment_vue_vue_type_template_id_723e91b8___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_appointment_vue_vue_type_template_id_723e91b8___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/carousel.vue":
/*!**********************************************!*\
  !*** ./resources/js/components/carousel.vue ***!
  \**********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _carousel_vue_vue_type_template_id_76e872ab___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./carousel.vue?vue&type=template&id=76e872ab& */ "./resources/js/components/carousel.vue?vue&type=template&id=76e872ab&");
/* harmony import */ var _carousel_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./carousel.vue?vue&type=script&lang=js& */ "./resources/js/components/carousel.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _carousel_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _carousel_vue_vue_type_template_id_76e872ab___WEBPACK_IMPORTED_MODULE_0__["render"],
  _carousel_vue_vue_type_template_id_76e872ab___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/carousel.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/carousel.vue?vue&type=script&lang=js&":
/*!***********************************************************************!*\
  !*** ./resources/js/components/carousel.vue?vue&type=script&lang=js& ***!
  \***********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_carousel_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./carousel.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/carousel.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_carousel_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/carousel.vue?vue&type=template&id=76e872ab&":
/*!*****************************************************************************!*\
  !*** ./resources/js/components/carousel.vue?vue&type=template&id=76e872ab& ***!
  \*****************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_carousel_vue_vue_type_template_id_76e872ab___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./carousel.vue?vue&type=template&id=76e872ab& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/carousel.vue?vue&type=template&id=76e872ab&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_carousel_vue_vue_type_template_id_76e872ab___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_carousel_vue_vue_type_template_id_76e872ab___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/imageCarousel.vue":
/*!***************************************************!*\
  !*** ./resources/js/components/imageCarousel.vue ***!
  \***************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _imageCarousel_vue_vue_type_template_id_c5e34bc0___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./imageCarousel.vue?vue&type=template&id=c5e34bc0& */ "./resources/js/components/imageCarousel.vue?vue&type=template&id=c5e34bc0&");
/* harmony import */ var _imageCarousel_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./imageCarousel.vue?vue&type=script&lang=js& */ "./resources/js/components/imageCarousel.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _imageCarousel_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _imageCarousel_vue_vue_type_template_id_c5e34bc0___WEBPACK_IMPORTED_MODULE_0__["render"],
  _imageCarousel_vue_vue_type_template_id_c5e34bc0___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/imageCarousel.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/imageCarousel.vue?vue&type=script&lang=js&":
/*!****************************************************************************!*\
  !*** ./resources/js/components/imageCarousel.vue?vue&type=script&lang=js& ***!
  \****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_imageCarousel_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./imageCarousel.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/imageCarousel.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_imageCarousel_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/imageCarousel.vue?vue&type=template&id=c5e34bc0&":
/*!**********************************************************************************!*\
  !*** ./resources/js/components/imageCarousel.vue?vue&type=template&id=c5e34bc0& ***!
  \**********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_imageCarousel_vue_vue_type_template_id_c5e34bc0___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./imageCarousel.vue?vue&type=template&id=c5e34bc0& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/imageCarousel.vue?vue&type=template&id=c5e34bc0&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_imageCarousel_vue_vue_type_template_id_c5e34bc0___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_imageCarousel_vue_vue_type_template_id_c5e34bc0___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/productViewer360.vue":
/*!******************************************************!*\
  !*** ./resources/js/components/productViewer360.vue ***!
  \******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _productViewer360_vue_vue_type_template_id_4df11af7___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./productViewer360.vue?vue&type=template&id=4df11af7& */ "./resources/js/components/productViewer360.vue?vue&type=template&id=4df11af7&");
/* harmony import */ var _productViewer360_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./productViewer360.vue?vue&type=script&lang=js& */ "./resources/js/components/productViewer360.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _productViewer360_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _productViewer360_vue_vue_type_template_id_4df11af7___WEBPACK_IMPORTED_MODULE_0__["render"],
  _productViewer360_vue_vue_type_template_id_4df11af7___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/productViewer360.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/productViewer360.vue?vue&type=script&lang=js&":
/*!*******************************************************************************!*\
  !*** ./resources/js/components/productViewer360.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_productViewer360_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./productViewer360.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/productViewer360.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_productViewer360_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/productViewer360.vue?vue&type=template&id=4df11af7&":
/*!*************************************************************************************!*\
  !*** ./resources/js/components/productViewer360.vue?vue&type=template&id=4df11af7& ***!
  \*************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_productViewer360_vue_vue_type_template_id_4df11af7___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./productViewer360.vue?vue&type=template&id=4df11af7& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/productViewer360.vue?vue&type=template&id=4df11af7&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_productViewer360_vue_vue_type_template_id_4df11af7___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_productViewer360_vue_vue_type_template_id_4df11af7___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/shoppingCart/cart.vue":
/*!*******************************************************!*\
  !*** ./resources/js/components/shoppingCart/cart.vue ***!
  \*******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _cart_vue_vue_type_template_id_402299ec___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./cart.vue?vue&type=template&id=402299ec& */ "./resources/js/components/shoppingCart/cart.vue?vue&type=template&id=402299ec&");
/* harmony import */ var _cart_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./cart.vue?vue&type=script&lang=js& */ "./resources/js/components/shoppingCart/cart.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _cart_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _cart_vue_vue_type_template_id_402299ec___WEBPACK_IMPORTED_MODULE_0__["render"],
  _cart_vue_vue_type_template_id_402299ec___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/shoppingCart/cart.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/shoppingCart/cart.vue?vue&type=script&lang=js&":
/*!********************************************************************************!*\
  !*** ./resources/js/components/shoppingCart/cart.vue?vue&type=script&lang=js& ***!
  \********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_cart_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./cart.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/shoppingCart/cart.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_cart_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/shoppingCart/cart.vue?vue&type=template&id=402299ec&":
/*!**************************************************************************************!*\
  !*** ./resources/js/components/shoppingCart/cart.vue?vue&type=template&id=402299ec& ***!
  \**************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_cart_vue_vue_type_template_id_402299ec___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./cart.vue?vue&type=template&id=402299ec& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/shoppingCart/cart.vue?vue&type=template&id=402299ec&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_cart_vue_vue_type_template_id_402299ec___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_cart_vue_vue_type_template_id_402299ec___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/shoppingCart/item.vue":
/*!*******************************************************!*\
  !*** ./resources/js/components/shoppingCart/item.vue ***!
  \*******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _item_vue_vue_type_template_id_f4232f42___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./item.vue?vue&type=template&id=f4232f42& */ "./resources/js/components/shoppingCart/item.vue?vue&type=template&id=f4232f42&");
/* harmony import */ var _item_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./item.vue?vue&type=script&lang=js& */ "./resources/js/components/shoppingCart/item.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _item_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _item_vue_vue_type_template_id_f4232f42___WEBPACK_IMPORTED_MODULE_0__["render"],
  _item_vue_vue_type_template_id_f4232f42___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/shoppingCart/item.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/shoppingCart/item.vue?vue&type=script&lang=js&":
/*!********************************************************************************!*\
  !*** ./resources/js/components/shoppingCart/item.vue?vue&type=script&lang=js& ***!
  \********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_item_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./item.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/shoppingCart/item.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_item_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/shoppingCart/item.vue?vue&type=template&id=f4232f42&":
/*!**************************************************************************************!*\
  !*** ./resources/js/components/shoppingCart/item.vue?vue&type=template&id=f4232f42& ***!
  \**************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_item_vue_vue_type_template_id_f4232f42___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./item.vue?vue&type=template&id=f4232f42& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/shoppingCart/item.vue?vue&type=template&id=f4232f42&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_item_vue_vue_type_template_id_f4232f42___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_item_vue_vue_type_template_id_f4232f42___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/shoppingCart/stripeCheckoutForm.vue":
/*!*********************************************************************!*\
  !*** ./resources/js/components/shoppingCart/stripeCheckoutForm.vue ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _stripeCheckoutForm_vue_vue_type_template_id_3c63c463___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./stripeCheckoutForm.vue?vue&type=template&id=3c63c463& */ "./resources/js/components/shoppingCart/stripeCheckoutForm.vue?vue&type=template&id=3c63c463&");
/* harmony import */ var _stripeCheckoutForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./stripeCheckoutForm.vue?vue&type=script&lang=js& */ "./resources/js/components/shoppingCart/stripeCheckoutForm.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _stripeCheckoutForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _stripeCheckoutForm_vue_vue_type_template_id_3c63c463___WEBPACK_IMPORTED_MODULE_0__["render"],
  _stripeCheckoutForm_vue_vue_type_template_id_3c63c463___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/shoppingCart/stripeCheckoutForm.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/shoppingCart/stripeCheckoutForm.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************!*\
  !*** ./resources/js/components/shoppingCart/stripeCheckoutForm.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_stripeCheckoutForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./stripeCheckoutForm.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/shoppingCart/stripeCheckoutForm.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_stripeCheckoutForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/shoppingCart/stripeCheckoutForm.vue?vue&type=template&id=3c63c463&":
/*!****************************************************************************************************!*\
  !*** ./resources/js/components/shoppingCart/stripeCheckoutForm.vue?vue&type=template&id=3c63c463& ***!
  \****************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_stripeCheckoutForm_vue_vue_type_template_id_3c63c463___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./stripeCheckoutForm.vue?vue&type=template&id=3c63c463& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/shoppingCart/stripeCheckoutForm.vue?vue&type=template&id=3c63c463&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_stripeCheckoutForm_vue_vue_type_template_id_3c63c463___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_stripeCheckoutForm_vue_vue_type_template_id_3c63c463___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/sliderBar.vue":
/*!***********************************************!*\
  !*** ./resources/js/components/sliderBar.vue ***!
  \***********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _sliderBar_vue_vue_type_template_id_1e077692___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./sliderBar.vue?vue&type=template&id=1e077692& */ "./resources/js/components/sliderBar.vue?vue&type=template&id=1e077692&");
/* harmony import */ var _sliderBar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./sliderBar.vue?vue&type=script&lang=js& */ "./resources/js/components/sliderBar.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _sliderBar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _sliderBar_vue_vue_type_template_id_1e077692___WEBPACK_IMPORTED_MODULE_0__["render"],
  _sliderBar_vue_vue_type_template_id_1e077692___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/sliderBar.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/sliderBar.vue?vue&type=script&lang=js&":
/*!************************************************************************!*\
  !*** ./resources/js/components/sliderBar.vue?vue&type=script&lang=js& ***!
  \************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_sliderBar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./sliderBar.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/sliderBar.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_sliderBar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/sliderBar.vue?vue&type=template&id=1e077692&":
/*!******************************************************************************!*\
  !*** ./resources/js/components/sliderBar.vue?vue&type=template&id=1e077692& ***!
  \******************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_sliderBar_vue_vue_type_template_id_1e077692___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./sliderBar.vue?vue&type=template&id=1e077692& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/sliderBar.vue?vue&type=template&id=1e077692&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_sliderBar_vue_vue_type_template_id_1e077692___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_sliderBar_vue_vue_type_template_id_1e077692___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/components/xiaohungshu.vue":
/*!*************************************************!*\
  !*** ./resources/js/components/xiaohungshu.vue ***!
  \*************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _xiaohungshu_vue_vue_type_template_id_85054580___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./xiaohungshu.vue?vue&type=template&id=85054580& */ "./resources/js/components/xiaohungshu.vue?vue&type=template&id=85054580&");
/* harmony import */ var _xiaohungshu_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./xiaohungshu.vue?vue&type=script&lang=js& */ "./resources/js/components/xiaohungshu.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _xiaohungshu_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _xiaohungshu_vue_vue_type_template_id_85054580___WEBPACK_IMPORTED_MODULE_0__["render"],
  _xiaohungshu_vue_vue_type_template_id_85054580___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/xiaohungshu.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/xiaohungshu.vue?vue&type=script&lang=js&":
/*!**************************************************************************!*\
  !*** ./resources/js/components/xiaohungshu.vue?vue&type=script&lang=js& ***!
  \**************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_xiaohungshu_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./xiaohungshu.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/xiaohungshu.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_xiaohungshu_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/xiaohungshu.vue?vue&type=template&id=85054580&":
/*!********************************************************************************!*\
  !*** ./resources/js/components/xiaohungshu.vue?vue&type=template&id=85054580& ***!
  \********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_xiaohungshu_vue_vue_type_template_id_85054580___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./xiaohungshu.vue?vue&type=template&id=85054580& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/xiaohungshu.vue?vue&type=template&id=85054580&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_xiaohungshu_vue_vue_type_template_id_85054580___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_xiaohungshu_vue_vue_type_template_id_85054580___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/frontend.js":
/*!**********************************!*\
  !*** ./resources/js/frontend.js ***!
  \**********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _views_frontEnd_diamondViewer_index__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./views/frontEnd/diamondViewer/index */ "./resources/js/views/frontEnd/diamondViewer/index.js");
/* harmony import */ var _views_frontEnd_diamondViewer_show__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./views/frontEnd/diamondViewer/show */ "./resources/js/views/frontEnd/diamondViewer/show.js");
/* harmony import */ var _views_frontEnd_engagementRing_index__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./views/frontEnd/engagementRing/index */ "./resources/js/views/frontEnd/engagementRing/index.js");
/* harmony import */ var _views_frontEnd_engagementRing_show__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./views/frontEnd/engagementRing/show */ "./resources/js/views/frontEnd/engagementRing/show.js");
/* harmony import */ var _views_frontEnd_weddingRing_index__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./views/frontEnd/weddingRing/index */ "./resources/js/views/frontEnd/weddingRing/index.js");
/* harmony import */ var _views_frontEnd_weddingRing_show__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./views/frontEnd/weddingRing/show */ "./resources/js/views/frontEnd/weddingRing/show.js");
/* harmony import */ var _views_frontEnd_jewellery_index__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./views/frontEnd/jewellery/index */ "./resources/js/views/frontEnd/jewellery/index.js");
/* harmony import */ var _views_frontEnd_jewellery_show__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./views/frontEnd/jewellery/show */ "./resources/js/views/frontEnd/jewellery/show.js");
/* harmony import */ var _views_frontEnd_customerJewellery_index__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./views/frontEnd/customerJewellery/index */ "./resources/js/views/frontEnd/customerJewellery/index.js");
/* harmony import */ var _views_frontEnd_customerJewellery_show__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./views/frontEnd/customerJewellery/show */ "./resources/js/views/frontEnd/customerJewellery/show.js");
/* harmony import */ var _views_frontEnd_customerMoment_index__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./views/frontEnd/customerMoment/index */ "./resources/js/views/frontEnd/customerMoment/index.js");
/* harmony import */ var _views_frontEnd_education_index__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ./views/frontEnd/education/index */ "./resources/js/views/frontEnd/education/index.js");
/* harmony import */ var _views_frontEnd_shoppingCart_index_vue__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! ./views/frontEnd/shoppingCart/index.vue */ "./resources/js/views/frontEnd/shoppingCart/index.vue");
/* harmony import */ var _views_frontEnd_shoppingCart_diamondRingReview__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! ./views/frontEnd/shoppingCart/diamondRingReview */ "./resources/js/views/frontEnd/shoppingCart/diamondRingReview.js");
/* harmony import */ var _views_frontEnd_shoppingCart_shopBagBill__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! ./views/frontEnd/shoppingCart/shopBagBill */ "./resources/js/views/frontEnd/shoppingCart/shopBagBill.js");
/* harmony import */ var _views_frontEnd_aboutUs_index__WEBPACK_IMPORTED_MODULE_15__ = __webpack_require__(/*! ./views/frontEnd/aboutUs/index */ "./resources/js/views/frontEnd/aboutUs/index.js");
/* harmony import */ var _views_frontEnd_account_login__WEBPACK_IMPORTED_MODULE_16__ = __webpack_require__(/*! ./views/frontEnd/account/login */ "./resources/js/views/frontEnd/account/login.js");
//diamond

 //Engagement Ring


 //wedding Ring


 //jewellry Ring


 //wedding Ring


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

if (pUrl == '/gia-loose-diamonds' || pUrl == '/gia-loose-diamonds/' || pUrl.includes('/gia-loose-diamonds/round-cut') || pUrl.includes('/gia-loose-diamonds/fancy-cut-diamond') || pUrl.includes('/gia-loose-diamonds/fancy-color')) {
  var diamondViewerIndex = new Vue(_views_frontEnd_diamondViewer_index__WEBPACK_IMPORTED_MODULE_0__["default"]);
}

if (!pUrl.includes('/gia-loose-diamonds/round-cut') && !pUrl.includes('/gia-loose-diamonds/fancy-cut-diamond') && !pUrl.includes('/gia-loose-diamonds/fancy-color') && window.location.pathname.slice(4, 23) == 'gia-loose-diamonds/') {
  var diamondViewerShow = new Vue(_views_frontEnd_diamondViewer_show__WEBPACK_IMPORTED_MODULE_1__["default"]);
} //engagement rings


if (pUrl == '/engagement-rings' || pUrl == '/engagement-rings/' || pUrl.includes('/engagement-rings/solitaire-ring-setting') || pUrl.includes('/engagement-rings/side-stones-setting') || pUrl.includes('/engagement-rings/halo-setting')) {
  var engagementRingIndex = new Vue(_views_frontEnd_engagementRing_index__WEBPACK_IMPORTED_MODULE_2__["default"]);
}

if (!pUrl.includes('/engagement-rings/solitaire-ring-setting') && !pUrl.includes('/engagement-rings/side-stones-setting') && !pUrl.includes('/engagement-rings/halo-setting') && window.location.pathname.slice(4, 21) == 'engagement-rings/') {
  var engagementRingShow = new Vue(_views_frontEnd_engagementRing_show__WEBPACK_IMPORTED_MODULE_3__["default"]);
} //wedding rings


if (pUrl == '/wedding-rings' || pUrl == '/wedding-rings/' || pUrl.includes('/wedding-rings/classic') || pUrl.includes('/wedding-rings/japanese') || pUrl.includes('/wedding-rings/vintage')) {
  var weddingRingIndex = new Vue(_views_frontEnd_weddingRing_index__WEBPACK_IMPORTED_MODULE_4__["default"]);
}

if (!pUrl.includes('/wedding-rings/classic') && !pUrl.includes('/wedding-rings/japanese') && !pUrl.includes('/wedding-rings/vintage') && window.location.pathname.slice(4, 18) == 'wedding-rings/') {
  var weddingRingShow = new Vue(_views_frontEnd_weddingRing_show__WEBPACK_IMPORTED_MODULE_5__["default"]);
} //jewellery


if (pUrl == '/jewellery' || pUrl == '/jewellery/' || pUrl.includes('/jewellery/necklaces') || pUrl.includes('/jewellery/earrings') || pUrl.includes('/jewellery/pendants') || pUrl.includes('/jewellery/rings') || pUrl.includes('/jewellery/diamond-rings') || pUrl.includes('/jewellery/fancy-diamond-rings') || pUrl.includes('/jewellery/bracelets')) {
  var jewelleryIndex = new Vue(_views_frontEnd_jewellery_index__WEBPACK_IMPORTED_MODULE_6__["default"]);
}

if (!pUrl.includes('/jewellery/necklaces') && !pUrl.includes('/jewellery/earrings') && !pUrl.includes('/jewellery/rings') && !pUrl.includes('/jewellery/diamond-rings') && !pUrl.includes('/jewellery/fancy-diamond-rings') && !pUrl.includes('/jewellery/bracelets') && !pUrl.includes('/jewellery/pendants') && window.location.pathname.slice(4, 14) == 'jewellery/') {
  var jewelleryShow = new Vue(_views_frontEnd_jewellery_show__WEBPACK_IMPORTED_MODULE_7__["default"]);
} //Customer share


if (pUrl == '/customer-jewellery' || pUrl.includes('/engagement-tips')) {
  var customerJewelleryIndex = new Vue(_views_frontEnd_customerJewellery_index__WEBPACK_IMPORTED_MODULE_8__["default"]);
}

if (window.location.pathname.slice(4, 23) == 'customer-jewellery/') {
  var customerJewelleryShow = new Vue(_views_frontEnd_customerJewellery_show__WEBPACK_IMPORTED_MODULE_9__["default"]);
}

if (pUrl.includes('/customer-moments')) {
  var customerMomentIndex = new Vue(_views_frontEnd_customerMoment_index__WEBPACK_IMPORTED_MODULE_10__["default"]);
} //Education


if (pUrl.includes('/education-diamond-grading')) {
  var educationIndex = new Vue(_views_frontEnd_education_index__WEBPACK_IMPORTED_MODULE_11__["default"]);
} //buying procedure


if (pUrl.includes('about-us') || pUrl.includes('buying-procedure')) {
  var aboutUs = new Vue(_views_frontEnd_aboutUs_index__WEBPACK_IMPORTED_MODULE_15__["default"]);
} //shopping cart


if (pUrl.includes('diamond-ring-review')) {
  var diamondRingReview = new Vue(_views_frontEnd_shoppingCart_diamondRingReview__WEBPACK_IMPORTED_MODULE_13__["default"]);
}

if (pUrl.includes('shopping-cart')) {
  var shoppingCartIndex = new Vue(_views_frontEnd_shoppingCart_index_vue__WEBPACK_IMPORTED_MODULE_12__["default"]);
}

if (pUrl.includes('shop-bag-bill')) {
  var shopBagBill = new Vue(_views_frontEnd_shoppingCart_shopBagBill__WEBPACK_IMPORTED_MODULE_14__["default"]);
}

if (pUrl.includes('login')) {
  var login = new Vue(_views_frontEnd_account_login__WEBPACK_IMPORTED_MODULE_16__["default"]);
} // const diamondViewer = new Vue({
//     el: '#diamondViewer'
// });

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


 // export function get(url){
// 	if (!url) {
// 		url = Locale.temp.lastUrl
// 	}
// 	Locale.setLastUrl(url)
// 	return axios({
// 		method: 'GET',
// 		url: url,
// 		headers: {
// 			'Authorization' : `Bearer ${Auth.state.api_token}`,
// 			'X-localization' : Locale.temp.currentLocale
// 		}
// 	})
// }

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

/***/ "./resources/js/helpers/getAuthUser.js":
/*!*********************************************!*\
  !*** ./resources/js/helpers/getAuthUser.js ***!
  \*********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ({
  api_token: document.head.querySelector('meta[name="api-token"]') ? document.head.querySelector('meta[name="api-token"]').content : null,
  user_id: document.head.querySelector('meta[name="user-id"]') ? document.head.querySelector('meta[name="user-id"]').content : null
});

/***/ }),

/***/ "./resources/js/helpers/helperFunctions.js":
/*!*************************************************!*\
  !*** ./resources/js/helpers/helperFunctions.js ***!
  \*************************************************/
/*! exports provided: extraWorkingDates */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "extraWorkingDates", function() { return extraWorkingDates; });
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
  namepath: Object(_locale__WEBPACK_IMPORTED_MODULE_0__["getCurrentURl"])(),
  viewer: {
    src: ''
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

/***/ "./resources/js/langs/customerJewellry.js":
/*!************************************************!*\
  !*** ./resources/js/langs/customerJewellry.js ***!
  \************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ([{
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
  '4-prong': ['4-prong', '四爪', '四爪']
}, {
  '6-claw prong': ['6-prong', '六爪', '六爪']
}, {
  '6-prong': ['6-prong', '六爪', '六爪']
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
  'Cash(-2%)': ['Cash(~1-2%)', '現金(~1-2%)', '现金(~1-2%)']
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
  'All amounts of the company are subject to Hong Kong dollar settlement': ['All amounts of the company are subject to Hong Kong dollar settlement', '本公司一切金額以港幣結算為準 (我們8萬塊以上已經是現金價, 如果需要付支付寶/微信, 或是刷卡, 需要付手續費的 )', '本公司一切金额以港币结算为准（我们8万块以上已经是现金价，如果需要付支付宝/微信，要么刷卡，需要付手续费的）']
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

/***/ "./resources/js/views/frontEnd/aboutUs/index.js":
/*!******************************************************!*\
  !*** ./resources/js/views/frontEnd/aboutUs/index.js ***!
  \******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../helpers/api */ "./resources/js/helpers/api.js");

/* harmony default export */ __webpack_exports__["default"] = ({
  el: '#aboutUs',
  data: function data() {
    return {
      activedSubTab: 'Appointment First'
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

      Object(_helpers_api__WEBPACK_IMPORTED_MODULE_0__["get"])("/api/buyingProcedure").then(function (res) {
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
  el: '#login',
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
  beforeMount: function beforeMount() {},
  created: function created() {
    if (this.couponCode != '' && this.referral == 1) {
      this.mutualVar.notification.state.success = Object(_helpers_transJs__WEBPACK_IMPORTED_MODULE_2__["transJs"])('Login to save coupon code', _langs_shoppingCart__WEBPACK_IMPORTED_MODULE_4__["default"], mutualVar.langs.localeCode);
    }
  },
  computed: {
    couponCode: function couponCode() {
      return Object(_helpers_cookie__WEBPACK_IMPORTED_MODULE_1__["getCookie"])('coupon_code');
    },
    referral: function referral() {
      return Object(_helpers_cookie__WEBPACK_IMPORTED_MODULE_1__["getCookie"])('referral');
    }
  },
  methods: {}
});

/***/ }),

/***/ "./resources/js/views/frontEnd/customerJewellery/index.js":
/*!****************************************************************!*\
  !*** ./resources/js/views/frontEnd/customerJewellery/index.js ***!
  \****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _langs_customerJewellry__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../langs/customerJewellry */ "./resources/js/langs/customerJewellry.js");


/* harmony default export */ __webpack_exports__["default"] = ({
  el: '#customerJewelleryIndex',
  data: function data() {
    return {
      query: {
        per_page: 10
      },
      langs: _langs_customerJewellry__WEBPACK_IMPORTED_MODULE_1__["default"],
      posts: [],
      chunkedItemsDesktop: {},
      chunkedItemsMobile: {},
      scrolled: false,
      originY: 900,
      mutualVar: mutualVar
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
    toHumanDate: function toHumanDate(time) {
      var t = Date.parse(time);
      var d = new Date();
      d.setTime(t);
      var n = d.toDateString();
      return n;
    }
  },
  methods: {
    loopDesktopImage: function loopDesktopImage(arr1, arr2) {
      for (var i = 0; i < this.chunkedItemsDesktop[arr1][arr2].images.length; i++) {
        this.loopAllImage(this.chunkedItemsDesktop[arr1][arr2].images, i);
      }
    },
    loopMobileImage: function loopMobileImage(arr1, arr2) {
      for (var i = 0; i < this.chunkedItemsMobile[arr1][arr2].images.length; i++) {
        this.loopAllImage(this.chunkedItemsMobile[arr1][arr2].images, i);
      }
    },
    loopImages: function loopImages(arr1) {
      var j = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 1;

      for (var i = 0; i < this.model.data[arr1].images.length; i++) {
        this.loopAllImage(this.model.data[arr1].images, i, j);
      }
    },
    loopAllImage: function loopAllImage(images, i) {
      setTimeout(function () {
        images.push(images[0]);
        images.shift();
      }, i * 1000);
    },
    handleScroll: function handleScroll() {
      if (window.pageYOffset > this.originY) {
        this.originY += 900;
        this.more();
      }
    },
    MetToHumanDate: function MetToHumanDate(time) {
      var t = Date.parse(time);
      var d = new Date();
      d.setTime(t);
      var n = d.toDateString();
      return n;
    },
    more: function more() {
      this.query.per_page += 10;
      this.fetchData();
    },
    chunkItems: function chunkItems() {
      var chunk1 = [];
      var chunk2 = [];

      for (var i = 0; this.posts.data.length - 1 >= i;) {
        chunk1.push(this.posts.data.slice(i, i + 3));
        i += 3;
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
      window.open('customer-jewellery/' + row.id);
    },
    fetchData: function fetchData() {
      var _this = this;

      Object(_helpers_api__WEBPACK_IMPORTED_MODULE_0__["get"])("/api/invPosts?per_page=".concat(this.query.per_page)).then(function (res) {
        _this.posts = res.data.model;

        _this.chunkItems();
      });
    }
  }
});

/***/ }),

/***/ "./resources/js/views/frontEnd/customerJewellery/show.js":
/*!***************************************************************!*\
  !*** ./resources/js/views/frontEnd/customerJewellery/show.js ***!
  \***************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../helpers/transJs */ "./resources/js/helpers/transJs.js");
/* harmony import */ var _langs_diamondViewer__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../langs/diamondViewer */ "./resources/js/langs/diamondViewer.js");
/* harmony import */ var _langs_engagementRings__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../langs/engagementRings */ "./resources/js/langs/engagementRings.js");
/* harmony import */ var _langs_weddingRings__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../../../langs/weddingRings */ "./resources/js/langs/weddingRings.js");
/* harmony import */ var _helpers_mutualVar__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../../../helpers/mutualVar */ "./resources/js/helpers/mutualVar.js");
/* harmony import */ var _node_modules_vue_video_player_dist_vue_video_player__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../../../../../node_modules/vue-video-player/dist/vue-video-player */ "./node_modules/vue-video-player/dist/vue-video-player.js");
/* harmony import */ var _node_modules_vue_video_player_dist_vue_video_player__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_node_modules_vue_video_player_dist_vue_video_player__WEBPACK_IMPORTED_MODULE_6__);
// import Auth from '../../store/auth'
 // import Flash from '../../helpers/flash'





 // import langs from '../../../langs/customerJewellry'


/* harmony default export */ __webpack_exports__["default"] = ({
  el: '#customerJewelleryShow',
  components: {
    videoPlayer: _node_modules_vue_video_player_dist_vue_video_player__WEBPACK_IMPORTED_MODULE_6__["videoPlayer"]
  },
  data: function data() {
    return {
      // auth: Auth.state,
      mutualVar: _helpers_mutualVar__WEBPACK_IMPORTED_MODULE_5__["default"],
      isRemoving: false,
      post: {
        invoice: {},
        content: []
      },
      opt: {
        muted: true,
        language: 'en',
        playbackRates: [0.7, 1.0, 1.5, 2.0],
        sources: [{
          type: "video/mp4",
          src: "/videos/"
        }],
        poster: "/images/",
        fluid: true
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
      youtube: 'https://www.youtube.com/embed/',
      videoPath: _helpers_mutualVar__WEBPACK_IMPORTED_MODULE_5__["default"].storage[_helpers_mutualVar__WEBPACK_IMPORTED_MODULE_5__["default"].storage.live] + 'public/videos/',
      imagePath: _helpers_mutualVar__WEBPACK_IMPORTED_MODULE_5__["default"].storage[_helpers_mutualVar__WEBPACK_IMPORTED_MODULE_5__["default"].storage.live] + 'public/images/',
      langs: _langs_diamondViewer__WEBPACK_IMPORTED_MODULE_2__["default"].concat(_langs_engagementRings__WEBPACK_IMPORTED_MODULE_3__["default"], _langs_weddingRings__WEBPACK_IMPORTED_MODULE_4__["default"]),
      invoice: '',
      published: {
        engagementRings: 0,
        weddingRings: 0,
        jewelleries: 0
      },
      langHref: '/' + window.location.pathname.slice(1, 3)
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
    transJs: _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__["transJs"]
  },
  methods: {
    transJsMet: function transJsMet(data, ori, langs) {
      return Object(_helpers_transJs__WEBPACK_IMPORTED_MODULE_1__["transJs"])(data, ori, langs);
    },
    fetchData: function fetchData() {
      var _this = this;

      Object(_helpers_api__WEBPACK_IMPORTED_MODULE_0__["get"])("/api/invPosts/".concat(window.location.pathname.slice(23)), window.location.pathname.slice(1, 3)).then(function (res) {
        _this.post = res.data.model;
        _this.invoice = res.data.invoice;

        _this.ProceedVideoEng();

        _this.ProceedVideoWed();

        _this.ProceedVideoJew();

        _this.ProceedVideoPost();

        _this.setPublished();
      });
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
    remove: function remove() {
      var _this2 = this;

      this.isRemoving = false;
      Object(_helpers_api__WEBPACK_IMPORTED_MODULE_0__["del"])("/api/invPosts/".concat(window.location.pathname.slice(24))).then(function (res) {
        if (res.data.deleted) {
          Flash.setSuccess('You have successfully deleted recipe!');

          _this2.$router.push('/');
        }
      });
    },
    ProceedVideoEng: function ProceedVideoEng() {
      var opt = {
        muted: true,
        language: 'en',
        playbackRates: [0.7, 1.0, 1.5, 2.0],
        sources: [{
          type: "video/mp4",
          src: "/videos/"
        }],
        poster: "/images/",
        fluid: true
      };

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
      var opt = {
        muted: true,
        language: 'en',
        playbackRates: [0.7, 1.0, 1.5, 2.0],
        sources: [{
          type: "video/mp4",
          src: "/videos/"
        }],
        poster: "/images/",
        fluid: true
      };

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
      var opt = {
        muted: true,
        language: 'en',
        playbackRates: [0.7, 1.0, 1.5, 2.0],
        sources: [{
          type: "video/mp4",
          src: "/videos/"
        }],
        poster: "/images/",
        fluid: true
      };

      if (this.post.video) {
        this.videoOpts[3].videoPost = opt;
        this.videoOpts[3].videoPost.sources[0].src = this.videoPath + this.post.video;
        this.videoOpts[3].videoPost.poster = this.imagePath + this.post.images.filter(function (img) {
          return img.type == 'cover';
        })[0].image;
      }
    },
    ProceedVideoJew: function ProceedVideoJew() {
      var opt = {
        muted: true,
        language: 'en',
        playbackRates: [0.7, 1.0, 1.5, 2.0],
        sources: [{
          type: "video/mp4",
          src: "/videos/"
        }],
        poster: "/images/",
        fluid: true
      };

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
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../helpers/transJs */ "./resources/js/helpers/transJs.js");
/* harmony import */ var _langs_customerJewellry__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../langs/customerJewellry */ "./resources/js/langs/customerJewellry.js");
/* harmony import */ var _components_imageCarousel_vue__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../components/imageCarousel.vue */ "./resources/js/components/imageCarousel.vue");
/* harmony import */ var _helpers_mutualVar__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../../../helpers/mutualVar */ "./resources/js/helpers/mutualVar.js");





/* harmony default export */ __webpack_exports__["default"] = ({
  el: '#customerJewellryIndex',
  components: {
    ImageCarousel: _components_imageCarousel_vue__WEBPACK_IMPORTED_MODULE_3__["default"]
  },
  data: function data() {
    return {
      mutualVar: _helpers_mutualVar__WEBPACK_IMPORTED_MODULE_4__["default"],
      query: {
        per_page: 10
      },
      langs: _langs_customerJewellry__WEBPACK_IMPORTED_MODULE_2__["default"],
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
    transJs: _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__["transJs"]
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

      Object(_helpers_api__WEBPACK_IMPORTED_MODULE_0__["get"])("/api/customerMoments?per_page=".concat(this.query.per_page), window.location.pathname.slice(1, 3)).then(function (res) {
        _this.customers = res.data.customers;

        _this.chunkItems();
      });
    }
  }
});

/***/ }),

/***/ "./resources/js/views/frontEnd/diamondViewer/index.js":
/*!************************************************************!*\
  !*** ./resources/js/views/frontEnd/diamondViewer/index.js ***!
  \************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _components_sliderBar__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../components/sliderBar */ "./resources/js/components/sliderBar.vue");
/* harmony import */ var _helpers_cookie__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../helpers/cookie */ "./resources/js/helpers/cookie.js");
/* harmony import */ var _helpers_locale__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../helpers/locale */ "./resources/js/helpers/locale.js");
/* harmony import */ var _helpers_transJs__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../../../helpers/transJs */ "./resources/js/helpers/transJs.js");
/* harmony import */ var _langs_diamondViewer__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../../../langs/diamondViewer */ "./resources/js/langs/diamondViewer.js");






/* harmony default export */ __webpack_exports__["default"] = ({
  el: '#diamondViewerIndex',
  components: {
    sliderBar: _components_sliderBar__WEBPACK_IMPORTED_MODULE_1__["default"]
  },
  props: ['title'],
  data: function data() {
    return {
      source: '/api/diamonds',
      fetchData: {
        shape: '',
        color: '',
        clarity: '',
        cut: '',
        polish: '',
        symmetry: '',
        fluorescence: '',
        priceRange: [1000, 50000000],
        weight: [0.30, 20],
        location: ''
      },
      preset: {
        shape: [],
        color: [],
        clarity: [],
        cut: [],
        polish: [],
        symmetry: [],
        fluorescence: [],
        priceRange: [1000, 50000000],
        weight: [0.30, 20],
        location: []
      },
      mutualVar: mutualVar,
      loggedValues: {},
      scrolled: false,
      originY: 600,
      showModal: false,
      showAdvance: false,
      showInGrid: true,
      opened: [],
      model: {},
      storageURL: mutualVar.storage[mutualVar.storage.live] + 'public/diamond/',
      displayColumn: '',
      columnsOrder: ['color', 'clarity', 'cut', 'polish', 'symmetry', 'fluorescence'],
      langs: _langs_diamondViewer__WEBPACK_IMPORTED_MODULE_5__["default"],
      clickedRows: [],
      columnsToggle: [{
        display: 'imageLink',
        value: 'has_image'
      }, {
        display: 'shape',
        value: 'shape'
      }, {
        display: 'price',
        value: 'price'
      }, {
        display: 'weight',
        value: 'weight'
      }, {
        display: 'color',
        value: 'color'
      }, {
        display: 'clarity',
        value: 'clarity'
      }, {
        display: 'cut',
        value: 'cut'
      }, {
        display: 'polish',
        value: 'polish'
      }, {
        display: 'symmetry',
        value: 'symmetry'
      }, {
        display: 'fluorescence',
        value: 'fluorescence'
      }, {
        display: 'location',
        value: 'location'
      }, {
        display: 'certificate',
        value: 'certificate'
      }, {
        display: 'lab',
        value: 'lab'
      }],
      columns: ['has_image', 'shape', 'price', 'weight', 'color', 'clarity', 'cut', 'polish', 'symmetry', 'fluorescence', 'location', 'certificate', 'lab'],
      query: {
        page: 1,
        column: 'price',
        direction: 'asc',
        per_page: 10,
        search_column: 'id',
        search_operator: 'like',
        search_input: '',
        search_conditions: {
          shape: [{
            description: 'Round',
            clicked: false,
            value: 'Round'
          }, {
            description: 'Pear',
            clicked: false,
            value: 'Pear'
          }, {
            description: 'Emerald',
            clicked: false,
            value: 'Emerald'
          }, {
            description: 'Princess',
            clicked: false,
            value: 'Princess'
          }, {
            description: 'Marquise',
            clicked: false,
            value: 'Marquise'
          }, {
            description: 'Cushion',
            clicked: false,
            value: 'Cushion'
          }, {
            description: 'Asscher',
            clicked: false,
            value: 'Asscher'
          }, {
            description: 'Oval',
            clicked: false,
            value: 'Oval'
          }, {
            description: 'Heart',
            clicked: false,
            value: 'Heart'
          }, {
            description: 'Radiant',
            clicked: false,
            value: 'Radiant'
          }],
          color: [{
            description: 'D',
            clicked: false,
            value: 'D'
          }, {
            description: 'E',
            clicked: false,
            value: 'E'
          }, {
            description: 'F',
            clicked: false,
            value: 'F'
          }, {
            description: 'G',
            clicked: false,
            value: 'G'
          }, {
            description: 'H',
            clicked: false,
            value: 'H'
          }, {
            description: 'I',
            clicked: false,
            value: 'I'
          }, {
            description: 'J',
            clicked: false,
            value: 'J'
          }, {
            description: 'K',
            clicked: false,
            value: 'K'
          }, {
            description: 'L',
            clicked: false,
            value: 'L'
          }, {
            description: 'M',
            clicked: false,
            value: 'M'
          }],
          cut: [{
            description: 'Excellent',
            clicked: false,
            value: 'Excellent,EX'
          }, {
            description: 'Very Good',
            clicked: false,
            value: 'Very Good,VG'
          }, {
            description: 'Good',
            clicked: false,
            value: 'Good,GD'
          }],
          polish: [{
            description: 'Excellent',
            clicked: false,
            value: 'Excellent,EX'
          }, {
            description: 'Very Good',
            clicked: false,
            value: 'Very Good,VG'
          }, {
            description: 'Good',
            clicked: false,
            value: 'Good,GD'
          }],
          symmetry: [{
            description: 'Excellent',
            clicked: false,
            value: 'Excellent,EX'
          }, {
            description: 'Very Good',
            clicked: false,
            value: 'Very Good,VG'
          }, {
            description: 'Good',
            clicked: false,
            value: 'Good,GD'
          }],
          fluorescence: [{
            description: 'None',
            clicked: false,
            value: 'None,NON'
          }, {
            description: 'Faint',
            clicked: false,
            value: 'Faint,FNT'
          }, {
            description: 'Medium',
            clicked: false,
            value: 'Medium,MED'
          }, {
            description: 'Strong',
            clicked: false,
            value: 'Strong,STG'
          }, {
            description: 'Very Strong',
            clicked: false,
            value: 'Very Strong,VST'
          }],
          clarity: [{
            description: 'FL',
            clicked: false,
            value: 'FL'
          }, {
            description: 'IF',
            clicked: false,
            value: 'IF'
          }, {
            description: 'VVS1',
            clicked: false,
            value: 'VVS1'
          }, {
            description: 'VVS2',
            clicked: false,
            value: 'VVS2'
          }, {
            description: 'VS1',
            clicked: false,
            value: 'VS1'
          }, {
            description: 'VS2',
            clicked: false,
            value: 'VS2'
          }, {
            description: 'SI1',
            clicked: false,
            value: 'SI1'
          }, {
            description: 'SI2',
            clicked: false,
            value: 'SI2'
          }, {
            description: 'I1',
            clicked: false,
            value: 'I1'
          }],
          location: [{
            description: 'Only On Stock',
            clicked: false,
            value: '1Hong Kong'
          }],
          priceRange: [{
            description: 'Price'
          }, {
            description: 'minPrice'
          }]
        }
      },
      operators: {
        equal: '=',
        not_equal: '<>',
        less_than: '<',
        greater_than: '>',
        less_than_or_equal_to: '<=',
        greater_than_or_equal_to: '>=',
        "in": 'IN',
        like: 'LIKE'
      }
    };
  },
  created: function created() {
    this.fetchCookies();
    this.setUrlData();
    this.fetchIndexData();
    this.logValues();
    this.setQuerySearchConditions();
    window.addEventListener('scroll', this.handleScroll);
  },
  destroyed: function destroyed() {
    window.removeEventListener('scroll', this.handleScroll);
  },
  computed: {
    colorClicked: function colorClicked() {
      return this.query.search_conditions.color.filter(function (color) {
        return color.clicked;
      });
    },
    locale: function locale() {
      return Object(_helpers_locale__WEBPACK_IMPORTED_MODULE_3__["getLocaleCode"])();
    }
  },
  watch: {
    'query.column': function queryColumn() {
      this.fetchIndexData();
    },
    'query.direction': function queryDirection() {
      this.fetchIndexData();
    }
  },
  filters: {
    transJs: _helpers_transJs__WEBPACK_IMPORTED_MODULE_4__["transJs"],
    diamondSampleShapeUrl: function diamondSampleShapeUrl(shape) {
      return '/images/front-end/diamond_show/sample' + mutualVar.langs.locale + '/' + Object(_helpers_transJs__WEBPACK_IMPORTED_MODULE_4__["transJs"])(shape, _langs_diamondViewer__WEBPACK_IMPORTED_MODULE_5__["default"], mutualVar.langs.localeCode) + '.png';
    },
    diamondShapeUrl: function diamondShapeUrl(shape) {
      return '/images/front-end/diamond_shapes/' + Object(_helpers_transJs__WEBPACK_IMPORTED_MODULE_4__["transJs"])(shape, _langs_diamondViewer__WEBPACK_IMPORTED_MODULE_5__["default"], mutualVar.langs.localeCode) + '.png';
    }
  },
  methods: {
    fetchCookies: function fetchCookies() {
      var cookies = '';

      if (Object(_helpers_cookie__WEBPACK_IMPORTED_MODULE_2__["getCookie"])('diamondSearch')) {
        cookies = JSON.parse(Object(_helpers_cookie__WEBPACK_IMPORTED_MODULE_2__["getCookie"])('diamondSearch'));
        mutualVar.cookiesInfo.diamondSearch = cookies;
        this.fetchData = cookies.fetchData;
        this.clickedRows = cookies.clickedRows;
        this.query.per_page = 10;
      }
    },
    resetCookies: function resetCookies() {
      this.fetchData = {
        shape: '',
        color: '',
        clarity: '',
        cut: '',
        polish: '',
        symmetry: '',
        fluorescence: '',
        priceRange: [1000, 50000000],
        weight: [0.30, 20],
        location: ''
      };
      this.sendCookies();
      window.open(Object(_helpers_locale__WEBPACK_IMPORTED_MODULE_3__["getLocale"])() + '/gia-loose-diamonds', '_self');
    },
    sendCookies: function sendCookies() {
      var diamondSearch = {
        fetchData: this.fetchData,
        clickedRows: this.clickedRows
      };
      Object(_helpers_cookie__WEBPACK_IMPORTED_MODULE_2__["setCookie"])('diamondSearch', JSON.stringify(diamondSearch), mutualVar.cookiesInfo.cookieLast);
    },
    setQuerySearchConditions: function setQuerySearchConditions() {
      var item = ['shape', 'color', 'clarity', 'cut', 'polish', 'symmetry', 'fluorescence', 'location'];

      for (var i = 0; item.length > i; i++) {
        for (var j = 0; this.query.search_conditions[item[i]].length > j; j++) {
          if (this.fetchData[item[i]].includes(this.query.search_conditions[item[i]][j].value)) {
            this.query.search_conditions[item[i]][j].clicked = true;
          }
        }
      }
    },
    setUrlData: function setUrlData() {
      //round
      var fetchData = [{
        url: '/pear-shaped',
        data: ['Pear']
      }, {
        url: '/emerald-cut',
        data: ['Emerald']
      }, {
        url: '/princess-cut',
        data: ['Princess']
      }, {
        url: '/marquise-cut',
        data: ['Marquise']
      }, {
        url: '/cushion-cut',
        data: ['Cushion']
      }, {
        url: '/asscher-cut',
        data: ['Asscher']
      }, {
        url: '/oval-cut',
        data: ['Oval']
      }, {
        url: '/heart-shaped',
        data: ['Heart']
      }, {
        url: '/radiant-cut',
        data: ['Radiant']
      }, {
        url: '/0-30-0-49-carat-weight',
        data: ['0.30', '0.49']
      }, {
        url: '/0-50-0-79-carat-weight',
        data: ['0.50', '0.79']
      }, {
        url: '/0-80-0-99-carat-weight',
        data: ['0.80', '0.99']
      }, {
        url: '/1-00-1-19-carat-weight',
        data: ['1.00', '1.19']
      }, {
        url: '/1-20-1-49-carat-weight',
        data: ['1.20', '1.49']
      }, {
        url: '/1-50-1-99-carat-weight',
        data: ['1.50', '1.99']
      }, {
        url: '/2-00-2-99-carat-weight',
        data: ['2.00', '2.99']
      }, {
        url: '/3-00-up-carat-weight',
        data: ['3.00', '20']
      }, {
        url: '/3-00-up-carat-weight',
        data: ['3.00', '20']
      }, {
        url: '/3-00-up-carat-weight',
        data: ['3.00', '20']
      }, {
        url: '/3-00-up-carat-weight',
        data: ['3.00', '20']
      }, {
        url: '/3-00-up-carat-weight',
        data: ['3.00', '20']
      }];

      if (window.location.pathname.slice(3).includes('gia-loose-diamonds/round-cut') && !window.location.pathname.slice(3).includes('gia-loose-diamonds/round-cut/')) {
        for (var i = 0; this.query.search_conditions.shape.length > i; i++) {
          this.query.search_conditions.shape[i].clicked = false;
        }

        this.fetchData.shape = ['Round'];
        this.query.search_conditions.shape[0].clicked = true;
      } //fancy cut


      if (window.location.pathname.slice(3).includes('gia-loose-diamonds/fancy-cut-diamond')) {
        this.fetchData.shape = ['Round', 'Pear', 'Emerald', 'Princess', 'Marquise', 'Cushion', 'Asscher', 'Oval', 'Heart', 'Radiant'];

        for (var i = 0; this.query.search_conditions.shape.length > i; i++) {
          this.query.search_conditions.shape[i].clicked = true;
          this.query.search_conditions.shape[0].clicked = false;
        }
      }

      if (window.location.pathname.slice(3).includes('gia-loose-diamonds/fancy-cut-diamond/')) {
        for (var i = this.query.search_conditions.shape.length - 1; i >= 0; i--) {
          this.query.search_conditions.shape[i].clicked = false;
        }
      }

      for (var i = 0; fetchData.length > i; i++) {
        if (window.location.pathname.slice(3).includes(fetchData[i].url) && window.location.pathname.slice(3).includes('carat-weight')) {
          this.fetchData.weight = fetchData[i].data;
        }

        if (window.location.pathname.slice(3).includes(fetchData[i].url) && window.location.pathname.slice(3).includes('fancy-cut-diamond')) {
          this.fetchData.shape = fetchData[i].data;
          this.query.search_conditions.shape[i + 1].clicked = true;
        }
      }
    },
    handleScroll: function handleScroll() {
      if (window.pageYOffset > this.originY) {
        this.originY += 480;
        this.more();
      }
    },
    clickRow: function clickRow(row, index) {
      if (!this.clickedRows.filter(function (data) {
        return data == row.id;
      }).length > 0) {
        this.clickedRows.push(row.id);
      }

      this.sendCookies();
      window.open(window.location.pathname.slice(0, 3) + '/gia-loose-diamonds/' + row.id, '');
    },
    toggle: function toggle(id) {
      var index = this.model.data.indexOf(id);

      if (index > -1) {
        this.model.data.splice(index, 1);
      } else {
        this.model.data.push(id);
      }
    },
    moveTo: function moveTo(page) {
      if (this.query.page + page > 0) {
        this.query.page = this.query.page + page;
        this.fetchIndexData();
      }
    },
    selectDisplayColumn: function selectDisplayColumn(column) {
      if (this.displayColumn == column) {
        return this.displayColumn = '';
      }

      this.displayColumn = column;
    },
    filterFalse: function filterFalse(condition) {
      var checked = this.query.search_conditions[condition].filter(function (condition) {
        return condition.clicked;
      });
      this.filterDescriptions(checked);
      this.fetchData[condition] = checked;
      this.fetchIndexData();
    },
    filterDescriptions: function filterDescriptions(checked) {
      for (var i = checked.length - 1; i >= 0; i--) {
        checked[i] = checked[i].value;
      }
    },
    toggleValue: function toggleValue(query, condition, number) {
      var search_conditions = this.query.search_conditions[condition];

      if (query === false) {
        search_conditions[number].clicked = true;
      } else {
        search_conditions[number].clicked = false;
      }

      this.filterFalse(condition);
    },
    receiveSliderValue: function receiveSliderValue(value) {
      // alert(value)
      this.fetchData.priceRange[0] = Math.ceil(value[0] / 100) + '00';
      this.fetchData.priceRange[1] = Math.ceil(value[1] / 100) + '00';
      this.logValues();
      this.fetchIndexData();
    },
    logValues: function logValues() {
      this.loggedValues.priceMin = this.logValue(this.fetchData.priceRange[0]);
      this.loggedValues.priceMax = this.logValue(this.fetchData.priceRange[1]);
    },
    logValue: function logValue(value) {
      return Math.log(value);
    },
    // toggleValueToFalseOnce(condition){
    // 	var search_conditions = this.query.search_conditions[condition]
    // 	for (var i = search_conditions.length - 1; i >= 0; i--) {
    // 			search_conditions[i].clicked = false;
    // 		}
    // },
    more: function more() {
      if (this.model.next_page_url) {
        this.query.per_page += 10;
        this.fetchIndexData();
      }
    },
    next: function next() {
      if (this.model.next_page_url) {
        this.query.page++;
        this.fetchIndexData();
      }
    },
    prev: function prev() {
      if (this.model.prev_page_url) {
        this.query.page--;
        this.fetchIndexData();
      }
    },
    toggleOrder: function toggleOrder(column) {
      if (column === this.query.column) {
        if (this.query.direction === 'desc') {
          this.query.direction = 'asc';
        } else {
          this.query.direction = 'desc';
        }
      } else {
        this.query.column = column;
        this.direction = 'asc';
      }

      this.fetchIndexData();
    },
    fetchIndexData: function fetchIndexData() {
      var _this = this;

      this.logValues(); // console.log(this.query)

      Object(_helpers_api__WEBPACK_IMPORTED_MODULE_0__["get"])("".concat(this.source, "\n\t\t\t\t\t?column=").concat(this.query.column, "\n\t\t\t\t\t&direction=").concat(this.query.direction, "\n\t\t\t\t\t&page=").concat(this.query.page, "\n\t\t\t\t\t&per_page=").concat(this.query.per_page, "\n\t\t\t\t\t&search_column=").concat(this.query.search_column, "\n\t\t\t\t\t&search_operator=").concat(this.query.search_operator, "\n\t\t\t\t\t&search_input=").concat(this.query.search_input, "\n\t\t\t\t\t&color=").concat(this.fetchData.color.toString() ? this.fetchData.color.toString() : this.preset.color.toString(), "\n\t\t\t\t\t&clarity=").concat(this.fetchData.clarity.toString() ? this.fetchData.clarity.toString() : this.preset.clarity.toString(), "\n\t\t\t\t\t&cut=").concat(this.fetchData.cut.toString() ? this.fetchData.cut.toString() : this.preset.cut.toString(), "\n\t\t\t\t\t&polish=").concat(this.fetchData.polish.toString() ? this.fetchData.polish.toString() : this.preset.polish.toString(), "\n\t\t\t\t\t&symmetry=").concat(this.fetchData.symmetry.toString() ? this.fetchData.symmetry.toString() : this.preset.symmetry.toString(), "\n\t\t\t\t\t&fluorescence=").concat(this.fetchData.fluorescence.toString() ? this.fetchData.fluorescence.toString() : this.preset.fluorescence.toString(), "\n\t\t\t\t\t&shape=").concat(this.fetchData.shape.toString() ? this.fetchData.shape.toString() : this.preset.shape.toString(), "\n\t\t\t\t\t&location=").concat(this.fetchData.location.toString() ? this.fetchData.location.toString() : this.preset.location.toString(), "\n\t\t\t\t\t&price=").concat(this.fetchData.priceRange, "\n\t\t\t\t\t&weight=").concat(this.fetchData.weight)).then(function (response) {
        _this.model = response.data.model; // Vue.set(vm.$data, 'columns', response.data.columns)
      })["catch"](function () {
        console.log(response);
      });
      this.sendCookies();
    }
  }
});

/***/ }),

/***/ "./resources/js/views/frontEnd/diamondViewer/show.js":
/*!***********************************************************!*\
  !*** ./resources/js/views/frontEnd/diamondViewer/show.js ***!
  \***********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _components_xiaohungshu_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../components/xiaohungshu.vue */ "./resources/js/components/xiaohungshu.vue");
/* harmony import */ var _components_appointment_vue__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../components/appointment.vue */ "./resources/js/components/appointment.vue");
/* harmony import */ var _components_shoppingCart_cart_vue__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../components/shoppingCart/cart.vue */ "./resources/js/components/shoppingCart/cart.vue");
/* harmony import */ var _helpers_transJs__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../../../helpers/transJs */ "./resources/js/helpers/transJs.js");
/* harmony import */ var _langs_diamondViewer__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../../../langs/diamondViewer */ "./resources/js/langs/diamondViewer.js");
// import Auth from '../../store/auth'



 // import Carousel from '../../../components/carousel.vue'
// import Flash from '../../helpers/flash'



/* harmony default export */ __webpack_exports__["default"] = ({
  el: '#diamondViewerShow',
  components: {
    Appointment: _components_appointment_vue__WEBPACK_IMPORTED_MODULE_2__["default"],
    xiaohungshu: _components_xiaohungshu_vue__WEBPACK_IMPORTED_MODULE_1__["default"],
    ShoppingCart: _components_shoppingCart_cart_vue__WEBPACK_IMPORTED_MODULE_3__["default"]
  },
  data: function data() {
    return {
      // auth: Auth.state,
      isRemoving: false,
      appointmentState: false,
      title: '',
      langs: _langs_diamondViewer__WEBPACK_IMPORTED_MODULE_5__["default"],
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
    transJs: _helpers_transJs__WEBPACK_IMPORTED_MODULE_4__["transJs"]
  },
  computed: {
    appointmentTitle: function appointmentTitle() {
      return this.diamond.weight + Object(_helpers_transJs__WEBPACK_IMPORTED_MODULE_4__["transJs"])(this.text.carat, this.langs, this.locale) + ' ' + this.diamond.color + ' ' + Object(_helpers_transJs__WEBPACK_IMPORTED_MODULE_4__["transJs"])(this.columns[3], this.langs, this.locale) + ' ' + Object(_helpers_transJs__WEBPACK_IMPORTED_MODULE_4__["transJs"])(this.text.diamond, this.langs, this.locale) + ' GIA:' + this.diamond.certificate;
    },
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
    },
    localeHref: function localeHref() {
      return window.location.pathname.slice(0, 4);
    }
  },
  methods: {
    fetchData: function fetchData() {
      var _this = this;

      Object(_helpers_api__WEBPACK_IMPORTED_MODULE_0__["get"])("/api/diamonds/".concat(window.location.pathname.slice(23))).then(function (res) {
        _this.diamond = res.data.diamond;
      });
      Object(_helpers_api__WEBPACK_IMPORTED_MODULE_0__["get"])("/api/diamondsLoadingImage/".concat(window.location.pathname.slice(23))).then(function (res) {
        _this.isLoading = false;
        _this.diamond = res.data.diamond;
        _this.loadingStatus.image = res.data.loading.image;

        if (res.data.diamond.image_cache) {
          _this.selectingShowType = 'image';
        }

        mutualVar.viewer.src = _this.diamond.video_link.includes('http') ? _this.diamond.video_link.replace('http', 'https') : _this.diamond.video_link;
      });
      Object(_helpers_api__WEBPACK_IMPORTED_MODULE_0__["get"])("/api/diamondsLoadingCert/".concat(window.location.pathname.slice(23))).then(function (res) {
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
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../helpers/transJs */ "./resources/js/helpers/transJs.js");
/* harmony import */ var _langs_customerJewellry__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../langs/customerJewellry */ "./resources/js/langs/customerJewellry.js");



/* harmony default export */ __webpack_exports__["default"] = ({
  el: '#education',
  data: function data() {
    return {
      query: {
        per_page: 10
      },
      mutualVar: mutualVar,
      langs: _langs_customerJewellry__WEBPACK_IMPORTED_MODULE_2__["default"],
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
    transJs: _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__["transJs"]
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

      Object(_helpers_api__WEBPACK_IMPORTED_MODULE_0__["get"])("/api/invPosts?per_page=".concat(this.query.per_page), window.location.pathname.slice(1, 3)).then(function (res) {
        _this.posts = res.data.posts; // this.chunkItems()
      });
    }
  }
});

/***/ }),

/***/ "./resources/js/views/frontEnd/engagementRing/index.js":
/*!*************************************************************!*\
  !*** ./resources/js/views/frontEnd/engagementRing/index.js ***!
  \*************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _langs_engagementRings__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../langs/engagementRings */ "./resources/js/langs/engagementRings.js");
/* harmony import */ var _helpers_cookie__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../helpers/cookie */ "./resources/js/helpers/cookie.js");



/* harmony default export */ __webpack_exports__["default"] = ({
  el: '#engagementRings',
  props: ['title'],
  data: function data() {
    return {
      mutualVar: mutualVar,
      source: '/api/engagementRings',
      fetchData: {
        style: ['Solitaire', 'Side-stone', 'Halo'],
        prong: ['4-prong', '6-prong'],
        shoulder: ['Tapering', 'Parallel', 'Twisted'],
        customized: [1, 0]
      },
      preset: {
        style: ['Solitaire', 'Side-stone', 'Halo'],
        prong: ['4-prong', '6-prong'],
        shoulder: ['Tapering', 'Parallel', 'Twisted'],
        customized: [1, 0]
      },
      scrolled: false,
      originY: 500,
      langs: _langs_engagementRings__WEBPACK_IMPORTED_MODULE_1__["default"],
      showModal: false,
      showAdvance: false,
      opened: [],
      model: {},
      displayColumn: '',
      chunkedItemsDesktop: [],
      chunkedItemsMobile: [],
      clickedRows: [],
      columns: ['style', 'shoulder', 'prong'],
      query: {
        page: 1,
        column: 'style',
        direction: 'asc',
        per_page: 10,
        search_column: 'id',
        search_operator: 'like',
        search_input: '',
        search_conditions: {
          style: [{
            description: 'Solitaire',
            clicked: false,
            display: 'Solitaire'
          }, {
            description: 'Side-stone',
            clicked: false,
            display: 'Side-stone'
          }, {
            description: 'Halo',
            clicked: false,
            display: 'Halo'
          }],
          prong: [{
            description: '4-prong',
            clicked: false,
            display: '4-claw prong'
          }, {
            description: '6-prong',
            clicked: false,
            display: '6-claw prong'
          }],
          shoulder: [{
            description: 'Tapering',
            clicked: false,
            display: 'Tapering'
          }, {
            description: 'Parallel',
            clicked: false,
            display: 'Parallel'
          }, {
            description: 'Twisted',
            clicked: false,
            display: 'Twisted'
          }],
          customized: [{
            description: 1,
            clicked: false,
            display: 'Yes'
          }, {
            description: 0,
            clicked: false,
            display: 'No'
          }]
        }
      },
      operators: {
        equal: '=',
        not_equal: '<>',
        less_than: '<',
        greater_than: '>',
        less_than_or_equal_to: '<=',
        greater_than_or_equal_to: '>=',
        "in": 'IN',
        like: 'LIKE'
      },
      onLoopingImage: 0
    };
  },
  created: function created() {
    this.fetchCookies();
    this.setQuerySearchConditions();
    this.setUrlData();
    this.fetchIndexData();
    window.addEventListener('scroll', this.handleScroll);
  },
  destroyed: function destroyed() {
    window.removeEventListener('scroll', this.handleScroll);
  },
  computed: {
    styleClicked: function styleClicked() {
      return this.query.search_conditions.style.filter(function (style) {
        return style.clicked;
      });
    }
  },
  methods: {
    fetchCookies: function fetchCookies() {
      var cookies = '';

      if (Object(_helpers_cookie__WEBPACK_IMPORTED_MODULE_2__["getCookie"])('engagementSearch')) {
        cookies = JSON.parse(Object(_helpers_cookie__WEBPACK_IMPORTED_MODULE_2__["getCookie"])('engagementSearch'));
        this.mutualVar.cookiesInfo.engagementSearch = cookies;
        this.fetchData = cookies.fetchData;
        this.query.per_page = 10;
      }
    },
    sendCookies: function sendCookies() {
      var engagementSearch = {
        fetchData: this.fetchData
      };
      Object(_helpers_cookie__WEBPACK_IMPORTED_MODULE_2__["setCookie"])('engagementSearch', JSON.stringify(engagementSearch), this.mutualVar.cookiesInfo.cookieLast);
    },
    setQuerySearchConditions: function setQuerySearchConditions() {
      var item = ['style', 'prong', 'shoulder', 'customized'];

      for (var i = 0; item.length > i; i++) {
        if (this.preset[item[i]].length != this.fetchData[item[i]].length) {
          for (var j = 0; this.query.search_conditions[item[i]].length > j; j++) {
            if (this.fetchData[item[i]].includes(this.query.search_conditions[item[i]][j].description)) {
              this.query.search_conditions[item[i]][j].clicked = true;
            }
          }
        }
      }
    },
    setUrlData: function setUrlData() {
      if (mutualVar.namepath.includes('engagement-rings/')) {
        for (var i = 0; this.query.search_conditions.style.length > i; i++) {
          this.query.search_conditions.style[i].clicked = false;
        }

        if (mutualVar.namepath.includes('solitaire-ring-setting')) {
          this.fetchData.style = ['Solitaire'];
          this.query.search_conditions.style[0].clicked = true;
        }

        if (mutualVar.namepath.includes('side-stones-setting')) {
          this.fetchData.style = ['Side-stone'];
          this.query.search_conditions.style[1].clicked = true;
        }

        if (mutualVar.namepath.includes('halo-setting')) {
          this.fetchData.style = ['Halo'];
          this.query.search_conditions.style[2].clicked = true;
        }
      }
    },
    selectDisplayColumn: function selectDisplayColumn(column) {
      if (this.displayColumn == column) {
        return this.displayColumn = '';
      }

      this.displayColumn = column;
    },
    loopImages: function loopImages(arr1) {
      var j = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 1;

      for (var i = 0; i < this.model.data[arr1].images.length; i++) {
        this.loopAllImage(this.model.data[arr1].images, i, j);
      }
    },
    loopDesktopImage: function loopDesktopImage(arr1, arr2) {
      var j = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 1;

      for (var i = 0; i < this.chunkedItemsDesktop[arr1][arr2].images.length; i++) {
        this.loopAllImage(this.chunkedItemsDesktop[arr1][arr2].images, i, j);
      }
    },
    loopMobileImage: function loopMobileImage(arr1, arr2) {
      var j = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 1;

      for (var i = 0; i < this.chunkedItemsMobile[arr1][arr2].images.length; i++) {
        this.loopAllImage(this.chunkedItemsMobile[arr1][arr2].images, i, j);
      }
    },
    loopAllImage: function loopAllImage(images, i, j) {
      setTimeout(function () {
        images.push(images[0]);
        images.shift();
      }, i * j * 500);
    },
    handleScroll: function handleScroll() {
      if (window.pageYOffset > this.originY) {
        this.originY += 500;
        this.more();
      }
    },
    toggleCustomized: function toggleCustomized() {
      this.fetchData.customized = !this.fetchData.customized;
      this.fetchIndexData();
    },
    clickRow: function clickRow(row, index) {
      this.clickedRows.push(index);
      window.open(mutualVar.langs.locale + '/engagement-rings/' + row.id, '_self');
    },
    toggle: function toggle(id) {
      var index = this.model.data.indexOf(id);

      if (index > -1) {
        this.model.data.splice(index, 1);
      } else {
        this.model.data.push(id);
      }
    },
    filterFalse: function filterFalse(condition) {
      var checked = this.query.search_conditions[condition].filter(function (condition) {
        return condition.clicked;
      });
      this.filterDescriptions(checked);
      this.fetchData[condition] = checked;
      this.fetchIndexData();
    },
    filterDescriptions: function filterDescriptions(checked) {
      for (var i = checked.length - 1; i >= 0; i--) {
        checked[i] = checked[i].description;
      }
    },
    toggleValue: function toggleValue(query, condition, number) {
      var search_conditions = this.query.search_conditions[condition];

      if (query === false) {
        search_conditions[number].clicked = true;
      } else {
        search_conditions[number].clicked = false;
      }

      this.filterFalse(condition);
    },
    // toggleValueToFalseOnce(condition){
    // 	var search_conditions = this.query.search_conditions[condition]
    // 	for (var i = search_conditions.length - 1; i >= 0; i--) {
    // 			search_conditions[i].clicked = false;
    // 		}
    // },
    toggleOrder: function toggleOrder(column) {
      if (column === this.query.column) {
        if (this.query.direction === 'desc') {
          this.query.direction = 'asc';
        } else {
          this.query.direction = 'desc';
        }
      } else {
        this.query.column = column;
        this.direction = 'asc';
      }

      this.fetchIndexData();
    },
    more: function more() {
      this.query.per_page += 10;
      this.fetchIndexData();
    },
    chunkItems: function chunkItems() {
      var chunk1 = [];
      var chunk2 = [];

      for (var i = 0; this.model.data.length - 1 >= i;) {
        chunk1.push(this.model.data.slice(i, i + 4));
        i += 4;
      }

      this.chunkedItemsDesktop = chunk1;

      for (var i = 0; this.model.data.length - 1 >= i;) {
        chunk2.push(this.model.data.slice(i, i + 2));
        i += 2;
      }

      this.chunkedItemsMobile = chunk2;
      return;
    },
    fetchIndexData: function fetchIndexData() {
      var _this = this;

      Object(_helpers_api__WEBPACK_IMPORTED_MODULE_0__["get"])("".concat(this.source, "\n\t\t\t\t\t?column=").concat(this.query.column, "\n\t\t\t\t\t&direction=").concat(this.query.direction, "\n\t\t\t\t\t&page=").concat(this.query.page, "\n\t\t\t\t\t&per_page=").concat(this.query.per_page, "\n\t\t\t\t\t&search_column=").concat(this.query.search_column, "\n\t\t\t\t\t&search_operator=").concat(this.query.search_operator, "\n\t\t\t\t\t&search_input=").concat(this.query.search_input, "\n\t\t\t\t\t&customized=").concat(this.fetchData.customized.toString() ? this.fetchData.customized : this.preset.customized.toString(), "\n\t\t\t\t\t&style=").concat(this.fetchData.style.toString() ? this.fetchData.style.toString() : this.preset.style.toString(), "\n\t\t\t\t\t&shoulder=").concat(this.fetchData.shoulder.toString() ? this.fetchData.shoulder.toString() : this.preset.shoulder.toString(), "\n\t\t\t\t\t&prong=").concat(this.fetchData.prong.toString() ? this.fetchData.prong.toString() : this.preset.prong.toString())).then(function (response) {
        _this.model = response.data.model; // Vue.set(vm.$data, 'columns', response.data.columns)

        _this.chunkItems();
      })["catch"](function () {
        console.log(response);
      });
      this.sendCookies();
    }
  }
});

/***/ }),

/***/ "./resources/js/views/frontEnd/engagementRing/show.js":
/*!************************************************************!*\
  !*** ./resources/js/views/frontEnd/engagementRing/show.js ***!
  \************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _components_appointment_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../components/appointment.vue */ "./resources/js/components/appointment.vue");
/* harmony import */ var _components_carousel_vue__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../components/carousel.vue */ "./resources/js/components/carousel.vue");
/* harmony import */ var _components_productViewer360_vue__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../components/productViewer360.vue */ "./resources/js/components/productViewer360.vue");
/* harmony import */ var _components_shoppingCart_cart_vue__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../../../components/shoppingCart/cart.vue */ "./resources/js/components/shoppingCart/cart.vue");
/* harmony import */ var _helpers_transJs__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../../../helpers/transJs */ "./resources/js/helpers/transJs.js");
/* harmony import */ var _helpers_locale__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../../../helpers/locale */ "./resources/js/helpers/locale.js");
/* harmony import */ var _langs_engagementRings__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ../../../langs/engagementRings */ "./resources/js/langs/engagementRings.js");
// import Auth from '../../store/auth'




 // import Flash from '../../helpers/flash'




/* harmony default export */ __webpack_exports__["default"] = ({
  el: '#engagementRingsShow',
  components: {
    Appointment: _components_appointment_vue__WEBPACK_IMPORTED_MODULE_1__["default"],
    Carousel: _components_carousel_vue__WEBPACK_IMPORTED_MODULE_2__["default"],
    ShoppingCart: _components_shoppingCart_cart_vue__WEBPACK_IMPORTED_MODULE_4__["default"],
    ProductViewer: _components_productViewer360_vue__WEBPACK_IMPORTED_MODULE_3__["default"]
  },
  data: function data() {
    return {
      // auth: Auth.state,
      isRemoving: false,
      carouselState: false,
      appointmentState: false,
      title: '',
      langs: _langs_engagementRings__WEBPACK_IMPORTED_MODULE_7__["default"],
      mutualVar: mutualVar,
      text: {
        engagementRing: 'engagementRing'
      },
      hrefLangs: window.location.pathname.slice(0, 3),
      engagementRing: '',
      columns: ['unit_price', 'shoulder', 'prong', 'ct', 'stock', 'name', 'description'],
      storeURL: '',
      customerItems: '',
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
  computed: {
    appointmentTitle: function appointmentTitle() {
      return Object(_helpers_transJs__WEBPACK_IMPORTED_MODULE_5__["transJs"])(this.engagementRing.shoulder, this.langs, this.locale) + ' ' + Object(_helpers_transJs__WEBPACK_IMPORTED_MODULE_5__["transJs"])(this.engagementRing.prong, this.langs, this.locale) + ' ' + Object(_helpers_transJs__WEBPACK_IMPORTED_MODULE_5__["transJs"])(this.text.engagementRing, this.langs, this.locale) + ' ' + this.engagementRing.stock;
    },
    locale: function locale() {
      return Object(_helpers_locale__WEBPACK_IMPORTED_MODULE_6__["getLocaleCode"])();
    },
    carouselItem: function carouselItem() {}
  },
  methods: {
    fetchData: function fetchData() {
      var _this = this;

      Object(_helpers_api__WEBPACK_IMPORTED_MODULE_0__["get"])("/api/engagementRings/".concat(window.location.pathname.slice(21))).then(function (res) {
        _this.engagementRing = res.data.model;

        _this.filterNotPostable(res.data.posts.invPosts);

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

/***/ "./resources/js/views/frontEnd/jewellery/index.js":
/*!********************************************************!*\
  !*** ./resources/js/views/frontEnd/jewellery/index.js ***!
  \********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _langs_jewelleries__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../langs/jewelleries */ "./resources/js/langs/jewelleries.js");
/* harmony import */ var _langs_diamondViewer__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../langs/diamondViewer */ "./resources/js/langs/diamondViewer.js");
/* harmony import */ var _langs_engagementRings__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../langs/engagementRings */ "./resources/js/langs/engagementRings.js");
/* harmony import */ var _langs_weddingRings__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../../../langs/weddingRings */ "./resources/js/langs/weddingRings.js");
/* harmony import */ var _helpers_cookie__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../../../helpers/cookie */ "./resources/js/helpers/cookie.js");






/* harmony default export */ __webpack_exports__["default"] = ({
  el: '#jewellery',
  props: ['title'],
  data: function data() {
    return {
      mutualVar: mutualVar,
      source: '/api/jewellery',
      fetchData: {
        type: ['Ring', 'Necklace', 'Earring', 'Pendant', 'Bracelet'],
        metal: ['18KW', '18KR', '18KY', 'PT', 'Mixed'],
        gemstone: ['0', 'diamond', 'pearl', 'fancy diamond'],
        setting: [1, 0],
        sideStone: [1, 0],
        customized: [1, 0]
      },
      preset: {
        type: ['Ring', 'Necklace', 'Earring', 'Pendant', 'Bracelet'],
        metal: ['18KW', '18KR', '18KY', 'PT', 'Mixed'],
        gemstone: ['0', 'diamond', 'pearl', 'fancy diamond'],
        setting: [1, 0],
        sideStone: [1, 0],
        customized: [1, 0]
      },
      scrolled: false,
      originY: 500,
      langs: _langs_diamondViewer__WEBPACK_IMPORTED_MODULE_2__["default"].concat(_langs_engagementRings__WEBPACK_IMPORTED_MODULE_3__["default"], _langs_weddingRings__WEBPACK_IMPORTED_MODULE_4__["default"], _langs_jewelleries__WEBPACK_IMPORTED_MODULE_1__["default"]),
      showModal: false,
      showAdvance: false,
      opened: [],
      model: {},
      chunkedItemsDesktop: [],
      chunkedItemsMobile: [],
      clickedRows: [],
      displayColumn: '',
      columns: ['type', 'metal', 'gemstone', 'setting', 'sideStone', 'sideStone'],
      query: {
        page: 1,
        column: 'type',
        direction: 'asc',
        per_page: 10,
        search_column: 'id',
        search_operator: 'like',
        search_input: '',
        search_conditions: {
          type: [{
            description: 'Ring',
            clicked: false,
            display: 'Ring'
          }, {
            description: 'Necklace',
            clicked: false,
            display: 'Necklace'
          }, {
            description: 'Bracelet',
            clicked: false,
            display: 'Bracelet'
          }, {
            description: 'Earring',
            clicked: false,
            display: 'Earring'
          }, {
            description: 'Pendant',
            clicked: false,
            display: 'Pendant'
          }],
          gemstone: [{
            description: '0',
            clicked: false,
            display: 'doesntHave'
          }, {
            description: 'Diamond',
            clicked: false,
            display: 'Diamond'
          }, {
            description: 'Fancy Diamond',
            clicked: false,
            display: 'Fancy Diamond'
          }, {
            description: 'Pearl',
            clicked: false,
            display: 'Pearl'
          }],
          metal: [{
            description: '18KW',
            clicked: false,
            display: '18KW'
          }, {
            description: '18KY',
            clicked: false,
            display: '18KY'
          }, {
            description: '18KR',
            clicked: false,
            display: '18KRG'
          }, {
            description: 'PT',
            clicked: false,
            display: 'PT950/900'
          }, {
            description: 'Mixed',
            clicked: false,
            display: 'Mixed'
          }],
          setting: [{
            description: 1,
            clicked: false,
            display: 'True'
          }, {
            description: 0,
            clicked: false,
            display: 'False'
          }],
          sideStone: [{
            description: 1,
            clicked: false,
            display: 'True'
          }, {
            description: 0,
            clicked: false,
            display: 'False'
          }],
          customized: [{
            description: 1,
            clicked: false,
            display: 'True'
          }, {
            description: 0,
            clicked: false,
            display: 'False'
          }]
        }
      },
      operators: {
        equal: '=',
        not_equal: '<>',
        less_than: '<',
        greater_than: '>',
        less_than_or_equal_to: '<=',
        greater_than_or_equal_to: '>=',
        "in": 'IN',
        like: 'LIKE'
      },
      onLoopingImage: 0
    };
  },
  created: function created() {
    this.fetchCookies();
    this.setQuerySearchConditions();
    this.setUrlData();
    this.fetchIndexData();
    window.addEventListener('scroll', this.handleScroll);
  },
  destroyed: function destroyed() {
    window.removeEventListener('scroll', this.handleScroll);
  },
  computed: {
    typeClicked: function typeClicked() {
      return this.query.search_conditions.type.filter(function (type) {
        return type.clicked;
      });
    },
    locale: function locale() {
      return getLocaleCode();
    }
  },
  methods: {
    fetchCookies: function fetchCookies() {
      var cookies = '';

      if (Object(_helpers_cookie__WEBPACK_IMPORTED_MODULE_5__["getCookie"])('jewellery')) {
        cookies = JSON.parse(Object(_helpers_cookie__WEBPACK_IMPORTED_MODULE_5__["getCookie"])('jewellery'));
        this.mutualVar.cookiesInfo.jewellery = cookies;
        this.fetchData = cookies.fetchData;
        this.query.per_page = 10;
      }
    },
    sendCookies: function sendCookies() {
      var jewellery = {
        fetchData: this.fetchData
      };
      Object(_helpers_cookie__WEBPACK_IMPORTED_MODULE_5__["setCookie"])('jewellery', JSON.stringify(jewellery), this.mutualVar.cookiesInfo.cookieLast);
    },
    setQuerySearchConditions: function setQuerySearchConditions() {
      var item = ['type', 'gemstone', 'metal', 'setting', 'sideStone', 'customized'];

      for (var i = 0; item.length > i; i++) {
        if (this.preset[item[i]].length != this.fetchData[item[i]].length) {
          for (var j = 0; this.query.search_conditions[item[i]].length > j; j++) {
            if (this.fetchData[item[i]].includes(this.query.search_conditions[item[i]][j].description)) {
              this.query.search_conditions[item[i]][j].clicked = true;
            }
          }
        }
      }
    },
    setUrlData: function setUrlData() {
      var url = mutualVar.namepath;

      if (url.includes('jewellery/')) {
        for (var i = 0; this.query.search_conditions.type.length > i; i++) {
          this.query.search_conditions.type[i].clicked = false;
        }

        for (var i = 0; this.query.search_conditions.gemstone.length > i; i++) {
          this.query.search_conditions.gemstone[i].clicked = false;
        }

        if (url.includes('/rings')) {
          this.fetchData.type = ['Ring'];
          this.query.search_conditions.type[0].clicked = true;
        }

        if (url.includes('/diamond-rings')) {
          this.fetchData.type = ['Ring'];
          this.fetchData.gemstone = ['diamond'];
          this.query.search_conditions.type[0].clicked = true;
          this.query.search_conditions.gemstone[1].clicked = true;
        }

        if (url.includes('/fancy-diamond-rings')) {
          this.fetchData.type = ['Ring'];
          this.fetchData.gemstone = ['fancy diamond'];
          this.query.search_conditions.type[0].clicked = true;
          this.query.search_conditions.gemstone[2].clicked = true;
        }

        if (url.includes('/necklaces')) {
          this.fetchData.type = ['Necklace'];
          this.query.search_conditions.type[1].clicked = true;
        }

        if (url.includes('/bracelets')) {
          this.fetchData.type = ['Bracelet'];
          this.query.search_conditions.type[2].clicked = true;
        }

        if (url.includes('/earrings')) {
          this.fetchData.type = ['Earring'];
          this.query.search_conditions.type[3].clicked = true;
        }

        if (url.includes('/pendants')) {
          this.fetchData.type = ['Pendant'];
          this.query.search_conditions.type[4].clicked = true;
        }
      }
    },
    selectDisplayColumn: function selectDisplayColumn(column) {
      if (this.displayColumn == column) {
        return this.displayColumn = '';
      }

      this.displayColumn = column;
    },
    loopImages: function loopImages(arr1) {
      var j = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 1;

      for (var i = 0; i < this.model.data[arr1].images.length; i++) {
        this.loopAllImage(this.model.data[arr1].images, i, j);
      }
    },
    loopDesktopImage: function loopDesktopImage(arr1, arr2) {
      for (var i = 0; i < this.chunkedItemsDesktop[arr1][arr2].images.length; i++) {
        this.loopAllImage(this.chunkedItemsDesktop[arr1][arr2].images, i);
      }
    },
    loopMobileImage: function loopMobileImage(arr1, arr2) {
      for (var i = 0; i < this.chunkedItemsMobile[arr1][arr2].images.length; i++) {
        this.loopAllImage(this.chunkedItemsMobile[arr1][arr2].images, i);
      }
    },
    loopAllImage: function loopAllImage(images, i) {
      setTimeout(function () {
        images.push(images[0]);
        images.shift();
        console.log(i);
      }, i * 500);
    },
    handleScroll: function handleScroll() {
      if (window.pageYOffset > this.originY) {
        this.originY += 500;
        this.more();
      }
    },
    toggleCustomized: function toggleCustomized() {
      this.fetchData.customized = !this.fetchData.customized;
      this.fetchIndexData();
    },
    clickRow: function clickRow(row, index) {
      this.clickedRows.push(index);
      window.open(window.location.pathname.slice(0, 3) + '/jewellery/' + row.id, '_self');
    },
    toggle: function toggle(id) {
      var index = this.model.data.indexOf(id);

      if (index > -1) {
        this.model.data.splice(index, 1);
      } else {
        this.model.data.push(id);
      }
    },
    filterFalse: function filterFalse(condition) {
      var checked = this.query.search_conditions[condition].filter(function (condition) {
        return condition.clicked;
      });
      this.filterDescriptions(checked);
      this.fetchData[condition] = checked;
      this.fetchIndexData();
    },
    filterDescriptions: function filterDescriptions(checked) {
      for (var i = checked.length - 1; i >= 0; i--) {
        checked[i] = checked[i].description;
      }
    },
    toggleValue: function toggleValue(query, condition, number) {
      var search_conditions = this.query.search_conditions[condition];

      if (query === false) {
        search_conditions[number].clicked = true;
      } else {
        search_conditions[number].clicked = false;
      }

      this.filterFalse(condition);
    },
    // toggleValueToFalseOnce(condition){
    // 	var search_conditions = this.query.search_conditions[condition]
    // 	for (var i = search_conditions.length - 1; i >= 0; i--) {
    // 			search_conditions[i].clicked = false;
    // 		}
    // },
    toggleOrder: function toggleOrder(column) {
      if (column === this.query.column) {
        if (this.query.direction === 'desc') {
          this.query.direction = 'asc';
        } else {
          this.query.direction = 'desc';
        }
      } else {
        this.query.column = column;
        this.direction = 'asc';
      }

      this.fetchIndexData();
    },
    more: function more() {
      this.query.per_page += 10;
      this.fetchIndexData();
    },
    chunkItems: function chunkItems() {
      var chunk1 = [];
      var chunk2 = [];

      for (var i = 0; this.model.data.length - 1 >= i;) {
        chunk1.push(this.model.data.slice(i, i + 4));
        i += 4;
      }

      this.chunkedItemsDesktop = chunk1;

      for (var i = 0; this.model.data.length - 1 >= i;) {
        chunk2.push(this.model.data.slice(i, i + 2));
        i += 2;
      }

      this.chunkedItemsMobile = chunk2;
      return;
    },
    fetchIndexData: function fetchIndexData() {
      var _this = this;

      Object(_helpers_api__WEBPACK_IMPORTED_MODULE_0__["get"])("".concat(this.source, "\n\t\t\t\t\t?column=").concat(this.query.column, "\n\t\t\t\t\t&direction=").concat(this.query.direction, "\n\t\t\t\t\t&page=").concat(this.query.page, "\n\t\t\t\t\t&per_page=").concat(this.query.per_page, "\n\t\t\t\t\t&search_column=").concat(this.query.search_column, "\n\t\t\t\t\t&search_operator=").concat(this.query.search_operator, "\n\t\t\t\t\t&search_input=").concat(this.query.search_input, "\n\t\t\t\t\t&customized=").concat(this.fetchData.customized.toString() ? this.fetchData.customized : this.preset.customized.toString(), "\n\t\t\t\t\t&setting=").concat(this.fetchData.setting.toString() ? this.fetchData.setting : this.preset.setting.toString(), "\n\t\t\t\t\t&sideStone=").concat(this.fetchData.sideStone.toString() ? this.fetchData.sideStone : this.preset.sideStone.toString(), "\n\t\t\t\t\t&type=").concat(this.fetchData.type.toString() ? this.fetchData.type.toString() : this.preset.type.toString(), "\n\t\t\t\t\t&metal=").concat(this.fetchData.metal.toString() ? this.fetchData.metal.toString() : this.preset.metal.toString(), "\n\t\t\t\t\t&gemstone=").concat(this.fetchData.gemstone.toString() ? this.fetchData.gemstone.toString() : this.preset.gemstone.toString())).then(function (response) {
        _this.model = response.data.model; // Vue.set(vm.$data, 'columns', response.data.columns)

        _this.chunkItems();
      })["catch"](function () {
        console.log(response);
      });
      this.sendCookies();
    }
  }
});

/***/ }),

/***/ "./resources/js/views/frontEnd/jewellery/show.js":
/*!*******************************************************!*\
  !*** ./resources/js/views/frontEnd/jewellery/show.js ***!
  \*******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _components_appointment_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../components/appointment.vue */ "./resources/js/components/appointment.vue");
/* harmony import */ var _components_carousel_vue__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../components/carousel.vue */ "./resources/js/components/carousel.vue");
/* harmony import */ var _helpers_transJs__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../helpers/transJs */ "./resources/js/helpers/transJs.js");
/* harmony import */ var _langs_jewelleries__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../../../langs/jewelleries */ "./resources/js/langs/jewelleries.js");
/* harmony import */ var _langs_diamondViewer__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../../../langs/diamondViewer */ "./resources/js/langs/diamondViewer.js");
/* harmony import */ var _langs_engagementRings__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../../../langs/engagementRings */ "./resources/js/langs/engagementRings.js");
/* harmony import */ var _langs_weddingRings__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ../../../langs/weddingRings */ "./resources/js/langs/weddingRings.js");
// import Auth from '../../store/auth'


 // import Flash from '../../helpers/flash'






/* harmony default export */ __webpack_exports__["default"] = ({
  el: '#jewellery',
  components: {
    Appointment: _components_appointment_vue__WEBPACK_IMPORTED_MODULE_1__["default"],
    Carousel: _components_carousel_vue__WEBPACK_IMPORTED_MODULE_2__["default"]
  },
  data: function data() {
    return {
      // auth: Auth.state,
      isRemoving: false,
      carouselState: false,
      appointmentState: false,
      title: '',
      langs: _langs_diamondViewer__WEBPACK_IMPORTED_MODULE_5__["default"].concat(_langs_engagementRings__WEBPACK_IMPORTED_MODULE_6__["default"], _langs_weddingRings__WEBPACK_IMPORTED_MODULE_7__["default"], _langs_jewelleries__WEBPACK_IMPORTED_MODULE_4__["default"]),
      text: {
        jewellery: 'jewellery'
      },
      hrefLangs: window.location.pathname.slice(0, 3),
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
  filters: {
    transJs: _helpers_transJs__WEBPACK_IMPORTED_MODULE_3__["transJs"]
  },
  computed: {
    appointmentTitle: function appointmentTitle() {
      return Object(_helpers_transJs__WEBPACK_IMPORTED_MODULE_3__["transJs"])(this.jewellery.metal, this.langs, this.locale) + ' ' + Object(_helpers_transJs__WEBPACK_IMPORTED_MODULE_3__["transJs"])(this.jewellery.type, this.langs, this.locale) + ' ' + Object(_helpers_transJs__WEBPACK_IMPORTED_MODULE_3__["transJs"])(this.text.jewellery, this.langs, this.locale);
    },
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
  methods: {
    fetchData: function fetchData() {
      var _this = this;

      Object(_helpers_api__WEBPACK_IMPORTED_MODULE_0__["get"])("/api/jewellery/".concat(window.location.pathname.slice(14))).then(function (res) {
        _this.jewellery = res.data.model;

        _this.filterNotPostable(res.data.posts.invPosts);
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
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _components_carousel_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../components/carousel.vue */ "./resources/js/components/carousel.vue");
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _helpers_locale__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../helpers/locale */ "./resources/js/helpers/locale.js");
/* harmony import */ var _helpers_cookie__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../helpers/cookie */ "./resources/js/helpers/cookie.js");
/* harmony import */ var _helpers_helperFunctions__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../../../helpers/helperFunctions */ "./resources/js/helpers/helperFunctions.js");





/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    Carousel: _components_carousel_vue__WEBPACK_IMPORTED_MODULE_0__["default"]
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
      extraWorkingDates: _helpers_helperFunctions__WEBPACK_IMPORTED_MODULE_4__["extraWorkingDates"]
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
    locale: function locale() {
      return Object(_helpers_locale__WEBPACK_IMPORTED_MODULE_2__["getLocaleCode"])();
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
      Object(_helpers_api__WEBPACK_IMPORTED_MODULE_1__["get"])("/api/engagementRings/".concat(engagementRingId)).then(function (res) {
        _this.carouselItem.upperitems = res.data.model;

        _this.filterNotPostable(res.data.posts.invPosts, engagementRingId);
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

        urlId = Object(_helpers_locale__WEBPACK_IMPORTED_MODULE_2__["getLocale"])() + urlId;
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

/***/ "./resources/js/views/frontEnd/shoppingCart/index.vue":
/*!************************************************************!*\
  !*** ./resources/js/views/frontEnd/shoppingCart/index.vue ***!
  \************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.vue?vue&type=script&lang=js& */ "./resources/js/views/frontEnd/shoppingCart/index.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");
var render, staticRenderFns




/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_1__["default"])(
  _index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"],
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
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/views/frontEnd/shoppingCart/index.vue?vue&type=script&lang=js&":
/*!*************************************************************************************!*\
  !*** ./resources/js/views/frontEnd/shoppingCart/index.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib??ref--4-0!../../../../../node_modules/vue-loader/lib??vue-loader-options!./index.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/views/frontEnd/shoppingCart/index.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_index_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/views/frontEnd/shoppingCart/shopBagBill.js":
/*!*****************************************************************!*\
  !*** ./resources/js/views/frontEnd/shoppingCart/shopBagBill.js ***!
  \*****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _components_shoppingCart_item_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../components/shoppingCart/item.vue */ "./resources/js/components/shoppingCart/item.vue");
/* harmony import */ var _components_shoppingCart_stripeCheckoutForm_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../components/shoppingCart/stripeCheckoutForm.vue */ "./resources/js/components/shoppingCart/stripeCheckoutForm.vue");
/* harmony import */ var _helpers_getAuthUser__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../helpers/getAuthUser */ "./resources/js/helpers/getAuthUser.js");
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _helpers_locale__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../../../helpers/locale */ "./resources/js/helpers/locale.js");
/* harmony import */ var _helpers_cookie__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ../../../helpers/cookie */ "./resources/js/helpers/cookie.js");





 // import QRCode from 'qrcode'

/* harmony default export */ __webpack_exports__["default"] = ({
  el: '#shopBagBill',
  components: {
    shoppingCartItem: _components_shoppingCart_item_vue__WEBPACK_IMPORTED_MODULE_0__["default"],
    stripeCheckoutForm: _components_shoppingCart_stripeCheckoutForm_vue__WEBPACK_IMPORTED_MODULE_1__["default"]
  },
  data: function data() {
    return {
      mutualVar: mutualVar,
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
      isProcessing: false,
      apiToken: _helpers_getAuthUser__WEBPACK_IMPORTED_MODULE_2__["default"].api_token,
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
  },
  mounted: function mounted() {
    this.checkOnProgress();
  },
  computed: {
    shortenName: function shortenName() {
      return this.cookies.shoppingCart.items[this.cookies.shoppingCart.selectingIndex].pairItems;
    },
    locale: function locale() {
      return Object(_helpers_locale__WEBPACK_IMPORTED_MODULE_4__["getLocale"])();
    },
    checkoutClickable: function checkoutClickable() {
      var items = this.cookies.shoppingCart.items;
      var allItemsClickable = true;

      for (var i = 0; items.length > i; i++) {
        for (var j = 0; items[i]['pairItems'].length > j; j++) {
          if (items[i]['pairItems'][j].available == 0) {
            allItemsClickable = false;
          }
        }
      }

      if (items.length < 1) {
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

      if (Object(_helpers_cookie__WEBPACK_IMPORTED_MODULE_5__["getCookie"])('coupon_code')) {
        this.cookies.coupon_code = Object(_helpers_cookie__WEBPACK_IMPORTED_MODULE_5__["getCookie"])('coupon_code');
      }

      if (Object(_helpers_cookie__WEBPACK_IMPORTED_MODULE_5__["getCookie"])('checkout')) {
        this.cookies.checkout = JSON.parse(Object(_helpers_cookie__WEBPACK_IMPORTED_MODULE_5__["getCookie"])('checkout'));
      }
    },
    sendCookies: function sendCookies() {
      var cookies = this.cookies.shoppingCart;
      localStorage.setItem('shoppingCart', encodeURIComponent(JSON.stringify(cookies)), this.cookies.cookieLast);
      localStorage.setItem('form', encodeURIComponent(JSON.stringify(this.form)), this.cookies.cookieLast);
      Object(_helpers_cookie__WEBPACK_IMPORTED_MODULE_5__["setCookie"])('coupon_code', this.cookies.coupon_code, this.cookies.cookieLast);
      Object(_helpers_cookie__WEBPACK_IMPORTED_MODULE_5__["setCookie"])('checkout', JSON.stringify(this.cookies.checkout), this.cookies.cookieLast);
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
      Object(_helpers_api__WEBPACK_IMPORTED_MODULE_3__["post"])('/api/update-customer-info', data).then(function (res) {
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
        Object(_helpers_api__WEBPACK_IMPORTED_MODULE_3__["post"])('/api/update-cart-items', data).then(function (res) {
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

      Object(_helpers_api__WEBPACK_IMPORTED_MODULE_3__["post"])('/api/place-order', this.formData).then(function (res) {
        // console.log(res.data)
        if (res.data.saved) {
          _this4.receivedPayment(res.data.message);
        }

        if (_this4.formData.depositPaymentMethod == "Alipay(-1%)") {
          _this4.responseToJson(res);

          _this4.checkOrderPaymentStatus();
        }

        if (_this4.formData.depositPaymentMethod == "Wechat(-1%)") {
          _this4.responseToJson(res);

          _this4.checkOrderPaymentStatus();
        } // window.open( window.location.pathname ,'_self')


        _this4.isProcessing = false;
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
      Object(_helpers_api__WEBPACK_IMPORTED_MODULE_3__["post"])('/purchases/alipay', data).then(function (res) {
        _this5.responseToJson(res);
      })["catch"](function (error) {
        _this5.$emit('paymentModalActive', null);

        mutualVar.notification.state.error = error.response.data.message;
      });
    },
    receivedPayment: function receivedPayment(mes) {
      var message = mutualVar.notification.contactMessage;
      message.title = 'message';
      message.type = 'is-danger';
      message.data.push(mes);
      message.next = {
        nextUrl: mutualVar.langs.locale + '/account/pending',
        nextText: 'check your pending order'
      };
      message.active = true;
      this.cookies.shoppingCart.items = [];
      this.cookies.shoppingCart.selectingIndex = 0;
      this.sendCookies();
      this.updateCartItems();
    },
    checkOrderPaymentStatus: function checkOrderPaymentStatus() {
      var count = 60;
      var vm = this;

      function getPaymentS(vm, isProcessing) {
        setTimeout(function () {
          if (vm.orderStatus != 'received money') {
            Object(_helpers_api__WEBPACK_IMPORTED_MODULE_3__["get"])('/api/order/payment-status/' + vm.paymentResponse.orderID).then(function (res) {
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
      if (_helpers_getAuthUser__WEBPACK_IMPORTED_MODULE_2__["default"].api_token != '') {
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

      Object(_helpers_api__WEBPACK_IMPORTED_MODULE_3__["authGet"])('/api/fetch-customer-info').then(function (res) {
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

/***/ "./resources/js/views/frontEnd/weddingRing/index.js":
/*!**********************************************************!*\
  !*** ./resources/js/views/frontEnd/weddingRing/index.js ***!
  \**********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _helpers_transJs__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../helpers/transJs */ "./resources/js/helpers/transJs.js");
/* harmony import */ var _langs_weddingRings__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../langs/weddingRings */ "./resources/js/langs/weddingRings.js");
/* harmony import */ var _helpers_cookie__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../helpers/cookie */ "./resources/js/helpers/cookie.js");




/* harmony default export */ __webpack_exports__["default"] = ({
  el: '#weddingRings',
  props: ['title'],
  data: function data() {
    return {
      mutualVar: mutualVar,
      source: '/api/weddingRings',
      fetchData: {
        style: ['Japanese', 'Vintage', 'Classic'],
        metal: ['18KW', '18KR', 'PT', 'Mixed'],
        customized: [1, 0],
        sideStone: [1, 0],
        gender: ['f', 'm', 1]
      },
      preset: {
        style: ['Japanese', 'Vintage', 'Classic'],
        metal: ['18KW', '18KR', 'PT', 'Mixed'],
        customized: [1, 0],
        sideStone: [1, 0],
        gender: ['f', 'm', 1]
      },
      showModal: false,
      showAdvance: false,
      scrolled: false,
      originY: 500,
      opened: [],
      model: {},
      langs: _langs_weddingRings__WEBPACK_IMPORTED_MODULE_2__["default"],
      chunkedItemsDesktop: [],
      chunkedItemsMobile: [],
      sameStock: [],
      clickedRows: [],
      displayColumn: '',
      columns: ['style', 'metal', 'sideStone'],
      query: {
        page: 1,
        column: 'style',
        direction: 'asc',
        per_page: 10,
        search_column: 'id',
        search_operator: 'like',
        search_input: '',
        search_conditions: {
          style: [{
            description: 'Classic',
            clicked: false,
            display: 'Classic'
          }, {
            description: 'Japanese',
            clicked: false,
            display: 'Japanese'
          }, {
            description: 'Vintage',
            clicked: false,
            display: 'Vintage'
          }],
          metal: [{
            description: '18KW',
            clicked: false,
            display: '18K White'
          }, {
            description: '18KR',
            clicked: false,
            display: '18K Rose Gold'
          }, {
            description: 'PT',
            clicked: false,
            display: 'PT950/900'
          }, {
            description: 'Mixed',
            clicked: false,
            display: 'Mixed'
          }],
          sideStone: [{
            description: 1,
            clicked: false,
            display: 'True'
          }, {
            description: 0,
            clicked: false,
            display: 'False'
          }],
          customized: [{
            description: 1,
            clicked: false,
            display: 'True'
          }, {
            description: 0,
            clicked: false,
            display: 'False'
          }],
          gender: [{
            description: 1,
            clicked: false,
            display: 'Men'
          }, {
            description: 0,
            clicked: false,
            display: 'Female'
          }]
        }
      },
      operators: {
        equal: '=',
        not_equal: '<>',
        less_than: '<',
        greater_than: '>',
        less_than_or_equal_to: '<=',
        greater_than_or_equal_to: '>=',
        "in": 'IN',
        like: 'LIKE'
      }
    };
  },
  created: function created() {
    this.fetchCookies();
    this.setQuerySearchConditions();
    this.setUrlData();
    this.fetchIndexData();
    window.addEventListener('scroll', this.handleScroll);
  },
  destroyed: function destroyed() {
    window.removeEventListener('scroll', this.handleScroll);
  },
  computed: {
    styleClicked: function styleClicked() {
      return this.query.search_conditions.style.filter(function (style) {
        return style.clicked;
      });
    },
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
  methods: {
    fetchCookies: function fetchCookies() {
      var cookies = '';

      if (Object(_helpers_cookie__WEBPACK_IMPORTED_MODULE_3__["getCookie"])('weddingRingSearch')) {
        cookies = JSON.parse(Object(_helpers_cookie__WEBPACK_IMPORTED_MODULE_3__["getCookie"])('weddingRingSearch'));
        this.mutualVar.cookiesInfo.weddingRingSearch = cookies;
        this.fetchData = cookies.fetchData;
        this.query.per_page = 10;
      }
    },
    sendCookies: function sendCookies() {
      var weddingRingSearch = {
        fetchData: this.fetchData
      };
      Object(_helpers_cookie__WEBPACK_IMPORTED_MODULE_3__["setCookie"])('weddingRingSearch', JSON.stringify(weddingRingSearch), this.mutualVar.cookiesInfo.cookieLast);
    },
    setQuerySearchConditions: function setQuerySearchConditions() {
      var item = ['style', 'metal', 'sideStone', 'customized', 'gender'];

      for (var i = 0; item.length > i; i++) {
        if (this.preset[item[i]].length != this.fetchData[item[i]].length) {
          for (var j = 0; this.query.search_conditions[item[i]].length > j; j++) {
            if (this.fetchData[item[i]].includes(this.query.search_conditions[item[i]][j].description)) {
              this.query.search_conditions[item[i]][j].clicked = true;
            }
          }
        }
      }
    },
    setUrlData: function setUrlData() {
      if (window.location.pathname.slice(3).includes('wedding-rings/')) {
        for (var i = 0; this.query.search_conditions.style.length > i; i++) {
          this.query.search_conditions.style[i].clicked = false;
        }

        if (window.location.pathname.slice(3).includes('/classic')) {
          this.fetchData.style = ['Classic'];
          this.query.search_conditions.style[0].clicked = true;
        }

        if (window.location.pathname.slice(3).includes('/japanese')) {
          this.fetchData.style = ['Japanese'];
          this.query.search_conditions.style[1].clicked = true;
        }

        if (window.location.pathname.slice(3).includes('/vintage')) {
          this.fetchData.style = ['vintage'];
          this.query.search_conditions.style[2].clicked = true;
        }
      }
    },
    selectDisplayColumn: function selectDisplayColumn(column) {
      if (this.displayColumn == column) {
        return this.displayColumn = '';
      }

      this.displayColumn = column;
    },
    loopImages: function loopImages(arr1) {
      var j = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 1;

      for (var i = 0; i < this.model.data[arr1].wedding_rings[0].images.length; i++) {
        this.loopAllImage(this.model.data[arr1].wedding_rings[0].images, i, j);
        console.log('hi');
      }
    },
    loopDesktopImage: function loopDesktopImage(arr1, arr2) {
      var j = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 1;
      this.chunkedItemsDesktop[arr1][arr2].wedding_rings[0].images = this.chunkedItemsDesktop[arr1][arr2].wedding_rings[0].images.concat(this.chunkedItemsDesktop[arr1][arr2].wedding_rings[1].images);

      for (var i = 0; i < this.chunkedItemsDesktop[arr1][arr2].wedding_rings[0].images.length; i++) {
        this.loopAllImage(this.chunkedItemsDesktop[arr1][arr2].wedding_rings[0].images, i, j);
      }
    },
    loopMobileImage: function loopMobileImage(arr1, arr2) {
      var j = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 1;

      for (var i = 0; i < this.chunkedItemsMobile[arr1][arr2].wedding_rings[0].images.length; i++) {
        this.loopAllImage(this.chunkedItemsMobile[arr1][arr2].wedding_rings[0].images, i, j);
      }
    },
    loopAllImage: function loopAllImage(images, i, j) {
      setTimeout(function () {
        images.push(images[0]);
        images.shift();
      }, i * j * 500);
    },
    handleScroll: function handleScroll() {
      if (window.pageYOffset > this.originY) {
        this.originY += 500;
        this.more();
      }
    },
    transJsMet: function transJsMet(data, ori, langs) {
      return Object(_helpers_transJs__WEBPACK_IMPORTED_MODULE_1__["transJs"])(data, ori, langs);
    },
    toggleCustomized: function toggleCustomized() {
      this.fetchData.customized = !this.fetchData.customized;
      this.fetchIndexData();
    },
    toggleSideStone: function toggleSideStone() {
      this.fetchData.sideStone = !this.fetchData.sideStone;
      this.fetchIndexData();
    },
    clickRow: function clickRow(row, index) {
      this.clickedRows.push(index);
      window.open(window.location.pathname.slice(0, 3) + '/wedding-rings/' + row.id, '_self');
    },
    toggle: function toggle(id) {
      var index = this.model.data.indexOf(id);

      if (index > -1) {
        this.model.data.splice(index, 1);
      } else {
        this.model.data.push(id);
      }
    },
    moveTo: function moveTo(page) {
      if (this.query.page + page > 0) {
        this.query.page = this.query.page + page;
        this.fetchIndexData();
      }
    },
    filterFalse: function filterFalse(condition) {
      var checked = this.query.search_conditions[condition].filter(function (condition) {
        return condition.clicked;
      });
      this.filterDescriptions(checked);
      this.fetchData[condition] = checked;
      this.fetchIndexData();
    },
    filterDescriptions: function filterDescriptions(checked) {
      for (var i = checked.length - 1; i >= 0; i--) {
        checked[i] = checked[i].description;
      }
    },
    toggleValue: function toggleValue(query, condition, number) {
      var search_conditions = this.query.search_conditions[condition];

      if (query === false) {
        search_conditions[number].clicked = true;
      } else {
        search_conditions[number].clicked = false;
      }

      this.filterFalse(condition);
    },
    // toggleValueToFalseOnce(condition){
    // 	var search_conditions = this.query.search_conditions[condition]
    // 	for (var i = search_conditions.length - 1; i >= 0; i--) {
    // 			search_conditions[i].clicked = false;
    // 		}
    // },
    more: function more() {
      this.query.per_page += 10;
      this.fetchIndexData();
    },
    toggleOrder: function toggleOrder(column) {
      if (column === this.query.column) {
        if (this.query.direction === 'desc') {
          this.query.direction = 'asc';
        } else {
          this.query.direction = 'desc';
        }
      } else {
        this.query.column = column;
        this.direction = 'asc';
      }

      this.fetchIndexData();
    },
    chunkItems: function chunkItems() {
      var filtered = [];
      var chunk1 = [];
      var chunk2 = [];
      filtered = this.model.data.filter(function (data) {
        return data.wedding_rings.length > 0;
      });

      for (var i = 0; filtered.length - 1 >= i;) {
        chunk1.push(filtered.slice(i, i + 4));
        i += 4;
      }

      this.chunkedItemsDesktop = chunk1;

      for (var i = 0; filtered.length - 1 >= i;) {
        chunk2.push(filtered.slice(i, i + 2));
        i += 2;
      }

      this.chunkedItemsMobile = chunk2;
      return;
    },
    fetchIndexData: function fetchIndexData() {
      var _this = this;

      Object(_helpers_api__WEBPACK_IMPORTED_MODULE_0__["get"])("".concat(this.source, "\n\t\t\t\t\t?column=").concat(this.query.column, "\n\t\t\t\t\t&direction=").concat(this.query.direction, "\n\t\t\t\t\t&page=").concat(this.query.page, "\n\t\t\t\t\t&per_page=").concat(this.query.per_page, "\n\t\t\t\t\t&search_column=").concat(this.query.search_column, "\n\t\t\t\t\t&search_operator=").concat(this.query.search_operator, "\n\t\t\t\t\t&search_input=").concat(this.query.search_input, "\n\t\t\t\t\t&customized=").concat(this.fetchData.customized.toString() ? this.fetchData.customized : this.preset.customized.toString(), "\n\t\t\t\t\t&sideStone=").concat(this.fetchData.sideStone.toString() ? this.fetchData.sideStone : this.preset.sideStone.toString(), "\n\t\t\t\t\t&gender=").concat(this.fetchData.gender.toString() ? this.fetchData.gender : this.preset.gender.toString(), "\n\t\t\t\t\t&style=").concat(this.fetchData.style.toString() ? this.fetchData.style.toString() : this.preset.style.toString(), "\n\t\t\t\t\t&metal=").concat(this.fetchData.metal.toString() ? this.fetchData.metal.toString() : this.preset.metal.toString(), "\n\t\t\t\t\t")).then(function (response) {
        _this.model = response.data.model; // Vue.set(vm.$data, 'columns', response.data.columns)

        _this.chunkItems();

        _this.pairUp();
      })["catch"](function (response) {
        console.log(response);
      });
      this.sendCookies();
    }
  }
});

/***/ }),

/***/ "./resources/js/views/frontEnd/weddingRing/show.js":
/*!*********************************************************!*\
  !*** ./resources/js/views/frontEnd/weddingRing/show.js ***!
  \*********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _helpers_api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../helpers/api */ "./resources/js/helpers/api.js");
/* harmony import */ var _components_appointment_vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../components/appointment.vue */ "./resources/js/components/appointment.vue");
/* harmony import */ var _components_carousel_vue__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../components/carousel.vue */ "./resources/js/components/carousel.vue");
/* harmony import */ var _helpers_transJs__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../helpers/transJs */ "./resources/js/helpers/transJs.js");
/* harmony import */ var _langs_weddingRings__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../../../langs/weddingRings */ "./resources/js/langs/weddingRings.js");
// import Auth from '../../store/auth'


 // import Flash from '../../helpers/flash'



/* harmony default export */ __webpack_exports__["default"] = ({
  el: '#weddingRingsShow',
  components: {
    Appointment: _components_appointment_vue__WEBPACK_IMPORTED_MODULE_1__["default"],
    Carousel: _components_carousel_vue__WEBPACK_IMPORTED_MODULE_2__["default"]
  },
  data: function data() {
    return {
      // auth: Auth.state,
      isRemoving: false,
      carouselState: false,
      appointmentState: false,
      title: '',
      langs: _langs_weddingRings__WEBPACK_IMPORTED_MODULE_4__["default"],
      weddingRing: '',
      hrefLangs: window.location.pathname.slice(0, 3),
      columns: ['unit_price', 'metal', 'ct', 'stock', 'name', 'description'],
      text: {
        weddingRing: 'Wedding Ring'
      },
      langHref: '/' + window.location.pathname.slice(1, 3),
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
  computed: {
    appointmentTitle: function appointmentTitle() {
      return Object(_helpers_transJs__WEBPACK_IMPORTED_MODULE_3__["transJs"])(this.weddingRing.wedding_rings[0].style, this.langs, this.locale) + ' ' + Object(_helpers_transJs__WEBPACK_IMPORTED_MODULE_3__["transJs"])(this.weddingRing.wedding_rings[0].metal, this.langs, this.locale) + Object(_helpers_transJs__WEBPACK_IMPORTED_MODULE_3__["transJs"])(this.text.weddingRing, this.langs, this.locale);
    },
    combinedUpperWeddingRings: function combinedUpperWeddingRings() {
      var obj = {
        images: [],
        video: []
      };

      for (var i = 0; this.weddingRing.wedding_rings[0].images.length > i; i++) {
        obj.images.push(this.weddingRing.wedding_rings[0].images[i]);
        console.log(obj);

        if (this.weddingRing.wedding_rings[1].images[i]) {
          obj.images.push(this.weddingRing.wedding_rings[1].images[i]);
        }
      }

      obj.video.push(this.weddingRing.wedding_rings[0].video);
      return obj;
    },
    combinedLowerWeddingRings: function combinedLowerWeddingRings() {
      var obj = [];

      if (this.customerItems.wedding_rings[0].invoices.length > 0) {
        for (var i = 0; this.customerItems.wedding_rings[0].invoices.length > i; i++) {
          if (this.customerItems.wedding_rings[0].invoices[i].inv_posts.length > 0) {
            if (this.customerItems.wedding_rings[0].invoices[i].inv_posts[0].postable_type == 'App/WeddingRing' && this.customerItems.wedding_rings[0].invoices[i].inv_posts[0].published != 0) {
              obj.push(this.customerItems.wedding_rings[0].invoices[i].inv_posts[0]);
              console.log(obj);
            }
          }
        }
      }

      return obj;
    },
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
    transJs: _helpers_transJs__WEBPACK_IMPORTED_MODULE_3__["transJs"]
  },
  methods: {
    fetchData: function fetchData() {
      var _this = this;

      Object(_helpers_api__WEBPACK_IMPORTED_MODULE_0__["get"])("/api/weddingRings/".concat(window.location.pathname.slice(18))).then(function (res) {
        _this.weddingRing = res.data.model;
        _this.customerItems = res.data.posts;
      });
    },
    transJsMet: function transJsMet(data, ori, langs) {
      return Object(_helpers_transJs__WEBPACK_IMPORTED_MODULE_3__["transJs"])(data, ori, langs);
    }
  }
});

/***/ }),

/***/ 2:
/*!****************************************!*\
  !*** multi ./resources/js/frontend.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/chillkwong/Dropbox/code/TD7/resources/js/frontend.js */"./resources/js/frontend.js");


/***/ })

/******/ });