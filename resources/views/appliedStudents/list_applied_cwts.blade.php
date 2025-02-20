@extends('layout.master_layout')

@section('body')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Applied Students in CWTS</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('fillupstudentCategoryRead') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Applied Students in CWTS</li>
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
                        <div class="card-header">
                            <a href="{{ route('studentcwtsShow') }}" class="btn btn-primary">
                                <i class="nav-icon fas fa-arrow-left"></i>
                            </a>
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
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no=1; @endphp
                                        @foreach ($appliedStudCwts as  $datastudlts)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $datastudlts->school_id }}</td>
                                            <td>{{ $datastudlts->lname }}, {{ $datastudlts->fname }} {{ $datastudlts->mname }}</td>
                                            <td>{{ $datastudlts->course }}</td>
                                            <td>{{ $datastudlts->brgy }}, {{ $datastudlts->city }}, {{ $datastudlts->province }}</td>
                                            <td>{{ $datastudlts->contact_no }}</td>
                                            <td>
                                                <div class=" d-flex container justify-content-around">
                                                    <form action="{{ route('acceptedApplicant', $datastudlts->student_id) }}" method="POST">
                                                        @csrf
                                                        <button class="btn btn-success">Accept</button>
                                                    </form>
                                                    <form action="{{ route('declineApplicant', $datastudlts->student_id) }}" method="POST">
                                                        @csrf
                                                        <button class="btn btn-danger">Decline</button>
                                                    </form>
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