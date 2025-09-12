@extends('superadmin.layouts.splayout')
@section('title', 'Contact Details')
@section('content')
    <div class="py-5 container-fluid">
<div class="mt-4 container">
     <div class="justify-content-center row">
          <div class="col-md-8">
               <div class="shadow-lg border-0 rounded-3 card">
                    <div class="bg-primary text-white text-center card-header">
                         <h4 class="mb-0">Add Contact Details</h4>
                    </div>
                    <div class="card-body">
                         <form action="{{ route('contact.details.store') }}" method="POST">
                         @csrf

                         <!-- Business Contact Dropdown -->
                         <div class="mb-3">
                              <label for="business_contact_id" class="form-label fw-semibold">Business Contact</label>
                              <select name="business_contact_id" id="business_contact_id" class="form-select" required>
                                   <option value="">-- Select Business Contact --</option>
                                   @foreach ($businessContacts as $contact)
                                        <option value="{{ $contact->id }}">{{ $contact->name }}</option>
                                   @endforeach
                              </select>
                              @error('business_contact_id')
                                   <div class="text-danger small">{{ $message }}</div>
                              @enderror
                         </div>

                         <!-- Name -->
                         <div class="mb-3">
                              <label for="name" class="form-label fw-semibold">Name</label>
                              <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
                              @error('name')
                                   <div class="text-danger small">{{ $message }}</div>
                              @enderror
                         </div>

                         <!-- Email -->
                         <div class="mb-3">
                              <label for="email" class="form-label fw-semibold">Email</label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                              @error('email')
                                   <div class="text-danger small">{{ $message }}</div>
                              @enderror
                         </div>

                         <!-- Phone -->
                         <div class="mb-3">
                              <label for="phone" class="form-label fw-semibold">Phone</label>
                              <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone number">
                              @error('phone')
                                   <div class="text-danger small">{{ $message }}</div>
                              @enderror
                         </div>

                         <!-- Address -->
                         <div class="mb-3">
                              <label for="address" class="form-label fw-semibold">Address</label>
                              <textarea class="form-control" name="address" id="address" rows="3" placeholder="Enter address"></textarea>
                              @error('address')
                                   <div class="text-danger small">{{ $message }}</div>
                              @enderror
                         </div>

                         <!-- Buttons -->
                         <div class="d-flex justify-content-between">
                              <a href="{{ route('contact.details.list') }}" class="btn btn-secondary">
                                   Cancel
                              </a>
                              <button type="submit" class="btn btn-primary">
                                   Save Contact
                              </button>
                         </div>
                         </form>
                    </div>
               </div>
          </div>
     </div>
</div>
</div>
@endsection