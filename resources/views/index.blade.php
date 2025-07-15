<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Pharmacy Management System</title>
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
            padding: 100px 30px;
        }
        .auth-container {
            width: 100%;
            max-width: 350px;
            margin: 20px;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
            text-align: center;
        }
        .system-title {
            margin-bottom: 18px;
            font-size: 1.5rem;
            color: #2563eb;
            font-weight: bold;
        }
        .welcome-desc {
            color: #64748b;
            font-size: 1.1rem;
            margin-bottom: 32px;
        }
        .welcome-btns {
            display: flex;
            flex-direction: column;
            gap: 18px;
            width: 100%;
            align-items: center;
        }
        .welcome-btn {
            padding: 12px 0;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            background: #2563eb;
            color: #fff;
            transition: background 0.2s, box-shadow 0.2s;
            box-shadow: 0 2px 8px rgba(79,140,255,0.08);
            text-decoration: none;
            width: 100%;
            text-align: center;
        }
        .welcome-btn:last-child {
            background: #4f8cff;
        }
        .welcome-btn:hover {
            background: #1746a2;
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
            .auth-container {
                height: auto;
            }
        }
    </style>
</head>
<body>
<div class="center-container">
    <div class="login-flex">
        <div class="auth-image">
            <img src="{{ asset('img/login.jpg') }}" alt="Welcome" style="max-width: 100%; height: auto;" />
        </div>
        <div class="auth-content">
            <div class="auth-container">
                <div class="system-title">Pharmacy Management System</div>
                <div class="welcome-desc">Welcome! Please login or register to continue.</div>
                <div class="welcome-btns">
                    <a href="{{ route('login') }}" class="welcome-btn">Login</a>
                    <a href="{{ route('register') }}" class="welcome-btn">Register</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
