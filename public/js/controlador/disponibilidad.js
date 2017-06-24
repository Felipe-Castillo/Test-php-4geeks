
var params={"id":$("#idUser").val()};
var slotN=0;
$(".mihorario").on("click",function()
{
$.ajax({
            async:true,   
            cache:false, 
            dataType: 'json',
            type: 'get',  
            url: '/getReservas',
            data:params,
            success: function(data)
            {
            ajax_start();
            if(data.success==true)
            {
                
            myArray= new Array(data.disponibilidad.length);
            arrayDates=[];
            var horas="";
            for(var i=0;i<data.disponibilidad.length;i++)
            {
             
                myArray[i]=data.disponibilidad[i].slot_date;
            }

            
            
            var array=$( "body" ).data("array",myArray);

                $('#mihorario').fullCalendar({
                    height: 500,
                    dayClick: function() {
                    var params={"id":$("#idUser").val(),"fecha":$(this).attr("data-date")};
                    var fecha=$(this).attr("data-date");
                    $.ajax({
                    async:true,   
                    cache:false, 
                    dataType: 'json',
                    type: 'get',  
                    url: '/getReservasId',
                    data:params,
                    success: function(data)
                    {
                        if (data.success==true)
                        {
                    $(".horarios").html("");
                    $(".Dfecha").html(""); 
                    $(".fechaM").html("");
                    $(".tiempoM").html("");
                    var date="";
                    for(var i=0;i<data.horarios.length;i++)
                    {
                      date=moment(data.horarios[i].slot_date).format('LL');  
                      
                       $(".horarios").append("<li data-id=\""+data.horarios[i].id+"\"  ><a id=\"close_modal_at\" href=\"#modal_make_a_reservation\">"+data.horarios[i].inicio+"-"+data.horarios[i].fin+"</a></li>");   
                       $(".tiempoM").append("<li><span>"+data.horarios[i].inicio+"-"+data.horarios[i].fin+"</span><li>");
                      
                    }   
                     
                    $("#deleteDate").val(fecha);
                    $(".Dfecha").html(date); 
                    $(".fechaM").append(date); 
                    $('#modal_appointment_time').modal('open');
                        }
                  
                
                        },
            
            error: function(data){
               
                console.log(data);
            }
        });
                    
                     
                    } ,
                    dayRender: function (date, cell) {
        
                   myArray.forEach(function (item) {
        


        if (date.format()==item) 
        {
            cell.css("background-color", "blue");
            
        }
             });
                                    
                    }
                    
                });

            }else
            {

              $('#mihorario').fullCalendar({
                    height: 500,
                    dayClick: function() {
                    
                    },
                    dayRender: function (date, cell) {

                                    
                    }
                    
                });

            }
            },complete: function(response) {
            
                ajax_stop(); 
                },
            
            error: function(data){
               alert("ha ocurrido un error");
               console.log(data);
                
            }
        });

});


$.ajax({
            async:true,   
            cache:false, 
            dataType: 'json',
            type: 'get',  
            url: 'getDisponibilidad',
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
                    url: '/getDisponibleId',
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

$(document).ready(function(){


//this script will be used for disponibilty uses





$("#consulta").on("click","li",function(){

       
        var params={slot_id:$(this).attr("data-id")};
        $("#cancelarR").val($(this).attr("data-idreserva"));
        $("#cancelarSlot").val($(this).attr("data-id"));
        $.ajax({
            async:true,   
            cache:false, 
            dataType: 'json',
            type: 'get',  
            url: 'getUserDoc',
            data:params,
            success: function(data)
            {

            if (data.success==true) 
            {	$(".picture-user").attr('src',"");
                if (data.user[0].profile_pic!=null)
                {
                  $(".picture-user").attr('src',flagsUrl+"/"+data.user[0].profile_pic);  
              }else
              {
                flagsUrl = "{{asset('/img/default.png')}}";
                $(".picture-user").attr('src',flagsUrl2);  

              }
				
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

$(".horarios").on("click","li",function()
{
    var id=$(this).attr("data-id");
   
    $(".slotDelete").val(id);
     $('#modalEliminar').modal('open');
    
})

$("#agregar").on("click",function()
{
    var date1=$("#date2").val();
    var date2=$( "#date1" ).val();
    var timeSlot=$("#time_slot option:selected" ).val();
    var desdeD=$( "#desdeD option:selected" ).val();
    var hastaD=$( "#hastaD option:selected" ).val();
    
    var Cdate1= new Date(date1);
    var Cdate2= new Date(date2);
    console.log(Cdate2.getTime());
    console.log(Cdate1.getTime());
    if (Cdate2.getTime()>=Cdate1.getTime())
    {
        alert("Eliga un rango de fechas correcto");
       
    }else{
     if ($('.slotDI').length) {
            alert("existe");
        }
    agregarSlot(date1,date2,timeSlot,desdeD,hastaD,slotN);   
    }
    
    

   
    //var array={date1:date1,date2:date2,timeSlot:timeSlot,desdeD:desdeD,hastaD:hastaD};
    //alert(slotN);
});



$(".eliminar").on("click",function(){
    alert
params={"id":$(".slotDelete").val(),
"_token":$('meta[name="csrf-token"]').attr('content')}
console.log(params);


$.ajax({
            async:true,   
            cache:false, 
            dataType: 'json',
            type: 'post',  
            url: 'deleteSlot',
            data:params,
            success: function(data)
            {

            if (data.success==true) 
            {   
                alert("slot eliminado exitosamente");
                
            }else
            {
                alert("ha ocurrido un error");
            }
     

            $('#modal_appointment_time').modal('close');
            $('#modalEliminar').modal('close');

            },
            
            error: function(data){
               alert("ha ocurrido un error") ;
                
            }
        });
});
//Cancelar las reservas

$("#Reliminar").on("click",function(){

var params={
            slot_id:$('#cancelarSlot').val(),
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

});

$(".eliminarDate").on("click",function(){
params={"date":$("#deleteDate").val(),
"_token":$('meta[name="csrf-token"]').attr('content')}
console.log(params);

$.ajax({
            async:true,   
            cache:false, 
            dataType: 'json',
            type: 'post',  
            url: 'deleteDate',
            data:params,
            success: function(data)
            {

            if (data.success==true) 
            {   
                alert("Fecha eliminada exitosamente");
                location.reload(true);
            }else
            {
                alert("ha ocurrido un error");
            }
     

            
            },
            
            error: function(data){
               alert("ha ocurrido un error") ;
                
            }
        });
});



$("#saveDisp").on("click",function()
{
	//alert("hey");
	var fecha=$( "#date1" ).val();
	var timeSlot=$("#time_slot option:selected" ).val();
	var desdeD=$( "#desdeD option:selected" ).val();
	var hastaD=$( "#hastaD option:selected" ).val();

	
})



$('body').on('click', ".eliminarSlot", function() {
 $(this).parent().remove();
 slotN--;
 
});
//$( "#myselect option:selected" ).text();

});




function agregarSlot(d1,d2,slot,desde,hasta,i)
{
    var div="<div style=\" background-color:red; margin:2%;\" class=\"slotDI\" >"+
    "<input type=\"hidden\" name=\"fecha2[]\" value='"+d1+"' class=\"fecha1\">"
    +"<input type=\"hidden\" name=\"fecha1[]\" value='"+d2+"' class=\"fecha2\">"
    +"<input type=\"hidden\" name=\"slotH[]\" value='"+slot+"' class=\"slotH\">"
    +"<input type=\"hidden\" name=\"desde[]\" value='"+desde+"' class=\"desde\">"
    +"<input type=\"hidden\" name=\"hasta[]\" value='"+hasta+"' class=\"hasta\">"
    +"<span>Fecha:"+d1+"-"+d2+"</span><span>"+desde+"-"+hasta+"</span> Numero de slot"+i
    +"<span style=\"margin-left:10px;\" class=\"eliminarSlot\">eliminar</span></div>";

    $("#slotAdd").append(div);
}