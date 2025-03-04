<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Dashboard Register</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="loginasset/assets/images/favicon.png">
    <link href="{{ asset('auth-assets/css/style.css') }}" rel="stylesheet">
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
                                    <h4 class="text-center mb-4">Sign up your account</h4>

                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form action="{{ route('writer.register') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label><strong>First Name</strong></label>
                                            <input name="first_name" id="first_name" type="text" class="form-control" placeholder="First Name" value="{{ old('first_name') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Last Name</strong></label>
                                            <input name="last_name" id="last_name" type="text" class="form-control" placeholder="Last Name" value="{{ old('last_name') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Username</strong></label>
                                            <input name="username" id="username" type="text" class="form-control" placeholder="Username" value="{{ old('username') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Email</strong></label>
                                            <input name="email" id="email" type="email" class="form-control" placeholder="hello@example.com" value="{{ old('email') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <input name="password" id="password" type="password" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Date of Birth</strong></label>
                                            <input name="date_of_birth" id="date_of_birth" type="date" class="form-control" value="{{ old('date_of_birth') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Country</strong></label>
                                            <input name="country" id="country" type="text" class="form-control" placeholder="Country" value="{{ old('country') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Address</strong></label>
                                            <input name="address" id="address" type="text" class="form-control" placeholder="Address" value="{{ old('address') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Bio</strong></label>
                                            <textarea name="bio" id="bio" class="form-control" placeholder="[optional]: Write a short bio...">{{ old('bio') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>About Me</strong></label>
                                            <textarea name="about_me" id="about_me" class="form-control" placeholder="[optional]: Tell us about yourself...">{{ old('about_me') }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Profile Picture</strong></label>
                                            <input name="profile_picture" id="profile_picture" type="file" class="form-control" accept="image/*" required>
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Background Picture</strong></label>
                                            <input name="background_picture" id="background_picture" type="file" class="form-control" accept="image/*" required>
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block">Sign me up</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Already have an account? <a class="text-primary" href="{{ route('dashboard.login') }}">Sign in</a></p>
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
    <script src="{{ asset('auth-assets/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('auth-assets/js/quixnav-init.js') }}"></script>
    <script src="{{ asset('auth-assets/js/custom.min.js') }}"></script>
</body>

</html>