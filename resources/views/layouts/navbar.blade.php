<header class="sticky-top">
    <nav class="navbar navbar-expand-lg shadow-sm py-3">
        <div class="container-fluid px-4 px-md-5">
            <div class="d-flex align-items-center">
                <button class="btn btn-sm btn-light btn-outline-secondary d-lg-none me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar" aria-label="Toggle navigation">
                    <i class="bi bi-list fs-5"></i>
                </button>
                <a class="navbar-brand dashboard-title fs-4 mb-0 text-dark-brown fw-bold" href="#">
                    <span class="text-light">Perk Up Coffee </span> 
                </a>
            </div>
            <!-- 3. User Actions (Bell and Profile Dropdown) -->
            <div class="d-flex align-items-center ms-auto">
                <!-- Notification Bell -->
                <button class="btn btn-light rounded-circle" type="button" aria-label="Notifications">
                    <i class="bi bi-bell"></i>
                </button>
                
                <!-- Profile Dropdown -->
                <div class="ms-3 dropdown">
                    <button class="btn btn-light p-0 d-flex align-items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="User profile menu">
                        <div class="rounded-circle bg-maroon p-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="bi bi-person-circle text-white fs-5"></i>
                        </div>
                    </button>
                    <!-- Dropdown Content -->
                    <ul class="dropdown-menu dropdown-menu-end shadow border-0 stat-card">
                        <li><h6 class="dropdown-header text-dark-brown">Admin User</h6></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i> Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-box-arrow-right me-2"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
<style>
    .navbar{
    background-color: var(--maroon) !important;
    }
</style>
