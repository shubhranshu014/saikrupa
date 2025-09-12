@extends('superadmin.layouts.splayout')
@section('title', 'Business Contact List')

@section('content')
<div class="py-5 container-fluid">

    <!-- Header -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h3 class="fw-bold">Business Contact</h3>
        <a href="{{ route('contact.create') }}" class="shadow-sm btn btn-primary btn-sm">
            <i class="me-2 fas fa-plus"></i> Add Business Contact
        </a>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- User Table -->
    <div class="table-responsive p-4 card-modern" style="max-width: 800px; margin: auto;">
        <table class="table table-hover table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Contact</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($bussinessContacts as $bc)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $bc->name }}</td>
                        <td>
                            <!-- Example action buttons -->
                            <a href="" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No business contacts found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
