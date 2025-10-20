<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perk Up Coffee Login</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700;800;900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --color-maroon: #6b160b; /* Deep Red/Maroon */
            --color-cream: #fbf5e4;  /* Light Cream/Yellowish */
            --color-dark-brown: #2e1c1c; /* Dark Text/Accent */
        }
        
        /* Apply Inter as the default text font */
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--color-cream); /* Use cream background for the page */
        }
        
        /* Custom logo/heading font for a striking look */
        .font-logo {
            font-family: 'Poppins', sans-serif;
            font-weight: 900;
        }

        /* Override Bootstrap button primary color for the maroon style */
        .btn-maroon {
            background-color: var(--color-maroon);
            border-color: var(--color-maroon);
            color: white;
            transition: background-color 0.2s;
        }
        .btn-maroon:hover {
            background-color: #55120a; /* Slightly darker maroon on hover */
            border-color: #55120a;
            color: white;
        }
        .form-control:focus {
            border-color: var(--color-maroon);
            box-shadow: 0 0 0 0.25rem rgba(107, 22, 11, 0.25); /* Maroon ring focus */
        }
        .text-maroon {
            color: var(--color-maroon) !important;
        }
    </style>
</head>

<body class="min-vh-100 d-flex align-items-center justify-content-center py-5">
    
    <div class="container-fluid">
        <div class="row g-0 rounded-4 overflow-hidden shadow-lg" style="max-width: 900px; margin: auto;">
            
            <div class="col-md-6 d-none d-md-block">
                <div class="w-100 h-100 bg-cover bg-center" style="
                    background-image: url('https://i.pinimg.com/736x/f5/af/34/f5af34c3fa20f72d59c3b398d723119a.jpg'); 
                    min-height: 500px;
                    background-size: cover;
                    background-position: center;">
                </div>
            </div>
            
            <div class="col-md-6 p-5" style="background-color: var(--color-cream);">
                
                <div class="text-center mb-5">
                    <h2 class="font-logo text-maroon" style="font-size: 2.5rem; letter-spacing: 1px;">
                        Login
                    </h2>
                </div>

                <form class="space-y-4" action="{{url('/auth/login')}}" method="POST">
                    @csrf 

                    <div class="mb-4">
                        <label for="email" class="form-label fw-semibold text-dark-brown">
                            Email
                        </label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            required
                            class="form-control rounded-pill px-4 py-2"
                            placeholder="you@perkup.coffee"
                        >
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label fw-semibold text-dark-brown">
                            Password
                        </label>
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            required
                            class="form-control rounded-pill px-4 py-2"
                            placeholder="Enter your password"
                        >
                    </div>

                    <div class="d-flex justify-content-end mb-4">
                        <a href="#" class="text-sm fw-semibold text-maroon text-decoration-none hover:text-dark-brown">
                            Forgot password?
                        </a>
                    </div>
                    
                    <button 
                        type="submit"
                        class="btn btn-maroon w-100 rounded-pill py-3 fw-bold shadow-sm"
                        style="font-size: 1.15rem;"
                    >
                        Login
                    </button>
                </form>

                <p class="mt-4 text-center text-sm text-dark-brown">
                    Don't have an account? 
                    <a href="{{url('/auth/register')}}" class="fw-bold text-maroon text-decoration-none hover:text-dark-brown">
                        Sign up for free
                    </a>
                </p>
                
                </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>