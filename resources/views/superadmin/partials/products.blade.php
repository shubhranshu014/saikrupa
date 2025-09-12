<div id="product-details-section">
     <div class="d-flex align-items-center justify-content-between mb-3">
          <h4 class="mb-0 text-primary fw-bold">Add Product Details</h4>
          <a href="#" class="btn btn-primary btn-sm" id="product-list-button">
               Product List
          </a>
     </div>
     <form action="{{ route('leads.details.store') }}" method="POST" class="row g-3">
          @csrf
          <input type="hidden" name="lead_id" value="{{ $lead->id }}">
          <!-- Product Category -->
          <div class="col-md-6">
               <label class="form-label fw-semibold">Product Category</label>
               <select name="product_category" class="form-select" required>
                    <option value="">-- Select Category --</option>
                    <option value="upvc_door">UPVC Door</option>
                    <option value="door">Door</option>
                    <option value="window">Window</option>
               </select>
          </div>

          <!-- Width -->
          <div class="col-md-3">
               <label class="form-label fw-semibold">Width (mm)</label>
               <input type="number" name="width" class="form-control" min="1" required>
          </div>
          <!-- Height -->
          <div class="col-md-3">
               <label class="form-label fw-semibold">Height (mm)</label>
               <input type="number" name="height" class="form-control" min="1" required>
          </div>

          <!-- Quantity -->
          <div class="col-md-3">
               <label class="form-label fw-semibold">Quantity</label>
               <input type="number" name="quantity" class="form-control" min="1" required>
          </div>

          <!-- Design -->
          <div class="col-md-3">
               <label class="form-label fw-semibold">Design</label>
               <select name="design" class="form-select" required>
                    <option value="">-- Select Design --</option>
                    <option value="sliding">Sliding</option>
                    <option value="casement">Casement</option>
                    <option value="fixed">Fixed</option>
                    <option value="folding">Folding</option>
               </select>
          </div>

          <!-- Glass Specification -->
          <div class="col-md-6">
               <label class="form-label fw-semibold">Glass Specification</label>
               <input type="text" name="glass_specification" class="form-control"
                    placeholder="e.g., Toughened Glass, Double Glazed" required>
          </div>

          <!-- Location -->
          <div class="col-md-6">
               <label class="form-label fw-semibold">Location</label>
               <input type="text" name="location" class="form-control" placeholder="e.g., Bedroom, Drawing Room"
                    required>
          </div>

          <!-- Square Feet -->
          <div class="col-md-3">
               <label class="form-label fw-semibold">Square Feet</label>
               <input type="number" name="square_feet" class="form-control" min="1" step="0.01" required>
          </div>

          <!-- Position -->
          <div class="col-md-3">
               <label class="form-label fw-semibold">Position</label>
               <select name="position" class="form-select" required>
                    <option value="">-- Select Position --</option>
                    <option value="inside">Inside</option>
                    <option value="outside">Outside</option>
                    <option value="center">Center</option>
               </select>
          </div>
          <div class="col-md-6">
               <label class="form-label fw-semibold">Date</label>
               <input type="date" name="date" class="form-control" required>
          </div>

          <!-- Submit Button -->
          <div class="text-end col-12">
               <button type="submit" class="px-4 btn btn-primary">
                    <i class="me-2 fas fa-save"></i> Save Product
               </button>
          </div>
     </form>

</div>


<!-- Product List Table -->
<div class="" id="product-list-section">
     <div class="d-flex align-items-center justify-content-between mb-3">
          <h4 class="mb-3 text-primary fw-bold">Product List</h4>
          <a href="#" class="btn btn-primary btn-sm" id="add-product-button">
               <i class="me-1 fas fa-plus"></i> Add Product
          </a>
     </div>

     <div class="table-responsive">
          <table class="table table-bordered table-striped align-middle">
               <thead class="table-primary">
                    <tr class="text-center">
                         <th>#</th>
                         <th>Category</th>
                         <th>Width (mm)</th>
                         <th>Height (mm)</th>
                         <th>Quantity</th>
                         <th>Design</th>
                         <th>Glass Specification</th>
                         <th>Location</th>
                         <th>Square Feet</th>
                         <th>Position</th>
                         <th>Date</th>
                         <th>Actions</th>
                    </tr>
               </thead>
               <tbody>
                    @forelse($lead->leadDetails as $index => $detail)
                         <tr class="text-center">
                              <td>{{ $index + 1 }}</td>
                              <td>{{ ucfirst($detail->product_category) }}</td>
                              <td>{{ $detail->width }}</td>
                              <td>{{ $detail->height }}</td>
                              <td>{{ $detail->quantity }}</td>
                              <td>{{ ucfirst($detail->design) }}</td>
                              <td>{{ $detail->glass_specification }}</td>
                              <td>{{ $detail->location }}</td>
                              <td>{{ number_format($detail->square_feet, 2) }}</td>
                              <td>{{ ucfirst($detail->position) }}</td>
                              <td>{{ $detail->date }}</td>
                              <td>
                                   <!-- Edit button -->
                                   <button class="me-1 btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                   </button>
                                   <!-- Delete button -->
                                   <form action="" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                             <i class="fas fa-trash"></i>
                                        </button>
                                   </form>
                              </td>
                         </tr>
                    @empty
                         <tr>
                              <td colspan="11" class="text-muted text-center">No products added yet.</td>
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
          $('#product-details-section').show();
          $('#product-list-section').hide();

          // When clicking the "Product List" button
          $('#product-list-button').click(function () {
               $('#product-details-section').hide();
               $('#product-list-section').show();
          });

          // When clicking the "Add Product" button/icon
          $('#add-product-button').click(function () {
               $('#product-list-section').hide();
               $('#product-details-section').show();
          });
     });
</script>