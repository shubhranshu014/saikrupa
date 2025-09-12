@extends('superadmin.layouts.splayout')

@section('title', 'Edit Permissions')

@section('content')
     <div class="py-5 container-fluid">

           <div class="d-flex align-items-center justify-content-between mb-4">
                 <h3 class="fw-bold">Set Menu Permissions for
                       <span class="fw-bold">{{ $user->name }} ({{ ucfirst($user->role) }})</span>
                 </h3>
                 <a href="{{ route('superadmin.userlist') }}" class="btn btn-secondary">
                       <i class="fa-arrow-left fas"></i> Back
                 </a>
           </div>

           <div class="shadow-sm border-0 card">
                 <div class="card-body">
                       <form method="POST" action="{{ route('superadmin.permissions.update', $user->id) }}">
                              @csrf

                              <div class="row">
                                    @foreach($menus as $key => $label)
                                                  <div class="mb-2 col-md-4 col-sm-6">
                                                         <div class="form-check">
                                                                 <input class="form-check-input" type="checkbox" id="menu_{{ $key }}" name="menus[]"
                                                                         value="{{ $key }}" {{ in_array($key, $userPermissions) ? 'checked' : '' }}>
                                                                 <label class="form-check-label" for="menu_{{ $key }}">
                                                                         {{ $label }}
                                                                 </label>
                                                         </div>
                                                  </div>
                                           @endforeach
                              </div>

                              <div class="d-flex justify-content-between mt-4">
                                    <button type="submit" class="btn btn-success">
                                          <i class="fas fa-save"></i> Save
                                    </button>
                              </div>
                       </form>
                 </div>
           </div>
     </div>
@endsection