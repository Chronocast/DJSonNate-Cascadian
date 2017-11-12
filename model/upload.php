/**
 * upload script for pdf documents
 *
 * @author Nate Hascup,Sonie Moon
 * @version 1.0
 */

<?php

$("#button-send").click(sendFormData);
			
			function sendFormData(){
				var formData = new FormData($("#form-demo").get(0));
				
				var ajaxUrl = "process-upload.php";
				
				$.ajax({
					url : ajaxUrl,
					type : "POST",
					data : formData,
					// both 'contentType' and 'processData' parameters are
					// required so that all data are correctly transferred
					contentType : false,
					processData : false
				}).done(function(response){
					// In this callback you get the AJAX response to check
					// if everything is right...
				}).fail(function(){
					// Here you should treat the http errors (e.g., 403, 404)
				}).always(function(){
					alert("AJAX request finished!");
				});
			}
		</script>
?>