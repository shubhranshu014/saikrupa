@extends("superadmin.layouts.splayout")

@section('title', 'Store Management')

@section("content")
      <div class="py-5 container-fluid">
              <!-- Header -->
              <div class="d-flex align-items-center justify-content-between mb-4">
                        <h3 class="fw-bold">Stores</h3>
                        <a href="{{ route('superadmin.createstore') }}" class="shadow-sm btn btn-primary btn-sm">
                                <i class="me-2 fas fa-plus"></i> Add Store
                        </a>
              </div>

              <!-- Success Message -->
              @if(session('success'))
                          <div class="alert alert-success">{{ session('success') }}</div>
                  @endif


              <div class="table-responsive p-3 card-modern">
                        <div class="row">
                        @foreach ($stores as $store)
                                <div class="mb-4 col-md-4">
                                <div class="shadow-sm p-3 rounded h-100 text-center card">
                                        <!-- Store Icon -->
                                        <div class="mb-3">
                                        <i class="fas fa-store fa-3x"></i>
                                        </div>

                                        <!-- Store Name -->
                                        <h5 class="fw-bold">{{ $store->name }}</h5>

                                        <!-- Store Details -->
                                        <p class="mb-1"><strong>Outlet Code:</strong> {{ $store->store_code }}</p>
                                        <p class="mb-1"><strong>Address:</strong> {{ $store->location }}</p>
                                        <p class="mb-1"><strong>Phone:</strong> {{ $store->contact_number }}</p>

                                        @if(!empty($store->email))
                                        <p class="mb-3"><strong>Email:</strong> {{ $store->email }}</p>
                                        @endif

                                        <!-- Buttons -->
                                        <div class="d-flex justify-content-center gap-2 mt-3">
                                        <a href="" class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="" method="POST" onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i> Delete
                                                </button>
                                        </form>
                                        </div>

                                        <a href="" class="mt-3 btn btn-sm btn-purple" style="background-color: #8b5cf6; color: white;">
                                        <i class="fas fa-sign-in-alt"></i> Enter
                                        </a>
                                </div>
                                </div>
                        @endforeach
                        </div>
              </div>
      </div>

@endsection