<div id="call-details-section">
     <div class="d-flex align-items-center justify-content-between mb-3">
          <h4 class="mb-0 text-primary fw-bold">Add Call Details</h4>
          <a href="#" class="btn btn-primary btn-sm" id="call-list-button">
               call List
          </a>
     </div>

     <form action="{{ route('calls.store') }}" method="POST">
          @csrf

          <!-- Lead Dropdown -->
          <input type="hidden" name="lead_id" value="{{ $lead->id }}">
          <!-- Call Time -->
          <div class="mb-3">
               <label for="call_time" class="form-label fw-semibold">Call Time</label>
               <input type="datetime-local" name="call_time" id="call_time" class="form-control" required>
          </div>

          <!-- Notes -->
          <div class="mb-3">
               <label for="notes" class="form-label fw-semibold">Notes</label>
               <textarea name="notes" id="notes" rows="4" class="form-control" placeholder="Enter call notes..."
                    required></textarea>
          </div>

          <div class="d-flex justify-content-end">
               <button type="submit" class="px-4 btn btn-primary">Save Call</button>
          </div>
     </form>
</div>


<div class="" id="call-list-section">
     <div class="d-flex align-items-center justify-content-between mb-3">
          <h4 class="mb-3 text-primary fw-bold">Call Discussion</h4>
          <a href="#" class="btn btn-primary btn-sm" id="add-call-button">
               <i class="me-1 fas fa-plus"></i> Add Call Discussion
          </a>
     </div>

     <div class="table-responsive">
          <table class="table table-bordered table-striped align-middle">
               <thead class="table-primary">
                    <tr class="text-center">
                         <th>#</th>
                         <th>Date</th>
                         <th>Discussion</th>
                         <th>Actions</th>
                    </tr>
               </thead>
               <tbody>
                    @forelse($calls as $index => $call)
                         <tr>
                              <td class="text-center">{{ $index + 1 }}</td>
                              <td class="text-center">{{ \Carbon\Carbon::parse($call->call_time)->format('d M Y, h:i A') }}
                              </td>
                              <td>{{ $call->notes }}</td>
                              <td class="text-center">
                                   <a href="" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                   </a>
                                   <form action="" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                             onclick="return confirm('Delete this call?')">
                                             <i class="fas fa-trash-alt"></i>
                                        </button>
                                   </form>
                              </td>
                         </tr>
                    @empty
                         <tr>
                              <td colspan="4" class="text-muted text-center">No call discussions found.</td>
                         </tr>
                    @endforelse
               </tbody>
          </table>
     </div>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
     $(document).ready(function () {
          // Show product details by default
          $('#call-list-section').show();
          $('#call-details-section').hide();

          // When clicking the "Product List" button
          $('#call-list-button').click(function () {
               $('#call-details-section').hide();
               $('#call-list-section').show();
          });

          // When clicking the "Add Product" button/icon
          $('#add-call-button').click(function () {
               $('#call-list-section').hide();
               $('#call-details-section').show();
          });
     });
</script>