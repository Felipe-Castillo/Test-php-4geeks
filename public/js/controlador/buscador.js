
$(document).ready(function() { 

     $.ajax({
            async:true,   
            cache:false, 
            dataType: 'json',
            type: 'get',  
            url: 'cargarBanner',
            success: function(data){
                ajax_start();
              /*
                var k=0;
                var tipo=[];
        $(".banner").each(function(index) 
            {   
             
            tipo[k] = $(this).attr('id');
             
            k=k+1;

            });*/
            for(var i=0;i<data.banner.length;i++)
            {
                
                switch(data.banner[i].banner_type)
                {
                    case "encabezado":
                    $("#"+data.banner[i].banner_type+" img").attr('src',flagsUrl+"/"+data.banner[i].banner_image);
                    break;

                    case "bsq-superior":
                    $("#"+data.banner[i].banner_type+" img").attr('src',flagsUrl+"/"+data.banner[i].banner_image);
                    break;

                    case "bsq-inferior":
                    $("#"+data.banner[i].banner_type+" img").attr('src',flagsUrl+"/"+data.banner[i].banner_image);
                    break;
                }
              


            }

            },
            complete: function(response) {
           ajax_stop(); 
                },
            //si ha ocurrido un error
            error: function(data){
               alert("ha ocurrido un error") ;
                
            }
        });

$("#btnBuscar").on("click",function(e){
    
    e.preventDefault();

    var value=$("#ciudadesBar").children(":selected").attr("value");
   
    $("#inputBar").val(value);
    $('form#buscador').submit();
    


 });


$("#espe").change(function(){
    
    var value=$(this).children(":selected").attr("value");
    $('#searchSpecial').val(value);
    $('form#specialities').submit();
    


 });

$("#seleCiudad").change(function(){
    
    var value=$(this).children(":selected").attr("value");
    $('#ciudades').val(value);
    $('form#cities').submit();
    


 });

$("#seleEstado").change(function(){
    
    var value=$(this).children(":selected").attr("value");
    $('#estados').val(value);
    $('form#states').submit();
    


 });



$("#selecOrdena").change(function(){
    
    var value=$(this).children(":selected").attr("value");
    var id=$(this).children(":selected").attr("id");

    
    $('#orden').val(value);
    $('#ciudadAlf').val(value);


    if (id=='alfabeto') 
    {
    $('form#ordenar').attr('action',"/search_Alf");

    }else
    {
    $('form#ordenar').attr('action',"/search_val");
   
    }

    $('form#ordenar').submit();
    


 });


});

