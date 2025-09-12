@extends('superadmin.layouts.splayout')
@section('title', 'product')

@section('content')
     <div class="py-5 container-fluid">
           <!-- Header -->
           <div class="d-flex align-items-center justify-content-between px-3">
                 <h3 class="fw-bold">Add Product</h3>
                 <a href="{{ route('superadmin.product.list') }}" class="btn btn-secondary btn-sm">
                       <i class="fa-arrow-left me-2 fas"></i> Back
                 </a>
           </div>
           <div class="m-2 p-4 card-modern">
                 <form action="{{ route('superadmin.store.product') }}" method="POST">
                       @csrf

                       <!-- Product Name -->
                       <div class="mb-3">
                              <label class="form-label">Product Name <span class="text-danger">*</span></label>
                              <input type="text" name="product_name" class="form-control" value="{{ old('product_name') }}">
                              @error('product_name')
                                          <small class="text-danger">{{ $message }}</small>
                                    @enderror
                       </div>

                       <!-- Category -->
                       <div class="mb-3">
                              <label class="form-label">Category <span class="text-danger">*</span></label>
                              <input type="text" name="category" class="form-control" value="{{ old('category') }}">
                              @error('category')
                                          <small class="text-danger">{{ $message }}</small>
                                    @enderror
                       </div>

                       <!-- Dimensions -->
                       <div class="mb-3">
                              <label class="form-label">Dimensions (H × W)</label>
                              <input type="text" name="dimensions" class="form-control" value="{{ old('dimensions') }}">
                              @error('dimensions')
                                          <small class="text-danger">{{ $message }}</small>
                                    @enderror
                       </div>

                       <!-- Selling Price -->
                       <div class="mb-3">
                              <label class="form-label">Selling Price <span class="text-danger">*</span></label>
                              <input type="number" step="0.01" name="selling_price" class="form-control"
                                    value="{{ old('selling_price') }}">
                              @error('selling_price')
                                          <small class="text-danger">{{ $message }}</small>
                                    @enderror
                       </div>

                       <!-- Cost Price -->
                       <div class="mb-3">
                              <label class="form-label">Cost Price</label>
                              <input type="number" step="0.01" name="cost_price" class="form-control"
                                    value="{{ old('cost_price') }}">
                              @error('cost_price')
                                          <small class="text-danger">{{ $message }}</small>
                                    @enderror
                       </div>

                       <!-- Quantity -->
                       <div class="mb-3">
                              <label class="form-label">Quantity <span class="text-danger">*</span></label>
                              <input type="number" name="quantity" class="form-control" value="{{ old('quantity') }}">
                              @error('quantity')
                                          <small class="text-danger">{{ $message }}</small>
                                    @enderror
                       </div>

                       <button type="submit" class="btn btn-primary">Save</button>
                 </form>

           </div>
     </div>
@endsection