<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Dashboard Login</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="loginasset\assets\images\favicon.png">
    <link href="{{ asset('auth-assets\css\style.css') }}" rel="stylesheet">
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <form action="{{route('dashboard.login')}}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label><strong>Email</strong></label>
                                            <input name='email' id='email' type="email" class="form-control" placeholder="hello@example.com" required>
                                            @error('email')
                                            <p class="custom-message">{{ $message }}</p>
                                            @enderror
    
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <input name='password' id='password' type="password" class="form-control" required>
                                            @error('password')
                                            <p class="custom-message">{{ $message }}</p>
                                            @enderror
    
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                                <div class="form-check ml-2">
                                                    <input class="form-check-input" type="checkbox" id="basic_checkbox_1">
                                                    <label class="form-check-label" for="basic_checkbox_1">Remember me</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <a href="{{route('dashforgetpassword')}}">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Sign me in</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary" href="{{route('writer.register')}}">Sign up</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Required vendors -->
    <script src="{{ asset('auth-assets\vendor\global\global.min.js') }}"></script>
    <script src="{{ asset('auth-assets\js\quixnav-init.js') }}"></script>
    <script src="{{ asset('auth-assets\js\custom.min.js') }}"></script>

</body>

</html>
    