$(document).ready(function () {
	$(function () {
		  $('[data-toggle="tooltip"]').tooltip()
		});

		$("#update-info-btn").on('click', function () {
		  var form_data       = new FormData();
	      form_data.append('firstName', $("#firstName").val());
	      form_data.append('lastName', $("#lastName").val());
		      $.ajax({
		        url: 'ajax/update-user.php',
		        data: form_data,
		        contentType: false,
		        cache: false,
		        processData: false,
		        method: 'POST',
		        success: function(data) {
		            if (data == 'success') {
		                toastr.success('Profile Updated', 'Success Alert', {timeOut: 3000});
		            } else {
		                toastr.error('Profile Not Updated', 'Inconceivable!', {timeOut: 3000});
		            }
		        }
		    });
		});

		$("#update-pwd-btn").on('click', function () {
			var form_data       = new FormData();
	        form_data.append('old-password', $("#change-password").val());
	        form_data.append('new-password', $("#new-password").val());
	        form_data.append('retype-password', $("#retype-password").val());
		      $.ajax({
		        url: 'ajax/update-user.php',
		        data: form_data,
		        contentType: false,
		        cache: false,
		        processData: false,
		        method: 'POST',
		        success: function(data) {
		            if (data == 'success') {
		                toastr.success('Profile Updated', 'Success Alert', {timeOut: 3000});
		            } else if(data == 'invalid') {
		            	toastr.error('Invalid user password', 'Inconceivable!', {timeOut: 3000});
		            } else if(data == 'empty') {
		            	toastr.error('Please provide password', 'Inconceivable!', {timeOut: 3000});
		            } else if(data == 'mismatch') {
		            	toastr.error('Passwords do not match', 'Inconceivable!', {timeOut: 3000});
		            } else {
		                toastr.error('Profile Not Updated', 'Inconceivable!', {timeOut: 3000});
		            }
		        }
		    });
		});
});