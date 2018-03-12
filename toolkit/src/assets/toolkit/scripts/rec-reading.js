'use strict';

var $ = require('jquery');
var Handlebars = require('handlebars');
require('datejs');

function RecReading() {

	this.key = '02648d661f7f44dfba038f182e973f62';
	this.newsapi = null;

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
		this.itemsTemplateCompiled = Handlebars.compile(this.itemsTemplateStr);
		this.itemsErrorCompiled = Handlebars.compile(this.itemsErrorStr);
		this.loadReadings();
	};

	this.loadReadings = function() {
		console.log('load readings');
		let root = this;
		$.get('https://bereans-readings.firebaseio.com/articles.json', function(data){
			let articles = [];
			let i = 0;
			for (let id in data) {
				let article = data[id];
				articles.push({
					id: id,
					title: article.title,
					author: article.author,
					source: article.source,
					url: article.url,
					date: Date.parse(article.date).toString('MMM d, yyyy'),
				})
				i = i + 1;
				if (i === 5) {
					break;
				}
			}
			root.displayReadings({ items: articles });
		});

	}

	this.displayReadings = function(data) {
		console.table(data.items);
		var itemsTemplate = this.itemsTemplateCompiled(data);
		$('#rr-list').html(itemsTemplate);
	}

	this.displayError = function(err) {
		console.error(err);
		var itemsErrorHTML = this.itemsErrorCompiled();
		$('#rr-list').html(itemsErrorHTML);
	}

}

module.exports = RecReading;
