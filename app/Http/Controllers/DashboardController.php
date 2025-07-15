<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Medicine;
use App\Models\Supplier;
use App\Models\User;
use App\Models\Sale;
use App\Models\Purchase;
use App\Models\Customer;

class DashboardController extends Controller
{
    public function start()
    {
        return view('index');
    }

    public function index()
    {
        $user = Auth::user();
        if ($user->role === 'admin') {
            $totalMedicines = Medicine::count();
            $totalSuppliers = Supplier::count();
            $totalUsers = User::where('role', 'pharmacist')->count();
            $totalSales = Sale::count();
            $todaysRevenue = Sale::whereDate('created_at', now()->toDateString())->sum('total_amount');
            $lowStock = Medicine::where('quantity', '<', 10)->count();
            $totalCustomers = Customer::count();
            return view('dashboard_admin', [
                'totalMedicines' => $totalMedicines,
                'totalSuppliers' => $totalSuppliers,
                'totalUsers' => $totalUsers,
                'todaysRevenue' => $todaysRevenue,
                'totalSales' => $totalSales,
                'lowStock' => $lowStock,
                'totalCustomers' => $totalCustomers,
            ]);
        } else {
            $totalSales = Sale::count();
            $todaysRevenue = Sale::whereDate('created_at', now()->toDateString())->sum('total_amount');
            $medicinesCount = Medicine::count();
            $lowStock = Medicine::where('quantity', '<', 10)->count();
            $totalCustomers = Customer::count();
            return view('dashboard_pharmacist', [
                'totalSales' => $totalSales,
                'todaysRevenue' => $todaysRevenue,
                'medicinesCount' => $medicinesCount,
                'lowStock' => $lowStock,
                'totalCustomers' => $totalCustomers,
            ]);
        }
    }
}
