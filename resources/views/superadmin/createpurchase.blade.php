@extends('superadmin.layouts.splayout')
@section('title', 'Create Purchase')
@section('content')
     <div class="py-5 container-fluid">
           <!-- Header -->
           <div class="d-flex align-items-center justify-content-between px-3">
                 <h3 class="fw-bold">Add Purchase</h3>
                 <a href="{{ route('purchase.list') }}" class="btn btn-secondary btn-sm">
                       <i class="fa-arrow-left me-2 fas"></i> Back
                 </a>
           </div>
           <div class="m-2 p-4 card-modern">
                 <form action="{{ route('purchase.store') }}" method="POST">
                       @csrf

                       <div class="mb-3">
                              <label>Purchase Date</label>
                              <input type="date" name="purchase_date" class="form-control" required>
                       </div>

                       <h4 class="mb-3">🛒 Items</h4>

                       <div id="items">
                              <div class="shadow-sm mb-3 card item-row">
                                    <div class="card-body row g-3">
                                          <div class="col-md-4">
                                                <label class="form-label fw-semibold">Item Name</label>
                                                <input type="text" name="items[0][name]" class="form-control"
                                                       placeholder="Enter item name" required>
                                          </div>
                                          <div class="col-md-3">
                                                <label class="form-label fw-semibold">Quantity</label>
                                                <input type="number" name="items[0][qty]" class="form-control" placeholder="0"
                                                       required>
                                          </div>
                                          <div class="d-flex align-items-end col-md-2">
                                                <button type="button" class="w-100 btn btn-danger remove-item">
                                                       <i class="bi bi-trash"></i> Remove
                                                </button>
                                          </div>
                                    </div>
                              </div>
                       </div>

                       <!-- Add Item Button -->
                       <div class="text-end">
                              <button type="button" id="addItem" class="btn btn-primary">
                                    <i class="bi bi-plus-circle"></i> Add Item
                              </button>
                       </div>

                       <button type="submit" class="btn btn-primary">Save Purchase</button>
                 </form>
           </div>



           <script>
                 let itemIndex = 1;

                 document.getElementById('addItem').addEventListener('click', () => {
                       let div = document.createElement('div');
                       div.classList.add('card', 'shadow-sm', 'mb-3', 'item-row');

                       div.innerHTML = `
                              <div class="card-body row g-3">
                                    <div class="col-md-4">
                                          <label class="form-label fw-semibold">Item Name</label>
                                          <input type="text" name="items[${itemIndex}][name]" class="form-control" placeholder="Enter item name" required>
                                    </div>
                                    <div class="col-md-3">
                                          <label class="form-label fw-semibold">Quantity</label>
                                          <input type="number" name="items[${itemIndex}][qty]" class="form-control" placeholder="0" required>
                                    </div>
                                    <div class="d-flex align-items-end col-md-2">
                                          <button type="button" class="w-100 btn btn-danger remove-item">
                                                <i class="bi bi-trash"></i> Remove
                                          </button>
                                    </div>
                              </div>
                       `;

                       document.getElementById('items').appendChild(div);
                       itemIndex++;
                 });

                 // Delegate remove button functionality
                 document.getElementById('items').addEventListener('click', (e) => {
                       if (e.target.closest('.remove-item')) {
                              e.target.closest('.item-row').remove();
                       }
                 });
           </script>

 @endsection