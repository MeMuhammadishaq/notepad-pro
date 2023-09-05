<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>Notepad</title> --}}
</head>
<body>
    
@include('header');
@if (session()->has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session()->get('message') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h1 class="text-center">Update Your Data</h1>
  <div class="container">
<form action="{{route('update')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="id" value="{{$edits->id}}">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Title</label>
        <input type="text" name="title"value="{{ isset($edits)? $edits->title:''}}" class="form-control">
        
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
        <textarea class="form-control"name="desc" id="editor"  rows="3">{{isset($edits)? $edits->desc: ''}}</textarea>
      </div>
      <div>
      <label for="exampleFormControlInput1" class="form-label">Image</label>
      <input type="file" name="image"value="{{ asset('images/'.$edits->image)}}" class="form-control">
    </div>
    <div>
      <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
  ClassicEditor
          .create( document.querySelector( '#editor' ) )
          .then( editor => {
                  console.log( editor );
          } )
          .catch( error => {
                  console.error( error );
          } );
</script>
</body>
</html>