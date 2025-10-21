@extends('layouts.app') 
{{-- Assumes 'layouts.app' is a master layout that defines the <head>, <body>, and .dashboard-wrapper --}}

@section('content')

<div class="main-content">
    @include('layouts.navbar')
    <div class="container-fluid p-5">
        <div class="d-flex justify-content-between align-items-center mb-5">
            <h1 class="dashboard-title fs-2 mb-0">Dashboard Overview</h1>
        </div>
        
        <div class="row g-4">
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card stat-card p-4 bg-white">
                    <div class="d-flex align-items-center">
                        <div class="me-4 p-3 rounded-circle bg-maroon-light flex-shrink-0">
                            <i class="bi bi-people text-maroon fs-3"></i>
                        </div>
                        <div>
                            <p class="text-muted mb-1 fw-bold text-uppercase small">
                                Total Users
                            </p>
                            <h3 class="fw-bolder mb-0 text-dark-brown fs-2">
                                12,458
                            </h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card stat-card p-4 bg-white">
                    <div class="d-flex align-items-center">
                        <div class="me-4 p-3 rounded-circle bg-success-subtle flex-shrink-0">
                            <i class="bi bi-currency-dollar text-success fs-3"></i>
                        </div>
                        <div>
                            <p class="text-muted mb-1 fw-bold text-uppercase small">
                                Revenue
                            </p>
                            <h3 class="fw-bolder mb-0 text-dark-brown fs-2">
                                $84,290
                            </h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card stat-card p-4 bg-white">
                    <div class="d-flex align-items-center">
                        <div class="me-4 p-3 rounded-circle bg-info-subtle flex-shrink-0">
                            <i class="bi bi-receipt-cutoff text-info fs-3"></i>
                        </div>
                        <div>
                            <p class="text-muted mb-1 fw-bold text-uppercase small">
                                Monthly Orders
                            </p>
                            <h3 class="fw-bolder mb-0 text-dark-brown fs-2">
                                1,875
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card stat-card p-4 bg-white">
                    <div class="d-flex align-items-center">
                        <div class="me-4 p-3 rounded-circle bg-warning-subtle flex-shrink-0">
                            <i class="bi bi-person-add text-warning fs-3"></i>
                        </div>
                        <div>
                            <p class="text-muted mb-1 fw-bold text-uppercase small">
                                New Signups
                            </p>
                            <h3 class="fw-bolder mb-0 text-dark-brown fs-2">
                                47
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row g-4 mt-4">
            <div class="col-lg-8">
                <div class="card stat-card p-4 bg-white h-100">
                    <h4 class="fw-bold text-dark-brown">Sales Performance</h4>
                    <p class="text-muted">A vibrant chart would go here to show monthly revenue trends.</p>
                    <div class="bg-light p-5 rounded-4 border-dashed border-1 text-center text-secondary">
                        [Chart Placeholder]
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card stat-card p-4 bg-white h-100">
                    <h4 class="fw-bold text-dark-brown">Top Products</h4>
                    <ul class="list-group list-group-flush mt-3">
                        <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                            Espresso Beans <span class="badge bg-maroon rounded-pill bg-maroon">320 units</span>
                        </li>
                        <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                            Seasonal Blend <span class="badge bg-maroon rounded-pill bg-maroon">288 units</span>
                        </li>
                        <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                            Cold Brew Kit <span class="badge bg-maroon rounded-pill bg-maroon">192 units</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
    </div>
</div>

@endsection

@include('layouts.modals') {{-- The logout modal should be included here --}}