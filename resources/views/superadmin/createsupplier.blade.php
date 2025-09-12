@extends("superadmin.layouts.splayout")

@section("title", "Create Inventory")
@section("content")
     <div class="py-5 container-fluid">
           <!-- Header -->
           <div class="d-flex align-items-center justify-content-between px-3">
                 <h3 class="fw-bold">Add Supplier</h3>
                 <a href="{{ route('superadmin.supplierslist') }}" class="btn btn-secondary btn-sm">
                       <i class="fa-arrow-left me-2 fas"></i> Back
                 </a>
           </div>
           <div class="m-2 p-4 card-modern">
                 <!-- Form for adding inventory will go here -->
                 <form action="{{ route('superadmin.storesupplier') }}" method="POST">
                       @csrf

                       <!-- Supplier ID -->
                       <div class="mb-3">
                              <label for="supplier_id" class="form-label">Supplier ID <span class="text-danger">*</span></label>
                              <input type="text" name="supplier_id"
                                    class="form-control @error('supplier_id') is-invalid @enderror"
                                    value="{{ old('supplier_id') }}" required>
                              @error('supplier_id')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                       </div>

                       <!-- Supplier Name -->
                       <div class="mb-3">
                              <label for="supplier_name" class="form-label">Supplier Name (Company Name) <span
                                          class="text-danger">*</span></label>
                              <input type="text" name="supplier_name"
                                    class="form-control @error('supplier_name') is-invalid @enderror"
                                    value="{{ old('supplier_name') }}" required>
                              @error('supplier_name')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                       </div>

                       <!-- Contact Person -->
                       <div class="mb-3">
                              <label for="contact_person" class="form-label">Contact Person <span
                                          class="text-danger">*</span></label>
                              <input type="text" name="contact_person"
                                    class="form-control @error('contact_person') is-invalid @enderror"
                                    value="{{ old('contact_person') }}">
                              @error('contact_person')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                       </div>

                       <!-- Phone -->
                       <div class="mb-3">
                              <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                              <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                    value="{{ old('phone') }}">
                              @error('phone')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                       </div>

                       <!-- Email -->
                       <div class="mb-3">
                              <label for="email" class="form-label">Email</label>
                              <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}">
                              @error('email')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                       </div>

                       <!-- Address -->
                       <div class="mb-3">
                              <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                              <textarea name="address"
                                    class="form-control @error('address') is-invalid @enderror">{{ old('address') }}</textarea>
                              @error('address')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                       </div>

                       <!-- GST Number -->
                       <div class="mb-3">
                              <label for="gst_number" class="form-label">GST Number <span class="text-danger">*</span></label>
                              <input type="text" name="gst_number" class="form-control @error('gst_number') is-invalid @enderror"
                                    value="{{ old('gst_number') }}">
                              @error('gst_number')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                       </div>

                       <!-- Supply Type -->
                       <div class="mb-3">
                              <label for="supply_type" class="form-label">Supply Type <span class="text-danger">*</span></label>
                              <input type="text" name="supply_type"
                                    class="form-control @error('supply_type') is-invalid @enderror"
                                    value="{{ old('supply_type') }}" placeholder="e.g. Hardware, Glass">
                              @error('supply_type')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                       </div>

                       <!-- Bank Account No -->
                       <div class="mb-3">
                              <label for="bank_account_no" class="form-label">Bank Account No</label>
                              <input type="text" name="bank_account_no"
                                    class="form-control @error('bank_account_no') is-invalid @enderror"
                                    value="{{ old('bank_account_no') }}">
                              @error('bank_account_no')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                       </div>

                       <!-- IFSC Code -->
                       <div class="mb-3">
                              <label for="ifsc_code" class="form-label">IFSC Code</label>
                              <input type="text" name="ifsc_code" class="form-control @error('ifsc_code') is-invalid @enderror"
                                    value="{{ old('ifsc_code') }}">
                              @error('ifsc_code')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                       </div>

                       <!-- Notes -->
                       <div class="mb-3">
                              <label for="notes" class="form-label">Notes</label>
                              <textarea name="notes"
                                    class="form-control @error('notes') is-invalid @enderror">{{ old('notes') }}</textarea>
                              @error('notes')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                       </div>

                       <!-- Status -->
                       <div class="mb-3">
                              <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                              <select name="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="Active" {{ old('status') == 'Active' ? 'selected' : '' }}>Active</option>
                                    <option value="Inactive" {{ old('status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                    <option value="Blacklisted" {{ old('status') == 'Blacklisted' ? 'selected' : '' }}>Blacklisted
                                    </option>
                              </select>
                              @error('status')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                       </div>

                       <button type="submit" class="btn btn-primary">Add Supplier</button>
                 </form>
           </div>
     </div>

@endsection