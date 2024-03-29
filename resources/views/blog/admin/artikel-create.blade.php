@extends('layouts.mazer.master-index')

@section('content')

	@section('my-css')
		<!-- css Summernote -->
    	<link rel="stylesheet" href="{{asset('template/mazer/assets/extensions/summernote/summernote-lite.css')}}">
		<link rel="stylesheet" href="{{asset('template/mazer/assets/compiled/css/form-editor-summernote.css')}}">
		<!-- css Flatpickr -->
		<link rel="stylesheet" href="{{asset('template/mazer/assets/extensions/flatpickr/flatpickr.min.css')}}">
		<!-- css Select Option Choices -->
		<link rel="stylesheet" href="{{asset('template/mazer/assets/extensions/choices.js/public/assets/styles/choices.css')}}">
    @endsection

    <section class="section">
        <div class="row" id="table-hover-row">
            <div class="col-md-6">
                <h3 class="pt-3">Artikel</h3>
            </div>
            <!-- <div class="col-md-6 text-end">
                <button type="button" class="btn icon icon-left btn-success mb-2 mt-3 btn-sm" data-bs-toggle="modal" data-bs-target="#create-modal">
                    <i data-feather="plus"></i> Add
                </button>
            </div> -->

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
                        <h4 class="card-title">Add Artikel</h4>
                    </div>

                    <form action="{{ url('blog/artikel/store') }}" method="POST" enctype="multipart/form-data" class="form form-vertical">
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
	                                                    <label for="first-name-vertical">Judul Artikel</label>
	                                                    <input type="text" class="form-control" name="judul" placeholder="Judul Artikel" required>
	                                                  </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
	                                                  <div class="form-group">
	                                                    <label for="first-name-vertical">Kategori</label>
	                                                    <!-- <input type="text" class="form-control" name="publikasi_date" required> -->
	                                                    <select class="choices form-select" name="id_kategori">
	                                                    	<option name="" value="">-- Pilih Kategori --</option>
	                                                    	@foreach($data['kategori'] as $data)
	                                                    		<option value="{{$data->id}}">{{$data->nama_kategori}}</option>
	                                                    	@endforeach
	                                                    </select>
	                                                  </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
	                                                  <div class="form-group">
	                                                    <label for="first-name-vertical">Tanggal Publikasi</label>
	                                                    <input type="date" class="form-control mb-3 flatpickr-basic" name="publikasi_date" value="{{date('Y-m-d')}}" required>
	                                                  </div>
                                                    </div>
                                                    <div class="col-md-12 col-12">
                                                      <div class="form-group">
                                                        <label for="first-name-vertical">Isi Artikel</label>
									                    <!-- <div id="summernote" name="isi"></div> -->
									                    <textarea id="summernote" name="isi"></textarea>
                                                      </div>
                                                      <div class="modal-footer">
									                    <button type="submit" class="btn btn-primary"><i data-feather="plus"></i> Add</button>
									                  </div>
                                                    </div>	
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
			                    
                            </div>
                        </div>
	                    
                    </form>

                    {{--
                    <div class="card-body table-responsive">
                        <!-- table hover -->
                        
                        <div class="">
                            <table class="table table-hover mb-0 display nowrap" id="table-custom">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kategori</th>
                                        <th style="text-align:center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['kategori'] as $item)
                                        <tr>
                                            <td>{{  $loop->iteration }}</td>
                                            <td> {{ $item->nama_kategori }} </td>
                                            <td style="text-align:center">
                                                <form action="#" method="POST" style="text-align:center">
                                                    <input type="hidden" name="id" value = "{{$item->id}}">

                                                    <button type="button" class="btn icon btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#show-modal{{$item->id}}"><i class="bi bi-eye text-white"></i>
                                                    </button>
                                                    <button type="button" class="btn icon btn-warning" data-bs-toggle="modal"
                                                        data-bs-target="#edit-modal{{$item->id}}"><i class="bi bi-pencil"></i>
                                                    </button>

                                                    @csrf

                                                    <button type="button" title="delete"  class="btn icon btn-danger"data-bs-toggle="modal"
                                                        data-bs-target="#delete-modal{{$item->id}}"><i class="bi bi-trash text-white"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                    --}}
                </div>
            </div>
        </div>
    </section>

    @section('my-script')
    	<!-- Script Summernot -->
    	<script src="{{asset('template/mazer/assets/extensions/summernote/summernote-lite.min.js')}}"></script>
		<script src="{{asset('template/mazer/assets/static/js/pages/summernote.js')}}"></script>
		<!-- Script Flatpickr -->
		<script src="{{asset('template/mazer/assets/extensions/flatpickr/flatpickr.min.js')}}"></script>
		<script src="{{asset('template/mazer/assets/static/js/pages/date-picker.js')}}"></script>
		<!-- Script Select Option Choices -->
		<script src="{{asset('template/mazer/assets/extensions/choices.js/public/assets/scripts/choices.js')}}"></script>
		<script src="{{asset('template/mazer/assets/static/js/pages/form-element-select.js')}}"></script>
    @endsection

@endsection