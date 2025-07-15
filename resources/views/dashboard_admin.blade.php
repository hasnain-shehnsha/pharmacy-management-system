<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            background: #f4f8fb;
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
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
        .dashboard-container {
            max-width: 900px;
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
        .stats-cards {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            margin-bottom: 2rem;
            justify-content: center;
        }
        .stat-card {
            background: #f1f5f9;
            border-radius: 10px;
            padding: 1.2rem 2rem;
            min-width: 160px;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }
        .stat-title {
            color: #64748b;
            font-size: 1rem;
            margin-bottom: 0.5rem;
        }
        .stat-value {
            color: #2563eb;
            font-size: 1.5rem;
            font-weight: bold;
        }
        .low-stock .stat-value {
            color: #e11d48;
        }
        .links-cards {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            justify-content: center;
        }
        .link-card {
            background: #2563eb;
            color: #fff;
            border-radius: 8px;
            padding: 0.8rem 1.8rem;
            font-size: 1.1rem;
            font-weight: 500;
            text-decoration: none;
            transition: background 0.2s;
        }
        .link-card:hover {
            background: #1746a2;
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

<div class="dashboard-container">
    <h1>Welcome, {{ Auth::user()->name }}!</h1>
    <div class="stats-cards">
        <div class="stat-card">
            <div class="stat-title"> Total Medicines</div>
            <div class="stat-value">{{ $totalMedicines ?? 0 }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-title"> Total Suppliers</div>
            <div class="stat-value">{{ $totalSuppliers ?? 0 }}</div>
        </div>
         <div class="stat-card">
            <div class="stat-title"> Today's Revenue</div>
            <div class="stat-value">{{ $todaysRevenue ?? '0' }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-title"> Total Users</div>
            <div class="stat-value">{{ $totalUsers ?? 0 }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-title"> Total Sales</div>
            <div class="stat-value">{{ $totalSales ?? 0 }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-title"> Total Customers</div>
            <div class="stat-value">{{ $totalCustomers ?? 0 }}</div>
        </div>
        <div class="stat-card low-stock">
            <div class="stat-title"> Low Stock Alerts</div>
            <div class="stat-value">{{ $lowStock ?? 0 }}</div>
        </div>
    </div>
    <div class="links-cards">
        <a href="{{ route('medicines.index') }}" class="link-card">Medicines</a>
        <a href="{{ route('suppliers.index') }}" class="link-card">Suppliers</a>
        <a href="{{ route('users.index') }}" class="link-card">Users</a>
        <a href="{{ route('customers.index') }}" class="link-card">Customers</a>
        <a href="{{ route('sales.index') }}" class="link-card">Sales</a>
        <a href="{{ route('purchases.index') }}" class="link-card">Purchases</a>
    </div>
</div>
</body>
</html>
