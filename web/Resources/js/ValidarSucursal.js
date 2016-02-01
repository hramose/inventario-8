
 function ValidarSucursal1(){
$('.nombreSucursal').
  attr('data-bvalidator', 'required,required');
  
$('.aliasSucursal').
  attr('data-bvalidator', 'required,required');  
  
$('.configuracionSucursal').
  attr('data-bvalidator', 'required,required');    



    //Opciones del validador
    var optionsRed = { 
        classNamePrefix: 'bvalidator_bootstraprt_', 
        lang: 'es'
    };
 
    //Validar el formulario
    $('form').bValidator(optionsRed);
    
	
 }	
	
