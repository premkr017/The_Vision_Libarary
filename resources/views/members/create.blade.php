@extends('layout')
@section('content')
    <h2>Add New Member</h2>
    <div class="card p-4">
        <form action="{{ route('members.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Member ID</label>
                <input type="text" name="member_id" class="form-control" placeholder="LIB001" required>
            </div>
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="mb-3">
                <label>Address</label>
                <textarea name="address" class="form-control" required></textarea>
            </div>
            <button class="btn btn-primary">Save Member</button>
            <a href="{{ route('members.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
