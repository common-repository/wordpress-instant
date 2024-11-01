jQuery(document).ready(function($) {
	// attach to the searchbox
	var WPInstant = {
		http: null,
		last_query: null,
		load: $('.wpinstant-load'),
		
		init: function() {
			$(".wpinstant,input[name='s']").keyup(function(e) {
			
				e.preventDefault();
				
				// query
				var q = $.trim($(this).val());

				if(q.length == 0) {
					$('.wpinstant-results').html('');
					return false;
				}
					
				if(q.length < 2 || WPInstant.last_query == q)
					return false;
					
				$(WPInstant.load).show();
				
				// cancel running requests
				if(WPInstant.http) WPInstant.http.abort();

				WPInstant.http = $.get('./?wpinstant=1&s=' + q, function(data) {
					WPInstant.last_query = q;
					$(WPInstant.load).hide();
					$('.wpinstant-results').html(data);
				});

			});
		} // init
	};
	
	WPInstant.init();
});