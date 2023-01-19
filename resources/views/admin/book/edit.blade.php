@extends('backend.master')
@section('content')
<form action="{{route("book-update", $book->id)}}" method="post">
  @csrf
  @method("PUT")
  <div class="form-group">
    <label for="name">Nama</label>
    <input name="name" type="text" value="{{$book->name}}" class="form-control" id="name"  >
    @error('name')
    <span class="text-danger" >
        <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
  <div class="form-group">
      <label for="author">Penulis</label>
      <input name="author" type="text" value="{{$book->author}}" class="form-control" id="author"  >
      @error('author')
      <span class="text-danger" >
          <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  <div class="form-group">
      <label for="year">Tahun Terbit</label>
      <input name="year" type="text" value="{{$book->year}}" class="form-control" id="year"  >
      @error('year')
      <span class="text-danger" >
          <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection