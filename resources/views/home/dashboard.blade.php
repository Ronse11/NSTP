@extends('layout.master_layout')

@section('body')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                {{-- <div class=" row mb-1 text-success fw-bold">
                    <h4 class="cpsu-header-text">CENTRAL PHILIPPINES STATE UNIVERSITY</h4>
                </div> --}}
                <div class="row mb-2">
                    
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        @if (session('success'))
                            <div class="alert alert-success" style="font-size: 10pt;">
                                <i class="fas fa-check"></i> {{ session('success') }}
                            </div>
                        @endif
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-green">
                            <div class="inner p-3 text-white ">
                                <!-- CWTS Text (Bigger and Dominant) -->
                                <div class=" d-flex flex-column gap-2">
                                    <div class=" d-flex justify-content-between align-items-center">
                                        <div>
                                            <h2 class="display-6 font-weight-bold">CWTS</h2>
                                        </div>
                            
                                        <!-- Top Right: Total Number -->
                                        <div class="">
                                            <h2 class="display-6 font-weight-bold">{{number_format($studcwts)}}</h2>
                                        </div>
                                    </div>
                        
                                    <div class="d-flex align-items-center pl-2 gap-4"  style="opacity: 0.7;">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-male fa-2x mr-2"></i> <!-- Male Icon (2x size) -->
                                            <h5 class="mb-0 fa-2x">{{ number_format($totalMaleCwts) }}</h5>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-female fa-2x mr-2"></i> <!-- Female Icon (2x size) -->
                                            <h5 class="mb-0 fa-2x">{{ number_format($totalFemaleCwts) }}</h5>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                    
                            <a href="{{ route('studentcwtsShow') }}" class="small-box-footer">More info 
                                <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-yellow">
                            <div class="inner p-3 text-white ">
                                <!-- CWTS Text (Bigger and Dominant) -->
                                <div class=" d-flex flex-column gap-2">
                                    <div class=" d-flex justify-content-between align-items-center">
                                        <div>
                                            <h2 class="display-6 font-weight-bold">LTS</h2>
                                        </div>
                            
                                        <!-- Top Right: Total Number -->
                                        <div class="">
                                            <h2 class="display-6 font-weight-bold">{{number_format($studlts)}}</h2>
    
                                        </div>
                                    </div>
                        
                                    <div class="d-flex align-items-center pl-2 gap-4"  style="opacity: 0.7;">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-male fa-2x mr-2"></i> <!-- Male Icon (2x size) -->
                                            <h5 class="mb-0 fa-2x">{{ number_format($totalMaleLts) }}</h5>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-female fa-2x mr-2"></i> <!-- Female Icon (2x size) -->
                                            <h5 class="mb-0 fa-2x">{{ number_format($totalFemaleLts) }}</h5>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                    
                            <a href="{{ route('studentLTSShow') }}" class="small-box-footer">More info 
                                <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>

                    
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-red">
                            <div class="inner p-3 text-white ">
                                <!-- CWTS Text (Bigger and Dominant) -->
                                <div class=" d-flex flex-column gap-2">
                                    <div class=" d-flex justify-content-between align-items-center">
                                        <div>
                                            <h2 class="display-6 font-weight-bold">ROTC</h2>
                                        </div>
                            
                                        <!-- Top Right: Total Number -->
                                        <div class="">
                                            <h2 class="display-6 font-weight-bold">{{number_format($studrotc)}}</h2>
    
                                        </div>
                                    </div>
                        
                                    <div class="d-flex align-items-center pl-2 gap-4"  style="opacity: 0.7;">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-male fa-2x mr-2"></i> <!-- Male Icon (2x size) -->
                                            <h5 class="mb-0 fa-2x">{{ number_format($totalMaleRotc) }}</h5>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-female fa-2x mr-2"></i> <!-- Female Icon (2x size) -->
                                            <h5 class="mb-0 fa-2x">{{ number_format($totalFemaleRotc) }}</h5>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                    
                            <a href="{{ route('studentrotcShow') }}" class="small-box-footer">More info 
                                <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>


                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-gray">
                            <div class="inner p-3 text-white ">
                                <!-- CWTS Text (Bigger and Dominant) -->
                                <div class=" d-flex flex-column gap-2">
                                    <div class=" d-flex justify-content-between align-items-center">
                                        <div>
                                            <h2 class="display-6 font-weight-bold">Total</h2>
                                        </div>
                            
                                        <!-- Top Right: Total Number -->
                                        <div class="">
                                            <h2 class="display-6 font-weight-bold">{{number_format($studall)}}</h2>
    
                                        </div>
                                    </div>
                        
                                    <div class="d-flex align-items-center pl-2 gap-4"  style="opacity: 0.7;">
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-male fa-2x mr-2"></i> <!-- Male Icon (2x size) -->
                                            <h5 class="mb-0 fa-2x">{{ number_format($studcwts) }}</h5>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-female fa-2x mr-2"></i> <!-- Female Icon (2x size) -->
                                            <h5 class="mb-0 fa-2x">{{ number_format($studcwts) }}</h5>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                    
                            <a href="" class="small-box-footer">More info 
                                <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>


                </div>
                <div class="row">

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-blue h-100">
                            <div class="inner">
                                <h3>{{ number_format($totalMale) }}</h3>
                                <p>Total Male</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-male"></i>
                            </div>
                            {{-- <a href="{{ route('studentcwtsShow') }}" class="small-box-footer">More info 
                                <i class="fas fa-arrow-circle-right"></i>
                            </a> --}}
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-pink h-100">
                            <div class="inner">
                                <h3>{{ number_format($totalFemale) }}</h3>
                                <p>Total Female</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-female"></i>
                            </div>
                            {{-- <a href="#" class="small-box-footer">More info 
                                <i class="fas fa-arrow-circle-right"></i>
                            </a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
