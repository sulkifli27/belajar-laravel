@extends('backend.master')
@section('content')
<form action="{{route("book-store")}}" method="post">
  @csrf
  <div class="form-group">
    <label for="name">Nama</label>
    <input name="name" type="text" class="form-control" id="name"  >
    @error('name')
    <span class="text-danger" >
        <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
  <div class="form-group">
    <select class="form-control"  name="category_id" id="">
        <option label="Pilih Category"></option>
        @foreach ($category as $item)      
        <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
    @error('category_id')
    <span class="text-danger" >
        <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="form-group">
      <label for="author">Penulis</label>
      <input name="author" type="text" class="form-control" id="author"  >
      @error('author')
      <span class="text-danger" >
          <strong>{{ $message }}</strong>
      </span>
      @enderror
  </div>
  <div class="form-group">
      <label for="year">Tahun Terbit</label>
      <input name="year" type="text" class="form-control" id="year"  >
      @error('year')
      <span class="text-danger" >
          <strong>{{ $message }}</strong>
      </span>
      @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection