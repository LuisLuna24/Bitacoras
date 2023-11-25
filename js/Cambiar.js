$(document).ready(function() { 
    $('.Bienbenida_Boton').on('click','#Singin_up', function(e){
        e.preventDefault();
        $(this).closest('.Seccion_Contenedor').find('.Longin').slideToggle(600,function(i){
            $('.Pregunta').html('¿Ya tienes cuenta? <span><a class="Respuesta" href="#" id="Singup_in">Iniciar Sesión</a></span>');
        });
        $(this).closest('.Seccion_Contenedor').find('.Longup').slideToggle({direction: "right",duration: 10,easing:'linear'},'slow');
    });
    $('.Seccion_Contenedor').on('click','#Singup_in',function(e){
        e.preventDefault();
        $(this).closest('.Seccion_Contenedor').find('.Longin').slideToggle({direction: "left",duration: 10,easing:'linear'},'slow');
        $(this).closest('.Seccion_Contenedor').find('.Longup').slideToggle(600,function(r){
            $('.Pregunta').html('¿No tienes cuenta? <span><a class="Respuesta" href="#" id="Singin_up">Regístrate</a></span>');
        });
        
    });
 });