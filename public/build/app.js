"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["app"],{

/***/ "./assets/app.js":
/*!***********************!*\
  !*** ./assets/app.js ***!
  \***********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _styles_app_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./styles/app.scss */ "./assets/styles/app.scss");
/* harmony import */ var _fortawesome_fontawesome_free_css_all_min_css__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @fortawesome/fontawesome-free/css/all.min.css */ "./node_modules/@fortawesome/fontawesome-free/css/all.min.css");
/* harmony import */ var _fortawesome_fontawesome_free_js_all_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @fortawesome/fontawesome-free/js/all.js */ "./node_modules/@fortawesome/fontawesome-free/js/all.js");
/* harmony import */ var _fortawesome_fontawesome_free_js_all_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_fortawesome_fontawesome_free_js_all_js__WEBPACK_IMPORTED_MODULE_2__);
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */

// import './bootstrap.js';




// BURGER
var burger = document.getElementById('burger');
var navMenu = document.querySelector('.nav_menu');
burger.addEventListener('click', function () {
  navMenu.classList.toggle('active');
});

// COPIER L'EMAIL
document.addEventListener("DOMContentLoaded", function () {
  var copyEmail = document.getElementById('copyEmail');
  copyEmail.addEventListener('click', function (e) {
    e.preventDefault();
    var email = this.getAttribute('data-email');

    // navigator.clipboard.writeText(email).then(() => {
    alert("Email copié : " + email);
    // }).catch(err => {
    //     console.error("Échec de la copie :", err);
    // });
  });
});

/***/ }),

/***/ "./assets/styles/app.scss":
/*!********************************!*\
  !*** ./assets/styles/app.scss ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_fortawesome_fontawesome-free_js_all_js-node_modules_fortawesome_fontawes-8e93d7"], () => (__webpack_exec__("./assets/app.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiYXBwLmpzIiwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7Ozs7O0FBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQzJCO0FBQzRCO0FBQ047O0FBRWpEO0FBQ0EsSUFBTUEsTUFBTSxHQUFHQyxRQUFRLENBQUNDLGNBQWMsQ0FBQyxRQUFRLENBQUM7QUFDaEQsSUFBTUMsT0FBTyxHQUFHRixRQUFRLENBQUNHLGFBQWEsQ0FBQyxXQUFXLENBQUM7QUFFbkRKLE1BQU0sQ0FBQ0ssZ0JBQWdCLENBQUMsT0FBTyxFQUFFLFlBQU07RUFDckNGLE9BQU8sQ0FBQ0csU0FBUyxDQUFDQyxNQUFNLENBQUMsUUFBUSxDQUFDO0FBQ3BDLENBQUMsQ0FBQzs7QUFFRjtBQUNBTixRQUFRLENBQUNJLGdCQUFnQixDQUFDLGtCQUFrQixFQUFFLFlBQVk7RUFDdEQsSUFBTUcsU0FBUyxHQUFHUCxRQUFRLENBQUNDLGNBQWMsQ0FBQyxXQUFXLENBQUM7RUFFdERNLFNBQVMsQ0FBQ0gsZ0JBQWdCLENBQUMsT0FBTyxFQUFFLFVBQVVJLENBQUMsRUFBRTtJQUM3Q0EsQ0FBQyxDQUFDQyxjQUFjLENBQUMsQ0FBQztJQUNsQixJQUFNQyxLQUFLLEdBQUcsSUFBSSxDQUFDQyxZQUFZLENBQUMsWUFBWSxDQUFDOztJQUU3QztJQUNJQyxLQUFLLENBQUMsZ0JBQWdCLEdBQUdGLEtBQUssQ0FBQztJQUNuQztJQUNBO0lBQ0E7RUFDSixDQUFDLENBQUM7QUFDTixDQUFDLENBQUM7Ozs7Ozs7Ozs7O0FDbENGIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2FwcC5qcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvc3R5bGVzL2FwcC5zY3NzPzhmNTkiXSwic291cmNlc0NvbnRlbnQiOlsiLypcbiAqIFdlbGNvbWUgdG8geW91ciBhcHAncyBtYWluIEphdmFTY3JpcHQgZmlsZSFcbiAqXG4gKiBUaGlzIGZpbGUgd2lsbCBiZSBpbmNsdWRlZCBvbnRvIHRoZSBwYWdlIHZpYSB0aGUgaW1wb3J0bWFwKCkgVHdpZyBmdW5jdGlvbixcbiAqIHdoaWNoIHNob3VsZCBhbHJlYWR5IGJlIGluIHlvdXIgYmFzZS5odG1sLnR3aWcuXG4gKi9cblxuLy8gaW1wb3J0ICcuL2Jvb3RzdHJhcC5qcyc7XG5pbXBvcnQgJy4vc3R5bGVzL2FwcC5zY3NzJztcbmltcG9ydCAnQGZvcnRhd2Vzb21lL2ZvbnRhd2Vzb21lLWZyZWUvY3NzL2FsbC5taW4uY3NzJztcbmltcG9ydCAnQGZvcnRhd2Vzb21lL2ZvbnRhd2Vzb21lLWZyZWUvanMvYWxsLmpzJztcblxuLy8gQlVSR0VSXG5jb25zdCBidXJnZXIgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnYnVyZ2VyJyk7XG5jb25zdCBuYXZNZW51ID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLm5hdl9tZW51Jyk7XG5cbmJ1cmdlci5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsICgpID0+IHtcbiAgbmF2TWVudS5jbGFzc0xpc3QudG9nZ2xlKCdhY3RpdmUnKTtcbn0pO1xuXG4vLyBDT1BJRVIgTCdFTUFJTFxuZG9jdW1lbnQuYWRkRXZlbnRMaXN0ZW5lcihcIkRPTUNvbnRlbnRMb2FkZWRcIiwgZnVuY3Rpb24gKCkge1xuICAgIGNvbnN0IGNvcHlFbWFpbCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdjb3B5RW1haWwnKTtcblxuICAgIGNvcHlFbWFpbC5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGZ1bmN0aW9uIChlKSB7XG4gICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICAgICAgY29uc3QgZW1haWwgPSB0aGlzLmdldEF0dHJpYnV0ZSgnZGF0YS1lbWFpbCcpO1xuXG4gICAgICAgIC8vIG5hdmlnYXRvci5jbGlwYm9hcmQud3JpdGVUZXh0KGVtYWlsKS50aGVuKCgpID0+IHtcbiAgICAgICAgICAgIGFsZXJ0KFwiRW1haWwgY29wacOpIDogXCIgKyBlbWFpbCk7ICAgIFxuICAgICAgICAvLyB9KS5jYXRjaChlcnIgPT4ge1xuICAgICAgICAvLyAgICAgY29uc29sZS5lcnJvcihcIsOJY2hlYyBkZSBsYSBjb3BpZSA6XCIsIGVycik7XG4gICAgICAgIC8vIH0pO1xuICAgIH0pO1xufSk7IiwiLy8gZXh0cmFjdGVkIGJ5IG1pbmktY3NzLWV4dHJhY3QtcGx1Z2luXG5leHBvcnQge307Il0sIm5hbWVzIjpbImJ1cmdlciIsImRvY3VtZW50IiwiZ2V0RWxlbWVudEJ5SWQiLCJuYXZNZW51IiwicXVlcnlTZWxlY3RvciIsImFkZEV2ZW50TGlzdGVuZXIiLCJjbGFzc0xpc3QiLCJ0b2dnbGUiLCJjb3B5RW1haWwiLCJlIiwicHJldmVudERlZmF1bHQiLCJlbWFpbCIsImdldEF0dHJpYnV0ZSIsImFsZXJ0Il0sInNvdXJjZVJvb3QiOiIifQ==