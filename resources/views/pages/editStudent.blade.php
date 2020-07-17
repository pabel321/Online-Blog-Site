@extends('welcome')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
          <a href="{{route('createStudent')}}" class="btn btn-danger">Create Student</a>
          <a href="{{route('allStudent')}}" class="btn btn-info">All Student</a>
        <hr>
        <form action="{{url('updateStudent/'.$student->id)}}" method="post">
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Name</label>
              <input type="text" class="form-control" value="{{$student->name}}" name="name" >
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Email</label>
              <input type="email" class="form-control" value="{{$student->email}}" name="email" >
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Student Phone</label>
              <input type="number" class="form-control" value="{{$student->phone}}" name="phone" >
            </div>
          </div>
          <div class="form-group">
          <button type="submit" class="btn btn-primary" >Update</button>
          </div>
        </form>
        </div>
      </div>
    </div>
@endsection