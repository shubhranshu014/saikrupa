@extends('superadmin.layouts.splayout')

@section('title', 'Set Permission ')

@section('content')
     <div class="py-5 container-fluid">
           <div class="d-flex align-items-center justify-content-between mb-4">
                 <h3 class="fw-bold">Set Permissions</h3>
           </div>

           @if(session('success'))
                  <div class="alert alert-success">{{ session('success') }}</div>
            @endif
           <div class="table-responsive p-4 card-modern">
                 <table class="table table-hover table-striped align-middle">
                       <thead class="table-light">
                              <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Permissions</th>
                                    <th>Actions</th>
                              </tr>
                       </thead>
                       <tbody>
                              @foreach($users as $index => $user)
                                          <tr>
                                                  <td>{{ $index + 1 }}</td>
                                                  <td>{{ $user->name }}</td>
                                                  <td>{{ $user->email }}</td>
                                                  <td>{{ ucfirst($user->role) }}</td>
                                                  <td>
                                                         @if($user->permission)
                                                                            {{ implode(', ', $user->permission->menus) }}
                                                                    @else
                                                                            <span class="text-muted">No permissions</span>
                                                                    @endif
                                                  </td>
                                                  <td>
                                                         <a href="{{ route('superadmin.permissions.edit', $user->id) }}"
                                                                 class="btn btn-sm btn-primary">
                                                                 <i class="fas fa-key"></i> Set Permissions
                                                         </a>
                                                  </td>
                                          </tr>
                                    @endforeach
                       </tbody>
                 </table>
           </div>
     </div>
@endsection