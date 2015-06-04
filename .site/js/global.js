// Home page closure
(function (window, document) {
	var timeDelay = 500, // ms
		cascadeDelay = 100,
		searchingTimeDelay = 2000,
		resultsTimeDelay = 1000;


	$('#find-study').click(function() {
		transitionTo($(this).parents('.transition'), '#find-searching', gotoFindFound, searchingTimeDelay);
	});
	function gotoFindFound() {
		transitionTo('#find-searching', '#find-found', gotoFindResults, resultsTimeDelay);
	}
	function gotoFindResults() {
		$('#find-found').addClass('transition-final');
		setTimeout(function() {
			gotoFillWell();
		}, timeDelay);
	}
	function gotoFillWell() {
		$('#results-recommend').addClass('show');
		setTimeout(function() {
			$('#results-recommend-well').addClass('show');
			setTimeout(function() {
				gotoCascade($('#results-recommend-well').children()[0], gotoFillOtherWell);
			}, cascadeDelay);
		}, cascadeDelay);
	}
	function gotoFillOtherWell() {
		$('#results-other').addClass('show');
		setTimeout(function() {
			$('#results-other-well').addClass('show');
			setTimeout(function() {
				gotoCascade($('#results-other-well').children()[0]);
			}, cascadeDelay);
		}, cascadeDelay);
	}
	function gotoCascade(element, callback) {
		if ($(element).length == 0) {
			if (callback)
				callback();
			return;
		}
		$(element).addClass('entry-transition-setup');
		setTimeout(function() {
			$(element).addClass('entry-transition-in');
			setTimeout(function() {
				$(element).children('.progress').removeClass('entry-transition-hold');
			}, cascadeDelay);
			gotoCascade($(element).next('.entry'), callback);
		}, cascadeDelay);
	}

	function transitionTo(elementOut, elementIn, callback, callbackDelay) {
		callbackDelay = callbackDelay || 0;

		$(elementOut).addClass('transition-out');
		$(elementIn).addClass('transition-setup');
		setTimeout(function() {
			$(elementIn).addClass('transition-in');
			$(elementOut).removeClass('transition-setup transition-out transition-in');

			setTimeout(function() {
				if (callback)
					callback();
			}, timeDelay + callbackDelay);
		}, timeDelay);
	}
} (window, document));
