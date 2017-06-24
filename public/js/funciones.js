

$(document).ready(function(){


$('#category_form').on('submit', function(e) {
   
    e.preventDefault();
   
    var form = $(this);
    var url = form.attr('action');
  console.log(url);
   
    $.ajax({
        type: "post",
        url: url,
        data: form.serialize(),
        dataType: 'json',
        success: function(data) {
          if (data.success==true) 
          {
          switch(data.message)
          {
            case "modificado":
            alert("Tarea Modificada exitosamente");
            break;
           case "guardado":
            alert("Tarea Guardada exitosamente");
            break;
             
          }
          }else
          {
            switch(data.message)
            {
              case "tomado":
              alert("El nombre de la categoria ya ha sido Tomado");
              break;
            }
          }
        
       
         

        },
        error: function(response) {
           
          console.log(response);
           
         
        
        }
    })

});


$('#task_form').on('submit', function(e) {
   
    e.preventDefault();
   
    var form = $(this);
    var url = form.attr('action');
  console.log(url);
   
    $.ajax({
        type: "post",
        url: url,
        data: form.serialize(),
        dataType: 'json',
        success: function(data) {
          if (data.success==true) 
          {
          switch(data.message)
          {
            case "modificado":
            alert("Tarea Modificada exitosamente");
            break;
           case "guardado":
            alert("Tarea Guardada exitosamente");
            break;
             
          }
          }else
          {
            switch(data.message)
            {
              case "tomado":
              alert("El nombre de la tarea ya ha sido Tomado");
              break;
            }
          }
        
       
         

        },
        error: function(response) {
           
          console.log(response);
           
         
        
        }
    })

});

$('#register_form').on('submit', function(e) {
    var clave=$("#password").val();
    var clave2=$("#password2").val();
    e.preventDefault();
   
    var form = $(this);
    var url = form.attr('action');
    console.log(url);
    if (clave!=clave2)
    {
      alert("Las claves no coinciden")
    }else{
    $.ajax({
        type: "post",
        url: url,
        data: form.serialize(),
        dataType: 'json',
        success: function(data) {
          if (data.success==true) 
          {
          alert("Registro exitoso");
          }else
          {
            switch(data.message)
            {
              case 'correo':
              alert("El correo ya esta en uso");
              break;
            }
          }
        
       
         

        },
        error: function(response) {
           
          console.log(response);
           
         
        
        }
    })
}
});

$('#userEdit_form').on('submit', function(e) {

      
    var clave = $('#password').val();
    var clave2 = $('#password2').val();
    alert(clave);
    e.preventDefault();

    var form = $(this);
    var url = form.attr('action');
   
    if ((clave!=clave2))
    {
    alert('Las contraseñas no coinciden');
    }else{


    $.ajax({
        type: "post",
        url: url,
        data: form.serialize(),
        dataType: 'json',
        success: function(data) {
          if (data.success==true) 
          {
            alert("exito");
          }else
          {
            alert("Ha ocurrido un error");
          }  
         

        },
        error: function(response) {
           
          console.log(response);
           
         
        
        }
    })
  }

});
});


function validar_ob(valor){
  if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
    return false;
  }else{
    return true;
  }
}
/*
function showAlert(Message, Title, Donde){
    BootstrapDialog.show({
            message: Message,
            type: BootstrapDialog.TYPE_DANGER,
            title: Title,
            closable: false,
            buttons: [{
                label: 'Aceptar',
                cssClass: 'btn-success',
                action: function(dialogRef){
                    dialogRef.close();
                }
            }],
            onhidden: function(dialogRef){
             if(Donde==0)
             {
             console.log("blabla"); 
             }
              if (Donde==6){
                $('#clave').focus();
              }
              
          }
        });
    }*/


function displayFieldErrors(response){

    var gotErrors = false;

    var errorPostion = "top";
    var errorString = '';

    $.each(response.responseJSON, function (key, item) {
        
        $gotErrors = true;
     
        errorString += '<li>' + item + '</li>';
       
    });
  
    $("#validation-errors").html('<div class="alert alert-danger"><strong>'+ errorString +'</strong><div>');
    return gotErrors;
}    







/**
* Will allow only number.
*/
function onlyNumberKey(evt)
{
   evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    
    if((charCode > 47 && charCode < 58) || charCode == 8 || charCode == 9 || charCode == 46)
        return true;
    else
        return false;
}




 function ajax_start(){
        
        $body = $("body");
        $body.addClass("loading");
    }

    function ajax_stop(){
         $body = $("body");
         $body.removeClass("loading");
         $(".modalll").css("display","none");
    }
function formatDate(d) 
        {
          var date = new Date(d);

         if ( isNaN( date .getTime() ) ) 
         {
            return d;
         }
         else
        {
          
          var month = new Array();
          month[0] = "Enero";
          month[1] = "Febrero";
          month[2] = "Marzp";
          month[3] = "Abril";
          month[4] = "Mayo";
          month[5] = "Junio";
          month[6] = "Julio";
          month[7] = "Agosto";
          month[8] = "Sept";
          month[9] = "Oct";
          month[10] = "Nov";
          month[11] = "Dec";

          day = date.getDate();
          
          if(day < 10)
          {
             day = day+1;
          }
          
          return    day  + " " +month[date.getMonth()] + " de " + date.getFullYear();
          }
            
         }





