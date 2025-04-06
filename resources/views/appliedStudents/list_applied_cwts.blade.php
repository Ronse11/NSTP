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
                                            <th>Name</th>
                                            <th>Course</th>
                                            <th>Gender</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no=1; @endphp
                                        @foreach ($appliedStudCwts as  $datastudlts)
                                        <tr>
                                            <td class="align-middle">{{ $no++ }}</td>
                                            <td class="align-middle">{{ $datastudlts->lname }}, {{ $datastudlts->fname }} {{ $datastudlts->mname }}</td>
                                            <td class="align-middle">{{ $datastudlts->course }}</td>
                                            <td class="align-middle">{{ $datastudlts->gender }}</td>
                                            <td class="align-middle">
                                                <div class=" d-flex container justify-content-around">
                                                    <form action="{{ route('acceptedApplicant', $datastudlts->student_id) }}" method="POST">
                                                        @csrf
                                                        <button class="btn btn-success">Accept</button>
                                                    </form>
                                                    {{-- <form action="{{ route('declineApplicant', $datastudlts->student_id) }}" method="POST">
                                                        @csrf
                                                        <button class="btn btn-danger">Decline</button>
                                                    </form> --}}
                                                    <button class="btn btn-danger" data-toggle="modal" data-target="#declineModal">
                                                        Decline
                                                    </button>

                                                    <div class="modal fade" id="declineModal" tabindex="-1" role="dialog" aria-labelledby="declineModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="declineModalLabel">Reason for Declining</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form id="declineForm" action="{{ route('declineApplicant', $datastudlts->student_id) }}" method="POST">
                                                                    @csrf
                                                                    <div class="modal-body">
                                                                        <textarea id="declineComment" class="form-control" name="comment" placeholder="Enter reason here..." required></textarea>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                        <button type="submit" class="btn btn-danger">Confirm Decline</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
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