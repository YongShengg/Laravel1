<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserOrder;
use App\Models\MultiVehicle;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Guid\Guid;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;

class UserHome extends Controller
{
    function userHome(){

        return view('user/userHome');
    }

    function userProfile(){
        
        return view('user/userProfile');
    }

    function userProfilePost(Request $request, $id){
        
        $user = User::find($id);
        $data = [];
        if ($request->has('phone') && !empty($request->phone)) {
            $data['phone'] = $request->phone;
        }

        if ($request->has('name') && !empty($request->name)) {
            $data['name'] = $request->name;
        }

        $validatedData = Validator::make($data, User::$rules)->validate();

        $user = auth()->user();
        $user->fill($validatedData);
        $user->update($data);

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    function userBooking(){
        
        return view('user/userBooking');
    }

    function userBookingPost(Request $request, $id){

        $user = User::find($id);
        $data = $request->validate([
            'origin_address' => 'required',
            'origin_city' => 'required',
            'origin_state' => 'required',
            'origin_zipcode' => 'required',
            'origin_phone' => 'required',
            'destination_address' => 'required',
            'destination_city' => 'required',
            'destination_state' => 'required',
            'destination_zipcode' => 'required',
            'destination_phone' => 'required',
            'vehicles.*.make' => 'required',
            'vehicles.*.model' => 'required',
            'vehicles.*.type' => 'required',
            'vehicles.*.make_year' => 'required',
            'vehicles.*.plate' => 'required',
            'customer_pickup_time' => 'required',
            'customer_instruction' => 'required',
        ]);

        // Separate the vehicles data from the main data
        $vehiclesData = $data['vehicles'];
        unset($data['vehicles']);

        // var_dump($vehiclesData);
        // exit();

        foreach ($vehiclesData as $vehicle) {
            $loadId = Uuid::uuid4()->toString(); // Generate a unique load ID for each vehicle order

            $vehicleData['origin_address'] = $data['origin_address'];
            $vehicleData['destination_address'] = $data['destination_address'];
            // var_dump($vehiclesData);
            // exit();
            $vehicleData = array_merge($vehicle, $data);
            // var_dump($vehiclesData);
            // exit();
            $vehicleData['load_id'] = $loadId;
            $vehicleData['user_id'] = $user->id;

            $vehicleData['vehicle_maker'] = $vehicle['make'];
            $vehicleData['vehicle_model'] = $vehicle['model'];
            $vehicleData['vehicle_type'] = $vehicle['type'];
            $vehicleData['vehicle_year'] = $vehicle['make_year'];
            $vehicleData['vehicle_plate'] = $vehicle['plate'];
            $vehicleData['progress_status'] = 0;

            // Save the vehicle data to the database
            UserOrder::create($vehicleData);

        }

        return redirect()->back()->with('success', 'successfully.');
        
    }

    private function generateLoadId()
    {
        $uuid = Uuid::uuid4();
        return $uuid->toString();
    }

    function userTracking(){

        $user = auth()->user();
        
        $userOrderData = UserOrder::where('user_id', $user->id)
        ->orderBy('created_at', 'desc')->paginate(10);
        
        return view('user/userTracking', ['data'=> $userOrderData]);
        
    }

    function userHistory(){
        $user = auth()->user();
        
        $userOrderData = UserOrder::where('user_id', $user->id)
        ->orderBy('created_at', 'desc')->paginate(10);
        return view('user/userHistory', ['data'=> $userOrderData]);
    }

    function userPayment(){

        return view('user/userPayment');
    }
    
    // function userBookingPost(Request $request, $id){
        
    //     // Get the authenticated user ID
    //     $userId = User::find($id);
    //     // var_dump($userId);
    //     // exit();
    //     // Create a new CarHauling instance
    //     $carHauling = new UserOrder();
    //     // Set other attributes of the CarHauling if needed
    //     $carHauling->user_id = $userId;
    //     $carHauling->origin_address = $request->input('origin_address');
    //     $carHauling->origin_city = $request->input('origin_city');
    //     $carHauling->origin_state = $request->input('origin_state');
    //     $carHauling->origin_zipcode = $request->input('origin_zipcode');
    //     $carHauling->destination_address = $request->input('destination_address');
    //     $carHauling->destination_city = $request->input('destination_city');
    //     $carHauling->destination_state = $request->input('destination_state');
    //     $carHauling->destination_zipcode = $request->input('destination_zipcode');
    //     $carHauling->save();

    //     // Retrieve the vehicles data from the request
    //     $vehiclesData = $request->input('vehicles');

    //     // Loop through each vehicle data and create a Vehicle instance
    //     foreach ($vehiclesData as $vehicleData) {
    //         $vehicle = new MultiVehicle();
    //         // Set attributes of the Vehicle
    //         $vehicle->make = $vehicleData['vehicle_make'];
    //         $vehicle->model = $vehicleData['vehicle_model'];
    //         $vehicle->make_year = $vehicleData['vehicle_year'];
    //         $vehicle->plate = $vehicleData['vehicle_plate'];
            
    //         // Generate a unique load_id
    //         $loadId = Str::uuid()->toString();
    //         $vehicle->load_id = $loadId;

    //         // Associate the Vehicle with the CarHauling
    //         $carHauling->vehicles()->save($vehicle);
    //     }

    //     // Redirect or perform any other actions after saving

    //     // Return a response or redirect
    //     return redirect()->back()->with('success', 'Car hauling information and vehicles have been saved.');
        
    // }
    
}
