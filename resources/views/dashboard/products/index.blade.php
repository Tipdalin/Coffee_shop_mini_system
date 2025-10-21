@extends('layouts.app') 
@section('content')
<body>

    <div class="dashboard-wrapper"> 
        <div class="main-content">
            @extends('layouts.navbar')
            <div class="container-fluid p-5">
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
                    <h1 class="fw-bold m-0 dashboard-title text-dark-brown">Product List</h1>
                    <button type="button" id='add-product-btn' class="btn btn-maroon" data-bs-toggle="modal" data-bs-target="#productModal">
                        <i class="bi bi-plus-lg me-1"></i> Add Product
                    </button>
                </div>
                
                <div class="card stat-card p-4 bg-white">
                    <div class="table-responsive">
                        <table class="table table-borderless table-hover align-middle">
                            <thead>
                                <tr class="table-dark">
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Loop through Products data passed from controller --}}
                                @forelse ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>
                                        @if ($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="50" height="50" class="rounded object-fit-cover">
                                        @else
                                            <img src="{{ asset('assets/pl.jpg') }}" alt="No Image" width="50" height="50" class="rounded object-fit-cover">
                                        @endif
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category->name ?? 'N/A' }}</td>
                                    <td>${{ number_format($product->price, 2) }}</td>
                                    <td><span class="badge {{ $product->stock > 10 ? 'bg-success' : ($product->stock > 0 ? 'bg-warning text-dark' : 'bg-danger') }}">{{ $product->stock }}</span></td>
                                    <td>
                                        <button 
                                            type="button" 
                                            class="btn btn-sm btn-outline-maroon edit-btn" {{-- Updated class --}}
                                            data-bs-toggle="modal" 
                                            data-bs-target="#productModal"
                                            data-id="{{ $product->id }}"
                                            data-name="{{ $product->name }}"
                                            data-description="{{ $product->description }}"
                                            data-price="{{ $product->price }}"
                                            data-stock="{{ $product->stock }}"
                                            data-category-id="{{ $product->category_id }}"
                                            data-image="{{ $product->image ? asset('storage/' . $product->image) : asset('assets/pl.jpg') }}"
                                        >
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        {{-- Delete Form (using the destroy route) --}}
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline delete-form">
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
                                    <td colspan="7" class="text-center py-4">No products found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    {{ $products->links() }}
                </div>
            </div>
            
        </div>
    </div>
{{-- add new product modal --}}
    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content stat-card"> 
                <div class="modal-header">
                    <h5 class="modal-title fw-bold text-dark-brown" id="productModalLabel">Add New Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('products.store') }}" id="product-form" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" id="form-method" value="POST">
                        <input type="hidden" name="id" id="product-id">

                        <div class="mb-3 text-center">
                            <label for="image" class="form-label d-block fw-bold">Product Image</label>
                            <img id="product-img-preview" class="rounded object-fit-cover product-image" src="https://i.pinimg.com/1200x/6a/f1/ec/6af1ec6645410a41d5339508a83b86f9.jpg" width="120px" height="120px" alt="Placeholder Image" style="cursor: pointer;">
                            <input type="file" id="image-upload" class="form-control d-none" name="image" accept="image/*">
                        </div>
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Product Name">
                        </div>

                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select class="form-select" id="category_id" name="category_id" required>
                                <option value="" disabled selected>Select Category</option>
                                <option value=""selected>Drink</option>

                                {{-- @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach --}}
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter product description"></textarea>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="price" class="form-label">Price ($)</label>
                                <input type="text" class="form-control" id="price" name="price" placeholder="Enter Price">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="stock" class="form-label">Stock</label> 
                                <input type="number" class="form-control" id="stock" name="stock" placeholder="Enter stock quantity" min="0"> 
                            </div>
                        </div>
                        
                        <div class="modal-footer px-0 pb-0">
                            <button type="button" class="btn btn-outline-secondary rounded-pill" data-bs-dismiss="modal">Cancel</button>
                            {{-- Updated button classes --}}
                            <button type="submit" id="update-btn" class="btn btn-warning rounded-pill d-none">Update Product</button>
                            <button type="submit" id="save-btn" class="btn btn-maroon rounded-pill">Save Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
{{-- add new product modal --}}
@endsection





<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>