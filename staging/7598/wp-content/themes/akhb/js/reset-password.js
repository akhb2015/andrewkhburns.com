/**
 * Javascript file for the reset password page
 *
 * @author      Andy Burns
 * @copyright   2021
 */

jQuery(document).ready(function($) {
});

/* Validate the reset password form */
(function() {
	'use strict';

	window.addEventListener('load', function() {
		// Fetch all the forms we want to apply custom Bootstrap validation styles to
		var forms = document.getElementsByClassName('needs-validation');

		// Loop over them and prevent submission
		var validation = Array.prototype.filter.call(forms, function(form) {
			form.addEventListener('submit', function(event) {
				var password = document.getElementById('password');
				var confirm_password = document.getElementById('password-confirmation');

				if (password.value != confirm_password.value) {
					confirm_password.setCustomValidity('Passwords much match. Please re-enter your password.');
				} else {
					confirm_password.setCustomValidity('');
					confirm_password.validity.valid;
				}

				if (form.checkValidity() === false) {
					event.preventDefault();
					event.stopPropagation();
				}

				form.classList.add('was-validated');
			}, false);
		});
	}, false);
})();
