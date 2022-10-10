@extends('layouts.app')
@section('title', 'lihat')
@section('content')
<div class="wrapper">
	<h1 style="text-align: center;">Lihat Book</h1>

	<!-- Button trigger modal -->
	<a href="{{ route('home')}}" class="btn btn-primary mb-3">
	Back
	</a>

	<ol class="list-group list-group-numbered">
	  <li class="list-group-item d-flex justify-content-between align-items-start">
	    <div class="ms-2 me-auto">
	      <div class="fw-bold">Judul Buku</div>
	      {{$table->book_title}}
	    </div>
	  </li>
	  <li class="list-group-item d-flex justify-content-between align-items-start">
	    <div class="ms-2 me-auto">
	      <div class="fw-bold">Description</div>
	      {{$table->description}}
	    </div>
	  </li>

	  <li class="list-group-item d-flex justify-content-between align-items-start">
	    <div class="ms-2 me-auto">
	      <div class="fw-bold">Kategori</div>
	      {{$table->category}}
	    </div>
	  </li>
	  <li class="list-group-item d-flex justify-content-between align-items-start">
	    <div class="ms-2 me-auto">
	      <div class="fw-bold">Keywords</div>
	      {{$table->keywords}}
	    </div>
	  </li>

	  <li class="list-group-item d-flex justify-content-between align-items-start">
	    <div class="ms-2 me-auto">
	      <div class="fw-bold">Harga</div>
	      {{$table->price}}
	    </div>
	  </li>
	  <li class="list-group-item d-flex justify-content-between align-items-start">
	    <div class="ms-2 me-auto">
	      <div class="fw-bold">Stok</div>
	      {{$table->stock}}
	    </div>
	  </li>

	  <li class="list-group-item d-flex justify-content-between align-items-start">
	    <div class="ms-2 me-auto">
	      <div class="fw-bold">Penerbit</div>
	      {{$table->publisher}}
	    </div>
	  </li>
	</ol>
</div>
@endsection