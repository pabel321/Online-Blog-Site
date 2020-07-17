@extends('welcome')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
          <a href="{{route('createStudent')}}" class="btn btn-danger">Create Student</a>
          
          <hr>
          <table class="table table-responsive">

            <tr>
            <th>SL</th>
            <th>Student Name</th>
            <th>Student Email</th>
            <th>Student Phone</th>
            <th>Action</th>
            </tr>
            
            @foreach($student as $row)
            <tr>
            <td>{{$row->id}}</td>
            <td>{{$row->name}}</td>
            <td>{{$row->email}}</td>
            <td>{{$row->phone}}</td>
            <td>
              <a href="{{url('editStudent/'.$row->id)}}" class="btn btn-sm btn-info">Edit</a>
              <a href="{{url('deleteStudent/'.$row->id)}}" class="btn btn-sm btn-danger">Delete</a>
              <a href="{{url('viewStudent/'.$row->id)}}" class="btn btn-sm btn-success">View</a>
            </td>
            </tr>
            @endforeach

          </table>
        </div>
      </div>
    </div>
@endsection