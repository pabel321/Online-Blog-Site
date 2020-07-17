@extends('welcome')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
          <a href="{{route('addCategory')}}" class="btn btn-danger">Add Category</a>
          <a href="{{route('allCategory')}}" class="btn btn-info">All Category</a>
        <hr>
        <form action="{{url('storeCategory')}}" method="post">
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category Name</label>
              <input type="text" class="form-control" placeholder="Category Name" name="name" >
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Slug Name</label>
              <input type="text" class="form-control" placeholder="Slug Name" name="slug" >
            </div>
          </div>
          <div class="form-group">
          <button type="submit" class="btn btn-primary" >Submit</button>
          </div>
        </form>
        </div>
      </div>
    </div>
@endsection