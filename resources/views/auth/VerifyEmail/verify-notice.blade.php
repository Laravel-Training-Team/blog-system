<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 50px;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }
        h1 {
            color: #333;
        }
        p {
            color: #666;
        }
        .resend-btn {
            display: inline-block;
            background-color: #28a745;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 15px;
            transition: all 0.3s ease-in-out;
            text-decoration: none;
            outline: none;
        }
        .resend-btn:hover {
            background-color: #218838;
            transform: translateY(-2px);
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }

        .resend-btn:active {
            background-color: #1e7e34;
            transform: translateY(0);
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Verify Your Email</h1>
        <p>{{ $message }}</p>
        <p>Please check your email for the verification link.</p>
    </div>
    <form action="{{ route('verification.send') }}" method="POST">
        @csrf
        <button type="submit" class="resend-btn">Resend Verification Email</button>
    </form>
</body>
</html>
