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
        
        $order = UserOrder::join('users', 'users.id', 'users_order.user_id')
        ->where('load_id', $loadId)->first();

        return view('admin/adminOrderDetail', ['order' => $order]);
    }

    function adminOrderDetailPost(Request $request, $loadId){

        $data = $request->validate([
            'price_quote' => 'required'

        ]);
        $vehicleData = [
            'price_quote' => $data['price_quote'],
            'price_quote_status' => 1
        ];

        $userOrder = UserOrder::where('load_id', $loadId)->first();
        // Save the vehicle data to the database
        $userOrder->update($vehicleData);

        return redirect()->back()->with('success', 'successfully.');
    }

    // public function adminOrderRejectPost(Request $request)
    // {
    //     $orderId = $request->input('orderId');
    //     // var_dump($orderId);
    //     // Perform your logic based on the Order ID

    //     // Example: Retrieve the order from the database
    //     $order = UserOrder::find($orderId);

    //     if (!$order) {
    //         return response()->json(['message' => 'Order not found'], 404);
    //     }

    //     // Example: Update the order status
    //     $order->progress_status = 7;
    //     $order->save();

    //     // Return a response
    //     return response()->json(['message' => 'Order rejected successfully']);
    // }

//     public function adminOrderRejectPost(Request $request)
//     {
//         // var_dump($request);
//         // exit();
//        $orderId = $request->input('orderId');

//         //$orderId = $request()->orderId;
//     //  dd('orderId:', $orderId);
//    // var_dump($orderId);
// //     echo $orderId;
// //    exit(1);
    
//      //echo $orderId;
//         // dd($orderId);
//         //exit(1);
//         // if (!$orderId) {
//         //     return response()->json(['message' => 'Order ID is missing'], 400);
//         // }

//         // Retrieve the order from the database
//         $order = UserOrder::find();
//         // var_dump($order);
//         // exit();
//         // if (!$order) {
//         //     return response()->json(['message' => 'Order not found'], 404);
//         // }
//         // Update the order status to 'Rejected'
//         $order->where('load_id', $orderId)->update(['progress_status' => '7']);
        

//         // Return a success response
//         return response()->json(['message' => 'Order rejected successfully']);
//     }

    function adminOrders(Request $request){

        // Fetch the new orders from the database
        $newOrders = UserOrder::join('users', 'users.id', 'users_order.user_id') // Assuming you have a 'status' column to track the order status
        ->select('users_order.load_id', 'users.name', 'users_order.created_at', 'users_order.progress_status', 'users_order.payment_progress_status', 'users_order.price_quote_status')
        ->whereIn('users_order.progress_status', [0,1,2,3,4,6,7])
        ->orderBy('users_order.created_at', 'desc')
        ->paginate(20);
        // var_dump($newOrders);
        // exit();
        // Transform the orders as needed (e.g., extract required fields)
        $orders = $newOrders->map(function ($order) {
            return [
                'load_id' => $order->load_id,
                'name' => $order->name,
                'progress_status' => $order->progress_status,
                'payment_progress_status' => $order->payment_progress_status,
                'price_quote_status' => $order->price_quote_status,
                'created_at' => $order->created_at->format('Y-m-d H:i:s'),
                
                // Add more fields as needed
            ];
        });
        // var_dump($orders);
        // exit();
        if ($request->expectsJson()) {
            // If the request expects JSON response, return JSON with pagination
            $pagination = [
                'current_page' => $newOrders->currentPage(),
                'last_page' => $newOrders->lastPage(),
                'prev_page' => $newOrders->previousPageUrl(),
                'next_page' => $newOrders->nextPageUrl(),
            ];
    
            return response()->json(['orders' => $orders, 'pagination' => $pagination]);
        } else {
            // If the request expects HTML response, return the view
            return view('admin/adminOrders', ['orders' => $orders]);
        }
        // // Return the orders as JSON response
        // return response()->json(['orders' => $orders]);
        // return view('admin/adminOrders');
    }

    function adminOrderRejectPost(Request $request)
    {
        $orderId = $request->input('orderId');

        if (!$orderId) {
            return response()->json(['message' => 'Order ID is missing'], 400);
        }

        // Retrieve the order from the database
        $order = UserOrder::where('load_id', $orderId)->first();

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        // Update the order status to 'Rejected'
        $order->update(['progress_status' => '7']);

        // Return a success response
        return response()->json(['message' => 'Order rejected successfully']);
    }

}
