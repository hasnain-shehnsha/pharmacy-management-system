<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacists</title>
    <style>
        body {
            background: #f4f8fb;
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
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
            margin-bottom: 1rem;
            display: inline-block;
            transition: background 0.2s;
        }
        .btn:hover {
            background: #1746a2;
        }
        .alert {
            background: #fee2e2;
            color: #b91c1c;
            border-radius: 6px;
            padding: 0.7rem 1rem;
            margin-bottom: 1rem;
        }
        /* Remove table-specific custom styles that conflict with DataTables */
        table { width: 100%; border-collapse: collapse; margin-bottom: 1.5rem; }
        th, td { padding: 10px 8px; text-align: left; }
        th { background: #2563eb; color: #fff; }
        /* Remove border-bottom, custom hover, and manual pagination styles */
        .actions {
            display: flex;
            gap: 0.5rem;
        }
        .show-btn {
            background: #22c55e;
        }
        .show-btn:hover {
            background: #15803d;
        }
        .delete-btn {
            background: #e11d48;
        }
        .delete-btn:hover {
            background: #b91c1c;
        }
        .edit-btn {
            background: #f59e42;
        }
        .edit-btn:hover {
            background: #b45309;
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
    <h1>Pharmacists</h1>
    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif
    <a href="{{ route('users.create') }}" class="btn">Add New Pharmacist</a>
    @include('partials.datatable')
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td class="actions">
                    <form action="{{ route('users.show') }}" method="POST" style="display:inline;">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <button type="submit" class="btn show-btn">Show</button>
                    </form>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn edit-btn">Edit</a>
                    <form action="{{ route('users.destroy') }}" method="POST" style="display:inline;">
                        @csrf
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <button type="submit" class="btn delete-btn" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" style="text-align:center;">No user found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
