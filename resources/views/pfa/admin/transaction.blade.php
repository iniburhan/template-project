@extends('layouts.mazer.master-index')

@section('content')

	@section('my-css')
		<!-- css Summernote -->
    	<link rel="stylesheet" href="{{asset('template/mazer/assets/extensions/summernote/summernote-lite.css')}}">
		<link rel="stylesheet" href="{{asset('template/mazer/assets/compiled/css/form-editor-summernote.css')}}">
		<!-- css Flatpickr -->
		<link rel="stylesheet" href="{{asset('template/mazer/assets/extensions/flatpickr/flatpickr.min.css')}}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/style.css">
		<!-- css Select Option Choices -->
		<link rel="stylesheet" href="{{asset('template/mazer/assets/extensions/choices.js/public/assets/styles/choices.css')}}">
    @endsection

    <section class="section">
        <div class="row" id="table-hover-row">
            <div class="col-md-6">
                <h3 class="pt-3">Transactions</h3>
            </div>
            <div class="col-md-6 text-end">
                <button type="button" class="btn icon icon-left btn-success mb-2 mt-3 btn-sm" data-bs-toggle="modal" data-bs-target="#create-modal">
                    <i data-feather="plus"></i> Add
                </button>
                <!-- <a href="{{url('/Transaction/create')}}" class="btn icon icon-left btn-success mb-2 mt-3 btn-sm" role="button" aria-disabled="true"><i data-feather="plus"></i> Add Transaction</a> -->
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
                    <div class="card-header" style="padding-bottom: 0px;">
                        <h4 class="card-title">Data Transaction</h4>
                    </div>

                    <div class="card-body table-responsive">
                        <!-- table hover -->
                        
                        <div class="">
                            <table class="table table-hover mb-0 display nowrap" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Income Information</th>
                                        <th>Nominal</th>
                                        <th>Periode Month</th>
                                        <th style="text-align:center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['transaction'] as $datas)
                                        <tr>
                                            <td> {{ $loop->iteration }}</td>
                                            <td> {{ $datas->information_name }} </td>
                                            <td> {{ $datas->income }} </td>
                                            <td> {{ $datas->periode_month }} </td>
                                            <td style="text-align:center">
                                                <form action="#" method="POST" style="text-align:center">
                                                    <input type="hidden" name="id" value = "{{$datas->id}}">

                                                    <!-- <button type="button" class="btn icon btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#show-modal{{$datas->id}}"><i class="bi bi-eye text-white"></i>
                                                    </button> -->
                                                    <a href="{{url('pfa/pfa-transaction-detail/'.$datas->id)}}" class="btn icon btn-success" role="button" aria-disabled="true"><i data-feather="plus"></i></a>
                                                    <button type="button" class="btn icon btn-warning" data-bs-toggle="modal"
                                                        data-bs-target="#edit-modal{{$datas->id}}"><i class="bi bi-pencil"></i>
                                                    </button>

                                                    @csrf

                                                    <button type="button" title="delete"  class="btn icon btn-danger"data-bs-toggle="modal"
                                                        data-bs-target="#delete-modal{{$datas->id}}"><i class="bi bi-trash text-white"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
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
                    <h4 class="modal-title">Add Transaction</h4>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <form action="{{ url('pfa/pfa-transaction/store') }}" method="POST" enctype="multipart/form-data" class="form form-vertical">
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
                                                        <label for="first-name-vertical">Income Information</label>
                                                        <!-- <input type="text" class="form-control" name="nama_kategori" placeholder="Nama Kategori" required> -->
                                                        <select class="choices form-select" name="id_income">
                                                            <option name="" value="">-- Select Income Information --</option>
                                                            @foreach($data['income'] as $data)
                                                                <option value="{{$data->id}}">{{$data->information_name}}</option>
                                                            @endforeach
                                                        </select>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                      <div class="form-group">
                                                        <label for="first-name-vertical">Periode Month</label>
                                                        <input type="date" class="form-control mb-3 anotherSelector" name="periode_month" placeholder="Select Month" required> 
                                                      </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                      <div class="form-group">
                                                        <label for="first-name-vertical">Nominal</label>
                                                        <input type="number" class="form-control" name="income" placeholder="Nominal" required>
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
                        <button type="submit" class="btn btn-primary">Add</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    {{--
    @foreach ($data['transaction'] as $item)
        <!-- The Modal Show-->
        <div class="modal fade" id="show-modal{{$item->id}}">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">{{ $item->nama_kategori }}</h4>
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
                                                            <label for="first-name-vertical">Nama Kategori</label>
                                                            <input type="hidden" name = "id" value = "{{$item->id}}">
                                                            <input type="text" name="nama_kategori" value="{{ $item->nama_kategori }}" class="form-control" readonly>
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
        <div class="modal fade" id="edit-modal{{$item->id}}">
            <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Edit {{$item->information_name}}</h4>
                        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <form action="{{ url('kategori/update') }}" method="POST" enctype="multipart/form-data">
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
                                                                <label for="first-name-vertical">Nama Kategori</label>
                                                                <input type="hidden" name = "id" value = "{{$item->id}}">
                                                                <input type="text" name="nama_kategori" value="{{ $item->nama_kategori }}" class="form-control" placeholder="Nama Kategori" required>
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
                            <button type="submit" class="btn btn-primary">Edit</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Delete -->
        <div class="modal fade" id="delete-modal{{$item->id}}">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Delete {{$item->judul}}</h4>
                        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <form action="{{ url('artikel/delete') }}" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="hidden" name="id" value="{{$item->id}}">
                            @csrf  
                            Delete data {{$item->judul}}?
                        </div>

                    <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">Delete</button>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach 
    --}}

    @section('my-script')
    	<!-- Script Summernot -->
    	<script src="{{asset('template/mazer/assets/extensions/summernote/summernote-lite.min.js')}}"></script>
		<script src="{{asset('template/mazer/assets/static/js/pages/summernote.js')}}"></script>
		<!-- Script Flatpickr -->
		<script src="{{asset('template/mazer/assets/extensions/flatpickr/flatpickr.min.js')}}"></script>
		<script src="{{asset('template/mazer/assets/static/js/pages/date-picker.js')}}"></script>

        <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/monthSelect/index.js"></script>

		<!-- Script Select Option Choices -->
		<script src="{{asset('template/mazer/assets/extensions/choices.js/public/assets/scripts/choices.js')}}"></script>
		<script src="{{asset('template/mazer/assets/static/js/pages/form-element-select.js')}}"></script>

        <!-- Select Month -->
        <script>
            $(".anotherSelector").flatpickr(
                {
                  plugins: [
                      new monthSelectPlugin({
                        shorthand: true, //defaults to false
                        // dateFormat: "m.y", //defaults to "F Y"
                        // altFormat: "F Y", //defaults to "F Y"
                        theme: "dark" // defaults to "light"
                      })
                  ]
                }
            );
        </script>
    @endsection

@endsection