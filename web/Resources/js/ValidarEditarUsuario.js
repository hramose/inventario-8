
 function ValidarEditarUsuario1(){
$('.nombresPersona').
  attr('data-bvalidator', 'required,required');
  
//$('.apellidosPersona').
//  attr('data-bvalidator', 'required,required');  
//  
//$('.correoPersona').
//  attr('data-bvalidator', 'email,required,required');  
//
//$('.celularPersona').
//  attr('data-bvalidator', 'required,required'); 
//
//$('.fijoPersona').
//  attr('data-bvalidator', 'required,required'); 
//
//$('.direccionPersona').
//        attr('data-bvalidator', 'required,required');
//
//$('.nombreUsuario').
//        attr('data-bvalidator', 'required,required');
//
//$('.firstPassword').
//        attr('data-bvalidator', 'required,required');	
//
//$('.secondPassword').
//  attr('data-bvalidator', 'required,required');  
//  
//$('.roles').
//  attr('data-bvalidator','required,required');    
//  
//
//$('.fotoUsuario').
//  attr('data-bvalidator', 'extension[jpg:png],required'); 
  

    //Opciones del validador
    var optionsRed = { 
        classNamePrefix: 'bvalidator_bootstraprt_', 
        lang: 'es'
    };
 
    //Validar el formulario
    $('form').bValidator(optionsRed);
    
	
 }	
	
