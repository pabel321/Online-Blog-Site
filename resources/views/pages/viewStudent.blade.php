@extends('welcome')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
          <a href="{{route('createStudent')}}" class="btn btn-danger">Create Student</a>
          <a href="{{route('allStudent')}}" class="btn btn-info">All Student</a>
        <hr>
        <div>
          <ol>
            <li>Student Name: {{$student->name}}</li>
            <li>Student Email: {{$student->email}}</li>
            <li>Student Phone: {{$student->phone}}</li>
          </ol>
        </div>
        </div>
      </div>
    </div>
@endsection