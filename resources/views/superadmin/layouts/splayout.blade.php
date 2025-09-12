<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>@yield('title', 'ERP Dashboard')</title>

     <!-- Bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

     <!-- Font Awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
     <!-- Bootstrap 5 CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

     <!-- Bootstrap 5 JS -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


     <style>
          :root {
               --sidebar-bg: #1e1f26;
               --sidebar-active: #0d6efd;
               --sidebar-hover: rgba(255, 255, 255, 0.1);
               --text-light: #f5f6fa;
               --text-muted: #a5a5a5;
               --content-bg: #f8f9fa;
          }

          body {
               font-family: 'Lato', 'Segoe UI', Arial, sans-serif;
               background: var(--content-bg);
               margin: 0;
               display: flex;
               flex-direction: column;
               min-height: 100vh;
          }

          /* Navbar */
          .navbar {
               box-shadow: 0 1px 8px rgba(0, 0, 0, 0.05);
               background: white !important;
               z-index: 1100;
          }

          .profile-img {
               width: 38px;
               height: 38px;
               border-radius: 50%;
               object-fit: cover;
          }

          /* Sidebar */
          .sidebar {
               width: 255px;
               background: var(--sidebar-bg);
               color: var(--text-light);
               position: fixed;
               top: 0;
               left: 0;
               height: 100%;
               padding-top: 70px;
               transition: transform 0.3s ease-in-out;
               z-index: 1050;

               overflow-y: auto;
          }

          /* Optional: style the scrollbar for better look */
          .sidebar::-webkit-scrollbar {
               width: 6px;
          }

          .sidebar::-webkit-scrollbar-thumb {
               background-color: rgba(255, 255, 255, 0.3);
               border-radius: 3px;
          }

          .sidebar::-webkit-scrollbar-thumb:hover {
               background-color: rgba(255, 255, 255, 0.5);
          }

          .sidebar a {
               display: flex;
               align-items: center;
               gap: 12px;
               padding: 12px 20px;
               color: var(--text-light);
               font-size: 15px;
               text-decoration: none;
               border-radius: 8px;
               margin: 4px 12px;
               transition: background 0.2s ease-in-out;
          }

          .sidebar a:hover {
               background: var(--sidebar-hover);
          }

          .sidebar a.active {
               background: var(--sidebar-active);
          }

          .sidebar .menu-title {
               font-size: 12px;
               font-weight: bold;
               color: var(--text-muted);
               text-transform: uppercase;
               margin: 15px 20px 5px;
          }

          /* Overlay for mobile */
          @media (max-width: 991px) {
               .sidebar {
                    transform: translateX(-100%);
               }

               .sidebar.open {
                    transform: translateX(0);
               }

               #overlay {
                    display: none;
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: rgba(0, 0, 0, 0.4);
                    z-index: 1040;
               }

               #overlay.show {
                    display: block;
               }
          }

          /* Content Area */
          .content-area {
               margin-left: 250px;
               padding: 25px;
               transition: margin-left 0.3s ease;
               flex: 1;
          }

          @media (max-width: 991px) {
               .content-area {
                    margin-left: 0;
               }
          }

          /* Cards Modern Look */
          .card-modern {
               border: none;
               border-radius: 16px;
               box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
               background: white;
               transition: transform 0.2s ease, box-shadow 0.2s ease;
          }

          .card-modern:hover {
               transform: translateY(-3px);
               box-shadow: 0 6px 16px rgba(0, 0, 0, 0.08);
          }

          /* Footer */
          footer {
               background: white;
               text-align: center;
               padding: 12px;
               font-size: 14px;
               border-top: 1px solid #ddd;
          }



          /* dropdown option  */

          /* Sidebar Dropdown Submenu */
          .sidebar-dropdown ul {
               list-style: none;
               padding-left: 40px;
               margin: 0;
               display: none;
               /* Hide by default */
          }

          .sidebar-dropdown.open ul {
               display: block;
               /* Show when open */
          }

          .sidebar-dropdown>a {
               display: flex;
               justify-content: space-between;
               align-items: center;
               padding: 12px 20px;
               color: var(--text-light);
               text-decoration: none;
               cursor: pointer;
          }

          .sidebar-dropdown>a:hover {
               background: var(--sidebar-hover);
          }
     </style>
</head>

<body>

     <!-- Navbar -->
     <nav class="fixed-top px-3 navbar navbar-expand-lg">
          <button class="btn btn-link d-lg-none" id="sidebarToggle">
               <i class="fas fa-bars fs-4"></i>
          </button>
          <a class="" href="#"><img src="{{ asset('images/SaiKrupa_Logo.png') }}" alt="ERP System" height="50"></a>
          <div class="ms-auto dropdown">
               <a href="#" class="d-flex align-items-center text-decoration-none" data-bs-toggle="dropdown">
                    <img src="https://cdn-icons-png.flaticon.com/512/219/219988.png" alt="Profile"
                         class="me-2 profile-img" style="height: 35px; width: 35px;">
                    <span class="fw-semibold">
                         {{ Auth::check() ? Auth::user()->name : 'Guest' }}
                    </span>
                    <i class="ms-1 fa-caret-down fas"></i>
               </a>
               <ul class="shadow dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#"><i class="me-2 fas fa-user-cog"></i> Settings</a></li>
                    <li>
                         <form method="POST" action="{{ route('logout') }}">
                              @csrf
                              <button type="submit" class="text-danger dropdown-item">
                                   <i class="me-2 fas fa-sign-out-alt"></i> Logout
                              </button>
                         </form>
                    </li>
               </ul>
          </div>
     </nav>


     @php
          $userPermissions = auth()->user()->permission ? auth()->user()->permission->menus : [];
        @endphp

     <!-- Sidebar -->
     <div class="sidebar" id="sidebarNav">
          <div class="menu-title">Main Menu</div>
          @if(in_array('dashboard', $userPermissions) || auth()->user()->role == 'super admin')
               <a href="{{ route("superadmin.dashboard") }}"
                    class="{{ request()->routeIs('superadmin.dashboard') ? 'active' : '' }}"><i class="fas fa-home"></i>
                    Dashboard</a>
          @endif
          @if(in_array('users', $userPermissions) || auth()->user()->role == 'super admin')
               <a href="{{ route("superadmin.userlist") }} "
                    class="{{ request()->routeIs('superadmin.userlist', "superadmin.createuser") ? 'active' : '' }}"><i
                         class="fas fa-users"></i> Users</a>
          @endif
          <div class="sidebar-dropdown  {{ request()->routeIs('contact.list', 'contact.details.list') ? 'open' : '' }}"
               id="businesscontactDropdown">
               <a href="javascript:void(0)"
                    class="{{ request()->routeIs('contact.list', 'contact.details.list') ? 'active' : '' }}">
                    <span><i class="fas fa-user-tie"></i> Business Contact </span>
                    <i class="fas fa-chevron-down"></i>
               </a>
               <ul>
                    <li><a href="{{ route('contact.list') }}">Contacts</a></li>
               </ul>
               <ul>
                    <li><a href="{{ route('contact.details.list') }}">Contact Details</a></li>
               </ul>
          </div>
          @if(in_array('store', $userPermissions) || auth()->user()->role == 'super admin')
               <a href="{{ route('superadmin.storelist') }}"
                    class="{{ request()->routeIs('superadmin.storelist', "superadmin.createstore") ? 'active' : '' }}"><i
                         class="fas fa-store"></i> Store</a>
          @endif
          @if(in_array('suppliers', $userPermissions) || auth()->user()->role == 'super admin')
               <a href="{{ route('superadmin.supplierslist') }}"
                    class="{{ request()->routeIs('superadmin.supplierslist', 'superadmin.createsupplier') ? 'active' : '' }}"><i
                         class="fas fa-user-tie"></i> Suppliers</a>
          @endif
          @if(in_array('inventory', $userPermissions) || auth()->user()->role == 'super admin')
               <div class="sidebar-dropdown  {{ request()->routeIs('superadmin.profilesinventory.*', 'superadmin.create.profilesinventory', 'superadmin.glassinventory.list', 'superadmin.create.glassinventory', 'superadmin.hardwareinventory.list', 'superadmin.create.hardwareinventory', 'superadmin.accessoriesinventory.list', 'superadmin.create.accessoriesinventory', ) ? 'open' : '' }}"
                    id="inventoryDropdown">
                    <a href="javascript:void(0)"
                         class="{{ request()->routeIs('superadmin.profilesinventory.*', 'superadmin.create.profilesinventory', 'superadmin.glassinventory.list', 'superadmin.create.glassinventory', 'superadmin.hardwareinventory.list', 'superadmin.create.hardwareinventory', 'superadmin.accessoriesinventory.list', 'superadmin.create.accessoriesinventory', ) ? 'active' : '' }}">
                         <span><i class="fas fa-box"></i> Inventory</span>
                         <i class="fas fa-chevron-down"></i>
                    </a>
                    <ul>
                         <li><a href="{{ route('superadmin.profilesinventory.list') }}">Profiles Inventory</a></li>
                         <li><a href="{{ route('superadmin.glassinventory.list') }}">Glass Inventory</a></li>
                         <li><a href="{{ route('superadmin.hardwareinventory.list') }}">Hardware Inventory</a></li>
                         <li><a href="{{ route('superadmin.accessoriesinventory.list') }}">Accessories Inventory</a></li>
                    </ul>
               </div>
          @endif
          @if(in_array('production', $userPermissions) || auth()->user()->role == 'super admin')
               <div class="sidebar-dropdown  {{ request()->routeIs('superadmin.stockmovement.list', 'superadmin.create.stock-movement', 'superadmin.product.list') ? 'open' : '' }}"
                    id="productionDropdown">
                    <a href="javascript:void(0)"
                         class="{{ request()->routeIs('superadmin.stockmovement.list', 'superadmin.create.stock-movement', 'superadmin.product.list') ? 'active' : '' }}">
                         <span><i class="fas fa-industry"></i> Production</span>
                         <i class="fas fa-chevron-down"></i>
                    </a>
                    <ul>
                         <li><a href="{{ route('superadmin.product.list') }}">Final Product</a></li>
                         <li><a href="{{ route('superadmin.stockmovement.list') }}">Stock Movement</a></li>
                    </ul>
               </div>
          @endif
          <a href="{{ route('purchase.list') }}"
               class="{{ request()->routeIs('purchase.list', 'purchase.create', ) ? 'active' : '' }}"><i
                    class="fas fa-credit-card"></i> purchase</a>
          <div class="sidebar-dropdown  {{ request()->routeIs('leads.list', 'leads.create', 'leads.details.create', 'leads.assign.list') ? 'open' : '' }}"
               id="CRMSystemDropdown">
               <a href="javascript:void(0)"
                    class="{{ request()->routeIs('leads.list', 'leads.create', 'leads.details.create', 'leads.assign.list') ? 'active' : '' }}">
                    <span><i class="fa-solid fa-diagram-project"></i> CRM System</span>
                    <i class="fas fa-chevron-down"></i>
               </a>
               <ul>
                    <li><a href="{{ route('leads.list') }}">Leads</a></li>
               </ul>
               <ul>
                    <li><a href="{{ route('leads.assign.list') }}">Assign Leads</a></li>
               </ul>
          </div>
          <div class="sidebar-dropdown  {{ request()->routeIs('') ? 'open' : '' }}" id="HRMSSystemDropdown">
               <a href="javascript:void(0)" class="{{ request()->routeIs('') ? 'active' : '' }}">
                    <span><i class="fa-solid fa-diagram-project"></i> HRMS </span>
                    <i class="fas fa-chevron-down"></i>
               </a>
               <ul>
                    <li><a href="">Attandance</a></li>
               </ul>
          </div>
          @if(auth()->user()->role == 'super admin')
               <div class="sidebar-dropdown  {{ request()->routeIs('superadmin.permissionsuser', 'superadmin.purchase.update') ? 'open' : '' }}"
                    id="settingDropdown">
                    <a href="javascript:void(0)"
                         class="{{ request()->routeIs('superadmin.permissionsuser', 'superadmin.purchase.update') ? 'active' : '' }}">
                         <span><i class="fas fa-cogs"></i> Settings</span>
                         <i class="fas fa-chevron-down"></i>
                    </a>
                    <ul>
                         <li><a href="{{ route('superadmin.permissionsuser') }}">Set Permission</a></li>
                    </ul>
                    <ul>
                         <li><a href="{{ route('superadmin.purchase.update') }}">Set Purchase</a></li>
                    </ul>
               </div>
          @endif
          <div class="menu-title">Reports</div>
          @if(in_array('sales_report', $userPermissions) || auth()->user()->role == 'super admin')
               <a href="#"><i class="fas fa-chart-line"></i> Sales Report</a>
          @endif
          @if(in_array('inventory_report', $userPermissions) || auth()->user()->role == 'super admin')
               <a href="#"><i class="fas fa-chart-pie"></i> Inventory Report</a>
          @endif
     </div>

     <!-- Overlay -->
     <div id="overlay"></div>

     <!-- Main Content -->
     <div class="content-area">
          @yield('content')
     </div>

     <!-- Footer -->
     <footer>
          &copy; <span id="year"></span> ERP System. All Rights Reserved.
     </footer>

     <!-- Scripts -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
     <script>
          document.getElementById('year').textContent = new Date().getFullYear();

          const sidebar = document.getElementById('sidebarNav');
          const overlay = document.getElementById('overlay');
          const toggleBtn = document.getElementById('sidebarToggle');

          toggleBtn.addEventListener('click', () => {
               sidebar.classList.toggle('open');
               overlay.classList.toggle('show');
          });

          overlay.addEventListener('click', () => {
               sidebar.classList.remove('open');
               overlay.classList.remove('show');
          });

          document.querySelectorAll('.sidebar a').forEach(link => {
               link.addEventListener('click', () => {
                    if (window.innerWidth <= 991) {
                         sidebar.classList.remove('open');
                         overlay.classList.remove('show');
                    }
               });
          });
     </script>

     <script>
          document.querySelector('#inventoryDropdown > a').addEventListener('click', function () {
               document.querySelector('#inventoryDropdown').classList.toggle('open');
          });

          // Production dropdown
          document.querySelector('#productionDropdown > a').addEventListener('click', function () {
               document.querySelector('#productionDropdown').classList.toggle('open');
          });

          // setting dropdown
          document.querySelector('#settingDropdown > a').addEventListener('click', function () {
               document.querySelector('#settingDropdown').classList.toggle('open');
          });
          // crm system dropdown
          // setting dropdown
          document.querySelector('#CRMSystemDropdown > a').addEventListener('click', function () {
               document.querySelector('#CRMSystemDropdown').classList.toggle('open');
          });
          document.querySelector('#HRMSSystemDropdown > a').addEventListener('click', function () {
               document.querySelector('#HRMSSystemDropdown').classList.toggle('open');
          });
          // businesscontactDropdown
          document.querySelector('#businesscontactDropdown > a').addEventListener('click', function () {
               document.querySelector('#businesscontactDropdown').classList.toggle('open');
          });
     </script>
</body>

</html>