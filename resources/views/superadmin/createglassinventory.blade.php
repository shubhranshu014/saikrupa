@extends("superadmin.layouts.splayout")
@section("title", "Glass Inventory Management")
@section("content")

     <div class="py-5 container-fluid">
           <!-- Header -->
           <div class="d-flex align-items-center justify-content-between px-3">
                 <h3 class="fw-bold">Add Glass Inventory</h3>
                 <a href="{{ route('superadmin.glassinventory.list') }}" class="btn btn-secondary btn-sm">
                       <i class="fa-arrow-left me-2 fas"></i> Back
                 </a>
           </div>
           <div class="m-2 p-4 card-modern">
                 <form action="{{ route('superadmin.store.glassinventory') }}" method="POST">
                       @csrf

                       <!-- Glass ID -->
                       <div class="mb-3">
                              <label class="form-label">Glass ID <span class="text-danger">*</span></label>
                              <input type="text" name="glass_id" class="form-control" value="{{ old('glass_id') }}" required>
                              @error('glass_id') <small class="text-danger">{{ $message }}</small> @enderror
                       </div>

                       <!-- Glass Type -->
                       <div class="mb-3">
                              <label class="form-label">Glass Type <span class="text-danger">*</span></label>
                              <select name="glass_type" class="form-select" required>
                                    <option value="">-- Select Type --</option>
                                    <option value="Clear" {{ old('glass_type') == 'Clear' ? 'selected' : '' }}>Clear</option>
                                    <option value="Tinted" {{ old('glass_type') == 'Tinted' ? 'selected' : '' }}>Tinted</option>
                                    <option value="Laminated" {{ old('glass_type') == 'Laminated' ? 'selected' : '' }}>Laminated
                                    </option>
                                    <option value="DGU" {{ old('glass_type') == 'DGU' ? 'selected' : '' }}>DGU</option>
                              </select>
                              @error('glass_type') <small class="text-danger">{{ $message }}</small> @enderror
                       </div>

                       <!-- Thickness (mm) -->
                       <div class="mb-3">
                              <label class="form-label">Thickness (mm) <span class="text-danger">*</span></label>
                              <input type="number" step="0.1" name="thickness_mm" class="form-control"
                                    value="{{ old('thickness_mm') }}" required>
                              @error('thickness_mm') <small class="text-danger">{{ $message }}</small> @enderror
                       </div>

                       <!-- Width (mm) -->
                       <div class="mb-3">
                              <label class="form-label">Width (mm) <span class="text-danger">*</span></label>
                              <input type="number" name="width_mm" class="form-control" value="{{ old('width_mm') }}" required>
                              @error('width_mm') <small class="text-danger">{{ $message }}</small> @enderror
                       </div>

                       <!-- Height (mm) -->
                       <div class="mb-3">
                              <label class="form-label">Height (mm) <span class="text-danger">*</span></label>
                              <input type="number" name="height_mm" class="form-control" value="{{ old('height_mm') }}" required>
                              @error('height_mm') <small class="text-danger">{{ $message }}</small> @enderror
                       </div>

                       <!-- Available Sheets -->
                       <div class="mb-3">
                              <label class="form-label">Available Sheets <span class="text-danger">*</span></label>
                              <input type="number" name="available_sheets" class="form-control"
                                    value="{{ old('available_sheets') }}" required>
                              @error('available_sheets') <small class="text-danger">{{ $message }}</small> @enderror
                       </div>

                       <!-- Supplier -->
                       <div class="mb-3">
                              <label class="form-label">Supplier <span class="text-danger">*</span></label>
                              <select name="supplier_id" class="form-select" required>
                                    <option value="">-- Select Supplier --</option>
                                    @foreach($suppliers as $supplier)
                                                  <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                                         {{ $supplier->supplier_name }}
                                                  </option>
                                           @endforeach
                              </select>
                              @error('supplier_id') <small class="text-danger">{{ $message }}</small> @enderror
                       </div>

                       <!-- Submit -->
                       <button type="submit" class="btn btn-primary">Save Inventory</button>
                 </form>
           </div>
     </div>

@endsection