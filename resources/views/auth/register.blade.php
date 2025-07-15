<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Pharmacy Management System</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f4f8fb;
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
            align-items: stretch;
        }
        .auth-image {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f5f5f5;
            min-width: 300px;
            height: 100%;
        }
        .auth-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            padding: 0;
        }
        .auth-container {
            width: 100%;
            max-width: 350px;
            margin: 0;
            padding: 0;
        }
        .system-title {
            text-align: center;
            margin-bottom: 16px;
            font-size: 1.5rem;
            color: #2563eb;
            font-weight: bold;
        }
        .auth-form h2 {
            text-align: center;
            margin-bottom: 16px;
            color: #2563eb;
        }
        .form-group {
            margin-bottom: 14px;
        }
        .form-group label {
            display: block;
            margin-bottom: 4px;
            color: #374151;
            font-weight: 500;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 1rem;
            background: #f9fafb;
        }
        .btn-primary {
            width: 100%;
            padding: 10px;
            background: #2563eb;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            margin-top: 8px;
            transition: background 0.2s;
        }
        .btn-primary:hover {
            background: #1746a2;
        }
        .error-label {
            background: #fee2e2;
            color: #b91c1c;
            padding: 8px;
            border-radius: 6px;
            margin-bottom: 10px;
            text-align: center;
        }
        .form-link-center {
            text-align: center;
            margin-top: 10px;
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
                height: auto;
            }
            .auth-content {
                height: auto;
            }
        }
    </style>
</head>
<body>
<div class="center-container">
    <div class="login-flex">
        <div class="auth-image">
            <img src="{{ asset('img/register.jpg') }}" alt="Register" style="max-width: 100%; height: auto;" />
        </div>
        <div class="auth-content">
            <div class="auth-container">
                <form method="POST" action="{{ route('register') }}" class="auth-form">
                    @csrf
                    <h2>Register</h2>
                    @if($errors->any())
                        <div class="error-label">
                            @foreach($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" required>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" id="role" required>
                            <option value="admin">Admin</option>
                            <option value="pharmacist">Pharmacist</option>
                        </select>
                    </div>
                    <button type="submit" class="btn-primary">Register</button>
                </form>
                <div class="form-link-center">
                    Already have an account? <a href="{{ route('login') }}">Login here</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
