@extends("superadmin.layouts.splayout")

@section("title", "Supplier Management")

@section("content")
      <div class="py-5 container-fluid">
              <!-- Header -->
              <div class="d-flex align-items-center justify-content-between mb-4 px-3">
                        <h3 class="fw-bold">Suppliers List</h3>
                        <a href="{{ route('superadmin.createsupplier') }}" class="shadow-sm btn btn-primary btn-sm">
                                <i class="me-2 fas fa-plus"></i> Add Suppliers
                        </a>
              </div>


              <!-- Success Message -->
              @if(session('success'))
                          <div class="alert alert-success">{{ session('success') }}</div>
                  @endif

              <div class="table-responsive p-4 card-modern">
                        <table class="table table-hover table-striped align-middle">
                                <thead class="table-light">
                                          <tr>
                                                <th>#</th>
                                                  <th>Supplier ID</th>
                                                  <th>Name</th>
                                                  <th>Contact Person</th>
                                                  <th>Phone</th>
                                                  <th>Email</th>
                                                  <th>GST</th>
                                                  <th>Supply Type</th>
                                                  <th>Status</th>
                                                  <th>Action</th>
                                          </tr>
                                <tbody>
                                          @forelse($suppliers as $supplier)
                                                                    <tr>
                                                                                    <td>{{ $loop->iteration }}</td>
                                                                                <td>{{ $supplier->supplier_id }}</td>
                                                                                <td>{{ $supplier->supplier_name }}</td>
                                                                                <td>{{ $supplier->contact_person }}</td>
                                                                                <td>{{ $supplier->phone }}</td>
                                                                                <td>{{ $supplier->email }}</td>
                                                                                <td>{{ $supplier->gst_number }}</td>
                                                                                <td>{{ $supplier->supply_type }}</td>
                                                                                <td>
                                                                                    @if($supplier->status === 'Active')
                                                                                          <span class="bg-success badge">Active</span>
                                                                                    @elseif($supplier->status === 'Inactive')
                                                                                          <span class="bg-secondary badge">Inactive</span>
                                                                                    @elseif($supplier->status === 'Blacklisted')
                                                                                          <span class="bg-danger badge">Blacklisted</span>
                                                                                    @else
                                                                                          <span class="bg-warning badge">Unknown</span>
                                                                                    @endif
                                                                                    </td>
                                                                                    <td class="text-center">
                                                                                          <div class="d-flex justify-content-center gap-2">
                                                                                          <a href="{{ route('superadmin.edit.supplier',$supplier->id) }}" class="btn btn-sm btn-warning">
                                                                                                <i class="fas fa-edit"></i>
                                                                                          </a>
                                                                                          <form action="{{ route('superadmin.delete.supplier', $supplier->id) }}" method="POST" style="display:inline-block;">
                                                                                                @csrf
                                                                                                @method('DELETE')
                                                                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                                                                                      <i class="fas fa-trash"></i>
                                                                                                </button>
                                                                                          </form>
                                                                                          </div>
                                                                                    </td>
                                                                    </tr>
                                                            @empty
                                                                    <tr>
                                                                                <td colspan="8" class="text-center">No suppliers found</td>
                                                                    </tr>
                                                            @endforelse
                                </tbody>
                                </thead>
                        </table>
              </div>
  @endsection