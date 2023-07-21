@extends('admin.adminLayout')
@section('title', 'Home')
@section('content')

<div class="container">
    <div class="col-md-12 col-lg-12">
        <h4 class="mb-3">Order ID {{ $order->load_id }}</h4>
        <div class="row g-3">
            <div class="col-md-6">
                <div class="col-12">
                    <label for="username" class="form-label">Username</label>
                    <div class="input-group has-validation">
                        <input type="text" class="form-control" id="username" placeholder="" value="{{ $order->name }}" disabled>
                    </div>
                    </div>
                    <div class="col-12">
                    <label for="email" class="form-label">Email <span class="text-muted"></span></label>
                    <input type="email" class="form-control" id="email" value="{{ $order->email }}" disabled>
                </div> 
            </div>
        </div>

        <hr class="my-4">
        
        <div class="row g-3">
            <div class="col-md-6">
            <h4 class="mb-3">Pickup Address</h4>

            <div class="col-md-12">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="" name="origin_address" value="{{ $order->origin_address }}" disabled>
                <div class="invalid-feedback">
                Please enter your shipping address.
                </div>
            </div>
            <div class="col-md-12 mt-2">
                <label for="address2" class="form-label">City <span class="text-muted"></span></label>
                <input type="text" class="form-control" name="origin_city" value="{{ $order->origin_city }}" disabled>
            </div>

            <div class="row mt-2">
                <div class="col-md-6 ">
                <label for="state" class="form-label">State</label>
                <input type="text" class="form-control" id="" name="origin_zipcode" placeholder="" value="{{ $order->origin_state }}" disabled>
                
                <div class="invalid-feedback">
                    Please provide a valid state.
                </div>
                </div>
                <div class="col-md-6">
                <label for="zip" class="form-label">Zip</label>
                <input type="text" class="form-control" id="" name="origin_zipcode" placeholder="" value="{{ $order->origin_zipcode }}" disabled>
                <div class="invalid-feedback">
                    Zip code required.
                </div>
                </div>
            </div>

            <div class="col-md-12 mt-3">
                <label for="address2" class="form-label">Pickup Phone Number <span class="text-muted"></span></label>
                <input type="text" class="form-control" name="origin_phone" placeholder="" value="{{ $order->origin_phone }}" disabled>
            </div>
            </div>
            
            <div class="col-md-6 col-lg-6">
            <h4 class="mb-3">Destination Address</h4>
            <div class="col-md-12">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="destination_address" value="{{ $order->destination_address }}" disabled>
                <div class="invalid-feedback">
                Please enter your shipping address.
                </div>
            </div>
            <div class="col-md-12 mt-2">
                <label for="address2" class="form-label">City <span class="text-muted"></span></label>
                <input type="text" class="form-control" id="address2" name="destination_city" value="{{ $order->destination_city }}" disabled>
            </div>

            <div class="row">
                <div class="col-md-6 mt-2">
                <label for="state" class="form-label">State</label>
                <input type="text" class="form-control" id="" name="destination_state" placeholder="" value="{{ $order->destination_state }}" disabled>
                <div class="invalid-feedback">
                    Please provide a valid state.
                </div>
                </div>
                <div class="col-md-6 mt-2">
                <label for="zip" class="form-label">Zip</label>
                <input type="text" class="form-control" name="destination_zipcode" id="zip" value="{{ $order->destination_zipcode }}" disabled>
                <div class="invalid-feedback">
                    Zip code required.
                </div>
                </div>
            </div>

            <div class="col-md-12 mt-3">
                <label for="address2" class="form-label">Destination Phone Number <span class="text-muted"></span></label>
                <input type="text" class="form-control" id="address2" name="destination_phone" value="{{ $order->destination_phone }}" disabled>
            </div>
            </div>

            
        </div>
        
        <hr class="my-4">

        
        <div id="vehicleContainer">
            <h4 class="mb-3">Vehicle Detail</h4>
            <div class="row g-3 vehicleRow">
            <div class="col-12">
                <label class="form-label">Vehicle Maker</label>
                <div class="input-group has-validation">
                <input type="text" class="form-control" id="" name="" value="{{ $order->vehicle_maker }}" disabled>
                </div>
            </div>
            <div class="col-12">
                <label class="form-label">Vehicle Model <span class="text-muted"></span></label>
                <input type="text" class="form-control" id="" name="" value="{{ $order->vehicle_model }}" disabled>
            </div> 
            <div class="col-12">
                <label class="form-label">Vehicle Type <span class="text-muted"></span></label>
                <input type="text" class="form-control" id="" name="" value="{{ $order->vehicle_type }}" disabled>
            </div>
            <div class="col-12">
                <label class="form-label">Make Year <span class="text-muted"></span></label>
                <input type="number" class="form-control datepicker" id="" name="" value="{{ $order->vehicle_year }}" disabled/>
            </div> 
            <div class="col-12">
                <label class="form-label">Number Plate <span class="text-muted"></span></label>
                <input type="text" class="form-control" id="" name="" value="{{ $order->vehicle_plate }}" disabled>
            </div> 
            </div>
            
        </div>
        <hr class="my-4">

        <h4 class="mb-3">Delivery Detail</h4>
        <div class="row g-3">
            <div class="col-12">
                <label class="form-label">Delivery Time</label>
                <div class="input-group has-validation">
                {{-- <input type="text" class="form-control" id="" value=""> --}}
                <span class="input-group-addon input-group-text"><span class="fa fa-calendar"></span></span>
                <input type="text" class="form-control" id="customerpickuptime" name="customer_pickup_time" value="{{ $order->customer_pickup_time }}" disabled/>
                </div>
            </div>
            <div class="col-12">
                <label for="cc-name" class="form-label">Delivery Instructions </label>
                <textarea class="form-control" id="" name="customer_instruction" rows="3" disabled>{{ $order->customer_instruction }}</textarea>
                <small class="text-muted">Provide details such as building description, a nearby landmark, or other navigation Instructions.</small>
                <div class="invalid-feedback">
                Name on card is required
                </div>
            </div>
        </div>

        @if ($order->price_quote_status == 0)
        <hr class="my-4">
        <form id="" action="{{route('adminOrderDetail.post', ['load_id' => $order->load_id ]) }}" method="POST">
        @csrf
        <h4 class="mb-3">Price Quote
            @if ($order->price_quote_status == 0)
            <span class="badge bg-secondary">Not Sent</span>
            @elseif ($order->price_quote_status == 1)
            <span class="badge bg-primary">Sent</span>
            @elseif ($order->price_quote_status == 2)
            <span class="badge bg-warning text-dark">Accepted</span>
            @elseif ($order->price_quote_status == 3)
            <span class="badge bg-danger">Rejected</span>
            @elseif ($order->price_quote_status == 4)
            <span class="badge bg-dark">Expired</span>
            @else
            <span class="badge bg-dark">Unknown Status</span>
            @endif
        </h4>
        
        <div class="row g-3">
            <div class="col-12">
                <label class="form-label">Quote Amount</label>
                <div class="input-group has-validation">
                {{-- <input type="text" class="form-control" id="" value=""> --}}
                <span class="input-group-addon input-group-text"><span class="fa fa-calendar"></span></span>
                <input type="text" class="form-control" id="" name="price_quote"/>
                </div>
            </div>
            <div class="col-12">
                <label for="cc-name" class="form-label">Comment for user </label>
                <textarea class="form-control" id="" name="customer_instruction" rows="3"></textarea>
                <small class="text-muted">Provide details such as building description, a nearby landmark, or other navigation Instructions.</small>
                <div class="invalid-feedback">
                Name on card is required
                </div>
            </div>

            <div class="text-center">
                <button class="w-50 btn btn-primary btn-lg" type="submit">Send Quote</button>
            </div>
        </div>
        @elseif ($order && in_array($order->price_quote_status, [1, 2, 3, 4]))
        <hr class="my-4">
        <form id="" action="{{route('adminOrderDetail.post', ['load_id' => $order->load_id ]) }}" method="POST">
        @csrf
        <h4 class="mb-3">Price Quote
            @if ($order->price_quote_status == 0)
            <span class="badge bg-secondary">Not Sent</span>
            @elseif ($order->price_quote_status == 1)
            <span class="badge bg-primary">Sent</span>
            @elseif ($order->price_quote_status == 2)
            <span class="badge bg-warning text-dark">Accepted</span>
            @elseif ($order->price_quote_status == 3)
            <span class="badge bg-danger">Rejected</span>
            @elseif ($order->price_quote_status == 4)
            <span class="badge bg-dark">Expired</span>
            @else
            <span class="badge bg-dark">Unknown Status</span>
            @endif
        </h4>
        
        <div class="row g-3">
            <div class="col-12">
                <label class="form-label">Quote Amount</label>
                <div class="input-group has-validation">
                {{-- <input type="text" class="form-control" id="" value=""> --}}
                <span class="input-group-addon input-group-text"><span class="fa fa-calendar"></span></span>
                <input type="text" class="form-control" id="" name="price_quote" value="{{ $order->price_quote }}" disabled/>
                </div>
            </div>
            <div class="col-12">
                <label for="cc-name" class="form-label">Comment for user </label>
                <textarea class="form-control" id="" name="customer_instruction" rows="3"></textarea>
                <small class="text-muted">Provide details such as building description, a nearby landmark, or other navigation Instructions.</small>
                <div class="invalid-feedback">
                Name on card is required
                </div>
            </div>

            {{-- <div class="text-center">
                <button class="w-50 btn btn-primary btn-lg" type="submit">Send Quote123</button>
            </div> --}}
        </div>

        <hr class="my-4">

        <h4 class="mb-3">Assign Driver</h4>
        <div class="row g-3">
            <div class="col-12">
                <label class="form-label">Driver Name</label>
                <div class="input-group has-validation">
                {{-- <input type="text" class="form-control" id="" value=""> --}}
                <input type="text" class="form-control" id="customerpickuptime" name="customer_pickup_time" value="" />
                </div>
            </div>
            
            <div class="text-center">
                <button class="w-50 btn btn-primary btn-lg" type="submit">Assign Driver</button>
            </div>
        </div>

        @endif

        <hr class="my-4">

        </form>
    </div>

@endsection
