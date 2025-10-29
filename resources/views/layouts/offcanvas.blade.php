<div class="offcanvas offcanvas-start offcanvas-custom-body d-lg-none" tabindex="-1" id="offcanvasSidebar" aria-labelledby="offcanvasSidebarLabel">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title dashboard-title text-maroon" id="offcanvasSidebarLabel">Perk Up Coffee</h5>
        <button type="button" class="btn-close p-3" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column pt-4">
        
        {{-- Navigation Links (Included) --}}
        @include('layouts.navigation')

        {{-- Logout Button --}}
        <div class="mt-auto pt-3 border-top">
            <button class="btn btn-maroon w-100 fw-bold rounded-pill text-white" 
                    data-bs-toggle="modal" 
                    data-bs-target="#logoutModal">
                <i class="bi bi-box-arrow-right me-2"></i> Log Out
            </button>
        </div>
    </div>
</div>