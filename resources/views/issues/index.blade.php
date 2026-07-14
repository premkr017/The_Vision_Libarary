@extends('layout')
@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Issued Books</h2>
    <a href="{{ route('issues.create') }}" class="btn btn-success">+ Issue Book</a>
</div>

@if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif

<div class="card">
<table class="table table-striped">
<thead class="table-dark">
    <tr><th>#</th><th>Book</th><th>Member</th><th>Issue Date</th><th>Status</th><th>Fine</th><th>Action</th></tr>
</thead>
<tbody>
@foreach($issues as $issue)
<tr>
    <td>{{ $issue->id }}</td>
    <td>{{ $issue->book->title }}</td>
    <td>{{ $issue->member->name }}</td>
    <td>{{ $issue->issue_date }}</td>
    <td>
        @if($issue->status == 'issued')
            <span class="badge bg-warning">Issued</span>
        @else
            <span class="badge bg-success">Returned</span>
        @endif
    </td>
    <td>₹{{ $issue->fine }}</td>
    <td>
        @if($issue->status == 'issued')
        <form action="{{ route('issues.return',$issue->id) }}" method="POST" style="display:inline">
            @csrf
            <button class="btn btn-primary btn-sm">Return</button>
        </form>
        @endif
    </td>
</tr>
@endforeach
</tbody>
</table>
</div>
@endsection
