@extends('superadmin.layouts.splayout')
@section('title', 'Purchase Authorization')
@section('content')
     <div class="py-5 container-fluid">
           <div class="py-5 container-fluid">
                 <!-- Header -->
                 <div class="d-flex align-items-center justify-content-between mb-4">
                       <h3 class="fw-bold">Purchase</h3>
                       <a href="{{ route('purchase.create') }}" class="shadow-sm btn btn-primary btn-sm">
                              <i class="me-2 fas fa-plus"></i> Add Purchase
                       </a>
                 </div>

                 <!-- Success Message -->
                 @if(session('success'))
                          <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                 <!-- Purchases Table -->
                 <div class="table-responsive m-2 p-4 card-modern">
                       <table class="table table-hover table-striped align-middle">
                              <thead class="table-light">
                                    <tr>
                                          <th>Purchase ID</th>
                                          <th>Supplier</th>
                                          <th>Status</th>
                                          <th>Total Items</th>
                                          <th>Total Amount</th>
                                          <th>Created At</th>
                                          <th>PDF</th>
                                    </tr>
                              </thead>
                              <tbody>
                                    @forelse($purchases as $purchase)
                                                  <tr>
                                                         <td>{{ $purchase->purchase_id }}</td>
                                                         <td>{{ $purchase->supplier->supplier_name ?? 'N/A' }}</td>
                                                         <td>
                                                                 <span class="badge change-status
                                                                                                                                                                                              @if($purchase->status == 'pending') bg-warning
                                                                                                                                                                                                                                       @elseif($purchase->status == 'approved') bg-success
                                                                                                                                                                                                                                                                                    @elseif($purchase->status == 'completed') bg-primary
                                                                                                                                                                                                                                                                                                                                                  @else bg-secondary @endif"
                                                                         style="cursor: pointer;" data-id="{{ $purchase->id }}"
                                                                         data-status="{{ $purchase->status }}">
                                                                         {{ ucfirst($purchase->status) }}
                                                                 </span>
                                                         </td>
                                                         <td>{{ count(json_decode($purchase->items, true) ?? []) }}</td>
                                                         <td>₹{{ number_format($purchase->total_amount, 2) }}</td>
                                                         <td>{{ $purchase->created_at->format('d M Y') }}</td>
                                                         <td>
                                                                 <a href="{{ route('purchases.download-pdf', $purchase->id) }}"
                                                                         class="btn btn-sm btn-primary">
                                                                         Download PDF
                                                                 </a>
                                                         </td>
                                                  </tr>
                                           @empty
                                                  <tr>
                                                         <td colspan="7" class="text-muted text-center">No purchases found.</td>
                                                  </tr>
                                           @endforelse
                              </tbody>
                       </table>
                 </div>
           </div>
     </div>

     <!-- Status Update Modal -->
     <div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-dialog-centered">
                 <div class="shadow-lg border-0 rounded-3 modal-content">

                       <!-- Header -->
                       <div class="bg-primary rounded-top text-white modal-header">
                              <h5 class="modal-title fw-bold" id="statusModalLabel">
                                    <i class="me-2 fas fa-sync-alt"></i> Update Purchase Status
                              </h5>
                              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                       </div>

                       <!-- Body -->
                       <div class="px-4 py-3 modal-body">
                              <input type="hidden" id="purchaseId">

                              <label for="newStatus" class="mb-2 form-label fw-semibold">Select New Status</label>
                              <select class="shadow-sm border-primary form-select" id="newStatus">
                                    <option value="pending" class="text-warning fw-bold">🕒 Pending</option>
                                    <option value="approved" class="text-success fw-bold">✅ Approved</option>
                                    <option value="completed" class="text-info fw-bold">📦 Completed</option>
                              </select>
                       </div>

                       <!-- Footer -->
                       <div class="bg-light rounded-bottom modal-footer">
                              <button type="button" class="px-4 btn-outline-secondary btn" data-bs-dismiss="modal">
                                    Cancel
                              </button>
                              <button type="button" id="saveStatus" class="px-4 btn btn-primary">
                                    <i class="me-1 fas fa-save"></i> Save
                              </button>
                       </div>

                 </div>
           </div>
     </div>


     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script>
           $(document).ready(function () {
                 let statusBadge;

                 // Open modal and set current status
                 $('.change-status').on('click', function () {
                       statusBadge = $(this);
                       let purchaseId = statusBadge.data('id');
                       let currentStatus = statusBadge.data('status');

                       $('#purchaseId').val(purchaseId);
                       $('#newStatus').val(currentStatus);

                       $('#statusModal').modal('show');
                 });

                 // Save new status
                 $('#saveStatus').on('click', function () {
                       let purchaseId = $('#purchaseId').val();
                       let newStatus = $('#newStatus').val();

                       $.ajax({
                              url: "{{ route('purchases.toggle-status') }}",
                              type: "POST",
                              data: {
                                    _token: $('meta[name="csrf-token"]').attr('content'),
                                    id: purchaseId,
                                    status: newStatus
                              },
                              success: function (response) {
                                    if (response.success) {
                                          statusBadge
                                                .removeClass('bg-warning bg-success bg-primary bg-secondary')
                                                .addClass(newStatus === 'pending' ? 'bg-warning' :
                                                       newStatus === 'approved' ? 'bg-success' :
                                                             newStatus === 'completed' ? 'bg-primary' : 'bg-secondary')
                                                .text(newStatus.charAt(0).toUpperCase() + newStatus.slice(1))
                                                .data('status', newStatus);

                                          $('#statusModal').modal('hide');
                                    } else {
                                          alert('Failed to update status!');
                                    }
                              },
                              error: function () {
                                    alert('Error updating status!');
                              }
                       });
                 });
           });
     </script>
@endsection