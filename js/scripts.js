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

			articles.on('click', 'h4 a', function(e) {
				var $this = $(this),
					href = $this.attr('href'),
					language = $this.text().toLowerCase(),
					relatedSnippets = $this.parents('.nav').siblings('.snippets'),
					target = relatedSnippets.find('.' + language),
					demoLink = $this.data('demo');

				e.preventDefault();

				relatedSnippets.find('li').hide();
				$this.parents('article').siblings().find('.snippets li').hide();

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
		

})();