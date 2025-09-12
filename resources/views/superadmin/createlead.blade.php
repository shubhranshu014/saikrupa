@extends('superadmin.layouts.splayout')
@section('title', 'Create Lead')
@section("content")
     <div class="py-5 container-fluid">
          <!-- Header -->
          <div class="d-flex align-items-center justify-content-between px-3">
               <h3 class="fw-bold">Leads</h3>
               <a href="{{ route('leads.list') }}" class="btn btn-secondary btn-sm">
                    <i class="fa-arrow-left me-2 fas"></i> Back
               </a>
          </div>

          <form action="{{ route('leads.store') }}" method="POST">
               @csrf

               <!-- Name -->
               <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
               </div>

               <!-- Email -->
               <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
               </div>

               <!-- Phone -->
               <div class="mb-3">
                    <label for="phone" class="form-label fw-bold">Phone</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
               </div>

               <!-- Address -->
               <div class="mb-3">
                    <label for="address" class="form-label fw-bold">Address</label>
                    <textarea name="address" class="form-control">{{ old('address') }}</textarea>
               </div>

               <!-- Date -->
               <div class="mb-3">
                    <label for="date" class="form-label fw-bold">Date</label>
                    <input type="date" name="date" class="form-control" value="{{ old('date') }}">
                    @error('date') <span class="text-danger">{{ $message }}</span> @enderror
               </div>

               <!-- Lead Source -->
               <div class="mb-3">
                    <label for="lead_sources" class="form-label fw-bold">Lead Source</label>
                    <input type="text" name="lead_sources" class="form-control" value="{{ old('lead_sources') }}">
               </div>

               <button type="submit" class="px-4 btn btn-primary">Submit</button>
          </form>
     </div>
@endsection