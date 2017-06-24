var params={"id":$("#idUser").val()};

$(document).ready(function(){

 $.ajax({
            async:true,   
            cache:false, 
            dataType: 'json',
            type: 'get',  
            url: '/getOpiniones',
            data:params,
            success: function(data)
            {

            if (data.success==true) 
            {   $(".picture-user").attr('src',"");
                if (data.user[0].profile_pic!=null)
                {
                  $(".picture-user").attr('src',flagsUrl+"/"+data.user[0].profile_pic);  
              }else
              {
                flagsUrl = "{{asset('/img/default.png')}}";
                $(".picture-user").attr('src',flagsUrl2);  

              }
                $("#idDoctor").val(data.user[0].doctorId);
                $(".nombre").html(data.user[0].name);
                $(".fecha").html(moment(data.user[0].slot_date).format('LL'));
                $(".hora").html(data.user[0].inicio+" - "+data.user[0].fin);
            
    
            }
     

            
            },
            
            error: function(data){
               alert("ha ocurrido un error") ;
                
            }
        });

$.ajax({
            async:true,   
            cache:false, 
            dataType: 'json',
            type: 'get',  
            url: 'getDisponibilidadUser',
            data:params,
            success: function(data)
            {
            if (data.success==true)
            {


            myArray= new Array(data.disponibilidad.length);
            arrayDates=[];
            var horas="";
            for(var i=0;i<data.disponibilidad.length;i++)
            {
             
                myArray[i]=data.disponibilidad[i].slot_date;
            }

            
            
           var array=$( "body" ).data("array",myArray);
           $('#calendar').fullCalendar({
                    height: 500,
                    dayClick: function() {
                   
                    var params={"id":$("#idUser").val(),"fecha":$(this).attr("data-date")};
                    $.ajax({
                    async:true,   
                    cache:false, 
                    dataType: 'json',
                    type: 'get',  
                    url: '/getDisponibleUserId',
                    data:params,
                    success: function(data)
                    {
                    
                   
                    var date="";
                    var li="";
                    var contenido="";
                    $("#consulta").html(" ");
                    for(var i=0;i<data.horarios.length;i++)
                    {
                      date="<li>"+moment(data.horarios[i].slot_date).format('LL')+"</li>";
                      li=li+"<li data-id=\""+data.horarios[i].id+"\" data-idReserva=\""+data.horarios[i].idRe+"\"><a href=\"#modal_reservation2\"  >"+data.horarios[i].inicio+"-"+data.horarios[i].fin+"<i class=\"material-icons\">play_arrow</i></a></li>";
                     
                    }
                    contenido=date+li;


                    $("#consulta").append(contenido);


                        
                  
                
                        },
            
            error: function(data){
               alert("ha ocurrido un error") ;
                
            }
        });
                    
                     //console.log($( "body" ).data("array"));
                    
                    },
                    dayRender: function (date, cell) {
        
                   myArray.forEach(function (item) {
        


        if (date.format()==item) 
        {
            cell.css("background-color", "green");
            
        }
             });
                                    
                    }
                    
                });


       }else
       {
 $('#calendar').fullCalendar({
                    height: 500,
                    dayClick: function() 
                    {
                    
                    },
                    dayRender: function (date, cell) {
                        
                    }
                    
                });
       }

       
            
            },
            
            error: function(data){
               alert("ha ocurrido un error") ;
                
            }
        });


$("#consulta").on("click","li",function(){

       
        var params={slot_id:$(this).attr("data-id")};
        $("#cancelarR").val($(this).attr("data-idreserva"));
        $("#cancelarSlot").val($(this).attr("data-id"));

        $.ajax({
            async:true,   
            cache:false, 
            dataType: 'json',
            type: 'get',  
            url: 'getUserDoctor',
            data:params,
            success: function(data)
            {

            if (data.success==true) 
            {   $(".picture-user").attr('src',"");
                if (data.user[0].profile_pic!=null)
                {
                  $(".picture-user").attr('src',flagsUrl+"/"+data.user[0].profile_pic);  
              }else
              {
                flagsUrl = "{{asset('/img/default.png')}}";
                $(".picture-user").attr('src',flagsUrl2);  

              }
                $("#idDoctor").val(data.user[0].doctorId);
                $(".nombre").html(data.user[0].name);
                $(".fecha").html(moment(data.user[0].slot_date).format('LL'));
                $(".hora").html(data.user[0].inicio+" - "+data.user[0].fin);
            
    
            }
     

            
            },
            
            error: function(data){
               alert("ha ocurrido un error") ;
                
            }
        });
}) 




$(".eliminarR ").on("click",function(){
var params={slot_id:$('#cancelarSlot').val(),
            reserva_id:$('#cancelarR').val(),
            _token:$('meta[name="csrf-token"]').attr('content')
}
    $.ajax({
            async:true,   
            cache:false, 
            dataType: 'json',
            type: 'post',  
            url: 'elimReserva',
            data:params,
            success: function(data)
            {

            if (data.success==true) 
            {  
            alert("Reserva eliminada exitosamente");
            location.reload(true);
    
            }else{
               alert("ha ocurrido un error") ;  
            }
     

            
            },
            
            error: function(data){
               alert("ha ocurrido un error") ;
                
            }
        });
})


$('#GuardarOp').click(function(){
        var texto = $('#textarea1').val();
        var puntaje = 0;
        $("#estrellas img").each(function (index)
        {
            src = $(this).attr('src');
            if (src==flagsUrl3+'/estrellap_sel.png'){
                puntaje = puntaje + 1;
            }
        });


        if (validar_ob(texto)==false){
           alert("Debe escribir una opinion");
        }else{
            var div = "";
            var params = {
                idDoctor: $('#idDoctor').val(),
                texto: texto,
                idusuario: $('#idUser').val(),
                puntaje: puntaje
            }

            $.ajax({
                async:true,
                cache:false,
                dataType: 'json',
                type: 'get',
                url: '/incOpinion',
                data: params,
                success:  function(data){
                        if (data.success==true){
                           alert("Valoracion agregada correctamente");
                        }else
                        {
                        console.log("Ha ocurrido un error");  
                        }
                },
                beforeSend:function(){},
                error:function(objXMLHttpRequest){}
            });

        }
    });

});

function e_click(id){
        for(i=1;i<6;i++){
            $('#E'+i).data('seleccion','');
            $('#E'+i).attr('src',flagsUrl3+'/estrellap.png');
        }
        for(i=1;i<=id;i++){
            $('#E'+i).attr('src',flagsUrl3+'/estrellap_sel.png');
            $('#E'+i).data('seleccion','1');
        }

    }


 function e_out(id){
        var numero = parseInt($('#E'+id).data('posicion'));
        var eclick = 0;
        for (var i = 1; i < 6; i++){
            if ($('#E'+i).data('seleccion')=='1'){
                $('#E'+i).attr('src',flagsUrl3+'/estrellap_sel.png');
            }else{
                $('#E'+i).attr('src',flagsUrl3+'/estrellap.png');
            }
        }
    }

    function e_click(id){
        for(i=1;i<6;i++){
            $('#E'+i).data('seleccion','');
            $('#E'+i).attr('src',flagsUrl3+'/estrellap.png');
        }
        for(i=1;i<=id;i++){
            $('#E'+i).attr('src',flagsUrl3+'/estrellap_sel.png');
            $('#E'+i).data('seleccion','1');
        }

    }

    function e_hover(id){
        var numero = parseInt($('#E'+id).data('posicion'));
        for (var i = numero; i >= 0; i--){
            $('#E'+i).attr('src',flagsUrl3+'/estrellap_sel.png');
        }
        for (var i = numero+1; i < 6; i++){
            $('#E'+i).attr('src',flagsUrl3+'/estrellap.png');
        }

    }