'use strict';

var $ = require('jquery');
var Handlebars = require('handlebars');

function RecReading() {

	this.key = '02648d661f7f44dfba038f182e973f62';
	this.newsapi = null;

	this.data = {
		items: [
			{
				title: 'Lorem Ipsum Dolor Sit Galopogos',
				date: 'Jun 23, 2017',
				source: 'Washington Post',
				url: 'http://example.com/1'
			},
			{
				title: 'Amet Hipsum Voluptum it Granium',
				date: 'Jun 23, 2017',
				source: 'Washington Post',
				url: 'http://example.com/2'
			},
			{
				title: 'Praesent faucibus lectus sit amet sollicitudin venenatis',
				date: 'Jun 23, 2017',
				source: 'Washington Post',
				url: 'http://example.com/3'
			},
			{
				title: 'Quisque accumsan lectus ut dolor fermentum facilisis vel venenatis dui',
				date: 'Jun 23, 2017',
				source: 'Washington Post',
				url: 'http://example.com/4'
			},
		]
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
		console.log('init rr');
		console.log(this.itemsTemplateStr);
		this.itemsTemplateCompiled = Handlebars.compile(this.itemsTemplateStr);
		console.log(this.itemsErrorStr);
		this.itemsErrorCompiled = Handlebars.compile(this.itemsErrorStr);
		this.loadReadings();
	};

	this.loadReadings = function() {
		console.log('load readings');
		var data = this.data;
		this.displayReadings(data);
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
