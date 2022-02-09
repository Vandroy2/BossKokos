/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*****************************************!*\
  !*** ./resources/adminAssets/js/app.js ***!
  \*****************************************/
jQuery(window).on("load", function () {
  if ($("#input-images").length) {
    $("#input-images").fileinput({
      language: 'ru',
      showUpload: false,
      initialPreview: $("#input-images").data('img'),
      initialPreviewAsData: true,
      // identify if you are sending preview data only and not the raw markup
      initialPreviewFileType: 'image' // image is the default and can be overridden in config below

    });
  }
});
/******/ })()
;
//# sourceMappingURL=app.js.map