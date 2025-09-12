@extends("superadmin.layouts.splayout")
@section("title", "Glass Inventory Management")
@section("content")

     <div class="py-5 container-fluid">
           <!-- Header -->
           <div class="d-flex align-items-center justify-content-between mb-4 px-3">
                 <h3 class="fw-bold">Glass Inventory List</h3>
                 <a href="{{ route('superadmin.create.glassinventory') }}" class="shadow-sm btn btn-primary btn-sm">
                       <i class="me-2 fas fa-plus"></i> Add Glass Inventory
                 </a>
           </div>

           <!-- Success Message -->
           @if(session('success'))
                  <div class="alert alert-success">{{ session('success') }}</div>
            @endif
             <div class="table-responsive p-4 card-modern">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Glass ID</th>
                    <th>Type</th>
                    <th>Thickness (mm)</th>
                    <th>Width (mm)</th>
                    <th>Height (mm)</th>
                    <th>Available Sheets</th>
                    <th>Supplier</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($glassInventories as $index => $glass)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $glass->glass_id }}</td>
                        <td>{{ $glass->glass_type }}</td>
                        <td>{{ $glass->thickness_mm }}</td>
                        <td>{{ $glass->width_mm }}</td>
                        <td>{{ $glass->height_mm }}</td>
                        <td>{{ $glass->available_sheets }}</td>
                        <td>{{ $glass->supplier->supplier_name ?? 'N/A' }}</td>
                        <td class="text-center">
                            <!-- Edit -->
                            <a href="" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>

                            <!-- Delete -->
                            <form action="" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-muted text-center">No glass inventory found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

     </div>
@endsection