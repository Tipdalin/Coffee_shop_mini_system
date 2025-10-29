<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perk Up Coffee Sign Up</title>
    
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

        /* Custom Maroon Button Style */
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

        /* Custom Input Focus Style */
        .form-control:focus {
            border-color: var(--color-maroon);
            box-shadow: 0 0 0 0.25rem rgba(107, 22, 11, 0.25); /* Maroon ring focus */
        }
        
        /* Custom Checkbox Focus Style */
        .form-check-input:checked {
            background-color: var(--color-maroon);
            border-color: var(--color-maroon);
        }
        .form-check-input:focus {
            box-shadow: 0 0 0 0.25rem rgba(107, 22, 11, 0.25); /* Maroon ring focus */
        }

        .text-maroon {
            color: var(--color-maroon) !important;
        }
        .text-dark-brown {
            color: var(--color-dark-brown) !important;
        }
    </style>
</head>

<body class="min-vh-100 d-flex align-items-center justify-content-center py-5">
    
    <div class="container-fluid">
        <div class="row g-0 rounded-4 overflow-hidden shadow-lg" style="max-width: 900px; margin: auto;">
            
            <div class="col-md-6 d-none d-md-block">
                <div class="w-100 h-100 bg-cover bg-center" style="
                    background-image: url('https://i.pinimg.com/736x/13/80/fb/1380fb6548841d7296451c96b8461263.jpg'); 
                    min-height: 500px;
                    background-size: cover;
                    background-position: center;">
                </div>
            </div>
            
            <div class="col-md-6 p-5" style="background-color: var(--color-cream);">
                
                <div class="text-center mb-4">
                    <h2 class="font-logo text-maroon" style="font-size: 2.5rem; letter-spacing: 1px;">
                        Sign Up
                    </h2>
                    <p class="text-dark-brown">Join us and perk up your day!</p>
                </div>

                <form class="space-y-4" action="{{url('/auth/addUser')}}" method="POST">
                    @csrf 

                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold text-dark-brown">Full Name</label>
                        <input type="text" id="name" name="name" required
                            class="form-control rounded-pill px-4 py-2" placeholder="John Doe">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold text-dark-brown">Email Address</label>
                        <input type="email" id="email" name="email" required
                            class="form-control rounded-pill px-4 py-2" placeholder="you@perkup.coffee">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold text-dark-brown">Password</label>
                        <input type="password" id="password" name="password" required
                            class="form-control rounded-pill px-4 py-2" placeholder="Create a strong password">
                    </div>

                    <div class="mb-4">
                        <label for="confirm-password" class="form-label fw-semibold text-dark-brown">Confirm Password</label>
                        <input type="password" id="confirm-password" name="confirm-password" required
                            class="form-control rounded-pill px-4 py-2" placeholder="Confirm your password">
                    </div>

                    <div class="mb-4 form-check">
                        <input type="checkbox" id="terms" name="terms" required
                            class="form-check-input mt-1" style="border-radius: 0.25rem;">
                        <label for="terms" class="form-check-label text-sm text-dark-brown">
                            I agree to the <a href="#" class="fw-bold text-maroon text-decoration-none hover:text-dark-brown">Terms of Service</a> and <a href="#" class="fw-bold text-maroon text-decoration-none hover:text-dark-brown">Privacy Policy</a>
                        </label>
                    </div>

                    <button type="submit"
                        class="btn btn-maroon w-100 rounded-pill py-3 fw-bold shadow-sm mb-4"
                        style="font-size: 1.15rem;">
                        Create Account
                    </button>
                </form>

                <div class="mt-4">
                    <div class="position-relative mb-4">
                        <div class="position-absolute top-50 start-0 w-100 border-top border-slate-300"></div>
                        <div class="position-relative text-center">
                            <span class="px-4 bg-cream text-sm text-dark-brown">Or sign up with</span>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-3" style="display: grid;">
                        <button class="d-flex align-items-center justify-content-center gap-2 px-4 py-2 border border-slate-300 rounded-pill hover:bg-white transition-colors">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" style="width: 1.25rem; height: 1.25rem;">
                                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                                <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" />
                                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" />
                            </svg>
                            <span class="text-sm fw-semibold text-dark-brown">Google</span>
                        </button>
                        <button class="d-flex align-items-center justify-content-center gap-2 px-4 py-2 border border-slate-300 rounded-pill hover:bg-white transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" style="width: 1.25rem; height: 1.25rem;">
                                <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                            </svg>
                            <span class="text-sm fw-semibold text-dark-brown">GitHub</span>
                        </button>
                    </div>
                </div>

                <p class="mt-4 text-center text-sm text-dark-brown">
                    Already have an account?
                    <a href="{{url('/auth/showLogin')}}" class="fw-bold text-maroon text-decoration-none hover:text-dark-brown">
                        Sign in
                    </a>
                </p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>