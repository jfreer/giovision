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
$(document).ready(function(){
      var customer_id = "";  
      $('.edit_data').on("click", function(event){ 
           event.preventDefault();  
           var cust_id = $(this).attr("id");  
           customer_id = cust_id;
           $.ajax({  
                url:"functions/get_customer.php",  
                method:"POST",  
                data:{cust_id:cust_id},  
                success:function(data){ 
                     var data = JSON.parse(data); 
                     $('#name-input-u').val(data.name);  
                     $('#email-input-u').val(data.email);  
                     $('#tel-input-u').val(data.tel_no);  
                     $('#cell-input-u').val(data.cell_no);  
                     $('#residential-input-u').val(data.residential_address);  
                     $('#postal-input-u').val(data.postal_address); 
                     $('#multichoice-input-u').val(data.multichoice_acc);  
                     $('#sabc-input-u').val(data.sabc_license);
                     if(data.payment_method == "cash"){
                        $('#radio1-u').prop("checked", true);
                     } else {
                        $('#radio2-u').prop("checked", true);
                     }   
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      }); 
      $('#update_customer_form').on("submit", function(event){  
           event.preventDefault();   
           $.ajax({  
               url:"functions/update_customer.php",  
               method:"POST",  
               data:$('#update_customer_form').serialize() + '&cust_id=' + customer_id,  
               beforeSend:function(){  
                    $('#insert-u').val("Updating");  
               },  
               success:function(data){  
                    if(data == 'successful'){
                      $('#update_customer_form')[0].reset();  
                      $('#add_data_Modal').modal('hide');   
                  } else {
                      alert(data);
                  }
               }  
           });      
      }); 
 });  
$(document).ready(function(){
      $('.add_job').on("click", function(event){ 
           event.preventDefault();  
           var cust_id = $(this).attr("id");  
           $.ajax({  
                url:"functions/get_customer.php",  
                method:"POST",  
                data:{cust_id:cust_id},  
                success:function(data){ 
                     var data = JSON.parse(data); 
                     $('#job_modal').html('<center><blockquote class="blockquote mt-3 text-center"><p>What Job Do You Want To Create For '+data.name+'</p></blockquote><hr><br><a href="internal.php?cust='+data.cust_id+'"><button class="au-btn au-btn-icon au-btn--blue"><i class="zmdi zmdi-plus"></i>Add Internal Job Card</button></a>&nbsp;&nbsp;&nbsp;<a href="external.php?cust='+data.cust_id+'"><button class="au-btn au-btn-icon au-btn--blue"><i class="zmdi zmdi-plus"></i>Add External Job Card</button></a></center>');    
                     $('#create_job').modal('show');  
                }  
           });  
      }); 
 });
 $(document).ready(function(){
       var external_id = "";
       var customer_id = "";  
       $('.edit-external').on("click", function(event){ 
            event.preventDefault();  
            var ex_id = $(this).attr("external"); 
            var cust_id = $(this).attr("cust");  
            external_id = ex_id;
            customer_id = cust_id;
            $.ajax({  
                 url:"functions/get_external_job.php",  
                 method:"POST",  
                 data:{ex_id:ex_id},  
                 success:function(data){ 
                      var data = JSON.parse(data);
                      $('#e-description-input').prop("disabled", true); 
                      $('#external_job_title').text('External Job Invoice #' + data.id);
                      $('#e-description-input').val(data.description);   
                      $('#view_external_job').modal('show');  
                 }  
            });  
       });
       $("#get_external_pdf").click(function() {
          var input1 = $("<input>").attr("type", "hidden").attr("name", "cust_id").val(customer_id); 
          var input2 = $("<input>").attr("type", "hidden").attr("name", "ex_id").val(external_id); 
          $('#create_external_pdf').append(input1);
          $('#create_external_pdf').append(input2);
          $("#create_external_pdf").submit();
       });
       $('#update_customer_form').on("submit", function(event){  
            event.preventDefault();   
            $.ajax({  
                url:"functions/update_customer.php",  
                method:"POST",  
                data:$('#update_customer_form').serialize() + '&cust_id=' + customer_id,  
                beforeSend:function(){  
                     $('#insert-u').val("Updating");  
                },  
                success:function(data){  
                     if(data == 'successful'){
                       $('#update_customer_form')[0].reset();  
                       $('#add_data_Modal').modal('hide');   
                   } else {
                       alert(data);
                   }
                }  
            });      
       }); 
  });  
  $(document).ready(function(){
    $("#job-search").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#job-table-search tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  }); 
    $(document).ready(function(){
    $("#customer-search").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#customer-table-search tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  }); 

function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("table");
  switching = true;
  dir = "asc"; 
  while (switching) {
    switching = false;
    rows = table.getElementsByTagName("TR");
    for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          shouldSwitch= true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      switchcount ++; 
    } else {
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
