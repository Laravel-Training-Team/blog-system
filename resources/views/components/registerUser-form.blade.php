<div class="authincation h-100">
    <div class="container-fluid h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-6">
                <div class="authincation-content">
                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <div class="auth-form">
                                <h4 class="text-center mb-4">Sign up your account</h4>
                                <form action="/register" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label><strong>First Name</strong></label>
                                        <input name="first_name" id="first_name" type="text" class="form-control" placeholder="Hassan">
                                        @error('first_name')
                                        <p class="custom-message">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Last Name</strong></label>
                                        <input name="last_name" id="last_name" type="text" class="form-control" placeholder="Serdar">
                                        @error('last_name')
                                        <p class="custom-message">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Username</strong></label>
                                        <input name="username" id="username" type="text" class="form-control" placeholder="username">
                                        @error('username')
                                        <p class="custom-message">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Email</strong></label>
                                        <input name="email" id="email" type="email" class="form-control" placeholder="hello@example.com">
                                        @error('email')
                                        <p class="custom-message">{{ $message }}</p>
                                        @enderror

                                    </div>
                                    <div class="form-group">
                                        <label><strong>Password</strong></label>
                                        <input name="password" id="password" type="password" class="form-control">
                                        @error('password')
                                        <p class="custom-message">{{ $message }}</p>
                                        @enderror

                                    </div>
                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-primary btn-block">Sign me up</button>
                                    </div>
                                </form>
                                <div class="new-account mt-3">
                                    <p>Already have an account? <a class="text-primary" href="{{route ('userlogin')}}">Sign in</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
