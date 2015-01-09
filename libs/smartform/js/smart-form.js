
	$(function() {
		
				/* @custom validation method (smartCaptcha) 
				------------------------------------------------------------------ */
						
				$( "#smart-form" ).validate({
				
						/* @validation states + elements 
						------------------------------------------- */
						
						errorClass: "state-error",
						validClass: "state-success",
						errorElement: "em",
						
						/* @validation rules 
						------------------------------------------ */
							
						rules: {
								sendername: {
										required: true,
										minlength: 2
								},		
								senderemail: {
										required: true,
										email: true
								},								
								sendermessage: {
										required: true,
										minlength: 10
								}
						},
						
						/* @validation error messages 
						---------------------------------------------- */
							
						messages:{
								sendername: {
										required: 'Ingresa tu nombre',
										minlength: 'El nombre debe tener más de 2 caracteres'
								},				
								senderemail: {
										required: 'Ingresa tu email',
										email: 'El email ingresado no es válido'
								},														
								sendermessage: {
										required: 'Ingresa tu mensaje',
										minlength: 'El mensaje debe tener un minimo de 10 caracteres'
								}
						},

						/* @validation highlighting + error placement  
						---------------------------------------------------- */	
						
						highlight: function(element, errorClass, validClass) {
								$(element).closest('.field').addClass(errorClass).removeClass(validClass);
						},
						unhighlight: function(element, errorClass, validClass) {
								$(element).closest('.field').removeClass(errorClass).addClass(validClass);
						},
						errorPlacement: function(error, element) {
						   if (element.is(":radio") || element.is(":checkbox")) {
									element.closest('.option-group').after(error);
						   } else {
									error.insertAfter(element.parent());
						   }
						},
						
						/* @ajax form submition 
						---------------------------------------------------- */						
						submitHandler:function(form) {
							$(form).ajaxSubmit({
									target:'.result',		   
									beforeSubmit:function(){ 
											$('.form-footer').addClass('progress');
									},
									error:function(){
											$("div.form-msg").show().delay(7000).fadeOut();
											$('.form-footer').removeClass('progress');
									},
									 success:function(){
											$('.form-msg').show().delay(7000).fadeOut();
											$('.form-footer').removeClass('progress');
											$('.field').removeClass("state-error, state-success");
											$('#smart-form').resetForm();
									 }
							  });
						}
						
				});		
		
	});				
    