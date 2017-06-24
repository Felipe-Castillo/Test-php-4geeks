$(document).ready(function() { 


var params={idDoctor:$("#userId").val()}

$.ajax({
            async:true,   
            cache:false, 
            dataType: 'json',
            type: 'get',  
            url: "/getOpiniones",
			data:params,   
            success: function(data)
            {
            	if (data.success==true)
            	{
            	var div=""
            	for(var i=0;i<data.opiniones.length;i++)
            	{
            		$(".cantV").html(data.opiniones[0].cantvaloraciones);

            	 div=div+"<div class=\"comment row\"><div class=\"center col s12 m12 l2 xl2\">"
                                  +"<img width='80px' src=\""+flagsUrl+"/"+data.opiniones[i].profile_pic+"\" class=\"circle\">"
                                  +"<p class=\"comment-user-name\">"+data.opiniones[i].name+"</p></div><div class=\"col s12 m12 l10 xl10\">"
                                  +"<div class=\"stars-comment ec-stars-wrapper\">"
                                  +"</div><p class=\"comment-user-comment\">"+data.opiniones[i].review+"</p></div></div>";	
            	}
                
                console.log(div);
                $("#comentarioAdd").append(div);	
            }else
            {
            	console.log("Ha ocurrido un error");
            }
            	
                
              
            },complete: function(response) {
            
               
                }
            //si ha ocurrido un error
            
        });

});