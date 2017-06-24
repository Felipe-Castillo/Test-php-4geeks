$(document).ready(function(){
//Script para las reservas
var params={"id":$("#idDoctor").val()};



$.ajax({
            async:true,   
            cache:false, 
            dataType: 'json',
            type: 'get',  
            url: '/getReservas',
            data:params,
            success: function(data)
            {
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

                $('#calendar_make_a_reservation').fullCalendar({
                    height: 500,
                    dayClick: function() {
                    var params={"id":$("#idDoctor").val(),"fecha":$(this).attr("data-date")};
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
                    //$("#slotId").val(data.horarios[0].id);
                    $(".horarios").html("");
                    var date="";
                    for(var i=0;i<data.horarios.length;i++)
                    {
                      date=moment(data.horarios[i].slot_date).format('LL');
                      if (data.horarios[i].slot_status==1)
                      {
                       $(".horarios").append("<li style=\" background-color:blue; \" onclick=\"Noreserva()\"><span >"+data.horarios[i].inicio+"-"+data.horarios[i].fin+"</span></li>");   

                      }else
                      {
                       $(".horarios").append("<li data-id=\""+data.horarios[i].id+"\"  ><a id=\"close_modal_at\" href=\"#\">"+data.horarios[i].inicio+"-"+data.horarios[i].fin+"</a></li>");   
                       //$(".tiempoM").append("<li><span>"+data.horarios[i].inicio+"-"+data.horarios[i].fin+"</span><li>");
                      }
                    }    

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

              $('#calendar_make_a_reservation').fullCalendar({
                    height: 500,
                    dayClick: function() {
                    
                    },
                    dayRender: function (date, cell) {

                                    
                    }
                    
                });

            }
            },
            
            error: function(data){
               alert("ha ocurrido un error");
               console.log(data);
                
            }
        });

            


$(".horarios").on("click","li",function(){

        $("#slotId").val($(this).attr("data-id"));

          var params={slot_id:$(this).attr("data-id")};
       
        $.ajax({
            async:true,   
            cache:false, 
            dataType: 'json',
            type: 'get',  
            url: '/getSlotD',
            data:params,
            success: function(data)
            {
                   
            if (data.success==true) 
            {   
                    
                    //$(".Dfecha").html(""); 
                  
                     
                    $(".fechaM").html("");
                    $(".tiempoM").html(data.user[0].inicio+" - "+data.user[0].fin);
                    $(".fechaM").append(moment(data.user[0].slot_date).format('LL'));
                    //$(".tiempoM").html("");
                    $('#modal_make_a_reservation').modal('open');

            }else{
                console.log("ha ocurrido un error");
            }
     

            
            },
            
            error: function(data){
               alert("ha ocurrido un error") ;
                
            }
        });
})      

$("#Creserva").on("click",function()
{
var id=$("#idUsuario").val();
var idDoctor=$("#idDoctor").val();
var tipoC=$("#tipoC").val();
var fecha=$("#slotId").val();

var params={id:id,
            tipoC:tipoC,
            fecha:fecha,
            idDoctor:idDoctor};
$.ajax({
            async:true,   
            cache:false, 
            dataType: 'json',
            type: 'get',  
            url: '/guardarReservacion',
            data:params,
            success: function(data)
            {
                if (data.success==true) 
                {

                alert("Reservacion exitosa");

                }
         
            
            },
            
            error: function(data){
               alert("ha ocurrido un error");
               console.log(data);
                
            }
        });






});




});


function Noreserva()
{
    alert("Lo sentimos, pero ese horario no esta disponible");
   

}

