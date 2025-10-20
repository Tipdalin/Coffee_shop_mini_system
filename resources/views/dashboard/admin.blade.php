<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gen Z Admin Dashboard</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons (for bi-people, bi-currency-dollar) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Google Fonts: Inter (for clean body text) and Poppins (for bold headers) -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700;800;900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            /* Define the core theme colors */
            --color-maroon: #6b160b;      /* Primary accent color */
            --color-cream: #fbf5e4;       /* Background color */
            --color-dark-brown: #2e1c1c;  /* Main text color */
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--color-cream); /* Cream background for the page */
        }

        /* Custom utility classes for the defined colors */
        .text-maroon { color: var(--color-maroon) !important; }
        .bg-maroon-light { background-color: rgba(107, 22, 11, 0.1); }
        .text-dark-brown { color: var(--color-dark-brown) !important; }

        /* Custom Maroon Button Styles */
        .btn-outline-maroon {
            color: var(--color-maroon);
            border-color: var(--color-maroon);
        }
        .btn-outline-maroon:hover {
            background-color: var(--color-maroon);
            color: white;
            border-color: var(--color-maroon);
        }
        
        /* Dashboard Card Styling */
        .stat-card {
            border: none;
            /* Extra large border-radius for Gen Z look */
            border-radius: 1.5rem !important; 
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08); /* Soft, large shadow */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        /* Large, bold dashboard title */
        .dashboard-title {
            font-family: 'Poppins', sans-serif;
            font-weight: 800;
            color: var(--color-dark-brown);
            letter-spacing: -1px;
        }

        /* Override Bootstrap defaults for buttons/focus elements if needed */
        .btn-check:focus+.btn, .btn:focus {
            outline: 0;
            box-shadow: 0 0 0 0.25rem rgba(107, 22, 11, 0.25); /* Maroon focus ring */
        }
    </style>
</head>
<body>

<div class="container-fluid p-5">
    
    <!-- Header with Logout Button -->
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1 class="dashboard-title fs-2 mb-0">Dashboard Overview <span class="text-maroon">☕</span></h1>
        <!-- Logout Button: Styled with outline maroon, rounded-pill, and an icon -->
        <button class="btn btn-sm btn-outline-maroon fw-bold rounded-pill px-4 py-2" onclick="alert('Attempting to log out...')">
            <i class="bi bi-box-arrow-right me-1"></i> Logout
        </button>
    </div>

    <!-- Stats Row -->
    <div class="row g-4">
        
        <!-- Card 1: Total Users -->
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card stat-card p-4 bg-white">
                <div class="d-flex align-items-center">
                    <!-- Icon Circle: Highly rounded, light maroon background, maroon icon -->
                    <div class="me-4 p-3 rounded-circle bg-maroon-light flex-shrink-0">
                        <i class="bi bi-people text-maroon fs-3"></i>
                    </div>
                    <!-- Stats Text -->
                    <div>
                        <p class="text-muted mb-1 fw-bold text-uppercase small">
                            Total Users
                        </p>
                        <!-- Large, bold value -->
                        <h3 class="fw-bolder mb-0 text-dark-brown fs-2">
                            12,458
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 2: Revenue -->
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card stat-card p-4 bg-white">
                <div class="d-flex align-items-center">
                    <!-- Icon Circle: Use a different, complementary color, like light green/success -->
                    <div class="me-4 p-3 rounded-circle bg-success-subtle flex-shrink-0">
                        <i class="bi bi-currency-dollar text-success fs-3"></i>
                    </div>
                    <!-- Stats Text -->
                    <div>
                        <p class="text-muted mb-1 fw-bold text-uppercase small">
                            Revenue
                        </p>
                        <!-- Large, bold value -->
                        <h3 class="fw-bolder mb-0 text-dark-brown fs-2">
                            $84,290
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3: Monthly Orders (Added for fuller dashboard look) -->
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
        
        <!-- Card 4: New Signups Today (Added for fuller dashboard look) -->
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
    <!-- End Stats Row -->

    <!-- Placeholder Content Row (Charts/Tables) -->
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
                        Espresso Beans <span class="badge bg-maroon rounded-pill">320 units</span>
                    </li>
                    <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                        Seasonal Blend <span class="badge bg-maroon rounded-pill">288 units</span>
                    </li>
                    <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                        Cold Brew Kit <span class="badge bg-maroon rounded-pill">192 units</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Placeholder Content Row -->

</div>

<!-- Bootstrap JS Bundle (optional for this simple layout, but good practice) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
