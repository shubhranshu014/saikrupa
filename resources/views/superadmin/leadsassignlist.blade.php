@extends('superadmin.layouts.splayout')
@section("title", "Assign Leads")

@section("content")
     <div class="py-5 container-fluid">
          <!-- Header -->
          <div class="d-flex align-items-center justify-content-between mb-4 px-3">
               <!-- Left: Heading -->
               <h3 class="mb-0 fw-bold">Lead Assign</h3>

               <a href="{{ route('leads.assign.create') }}" class="shadow-sm btn btn-primary btn-sm">
                    <i class="me-2 fas fa-plus"></i> Assign Lead
               </a>
          </div>

          <!-- Success Message -->
          @if(session('success'))
               <div class="shadow-sm mb-4 px-3 py-2 rounded-3 alert alert-success">
                    <i class="me-2 fas fa-check-circle"></i>{{ session('success') }}
               </div>
          @endif


          <div class="card-body">
               <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle">
                         <thead class="table-primary text-center">
                              <tr>
                                   <th>#</th>
                                   <th>Lead Name</th>
                                   <th>Assigned User</th>
                                   <th>Assigned Date</th>
                              </tr>
                         </thead>
                         <tbody>
                              @foreach ($assignleads as $assignlead)                          
                              <tr>
                                   <td class="text-center">{{ $loop->iteration }}</td>
                                   <td>{{ $assignlead->lead->name }}</td>
                                   <td>{{ $assignlead->user->name }}</td>
                                   <td class="text-center">{{ \Carbon\Carbon::parse($assignlead->assigned_date)->format('d M Y, h:i A') }}</td>
                              </tr>
                                @endforeach
                         </tbody>
                    </table>
               </div>
          </div>
     </div>

@endsection