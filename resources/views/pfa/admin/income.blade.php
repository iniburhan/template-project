@extends('layouts.mazer.master-index')

@section('content')

    @section('my-css')
        <!-- Datatables Bootstrap 5 -->
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" /> -->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" />
    @endsection

    <section class="section">
        <div class="row" id="table-hover-row">
            <div class="col-md-6">
                <h3 class="pt-3">Income</h3>
            </div>
            <div class="col-md-6 text-end">
                <button type="button" class="btn icon icon-left btn-success mb-2 mt-3 btn-sm" data-bs-toggle="modal" data-bs-target="#create-modal">
                    <i data-feather="plus"></i> Add
                </button>
            </div>

            @if(session()->has('error'))
                <div class="alert alert-danger alert-dismissible show fade"> Error! {{ session()->get('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible show fade"> Success! {{ session()->get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible show fade">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" >
                        <h4 class="card-title">Data Income</h4>
                    </div>

                    <div class="card-body table-responsive">
                        <!-- table hover -->
                        <div class="">
                            <!-- <table class="table table-hover mb-0 display nowrap" id="table-custom">example -->
                            <table class="table table-hover mb-0 display nowrap" id="example">
                                <thead>
                                    <tr>
                                        <!-- <th>No</th> -->
                                        <th>Information Name</th>
                                        <th style="text-align:center">Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- The Modal Create-->
    <div class="modal fade" id="create-modal">
        <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add Income Name</h4>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <form action="{{ url('pfa/pfa-income/store') }}" method="POST" enctype="multipart/form-data" class="form form-vertical">
                    <div class="modal-body">

                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-12 col-12">
                                                      <div class="form-group">
                                                        <label for="first-name-vertical">Information Name</label>
                                                        <input type="text" class="form-control" name="information_name" id="information_name" placeholder="Information Name" required>
                                                      </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <!-- button for add data -->
                        <button type="button" class="btn btn-primary" id="btn_add">Add</button>
                        <!-- button submit for validation when input type is empty -->
                        <button type="submit" class="btn btn-primary d-none" id="btn_add_2">Add</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
        
    <!-- The Modal Show -->
    <div class="modal fade" id="show-modal">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="title_show"></h4>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-vertical">Information Name</label>
                                                        {{-- <!-- <input type="hidden" name = "id" value = "{{$item->id}}"> -->
                                                        <!-- <input type="text" name="information_name" value="{{ $item->information_name }}" class="form-control" readonly> --> --}}
                                                        <input type="text" name="information_name" id="information_name_show" class="form-control" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

    <!-- The Modal Edit-->
    <div class="modal fade" id="edit-modal">
        <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="title_edit"></h4>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-vertical">Information Name</label>
                                                        {{-- <!-- <input type="hidden" name = "id" value = "{{$item->id}}"> -->
                                                        <!-- <input type="text" name="information_name" value="{{ $item->information_name }}" class="form-control" placeholder="Information Name" required> --> --}}
                                                        <input type="hidden" id="id_edit" name="id" class="form-control" />
                                                        <input type="text" name="information_name" id="information_name_edit" class="form-control" placeholder="Information Name" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <!-- button for edit data -->
                    <button type="button" class="btn btn-primary btn-edit" id="btn_edit">Edit</button>
                    <!-- button submit for validation when input type is empty -->
                    <button type="submit" class="btn btn-primary d-none" id="btn_edit_2">Edit</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete -->
    {{-- <div class="modal fade" id="delete-modal{{$item->id}}">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Delete {{$item->information_name}}</h4>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <form action="{{ url('pfa/pfa-income/delete') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="{{$item->id}}">
                        @csrf  
                        Delete data {{$item->information_name}}?
                    </div>

                <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Delete</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}
     
    @section('my-script')
        <!-- Datatables -->
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
        <!-- Script -->
        <script>
            // Show table with data
            var table_product = $('#example').DataTable({
                // dom: '<lf<t>ip>',
                ajax: {
                    url:'{{url("pfa/pfa-income/get-all-income")}}',
                    dataSrc: ''
                },
                columns: [
                    { data: 'information_name' },
                 //    { data: "image",
                 //        render: function (data) {
                 //            return `<a class="product_img" data-image="${data}"> <img src="pajakApp/photo/` + data + `" class="avatar"/> </a>`;
                 //        }
                 // },
                    {
                        data: "id",
                        render: function(data) {
                            return `<td>
                                <a class="btn btn-warning btn-icon rounded-pill text-white btn-edit" data-id="${data}"><i class="bi bi-pencil"></i></a>
                                <div class="btn-group dropstart">
                                    <button type="button" class="btn btn-primary btn-icon rounded-pill " data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item btn-show" data-id="${data}" href="javascript:void(0);">Show</a></li>
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
                    { className: 'text-center', targets: [1] },
                ],
            });

            // // Popup Image
            // $('#example').on('click', '.product_img', function (e) {
            //     e.preventDefault();
            //     var image = $(this).data("image");
            //     alert(image);

            //     $('#modalPopupImage').modal('show');

            //     $.ajax({
            //         type: "GET",
            //         url: "{{ url('/products/get-all-product') }}",
            //         data: {image: image},
            //         success: function(data){
            //             console.log(data.image);
            //             $('#title_image').html(data.image);
            //             $('.popup_image').val(`<a class="product_img" data-image="${data}"> <img src="pajakApp/photo/` + data + `" class="avatar"/> </a>`);
            //         }
            //     });
            // });

            // Empty input type when modal Create hidden
            $('#create-modal').on('hidden.bs.modal', function (e) {
                $('#information_name').val('');
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

                let information_name = $('#information_name').val();
                // var image = $('#image')[0].files[0]; // set input image

                // add to object
                let fd = new FormData();
                fd.append("information_name", information_name);
                // fd.append("image", image);

                if (!information_name) {
                    $('#btn_add_2').click(); // button submit for validation when input type is empty
                }else{
                    $(this).prop('disabled', true); // button save disabled after click
                    $.ajax({
                        type: "POST",
                        url: "{{ url('pfa/pfa-income/store') }}",
                        // data: {name: name, description: description, stock: stock, price: price, image: image}, // without image
                        data: fd, // with image and from object 'fd'
                        processData: false,
                        cache: false,
                        contentType: false,
                        // dataType: dataType
                        success: function(response){
                            if(response){
                                $('#create-modal').modal('hide');
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
            $('#example').on('click', '.btn-show', function (e) {
                e.preventDefault();
                var id = $(this).data("id");
                // alert(id);
                $('#show-modal').modal('show');

                $.ajax({
                    type: "GET",
                    url: "{{ url('pfa/pfa-income/get-income-show') }}",
                    data: {id: id},
                    success: function(data){
                        // console.log(data.information_name);
                        $('#title_show').html(data.information_name);
                        $('#information_name_show').val(data.information_name);
                        // $('#image_show').val(data.image);
                    }
                });
            });

            // Empty input type when modal Edit hidden
            $('#edit-modal').on('hidden.bs.modal', function (e) {
                $('#btn_edit').prop('disabled', false); // button save enable when data input is empty
            });

            // Edit record
            $('#example').on('click', '.btn-edit', function (e) {
                e.preventDefault();
                var id = $(this).data("id");
                // alert(id);
                $('#edit-modal').modal('show');

                $.ajax({
                    type: "GET",
                    url: "{{ url('pfa/pfa-income/get-income-show') }}",
                    data: {id: id},
                    success: function(data){
                        console.log(data.id);
                        $('#id_edit').val(data.id);
                        $('#title_edit').html(data.information_name);
                        $('#information_name_edit').val(data.information_name);
                        // $('#image_edit').val(data.image);
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
                let information_name = $('#information_name_edit').val();
                // let image = $('#image_edit').val();

                if (!information_name) {
                    $('#btn_edit_2').click(); // button submit for validation when input type is empty
                }else{
                    $(this).prop('disabled', true); // button save disabled after click
                    $.ajax({
                        type: "POST",
                        url: "{{ url('pfa/pfa-income/update') }}",
                        data: {id: id, information_name: information_name},
                        // dataType: dataType
                        success: function(response){
                            if(response){
                                $('#edit-modal').modal('hide');
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
                            url: "{{ url('pfa/pfa-income/delete') }}",
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
    @endsection

@endsection