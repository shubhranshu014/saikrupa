@extends('superadmin.layouts.splayout')
@section('title', 'Accessories Inventory')
@section("content")
     <div class="py-5 container-fluid">
           <!-- Header -->
           <div class="d-flex align-items-center justify-content-between px-3">
                 <h3 class="fw-bold">Add Accessories Inventory</h3>
                 <a href="{{ route('superadmin.accessoriesinventory.list') }}" class="btn btn-secondary btn-sm">
                       <i class="fa-arrow-left me-2 fas"></i> Back
                 </a>
           </div>
           <div class="m-2 p-4 card-modern">
                 <form action="{{ route('superadmin.store.accessoriesinventory') }}" method="POST">
                       @csrf

                       <!-- Item ID -->
                       <div class="mb-3">
                              <label for="item_id" class="form-label">Item ID <span class="text-danger">*</span></label>
                              <input type="text" name="item_id" id="item_id"
                                    class="form-control @error('item_id') is-invalid @enderror" value="{{ old('item_id') }}">
                              @error('item_id')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                       </div>

                       <!-- Item Name -->
                       <div class="mb-3">
                              <label for="item_name" class="form-label">Item Name <span class="text-danger">*</span></label>
                              <input type="text" name="item_name" id="item_name"
                                    class="form-control @error('item_name') is-invalid @enderror" value="{{ old('item_name') }}">
                              @error('item_name')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                       </div>

                       <!-- Unit -->
                       <div class="mb-3">
                              <label for="unit" class="form-label">Unit <span class="text-danger">*</span></label>
                              <input type="text" name="unit" id="unit" class="form-control @error('unit') is-invalid @enderror"
                                    value="{{ old('unit') }}">
                              @error('unit')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                       </div>

                       <!-- Available Quantity -->
                       <div class="mb-3">
                              <label for="available_qty" class="form-label">Available Quantity <span
                                          class="text-danger">*</span></label>
                              <input type="number" step="0.01" name="available_qty" id="available_qty"
                                    class="form-control @error('available_qty') is-invalid @enderror"
                                    value="{{ old('available_qty') }}">
                              @error('available_qty')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                       </div>

                       <!-- Reorder Level -->
                       <div class="mb-3">
                              <label for="reorder_level" class="form-label">Reorder Level <span
                                          class="text-danger">*</span></label>
                              <input type="number" step="0.01" name="reorder_level" id="reorder_level"
                                    class="form-control @error('reorder_level') is-invalid @enderror"
                                    value="{{ old('reorder_level') }}">
                              @error('reorder_level')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                       </div>

                       <!-- Category -->
                       <div class="mb-3">
                              <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                              <select name="category" id="category" class="form-select @error('category') is-invalid @enderror">
                                    <option value="">Select Category</option>
                                    <option value="Consumable" {{ old('category') == 'Consumable' ? 'selected' : '' }}>Consumable
                                    </option>
                                    <option value="Accessory" {{ old('category') == 'Accessory' ? 'selected' : '' }}>Accessory
                                    </option>
                              </select>
                              @error('category')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                       </div>

                       <!-- Supplier -->
                       <div class="mb-3">
                              <label for="supplier_id" class="form-label">Supplier <span class="text-danger">*</span></label>
                              <select name="supplier_id" id="supplier_id"
                                    class="form-select @error('supplier_id') is-invalid @enderror">
                                    <option value="">Select Supplier</option>
                                    @foreach($suppliers as $supplier)
                                                  <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                                         {{ $supplier->supplier_name }}
                                                  </option>
                                           @endforeach
                              </select>
                              @error('supplier_id')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                       </div>

                       <!-- Submit Button -->
                       <button type="submit" class="btn btn-primary">Save</button>
                 </form>
           </div>
     </div>
@endsection