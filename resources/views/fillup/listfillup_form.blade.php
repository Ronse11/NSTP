@extends('layout.master_layout')

@section('body')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 d-flex">
                    <h1 class="m-0">Fill up</h1>
                </div>
                <div class="col-sm-6">
                    <h1>{{ $category->category_name }}</h1>
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
                            <a href="{{ route('fillupstudentCategoryRead') }}" class="btn btn-primary">
                                <i class="nav-icon fas fa-arrow-left"></i>
                            </a>
                        </div>
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success" style="font-size: 10pt;">
                                    <i class="fas fa-check"></i> {{ session('success') }}
                                </div>
                            @endif

                            @if(session('error'))
                                <div class="alert alert-danger" style="font-size: 10pt;">
                                    <i class="fas fa-exclamatory-circle"></i> {{ session('error') }}
                                </div>
                            @endif
                            <form method="post" action="{{ route('appliedStudent') }}">
                                @csrf

                                <input type="hidden" name="category" value="{{ $category->id }}">
                                {{-- <input type="hidden" name="id" value="{{ Auth::guard('students')->user()->id }}"> --}}

                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-3">
                                            <label for="serial_number">NSTP Serial Number:</label>
                                            <input type="text" name="serial_number" class="form-control" placeholder="Auto Generated" disabled>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="school_year">School Year:</label>
                                            <input type="text" name="school_year" class="form-control" placeholder="Example 2024-2025">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="school_id">School ID No.:</label>
                                            <input type="text" name="school_id" class="form-control" placeholder="Enter School ID Number">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="fname">Course</label>
                                            <select class="form-control" name="course">
                                                <option disabled selected> --Select-- </option>
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
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-3">
                                            <label for="lname">Last Name:</label>
                                            <input type="text" name="lname" class="form-control" placeholder="Enter Last name">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="fname">First Name:</label>
                                            <input type="text" name="fname" class="form-control" placeholder="Enter First name">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="mname">Middle Name:</label>
                                            <input type="text" name="mname" class="form-control" placeholder="Enter Middle name">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="ext">Extension Name:</label>
                                            <input type="text" name="ext" class="form-control" placeholder="Enter Extension name">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-3">
                                            <label for="gender">Gender:</label> 
                                            <select class="form-control" name="gender">
                                                <option disabled selected> --Select-- </option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="brgy">Street/Brgy:</label>
                                            <input type="text" name="brgy" class="form-control" placeholder="Enter Street/Brgy ">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="city">City/Municipality:</label>
                                            <input type="text" name="city" class="form-control" placeholder="Enter City/Municipality ">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="province">Province:</label>
                                            <input type="text" name="province" class="form-control" placeholder="Enter Province ">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-3">
                                            <label for="hei_name">Hei Name:</label> 
                                            <select class="form-control" name="hei_name">
                                                <option disabled selected> --Select-- </option>
                                                <option value="Male">Central Philippines State University</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="institutional_code">Institution Code:</label>
                                            <input type="text" name="institutional_code" class="form-control" placeholder="Enter Institution Code ">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="types_of_heis">Types of Hies:</label>
                                            <select class="form-control" name="types_of_heis">
                                                <option disabled selected> --Select-- </option>
                                                <option value="SUC State University">SUC State University</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="program_level_code">Program Level Code:</label>
                                            <select class="form-control" name="program_level_code">
                                                <option disabled selected> --Select-- </option>
                                                <option value="Level 1">N/A</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-3">
                                            <label for="contact_no">Telephone No/Cp No:</label>
                                            <input type="text" name="contact_no" class="form-control" placeholder="01234567890">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-row">
                                        <div class="col-md-3">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <i class="fas fa-save"></i> Save
                                            </button>

                                            <button type="reset" class="btn btn-danger btn-sm">
                                                <i class="fas fa-refresh"></i> Clear
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection