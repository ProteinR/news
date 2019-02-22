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

/***/ "./resources/js/register.js":
/*!**********************************!*\
  !*** ./resources/js/register.js ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// import News from './components/News.vue';
var _register = new Vue({
  el: '#register',
  data: {
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    registerResponse: ''
  },
  methods: {
    register: function register() {
      event.preventDefault();
      console.log(this.name);
      axios.post('/api/auth/account', {
        "name": this.name,
        "email": this.email,
        "password": this.password,
        "password_confirmation": this.password_confirmation
      }).then(function (response) {
        _register.registerResponse = response.data;

        if (response.data.message == 'success') {
          swal({
            title: "Успех!",
            text: "Вы успешно зарегистрировались! Вы будете перенаправлены на страницу входа через" + " несколько секунд...",
            icon: "success",
            button: "Aww yiss!",
            timer: 3000
          });
          setTimeout('location="/login";', 3000);
        }

        console.log(_register.registerResponse);
      });
    },
    login: function login() {
      event.preventDefault();
      console.log(this.email);
      console.log(this.password);
      axios.post('/api/auth/token', {
        "email": this.email,
        "password": this.password
      }).then(function (response) {
        _register.registerResponse = response.data;

        if (response.data.message == 'Authorization Successful!') {
          swal({
            title: "Успех!",
            text: "Вы вошли! Вы будете перенаправлены на страницу входа через" + " несколько секунд...",
            icon: "success",
            button: "Aww yiss!",
            timer: 3000
          });
          setTimeout('location="/";', 3000);
        } // console.log(register.registerResponse);

      });
    }
  },
  components: {},
  created: function created() {// console.log('on');
  }
});

/***/ }),

/***/ 3:
/*!****************************************!*\
  !*** multi ./resources/js/register.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /var/www/html/resources/js/register.js */"./resources/js/register.js");


/***/ })

/******/ });