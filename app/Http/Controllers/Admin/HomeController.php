<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): Application|Factory|View
    {
        $categoryCount = Category::count();
        $productCount = Product::count();
        $userCount = User::count();
        return view('admin.home', compact('productCount', 'userCount', 'categoryCount'));
    }
}
