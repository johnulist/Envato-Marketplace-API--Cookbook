(function() {
	var dom, engine;

	// enable syntax highlighting
	prettyPrint();

	engine = {
		init: function() {
			this.accordion();
			this.clipboard();
		},

		// context = heading
		accordion: function(context) {
			$('article ul').hide();

			$('article header').click(function() {
				var heading = $(this);
				
				// hide other panels
				heading.parent('article').siblings().find('ul').slideUp(500);

				// show example unordered list
				heading.next('ul').find('li').children().not('h4').hide();
				heading.next('ul').slideToggle(500);

				$('article').find('h4').removeClass('actives noBorder');

			});

			$('h4').click(function() {
				var heading = $(this);

				heading.parent().siblings().find('h4').removeClass('actives').removeClass('noBorder');

				heading.toggleClass('actives');

				heading.parent().siblings().children().not('h4').slideUp(400);


				
				heading.siblings().slideToggle(500).end().toggleClass('noBorder');
			


				
			}).siblings().hide();
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

