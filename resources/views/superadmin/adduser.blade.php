@extends('superadmin.layouts.splayout')

@section('title', 'Add User')

@section('content')
<div class="py-5 container-fluid">

    <!-- Header -->
    <div class="d-flex align-items-center justify-content-between px-3">
        <h3 class="fw-bold">Add User</h3>
        <a href="{{ route('superadmin.userlist') }}" class="btn btn-secondary btn-sm">
            <i class="fa-arrow-left me-2 fas"></i> Back
        </a>
    </div>

    <!-- Form -->
    <div class="m-2 p-4 card-modern">
        <form action="{{ route('superadmin.storeuser') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold">Name <span class="text-danger">*</span></label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Password <span class="text-danger">*</span></label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Role <span class="text-danger">*</span></label>
                <input type="text" name="role" class="form-control @error('role') is-invalid @enderror" >
                @error('role') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="btn btn-success"><i class="me-2 fas fa-save"></i> Save User</button>
        </form>
    </div>

</div>
@endsection
