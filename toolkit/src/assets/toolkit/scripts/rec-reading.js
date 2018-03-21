'use strict';

var $ = require('jquery');
var _ = require('lodash');
var Handlebars = require('handlebars');
require('datejs');

function RecReading() {

	this.key = '02648d661f7f44dfba038f182e973f62';
	this.newsapi = null;
	this.limitTo = 0;

	this.data = {
		items: []
	};

	this.itemsTemplateStr = '\
		<ul> \
			{{#each items}} \
			<li><a href="{{url}}"> \
			  	<b class="reading__title">{{title}}</b> \
			  	<i class="reading__date-source">{{date}} | {{source}}</i> \
			</a></li> \
			{{/each}} \
		</ul> \
	';

	this.itemsErrorStr = '\
		<p> \
			Reading list could not be loaded. \
		</p> \
	';

	this.initialize = function() {
		var $list = $('#rr-list');
		this.limitTo = $list.attr('data-limit') ? $list.attr('data-limit') : 0;
		this.itemsTemplateCompiled = Handlebars.compile(this.itemsTemplateStr);
		this.itemsErrorCompiled = Handlebars.compile(this.itemsErrorStr);
		this.loadReadings();
	};

	this.loadReadings = function() {
		console.log('load readings');
		let root = this;
		$.get('https://bereans-readings.firebaseio.com/articles.json', function(data){
			let articles = [];
			for (let id in data) {
				let article = data[id];
				articles.push({
					id: id,
					title: article.title,
					author: article.author,
					source: article.source,
					url: article.url,
					date: Date.parse(article.date).toString('MMM d, yyyy'),
					dateTS: Date.parse(article.date).toString('s')
				})
			}
			let sortedArticles = _.orderBy(data, ['dateTS', 'title'], ['desc', 'asc']);
			root.displayReadings(sortedArticles);
		});

	}

	this.displayReadings = function(data) {
		this.data = {
			items: []
		};
		if (this.limitTo > 0) {
			for (var i = 0; i < this.limitTo; i++) {
				this.data.items.push(data[i]);
			}
		} else {
			this.data.items = data;
		}
		var itemsTemplate = this.itemsTemplateCompiled(this.data);
		$('#rr-list').html(itemsTemplate);
	}

	this.displayError = function(err) {
		console.error(err);
		var itemsErrorHTML = this.itemsErrorCompiled();
		$('#rr-list').html(itemsErrorHTML);
	}

}

module.exports = RecReading;
