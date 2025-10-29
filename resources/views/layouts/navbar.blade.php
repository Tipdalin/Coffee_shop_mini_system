<style>
    :root {
        --maroon: #6b160b;
        --maroon-dark: #6b160b;
        --dark-brown: #333333;
        --bg-light: #f4f7f9;
        --shadow-light: 0 4px 12px rgba(0, 0, 0, 0.08);
        --shadow-deep: 0 6px 12px rgb(100, 7, 7);
    }
    
    /* Custom Navbar and Icon Styles */
    .custom-navbar {
        background-color: white; /* Match the cards/modals */
        border-bottom: 1px solid #e0e0e0;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }
    .navbar-toggle-btn, .navbar-icon-btn {
        border: none;
        background: none;
        color: var(--dark-brown);
        padding: 0.5rem;
        border-radius: 50%;
        transition: background-color 0.2s;
    }
    .navbar-icon-btn:hover {
        background-color: var(--bg-light);
    }
    .profile-icon-wrapper {
        width: 40px;
        height: 40px;
        background-color: var(--maroon);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.1rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .text-maroon {
        color: var(--maroon);
    }
    .btn-maroon {
        background-color: var(--maroon);
        color: white;
        border: none;
        padding: 10px 24px;
        border-radius: 50px;
        transition: all 0.2s ease-in-out;
        box-shadow: 0 4px 6px rgb(121, 6, 8);
    }
    .btn-maroon:hover {
        background-color: var(--maroon-dark);
        color: white;
    }
    .btn-outline-maroon {
        color: var(--maroon);
        border-color: var(--maroon);
        border-radius: 50px;
        transition: background-color 0.2s;
    }
    .btn-outline-maroon:hover {
        background-color: var(--maroon);
        color: white;
    }
    .stat-card {
        border-radius: 20px;
        box-shadow: var(--shadow-light);
    }
    .dashboard-title {
        font-weight: 800;
    }
</style>

<header class="sticky-top">
    <nav class="navbar navbar-expand-lg custom-navbar">
        <div class="container-fluid px-4 px-md-5">
            <div class="d-flex align-items-center">
                {{-- Mobile Toggle Button for Offcanvas Sidebar (Always Visible on Mobile) --}}
                <button class="btn navbar-toggle-btn d-lg-none me-3" type="button" 
                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" 
                        aria-controls="offcanvasSidebar" aria-label="Toggle navigation">
                    <i class="bi bi-list fs-5"></i>
                </button>
                
                {{-- Mobile Brand Title --}}
                <a class="navbar-brand dashboard-title fs-5 mb-0 d-lg-none" href="{{ url('/') }}">
                    <span class="text-maroon">Perk Up Coffee</span> 
                </a>
            </div>

            {{-- Empty div for spacing on desktop --}}
            <div class="d-none d-lg-block"></div> 

            {{-- Icons and Profile Dropdown / Login-Register --}}
            <div class="d-flex align-items-center ms-auto">
                
                @auth
                {{-- AUTHENTICATED USER VIEW --}}

                {{-- Notifications Button --}}
                <button class="btn navbar-icon-btn me-3" type="button" aria-label="Notifications">
                    <i class="bi bi-bell-fill"></i>
                </button>

                {{-- Profile Dropdown --}}
                <div class="dropdown">
                    <button class="btn p-0 d-flex align-items-center" type="button" 
                            data-bs-toggle="dropdown" aria-expanded="false" aria-label="User profile menu">
                        <div class="profile-icon-wrapper">
                            {{-- Optionally show first letter of name if available --}}
                            <span class="fw-bold">{{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}</span>
                        </div>
                    </button>
                    
                    <ul class="dropdown-menu dropdown-menu-end border-0 stat-card">
                        <li>
                            <h6 class="dropdown-header text-dark-brown">
                                {{-- Display dynamic user info --}}
                                <span class="fw-bold">{{ Auth::user()->name ?? 'Authenticated User' }}</span><br>
                                <small class="text-muted">{{ Auth::user()->email ?? 'N/A' }}</small>
                            </h6>
                        </li>
                        {{-- UPDATED: Link to trigger Profile Edit Modal --}}
                        <li>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#profileEditModal">
                                <i class="bi bi-person-circle me-2"></i> Edit Profile
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            {{-- Logout trigger opens the modal (must be defined in layouts/modals) --}}
                            <a class="dropdown-item text-danger" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                <i class="bi bi-box-arrow-right me-2"></i> Log Out
                            </a>
                        </li>
                    </ul>
                </div>
                @endauth

                @guest
                {{-- GUEST USER VIEW --}}
                
                <a href="{{ route('login') }}" class="btn btn-outline-maroon me-2">
                    <i class="bi bi-box-arrow-in-right me-1"></i> Log In
                </a>
                <a href="{{ route('register') }}" class="btn btn-maroon">
                    <i class="bi bi-person-plus me-1"></i> Register
                </a>
                @endguest
            </div>
        </div>
    </nav>
</header>
