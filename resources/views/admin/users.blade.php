@extends('admin.admin_master')

@section('admin_content')
    <section style="padding-top: 60px">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="#" class="btn btn-success" style="margin-bottom: 10px" data-toggle="modal" data-target="#userModal">Add User</a>
                    <div class="card">
                        <div class="card-header">
                            Users 
                        </div>
                        <div class="card-body">
                            
                            <table id="userTable" class="table">
                                <thead>
                                    <tr>
                                        <th>name</th>
                                        <th>email</th>
                                        <th>phone</th>
                                        <th>address</th>
                                        <th>role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>{{$user->address}}</td>
                                            <td>{{$user->role}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


  
  <!-- Modal -->
  <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form id="userForm">
                @csrf
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="text" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="password">password</label>
                    <input type="text" class="form-control" id="password">
                </div>
                <div class="form-group">
                    <label for="phone">phone</label>
                    <input type="text" class="form-control" id="phone">
                </div>
                <div class="form-group">
                    <label for="address">address</label>
                    <input type="text" class="form-control" id="address">
                </div>
                <div class="form-group">
                    <label for="role">role</label>
                    <input type="text" class="form-control" id="role">
                </div>
               
               <button type="submit" class="btn btn-primary">Submit</button>
            </form>
    
        </div>
    
       
      </div>
    </div>
  </div>

  @section('script')
      <script>
          $("#userForm").submit(function(e){
            e.preventDefault();

            let name = $("#name").val();
            let email = $("#email").val();
            let password = $("#password").val();
            let phone = $("#phone").val();
            let address = $("#address").val();
            let role = $("#role").val();
            // let _token = $("input[name=_token]").val();

            $.ajax({
                type: "POST",
                url: "{{route('user.add')}}",
                data: {
                    name:name,
                    email:email,
                    password:password,
                    phone:phone,
                    address:address,
                    role:role,
                    // _token:_token
                },
                
                success:function (response) {
                    if(response)
                    {
                        $("#userTable tbody").prepend('<tr><td>'+response.name+'</td><td>'+response.email+'</td><td>'+response.password+'</td><td>'+response.phone+'</td><td>'+response.address+'</td><td>'+response.role+'</td></tr>')
                        $("#userForm")[0].reset();
                        $("#userModal").modal('hide');
                       
                        console.log("add success");
                    }
                }
            });
          });
      </script>
  @endsection

  
@endsection