@extends('layout.master_layout')

@section('body')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">CWTS STUDENTS</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dash') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">CWTS STUDENTS</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    {{-- @include('fillup.edit_student') --}}

    <!-- Main content -->
    <form action="{{ route('editChosenStudent', $studentData->student_id) }}" method="POST">
        @csrf
        <div class=" content p-4 editStudent">
    
            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-3">
                        <label for="school_year">School Year:</label>
                        <input type="text" name="school_year" class="form-control" value="{{$studentData->school_year}}">
                    </div>
                    <div class="col-md-3">
                        <label for="school_id">School ID No.:</label>
                        <input type="text" name="school_id" class="form-control" value={{$studentData->school_id}}>
                    </div>
                    <div class="col-md-3">
                        <label for="fname">Course</label>
                        <select class="form-control" name="course">
                            <option value="{{$studentData->course}}"> {{$studentData->course}} </option>
                            <option value="Bachelor Of Science In Information Technology">Bachelor Of Science In Information Technology</option>
                            <option value="Bachelor Of Science In Agribusiness">Bachelor Of Science In Agribusiness</option>
                            <option value="Bachelor Of Science In Agriculture">Bachelor Of Science In Agriculture</option>
                            <option value="Bachelor Of Science In Animal Science">Bachelor Of Science In Animal Science</option>
                            <option value="Bachelor Of Science In Forestry">Bachelor Of Science In Forestry</option>
                            <option value="Bachelor Of Science In Statistic">Bachelor Of Science In Statistic</option>
                            <option value="Bachelor Of Science In Agricultural and Biosystems Engineering">Bachelor Of Science In Agricultural and Biosystems Engineering</option>
                            <option value="Bachelor Of Science In Mechanical Engineering">Bachelor Of Science In Mechanical Engineering</option>
                            <option value="Bachelor Of Science In Elictrical Engineering">Bachelor Of Science In Elictrical Engineering</option>
                            <option value="Bachelor Of Science In Forestry">Bachelor Of Science In Forestry</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="contact_no">Telephone No/Cp No:</label>
                        <input type="text" name="contact_no" class="form-control" value={{$studentData->contact_no}}>
                    </div>
                </div>
            </div>
        
            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-3">
                        <label for="lname">Last Name:</label>
                        <input type="text" name="lname" class="form-control" value={{$studentData->lname}}>
                    </div>
                    <div class="col-md-3">
                        <label for="fname">First Name:</label>
                        <input type="text" name="fname" class="form-control" value={{$studentData->fname}}>
                    </div>
                    <div class="col-md-3">
                        <label for="mname">Middle Name:</label>
                        <input type="text" name="mname" class="form-control" value={{$studentData->mname}}>
                    </div>
                    <div class="col-md-3">
                        <label for="ext">Extension Name:</label>
                        <input type="text" name="ext" class="form-control" value={{$studentData->ext}}>
                    </div>
                </div>
            </div>
        
            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-3">
                        <label for="gender">Gender:</label> 
                        <select class="form-control" name="gender">
                            <option selected> {{$studentData->gender}} </option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    
                    <input type="hidden" name="province" id="province_name" value="{{$studentData->province}}">
                    <input type="hidden" name="city" id="city_name" value="{{$studentData->city}}">
                    <input type="hidden" name="brgy" id="barangay_name" value="{{$studentData->brgy}}">
                    <div class="col-md-3">
                        <label for="province">Province:</label>
                        <select id="province" class="form-control">
                            <option selected>{{$studentData->province}}</option>
                        </select>
                    </div>
                    
                    <div class="col-md-3">
                        <label for="city">City/Municipality:</label>
                        <select id="city" class="form-control">
                            <option value="{{$studentData->city}}" selected>{{$studentData->city}}</option>
                        </select>
                    </div>
                    
                    <div class="col-md-3">
                        <label for="brgy">Street/Brgy:</label>
                        <select id="barangay" class="form-control">
                            <option value="{{$studentData->brgy}}" selected>{{$studentData->brgy}}</option>
                        </select>
                    </div>
                    
                </div>
            </div>
        
        
            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-3">
                        <label for="hei_name">Hei Name:</label> 
                        <select class="form-control" name="hei_name">
                            <option selected> {{$studentData->hei_name}} </option>
                            <option value="Central Philippines State University">Central Philippines State University</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="institutional_code">Institution Code:</label>
                        <input type="text" name="institutional_code" class="form-control" value={{$studentData->institutional_code}}>
                    </div>
                    <div class="col-md-3">
                        <label for="types_of_heis">Types of Hies:</label>
                        <select class="form-control" name="types_of_heis">
                            <option selected> {{$studentData->types_of_heis}} </option>
                            <option value="SUC State University">SUC State University</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="program_level_code">Program Level Code:</label>
                        <select class="form-control" name="program_level_code">
                            <option selected> {{$studentData->program_level_code}} </option>
                            <option value="">N/A</option>
                            <option value="Level 1">Level 1</option>
                            <option value="Level 2">Level 2</option>
                            <option value="Level 3">Level 3</option>
                        </select>
                    </div>
                </div>
            </div>
        
            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="fas fa-save"></i> Save
                        </button>
        
                        {{-- <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fas fa-refresh"></i> Cancel
                        </button> --}}
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection