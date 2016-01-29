
 function ValidarUsuario1(){
$('.nombresPersona').
  attr('data-bvalidator', 'required,required');
  
$('.apellidosPersona').
  attr('data-bvalidator', 'required,required');  
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
$('.nombreUsuario').
       attr('data-bvalidator', 'required,required');
//
$('.firstPassword').
       attr('data-bvalidator', 'required,required');	
//
//$('.secondPassword').
//  attr('data-bvalidator', 'required,required');  
//  
$('.roles').
  attr('data-bvalidator','required,required');    
//  
//
$('.fotoUsuario').
  attr('data-bvalidator', 'extension[jpg:png],required'); 


$('#usuario_sistema_password_second').
        attr('data-bvalidator', 'equalto[usuario_sistema_password_first],required,required');
	
$('#usuario_sistema_password_second').
        attr('data-bvalidator-msg', 'Las contraseñas deben coincidir, vuelva a digitarla');        
  

    //Opciones del validador
    var optionsRed = { 
        classNamePrefix: 'bvalidator_bootstraprt_', 
        lang: 'es'
    };
 
    //Validar el formulario
    $('form').bValidator(optionsRed);
    
	
 }	
	
