@extends('admin.admin_master')


@section('admin_content')




<section style="padding-top: 60px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
               

     <div class="card">
            <div class="card-header Cd-Hd">
                        Menu Type 
                       
                        <div class="Add"> 
                          <button class="btn btn-warning" data-toggle="modal" data-target="#addMenuType">Add Menutype</button>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <table id="itemTable" class="table">
                            <thead>
                                <tr>
                                    <th>menu type</th>
                                    <th>language</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- do in script --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

  </section>



 <!-- Modal create -->

  <div class="modal fade" id="addMenuType" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createItemModalLabel">Add MenuType</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
         </div>

         <div class="alert" id="message" style="display: none"></div>

      <form id="addMenu">
          @csrf

          <div class="modal-body">

            <ul class="alert alert-warning d-none" id="save_errorList"></ul>
           
                    <div class="form-group">
                        <label for="nameEn">name En</label>
                        <input type="text" class="form-control" id="nameEn" name="nameE">
                     </div>
                    <div class="form-group">
                        <label for="nameAr">name Ar</label>
                        <input type="text" class="form-control" id="nameAr" name="nameA">
                    </div>
               
               </div>

        <div class="modal_footer">
            <button type="button" class="btn btn-secondary close" data-dismiss="modal" aria-label="Close">Close</button>
            <button type="submit" id="add_MenuType" class="btn btn-primary">Add MenuType</button>
        </div>
      </form>
 
      </div>
    </div>
  </div>
 <!--end Modal create -->

{{-- modal edit item --}}
 <div class="modal fade" id="editMenuTypeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">edit ManuType</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
       </div>
        <div class="modal-body">

          <input type="hidden" id="edit_itemEn_id">
          <input type="hidden" id="edit_itemAr_id">


        <form id="editItemForm">
              @csrf
              <div class="form-group">
                  <label for="nameEn">name En</label>
                  <input type="text" class="form-control" id="edit_nameEn">
              </div>
              <div class="form-group">
                  <label for="nameAr">name Ar</label>
                  <input type="text" class="form-control" id="edit_nameAr">
              </div>
            
             
             
             {{-- <button type="submit" id="addItem" class="btn btn-primary">Add item</button> --}}
          
          </form>
  
      </div>

      <div class="modal_footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary updateItem">Update</button>
      </div>
  
     
    </div>
  </div>
 </div>
{{-- end modal edit item --}}

 
<!-- Modal delete -->


  <div class="modal fade" id="DeleteItemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           
          <input type="hidden" id="delete_item_id">
          <h4>Are you sure want to delete this item</h4>
    
        </div>

        <div class="modal_footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary delete_item_btn">Yes Delete</button>
        </div>

    
       
      </div>
    </div>
  </div>
<!--end Modal delete -->
  



  <script>
 

      $.ajaxSetup({
          headers:{
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      })

//------------------------start display data--------------------------------
      function allData(){
       

          $.ajax({
              type: "GET",
              dataType: 'json',
              url: "get-menu-type",
              success:function(response){
                
                var data = "";
                var lang = "";

                $.each(response , function(key , value){
                  if (value.lang_id == 1) {
                    lang = "En";
                  }
                  else{
                    lang = "Ar";
                  }

                    data = data + "<tr>"
                    data = data + "<td>"+value.category+"</td>"
                    data = data + "<td>"+lang+"</td>"
                    data = data + "<td>"
                    data = data + "<button value='"+value.id+"' class='edit_item btn btn-sm btn-primary mr-2'>Edit</button>"
                    data = data + "<button value='"+value.id+"' class='delete_item btn btn-sm btn-danger mr-2'>Delete</button>"
                    data = data + "</td>"
                    data = data + "</tr>"
                })
                $('tbody').html(data);
              }
          })
      }

      allData();
//------------------------end display data--------------------------------


    
// -----------------------add data -------------------------------------- 
  
  $('#addMenuType').on('submit', function(event){
  event.preventDefault();

  var nameEn = $('#nameEn').val();
  var nameAr = $('#nameAr').val();
  

  $.ajax({
   url:"menu-type/create",
   method:"POST",
   data:{nameEn:nameEn,nameAr:nameAr},

   
   success:function(data)
   {
     console.log(data);
    $('#message').css('display', 'block');
    $('#message').html(data.success);
    $('#message').addClass(data.class_name);

    $('#addMenuType').modal('hide');
    $('#addMenuType').find('input').val("");

   }
  })
 });


// -----------------------end add data --------------------------------------

// -----------------------edit data --------------------------------------
 $(document).on('click','.edit_item',function(){
    var menuType_id = $(this).val();
    // console.log(item_id); 

    $('#editMenuTypeModal').modal('show');

    $.ajax({
      type:'GET',
      url:'/admin/menu-type/edit/'+menuType_id,
      dataType:'json',
      success: function(response){
        console.log(response);
        $('#edit_itemEn_id').val(response[0].id);
        $('#edit_itemAr_id').val(response[1].id);

        $('#edit_nameEn').val(response[0].category);
        $('#edit_nameAr').val(response[1].category);
       

      }

    });
 });

 $(document).one('click','.updateItem',function () {

  var item_en_id = $('#edit_itemEn_id').val();
  var item_ar_id = $('#edit_itemAr_id').val();

   var nameEn = $('#edit_nameEn').val();
   var nameAr = $('#edit_nameAr').val();
 
  

  $.ajax({
    type: "POST",
    url: "/admin/menu-type/update/"+item_en_id+"/"+item_ar_id,
    data: {nameEn,nameAr},
  
    success: function (response) { 
      console.log(response);
      allData();
      $('#editMenuTypeModal').modal('hide');
      
     }
  });
 });


// -----------------------end edit data --------------------------------------

// -----------------------delete data --------------------------------------
 $(document).on('click','.delete_item', function(){
  var item_id = $(this).val();
  
  $('#delete_item_id').val(item_id);
  $('#DeleteItemModal').modal('show');
 });

 $(document).on('click', '.delete_item_btn' , function(){

  $(this).text('Deleting');
  var item_id = $('#delete_item_id').val();

  $.ajaxSetup({
          headers:{
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });


  $.ajax({
    type: "DELETE",
    url: "/admin/menu-type/delete/"+item_id,
    success: function(response){
      console.log(response);
      $('#success_message').addClass('alert alert-success');
      $('#success_message').text(response.message);
      $('#DeleteItemModal').modal('hide');
      $('.delete_item_btn').text('Yes Delete');
      allData();
    }
  });
 });
// -----------------------end delete data --------------------------------------


//------------------------start filtering --------------------------------
 function filter(){
    $.ajax({
              type: "GET",
              dataType: 'json',
              url: "/admin/menu-type",
              success:function(response){
                var data = "";

                $.each(response , function(key , value){
                    data = data + "<div class='form-check'><input class='form-check-input' type='checkbox' value="+value.category+" id="+value.category+"><label class='form-check-label' for='flexCheckDefault'>"+value.category+"</label></div>"
                })
                $('.filter').html(data);
              }
          })
   }
   filter();

   function filtering(){
    var sList = new Array();
       $('input[type=checkbox]').each(function(){
           if(this.checked){
               sList.push($(this).val());
           }
       });
    //    console.log(sList);

       axios.post('/admin/item/filter', {
                  data:sList
  })
  .then(function (response) {
    console.log(response.data);
  })
  .catch(function (error) {
    console.log(error);
  });
   }


//------------------------end filtering ----------------------------------
  </script>

@endsection()