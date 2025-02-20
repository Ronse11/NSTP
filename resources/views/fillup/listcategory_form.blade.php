@extends('layout.master_layout')

@section('body')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Choose Your Subject</h1>
                </div>
                <div class="col-sm-6 d-flex justify-content-end">
                    @if($notif) 
                        <i class=" fas fa-bell"></i>
                    @else
                        <h1>No Notif</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                @foreach($cat as $datacat)
                    <div class="col-md-12 col-lg-6 col-xl-4">
                        <div class="card mb-2 bg-gradient-dark">
                            <img class="card-img-top" src="{{ asset('assets/img/gallery/' . $datacat->image) }}" height="100%" width="100%" alt="Dist Photo 1">
                            <div class="card-img-overlay d-flex flex-column justify-content-end">
                                <h1 class="text-white text-center">{{$datacat->category_name}}</h1>
                                <div class="mt-5">
                                    <a href="{{ route('fillupstudentRead', ['id' => encrypt($datacat->id)]) }}" class="btn btn-success">Select</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection