@extends('admin.admin_master')


@section('admin_content')

<section style="padding-top: 60px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">            

     <div class="card" style="margin-top:-50px;">
            <div class="card-header Cd-Hd">
                        Categories 
                        {{-- <span id="addI">add new item</span>
                        <span id="updateI">update item</span> --}}
                        {{-- <a class="btn btn-success" style="margin-bottom: 10px" style="margin-right:10px" data-toggle="modal" data-target="#itemModal">Add Item</a> --}}
                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#itemModal">
                          add item
                        </button> --}}
                        <div class="Add"> 
                          <button class="btn btn-warning" data-toggle="modal" data-target="#additems">Add category</button>
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
                                {{-- <!-- @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$user->address}}</td>
                                        <td>{{$user->role}}</td>
                                    </tr>
                                @endforeach --> --}}
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

      <form id="addIte" method="GET" enctype="multipart/form-data">
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
                <div class="form-group">
                    <label for="descriptionEn">description En</label>
                    <input type="text" class="form-control" id="descriptionEn" name="descE">
                </div>
                <div class="form-group">
                    <label for="descriptionAr">description Ar</label>
                    <input type="text" class="form-control" id="descriptionAr" name="descA">
                </div>
                
                <div class="form-group">
                    <label for="password">price</label>
                    <input type="text" class="form-control" id="price" name="price">
                </div>
        
                <div class="form-group">
                    <label class="form-label" for="customFile">Image</label>
                    <input type="file" class="form-control" name="image" />
                </div>
         
           
    
        </div>

        <div class="modal_footer">
          {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">Close</button> --}}
          <button type="button" class="btn btn-secondary close" data-dismiss="modal" aria-label="Close">Close</button>
          <button type="submit" id="addItem" class="btn btn-primary">Add Item</button>
        </div>
      </form>
       
      </div>
    </div>
  </div>
 <!--end Modal create -->

@endsection