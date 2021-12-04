@extends('admin.admin_master')


@section('admin_content')




<section style="padding-top: 60px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
                {{-- <a href="#" id="updateButtom" class="btn btn-success" style="margin-bottom: 10px" data-toggle="modal" data-target="#itemModal">Update Item</a> --}}
                
                <div class="card">
                    <div class="card-header">
                        Filter
                    </div>
                    <div class="card-body">
{{-- filter --}}
 <div class="filter">
    {{-- <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
          Default checkbox
        </label>
      </div> --}}
      {{-- <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
        <label class="form-check-label" for="flexCheckChecked">
          Checked checkbox
        </label> --}}
    </div>
 </div>
 {{-- end filter --}}           

  <button type="submit" id="filter" class="btn btn-primary" onclick="filtering()">filtering</button>
        </div>
                </div>



               

     <div class="card">
            <div class="card-header Cd-Hd">
                        Items 
                        <div class="Add"> 
                          <button class="btn btn-warning" data-toggle="modal" data-target="#additems">Add Item</button>
                        </div>
                    </div>
                    <div class="card-body">
                        
                        <table id="itemTable" class="table">
                            <thead>
                                <tr>
                                    <th>name</th>
                                    <th>description</th>
                                    <th>price</th>
                                    <th>status</th>
                                    <th>image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

  </section>



 <!-- Modal create -->

  <div class="modal fade" id="additems" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createItemModalLabel">Add Item</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
         </div>

         <div class="alert" id="message" style="display: none"></div>

      <form id="addIte" method="post" enctype="multipart/form-data">
          @csrf

          <div class="modal-body">

            <ul class="alert alert-warning d-none" id="save_errorList"></ul>
           
                <div class="form-group">
                    <label for="nameEn">name En</label>
                    <input type="text" class="form-control" id="nameE" name="nameE">
                </div>
                <div class="form-group">
                    <label for="nameAr">name Ar</label>
                    <input type="text" class="form-control" id="nameA" name="nameA">
                </div>
                <div class="form-group">
                    <label for="descriptionEn">description En</label>
                    <input type="text" class="form-control" id="descE" name="descE">
                </div>
                <div class="form-group">
                    <label for="descriptionAr">description Ar</label>
                    <input type="text" class="form-control" id="descA" name="descA">
                </div>
                
                <div class="form-group">
                    <label for="password">price</label>
                    <input type="text" class="form-control" id="price" name="price">
                </div>
        
                <div class="form-group">
                  <label>Image</label>
                  <input type="file" name="image" class="form-control">
                  
                </div>
         
           
    
        </div>

        <div class="modal_footer">
          {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Close</button> --}}
          <button type="button" class="btn btn-secondary close" data-dismiss="modal" aria-label="Close">Close</button>
          <button type="submit" id="addItem" class="btn btn-primary">Add Item</button>
        </div>
      </form>
       <span id="uploaded_image"></span>
      </div>
    </div>
  </div>
 <!--end Modal create -->

{{-- modal edit item --}}
 <div class="modal fade" id="editItemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">edit item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
       </div>
        <div class="modal-body">

          <input type="text" id="edit_itemEn_id">
          <input type="text" id="edit_itemAr_id">


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
              <div class="form-group">
                  <label for="descriptionEn">description En</label>
                  <input type="text" class="form-control" id="edit_descriptionEn">
              </div>
              <div class="form-group">
                  <label for="descriptionAr">description Ar</label>
                  <input type="text" class="form-control" id="edit_descriptionAr">
              </div>
              
              <div class="form-group">
                  <label for="password">price</label>
                  <input type="text" class="form-control" id="edit_price">
              </div>
        
          
              {{-- <div class="form-group">
                  <label for="menuType">image</label>
                  <input type="text" class="form-control" id="image">
              </div> --}}
              
              <div class="form-group">
                  <label class="form-label" for="customFile">Default file input example</label>
                  <input type="file" class="form-control" name="image" id="edit_image" />
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
              url: "/admin/items/getAll",
              success:function(response){
                // console.log(response);

                var data = "";

                $.each(response , function(key , value){
                    data = data + "<tr>"
                    data = data + "<td>"+value.name+"</td>"
                    data = data + "<td>"+value.description+"</td>"
                    data = data + "<td>"+value.price+"</td>"
                    data = data + "<td>"+value.status+"</td>"
                    data = data + "<td>"+value.image+"</td>"
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
    
  //     $(document).ready(function(){
  //       $('#addItem').on('click', function(e){
  //           e.preventDefault();


  //       var nameEn = $('#nameEn').val();
  //       var nameAr = $('#nameAr').val();
  //       var descriptionEn = $('#descriptionEn').val();
  //       var descriptionAr = $('#descriptionAr').val();
  //       var price = $('#price').val();
  //       var image = $('#image').val();

  //       var data = new Array();
  //       data[0] = {name:nameEn , description:descriptionEn , lang_id:1};
  //       data[1] = {name:nameAr , description:descriptionAr , lang_id:2};

    
  //       axios.post('/admin/item/create', {
  //                 d:data,
  //                 price:price,
  //                 // image:image
  // })
  // .then(function (response) {
  //   console.log(response);


  //   $('#itemModal').modal('hide');
  //   // $('#itemModal').hide()
  //   $('#itemModal').find('input').val("");
  //   allData();
  // })
  // .catch(function (error) {
  //   console.log(error);
  // });

  //       });
  //     });
  
  $('#addIte').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url:"/admin/item/create",
   method:"POST",
   data:new FormData(this),
   dataType:'JSON',
   contentType: false,
   cache: false,
   processData: false,
   success:function(data)
   {
     console.log(data);
    $('#message').css('display', 'block');
    $('#message').html(data.success);
    $('#message').addClass(data.class_name);
    $('#uploaded_image').html(data.uploaded_image);
   }
  })
 });


// -----------------------end add data --------------------------------------

// -----------------------edit data --------------------------------------
 $(document).on('click','.edit_item',function(){
    var item_id = $(this).val();
    // console.log(item_id); 

    $('#editItemModal').modal('show');

    $.ajax({
      type:'GET',
      url:'/admin/item/edit/'+item_id,
      dataType:'json',
      success: function(response){
        console.log(response);
        $('#edit_itemEn_id').val(response[0].id);
        $('#edit_itemAr_id').val(response[1].id);

        $('#edit_nameEn').val(response[0].name);
        $('#edit_nameAr').val(response[1].name);
        $('#edit_descriptionEn').val(response[0].description);
        $('#edit_descriptionAr').val(response[1].description);
        $('#edit_price').val(response[0].price);
        // $('#edit_image').val(response[0].image);  /** update when images ready **/

      }

    });
 });

 $(document).one('click','.updateItem',function () {

  var item_en_id = $('#edit_itemEn_id').val();
  var item_ar_id = $('#edit_itemAr_id').val();

   var nameEn = $('#edit_nameEn').val();
   var nameAr = $('#edit_nameAr').val();
   var descriptionEn = $('#edit_descriptionEn').val();
   var descriptionAr = $('#edit_descriptionAr').val();
   var price = $('#edit_price').val();
   var image = $('#edit_image').val();
  

  $.ajax({
    type: "POST",
    url: "/admin/item/update/"+item_en_id+"/"+item_ar_id,
    data: {nameEn,nameAr,descriptionEn,descriptionAr,price,image},
    dataType: "json",
    success: function (response) { 
      console.log(response);
      allData();
      $('#editItemModal').modal('hide');
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
    url: "/admin/item/delete/"+item_id,
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