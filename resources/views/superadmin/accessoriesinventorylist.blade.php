@extends('superadmin.layouts.splayout')
@section('title', 'Accessories Inventory')

@section('content')
     <div class="py-5 container-fluid">
           <!-- Header -->
           <div class="d-flex align-items-center justify-content-between mb-4 px-3">
                 <h3 class="fw-bold">Accessories Inventory List</h3>
                 <a href="{{ route('superadmin.create.accessoriesinventory') }}" class="shadow-sm btn btn-primary btn-sm">
                       <i class="me-2 fas fa-plus"></i> Add Accessories Inventory
                 </a>
           </div>


           <!-- Success Message -->
           @if(session('success'))
                  <div class="alert alert-success">{{ session('success') }}</div>
            @endif

           <div class="table-responsive m-2 p-4 card-modern">
                 <table class="table table-bordered table-hover">
                       <thead class="table-light">
                              <tr>
                                    <th>Item ID</th>
                                    <th>Item Name</th>
                                    <th>Unit</th>
                                    <th>Available Qty</th>
                                    <th>Reorder Level</th>
                                    <th>Category</th>
                                    <th>Supplier</th>
                                    <th>Actions</th>
                              </tr>
                       </thead>
                       <tbody>
                              @forelse($accessories as $accessory)
                                          <tr>
                                                  <td>{{ $accessory->item_id }}</td>
                                                  <td>{{ $accessory->item_name }}</td>
                                                  <td>{{ $accessory->unit }}</td>
                                                  <td>{{ $accessory->available_qty }}</td>
                                                  <td>{{ $accessory->reorder_level }}</td>
                                                  <td>{{ $accessory->category }}</td>
                                                  <td>{{ $accessory->supplier->supplier_name ?? 'N/A' }}</td>
                                                  <td>
                                                         <!-- Edit Icon -->
                                                         <a href=""
                                                                 class="me-1 btn btn-sm btn-warning">
                                                                 <i class="fas fa-edit"></i>
                                                         </a>

                                                         <!-- Delete Icon -->
                                                         <form action=""
                                                                 method="POST" style="display:inline-block;"
                                                                 onsubmit="return confirm('Are you sure you want to delete this item?');">
                                                                 @csrf
                                                                 @method('DELETE')
                                                                 <button type="submit" class="btn btn-sm btn-danger">
                                                                         <i class="fas fa-trash-alt"></i>
                                                                 </button>
                                                         </form>
                                                  </td>
                                          </tr>
                                    @empty
                                          <tr>
                                                  <td colspan="8" class="text-center">No accessories found.</td>
                                          </tr>
                                    @endforelse
                       </tbody>
                 </table>
           </div>
     </div>
@endsection