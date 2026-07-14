@extends('layout')
@section('content')

<div class="d-flex justify-content-between mb-3">
    <h2><i class="bi bi-people"></i> Members List</h2>
    <a href="{{ route('members.create') }}" class="btn btn-success">+ Add Member</a>
</div>

@if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif

<div class="card">
<table class="table table-striped mb-0">
<thead class="table-dark">
    <tr><th>#</th><th>Member ID</th><th>Name</th><th>Phone</th><th>Email</th><th>Action</th></tr>
</thead>
<tbody>
@forelse($members as $member)
<tr>
    <td>{{ $member->id }}</td>
    <td><span class="badge bg-primary">{{ $member->member_id }}</span></td>
    <td>{{ $member->name }}</td>
    <td>{{ $member->phone }}</td>
    <td>{{ $member->email }}</td>
    <td>
        <a href="{{ route('members.edit',$member->id) }}" class="btn btn-warning btn-sm">Edit</a>
        <form action="{{ route('members.destroy',$member->id) }}" method="POST" style="display:inline">
            @csrf @method('DELETE')
            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete?')">Delete</button>
        </form>
    </td>
</tr>
@empty
<tr><td colspan="6" class="text-center">Koi member nahi hai</td></tr>
@endforelse
</tbody>
</table>
</div>
{{ $members->links() }}
@endsection
