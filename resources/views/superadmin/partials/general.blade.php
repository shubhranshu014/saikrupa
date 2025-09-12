<!-- General Tab -->
<h4 class="mb-3 text-primary fw-bold">General Information</h4>
<div class="bg-white shadow-sm mx-auto mb-3 p-4 border rounded lead-info-card">
     <ul class="mb-0 list-unstyled">
          <li class="d-flex justify-content-between mb-3">
               <span class="text-secondary fw-semibold"><i class="me-2 text-primary fas fa-user"></i>Name:</span>
               <span class="text-dark">{{ $lead->name }}</span>
          </li>
          <li class="d-flex justify-content-between mb-3">
               <span class="text-secondary fw-semibold"><i class="me-2 text-danger fas fa-envelope"></i>Email:</span>
               <a href="mailto:{{ $lead->email }}" class="text-dark text-decoration-none">
                    {{ $lead->email }}
               </a>
          </li>
          <li class="d-flex justify-content-between mb-3">
               <span class="text-secondary fw-semibold"><i class="me-2 text-success fas fa-phone-alt"></i>Phone:</span>
               <a href="tel:{{ $lead->phone }}" class="text-dark text-decoration-none">
                    {{ $lead->phone ?? 'N/A' }}
               </a>
          </li>
          <li class="d-flex justify-content-between">
               <span class="text-secondary fw-semibold"><i
                         class="me-2 text-warning fas fa-map-marker-alt"></i>Address:</span>
               <span class="text-dark">{{ $lead->address ?? 'No Address' }}</span>
          </li>
     </ul>
</div>

<style>
     .lead-info-card {
          max-width: 500px;
          /* Smooth width limit */
          transition: all 0.3s ease;
          background: #fff;
     }

     .lead-info-card:hover {
          transform: translateY(-3px);
          box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
     }

     .lead-info-card ul li {
          padding: 6px 0;
          border-bottom: 1px dashed #eaeaea;
     }

     .lead-info-card ul li:last-child {
          border-bottom: none;
     }

     @media (max-width: 576px) {
          .lead-info-card {
               max-width: 100%;
               padding: 15px;
          }
     }
</style>