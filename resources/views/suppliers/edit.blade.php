<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Supplier</title>
    <style>
        body {
            background: #f4f8fb;
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 500px;
            margin: 40px auto;
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            padding: 2rem;
        }
        h1 {
            text-align: center;
            color: #2563eb;
            margin-bottom: 2rem;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        label {
            font-weight: 500;
            color: #2d3a4b;
        }
        input[type="text"], input[type="email"], textarea {
            padding: 0.6rem;
            border-radius: 8px;
            border: 1px solid #dbe2ea;
            font-size: 1rem;
        }
        .btn {
            background: #2563eb;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 0.7rem 1.2rem;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            margin-top: 1rem;
            transition: background 0.2s;
        }
        .btn:hover {
            background: #1746a2;
        }
        .alert {
            background: #fee2e2;
            color: #b91c1c;
            padding: 10px 18px;
            border-radius: 8px;
            margin-bottom: 1rem;
            text-align: center;
        }
        a {
            color: #2563eb;
            text-decoration: none;
            font-size: 1rem;
            transition: color 0.2s;
        }
        a:hover {
            text-decoration: underline;
            color: #1746a2;
        }
        .header {
            width: 100%;
            background: #2563eb;
            color: #fff;
            padding: 18px 0 18px 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-sizing: border-box;
            padding-left: 40px;
            padding-right: 40px;
        }
        .header-title {
            font-size: 1.5rem;
            font-weight: bold;
            letter-spacing: 1px;
        }
        .header-profile {
            display: flex;
            align-items: center;
            gap: 18px;
        }
        .profile-info {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            margin-right: 10px;
        }
        .profile-name {
            font-size: 1rem;
            font-weight: 500;
            background: #fff;
            color: #2563eb;
            border-radius: 50%;
            width: 38px;
            height: 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.07);
        }
        .profile-role {
            font-size: 0.95rem;
            color: #e0e7ef;
            background: #3b82f6;
            padding: 2px 14px;
            border-radius: 12px;
            margin-top: 2px;
        }
        .logout-btn {
            background: #e11d48;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 0.4rem 1rem;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            margin-left: 1.2rem;
            transition: background 0.2s;
        }
        .logout-btn:hover {
            background: #b91c1c;
        }
    </style>
</head>
<body>
<div class="header">
    <div class="header-title">Pharmacy Management System</div>
    <div class="header-profile">
        <div class="profile-info">
            <div>{{ Auth::user()->name }}</div>
            <div class="profile-role">{{ ucfirst(Auth::user()->role) }}</div>
        </div>
        <div class="profile-name">
            {{ strtoupper(substr(Auth::user()->name,0,1)) }}
        </div>
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>
</div>
    <div class="container">
        <h1>Edit Supplier</h1>
        @if ($errors->any())
            <div class="alert">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif
        <form action="{{ route('suppliers.update') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $supplier->id }}">
            <label>Name *</label>
            <input type="text" name="name" value="{{ $supplier->name }}" required>
            <label>Contact No</label>
            <input type="text" name="contact_no" value="{{ $supplier->contact_no }}">
            <label>Email</label>
            <input type="email" name="email" value="{{ $supplier->email }}">
            <label>Address</label>
            <input type="text" name="address" value="{{ $supplier->address }}">
            <button type="submit" class="btn">Update</button>
        </form>
        <div style="margin-top:1rem; text-align:center;">
            <a href="{{ route('suppliers.index') }}">Back to List</a>
        </div>
    </div>
</body>
</html>
