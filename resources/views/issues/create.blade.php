@extends('layout')
@section('content')
<h2>Issue Book</h2>
<div class="card p-4">
<form action="{{ route('issues.store') }}" method="POST">
@csrf
<div class="mb-3">
    <label>Select Member</label>
    <select name="member_id" class="form-control" required>
        <option value="">-- Select Member --</option>
        @foreach($members as $member)
        <option value="{{ $member->id }}">{{ $member->member_id }} - {{ $member->name }}</option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label>Select Book</label>
    <select name="book_id" class="form-control" required>
        <option value="">-- Select Book --</option>
        @foreach($books as $book)
        <option value="{{ $book->id }}">{{ $book->title }} - Available: {{ $book->quantity }}</option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label>Issue Date</label>
    <input type="date" name="issue_date" value="{{ date('Y-m-d') }}" class="form-control" required>
</div>
<button class="btn btn-primary">Issue Book</button>
</form>
</div>
@endsection
