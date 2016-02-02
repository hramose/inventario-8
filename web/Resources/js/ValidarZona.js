
 function ValidarZona1(){
$('.nombreZona').
  attr('data-bvalidator', 'required,required');
  
$('.aliasZona').
  attr('data-bvalidator', 'required,required');  
  
$('.idSucursal').
  attr('data-bvalidator', 'required,required');    
  
//$('.descripcionZona').
//  attr('data-bvalidator', 'required,required');    



    //Opciones del validador
    var optionsRed = { 
        classNamePrefix: 'bvalidator_bootstraprt_', 
        lang: 'es'
    };
 
    //Validar el formulario
    $('form').bValidator(optionsRed);
    
	
 }	
	
