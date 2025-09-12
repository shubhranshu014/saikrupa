@extends('superadmin.layouts.splayout')
@section('title', 'Create Lead Assignment')
@section('content')
     <div class="py-5 container-fluid">
          <!-- Header -->
          <div class="d-flex align-items-center justify-content-between mb-4 px-3">
               <!-- Left: Heading -->
               <h3 class="mb-0 fw-bold">Create Lead Assignment</h3>
               <a href="{{ route('leads.assign.list') }}" class="shadow-sm btn btn-secondary btn-sm">
                    <i class="fa-arrow-left me-2 fas"></i> Back
               </a>
          </div>
          <div class="m-2 p-4 card-modern">
               <form action="{{ route('leads.assign.store') }}" method="POST">
                    @csrf

                    <!-- Lead Dropdown -->
                    <div class="mb-3">
                         <label for="lead_id" class="form-label fw-semibold">Lead Name</label>
                         <select name="lead_id" id="lead_id" class="form-select" required>
                              <option value="">-- Select Lead --</option>
                              @foreach($leads as $lead)
                                   <option value="{{ $lead->id }}">{{ $lead->name }} ({{ $lead->phone }})</option>
                              @endforeach
                         </select>
                    </div>

                    <!-- User Dropdown -->
                    <div class="mb-3">
                         <label for="user_id" class="form-label fw-semibold">Assign To (Sales)</label>
                         <select name="user_id" id="user_id" class="form-select" required>
                              <option value="">-- Select User --</option>
                              @foreach($users as $user)
                                   <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->role }})</option>
                              @endforeach
                         </select>
                    </div>

                    <!-- Date Picker -->
                    <div class="mb-3">
                         <label for="assigned_date" class="form-label fw-semibold">Assign Date</label>
                         <input type="date" name="assigned_date" id="assigned_date" class="form-control"
                              value="{{ now()->format('Y-m-d') }}" required>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-flex justify-content-end">
                         <button type="submit" class="px-4 btn btn-primary">Assign Lead</button>
                    </div>
               </form>
          </div>
     </div>
@endsection