<nav class="navbar navbar-expand-lg py-3 header-bar">
    <div class="container-fluid px-5">
        <a class="navbar-brand brand-text" href="#">Perk Up Coffee</a>
        
        <div class="d-flex align-items-center">
            <form class="d-flex mx-4 search-form">
                <input class="form-control me-2 search-input" type="search" placeholder="" aria-label="Search">
                <button class="btn search-btn" type="submit">
                    <i class="bi bi-search"></i> 
                    {{-- Use Bootstrap Icons (bi-search) --}}
                </button>
            </form>
            
            <ul class="navbar-nav icon-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="bi bi-person-fill"></i><span class="d-none d-lg-inline ms-1">Account</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="bi bi-clock-history"></i><span class="d-none d-lg-inline ms-1">Orders</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="bi bi-heart-fill"></i><span class="d-none d-lg-inline ms-1">Favorite</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link cart-link" href="#"><i class="bi bi-bag-fill"></i><span class="d-none d-lg-inline ms-1">Cart</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>