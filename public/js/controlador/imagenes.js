
$(document).on("submit",".formarchivo",function(e){

    
        e.preventDefault();
       
        //$("#notificacion_resul_fci").html($("#cargador_empresa").html());  
         
        var formu=$(this);
        var nombreform=$(this).attr("id");
        var rs=false; //leccion 10
        alert(nombreform);
        //información del formulario
        var formData = new FormData($("#"+nombreform+"")[0]);

        //hacemos la petición ajax   
        $.ajax({
            url: "imagenes",  
            type: 'post',
     
            // Form data
            //datos del formulario
            data: formData,
            //necesario para subir archivos via ajax
            cache: false,
            contentType: false,
            processData: false,
            //mientras enviamos el archivo
            beforeSend: function(){
             
              $("#notificacion_resul_fci").html($("#cargador_empresa").html());                
            },
            //una vez finalizado correctamente
            success: function(data){
              
              $("#notificacion_resul_fci").html(data);
              /*$("#fotografia_usuario").attr('src', $("#fotografia_usuario").attr('src') + '?' + Math.random() );  

                 if(rs ){
                         $('#'+nombreform+'').trigger("reset");
                         mostrarseccion(seccion_sel);
                        }     */        
            },
            //si ha ocurrido un error
            error: function(data){
               alert("ha ocurrido un error") ;
                
            }
        });



});
