@extends('layouts.app') 
@section('content')
{{-- Corrected structure: Assuming 'layouts.navbar' is meant to be included here, or handled by layouts.app --}}
@include('layouts.navbar') 

<div class="dashboard-wrapper"> 
    <div class="main-content">
        <div class="container-fluid p-5">
            {{-- Success and Error Alerts --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                {{-- Updated title --}}
                <h1 class="fw-bold m-0 dashboard-title text-dark-brown">Category List</h1>
                {{-- Updated button text and ID --}}
                <button type="button" id='add-category-btn' class="btn btn-maroon" data-bs-toggle="modal" data-bs-target="#categoryModal">
                    <i class="bi bi-plus-lg me-1"></i> Add Category
                </button>
            </div>
            
            <div class="card stat-card p-4 bg-white">
                <div class="table-responsive">
                    <table class="table table-borderless table-hover align-middle">
                        <thead>
                            <tr class="table-dark">
                                <th>ID</th>
                                {{-- Updated headers for Category data --}}
                                <th>Category Name</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Updated loop variable from $products to $categories --}}
                            @forelse ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                {{-- Displaying category description --}}
                                <td>{{ $category->description }}</td>
                                <td>
                                    {{-- Edit Button (using category data attributes) --}}
                                    <button 
                                        type="button" 
                                        class="btn btn-sm btn-outline-maroon edit-btn"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#categoryModal"
                                        data-id="{{ $category->id }}"
                                        data-name="{{ $category->name }}"
                                        data-description="{{ $category->description }}"
                                    >
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    {{-- Delete Form (using categories.destroy route) --}}
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger delete-btn">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                {{-- Updated colspan for fewer columns --}}
                                <td colspan="4" class="text-center py-4">No categories found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-4">
                {{-- Updated pagination variable --}}
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>

{{-- Add/Edit Category Modal --}}
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content stat-card"> 
            <div class="modal-header">
                {{-- Updated modal title --}}
                <h5 class="modal-title fw-bold text-dark-brown" id="categoryModalLabel">Add New Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- Updated form action route to categories.store --}}
                <form action="{{ route('categories.store') }}" id="category-form" method="post">
                    @csrf
                    <input type="hidden" name="_method" id="form-method" value="POST">
                    <input type="hidden" name="id" id="category-id">

                    {{-- Removed Product Image field --}}
                    {{-- Removed Product Image preview --}}

                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Category Name">
                    </div>

                    {{-- Removed Category Select field (since this form is for managing categories) --}}

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter category description"></textarea>
                    </div>
                    
                    {{-- Removed Price and Stock fields --}}
                    
                    <div class="modal-footer px-0 pb-0">
                        <button type="button" class="btn btn-outline-secondary rounded-pill" data-bs-dismiss="modal">Cancel</button>
                        {{-- Updated button IDs/Text --}}
                        <button type="submit" id="update-btn" class="btn btn-warning rounded-pill d-none">Update Category</button>
                        <button type="submit" id="save-btn" class="btn btn-maroon rounded-pill">Save Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('categoryModal');
        const modalTitle = document.getElementById('categoryModalLabel');
        const form = document.getElementById('category-form');
        const formMethod = document.getElementById('form-method');
        const categoryIdInput = document.getElementById('category-id');
        const saveBtn = document.getElementById('save-btn');
        const updateBtn = document.getElementById('update-btn');
        const addCategoryBtn = document.getElementById('add-category-btn');

        const defaultPlaceholderImage = 'https://i.pinimg.com/1200x/6a/f1/ec/6af1ec6645410a41d5339508a83b86f9.jpg';
        
        // Function to reset the form for "Add New Category"
        function resetForm() {
            modalTitle.textContent = 'Add New Category';
            form.action = "{{ route('categories.store') }}";
            formMethod.value = 'POST';
            form.reset();
            categoryIdInput.value = '';
            
            // Show Save button, hide Update button
            saveBtn.classList.remove('d-none');
            updateBtn.classList.add('d-none');
            
            // Clear validation error classes if necessary (depends on your CSS/JS setup)
            form.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
        }

        // 1. Handle "Add Category" button click
        addCategoryBtn.addEventListener('click', resetForm);

        // 2. Handle "Edit" button click
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const name = this.getAttribute('data-name');
                const description = this.getAttribute('data-description');

                modalTitle.textContent = `Edit Category: ${name}`;
                form.action = `{{ url('dashboard/categories') }}/${id}`; // Manual update URL
                formMethod.value = 'PUT'; // Set method override to PUT

                // Populate fields
                categoryIdInput.value = id;
                document.querySelector('#categoryModal #name').value = name;
                document.querySelector('#categoryModal #description').value = description;

                // Show Update button, hide Save button
                saveBtn.classList.add('d-none');
                updateBtn.classList.remove('d-none');
            });
        });

        // 3. Optional: Delete confirmation (using custom UI instead of alert/confirm)
        // You would typically use a dedicated modal for confirmation.
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function(e) {
                // Prevent default submission to show a custom confirmation dialog
                // Since custom UI is not provided, we rely on the backend/browser behavior for now.
                // In a real app, you'd show a modal here and only submit the form if confirmed.
            });
        });

        // Event listener for when the modal is hidden, reset the form if it was in 'add' mode
        modal.addEventListener('hidden.bs.modal', resetForm);
    });
</script>
