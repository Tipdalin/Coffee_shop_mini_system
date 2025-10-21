const placeholderImage = "{{ asset('assets/pl.jpg') }}";

    $(document).ready(function () {
        // ---------------------------------------------------
        // Image Preview Logic
        // ---------------------------------------------------
        $('#product-img-preview').on('click', function () {
            $('#image-upload').click();
        });

        $('#image-upload').on('change', function () {
            const file = this.files[0];
            if (file) {
                const img = URL.createObjectURL(file);
                $('#product-img-preview').attr('src', img);
            }
        });

        $('#add-product-btn').on('click', function(){
            $('#productModalLabel').text('Add New Product');
            $('#product-form')[0].reset();
            $('#product-form').attr('action', "{{ route('products.store') }}");
            $('#form-method').val('POST');
            $('#update-btn').addClass('d-none');
            $('#save-btn').removeClass('d-none');
            $('#product-img-preview').attr('src', placeholderImage);
            $('.form-control').removeClass('is-invalid');
            $('.text-danger').remove();
        });

        $(document).on('click', '.edit-btn', function(){
            const id = $(this).data('id');
            const name = $(this).data('name');
            const description = $(this).data('description');
            const price = $(this).data('price');
            const stock = $(this).data('stock');
            const categoryId = $(this).data('category-id');
            const image = $(this).data('image');

            $('#productModalLabel').text('Edit Product: ' + name);
            
            // Set form action and method for UPDATE
            const updateUrl = '{{ route("products.update", ":id") }}'.replace(':id', id);
            $('#product-form').attr('action', updateUrl);
            $('#form-method').val('PUT'); 
            
            // Show/Hide buttons (Updated button classes)
            $('#update-btn').removeClass('d-none');
            $('#save-btn').addClass('d-none');

            // Populate fields
            $('#product-id').val(id);
            $('#name').val(name);
            $('#description').val(description);
            $('#price').val(price);
            $('#stock').val(stock);
            $('#category_id').val(categoryId);
            
            // Set image preview
            $('#product-img-preview').attr('src', image);
            
            // Clear previous image input field 
            $('#image-upload').val(''); 
        });

        
        $(document).on('click', '.delete-btn', function(e) {
            if (!confirm('Are you sure you want to delete this product? This action cannot be undone.')) {
                e.preventDefault();
            }
        });
    });
