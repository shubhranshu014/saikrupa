@extends("superadmin.layouts.splayout")

@section("title", "Inventory Management")

@section("content")
        <div class="py-5 container-fluid">
                        <!-- Header -->
                        <div class="d-flex align-items-center justify-content-between mb-4 px-3">
                                        <h3 class="fw-bold">Profiles Inventory List</h3>
                                        <a href="{{ route('superadmin.create.profilesinventory') }}" class="shadow-sm btn btn-primary btn-sm">
                                                        <i class="me-2 fas fa-plus"></i> Add Profiles Inventory
                                        </a>
                        </div>


                        <!-- Success Message -->
                        @if(session('success'))
                                                        <div class="alert alert-success">{{ session('success') }}</div>
                                        @endif

<div class="table-responsive m-2 p-4 card-modern">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Profile ID</th>
                    <th>Profile Name</th>
                    <th>Type</th>
                    <th>Material</th>
                    <th>Color</th>
                    <th>Length (mm)</th>
                    <th>Available Bars</th>
                    <th>Supplier</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($inventories as $inventory)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $inventory->profile_id }}</td>
                    <td>{{ $inventory->profile_name }}</td>
                    <td>{{ $inventory->profile_type }}</td>
                    <td>{{ $inventory->material }}</td>
                    <td>{{ $inventory->color }}</td>
                    <td>{{ $inventory->length_mm }}</td>
                    <td>{{ $inventory->available_bars }}</td>
                    <td>{{ $inventory->supplier->supplier_name ?? '-' }}</td>
                    <td class="text-center">
                        <!-- Edit -->
                        <a href="" 
                           class="me-1 btn btn-sm btn-warning" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>

                        <!-- Delete -->
                        <form action="" 
                              method="POST" style="display:inline-block;" 
                              onsubmit="return confirm('Are you sure you want to delete this profile?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="11" class="text-muted text-center">No inventory found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
        </div>
@endsection