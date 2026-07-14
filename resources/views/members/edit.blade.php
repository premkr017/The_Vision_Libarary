@extends('layout')
@section('content')
<h2>Edit Member</h2>
<div class="card p-4">
<form action="{{ route('members.update',$member->id) }}" method="POST">
@csrf @method('PUT')
<div class="mb-3">
    <label>Member ID</label>
    <input type="text" name="member_id" value="{{ $member->member_id }}" class="form-control" required>
</div>
<div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" value="{{ $member->name }}" class="form-control" required>
</div>
<div class="mb-3">
    <label>Phone</label>
    <input type="text" name="phone" value="{{ $member->phone }}" class="form-control" required>
</div>
<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" value="{{ $member->email }}" class="form-control">
</div>
<div class="mb-3">
    <label>Address</label>
    <textarea name="address" class="form-control" required>{{ $member->address }}</textarea>
</div>
<button class="btn btn-primary">Update Member</button>
<a href="{{ route('members.index') }}" class="btn btn-secondary">Back</a>
</form>
</div>
@endsection
