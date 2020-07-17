@extends('welcome')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
          <a href="{{route('addCategory')}}" class="btn btn-danger">Add Category</a>
          <a href="{{route('allCategory')}}" class="btn btn-info">All Category</a>
        <hr>
        <div>
          <ol>
            <li>Category Name: {{$cat->name}}</li>
            <li>Slug Name: {{$cat->slug}}</li>
          </ol>
        </div>
        </div>
      </div>
    </div>
@endsection