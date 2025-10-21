<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Perk Up Coffee - Wake Up and Slay</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<style>
    /* Custom Color and Font Styles for Perk Up Coffee Vibe */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@700;800;900&family=Inter:wght@300;400;500;600;700&display=swap');
    
    :root {
        --color-maroon: #6b160b; /* Deep Red/Maroon - from template */
        --color-cream: #fbf5e4;  /* Light Cream/Yellowish - from template */
        --color-dark-brown: #2e1c1c; /* Dark Text/Accent */
    }

    /* Override Tailwind/Base styles with custom properties */
    * {
        font-family: 'Inter', sans-serif;
    }
    .logo{
        font-family: 'Poppins', sans-serif;
        font-weight: 900;
        color: var(--color-cream);
    }
    .font-logo {
        font-family: 'Poppins', sans-serif;
        font-weight: 900;
        color: var(--color-dark-brown);
    }
    .bg-cream {
        background-color: var(--color-cream);
    }
    .text-maroon {
        color: var(--color-maroon);
    }
    .bg-maroon {
        background-color: var(--color-maroon);
    }
    .smooth-scroll {
        scroll-behavior: smooth;
    }
    
    /* Product Card Hover Effect */
    .hover-lift {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .hover-lift:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    .aspect-product {
        /* Standardizing product image size to match template cards */
        aspect-ratio: 1 / 1.5; 
    }
    #about{
        background-color: var(--color-maroon);
    }

</style>
</head>
<body class="antialiased bg-cream text-slate-900 smooth-scroll">

<nav class="sticky top-0 left-0 right-0 z-50 bg-cream shadow-md">
    <div class="max-w-7xl mx-auto px-4 py-3">
        <div class="flex items-center justify-between">
            
            <span class="text-xl font-logo uppercase">Perk Up Coffee</span>
            
            <div class="hidden md:flex items-center gap-6">
                <a href="#home" class="text-sm text-dark-brown hover:text-maroon transition-colors fw-semibold">Home</a>
                <a href="#shop" class="text-sm text-dark-brown hover:text-maroon transition-colors fw-semibold">Menu</a>
                <a href="#about" class="text-sm text-dark-brown hover:text-maroon transition-colors fw-semibold">About Us</a>
            </div>
            
            <div class="flex items-center gap-2">
                <a href="{{url('/auth/showLogin')}}" class="btn btn-sm text-white px-3 py-1 rounded-pill" style="background-color: var(--color-maroon);">
                    Login
                </a>
                <a href="{{url('/auth/register')}}" class="btn btn-sm btn-outline-dark px-3 py-1 rounded-pill">
                    Sign Up
                </a>
            </div>
        </div>
    </div>
</nav>

<section id="home" class="relative overflow-hidden py-5" style="background-color: var(--color-cream);">
    <div class="max-w-7xl mx-auto px-6">
        <div class="row align-items-center">
            <div class="col-12">
                <div>
                    <img src="https://i.pinimg.com/1200x/19/cd/91/19cd9171fa108d27a068b0123d9823b1.jpg" alt="Coffee Cup" class="w-full h-auto rounded-lg shadow-lg">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-16 px-6 bg-cream text-center">
    <h1 class="text-5xl md:text-6xl font-logo text-dark-brown mb-8">
        Wake up and slay with coffee.
    </h1>
    <div class="max-w-5xl mx-auto grid grid-cols-1 sm:grid-cols-2 gap-8">
        <div class="rounded-lg overflow-hidden shadow-md">
            <img src="https://i.pinimg.com/736x/7e/01/af/7e01afc8389e08e17f6fdaad16bf327f.jpg" alt="Coffee and Donut" class="w-full h-full object-cover">
        </div>
        <div class="rounded-lg overflow-hidden shadow-md">
            <img src="https://i.pinimg.com/1200x/31/c7/c2/31c7c28c61f4e20d338382bee84fec72.jpg" alt="Iced Coffee on Car" class="w-full h-full object-cover">
        </div>
    </div>
</section>

<section id="shop" class="py-16 px-6 bg-maroon text-white">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-4xl font-logo text-center text-light mb-12">Signature Drinks</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            @php
                $drinks = [
                    ['name' => 'Cacao Milk', 'tag' => 'Iced Americano', 'image' => 'https://i.pinimg.com/1200x/26/d2/f0/26d2f0c88bb62773109bd71212f005ed.jpg'],
                    ['name' => 'Iced Latte', 'tag' => 'Iced Latte', 'image' => 'https://i.pinimg.com/1200x/3e/48/b0/3e48b04c7939168367f3955d32d6c074.jpg'],
                    ['name' => 'Matcha Oat Milk', 'tag' => 'Matcha Oat Milk', 'image' => 'https://i.pinimg.com/1200x/9f/f6/8a/9ff68a04d6a45ca210b6473f0abbc23d.jpg'],
                ];
            @endphp

            @foreach ($drinks as $drink)
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover-lift">
                    <div class="aspect-product flex items-center justify-center overflow-hidden">
                        <img src="{{ $drink['image'] }}" alt="{{ $drink['name'] }}" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4 text-center">
                        <span class="badge text-maroon fw-bold" style="background-color: var(--color-cream); margin-bottom: 0.5rem;">{{ $drink['tag'] }}</span>
                        <h3 class="text-xl font-semibold text-dark-brown">{{ $drink['name'] }}</h3>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="relative py-32 px-6" style="background-color: var(--color-cream);">
    <div class="absolute inset-0 bg-cover bg-center opacity-75" 
         style="background-image: url('https://i.pinimg.com/1200x/d5/5b/22/d55b2289633afac8ef8aed017da4ea5f.jpg');">
    </div>
    <div class="relative max-w-7xl mx-auto text-center z-10">
        <h2 class="text-6xl font-logo text-warning mb-4" style="text-shadow: 2px 2px var(--color-maroon);">
            TAKE A BREAK, COFFEE ANYONE?
        </h2>
        <p class="text-lg text-white font-medium" style="text-shadow: 1px 1px var(--color-maroon);">
            Drinking coffee affords a simple pleasure, making you more happy.
        </p>
        <a href="{{url('/auth/showLogin')}}" class="btn btn-lg fw-bold mt-4 px-5 py-2 rounded-pill shadow-lg text-maroon" style="background-color: white;">
            Order Now
        </a>
    </div>
</section>

<footer id="about" class="logo text-white py-16 px-6">
    <div class="logo max-w-7xl mx-auto">
        <div class="logo row">
            <div class=" col-md-4 mb-4 mb-md-0">
                <span class="logo text-3xl">Perk Up Coffee</span>
                <p class=" logo text-slate-400 text-sm mt-3">
                    Crafting smiles, one cup at a time. Your daily dose of energy and good vibes.
                </p>
            </div>
            
            <div class="logo col-md-3 mb-4 mb-md-0">
                <h4 class="logo font-semibold mb-4">About Us</h4>
                <ul class="logo list-unstyled space-y-2 text-sm text-slate-400">
                    <li><a href="#" class="hover:text-white transition-colors text-decoration-none">Our Story</a></li>
                    <li><a href="#" class="hover:text-white transition-colors text-decoration-none">Careers</a></li>
                    <li><a href="#" class="hover:text-white transition-colors text-decoration-none">Press</a></li>
                </ul>
            </div>
            
            <div class="col-md-3 mb-4 mb-md-0">
                <h4 class="font-semibold mb-4">Support</h4>
                <ul class="list-unstyled space-y-2 text-sm text-slate-400">
                    <li><a href="#" class="hover:text-white transition-colors text-decoration-none">FAQ</a></li>
                    <li><a href="#" class="hover:text-white transition-colors text-decoration-none">Shipping & Returns</a></li>
                    <li><a href="#" class="hover:text-white transition-colors text-decoration-none">Contact Us</a></li>
                </ul>
            </div>
            
            <div class="col-md-2">
                <h4 class="font-semibold mb-4">Follow</h4>
                <div class="d-flex gap-3 text-2xl text-slate-400">
                    <svg class="w-6 h-6 hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.205.012-3.584.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.212-6.187 2.053-6.402 6.402-.058 1.28-.072 1.688-.072 4.948 0 3.259.014 3.668.072 4.948.214 4.349 2.045 6.187 6.402 6.402 1.28.058 1.688.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.349-.214 6.187-2.045 6.402-6.402.058-1.28.072-1.688.072-4.948 0-3.259-.014-3.667-.072-4.947-.214-4.358-2.053-6.187-6.402-6.402-1.28-.058-1.688-.072-4.948-.072zM12 5.004c-3.899 0-7.056 3.157-7.056 7.056s3.157 7.056 7.056 7.056 7.056-3.157 7.056-7.056-3.157-7.056-7.056-7.056zm0 12.164c-2.822 0-5.108-2.286-5.108-5.108s2.286-5.108 5.108-5.108 5.108 2.286 5.108 5.108-2.286 5.108-5.108 5.108zm8.92-12.008c0.817 0 1.48.663 1.48 1.48s-0.663 1.48-1.48 1.48-1.48-0.663-1.48-1.48 0.663-1.48 1.48-1.48z"/></svg>
                    <svg class="w-6 h-6 hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24"><path d="M22.675 0h-21.35c-0.732 0-1.325 0.593-1.325 1.325v21.351c0 0.732 0.593 1.324 1.325 1.324h11.455v-9.294h-3.124v-3.619h3.124v-2.658c0-3.1 1.893-4.787 4.659-4.787 1.325 0 2.464 0.099 2.802 0.143v3.237h-1.926c-1.5 0-1.791 0.713-1.791 1.76v2.316h3.585l-0.468 3.619h-3.118v9.294h6.113c0.732 0 1.325-0.592 1.325-1.324v-21.351c0-0.732-0.593-1.325-1.325-1.325z"/></svg>
                    <svg class="w-6 h-6 hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.827.777 1.017-.609 1.793-1.574 2.163-2.723-.951.565-2.005.974-3.127 1.189-.895-.95-2.174-1.547-3.593-1.547-2.71 0-4.915 2.204-4.915 4.913 0 .386.042.76.126 1.121-4.085-.205-7.728-2.163-10.163-5.138-.423.727-.665 1.575-.665 2.486 0 1.708.87 3.213 2.193 4.098-.807-.026-1.565-.247-2.228-.616 0 .021 0 .041 0 .063 0 2.385 1.698 4.373 3.946 4.82-.413.111-.849.17-1.296.17-.318 0-.626-.031-.926-.089.626 1.956 2.444 3.376 4.582 3.416-1.68 1.32-3.807 2.106-6.12 2.106-.398 0-.79-.023-1.175-.069 2.179 1.397 4.768 2.213 7.553 2.213 9.057 0 14.01-7.502 14.01-14.01 0-.213-.005-.426-.014-.637.961-.69 1.795-1.548 2.457-2.529z"/></svg>
                </div>
            </div>
        </div>
        
        <div class="border-t border-slate-700 pt-8 mt-8 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-sm text-slate-400">© 2025 Perk Up Coffee. All rights reserved.</p>
            <div class="flex gap-6 text-sm text-slate-400">
                <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>