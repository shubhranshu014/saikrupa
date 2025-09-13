@extends('superadmin.layouts.splayout')
@section('title', 'Purchase List')
@section('content')

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
                        <th>Status</th>
                        <th>Total Items</th>
                        <th>Created At</th>
                        <th>PDF</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($purchases as $purchase)
                        <tr>
                            <td>{{ $purchase->purchase_id }}</td>
                            <td>
                                @if($purchase->status == 'pending')
                                    <span class="bg-warning badge">Pending</span>
                                @elseif($purchase->status == 'approved')
                                    <span class="bg-success badge change-status" data-id="{{ $purchase->id }}"
                                        style="cursor: pointer;">
                                        Approved
                                    </span>
                                @else
                                    <span class="bg-secondary badge">{{ ucfirst($purchase->status) }}</span>
                                @endif
                            </td>
                            <td>{{ count(json_decode($purchase->items, true) ?? []) }}</td>
                            <td>{{ $purchase->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('purchases.download-pdf', $purchase->id) }}" class="btn btn-sm btn-primary">
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






    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).on('click', '.change-status', function () {
            let purchaseId = $(this).data('id');

            if (confirm('Are you sure you want to mark this purchase as completed?')) {
                $.ajax({
                    url: "{{ route('purchases.update-status') }}",
                    type: "POST",
                    data: {
                        id: purchaseId,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function (response) {
                        if (response.success) {
                            alert('Status updated to Completed');
                            location.reload(); // refresh the page to show updated status
                        } else {
                            alert('Failed to update status. Try again.');
                        }
                    },
                    error: function () {
                        alert('Error while updating status.');
                    }
                });
            }
        });
    </script>


@endsection