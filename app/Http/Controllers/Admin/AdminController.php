<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $totalRevenue = Order::sum('total_amount');  // Calcul du chiffre d'affaires total
        $totalOrders = Order::count();  // Nombre total de commandes
        $productsInStock = Product::sum('stock');  // Nombre total de produits en stock

        return view('admin.dashboard', compact('totalRevenue', 'totalOrders', 'productsInStock'));
    }
}
