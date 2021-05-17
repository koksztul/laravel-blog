/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************************!*\
  !*** ./resources/js/delete-comnt.js ***!
  \**************************************/
$(function () {
  $('.delete').click(function () {
    var _this = this;

    Swal.fire({
      title: 'Are you sure that you want to remove this comment?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'No, keep it'
    }).then(function (result) {
      var $this = $(_this);

      if (result.value) {
        $.ajax({
          method: "DELETE",
          url: $(_this).data("url"),
          data: {
            "_token": $this.closest(".action").find("input[type=hidden]").val()
          }
        }).done(function (data) {
          $this.closest(".card").fadeOut(500);
          var count = parseInt($("#com_count").text());
          count--;
          $("#com_count").text(count).fadeOut(500);
        }).fail(function (data) {
          Swal.fire('Oops...', data.responseJSON.message, 'error');
        });
      }
    });
  });
});
/******/ })()
;