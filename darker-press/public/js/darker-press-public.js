(function ($) {
	'use strict';

	$(window).on('load', function () {
		const checkbox = document.getElementById('dark-checkbox');
		const key = 'dark-mode-enabled';

		// Create a new instance of Darkmode
		const darkmode = new Darkmode({
			bottom: '32px',
			right: '32px',
			label: '🌓',
			time: '0.5s',
			saveInCookies: true,
			autoMatchOsTheme: true,
			// Add custom functions to be called when dark mode is enabled/disabled
			onToggle: function (isDark) {
				if (isDark) {
					localStorage.setItem(key, true);
				} else {
					localStorage.setItem(key, false);
				}
			},
		});

		let darkModeEnabled = localStorage.getItem(key) === 'true';
		if (darkModeEnabled) {
			darkmode.toggle();
		}

		// If the checkbox is checked, enable dark mode
		if (checkbox) {
			checkbox.addEventListener('change', () => {
				if (checkbox.checked) {
					darkmode.toggle();
				} else {
					darkmode.toggle();
				}
			});
		}
	});

	function darkModeStatus() {

		// Get the checkbox element
		const checkbox = document.getElementById('dark-checkbox');

		// Check if the key 'darkmode' exists in local storage
		if (localStorage.getItem('darkmode')) {
			// If it exists, set the checkbox state based on the value
			checkbox.checked = localStorage.getItem('darkmode') === 'true';
		} else {
			// If it doesn't exist, set the checkbox state to unchecked
			checkbox.checked = false;
		}

		// Add an event listener to the checkbox
		checkbox.addEventListener('change', function () {
			// Update the value of the 'darkmode' key in local storage
			localStorage.setItem('darkmode', this.checked);
		});

	}

	darkModeStatus();

})(jQuery);
