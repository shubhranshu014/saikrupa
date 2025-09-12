@extends('superadmin.layouts.splayout')
@section('title', 'stock movement')
@section('content')
     <div class="py-5 container-fluid">
           <!-- Header -->
           <div class="d-flex align-items-center justify-content-between px-3">
                 <h3 class="fw-bold">Add Stock Movement</h3>
                 <a href="{{ route('superadmin.stockmovement.list') }}" class="btn btn-secondary btn-sm">
                       <i class="fa-arrow-left me-2 fas"></i> Back
                 </a>
           </div>
           <div class="m-2 p-4 card-modern">
                 <form action="{{ route('superadmin.store.stock-movement') }}" method="POST">
                       @csrf

                       <!-- Movement ID -->
                       <div class="mb-3">
                              <label class="form-label">Movement ID <span class="text-danger">*</span></label>
                              <input type="text" name="movement_id"
                                    class="form-control @error('movement_id') is-invalid @enderror"
                                    value="{{ old('movement_id') }}">
                              @error('movement_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                       </div>

                       <!-- Item ID -->
                       <div class="mb-3">
                              <label class="form-label">Item <span class="text-danger">*</span></label>
                              <select name="item_id" id="item_id" class="form-select @error('item_id') is-invalid @enderror">
                                    <option value="">Select Item</option>
                                    @foreach($products as $product)
                                                  <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                           @endforeach
                              </select>
                              @error('item_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                       </div>

                       <!-- Movement Type -->
                       <div class="mb-3">
                              <label class="form-label">Movement Type (from Inventroy to Store) <span class="text-danger">*</span></label>
                              <select name="movement_type" class="form-select @error('movement_type') is-invalid @enderror">
                                    <option value="">Select Movement</option>
                                    <option value="IN">IN</option>
                                    <option value="OUT">OUT</option>
                                    <option value="ADJUSTMENT">ADJUSTMENT</option>
                              </select>
                              @error('movement_type') <div class="invalid-feedback">{{ $message }}</div> @enderror
                       </div>

                       <!-- Quantity -->
                       <div class="mb-3">
                              <label class="form-label">Quantity <span class="text-danger">*</span></label>
                              <input type="number" step="0.01" name="quantity"
                                    class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity') }}">
                              @error('quantity') <div class="invalid-feedback">{{ $message }}</div> @enderror
                       </div>

                       <!-- Reference -->
                       <div class="mb-3">
                              <label class="form-label">Reference</label>
                              <input type="text" name="reference" class="form-control" value="{{ old('reference') }}">
                       </div>

                       <!-- Date -->
                       <div class="mb-3">
                              <label class="form-label">Date <span class="text-danger">*</span></label>
                              <input type="datetime-local" name="date" class="form-control @error('date') is-invalid @enderror"
                                    value="{{ old('date') }}">
                              @error('date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                       </div>

                       <!-- Store -->
                       <div class="mb-3">
                              <label class="form-label">Store <span class="text-danger">*</span></label>
                              <select name="store_id" class="form-select @error('store_id') is-invalid @enderror">
                                    <option value="">Select Store</option>
                                    @foreach($stores as $store)
                                                  <option value="{{ $store->id }}">{{ $store->name }}</option>
                                           @endforeach
                              </select>
                              @error('store_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                       </div>

                       <button type="submit" class="btn btn-primary">Save Movement</button>
                 </form>
           </div>
     </div>
@endsection