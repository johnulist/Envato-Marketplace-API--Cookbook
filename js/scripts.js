// Very scratch-padish. Need to refactor big time.
(function() {
	var dom, engine;

	dom = {
		languageHeadings: $('ul.nav h4 a'),
		snippets: $('ul.snippets li'),
		articles: 'article'
	};

	engine = {
		init: function() {
			this.codeView();
			this.clipboard();
		},

		codeView: function() {
			var template = $('#template').html(),
				articles = $(dom.articles);
				console.log(articles);

			articles.on('click', 'h4 a', function(e) {
				var $this = $(this),
					href = $this.attr('href'),
					language = $this.text().toLowerCase(),
					relatedSnippets = $this.parents('.nav').siblings('.snippets'),
					target = relatedSnippets.find('.' + language),
					demoLink = $this.data('demo');

				e.preventDefault();

				relatedSnippets.find('li').hide();

				articles.find('.nav li').removeClass('active');
				$this.parents('li').addClass('active');

				// Already available
				if ( target[0] ) {
					target.show();
					return;
				}
					
				// Otherwise, get Gist...
				$this.addClass('fetching');
				$.post('functions.php', {href: href}, function(code) {
					relatedSnippets.append(
						template
							.replace(/{{language}}/, language)
							.replace(/{{code}}/, code)
							.replace(/{{gistID}}/, /raw\/(\d+)/.exec(href)[1])
							.replace(/{{demoLink}}/, demoLink)
					);

					if ( !demoLink ) {
						relatedSnippets.find('.demo').remove();
					}

					// enable syntax highlighting
					prettyPrint();

					$this.removeClass('fetching');
				});
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



	// temporary
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
			$(document.body).css('backgroundImage', 'url(' + data + ')');
		});	

})();