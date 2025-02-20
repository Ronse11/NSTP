@extends('layout.master_layout')

@section('body')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">LTS Students</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('fillupstudentCategoryRead') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">LTS Students</li>
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
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <button class="btn btn-primary">Print</button>
                            </div>
                            <div class=" container-fluid d-flex justify-content-end">
                                <a href="{{ route('appliedLts') }}" class="btn btn-primary px-3">
                                    <i class="nav-icon fas fa-users"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsiv">
                                <table class="table table-hover" id="example1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Serial Number</th>
                                            <th>Name</th>
                                            <th>Course</th>
                                            <th>Address</th>
                                            <th>Contact</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no=1; @endphp
                                        @foreach ($studlts as  $datastudlts)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $datastudlts->school_id }}</td>
                                            <td>{{ $datastudlts->lname }}, {{ $datastudlts->fname }} {{ $datastudlts->mname }}</td>
                                            <td>{{ $datastudlts->course }}</td>
                                            <td>{{ $datastudlts->brgy }}, {{ $datastudlts->city }}, {{ $datastudlts->province }}</td>
                                            <td>{{ $datastudlts->contact_no }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="#">
                                                            <i class="fas fa-pen mr-2"></i>
                                                            <span>Edit</span>
                                                        </a>
                                                        <a class="dropdown-item" href="#"><i class="fas fa-trash mr-2"></i><span>Delete</span></a>
                                                        <a class="dropdown-item" href="#"></i><i class="fas fa-eye mr-2"></i><span>View</span></a>
                                                    </div>
                                                </div>
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
        </div>
    </div>
</div>

@endsection