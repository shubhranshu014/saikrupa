@extends("superadmin.layouts.splayout")

@section("title", "Edit Supplier")

@section("content")
     <div class="py-5 container-fluid">
           <!-- Header -->
           <div class="d-flex align-items-center justify-content-between px-3">
                 <h3 class="fw-bold">Edit Supplier</h3>
                 <a href="{{ route('superadmin.supplierslist') }}" class="btn btn-secondary btn-sm">
                       <i class="fa-arrow-left me-2 fas"></i> Back
                 </a>
           </div>
           <div class="m-2 p-4 card-modern">
                 <form action="{{ route('superadmin.update.supplier',$supplier->id) }}" method="POST">
                       @csrf
                       @method('PUT')

                       <div class="mb-3">
                              <label class="form-label">Supplier ID *</label>
                              <input type="text" name="supplier_id" value="{{ old('supplier_id', $supplier->supplier_id) }}"
                                    class="form-control" required disabled>
                              @error('supplier_id') <span class="text-danger">{{ $message }}</span> @enderror
                       </div>

                       <div class="mb-3">
                              <label class="form-label">Supplier Name *</label>
                              <input type="text" name="supplier_name" value="{{ old('supplier_name', $supplier->supplier_name) }}"
                                    class="form-control" required>
                              @error('supplier_name') <span class="text-danger">{{ $message }}</span> @enderror
                       </div>

                       <div class="mb-3">
                              <label class="form-label">Contact Person *</label>
                              <input type="text" name="contact_person"
                                    value="{{ old('contact_person', $supplier->contact_person) }}" class="form-control" required>
                              @error('contact_person') <span class="text-danger">{{ $message }}</span> @enderror
                       </div>

                       <div class="mb-3">
                              <label class="form-label">Phone *</label>
                              <input type="text" name="phone" value="{{ old('phone', $supplier->phone) }}" class="form-control"
                                    required>
                              @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                       </div>

                       <div class="mb-3">
                              <label class="form-label">Email</label>
                              <input type="email" name="email" value="{{ old('email', $supplier->email) }}" class="form-control">
                              @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                       </div>

                       <div class="mb-3">
                              <label class="form-label">Address *</label>
                              <textarea name="address" class="form-control"
                                    required>{{ old('address', $supplier->address) }}</textarea>
                              @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                       </div>

                       <div class="mb-3">
                              <label class="form-label">GST Number *</label>
                              <input type="text" name="gst_number" value="{{ old('gst_number', $supplier->gst_number) }}"
                                    class="form-control" required>
                              @error('gst_number') <span class="text-danger">{{ $message }}</span> @enderror
                       </div>

                       <div class="mb-3">
                              <label class="form-label">Supply Type *</label>
                              <input type="text" name="supply_type" value="{{ old('supply_type', $supplier->supply_type) }}"
                                    class="form-control" required>
                              @error('supply_type') <span class="text-danger">{{ $message }}</span> @enderror
                       </div>

                       <div class="mb-3">
                              <label class="form-label">Status *</label>
                              <select name="status" class="form-select" required>
                                    <option value="Active" {{ $supplier->status == 'Active' ? 'selected' : '' }}>Active</option>
                                    <option value="Inactive" {{ $supplier->status == 'Inactive' ? 'selected' : '' }}>Inactive
                                    </option>
                                    <option value="Blacklisted" {{ $supplier->status == 'Blacklisted' ? 'selected' : '' }}>
                                          Blacklisted
                                    </option>
                              </select>
                              @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                       </div>

                       <button type="submit" class="btn btn-success">Update Supplier</button>
                 </form>
           </div>
     </div>
@endsection