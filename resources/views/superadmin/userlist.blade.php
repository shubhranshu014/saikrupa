@extends("superadmin.layouts.splayout")

@section('title', 'User Management')

@section("content")
     <div class="py-5 container-fluid">

           <!-- Header -->
           <div class="d-flex align-items-center justify-content-between mb-4">
                 <h3 class="fw-bold">Users</h3>
                 <a href="{{ route('superadmin.createuser') }}" class="shadow-sm btn btn-primary btn-sm">
                       <i class="me-2 fas fa-plus"></i> Add User
                 </a>
           </div>

           <!-- Success Message -->
           @if(session('success'))
                  <div class="alert alert-success">{{ session('success') }}</div>
            @endif

           <!-- User Table -->
           <div class="table-responsive p-4 card-modern">
                 <table class="table table-hover table-striped align-middle">
                       <thead class="table-light">
                              <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Created At</th>
                              </tr>
                       </thead>
                       <tbody>
                              @forelse ($users as $index => $user)
                                          <tr>
                                                  <td>{{ $index + 1 }}</td>
                                                  <td>{{ $user->name }}</td>
                                                  <td>{{ $user->email }}</td>
                                                  <td>
                                                         <span class="badge {{ $roleColors[$user->role] ?? 'bg-info' }}">
                                                                 {{ $user->role }}
                                                         </span>
                                                  </td>
                                                  <td>{{ $user->created_at->format('d M Y') }}</td>
                                          </tr>
                                    @empty
                                          <tr>
                                                  <td colspan="6" class="text-muted text-center">No users found</td>
                                          </tr>
                                    @endforelse
                       </tbody>
                 </table>
           </div>

     </div>

@endsection