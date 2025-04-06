@extends('layout.master_layout')

@section('body')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">All Students</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dash') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Students</li>
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
                            <div class="d-flex align-items-center gap-2" style="white-space: nowrap;">
                                <button class="btn btn-primary" onclick="printTable()">Print</button>
                                <button id="checkAllBtn" class="btn btn-primary">Check All</button>
                                <button id="exportCheckedBtn" class="btn btn-success">Export Selected to Excel</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsiv">
                                <table class="printTableArea table table-hover" id="example1" data-categ="ALL" data-category="All Students">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Course</th>
                                            <th>Gender</th>
                                            <th class="no-print">Print</th>
                                            <th class="no-print">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no=1; @endphp
                                        @foreach ($allStud as  $stud)
                                        <tr class="align-middle" data-student-id="{{ $stud->student_id }}">
                                            <td class="align-middle">{{ $no++ }}</td>
                                            <td class=" align-middle">{{ $stud->lname }}, {{ $stud->fname }} {{ $stud->mname }}</td>
                                            <td class=" align-middle">{{ $stud->course }}</td>
                                            <td class=" align-middle">{{ $stud->gender }}</td>
                                            <td class="no-print align-middle">
                                                <input type="checkbox" class="print-checkbox">
                                            </td>
                                            <td class="no-print align-middle">
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="{{ route('editStudent', $stud->student_id) }}"><i class="fas fa-edit mr-2"></i><span>Edit</span></a>
                                                        <a class="dropdown-item" href="{{ route('deleteStudent', $stud->student_id) }}"><i class="fas fa-trash mr-2"></i><span>Delete</span></a>
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