<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog container-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="d-flex flex-column text-center p-4">
                    <form method="post" action="{{ route('postLogin') }}">
                        @csrf
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
                                
                                <input type="hidden" name="province" id="province_name">
                                <input type="hidden" name="city" id="city_name">
                                <input type="hidden" name="brgy" id="barangay_name">
                                <div class="col-md-3">
                                    <label for="province">Province:</label>
                                    <select id="province" class="form-control">
                                        <option value="" selected disabled>Select Province</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-3">
                                    <label for="city">City/Municipality:</label>
                                    <select id="city" class="form-control" disabled>
                                        <option value="" selected disabled>Select City/Municipality</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-3">
                                    <label for="brgy">Street/Brgy:</label>
                                    <select id="barangay" class="form-control" disabled>
                                        <option value="" selected disabled>Select Barangay</option>
                                    </select>
                                </div>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
