$(function () {
  	$.noConflict();

    user_tbl = $('#user-table').DataTable({
        processing: true,
        serverSide: false,
        order: [[1, 'asc']],
        ajax: 'users/data',
        columns: [
            {data: 'checkmark', name:'id', orderable: false, searchable: false},
            {data: 'first_name', name: 'first_name'},
            {data: 'last_name', name: 'last_name'},
            {data: 'email', name: 'email'},
            {data: 'role', name: 'role'},
            {data: 'action', name: 'action', orderable: false, searchable: false, class:"text-center"}
        ]
    });
  
    

 });

function deleteUser($user){
     if(confirm('¿Seguro que desea eliminar esta usuario?') == true)
     {
        var id = $user;
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        $.ajax(
        {
            url: "user/delete/"+id,
            type: 'DELETE',
            dataType: "JSON",
            data: {
                "id": id,
                "_method": 'DELETE',
                "_token": csrf_token ,
            },
            success: function (data)
            {

                 if (data.success == 'yes')
                 {
                    
                     user_tbl.ajax.reload();
                  }
                  
            }
        });
        event.preventDefault();
        $(".alert").remove();
      }
      else
      {
        event.preventDefault();
        return false;
      }  

        console.log("It failed");

}  

$(document).on("click",".delete_multiple",function(e){
      
      e.preventDefault();
      
    if ( !$(".case").is(':checked') )
    {
         alert("Por favor, seleccione al menos una casilla de verificación!..");
        
        return false; 
    }
    else
    {
      if(confirm('¿Está seguro de que desea eliminar estos usuarios?') == true)
      {
          $("#user_listing_form").attr("action", "/admin/user/delete_multi_user");
          var url  = $("#user_listing_form").attr("action");
          var data = $("#user_listing_form").serialize();
          $.ajax({
            url : url ,
            method : 'post',
            data : data,
            success : function(data){
                //Reload Table Data 
                user_tbl.ajax.reload();
                $("#checkall").prop("checked","");
                
                var json_data = $.parseJSON(data);
              
                if( json_data.status == 200 )
                {
                   msg_display( 200, json_data.message );
                }
                else
                {
                  msg_display( 500, json_data.message );

                }
            }
          });
        }
        else
        {
          return false;
        }
      }
      
    });
    
    $('#checkall').click(function(event) {  //on click
        if(this.checked) { // check select status
            $('.case').each(function() { //loop through each checkbox
        //alert("check");
                this.checked = true;  //select all checkboxes with class "checkbox1"              
            });
        }else{
           $('.case').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                      
        //alert("uncheck");
            });        
        }
  }); 
  
  