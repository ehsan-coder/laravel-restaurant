@extends('admin.admin_master')


@section('admin_content')


                                  {{-- display table --}}
<div class="card">
                                    <div class="card-header Cd-Hd">
                                                Items 
                                                <div class="Add"> 
                                                  <button class="btn btn-warning" onclick="displayForm()">Add Item</button>
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
                                                            <th>lang</th>
                                                            <th>image</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                       
                                                    </tbody>
                                                </table>
                                            </div>
</div>



                                  {{-- create form --}}

<div id="createForm" style="display: none">
  <div class="container">
  <h1>Add New Item</h1>
     <div class="alert" id="message" style="display: none"></div>

  <!-- <form action="{{ route('itemUpload',app()->getLocale()) }}" enctype="multipart/form-data" method="POST"> -->
     <form method="post" id="upload_form" enctype="multipart/form-data">
    @csrf
      	<div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group">
      <label for="nameEn">name En</label>
      <input type="text" class="form-control" id="nameE" name="nameEn">
  </div>
  <div class="form-group">
      <label for="nameAr">name Ar</label>
      <input type="text" class="form-control" id="nameA" name="nameAr">
  </div>
  <div class="form-group">
      <label for="descriptionEn">description En</label>
      <input type="text" class="form-control" id="descE" name="descEn">
  </div>
  <div class="form-group">
      <label for="descriptionAr">description Ar</label>
      <input type="text" class="form-control" id="descA" name="descAr">
  </div>
  
  <div class="form-group">
      <label for="password">price</label>
      <input type="text" class="form-control" id="price" name="price">
  </div>

	<div class="form-group">
      <label>Image</label>
      <input type="file" name="image" class="form-control">
      
    </div>
    <div class="form-group">
      <button class="btn btn-success upload-image" type="submit">Create Item</button>
    </div>
  </form>
     <span id="uploaded_image"></span>

 </div>
</div>


                                  {{-- edit form --}}
<div id="editForm" style="display: none">
                                    <div class="container">
                                    <h1>Edit Item</h1>
                                       <div class="alert" id="message_edit" style="display: none"></div>
                                  
                                    <!-- <form action="{{ route('itemUpdate',app()->getLocale()) }}" enctype="multipart/form-data" method="POST"> -->
                                       <form method="post" id="edit_form" enctype="multipart/form-data">
                                      @csrf
                                          <div class="alert alert-danger print-error-msg" style="display:none">
                                          <ul></ul>
                                      </div>
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                  

                                      <input type="hidden" id="edit_itemEn_id">
                                      <input type="hidden" id="edit_itemAr_id">

                                      <div class="form-group">
                                        <label for="nameEn">name En</label>
                                        <input type="text" class="form-control" id="edit_nameEn" name="edit_nameEn">
                                    </div>
                                    <div class="form-group">
                                        <label for="nameAr">name Ar</label>
                                        <input type="text" class="form-control" id="edit_nameAr" name="edit_nameAr">
                                    </div>
                                    <div class="form-group">
                                        <label for="descriptionEn">description En</label>
                                        <input type="text" class="form-control" id="edit_descEn" name="edit_descEn">
                                    </div>
                                    <div class="form-group">
                                        <label for="descriptionAr">description Ar</label>
                                        <input type="text" class="form-control" id="edit_descAr" name="edit_descAr">
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="password">price</label>
                                        <input type="text" class="form-control" id="edit_price" name="edit_price">
                                    </div>
                                  
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" name="edit_image" id="edit_image " class="form-control">
                                        
                                      </div>



                                      <div class="form-group">
                                        <button class="btn btn-success upload-image" type="submit">Update Item</button>
                                      </div>
                                    </form>
                                       <span id="uploaded_image"></span>
                                  
                                   </div>
</div>
                                  

 <script>

/* script for all */
function displayForm(){
  $('#createForm').css('display','block');
};


  /* display */
//------------------------start display data--------------------------------
function allData(){
      
      $.ajax({
          type: "GET",
          dataType: 'json',
          url: "/admin/items/getAll",
          success:function(response){
            // console.log(response);

            var data = "";
            var status = "";
            var lang = "";

            $.each(response , function(key , value){
              if (value.status == 1) {
                status = "available";
              }
              else{
                status = "unavailable";
              }
              if (value.lang_id  == 1) {
                lang = "en";
              }else { lang = "ar";
              }

                data = data + "<tr>"
                data = data + "<td>"+value.name+"</td>"
                data = data + "<td>"+value.description+"</td>"
                data = data + "<td>"+value.price+"</td>"
                data = data + "<td>"+status+"</td>"
                data = data + "<td>"+lang+"</td>"

                data = data + "<td>"
                data = data + "<img src='/images/"+value.image+"' style='width:100px' style='height:500px '>"
                data = data + "</td>"
                
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


  /* create */
$(document).ready(function(){

 $('#upload_form').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url:"{{ url('admin/item/create') }}",
   method:"POST",
   data:new FormData(this),
   dataType:'JSON',
   contentType: false,
   cache: false,
   processData: false,
   success:function(data)
   {
    //  console.log(data);
    $('#message').css('display', 'block');
    $('#message').html(data.success);
    $('#message').addClass(data.class_name);
    // $('#uploaded_image').html(data.uploaded_image);
    $('#createForm').css('display','none');
    allData();
   }
  })
 });
});


 /* edit */
 $(document).on('click','.edit_item',function(){
    var item_id = $(this).val();
    // console.log(item_id); 

    $('#editForm').css('display','block');

    $.ajax({
      type:'GET',
      url:'/admin/item/edit/'+item_id,
      dataType:'json',
      success: function(response){
        // console.log(response);
        $('#edit_itemEn_id').val(response[0].id);
        $('#edit_itemAr_id').val(response[1].id);

        $('#edit_nameEn').val(response[0].name);
        $('#edit_nameAr').val(response[1].name);
        $('#edit_descEn').val(response[0].description);
        $('#edit_descAr').val(response[1].description);
        $('#edit_price').val(response[0].price);
   
        var imgsrc = "/images/"+response[0].image;
        // console.log(imgsrc);
        // $('#edit_image').attr("src", imgsrc);
        
        // var test = $('#edit_image').val();
        // console.log(test);
        // $("input type=[file]").val(imgsrc);
        // $('#edit_image').val('<img src="'+imgsrc+'"');
        // $('#edit_image').attr("src",imgsrc);
      }
    });
});


/* update */


$('#edit_form').on('submit', function(event){
 event.preventDefault();
  var item_en_id = $('#edit_itemEn_id').val();
  var item_ar_id = $('#edit_itemAr_id').val();



 $.ajax({
  url: "/admin/item/update",
  method:"POST",
  // data:[new FormData(this) , item_en_id , item_ar_id],
  data:{enid:item_en_id , arid:item_ar_id},
  dataType:'JSON',
  contentType: false,
  cache: false,
  processData: false,
  success:function(data)
  {
    console.log(data);
   $('#message_edit').css('display', 'block');
   $('#message_edit').html(data.success);
   $('#message_edit').addClass(data.class_name);
   // $('#uploaded_image').html(data.uploaded_image);
   $('#editForm').css('display','none');
   allData();
  }
 })
});

// -----------------------end edit data --------------------------------------


 
 
 </script>

@endsection