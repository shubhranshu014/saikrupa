@extends("superadmin.layouts.splayout")

@section("title", "Inventory Management")

@section("content")
      <div class="py-5 container-fluid">
              <!-- Header -->
              <div class="d-flex align-items-center justify-content-between px-3">
                        <h3 class="fw-bold">Add Profiles Inventory</h3>
                        <a href="{{ route('superadmin.profilesinventory.list') }}" class="btn btn-secondary btn-sm">
                                <i class="fa-arrow-left me-2 fas"></i> Back
                        </a>
              </div>
              <div class="m-2 p-4 card-modern">
                        <form action="{{ route('superadmin.store.profilesinventory') }}" method="POST">
                                @csrf

                                <!-- Profile ID -->
                                <div class="mb-3">
                                          <label class="form-label">Profile ID <span class="text-danger">*</span></label>
                                          <input type="text" name="profile_id" class="form-control" value="{{ old('profile_id') }}"
                                                  >
                                          @error('profile_id')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                </div>

                                <!-- Profile Name -->
                                <div class="mb-3">
                                          <label class="form-label">Profile Name <span class="text-danger">*</span></label>
                                          <input type="text" name="profile_name" class="form-control" value="{{ old('profile_name') }}"
                                                  >
                                          @error('profile_name')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                </div>

                                <!-- Profile Type -->
                                <div class="mb-3">
                                          <label class="form-label">Profile Type <span class="text-danger">*</span></label>
                                          <select name="profile_type" class="form-select" >
                                                  <option value="">-- Select Type --</option>
                                                  <option value="Frame" {{ old('profile_type') == 'Frame' ? 'selected' : '' }}>Frame</option>
                                                  <option value="Sash" {{ old('profile_type') == 'Sash' ? 'selected' : '' }}>Sash</option>
                                                  <option value="Mullion" {{ old('profile_type') == 'Mullion' ? 'selected' : '' }}>Mullion
                                                  </option>
                                                  <option value="Bead" {{ old('profile_type') == 'Bead' ? 'selected' : '' }}>Bead</option>
                                          </select>
                                          @error('profile_type')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                </div>

                                <!-- Material -->
                                <div class="mb-3">
                                          <label class="form-label">Material <span class="text-danger">*</span></label>
                                          <input type="text" name="material" class="form-control" value="{{ old('material') }}" >
                                          @error('material')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                </div>

                                <!-- Color -->
                                <div class="mb-3">
                                          <label class="form-label">Color <span class="text-danger">*</span></label>
                                          <input type="text" name="color" class="form-control" value="{{ old('color') }}" >
                                          @error('color')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                </div>

                                <!-- Length (mm) -->
                                <div class="mb-3">
                                          <label class="form-label">Length (mm) <span class="text-danger">*</span></label>
                                          <input type="text" name="length_mm" class="form-control" value="{{ old('length_mm') }}"
                                                  >
                                          @error('length_mm')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                </div>

                                <!-- Available Bars -->
                                <div class="mb-3">
                                          <label class="form-label">Available Bars <span class="text-danger">*</span></label>
                                          <input type="number" name="available_bars" class="form-control"
                                                  value="{{ old('available_bars') }}" >
                                          @error('available_bars')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                </div>

                                <!-- Supplier -->
                                <div class="mb-3">
                                          <label class="form-label">Supplier <span class="text-danger">*</span></label>
                                          <select name="supplier_id" class="form-select" >
                                                  <option value="">-- Select Supplier --</option>
                                                  @foreach($suppliers as $supplier)
                                                                                <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                                                                                {{ $supplier->supplier_name }}
                                                                                </option>
                                                                        @endforeach
                                          </select>
                                          @error('supplier_id')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                </div>
                                <!-- Submit -->
                                <button type="submit" class="btn btn-primary">Save Inventory</button>
                        </form>
              </div>
      </div>
@endsection