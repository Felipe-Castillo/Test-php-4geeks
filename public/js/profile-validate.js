// Wait for the DOM to be ready
$(function() {
	$.validator.setDefaults({
       //ignore: []
 });
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("#profile_speciality").validate({
  	  ignore: [],
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      collegiate_number: "required",
      graduate_year: "required",
      speciality: "required"
      
    },
    // Specify validation error messages
    messages: {
      collegiate_number: "N&deg; Colegiado necesario",
      graduate_year: 'Egresado desde el ano necesario',
      speciality: 'Especialidad necesario'
    },
    errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
    },
	
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
  
    $("#profile_description").validate({
    // Specify validation rules
    ignore: [],
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      about: "required",
      languages:"required",
	   insurance: {
                required: 'One selection Mus.'
      }
      
    },
    // Specify validation error messages
    messages: {
      about: 'Acerca de necesario',
      languages: 'Seleccione al menos un idioma',
      insurance: 'Seguro necesario'
    },
    errorElement : 'div',
        errorPlacement: function(error, element) {
		   	  	if ( element.prop( "type" ) == "checkbox" ) {
								  $('.errorTxt6').append(error);
				} else {
		          var placement = $(element).data('error');
		          if (placement) {
		            $(placement).append(error)
		          } else {
		            error.insertAfter(element);
		          }
		     }
	
    },
	
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
  
 $("#profile_contact").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      about: "required",
      telephone: {
          minlength: 10
               
      },
      state: "required",
      cellphone: {
           
                minlength: 10
             
      },
      city: {
          required :true,
      },
      website: {
       
        url: true
      },
      address: "required",
      floor_office: "required",
      
    },
    // Specify validation error messages
    messages: {
      telephone: {
                              minlength : "Introduzca al menos 10 d&iacute;gitos.",
                
      },
      state: "Provincia necesario",
      cellphone: {
        
               minlength : "Introduzca al menos 10 d&iacute;gitos.",
             
      },
      city: "Ciudad necesario",
      website: {
               
                url: "Introduzca una direcci&oacute;n de sitio web v&aacute;lida"
      },
      address: "Direcci&oacute;n necesario",
      floor_office: "Piso, N&deg;Consultorio necesario",
      
    },
    errorElement : 'div',
        errorPlacement: function(error, element) {
          if ( element.prop( "type" ) === "checkbox" ) {
            error.insertAfter( element.parent( "label" ) );
      } else {
      
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
         } 
    },
  
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      //alert($("#profile_city").val())
      //alert($("#phone").val())
      form.submit();
    }
  });
  $("#profile_fees").validate({
  
    // Specify validation rules
    rules: {
      immediate_fee: "required",
      reservation_fee: "required",

    },
    // Specify validation error messages
    messages: {
      immediate_fee: 'Precio Consulta Express necesario',
      reservation_fee: 'Precio Consulta Programada necesario'
    },
    errorElement : 'div',
        errorPlacement: function(error, element) {
        	if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "label" ) );
			} else {
      
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
         } 
    },
	
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
    	//alert($("#profile_city").val())
      //alert("fdfhd");
      form.submit();
    }
  });
});