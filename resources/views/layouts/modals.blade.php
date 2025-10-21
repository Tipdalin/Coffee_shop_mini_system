<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content stat-card">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title dashboard-title text-maroon" id="logoutModalLabel">Confirm Logout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-2">
                <p class="text-dark-brown">Are you sure you want to log out of the Perk Up Coffee Admin Dashboard?</p>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-outline-secondary rounded-pill fw-bold" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-maroon rounded-pill fw-bold" onclick="window.location.href='/logout'">
                    <i class="bi bi-box-arrow-right me-2"></i> Log Out
                </button>
            </div>
        </div>
    </div>
</div>