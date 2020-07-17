@extends('welcome')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-lg-6 col-md-10 mx-auto">
          <a href="{{route('addCategory')}}" class="btn btn-danger">Add Category</a>
          <a href="{{route('allCategory')}}" class="btn btn-info">All Category</a>
        <div>
          
            <h3>{{$category->title}}</h3>
            <img src="{{URL::to($category->image)}}" height="340px;">
            <p>{{$category->name}}</p>
            <p>{{$category->details}}</p>
          
        </div>
        </div>
      </div>
    </div>
@endsection