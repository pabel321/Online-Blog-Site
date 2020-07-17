@extends('welcome')

@section('content')
<div class="container">
      <div class="col-lg-8 col-md-10 mx-auto">
          <a href="{{route('addCategory')}}" class="btn btn-danger">Add Category</a>
          <a href="{{route('allCategory')}}" class="btn btn-info">All Category</a>
          <a href="{{route('allPost')}}" class="btn btn-info">All Post</a>
        <hr>
        <form action="{{route('storePost')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Title</label>
              <input type="text" class="form-control" placeholder="Title" name="title" required >
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category</label>
              <select class="form-control" name="category_id">

                @foreach($category as $row)
                <option value="{{$row->id}}">{{$row->name}}</option>
                @endforeach

              </select>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Post Image</label>
              <input type="file" class="form-control" required name="image">
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Details</label>
              <textarea rows="5" class="form-control" placeholder="Details" name="details" required ></textarea>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
        </form>
      </div>
    </div>
@endsection