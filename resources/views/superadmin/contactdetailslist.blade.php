@extends('superadmin.layouts.splayout')
@section('title', 'Business Contact List')
@section('content')

     <div class="py-5 container-fluid">

          <!-- Header -->
          <div class="d-flex align-items-center justify-content-between mb-4">
               <h3 class="fw-bold">Contact Details</h3>
               <a href="{{ route('contact.details.create') }}" class="shadow-sm btn btn-primary btn-sm">
                    <i class="me-2 fas fa-plus"></i> Add Contact Details
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
                              <th>business contacts</th>
                              <th>name</th>
                              <th>email</th>
                              <th>phone</th>
                              <th>location</th>
                              <th>Action</th>
                         </tr>
                    </thead>
                    <tbody>
                         @foreach ($contactDetails as $cd)
                              <tr>
                                   <td>{{ $loop->iteration }}</td>
                                   <td>{{ $cd->businessContact->name }}</td>
                                   <td>{{ $cd->name }}</td>
                                   <td>{{ $cd->email }}</td>
                                   <td>{{ $cd->phone }}</td>
                                   <td>{{ $cd->address }}</td>
                                   <td>
                                        <!-- Example action buttons -->
                                        <a href="" class="btn btn-sm btn-warning">
                                             <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="" method="POST" class="d-inline">
                                             @csrf
                                             @method('DELETE')
                                             <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                                  <i class="fas fa-trash"></i>
                                             </button>
                                        </form>
                                   </td>
                              </tr>
                         @endforeach
                    </tbody>
               </table>
          </div>

     </div>

@endsection