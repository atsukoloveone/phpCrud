<!DOCTYPE html>
<html>
 <head>
  <title>PHP Mysql REST API CRUD</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 </head>
 <body>
  <div class="container">
   <br />

   <h3 align="center">PHP Mysql REST API CRUD</h3>
   <br />
   <div align="right" style="margin-bottom:5px;">
    <button type="button" name="add_button" id="add_button" class="btn btn-success btn-xs">Add</button>
   </div>

   <div class="table-responsive">
    <table class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>Name</th>
       <th>Description</th>
       <th>Price</th>
       <th>Category</th>
       <th>Edit</th>
       <th>Delete</th>
      </tr>
     </thead>
     <tbody></tbody>
    </table>
   </div>
  </div>
 </body>
</html>

<div id="apicrudModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <form method="post" id="api_crud_form">
    <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h4 class="modal-title">Add Data</h4>
         </div>
         <div class="modal-body">
          <div class="form-group">
            <label>Enter Name</label>
            <input type="text" name="name" id="name" class="form-control" />
           </div>
           <div class="form-group">
            <label>Enter Description</label>
            <input type="text" name="description" id="description" class="form-control" />
           </div>
           <div class="form-group">
            <label>Enter Price</label>
            <input type="number"   step="0.01" name="price" id="price" class="form-control" />
           </div>
           <div class="form-group">
            <label>Enter Category</label>
            <input type="text" name="category" id="category" class="form-control" />
           </div>
       </div>
       <div class="modal-footer">
        <input type="hidden" name="hidden_id" id="hidden_id" />
        <input type="hidden" name="action" id="action" value="insert" />
        <input type="submit" name="button_action" id="button_action" class="btn btn-info" value="Insert" />
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
   </form>
  </div>
   </div>
</div>

<script type="text/javascript">
$(document).ready(function(){

 fetch_data();

 function fetch_data()
 {
  $.ajax({
   url:"fetch.php",
   success:function(data)
   {
    $('tbody').html(data);
   }
  })
 }

 $('#add_button').click(function(){
   $('#action').val('insert');
   $('#button_action').val('Insert');
   $('.modal-title').text('Add Data');
   $('#apicrudModal').modal('show');
  });

  $('#api_crud_form').on('submit', function(event){
   event.preventDefault();
   if($('#name').val() == '')
   {
    alert("Enter Name");
   }
   else if($('#description').val() == '')
   {
    alert("Enter Description");
   }
   else if($('#price').val() == '')
   {
    alert("Enter Price");
   }
   else if($('#category').val() == '')
   {
    alert("Enter Category");
   }
   else
   {
    var form_data = $(this).serialize();
    $.ajax({
     url:"action.php",
     method:"POST",
     data:form_data,
     success:function(data)
     {
      fetch_data();
      $('#api_crud_form')[0].reset();
      $('#apicrudModal').modal('hide');
      if(data == 'insert')
      {
       alert("Data Inserted using PHP API");
      }
      if(data == 'update')
      {
       alert("Data Updated using PHP API");
      }
     }
    });
   }
  });

});
</script>
