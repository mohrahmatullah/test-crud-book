@extends('layouts.app')
@section('title', 'List')
@section('content')

<div class="wrapper">
  <h1 style="text-align: center;">All Book</h1>
  @if($alert_toast = Session::get('alert_toast'))
      <div class="alert alert-{{$alert_toast['type']}} alert-dismissible">
          {{$alert_toast['title']}}</h4>
          {{$alert_toast['text']}}
      </div>
  @endif
  <form action="{{ route('home') }}" method="GET">
    <div class="row">
      <div class="col-lg-2">
        <label for="exampleFormControlInput1" class="form-label">Book Title</label>
        <input type="text" class="form-control" name="book_title" value="{{ isset(Request::query()['book_title']) ? Request::query()['book_title'] : '' }}">
      </div>
      <div class="col-lg-2">
        <label for="exampleFormControlInput1" class="form-label">Description</label>
        <input type="text" class="form-control" name="description" value="{{ isset(Request::query()['description']) ? Request::query()['description'] : '' }}">
      </div>
      <div class="col-lg-2">
        <label for="exampleFormControlInput1" class="form-label">Category</label>
        <input type="text" class="form-control" name="category" value="{{ isset(Request::query()['category']) ? Request::query()['category'] : '' }}">
      </div>
      <div class="col-lg-2">
        <label for="exampleFormControlInput1" class="form-label">Keywords</label>
        <input type="text" class="form-control" name="keywords" value="{{ isset(Request::query()['keywords']) ? Request::query()['keywords'] : '' }}">
      </div>
      <div class="col-lg-2">
        <label for="exampleFormControlInput1" class="form-label">Price</label>
        <input type="text" class="form-control" name="price" value="{{ isset(Request::query()['price']) ? Request::query()['price'] : '' }}">
      </div>
      <div class="col-lg-1">
        <label for="exampleFormControlInput1" class="form-label">Publisher</label>
        <input type="text" class="form-control" name="publisher" value="{{ isset(Request::query()['publisher']) ? Request::query()['publisher'] : '' }}">
      </div>
    </div>
    <div class="row mt-3 mb-3">
      <div class="col-lg-1">
        <input type="submit" class="btn btn-primary" value="Search">
      </div>
    </div>
  </form>


  <!-- Button trigger modal -->
  <a href="{{ route('add')}}" class="btn btn-primary mb-3">
    Create
  </a>
  <form method="post" action="{{ route('multiple-delete') }}">
    @csrf
    <table class="table">
      <thead>
      <tr>
        <th scope="col" class="col-1"><input type="checkbox" id="checkAll"> All</th>
        <th scope="col">No</th>
        <th scope="col">Judul Buku</th>
        <th scope="col">Description</th>
        <th scope="col">Kategori</th>
        <th scope="col">KeyWords</th>
        <th scope="col">Harga</th>
        <th scope="col">Stok</th>
        <th scope="col">Penerbit</th>
        <th scope="col" class="col-2">Action</th>
      </tr>
      </thead>
      <tbody>
        @foreach ($table as $post)
        <tr>
          <td><input name='id[]' type="checkbox" id="checkItem" value="<?php echo $post->id; ?>"></td>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $post->book_title}}</td>
          <td>{{ $post->description }}</td>
          <td>{{ $post->category }}</td>
          <td>{{ $post->keywords }}</td>
          <td>{{ $post->price }}</td>
          <td>{{ $post->stock }}</td>
          <td>{{ $post->publisher }}</td>
          <td><a class="btn btn-warning" href="{{ route('edit', $post->id)}}">Edit</a>&nbsp;&nbsp;<a class="btn btn-secondary" href="{{ route('view', $post->id)}}">view</a>&nbsp;&nbsp;<a class="btn btn-primary" href="{{ route('delete', $post->id)}}">Delete</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>

    {!! $table->appends(Request::capture()->except('page'))->render('layouts.paginate') !!}

    <input class="btn btn-success" type="submit" name="submit" value="Delete All Book"/>
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script language="javascript">
  $("#checkAll").click(function () {
    $('input:checkbox').not(this).prop('checked', this.checked);
  });
</script>
@endsection