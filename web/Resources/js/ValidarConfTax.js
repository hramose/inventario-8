
 function ValidarConfTax1(){
$('.nombreTax').
  attr('data-bvalidator', 'required,required');
  
$('.numeroRegistroTax').
  attr('data-bvalidator', 'required,required');
  
$('.porcentajeTax').
  attr('data-bvalidator', 'required,required');
  
  
    //Opciones del validador
    var optionsRed = { 
        classNamePrefix: 'bvalidator_bootstraprt_', 
        lang: 'es'
    };
 
    //Validar el formulario
    $('form').bValidator(optionsRed);
    
	
 }	
	
