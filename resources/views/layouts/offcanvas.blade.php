<div class="offcanvas offcanvas-start bg-wheat" tabindex="-1" id="offcanvasSidebar" aria-labelledby="offcanvasSidebarLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title dashboard-title text-maroon" id="offcanvasSidebarLabel">Perk Up Coffee</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body d-flex flex-column">
      <ul class="nav flex-column fw-bold flex-grow-1">
            <li class="nav-item mb-2">
                <a class="nav-link bg-maroon-light text-maroon rounded-pill p-3 active" href="/dashboard/admin">
                    <i class="bi bi-house-door-fill me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link text-dark-brown rounded-pill p-3" href="#">
                    <i class="bi bi-people me-2"></i> Customers
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link text-dark-brown rounded-pill p-3" href="/dashboard/categories">
                    <i class="bi bi-people me-2"></i> Category
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link text-dark-brown rounded-pill p-3" href="/dashboard/products">
                    <i class="bi bi-box-seam-fill me-2"></i> Products
                </a>
            </li>
            <li class="nav-item mb-2">
                <a class="nav-link text-dark-brown rounded-pill p-3" href="#">
                    <i class="bi bi-receipt-cutoff me-2"></i> Orders
                </a>
            </li>
      </ul>
      <div class="mt-auto pt-3">
            <button class="btn btn-maroon w-100 fw-bold rounded-pill text-white" 
                    data-bs-toggle="modal" 
                    data-bs-target="#logoutModal">
                <i class="bi bi-box-arrow-right me-2"></i> Log Out
            </button>
      </div>
  </div>
</div>