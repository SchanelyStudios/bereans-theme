'use strict';

var $ = require('jquery');

function Blurrable() {
  this.initialize = function() {
    $(".blurrable").each(function(i,o){
      let $this = $(o);
      let $box = $this.find(".blurrable__box");
      let $copy = $box.clone();
      let $layover = $this.find(".blurrable__layover");
      let $blur = $("<div/>");
      $box.css("min-height", $layover.outerHeight());
      $copy.removeClass("blurrable__box")
        .addClass("blurrable__box--copy")
        .height($box.outerHeight())
        .width($box.width());
      $blur.html($copy)
        .addClass("blurrable__blur")
        .height($layover.outerHeight());
      $this.append($blur);
    });
  };
}

module.exports = Blurrable;
