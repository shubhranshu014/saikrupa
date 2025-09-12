@extends('superadmin.layouts.splayout')
@section('title', 'Create Lead Details')

@section("content")
     <div class="py-5 container-fluid">
          <!-- Header -->
          <div class="d-flex align-items-center justify-content-between px-3">
               <h3 class="fw-bold">Lead Details</h3>
               <a href="{{ route('leads.list') }}" class="btn btn-secondary btn-sm">
                    <i class="fa-arrow-left me-2 fas"></i> Back
               </a>
          </div>
          <!-- Success Message -->
          @if(session('success'))
               <div class="alert alert-success">{{ session('success') }}</div>
          @endif

          <!-- Main Content -->
          <div class="py-4 container-fluid">
               <div class="row">
                    <!-- Sidebar Navigation -->
                    <div class="mb-4 col-md-3">
                         <div class="bg-white shadow-sm p-3 rounded-3">
                              @php
                                   $tabs = [
                                        'General' => 'fa-user-circle',
                                        'Products' => 'fa-box',
                                        'Calls' => 'fa-phone-alt',
                                        'Discussion' => 'fa-comments',
                                        'Emails' => 'fa-envelope',
                                        'Files' => 'fa-file-alt',
                                        'Proposal' => 'fa-file-contract',
                                        'Invoice' => 'fas fa-receipt'
                                   ];
                              @endphp
                              <ul class="flex-column gap-2 nav nav-pills" id="leadTabs" role="tablist">
                                   @foreach($tabs as $tab => $icon)
                                        <li class="nav-item">
                                             <button
                                                  class="nav-link fw-semibold px-3 py-2 rounded-pill w-100 text-start {{ $loop->first ? 'active' : '' }}"
                                                  id="{{ strtolower($tab) }}-tab" data-bs-toggle="pill"
                                                  data-bs-target="#{{ strtolower($tab) }}" type="button" role="tab"
                                                  aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                                  <i class="me-2 fas {{ $icon }}"></i> {{ $tab }}
                                             </button>
                                        </li>
                                   @endforeach
                              </ul>
                         </div>
                    </div>

                    <!-- Tab Content -->
                    <div class="col-md-9">
                         <div class="bg-white shadow-sm p-4 rounded-3 tab-content" id="leadTabsContent"
                              style="min-height: 400px;">
                              <!-- General Tab -->
                              <div class="tab-pane fade show active" id="general" role="tabpanel">
                                   @include('superadmin.partials.general', ['lead' => $lead])
                              </div>

                              <!-- Products Tab -->
                              <div class="tab-pane fade" id="products" role="tabpanel">
                                   @include('superadmin.partials.products', ['lead' => $lead])
                              </div>
                              <!-- call Tab -->
                              <div class="tab-pane fade" id="calls" role="tabpanel">
                                   @include('superadmin.partials.call', ['lead' => $lead])
                              </div>
                               <!-- call Tab -->
                              <div class="tab-pane fade" id="discussion" role="tabpanel">
                                   @include('superadmin.partials.discussion', ['lead' => $lead])
                              </div>
                              <!-- Other Tabs -->
                              @foreach(array_keys($tabs) as $tab)
                                   @if(!in_array($tab, ['general', 'products', 'calls','discussion']))
                                        <div class="tab-pane fade" id="{{ strtolower($tab) }}" role="tabpanel">
                                             <h4 class="mb-3 text-primary fw-bold">{{ $tab }}</h4>
                                             <p class="text-muted">No {{ strtolower($tab) }} details yet.</p>
                                        </div>
                                   @endif
                              @endforeach
                         </div>
                    </div>
               </div>
          </div>
     </div>

     <!-- Custom Styles -->
     <style>
          body {
               font-family: 'Lato', sans-serif;
          }

          .nav-pills .nav-link {
               color: #495057;
               background: #f8f9fa;
               border: 1px solid transparent;
               transition: all 0.3s ease-in-out;
          }

          .nav-pills .nav-link:hover {
               background: #e9ecef;
               color: #0d6efd;
               box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
          }

          .nav-pills .nav-link.active {
               background: linear-gradient(45deg, #007bff, #00c6ff);
               color: #fff;
               font-weight: bold;
               box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
          }

          .tab-content {
               animation: fadeIn 0.5s ease-in-out;
               border-radius: 1rem;
               box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
          }

          @keyframes fadeIn {
               from {
                    opacity: 0;
                    transform: translateY(10px);
               }

               to {
                    opacity: 1;
                    transform: translateY(0);
               }
          }
     </style>
@endsection