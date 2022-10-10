@extends('layouts.app')
@section('title', 'Create')
@section('content')
<div class="wrapper">
	<h1 style="text-align: center;">Create List</h1>
	@if(count($errors))
	    @foreach($errors->all() as $error)
	        <div class="alert alert-danger alert-dismissible mb-3 mt-3">
	            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
	            {{$error}}
	        </div>
	    @endforeach
	@endif
	@if($alert_toast = Session::get('alert_toast'))
	    <div class="alert alert-{{$alert_toast['type']}} alert-dismissible mb-3 mt-3">
	        {{$alert_toast['title']}}</h4>
	        {{$alert_toast['text']}}
	    </div>
	@endif
	<div class="row">
		<form class="col-lg-6" action="{{route('create')}}" method="post">
			@csrf
			<div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">Judul Buku</label>
				<input type="text" class="form-control" name="book_title">
			</div>
			<div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">Description</label>
				<input type="text" class="form-control" name="description">
			</div>
			<div class="mb-3">
				<label for="exampleInputPassword1" class="form-label">Kategori</label>
				<input type="text" class="form-control" name="category">
			</div>
			<div class="mb-3">
				<label for="exampleInputPassword1" class="form-label">Keywords</label>
				<input type="text" class="form-control" name="keywords">
			</div>
			<div class="mb-3">
				<label for="exampleInputPassword1" class="form-label">Harga</label><br>
				<input type="text" class="form-control" name="price">
			</div>
			<div class="mb-3">
				<label for="exampleInputPassword1" class="form-label">Stok</label><br>
				<input type="text" class="form-control" name="stock">
			</div>
			<div class="mb-3">
				<label for="exampleInputPassword1" class="form-label">Penerbit</label><br>
				<input type="text" class="form-control" name="publisher">
			</div>
			<div class="mb-3">
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
		</form>
	</div>
</div>
@endsection