@extends('superadmin.layouts.splayout')

@section('title', 'Lead List')

@section('content')
      <div class="py-5 container-fluid">
            <!-- Header -->
            <div class="d-flex align-items-center justify-content-between mb-4 px-3">
                  <!-- Left: Heading -->
                  <h3 class="mb-0 fw-bold">Lead List</h3>

                  <a href="{{ route('leads.create') }}" class="shadow-sm btn btn-primary btn-sm">
                        <i class="me-2 fas fa-plus"></i> Add Lead
                  </a>
            </div>

            <!-- Success Message -->
            @if(session('success'))
                  <div class="shadow-sm mb-4 px-3 py-2 rounded-3 alert alert-success">
                        <i class="me-2 fas fa-check-circle"></i>{{ session('success') }}
                  </div>
            @endif

            <!-- Lead Columns -->
            <div class="row g-4">
                  @php
                        $leadCategories = [
                              ['title' => 'Hot Leads', 'color' => 'text-danger', 'icon' => 'fas fa-fire-alt', 'data' => $hotLeads],
                              ['title' => 'Warm Leads', 'color' => 'text-warning', 'icon' => 'fas fa-sun', 'data' => $warmLeads],
                              ['title' => 'Cold Leads', 'color' => 'text-secondary', 'icon' => 'fas fa-snowflake', 'data' => $coldLeads],
                        ];
                       @endphp

                  @foreach($leadCategories as $category)
                        <div class="col-md-4">
                              <!-- Category Title -->
                              <h5 class="mb-3 fw-bold {{ $category['color'] }}">
                                    <i class="me-2 {{ $category['icon'] }}"></i> {{ $category['title'] }}
                              </h5>

                              @forelse($category['data'] as $lead)
                                    <div class="hover-shadow shadow-sm mb-3 border-0 rounded-4 card">
                                          <div class="position-relative p-4 text-center card-body">
                                                <!-- Horizontal dot menu -->
                                                <a href="{{ route('leads.details.create', $lead->id) }}" class="top-0 position-absolute me-2 mt-2 text-muted end-0"
                                                      title="More options">
                                                      <i class="fas fa-ellipsis-h"></i>
                                                </a>

                                                <!-- Lead Name -->
                                                <h6 class="mb-2 text-dark fw-bold">{{ $lead->name }}</h6>

                                                <!-- Horizontal line under name -->
                                                <hr class="my-2" style="border-top: 2px solid #000; width: 60%; margin: auto;">

                                                <!-- Lead Date -->
                                                <div class="mb-2 text-muted small">
                                                      <i class="me-2 text-info fas fa-calendar-alt"></i>
                                                      {{ $lead->date }}
                                                </div>

                                                <!-- Lead Source -->
                                                <div class="mb-2 text-muted small">
                                                      <i class="me-2 text-secondary fas fa-link"></i>
                                                      {{ $lead->lead_sources ?? 'Unknown Source' }}
                                                </div>

                                                <!-- Lead Email -->
                                                <div class="mb-2 text-muted small">
                                                      <i class="me-2 text-primary fas fa-envelope"></i>{{ $lead->email }}
                                                </div>

                                                <!-- Lead Phone -->
                                                <div class="mb-2 text-muted small">
                                                      <i class="me-2 text-success fas fa-phone"></i>{{ $lead->phone ?? 'N/A' }}
                                                </div>

                                                <!-- Lead Address -->
                                                <div class="text-muted small">
                                                      <i
                                                            class="me-2 text-warning fas fa-map-marker-alt"></i>{{ $lead->address ?? 'No Address' }}
                                                </div>
                                                 <!-- Reference name -->
                                                <div class="text-muted small">
                                                      <i
                                                            class="me-2 text-secondary fas fa-user"></i>{{ $lead->reference_name ?? 'No Reference' }}
                                                </div>

                                                <!-- Action Buttons -->
                                                <div class="d-flex justify-content-center gap-2 mt-3">
                                                      <a href="tel:{{ $lead->phone }}"
                                                            class="px-3 rounded-pill btn-outline-primary btn btn-sm">
                                                            <i class="fas fa-phone"></i> Call
                                                      </a>
                                                      <a href="mailto:{{ $lead->email }}"
                                                            class="px-3 rounded-pill btn-outline-success btn btn-sm">
                                                            <i class="fas fa-envelope"></i> Email
                                                      </a>
                                                </div>
                                          </div>
                                    </div>
                              @empty
                                    <p class="text-muted fst-italic">
                                          No {{ strtolower($category['title']) }} available.
                                    </p>
                              @endforelse
                        </div>
                  @endforeach

            </div>
      </div>

      <style>
            .hover-shadow:hover {
                  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15) !important;
                  transform: translateY(-2px);
                  transition: all 0.3s ease-in-out;
            }

            .card-body h6 {
                  font-size: 1.1rem;
            }

            .card-body .small {
                  font-size: 0.85rem;
            }
      </style>
@endsection