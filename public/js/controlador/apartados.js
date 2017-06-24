$(document).ready(function() { 


var url=$("#url").val();


$.ajax({
            async:true,   
            cache:false, 
            dataType: 'json',
            type: 'get',  
            url: url,
             beforeSend: function(){
              ajax_start(); 
              $.ajax({
            async:true,   
            cache:false, 
            dataType: 'json',
            type: 'get',  
            url: 'cargarBanner',
            success: function(data){
              
            for(var i=0;i<data.banner.length;i++)
            {
                
                switch(data.banner[i].banner_type)
                {
                    case "sobre-nosotros":
                    $("#"+data.banner[i].banner_type+" img").attr('src',flagsUrl+"/"+data.banner[i].banner_image);
                    break;

                    case "terminos-legales":
                    $("#"+data.banner[i].banner_type+" img").attr('src',flagsUrl+"/"+data.banner[i].banner_image);
                    break;

                    case "contacto":
                    $("#"+data.banner[i].banner_type+" img").attr('src',flagsUrl+"/"+data.banner[i].banner_image);
                    break;
                }
              


            }
            }
            //si ha ocurrido un error
           
        });              
            },
            success: function(data){
                $(".contenido").css("text-align", "initial");

              $(".contenido").html(data.page.content);
              
            },complete: function(response) {
            
                ajax_stop(); 
                }
            //si ha ocurrido un error
            
        });

});