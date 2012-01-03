// Very scratch-padish. Need to refactor big time.
(function() {
	var dom, engine;

	// enable syntax highlighting
	prettyPrint();

	dom = {
		articles: $('article'),
		languageHeadings: $('ul.nav h4'),
		snippets: $('ul.snippets li'),
		nav: $('.nav')
	};

	engine = {
		init: function() {
			this.accordion();
			this.clipboard();
		},

		// context = heading
		accordion: function(context) {
			dom.articles.children('ul').not('.snippets').hide();
			dom.snippets.hide();

			dom.articles.find('header').click(function() {
				var heading = $(this);
				
				dom.languageHeadings.removeClass('active');

				dom.nav.slideToggle(500);
				
				dom.snippets.hide();
				// hide other panels

				heading
					.parent('article')
					.siblings()
					.find('ul.snippets')
						.slideToggle(500);

			});

			dom.languageHeadings.click(function() {
				var heading = $(this),
					rel = heading[0].innerHTML.toLowerCase();

				dom.languageHeadings.removeClass('active');
				heading.addClass('active');
				
				dom.snippets
					.hide()
					.filter('.' + rel)
						.show();
			});
		},

		clipboard: function() {
			// Listen for "copy to clipboard" click
			$(document.body).on('dblclick', 'pre.prettyprint', function(e) {
				var snippet = $.trim( $(this).text() ),
					code = $(this);

				e.preventDefault();
				
				code.addClass('selectedCode');
				prompt("Press Control/Command + C To Copy", snippet);
				code.removeClass('selectedCode');

			});
		}

	};

	engine.init();



	function generateNoise(opacity, cb) {
		if ( !!!document.createElement('canvas').getContext ) {
			return false;
		}

		var canvas = document.createElement("canvas"),
		ctx = canvas.getContext('2d'),
		x, y,
		r, g, b,
		opacity = opacity || .2;

		canvas.width = 100;
		canvas.height = 100;

		ctx = canvas.getContext("2d");

		for ( x = 0; x < canvas.width; x++ ) {
		  for ( y = 0; y < canvas.height; y++ ) {
		     r = Math.floor( Math.random() * 80 );
		     g = Math.floor( Math.random() * 80 );
		     b = Math.floor( Math.random() * 80 );

		     ctx.fillStyle = "rgba(" + r + "," + g + "," + b + "," + opacity + ")";
		     ctx.fillRect(x, y, 1, 1);
		  }
		}
		cb( canvas.toDataURL("image/png") );
	}

		generateNoise(.3, function(data) {
			$('body').css('backgroundImage', 'url(' + data + ')');
		});	



})();

