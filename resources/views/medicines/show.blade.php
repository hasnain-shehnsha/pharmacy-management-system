<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medicine Details</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1.5rem;
        }
        th, td {
            padding: 10px 8px;
            border-bottom: 1px solid #e0e7ef;
            text-align: left;
        }
        th {
            background: #2563eb;
            color: #fff;
            width: 40%;
        }
        .btn {
            background: #2563eb;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 0.5rem 1.2rem;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            margin-right: 0.5rem;
            transition: background 0.2s;
        }
        .btn:hover {
            background: #1746a2;
        }
        .edit-btn {
            background: #22c55e;
        }
        .edit-btn:hover {
            background: #15803d;
        }
        a {
            color: #2563eb;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
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
@include('partials.navbar')
<div class="container">
    <h1>Medicine Details</h1>
    <table>
        <tr><th>ID</th><td>{{ $medicine->id }}</td></tr>
        <tr><th>Name</th><td>{{ $medicine->name }}</td></tr>
        <tr><th>Category</th><td>{{ $medicine->category }}</td></tr>
        <tr><th>Company Name</th><td>{{ $medicine->company_name }}</td></tr>
        <tr><th>Batch No</th><td>{{ $medicine->batch_no }}</td></tr>
        <tr><th>Quantity</th><td>{{ $medicine->quantity }}</td></tr>
        <tr><th>Price</th><td>{{ $medicine->price }}</td></tr>
        <tr><th>Expiry Date</th><td>{{ $medicine->expiry_date }}</td></tr>
        <tr><th>Description</th><td>{{ $medicine->description }}</td></tr>
    </table>
    @if(auth()->user()->role === 'admin')
    <form action="{{ route('medicines.edit') }}" method="POST" style="display:inline;">
        @csrf
        <input type="hidden" name="id" value="{{ $medicine->id }}">
        <button type="submit" class="btn edit-btn">Edit</button>
    </form>
    @endif
    <a href="{{ route('medicines.index') }}" class="btn">Back to List</a>
</div>
</body>
</html>

