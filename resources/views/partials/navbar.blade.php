<style>
    .nav-bar {
        display: flex;
        gap: 1rem;
        margin-bottom: 1.5rem;
        background: #f1f5f9;
        padding: 0.7rem 1.2rem;
        border-radius: 8px;
        align-items: center;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    }
    .nav-link {
        color: #2563eb;
        background: #fff;
        border: 1px solid #2563eb;
        border-radius: 6px;
        padding: 0.35rem 1.1rem;
        font-size: 1rem;
        font-weight: 500;
        text-decoration: none;
        transition: background 0.18s, color 0.18s;
    }
    .nav-link:hover, .nav-link.active {
        background: #2563eb;
        color: #fff;
    }
    .nav-link-back {
        color: #fff;
        background: #e11d48;
        border: none;
        border-radius: 6px;
        padding: 0.35rem 1.1rem;
        font-size: 1rem;
        font-weight: 500;
        text-decoration: none;
        margin-left: auto;
        transition: background 0.18s;
    }
    .nav-link-back:hover {
        background: #b91c1c;
    }
</style>
<div class="nav-bar">

    <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
    <a href="{{ route('medicines.index') }}" class="nav-link">Medicines</a>
    <a href="{{ route('customers.index') }}" class="nav-link">Customers</a>
    <a href="{{ route('sales.index') }}" class="nav-link">Sales</a>
    @if(Auth::user()->role === 'admin')
    <a href="{{ route('suppliers.index') }}" class="nav-link">Suppliers</a>
    <a href="{{ route('purchases.index') }}" class="nav-link">Purchases</a>
    <a href="{{ route('users.index') }}" class="nav-link">Users</a>    
    @endif
    <a href="javascript:history.back()" class="nav-link-back">Back</a>

</div>
