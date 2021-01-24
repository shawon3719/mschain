$(function() {

	// Get the form.
	var form = $('#contact-form');

	// Get the messages div.
	var formMessages = $('.form-messege');

	// Set up an event listener for the contact form.
	$(form).submit(function(e) {
		// Stop the browser from submitting the form.
		e.preventDefault();

		// Serialize the form data.
		var formData = $(form).serialize();

		// Submit the form using AJAX.
		$.ajax({
			type: 'POST',
			url: $(form).attr('action'),
			data: formData
		})
		.done(function(response) {
			// Make sure that the formMessages div has the 'success' class.
			$(formMessages).removeClass('error');
			$(formMessages).addClass('success');

			// Set the message text.
			// $(formMessages).text(response);

                // toast
                alertify.set('notifier','position', 'top-center');
                alertify.success('Message Sent Successfully!!');


			// Clear the form.
			$('#contact-form input,#contact-form textarea').val('');
            setTimeout(function(){
                window.location.reload(1);
            }, 5000);
		})
		.fail(function(data) {
			// Make sure that the formMessages div has the 'error' class.
			$(formMessages).removeClass('success');
			$(formMessages).addClass('error');
            alertify.set('notifier','position', 'top-center');


			// Set the message text.
			if (data.responseText !== '') {
				// $message = JSON.parse(data.responseText);
				// alert(data.responseText);
				// $text = $message.message;
                alertify.error('Sorry! Message not send. Please try again.');
                setTimeout(function(){
                    window.location.reload(1);
                }, 5000);
			} else {
                alertify.warning('Please Reload the page before send again');
                setTimeout(function(){
                    window.location.reload(1);
                }, 5000);
			}
		});
	});

});
