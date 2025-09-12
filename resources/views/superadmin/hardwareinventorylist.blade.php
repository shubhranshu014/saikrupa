@extends("superadmin.layouts.splayout")
@section("title", "Hardware Inventory Management")

@section("content")
     <div class="py-5 container-fluid">
           <!-- Header -->
           <div class="d-flex align-items-center justify-content-between mb-4 px-3">
                 <h3 class="fw-bold">Hardware Inventory List</h3>
                 <a href="{{ route('superadmin.create.hardwareinventory') }}" class="shadow-sm btn btn-primary btn-sm">
                       <i class="me-2 fas fa-plus"></i> Add Hardware Inventory
                 </a>
           </div>


           <!-- Success Message -->
           @if(session('success'))
                  <div class="alert alert-success">{{ session('success') }}</div>
            @endif

           <div class="table-responsive m-2 p-4 card-modern">

                 <table class="table table-bordered table-striped">
                       <thead class="table-light">
                              <tr>
                                    <th>#</th>
                                    <th>Hardware ID</th>
                                    <th>Name</th>
                                    <th>Application</th>
                                    <th>Unit</th>
                                    <th>Available Qty</th>
                                    <th>Reorder Level</th>
                                    <th>Brand</th>
                                    <th>Supplier</th>
                                    <th>Actions</th>
                              </tr>
                       </thead>
                       <tbody>
                              @forelse($hardwareInventories as $index => $hardware)
                                          <tr>
                                                  <td>{{ $index + 1 }}</td>
                                                  <td>{{ $hardware->hardware_id }}</td>
                                                  <td>{{ $hardware->hardware_name }}</td>
                                                  <td>{{ $hardware->application }}</td>
                                                  <td>{{ $hardware->unit }}</td>
                                                  <td>{{ $hardware->available_qty }}</td>
                                                  <td>{{ $hardware->reorder_level }}</td>
                                                  <td>{{ $hardware->brand }}</td>
                                                  <td>{{ $hardware->supplier->supplier_name ?? 'N/A' }}</td>
                                                  <td>
                                                         {{-- Edit Icon --}}
                                                         <a href=""
                                                                 class="btn btn-sm btn-warning" title="Edit">
                                                                 <i class="fas fa-edit"></i>
                                                         </a>

                                                         {{-- Delete Icon --}}
                                                         <form action="" method="POST"
                                                                 style="display:inline-block;"
                                                                 onsubmit="return confirm('Are you sure you want to delete this item?');">
                                                                 @csrf
                                                                 @method('DELETE')
                                                                 <button class="btn btn-sm btn-danger" title="Delete">
                                                                         <i class="fas fa-trash"></i>
                                                                 </button>
                                                         </form>
                                                  </td>
                                          </tr>
                                    @empty
                                          <tr>
                                                  <td colspan="10" class="text-center">No hardware inventory found.</td>
                                          </tr>
                                    @endforelse
                       </tbody>
                 </table>
           </div>
     </div>


@endsection