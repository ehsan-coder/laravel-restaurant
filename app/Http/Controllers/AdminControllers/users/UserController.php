<?php

namespace App\Http\Controllers\AdminControllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    protected $user;
    protected $requestData;

    function __construct(){
        $this->middleware('auth');
        $this->user = new User();
        $this->requestData = Request()->all(); 
    }

    public function index(){

        // $users = $this->user->getUsers();
        return view('admin.users');
        // return $users;
    }

    public function show($id){
        return $this->user->getById($id);
    }

    public function store(){
        $data = $this->requestData;

        // validate

        $this->user->createUser($data);
        return "add user complete";
    }

    public function update($id){
        $data = $this->requestData;

        $this->user->updateUser($data,$id);
        return "user updated";
    }

    public function delete($id){
        $this->user->deleteUser($id);
        return "user deleted";
    }
}
