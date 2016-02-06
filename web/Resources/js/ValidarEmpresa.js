
 function ValidarEmpresa1(){
$('.nombreEmpresa').
  attr('data-bvalidator', 'required,required');
  
$('.direccion1Empresa').
  attr('data-bvalidator', 'required,required');  
  
//$('.direccion2Empresa').
//  attr('data-bvalidator', 'required,required');    
  
$('.ciudadEmpresa').
  attr('data-bvalidator', 'required,required');   
  
$('.provestadoEmpresa').
  attr('data-bvalidator', 'required,required');   
  
$('.codpostalEmpresa').
  attr('data-bvalidator', 'required,required');   
  
$('.nrcEmpresa').
  attr('data-bvalidator', 'required,required'); 
  
$('.nitEmpresa').
  attr('data-bvalidator', 'required,required');   
  
$('.giroEmpresa').
  attr('data-bvalidator', 'required,required');          


    //Opciones del validador
    var optionsRed = { 
        classNamePrefix: 'bvalidator_bootstraprt_', 
        lang: 'es'
    };
 
    //Validar el formulario
    $('form').bValidator(optionsRed);
    
	
 }	
	
