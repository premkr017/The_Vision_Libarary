@extends('layout')
@section('content')

<div class="d-flex justify-content-between mb-3">
    <h2>Books List</h2>
    <a href="{{ route('books.create') }}" class="btn btn-success">+ Add New Book</a>
</div>

@if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif

<div class="card">
<table class="table table-striped mb-0">
<thead class="table-dark">
    <tr><th>#</th><th>Title</th><th>Author</th><th>ISBN</th><th>Qty</th><th>Action</th></tr>
</thead>
<tbody>
@forelse($books as $book)
<tr>
    <td>{{ $book->id }}</td>
    <td>{{ $book->title }}</td>
    <td>{{ $book->author }}</td>
    <td>{{ $book->isbn }}</td>
    <td>{{ $book->quantity }}</td>
    <td>
        <a href="{{ route('books.edit',$book->id) }}" class="btn btn-warning btn-sm">Edit</a>
        <form action="{{ route('books.destroy',$book->id) }}" method="POST" style="display:inline">
            @csrf @method('DELETE')
            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">Delete</button>
        </form>
    </td>
</tr>
@empty
<tr><td colspan="6" class="text-center">Koi book nahi hai</td></tr>
@endforelse
</tbody>
</table>
</div>
{{ $books->links() }}
@endsection
