@extends("superadmin.layouts.splayout")

@section('title', 'Dashboard')

@section('content')
     <div class="py-5 container-fluid">

           <!-- Page Header -->
           <div class="d-flex align-items-center justify-content-between mb-4">
                 <h3 class="fw-bold">Welcome back, {{ auth()->user()->name }} 👋</h3>
                 
           </div>

           <!-- KPI Cards -->
           <div class="row g-4">
                 <div class="col-md-3 col-sm-6">
                       <div class="d-flex align-items-center p-4 card-modern">
                              <div class="bg-primary bg-opacity-10 me-3 p-3 rounded-circle text-primary">
                                    <i class="fas fa-users fa-lg"></i>
                              </div>
                              <div>
                                    <h6 class="mb-1 text-muted">Employees</h6>
                                    <h4 class="mb-0 fw-bold">1,245</h4>
                              </div>
                       </div>
                 </div>

                 <div class="col-md-3 col-sm-6">
                       <div class="d-flex align-items-center p-4 card-modern">
                              <div class="bg-success bg-opacity-10 me-3 p-3 rounded-circle text-success">
                                    <i class="fas fa-dollar-sign fa-lg"></i>
                              </div>
                              <div>
                                    <h6 class="mb-1 text-muted">Monthly Sales</h6>
                                    <h4 class="mb-0 fw-bold">$82,450</h4>
                              </div>
                       </div>
                 </div>

                 <div class="col-md-3 col-sm-6">
                       <div class="d-flex align-items-center p-4 card-modern">
                              <div class="bg-warning bg-opacity-10 me-3 p-3 rounded-circle text-warning">
                                    <i class="fas fa-box fa-lg"></i>
                              </div>
                              <div>
                                    <h6 class="mb-1 text-muted">Inventory</h6>
                                    <h4 class="mb-0 fw-bold">4,732</h4>
                              </div>
                       </div>
                 </div>

                 <div class="col-md-3 col-sm-6">
                       <div class="d-flex align-items-center p-4 card-modern">
                              <div class="bg-danger bg-opacity-10 me-3 p-3 rounded-circle text-danger">
                                    <i class="fas fa-exclamation-circle fa-lg"></i>
                              </div>
                              <div>
                                    <h6 class="mb-1 text-muted">Pending Orders</h6>
                                    <h4 class="mb-0 fw-bold">128</h4>
                              </div>
                       </div>
                 </div>
           </div>

           <!-- Chart + Table -->
           <div class="mt-4 row g-4">
                 <!-- Chart Section -->
                 <div class="col-lg-8">
                       <div class="p-4 card-modern">
                              <h6 class="mb-3 fw-bold">Sales Overview</h6>
                              <canvas id="salesChart" height="150"></canvas>
                       </div>
                 </div>

                 <!-- Recent Activity Table -->
                 <div class="col-lg-4">
                       <div class="p-4 card-modern">
                              <h6 class="mb-3 fw-bold">Recent Activities</h6>
                              <ul class="list-unstyled">
                                    <li class="d-flex align-items-start mb-3">
                                          <span class="bg-primary me-3 badge">📦</span>
                                          <div>
                                                <strong>Order #1024</strong> has been shipped.
                                                <div class="text-muted small">2 hours ago</div>
                                          </div>
                                    </li>
                                    <li class="d-flex align-items-start mb-3">
                                          <span class="bg-success me-3 badge">💰</span>
                                          <div>
                                                Payment received for Invoice #889.
                                                <div class="text-muted small">5 hours ago</div>
                                          </div>
                                    </li>
                                    <li class="d-flex align-items-start">
                                          <span class="bg-warning me-3 badge">⚠️</span>
                                          <div>
                                                Inventory low for Product #556.
                                                <div class="text-muted small">1 day ago</div>
                                          </div>
                                    </li>
                              </ul>
                       </div>
                 </div>
           </div>

     </div>

     <!-- Chart.js -->
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
     <script>
           const ctx = document.getElementById('salesChart').getContext('2d');
           new Chart(ctx, {
                 type: 'line',
                 data: {
                       labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                       datasets: [{
                              label: 'Sales',
                              data: [12000, 15000, 13000, 18000, 17000, 21000],
                              backgroundColor: 'rgba(13, 110, 253, 0.2)',
                              borderColor: '#0d6efd',
                              borderWidth: 2,
                              tension: 0.3,
                              fill: true
                       }]
                 },
                 options: {
                       responsive: true,
                       plugins: { legend: { display: false } },
                       scales: { y: { beginAtZero: true } }
                 }
           });
     </script>
@endsection