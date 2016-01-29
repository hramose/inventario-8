
 function ValidarCatProducto1(){
$('.nombreCatProd').
  attr('data-bvalidator', 'required,required');
  
//$('.descripcionCatProd').
//  attr('data-bvalidator', 'required,required');
  
    //Opciones del validador
    var optionsRed = { 
        classNamePrefix: 'bvalidator_bootstraprt_', 
        lang: 'es'
    };
 
    //Validar el formulario
    $('form').bValidator(optionsRed);
    
	
 }	
	
