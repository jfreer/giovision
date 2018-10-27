$(document).ready(function(){
 $('#login_form').on("submit", function(event){  
  event.preventDefault(); 
   $.ajax({  
    url:"functions/auth.php",  
    method:"POST",  
    data:$('#login_form').serialize(),  
    beforeSend:function(){  
         $('#login_check').val("Checking...");  
    },  
    success:function(data){  
      var status = data.trim();
      if(status == 'successful'){
        window.location = "view-all-jobs.php";
      } else {
        $('#login_check').html('<p style="color:red;">'+status+'</p>');  
      }
     }  
   });  
  });
}); 