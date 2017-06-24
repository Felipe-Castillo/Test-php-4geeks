$(function () {
  	$.noConflict();

  task_tbl = $('#task-table').DataTable({
        processing: true,
        serverSide: false,
        order: [[1, 'asc']],
        ajax: 'tasks/data',
        columns: [
            {data: 'checkmark', name:'id', orderable: false, searchable: false},
            {data: 'title', name: 'title'},
            {data: 'category', name: 'category'},
            {data: 'note', name: 'note'},
            {data: 'status', name: 'status'},
            {data: 'date', name: 'date'},
            {data: 'action', name: 'action', orderable: false, searchable: false, width:'20px'}
        ]
    });
  
 

 });
function deleteTask($task){
     if(confirm('¿Seguro que desea eliminar esta tarea?') == true)
     {
        var id = $task;
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        $.ajax(
        {
            url: "task/delete/"+id,
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
                    // location.reload();
                    //setInterval(function() {
                        //window.location.reload();
                    //}, 5900);
                     task_tbl.ajax.reload();
                  }
                  else
                  {
                    //show your error message in your div or span
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
			if(confirm('¿Estás seguro de que quieres eliminar estas tareas?') == true)
 	 		{
				   $("#task_listing_form").attr("action", "/admin/task/delete_multi_task");
				
					var url  = $("#task_listing_form").attr("action");
					var data = $("#task_listing_form").serialize();
					$.ajax({
						url : url ,
						method : 'post',
						data : data,
						success : function(data){
							  //Reload Table Data 
								task_tbl.ajax.reload();
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

  $(document).on("click",".done_multiple",function(e){
      
      e.preventDefault();
      
    if ( !$(".case").is(':checked') )
    {
         alert("Por favor, seleccione al menos una casilla de verificación!..");
        
        return false; 
    }
    else
    {
      if(confirm('¿Estás seguro de que quieres marcar/desmarcar estas tareas?') == true)
      {
           $("#task_listing_form").attr("action", "/admin/task/done_multi_tasks");
        
          var url  = $("#task_listing_form").attr("action");
          var data = $("#task_listing_form").serialize();
          $.ajax({
            url : url ,
            method : 'post',
            data : data,
            success : function(data){
                //Reload Table Data 
                task_tbl.ajax.reload();
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
 