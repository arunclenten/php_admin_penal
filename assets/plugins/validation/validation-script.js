$.validator.setDefaults( {
			submitHandler: function () {
				alert( "submitted!" );
			}
		} );

		$( document ).ready( function () {

			$( "#jQueryValidationForm" ).validate( {
				rules: {
					companyname: "required",
					type: "required",
					// username: {
					// 	required: true,
					// 	minlength: 2
					// },
					// password: {
					// 	required: true,
					// 	minlength: 5
					// },
					// confirm_password: {
					// 	required: true,
					// 	minlength: 5,
					// 	equalTo: "#input38"
					// },
					// email: {
					// 	required: true,
					// 	email: true
					// },
                    regdate: "required",
					cin: "required",
                    address: "required",
					propertiesname: "required",
					agree: "required"
				},
				messages: {
					companyname: "Please enter your company name",
					type: "Please enter your type",
					// username: {
					// 	required: "Please enter a username",
					// 	minlength: "Your username must consist of at least 2 characters"
					// },
					// password: {
					// 	required: "Please provide a password",
					// 	minlength: "Your password must be at least 5 characters long"
					// },
					// confirm_password: {
					// 	required: "Please provide a password",
					// 	minlength: "Your password must be at least 5 characters long",
					// 	equalTo: "Please enter the same password as above"
					// },
                    regdate: "Please enter a Register number",
                    cin: "Please enter CIN number",
                    address: "Please type your message",
					propertiesname: "Please enter your propertiesname",
					agree: "Please accept our policy"
				},
			
			} );

			

		} );