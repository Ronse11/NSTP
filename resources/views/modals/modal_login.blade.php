<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-title text-center">
                    <h1>Login</h1>
                </div>
                <div class="d-flex flex-column text-center">
                    <form method="post" action="{{ route('postLogin') }}">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" class="form-control form-control-lg" id="email1" placeholder="Your email address..." style="height: 40px">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control form-control-lg" id="password1" placeholder="Your password..." style="height: 40px">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-info btn-lg btn-block" style="height: 40px">Login</button>
                    </form>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
            </div>
        </div>
    </div>
</div>
