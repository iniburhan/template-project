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
                @foreach($data['artikel'] as $datas)
                <div class="card">
                    <div class="card-header" style="padding-bottom: 0px;">
                        <h4 class="card-title">Edit {{$datas->judul}}</h4>
                    </div>

                    <form action="{{ url('artikel/update/'.$datas->id) }}" method="POST" enctype="multipart/form-data" class="form form-vertical">
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
	                                                    <input type="text" class="form-control" name="judul" value="{{$datas->judul}}" placeholder="Judul Artikel" required>
	                                                  </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
	                                                  <div class="form-group">
	                                                    <label for="first-name-vertical">Kategori</label>
                                                        <label>({{$datas->nama_kategori}})</label>
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
	                                                    <input type="date" class="form-control mb-3 flatpickr-basic" name="publikasi_date" value="{{$datas->publikasi_date}}" required>
	                                                  </div>
                                                    </div>
                                                    <div class="col-md-12 col-12">
                                                      <div class="form-group">
                                                        <label for="first-name-vertical">Isi Artikel</label>
									                    <!-- <div id="summernote" name="isi"></div> -->
									                    <textarea id="summernote" name="isi">{{$datas->isi}}</textarea>
                                                      </div>
                                                      <div class="modal-footer">
									                    <button type="submit" class="btn btn-primary">Edit</button>
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
                </div>
                @endforeach
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