$(document).ready(function(){
 $('#insert_form').on("submit", function(event){  
  event.preventDefault(); 
   $.ajax({  
    url:"functions/add_customer.php",  
    method:"POST",  
    data:$('#insert_form').serialize(),  
    beforeSend:function(){  
         $('#insert').val("Inserting");  
    },  
    success:function(data){  
      var status = data.trim().split(',');
      if(status[0] == 'successful'){
         $("#customer_form").fadeOut();
         $('#customer_success').hide().html(status[1]).fadeIn(1500);
      } else {
        alert(data);
      }
     }  
   });  
  });
 }); 

$(document).ready(function(){
 $('#insert_external_job').on("submit", function(event){  
  event.preventDefault(); 
   $.ajax({  
    url:"functions/add_external_jobs.php",  
    method:"POST",  
    data:$('#insert_external_job').serialize(),  
    beforeSend:function(){  
         $('#insert').val("Inserting");  
    },  
    success:function(data){  
      var status = data.trim();
      if(status == 'successful'){
        window.location.href = 'index.php';
      } else {
        alert(data);
      }
     }  
   });  
  });
 }); 
$(document).ready(function(){
 $('#insert_internal_job').on("submit", function(event){  
  event.preventDefault(); 
   $.ajax({  
    url:"functions/add_internal_jobs.php",  
    method:"POST",  
    data:$('#insert_internal_job').serialize(),  
    beforeSend:function(){  
         $('#insert').val("Inserting");  
    },  
    success:function(data){  
      var status = data.trim();
      if(status == 'successful'){
        window.location.href = 'index.php';
      } else {
        alert(data);
      }
     }  
   });  
  });
 }); 
$(document).ready(function(){  
     var i=1;  
     $('#add').click(function(){  
          i++;  
          $('#spare-list').append('<div class="row form-group" id="row'+i+'"><div class="col col-md-3"><label for="textarea-input" class=" form-control-label"></label></div><div class="col-2"><input type="text" name="spares-input[]" id="spares-input" class="form-control" placeholder="Spares"></div><div class="col-2"><input type="text" name="qty-input[]" id="spares-input" class="form-control" placeholder="Qty"></div><div class="col-2"><input type="text" name="amount-input[]" id="spares-input" class="form-control" placeholder="Amount"></div><div class="col-2"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div>');  
     });  
     $(document).on('click', '.btn_remove', function(){  
          var button_id = $(this).attr("id");   
          $('#row'+button_id+'').remove();  
     });  
});  