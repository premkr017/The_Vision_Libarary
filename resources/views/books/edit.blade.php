@extends('layout')
@section('content')
<h2>Edit Book</h2>
<div class="card p-4">
<form action="{{ route('books.update',$book->id) }}" method="POST">
@csrf @method('PUT')
<div class="mb-3">
    <label>Book Title</label>
    <input type="text" name="title" value="{{ $book->title }}" class="form-control" required>
</div>
<div class="mb-3">
    <label>Author</label>
    <input type="text" name="author" value="{{ $book->author }}" class="form-control" required>
</div>
<div class="mb-3">
    <label>ISBN</label>
    <input type="text" name="isbn" value="{{ $book->isbn }}" class="form-control" required>
</div>
<div class="mb-3">
    <label>Quantity</label>
    <input type="number" name="quantity" value="{{ $book->quantity }}" class="form-control" required>
</div>
<div class="mb-3">
    <label>Description</label>
    <textarea name="description" class="form-control">{{ $book->description }}</textarea>
</div>
<button class="btn btn-primary">Update Book</button>
<a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
</form>
</div>
@endsection
