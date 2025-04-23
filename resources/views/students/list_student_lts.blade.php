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
                            <div class="d-flex align-items-center gap-2" style="white-space: nowrap;">
                                <button class="btn btn-primary" onclick="printTable()">Print</button>
                                <button id="checkAllBtn" class="btn btn-primary">Check All</button>
                                {{-- <a href="{{ route('export.all.students', [ 'key' => 'LTS' ]) }}" class="btn btn-success">Export Data to Excel</a> --}}
                                <button id="exportCheckedBtn" class="btn btn-success">Export Selected to Excel</button>
                            </div>
                            
                            <div class=" container-fluid d-flex justify-content-end">
                                <a href="{{ route('appliedLts') }}" class="btn btn-primary px-3 d-flex align-items-center">
                                    <div>
                                        <i class="nav-icon fas fa-users"></i>
                                    </div>
                                    <div class="pl-2">
                                        {{$studCount}}
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="printTableArea table table-hover" id="example1" data-categ="LTS" data-category="Literacy Training Service">
                                    <thead>
                                        <tr>
                                            <th class="no-print">#</th>
                                            <th>Name</th>
                                            <th>Course</th>
                                            <th>Gender</th>
                                            <th>Status</th>
                                            <th class="no-print">Print</th> 
                                            <th class="no-print">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                        @php $no=1; @endphp
                                        @foreach ($studltsMale as  $datastudlts)
                                        <tr class="align-middle" data-student-id="{{ $datastudlts->student_id }}">
                                            <td class="align-middle no-print">{{ $no++ }}</td>
                                            <td class="align-middle">{{ $datastudlts->lname }}, {{ $datastudlts->fname }} {{ $datastudlts->mname }}</td>
                                            <td class="align-middle">{{ $datastudlts->course }}</td>
                                            <td class="align-middle">{{ $datastudlts->gender }}</td>
                                            <td class="no-print align-middle">
                                                <button type="button" 
                                                    class="btn {{ $datastudlts->active ? 'btn-success' : 'btn-danger' }} toggle-status-btn"
                                                    data-student-id="{{ $datastudlts->student_id }}" 
                                                    data-current-status="{{ $datastudlts->active ? 1 : 0 }}">
                                                    {{ $datastudlts->active ? 'Active' : 'Inactive' }}
                                                </button>
                                            </td>
                                            <td class="no-print align-middle">
                                                <input type="checkbox" class="print-checkbox">
                                            </td>
                                            <td class="no-print align-middle">
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="{{ route('editStudent', $datastudlts->student_id) }}"><i class="fas fa-edit mr-2"></i><span>Edit</span></a>
                                                        <a class="dropdown-item" href="{{ route('deleteStudent', $datastudlts->student_id) }}"><i class="fas fa-trash mr-2"></i><span>Delete</span></a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    
                                        @foreach ($studltsFemale as  $datastudlts)
                                        <tr class="align-middle" data-student-id="{{ $datastudlts->student_id }}">
                                            <td class="align-middle no-print">{{ $no++ }}</td>
                                            <td class="align-middle">{{ $datastudlts->lname }}, {{ $datastudlts->fname }} {{ $datastudlts->mname }}</td>
                                            <td class="align-middle">{{ $datastudlts->course }}</td>
                                            <td class="align-middle">{{ $datastudlts->gender }}</td>
                                            <td class="no-print align-middle">
                                                <button type="button" 
                                                    class="btn {{ $datastudlts->active ? 'btn-success' : 'btn-danger' }} toggle-status-btn"
                                                    data-student-id="{{ $datastudlts->student_id }}" 
                                                    data-current-status="{{ $datastudlts->active ? 1 : 0 }}">
                                                    {{ $datastudlts->active ? 'Active' : 'Inactive' }}
                                                </button>
                                            </td>
                                            <td class="no-print align-middle">
                                                <input type="checkbox" class="print-checkbox">
                                            </td>
                                            <td class="no-print align-middle">
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="{{ route('editStudent', $datastudlts->student_id) }}"><i class="fas fa-edit mr-2"></i><span>Edit</span></a>
                                                        <a class="dropdown-item" href="{{ route('deleteStudent', $datastudlts->student_id) }}"><i class="fas fa-trash mr-2"></i><span>Delete</span></a>
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



{{-- Print --}}
{{-- <div id="printFunction" class="">
    <div class="table-responsiv">
        <table class="printTableArea table table-hover" id="example1">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Course</th>
                    <th>Gender</th>
                </tr>
            </thead>
            <tbody >
                @php $no=1; @endphp
                @foreach ($studltsMale as  $datastudlts)
                <tr class="align-middle">
                    <td class="align-middle">{{ $no++ }}</td>
                    <td class="align-middle">{{ $datastudlts->lname }}, {{ $datastudlts->fname }} {{ $datastudlts->mname }}</td>
                    <td class="align-middle">{{ $datastudlts->course }}</td>
                    <td class="align-middle">{{ $datastudlts->gender }}</td>
                </tr>
                @endforeach
                @foreach ($studltsFemale as  $datastudlts)
                <tr>
                    <td class="align-middle">{{ $no++ }}</td>
                    <td class="align-middle">{{ $datastudlts->lname }}, {{ $datastudlts->fname }} {{ $datastudlts->mname }}</td>
                    <td class="align-middle">{{ $datastudlts->course }}</td>
                    <td class="align-middle">{{ $datastudlts->gender }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
</div> --}}



@endsection