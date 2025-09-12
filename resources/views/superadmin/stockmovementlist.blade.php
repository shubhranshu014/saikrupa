@extends("superadmin.layouts.splayout")
@section("title", "Stock Movement")

@section('content')
     <div class="py-5 container-fluid">
           <!-- Header -->
           <div class="d-flex align-items-center justify-content-between mb-4 px-3">
                 <h3 class="fw-bold">Stock Movement List</h3>
                 <a href="{{ route('superadmin.create.stock-movement') }}" class="shadow-sm btn btn-primary btn-sm">
                       <i class="me-2 fas fa-plus"></i> Add Stock Movement
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
                                    <th>Movement ID</th>
                                    <th>Product Name</th>
                                    <th>Movement Type</th>
                                    <th>Quantity</th>
                                    <th>Reference</th>
                                    <th>Date</th>
                                    <th>Store</th>
                                    <th>Actions</th>
                              </tr>
                       </thead>
                       <tbody>
                              @forelse($movements as $movement)
                                          <tr>
                                                  <td>{{ $movement->movement_id }}</td>
                                                  <td>{{ $movement->product->product_name }}</td>
                                                  <td>{{ $movement->movement_type }}</td>
                                                  <td>{{ $movement->quantity }}</td>
                                                  <td>{{ $movement->reference }}</td>
                                                  <td>{{ \Carbon\Carbon::parse($movement->date)->format('d-m-Y H:i') }}</td>
                                                  <td>{{ $movement->store->name ?? 'N/A' }}</td>
                                                  <td>
                                                         <a href=""
                                                                 class="btn btn-sm btn-warning">
                                                                 <i class="fas fa-edit"></i>
                                                         </a>
                                                         <form action="" method="POST"
                                                                 style="display:inline-block;">
                                                                 @csrf
                                                                 @method('DELETE')
                                                                 <button type="submit" class="btn btn-sm btn-danger"
                                                                         onclick="return confirm('Are you sure?')">
                                                                         <i class="fas fa-trash"></i>
                                                                 </button>
                                                         </form>
                                                  </td>
                                          </tr>
                                    @empty
                                          <tr>
                                                  <td colspan="9" class="text-center">No stock movements found</td>
                                          </tr>
                                    @endforelse
                       </tbody>
                 </table>

           </div>
     </div>
@endsection