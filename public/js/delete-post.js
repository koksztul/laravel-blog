/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*************************************!*\
  !*** ./resources/js/delete-post.js ***!
  \*************************************/
$(function () {
  $('.delete').click(function () {
    Swal.fire({
      title: 'Are you sure?',
      text: 'You will not be able to recover this post!',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'No, keep it'
    }).then(function (result) {
      if (result.isConfirmed) {
        $('#delete-post-form').submit();
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        Swal.fire('Cancelled', 'Your post is safe :)', 'error');
      }
    });
  });
});
/******/ })()
;