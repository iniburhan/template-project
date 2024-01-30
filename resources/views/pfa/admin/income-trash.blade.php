@extends('layouts.mazer.master-index')

@section('content')
    
    @section('my-css')
    @endsection

    <section class="section">
        <div class="row" id="table-hover-row">
            <div class="col-md-6">
                <h3 class="pt-3">Income</h3>
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
                    <div class="card-header" >
                        <h4 class="card-title">Trash Income</h4>
                    </div>

                    <div class="card-body table-responsive">
                        <!-- table hover -->
                        <div class="">
                            <table class="table table-hover mb-0 display nowrap" id="table-custom">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Information</th>
                                        <th style="text-align:center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['income'] as $item)
                                        <tr>
                                            <td>{{  $loop->iteration }}</td>
                                            <td> {{ $item->information_name }} </td>
                                            <td style="text-align:center">
                                                <form action="#" method="POST" style="text-align:center">
                                                    <input type="hidden" name="id" value = "{{$item->id}}">

                                                    <!-- <a href="{{url('/kategori/restore')}}" class="btn icon btn-warning" role="button" aria-disabled="true"><i class="bi bi-pencil"></i></a> -->

                                                    <!-- <button type="button" class="btn icon btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#show-modal{{$item->id}}"><i class="bi bi-eye text-white"></i>
                                                    </button>
                                                    <button type="button" class="btn icon btn-warning" data-bs-toggle="modal"
                                                        data-bs-target="#edit-modal{{$item->id}}"><i class="bi bi-pencil"></i>
                                                    </button> -->

                                                    @csrf

                                                    <button type="button" title="restore"  class="btn icon btn-danger"data-bs-toggle="modal"
                                                        data-bs-target="#restore-modal{{$item->id}}"><i class="bi bi-bootstrap-reboot"></i>
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
    
    @foreach ($data['income'] as $item)
        <!-- Modal Restore -->
        <div class="modal fade" id="restore-modal{{$item->id}}">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Restore {{$item->information_name}}</h4>
                        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <form action="{{ url('pfa/pfa-income/restore') }}" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="hidden" name="id" value="{{$item->id}}">
                            @csrf  
                            Restore data {{$item->information_name}}?
                        </div>

                    <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-warning">Restore</button>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
     
    @section('my-script')
    @endsection

@endsection