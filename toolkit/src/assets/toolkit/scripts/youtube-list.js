'use strict';

var $ = require('jquery');
var Handlebars = require('handlebars');

function YoutubeList() {

	// Google API data
	this.requestOptions = null;
	this.apiKey = 'AIzaSyCrFnyIuEoH3xQSdo9PTFALctloubzPp1k';

	// UI Display templates
	this.videoListCompiled = null;
	this.videoLatestCompiled = null;
	this.videoErrorCompiled = null;
	this.videoListTemplate = '\
		<ul class="videos__recent-list"> \
			{{#each items}} \
			<li><a href="http://youtube.com/watch?v={{snippet.resourceId.videoId}}&list={{snippet.playlistId}}" target="_blank"><i class="icon icon--play icon--xs"></i>{{snippet.title}}</a></li> \
			{{/each}} \
		</ul> \
	';
	this.videoLatestTemplate = '\
		<img class="videos__latest-img" src="{{snippet.thumbnails.high.url}}" /> \
		<b class="videos__latest"> \
			<i class="icon icon--play icon--xs"></i> \
			Latest: {{snippet.title}} \
		</b> \
	';
	this.videoListErrorTemplate = '<p>Video list unavailable</p>';


	this.displayVideos = function(data) {
		var firstItem = data.items[0];
		console.log(data, firstItem);
		var videoLastestHTML = this.videoLatestCompiled(firstItem);
		var videoListHTML = this.videoListCompiled(data);
		$("#latest-video").html(videoLastestHTML);
		$("#videos-list").html(videoListHTML);
	}


	this.displayError = function(err) {
		console.error(err);
		$("#videos-list").html(this.videoListError);
	}


	this.initialize = function() {
		this.videoListCompiled = Handlebars.compile(this.videoListTemplate);
		this.videoLatestCompiled = Handlebars.compile(this.videoLatestTemplate);
		this.videoErrorCompiled = Handlebars.compile(this.videoListErrorTemplate);

		var ytl = $('#youtube-list');

		if (ytl.length > 0) {
			this.requestOptions = {
				key: this.apiKey,
				playlistId: ytl.attr('data-playlistId'),
				part: 'snippet',
				maxResults: 6,
			};
			this.loadVideos();
		} else {
			console.error('Could not load video player because #youtube-list was not found.');
		}
	};


	this.loadVideos = function() {
		var ytl = this;
		$.ajax('https://www.googleapis.com/youtube/v3/playlistItems', {
			method: 'GET',
			data: this.requestOptions
		}).done(function(data){
			ytl.displayVideos(data)
		}).fail(function(err) {
		    ytl.displayVideos(err)
		});
	}
}

module.exports = YoutubeList;
