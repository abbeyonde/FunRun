// script.js
$(document).ready(function () {
    $('.pricing-horizontal').click(function () {
      var targetId = $(this).data('target');
      $(targetId).collapse('toggle');
    });
  });