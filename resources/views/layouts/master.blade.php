<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-styles.css') }}">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h4 class="mb-0">AdminPanel</h4>
        </div>
        <nav class="sidebar-nav">
            <a href="/dashboard/admin" class="nav-link {{ request()->is('dashboard/admin') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i>
                <span>Dashboard</span>
            </a>
            <a href="/dashboard/user" class="nav-link {{ request()->is('dashboard/user') ? 'active' : '' }}">
                <i class="bi bi-people"></i>
                <span>Users</span>
            </a>
            <a href="/dashboard/product" class="nav-link {{ request()->is('dashboard/product') ? 'active' : '' }}">
                <i class="bi bi-box-seam"></i>
                <span>Products</span>
            </a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <nav class="top-nav">
            <div class="d-flex gap-2 align-items-center justify-content-between px-3 py-2  text-white">
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-list fs-4 d-lg-none"></i>
                    <input type="text" class="form-control rounded-3 form-control-sm" placeholder="Search...">
                </div>
                <div class="d-flex align-items-center gap-3">
                    <i class="bi bi-bell"></i>
                    <!-- Admin moved to fixed top-right button to avoid layout shift on hover -->
                </div>
            </div>
        </nav>

        <!-- Fixed Admin button at top-right -->
        <div class="admin-top-right">
            <div class="dropdown dropstart mt-3 me-2">
                <button class="btn btn-sm btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle"></i> Admin
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Logout</a></li>
                </ul>
            </div>
        </div>

        <!-- Dynamic Page Content -->
        <div class="content-area p-4">
            @yield('content')     
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>