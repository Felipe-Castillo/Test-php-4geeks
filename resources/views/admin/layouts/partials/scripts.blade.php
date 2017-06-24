<!-- Laravel App -->
<script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset ('js/funciones.js') }}"></script>

<script type="text/javascript" src="//cdn.ckeditor.com/4.7.0/full/ckeditor.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->

<!-- page script -->
<script type="text/javascript">
//$.noConflict();
$(document).ready( function() {

	$('.dropdown-toggle').dropdown();
	
});

function msg_display( error_code,msg )
{
    remove_msg();
    if ( error_code == 500 )
    {
            jQuery("#all_messages").prepend('<div class="alert alert-danger alert-dismissable">'+msg+'</div>');
    }
    else
    {
            jQuery("#all_messages").prepend('<div class="alert alert-success alert-dismissable">'+msg+'</div>');        
    }
}
function remove_msg()
{
    jQuery(".alert-success").remove();  
    jQuery(".alert-success").remove();
}
</script>
