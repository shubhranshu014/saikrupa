@extends("superadmin.layouts.splayout")
@section("title", "Hardware Inventory Management")

@section("content")
     <div class="py-5 container-fluid">
           <!-- Header -->
           <div class="d-flex align-items-center justify-content-between px-3">
                 <h3 class="fw-bold">Add Profiles Inventory</h3>
                 <a href="{{ route('superadmin.hardwareinventory.list') }}" class="btn btn-secondary btn-sm">
                       <i class="fa-arrow-left me-2 fas"></i> Back
                 </a>
           </div>
           <div class="m-2 p-4 card-modern">
                 <form action="{{ route('superadmin.store.hardwareinventory') }}" method="POST">
                       @csrf

                       <div class="mb-3">
                              <label for="hardware_id" class="form-label">
                                    Hardware ID <span class="text-danger">*</span>
                              </label>
                              <input type="text" name="hardware_id" id="hardware_id" value="{{ old('hardware_id') }}"
                                    class="form-control">
                              @error('hardware_id') <span class="text-danger">{{ $message }}</span> @enderror
                       </div>

                       <div class="mb-3">
                              <label for="hardware_name" class="form-label">
                                    Hardware Name <span class="text-danger">*</span>
                              </label>
                              <input type="text" name="hardware_name" id="hardware_name" value="{{ old('hardware_name') }}"
                                    class="form-control">
                              @error('hardware_name') <span class="text-danger">{{ $message }}</span> @enderror
                       </div>

                       <div class="mb-3">
                              <label for="application" class="form-label">
                                    Application <span class="text-danger">*</span>
                              </label>
                              <input type="text" name="application" id="application" value="{{ old('application') }}"
                                    class="form-control">
                              @error('application') <span class="text-danger">{{ $message }}</span> @enderror
                       </div>

                       <div class="mb-3">
                              <label for="unit" class="form-label">
                                    Unit <span class="text-danger">*</span>
                              </label>
                              <input type="text" name="unit" id="unit" value="{{ old('unit') }}" class="form-control">
                              @error('unit') <span class="text-danger">{{ $message }}</span> @enderror
                       </div>

                       <div class="mb-3">
                              <label for="available_qty" class="form-label">
                                    Available Quantity <span class="text-danger">*</span>
                              </label>
                              <input type="number" name="available_qty" id="available_qty" value="{{ old('available_qty') }}"
                                    class="form-control">
                              @error('available_qty') <span class="text-danger">{{ $message }}</span> @enderror
                       </div>

                       <div class="mb-3">
                              <label for="reorder_level" class="form-label">
                                    Reorder Level <span class="text-danger">*</span>
                              </label>
                              <input type="number" name="reorder_level" id="reorder_level" value="{{ old('reorder_level') }}"
                                    class="form-control">
                              @error('reorder_level') <span class="text-danger">{{ $message }}</span> @enderror
                       </div>

                       <div class="mb-3">
                              <label for="brand" class="form-label">
                                    Brand <span class="text-danger">*</span>
                              </label>
                              <input type="text" name="brand" id="brand" value="{{ old('brand') }}" class="form-control">
                              @error('brand') <span class="text-danger">{{ $message }}</span> @enderror
                       </div>

                       <div class="mb-3">
                              <label for="supplier_id" class="form-label">
                                    Supplier <span class="text-danger">*</span>
                              </label>
                              <select name="supplier_id" id="supplier_id" class="form-control">
                                    <option value="">-- Select Supplier --</option>
                                    @foreach($suppliers as $supplier)
                                                  <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                                         {{ $supplier->supplier_name }}
                                                  </option>
                                           @endforeach
                              </select>
                              @error('supplier_id') <span class="text-danger">{{ $message }}</span> @enderror
                       </div>

                       <button type="submit" class="btn btn-primary">Save</button>
                 </form>
           </div>
     </div>
@endsection