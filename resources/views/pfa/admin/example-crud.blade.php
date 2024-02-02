@extends('layouts.master')

@section('content')
    <!-- Content -->
    {{-- <div class="container-xxl flex-grow-1 container-p-y"> --}}
    <div class="flex-grow-1 container-p-y container-fluid">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">Products</span>
        </h4>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <h6 class="alert-heading d-flex align-items-center mb-1">Well done :)</h6>
                <p class="mb-0">{{ session('success') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-error alert-dismissible" role="alert">
                <h6 class="alert-heading d-flex align-items-center mb-1">Error!</h6>
                <p class="mb-0">{{ session('error') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-header flex-column flex-md-row">
                <div class="row">
                    <div class="head-label col-md-6 text-start">
                        <h5 class="card-title mb-0 pt-2">Data Product</h5>
                        <a data-fslightbox href="{{asset('POS/photo/1700638232.png')}}">
                            <img src="{{asset('POS/photo/1700638232.png')}}" class="avatar" alt="Image">
                        </a>
                    </div>
                    <div class="col-md-6 text-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCreate">
                            <span><i class="bx bx-plus me-sm-1"></i> <span class="d-none d-sm-inline-block">Add New</span></span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="card-datatable table-responsive">
                    <table id="example" class="table border-top" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Stock</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Image with FsLightBox</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>

        {{-- Modal Create --}}
        <div class="modal fade animate__bounceIn" id="modalCreate" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ url('/products/store') }}" id="create_data" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                        <div class="modal-body">
                            <div class="col-sm-12">
                                <label class="form-label">Category</label>
                                {{-- <input type="text" id="id_pegawai" name="id_pegawai" class="form-control" placeholder="Pegawai" required/> --}}
                                <select id="category_id" name="category_id" class="select2 form-select form-select-lg" data-allow-clear="true" required>
                                    <option value=""></option>
                                    @foreach ($data['categories'] as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter Categories. </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Name</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="Name" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter Name. </div>
                            </div>
                            <div class="col-sm-12 mt-1 mb-1">
                                <label class="form-label">Description</label>
                                <input type="text" id="description" name="description" class="form-control" placeholder="Description" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter the Description. </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Stock</label>
                                <input type="number" id="stock" name="stock" class="form-control" placeholder="Stock" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter the Stock. </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Price</label>
                                <input type="number" id="price" name="price" class="form-control" placeholder="Price" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter the Price. </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Image</label>
                                <input type="file" id="image" name="image" class="form-control" placeholder="Image" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter the Image. </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                            <!-- button for add data -->
                            <button type="button" class="btn btn-primary" id="btn_add">Save</button>
                            <!-- button submit for validation when input type is empty -->
                            <button type="submit" class="btn btn-primary d-none" id="btn_add_2">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- End Modal Create --}}

        {{-- Modal Edit --}}
        <div class="modal fade animate__bounceIn" id="modalEdit" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="title_edit"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" id="edit_data" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                        <div class="modal-body">
                            <div class="col-sm-12">
                                <label class="form-label">Category</label>
                                <input type="hidden" id="id_edit" name="id_edit" class="form-control" />
                                <select id="category_id_edit" name="category_id_edit" class="select2 form-select form-select-lg" data-allow-clear="true" required>
                                    <option value=""></option>
                                    @foreach ($data['categories'] as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter Categories. </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Name</label>
                                <input type="text" id="name_edit" name="name_edit" class="form-control" placeholder="Name" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter Name. </div>
                            </div>
                            <div class="col-sm-12 mt-1 mb-1">
                                <label class="form-label">Description</label>
                                <input type="text" id="description_edit" name="description_edit" class="form-control" placeholder="Description" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter the Description. </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Stock</label>
                                <input type="number" id="stock_edit" name="stock_edit" class="form-control" placeholder="Stock" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter the Stock. </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Price</label>
                                <input type="number" id="price_edit" name="price_edit" class="form-control" placeholder="Price" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter the Price. </div>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Image</label>
                                <input type="file" id="image_edit" name="image_edit" class="form-control" placeholder="Image" required/>
                                <div class="valid-feedback"> Looks good! </div>
                                <div class="invalid-feedback"> Please enter the Image. </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                            <!-- button for add data -->
                            <button type="button" class="btn btn-primary" id="btn_edit">Edit</button>
                            <!-- button submit for validation when input type is empty -->
                            <button type="submit" class="btn btn-primary d-none" id="btn_edit_2">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- End Modal Edit --}}

        {{-- Modal Popup Image --}}
        <div class="modal fade animate__bounceIn" id="modalPopupImage" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="title_image"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-sm-12 popup_image"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Modal Popup Image --}}

        {{-- Modal Show --}}
        <div class="modal fade animate__bounceIn" id="modalShow" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="title_show"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-sm-12">
                            <label class="form-label">Category</label>
                            {{-- <input type="text" id="category_id_show" name="category_id_show" class="form-control" placeholder="Pegawai" required/> --}}
                            <select id="category_id_show" name="category_id_show" class="select2 form-select form-select-lg" data-allow-clear="true" required>
                                <option value=""></option>
                                @foreach ($data['categories'] as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label">Name</label>
                            <input type="text" id="name_show" name="name_show" class="form-control" placeholder="Name" required/>
                        </div>
                        <div class="col-sm-12 mt-1 mb-1">
                            <label class="form-label">Description</label>
                            <input type="text" id="description_show" name="description_show" class="form-control" placeholder="Description" required/>
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label">Stock</label>
                            <input type="number" id="stock_show" name="stock_show" class="form-control" placeholder="Stock" required/>
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label">Price</label>
                            <input type="number" id="price_show" name="price_show" class="form-control" placeholder="Price" required/>
                        </div>
                        <div class="col-sm-12">
                            <label class="form-label">Image</label>
                            {{-- <input type="file" id="image_show" name="image_show" class="form-control" placeholder="Image" required/> --}}
                            <div class="col-sm-12 image_show"></div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Modal Show --}}

        {{-- <hr class="my-5"> --}}
    </div>

    <!-- / Content -->

    @section('my-script')


        <script>

            // Show table with data
            var table_product = $('#example').DataTable({
                // dom: '<lf<t>ip>',
                ajax: {
                    url:'{{url("/products/get-all-product")}}',
                    dataSrc: ''
                },
                columns: [
                    { data: 'name' },
                    { data: 'description' },
                    { data: 'category_name' },
                    { data: 'stock' },
                    { data: 'price' },
                    { data: "image",
                        render: function (data) {
                            return `<a class="product_img" data-image="${data}"> <img src="POS/photo/` + data + `" class="avatar"/> </a>`;
                        }
                    },
                    { data: "image",
                            render: function (data) {
                                return `<a data-fslightbox href="POS/photo/` + data + `">
                                            <img src="POS/photo/` + data + `" class="avatar" alt="Image">
                                        </a>`;
                            }
                    },
                    {
                        data: "id",
                        render: function(data) {
                            return `<td>
                                <a class="btn btn-primary btn-icon rounded-pill text-white btn-edit" data-id="${data}"><i class="fas fa-edit"></i></a>
                                <div class="btn-group dropstart">
                                    <button type="button" class="btn btn-primary btn-icon rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item text-black btn-show" data-id="${data}" href="javascript:void(0);">Show</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item text-danger btn-delete" data-id="${data}" href="javascript:void(0);">Delete</a></li>
                                    </ul>
                                </div>
                            </td>`
                        }
                    },
                ],
                columnDefs: [
                    { className: 'text-center', targets: [7] },
                ],
            });

            // Popup Image
            $('#example').on('click', '.product_img', function (e) {
                e.preventDefault();
                var image = $(this).data("image");

                $('#modalPopupImage').modal('show');

                $.ajax({
                    type: "GET",
                    url: "{{ url('/products/get-image') }}",
                    data: {image: image},
                    success: function(data){
                        console.log(data);
                        $('#title_image').html(data.name);
                        $('.popup_image').html('<img src="POS/photo/' + data.image + '" class="avatar" style="width:100%;height:100%;"/>');
                    }
                });
            });

            // Empty input type when modal Create hidden
            $('#modalCreate').on('hidden.bs.modal', function (e) {
                $('#name').val('');
                $('#description').val('');
                $('#stock').val('');
                $('#price').val('');
                $('#image').val('');
                $('#btn_add').prop('disabled', false); // button save enable when data input is empty
            });

            // Add Data
            $('#btn_add').on('click', function(e){
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}" // token like @csrf in html
                    }
                });

                let category_id = $('#category_id').val();
                let name = $('#name').val();
                let description = $('#description').val();
                let stock = $('#stock').val();
                let price = $('#price').val();
                var image = $('#image')[0].files[0]; // set input image

                // add to object
                let fd = new FormData();
                fd.append("category_id", category_id);
                fd.append("name", name);
                fd.append("description", description);
                fd.append("stock", stock);
                fd.append("price", price);
                fd.append("image", image);

                if (!name && !description && !stock && !price && !image && !category_id ) {
                    $('#btn_add_2').click(); // button submit for validation when input type is empty
                }else{
                    $(this).prop('disabled', true); // button save disabled after click
                    $.ajax({
                        type: "POST",
                        url: "{{ url('/products/store') }}",
                        // data: {name: name, description: description, stock: stock, price: price, image: image}, // without image
                        data: fd, // with image and from object 'fd'
                        processData: false,
                        cache: false,
                        contentType: false,
                        // dataType: dataType
                        success: function(response){
                            if(response){
                                $('#modalCreate').modal('hide');
                                Swal.fire({
                                    title: 'Good job!',
                                    text: 'Data Saved Successfully!',
                                    icon: 'success',
                                    confirmButtonText: 'OK',
                                });
                            }else{
                                Swal.fire({
                                    title: 'Failed!',
                                    text: 'Data Failed to Save!',
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                });
                            }
                            table_product.ajax.reload();
                        }
                    });
                }
            });

            // Show record
            $('#category_id_show').attr('disabled', true);
            $('#name_show').attr('readonly', true);
            $('#description_show').attr('readonly', true);
            $('#stock_show').attr('readonly', true);
            $('#price_show').attr('readonly', true);
            $('#example').on('click', '.btn-show', function (e) {
                e.preventDefault();
                var id = $(this).data("id");

                $('#modalShow').modal('show');

                $.ajax({
                    type: "GET",
                    url: "{{ url('/products/get-product-show') }}",
                    data: {id: id},
                    success: function(data){
                        console.log(data);
                        $('#title_show').html(data.name);
                        $('#category_id_show').val(data.category_id).trigger("change");
                        $('#name_show').val(data.name);
                        $('#description_show').val(data.description);
                        $('#stock_show').val(data.stock);
                        $('#price_show').val(data.price);
                        // $('.image_show').html('<img src="POS/photo/' + data.image + '" class="avatar" style="width:100%;height:100%;"/>');
                        $('.image_show').html(`<a data-fslightbox href="{{asset('POS/photo/`+ data.image +`')}}"><img src="{{asset('POS/photo/`+ data.image +`')}}" class="avatar" style="width:100%;height:100%;" alt="Image"></a>`);
                    }
                });
            });

            // Empty input type when modal Edit hidden
            $('#modalEdit').on('hidden.bs.modal', function (e) {
                $('#name').val('');
                $('#description').val('');
                $('#stock').val('');
                $('#price').val('');
                $('#image').val('');
                $('#btn_edit').prop('disabled', false); // button save enable when data input is empty
            });

            // Edit record
            $('#example').on('click', '.btn-edit', function (e) {
                e.preventDefault();
                var id = $(this).data("id");
                var category_id = $('#category_id_edit');

                $('#modalEdit').modal('show');

                $.ajax({
                    type: "GET",
                    url: "{{ url('/products/get-product-show') }}",
                    data: {id: id},
                    success: function(data){
                        console.log(data);
                        $('#id_edit').val(data.id);
                        $('#title_edit').html(data.name);
                        $('#category_id_edit').val(data.category_id).trigger("change");
                        $('#name_edit').val(data.name);
                        $('#description_edit').val(data.description);
                        $('#stock_edit').val(data.stock);
                        $('#price_edit').val(data.price);
                        $('#image_edit').html(data.image);
                    }
                });
            });

            $('#btn_edit').on('click', function(e){
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}" // token like @csrf in html
                    }
                });
                var id = $('#id_edit').val();
                let category_id = $('#category_id_edit').val();
                let name = $('#name_edit').val();
                let description = $('#description_edit').val();
                let stock = $('#stock_edit').val();
                let price = $('#price_edit').val();
                let image = $('#image_edit')[0].files[0]; // set input image
                alert(category_id);

                // add to object
                let fd = new FormData();
                fd.append("id", id);
                fd.append("category_id", category_id);
                fd.append("name", name);
                fd.append("description", description);
                fd.append("stock", stock);
                fd.append("price", price);
                fd.append("image", image);

                if (!name && !description && !stock && !price && !image) {
                    $('#btn_edit_2').click(); // button submit for validation when input type is empty
                }else{
                    $(this).prop('disabled', true); // button save disabled after click
                    console.log(fd);
                    $.ajax({
                        type: "POST",
                        url: "{{ url('/products/update') }}",
                        data: fd,
                        processData: false,
                        cache: false,
                        contentType: false,
                        // dataType: dataType
                        success: function(response){
                            if(response){
                                $('#modalEdit').modal('hide');
                                Swal.fire({
                                    title: 'Good job!',
                                    text: 'Data Updated Successfully!',
                                    icon: 'success',
                                    confirmButtonText: 'OK',
                                });
                            }else{
                                Swal.fire({
                                    title: 'Failed!',
                                    text: 'Data Failed to Update!',
                                    icon: 'error',
                                    confirmButtonText: 'OK'
                                });
                            }
                            table_product.ajax.reload();
                        }
                    });
                }
            });

            // Delete a record
            $('#example').on('click', '.btn-delete', function (e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}" // token like @csrf in html
                    }
                });
                var id = $(this).data("id");
                // alert(id);

                // $('#modalDelete').modal('show');
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // alert(id);
                        $.ajax({
                            type: "POST",
                            url: "{{ url('/products/delete') }}",
                            data: {id: id},
                            // dataType: dataType
                            success: function(response){
                                // alert(id);
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Your file has been deleted.",
                                    icon: "success"
                                });
                                table_product.ajax.reload();
                            }
                        });
                    }
                });
            });
        </script>

        {{-- popup image with FsLightbox.js --}}
        <script src="template\sneat\assets\vendor\js\fslightbox.js"></script>
    @endsection
@endsection