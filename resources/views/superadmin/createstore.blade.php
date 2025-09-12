@extends('superadmin.layouts.splayout')

@section('title', 'Store Management')

@section("content")
     <div class="py-5 container-fluid">

           <!-- Header -->
           <div class="d-flex align-items-center justify-content-between px-3">
                 <h3 class="fw-bold">Add Store</h3>
                 <a href="{{ route('superadmin.storelist') }}" class="btn btn-secondary btn-sm">
                       <i class="fa-arrow-left me-2 fas"></i> Back
                 </a>
           </div>

           <div class="m-2 p-4 card-modern">
                 <form action="{{ route('superadmin.storestore') }}" method="POST">
                       @csrf

                       <!-- Store Name -->
                       <div class="mb-3">
                              <label for="name" class="form-label">Store Name <span class="text-danger">*</span></label>
                              <input type="text" name="name" id="name" value="{{ old('name') }}"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="Enter store name">
                              @error('name')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                       </div>

                       <!-- Store Code -->
                       <div class="mb-3">
                              <label for="store_code" class="form-label">Store Code <span class="text-danger">*</span></label>
                              <input type="text" name="store_code" id="store_code" value="{{ old('store_code') }}"
                                    class="form-control @error('store_code') is-invalid @enderror"
                                    placeholder="Enter unique store code">
                              @error('store_code')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                       </div>

                       <!-- Location -->
                       <div class="mb-3">
                              <label for="location" class="form-label">Location</label>
                              <input type="text" name="location" id="location" value="{{ old('location') }}"
                                    class="form-control @error('location') is-invalid @enderror" placeholder="Enter location">
                              @error('location')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                       </div>

                       <!-- Contact Number -->
                       <div class="mb-3">
                              <label for="contact_number" class="form-label">Contact Number</label>
                              <input type="text" name="contact_number" id="contact_number" value="{{ old('contact_number') }}"
                                    class="form-control @error('contact_number') is-invalid @enderror"
                                    placeholder="Enter contact number">
                              @error('contact_number')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                       </div>

                       <!-- Submit Button -->
                       <button type="submit" class="btn btn-primary">Save</button>
                 </form>

           </div>

     </div>


@endsection