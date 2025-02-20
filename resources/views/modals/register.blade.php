<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-title text-center">
                    <h1>Register</h1>
                </div>
                <div class="d-flex flex-column text-center">
                    <form method="post" action="{{ route('studentRegister') }}">
                        @csrf

                        <div class="form-group">
                            <label for="fname"></label>
                            <input type="text" name="fname" class="form-control form-control-lg" id="fname" placeholder="First Name" style="height: 40px">
                        </div>
                        <div class="form-group">
                            <label for="lname"></label>
                            <input type="text" name="lname" class="form-control form-control-lg" id="lname" placeholder="Last Name" style="height: 40px">
                        </div>
                        <div class="form-group">
                            <label for="email1"></label>
                            <input type="email" name="email1" class="form-control form-control-lg" id="email1" placeholder="Your email address" style="height: 40px">
                        </div>
                        <div class="form-group">
                            <label for="password1"></label>
                            <input type="password" name="password1" class="form-control form-control-lg" id="password1" placeholder="Your password" style="height: 40px">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-info btn-lg btn-block" style="height: 40px">Submit</button>
                    </form>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
            </div>
        </div>
    </div>
</div>
