<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #00CDBC;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .logo {
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 100px;
        }

        .header {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .content {
            font-size: 16px;
            color: #555;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            margin-bottom: 20px;
            background-color: #00cdbc;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .btn:hover {
            background-color: #00b3a5;
        }

        .footer {
            font-size: 12px;
            color: #aaa;
            margin-top: 30px;
        }

        .footer a {
            color: #1d72b8;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo">
            <img src="https://i.imgur.com/V0jMZol.jpeg" alt="Deliveboo Logo">
        </div>
        <div class="header">
            Hello!
        </div>
        <div class="content">
            You are receiving this email because we received a password reset request for your account.
        </div>
        <a href="{{ $url }}" class="btn">Reset Password</a>
        <div class="content">
            This password reset link will expire in 60 minutes.<br>
            If you did not request a password reset, no further action is required.
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} Deliveboo. All rights reserved.<br>
            If you're having trouble clicking the "Reset Password" button, copy and paste the URL below into your web
            browser:<br>
            <a href="{{ $url }}">{{ $url }}</a>
        </div>
    </div>
</body>

</html>
