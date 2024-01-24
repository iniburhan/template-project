@extends('layouts.mazer.master-index')

@section('content')

	@section('my-css')
    @endsection

    <section class="section">
        <div class="row" id="table-hover-row">
            <div class="col-md-6">
                <h3 class="pt-3">Trash</h3>
            </div>
            <div class="col-md-6 text-end">
               <!--  <button type="button" class="btn icon icon-left btn-success mb-2 mt-3 btn-sm" data-bs-toggle="modal" data-bs-target="#create-modal">
                    <i data-feather="plus"></i> Add
                </button> -->
                <!-- <a href="{{url('/artikel/create')}}" class="btn icon icon-left btn-success mb-2 mt-3 btn-sm" role="button" aria-disabled="true"><i data-feather="plus"></i> Add Artikel</a> -->
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
                        <h4 class="card-title">List Trash Blog</h4>
                    </div class="row">
                        <div>
                            <div class="card-body">

                            <a href="{{url('/kategori/trash')}}" class="btn icon btn-warning" role="button" aria-disabled="true"><i class="bi bi-trash3-fill"> Kategori</i></a>
                            <a href="{{url('/artikel/trash')}}" class="btn icon btn-warning" role="button" aria-disabled="true"><i class="bi bi-trash3-fill"> Artikel</i></a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @section('my-script')
    @endsection

@endsection