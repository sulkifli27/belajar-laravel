@extends('backend.master')
@section('content')
  <div class="card card-body">
    <div class="row">
      <a href="{{route("book-create")}}" class="btn btn-primary">Create Data</a>
    </div>
    <table class="table table-striped mt-3">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Penulis</th>
          <th scope="col">Tahun Terbit</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($books as $key => $item)
          <tr>
              <th scope="row">{{$key + 1}}</th>
              <td>{{$item->name}}</td>
              <td>{{$item->author}}</td>
              <td>{{$item->year}}</td>
              <td>
                  <a class="btn btn-primary" href="{{route("book-edit", $item->id)}}">
                      Edit
                  </a>
                  <form action="{{route("book-delete", $item->id)}}" method="post" style="display: inline"
                      class="form-check-inline">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger"
                          type="submit ">Hapus</button>
                  </form>
              </td>
          </tr>
          @endforeach
      </tbody>
    </table>
  </div>
@endsection

