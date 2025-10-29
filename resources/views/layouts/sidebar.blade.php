<div class="sidebar d-none d-lg-flex flex-column">
    <div class="text-center mb-5">
        <h2 class="dashboard-title text-maroon">Perk Up Coffee</h2>
        <p class="text-muted small fw-light mt-n1">The freshest dashboard on the block.</p>
    </div>
    
    {{-- Navigation Links (Included) --}}
    @include('layouts.navigation')

    {{-- Logout Button --}}
    <div class="mt-auto pt-4 border-top">
        <button class="btn btn-maroon w-100 fw-bold rounded-pill text-white" 
                data-bs-toggle="modal" 
                data-bs-target="#logoutModal">
            <i class="bi bi-box-arrow-right me-2"></i> Log Out
        </button>
    </div>
</div>