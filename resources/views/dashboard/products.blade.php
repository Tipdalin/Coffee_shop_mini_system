@extends('layouts.master')
@section('title', 'Admin Dashboard - Products')
@section('content')
<div class="mb-4">
    <h2 class="mb-1">Dashboard Overview</h2>
</div>
<div class="row g-4">
    <div class="col-lg-12">
        <div class="data-card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Recent Orders</h5>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="bi bi-plus-circle me-1"></i> Add Product
                </button>
            </div>
            <div class="table-responsive">
                <table class="table table-dark table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Sub Title</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($getData as $product)
                        <tr>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->sub_title }}</td>
                            <td>${{ number_format($product->price, 2) }}</td>
                            <td>{{ $product->description }}</td>
                            <td>
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" style="width: 50px; height: auto;">
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-sm btn-warning me-1">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </button>
                                <button class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4">
                <form id="productForm" method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header border-0 bg-dark text-white rounded-top-4 px-4 py-3">
                        <h5 class="modal-title fw-bold" id="exampleModalLabel">
                            <i class="bi bi-box-seam me-2"></i> Add Product
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body px-4 py-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label text-dark fw-semibold">Product Name</label>
                                <input type="text" class="form-control form-control-lg rounded-3" id="name" name="name" placeholder="Enter product name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="sub-title" class="form-label  text-dark fw-semibold">Subtitle</label>
                                <input type="text" class="form-control form-control-lg rounded-3" id="sub-title" name="sub-title" placeholder="Subtitle">
                            </div>
                            <div class="col-md-4">
                                <label for="price" class="form-label text-dark fw-semibold">Price</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" step="0.01" class="form-control form-control-lg rounded-end-3" id="price" name="price" placeholder="0.00" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="description" class="form-label text-dark  fw-semibold">Description</label>
                                <textarea class="form-control form-control-lg rounded-3" id="description" name="description" rows="4" placeholder="Short description"></textarea>
                            </div>
                            <div class="mb-3 text-center">
                                <label for="image" class="form-label text-dark d-block fw-bold">Product Image</label>
                                <input class="form-control form-control-lg rounded-3" type="file" id="image" name="image" accept="image/*">
                                <div class="form-text">Choose an image file to upload as the product image.</div>
                                
                            </div>
                            
                        </div>
                    </div>

                    <div class="modal-footer border-0 px-4 pb-4">
                        <button type="button" class="btn btn-light border rounded-3 px-4" data-bs-dismiss="modal">
                            <i class="bi bi-x-circle me-1"></i> Close
                        </button>
                        <button type="submit" id="saveProductBtn" class="btn btn-dark rounded-3 px-4">
                            <i class="bi bi-save2 me-1"></i> Save changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <style>
        /* If other layout elements create stacking contexts, the modal can appear underneath.
           Force higher z-index as a safe fallback. */
        .modal {
            z-index: 2000 !important;
        }

        .modal-backdrop {
            z-index: 1900 !important;
        }
    </style>

    <script>
        (function() {
            // Ensure DOM is ready
            document.addEventListener('DOMContentLoaded', function() {
                var saveBtn = document.getElementById('saveProductBtn');
                var form = document.getElementById('productForm');
                var modalEl = document.getElementById('exampleModal');

                // If the modal is inside a transformed or z-indexed parent it may render under the backdrop.
                // Move the modal element to document.body so Bootstrap's backdrop and stacking work correctly.
                try {
                    if (modalEl && modalEl.parentNode && modalEl.parentNode !== document.body) {
                        document.body.appendChild(modalEl);
                    }
                } catch (err) {
                    // ignore move errors and rely on z-index fallback above
                    console.warn('Could not move modal to body:', err);
                }

                if (!saveBtn || !form || !modalEl) return;

                // helper: get bootstrap modal instance or create one (Bootstrap 5.2+ provides getOrCreateInstance)
                function getModalInstance() {
                    if (window.bootstrap && bootstrap.Modal) {
                        if (typeof bootstrap.Modal.getOrCreateInstance === 'function') {
                            return bootstrap.Modal.getOrCreateInstance(modalEl);
                        }
                        return bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
                    }
                    return null;
                }

                saveBtn.addEventListener('click', function(e) {
                    // disable button to prevent double submit
                    saveBtn.disabled = true;

                    // basic client-side validation example
                    if (!form.checkValidity()) {
                        form.reportValidity();
                        saveBtn.disabled = false;
                        return;
                    }

                    // If action is '#', just close modal (no server submit)
                    var action = form.getAttribute('action') || '#';
                    if (action === '#' || action.trim() === '') {
                        var inst = getModalInstance();
                        if (inst) {
                            try {
                                inst.hide();
                            } catch (err) {
                                // fallback: remove show class and backdrop if hide fails
                                modalEl.classList.remove('show');
                                modalEl.style.display = 'none';
                                var backdrops = document.querySelectorAll('.modal-backdrop');
                                backdrops.forEach(function(b) {
                                    b.parentNode && b.parentNode.removeChild(b);
                                });
                            }
                        } else {
                            // fallback manual hide
                            modalEl.classList.remove('show');
                            modalEl.style.display = 'none';
                            var backdrops = document.querySelectorAll('.modal-backdrop');
                            backdrops.forEach(function(b) {
                                b.parentNode && b.parentNode.removeChild(b);
                            });
                        }
                        saveBtn.disabled = false;
                        return;
                    }

                    // Submit via fetch so we can programmatically hide modal on success
                    var formData = new FormData(form);

                    fetch(action, {
                        method: form.getAttribute('method') || 'POST',
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: formData,
                        credentials: 'same-origin'
                    }).then(function(res) {
                        if (res.ok) return res.json().catch(function() {
                            return {
                                ok: true
                            };
                        });
                        throw new Error('Network response was not ok');
                    }).then(function(data) {
                        // You can show success message here or update the table via DOM
                        var inst = getModalInstance();
                        if (inst) inst.hide();
                        // optionally reload to show new product
                        // location.reload();
                    }).catch(function(err) {
                        console.error(err);
                        alert('Unable to save product. Please try again.');
                    }).finally(function() {
                        saveBtn.disabled = false;
                    });
                });
            });
        })();
    </script>

</div>
@endsection