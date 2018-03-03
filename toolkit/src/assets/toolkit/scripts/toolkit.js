/**
 * Toolkit JavaScript
 */

'use strict';

var $ = require('jquery');
var Handlebars = require('handlebars');
var CustomForm = require('./custom-form.js');
var Blurrable = require('./blurrable.js');
var YoutubeList = require('./youtube-list.js');
var RecReading = require('./rec-reading.js');

$(function() {
  let cf = new CustomForm();
  cf.initialize();
  let ytl = new YoutubeList();
  ytl.initialize();
  let rr = new RecReading();
  rr.initialize();
  // let blrbl = new Blurrable();
  // blrbl.initialize();
});
