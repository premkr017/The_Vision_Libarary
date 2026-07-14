@extends('layout')
@section('content')
<h2>Add New Book</h2>
<div class="card p-4">
<form action="{{ route('books.store') }}" method="POST">
@csrf
<div class="mb-3">
    <label>Book Title</label>
    <input type="text" name="title" class="form-control" required>
</div>
<div class="mb-3">
    <label>Author</label>
    <input type="text" name="author" class="form-control" required>
</div>
<div class="mb-3">
    <label>ISBN</label>
    <input type="text" name="isbn" class="form-control" required>
</div>
<div class="mb-3">
    <label>Quantity</label>
    <input type="number" name="quantity" class="form-control" required>
</div>
<div class="mb-3">
    <label>Description</label>
    <textarea name="description" class="form-control"></textarea>
</div>
<button class="btn btn-primary">Save Book</button>
<a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
</form>
</div>
@endsection
