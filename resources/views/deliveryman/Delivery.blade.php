@extends('layouts.app')

@section('content')
    
         <table class="table-added">
        <thead>
            <tr>
                <th>Order_Num</th>
                <th>Order</th>
                <th>phone</th>
                <th>Address</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <th>1</th>
            <th>Pizaa</th>
            <th>0353221</th>
            <th>Damas</th>
            <th></th>
            <th> <button class="btn btn-warning2" data-toggle="modal" data-target="#add">Add</button> </th>

            <tr>
            <th>2</th>
            <th>Pizaa</th>
            <th>0353221</th>
            <th>Damas</th>
            <th></th>
            <th> <button class="btn btn-warning2" data-toggle="modal" data-target="#add">Add</button> </th>

            </tr>
              <tr>
            <th>3</th>
            <th>Pizaa</th>
            <th>0353221</th>
            <th>Damas</th>
            <th></th>
            <th> <button class="btn btn-warning2" data-toggle="modal" data-target="#add">Add</button> </th>

            </tr>
        </thead>
        <tbody></tbody>
    </table>
    
@endsection