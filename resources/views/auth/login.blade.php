<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Pharmacy Management System</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            background:rgb(237, 239, 239);
            min-height: 100vh;
        }
        .center-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-flex {
            display: flex;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 16px rgba(0,0,0,0.08);
            overflow: hidden;
            max-width: 900px;
            width: 100%;
        }
        .auth-image {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f5f5f5;
            min-width: 300px;
        }
        .auth-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 30px;
        }
        .auth-container {
            width: 100%;
            max-width: 350px;
        }
        .system-title {
            text-align: center;
            margin-bottom: 20px;
            font-size: 2rem;
            color: #2563eb;
            font-weight: bold;
        }
        .auth-form h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #2563eb;
        }
        .form-group {
            margin-bottom: 18px;
        }
        .form-group label {
            display: block;
            margin-bottom: 6px;
            color: #374151;
            font-weight: 500;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 1rem;
            background: #f9fafb;
        }
        .btn-primary {
            width: 100%;
            padding: 12px;
            background: #2563eb;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            margin-top: 10px;
            transition: background 0.2s;
        }
        .btn-primary:hover {
            background: #1746a2;
        }
        .error-label {
            background: #fee2e2;
            color: #b91c1c;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
            text-align: center;
        }
        .form-link-center {
            text-align: center;
            margin-top: 15px;
            color: #374151;
        }
        .form-link-center a {
            color: #2563eb;
            text-decoration: none;
            font-weight: 500;
        }
        .form-link-center a:hover {
            text-decoration: underline;
        }
        @media (max-width: 700px) {
            .login-flex {
                flex-direction: column;
                box-shadow: none;
                border-radius: 0;
            }
            .auth-image {
                min-height: 180px;
            }
        }
    </style>
</head>
<body>
<div class="center-container">
    <div class="login-flex">
        <div class="auth-image">
            <img src="{{ asset('img/login.jpg') }}" alt="Login" style="max-width: 100%; height: auto;" />
        </div>
        <div class="auth-content">
            <div class="auth-container">
                <div class="system-title">Pharmacy Management System</div>
                <form method="POST" action="{{ route('login') }}" class="auth-form">
                    @csrf
                    <h2>Login</h2>
                    @if($errors->any())
                        <div class="error-label">
                            @foreach($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" required>
                    </div>
                    <button type="submit" class="btn-primary">Login</button>
                </form>
                <div class="form-link-center">
                    Don't have an account? <a href="{{ route('register') }}">Sign up here</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
