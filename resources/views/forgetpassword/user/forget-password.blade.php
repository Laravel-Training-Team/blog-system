<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Rest Password</title>

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

    <!-- Styles -->
    <link href="{{ asset('auth-assets\assets\css\lib\font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('auth-assets\assets\css\lib\themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('auth-assets\assets\css\lib\bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('auth-assets\assets\css\lib\helper.css') }}" rel="stylesheet">
    <link href="{{ asset('auth-assets\assets\css\style.css') }}" rel="stylesheet">
</head>

<body class="bg-primary">

    <div class="unix-login">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="index.html"><span>Focus</span></a>
                        </div>
                        <div class="login-form">
                            <h4>Reset Password</h4>
                            @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('forgetpassword') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input name='email' id='email' type="email" class="form-control" placeholder="Email">
                                </div>
                                <button type="submit" class="btn btn-primary btn-flat m-b-15">Submit</button>
                                <div class="register-link text-center">
                                    <p>Back to <a href="/"> Home</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>