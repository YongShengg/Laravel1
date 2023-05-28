<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Admin;
use App\Models\UserOrder;
use App\Models\MultiVehicle;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;

class AdminHome extends Controller
{
    function adminDashboard(){

        return view('admin/adminDashboard');
    }

    function adminOrderQuote(){

        $userOrderData = UserOrder::join('users', 'users.id', 'users_order.user_id')
        ->where('users_order.progress_status', 0)
        ->orderBy('users_order.created_at', 'desc')
        ->paginate(10);
        
        return view('admin/adminOrderQuote', ['data'=> $userOrderData]);
 
    }

    function adminOrderDetail($loadId){
        $order = UserOrder::where('load_id', $loadId)->first();

        return view('admin/adminOrderDetail', ['order' => $order]);
    }
}
