@extends('superadmin.layouts.splayout')
@section('title', 'Product')
@section('content')
     <div class="py-5 container-fluid">
           <!-- Header -->
           <div class="d-flex align-items-center justify-content-between mb-4 px-3">
                 <h3 class="fw-bold">Product List</h3>
                 <a href="{{ route('superadmin.create.product') }}" class="shadow-sm btn btn-primary btn-sm">
                       <i class="me-2 fas fa-plus"></i> Add Product
                 </a>
           </div>


           <!-- Success Message -->
           @if(session('success'))
                  <div class="alert alert-success">{{ session('success') }}</div>
            @endif

           <div class="table-responsive m-2 p-4 card-modern">
                 <table class="table table-hover table-striped align-middle">
                       <thead class="table-light">
                              <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Dimensions</th>
                                    <th>Selling Price</th>
                                    <th>Cost Price</th>
                                    <th>Quantity</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                              </tr>
                       </thead>
                       <tbody>
                              @forelse ($products as $product)
                                          <tr>
                                                  <td>{{ $loop->iteration }}</td>
                                                  <td>{{ $product->product_name }}</td>
                                                  <td>{{ $product->category }}</td>
                                                  <td>{{ $product->dimensions ?? '-' }}</td>
                                                  <td>${{ number_format($product->selling_price, 2) }}</td>
                                                  <td>
                                                         {{ $product->cost_price !== null ? '$' . number_format($product->cost_price, 2) : '-' }}
                                                  </td>
                                                  <td>{{ $product->quantity }}</td>
                                                  <td>{{ $product->created_at->format('Y-m-d') }}</td>
                                                  <td>
                                                         <a href="" class="btn btn-sm btn-primary">
                                                                 <i class="fas fa-edit"></i>
                                                         </a>
                                                         <form action="" method="POST"
                                                                 class="d-inline"
                                                                 onsubmit="return confirm('Are you sure you want to delete this product?');">
                                                                 @csrf
                                                                 @method('DELETE')
                                                                 <button class="btn btn-sm btn-danger">
                                                                         <i class="fas fa-trash"></i>
                                                                 </button>
                                                         </form>
                                                  </td>
                                          </tr>
                                    @empty
                                          <tr>
                                                  <td colspan="9" class="text-muted text-center">No products found.</td>
                                          </tr>
                                    @endforelse
                       </tbody>
                 </table>
           </div>
     </div>
@endsection