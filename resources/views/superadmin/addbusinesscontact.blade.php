@extends('superadmin.layouts.splayout')
@section('title', 'Business Contact List')

@section('content')
     <div class="py-5 container-fluid">

          <!-- Header -->
          <div class="d-flex align-items-center justify-content-between mb-4">
               <h3 class="fw-bold">Add Business Contact</h3>
               <a href="{{ route('contact.list') }}" class="shadow-sm btn btn-primary btn-sm">
                    <i class="fa-arrow-left me-2 fas"></i> Back
               </a>
          </div>

          <!-- Success Message -->
          @if(session('success'))
               <div class="alert alert-success">{{ session('success') }}</div>
          @endif

          <!-- Add Contact Form -->
          <div class="p-4 card-modern">
               <form method="POST" action="{{ route('contact.store') }}">
                    @csrf
                    <div class="mb-3">
                         <label for="name" class="form-label">Name</label>
                         <input type="text" class="form-control" id="name" name="name" >
                    </div>
                    <button type="submit" class="btn btn-primary">Add </button>
               </form>
          </div>
     </div>

@endsection