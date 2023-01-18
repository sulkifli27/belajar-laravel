<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Halaman Index</title>
  </head>
  <body>
      <div class="container mt-5">
        <a href="{{route("book-create")}}" class="btn btn-primary">Create Data</a>
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>