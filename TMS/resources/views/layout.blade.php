<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Auth Laravel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/carousel.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('bootstrap-datepicker/dist/js/bootstrap-datepicker.js') }}" rel="stylesheet"> --}}
    <link href="{{ asset('bootstrap-datepicker/dist/css/bootstrap-datepicker.css') }}" rel="stylesheet">
    {{-- <link href="{{ mix('node_modules/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet"> --}}



</head>

<body>
    @include('include.header')
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <script src="{{ mix('node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script> --}}
    <script src="{{ asset('js/jquery3.6.4.js') }}"></script>
    <script src="{{ asset('bootstrap-datepicker/dist/js/bootstrap-datepicker.js') }}"></script>
    {{-- <script type="module" src="./app.js"></script> --}}

    
    <script>
        $(document).ready(function() {
            // Get the current month and the month that is six months in the future
            let currentDate = new Date();
            let currentMonth = currentDate.getMonth();
            let maxAllowedMonth = currentMonth + 6;
            let lastDayMaxAllowedMonth = new Date(currentDate.getFullYear(), maxAllowedMonth + 1, 0);

            $('#customerpickuptime').datepicker({
                format: 'dd/mm/yyyy',
                startDate: currentDate, // Set the start date to today
                endDate: lastDayMaxAllowedMonth, // Set the end date to six months in the future
                beforeShowDay: function(date) {
                    // Get today's date and tomorrow's date
                    let currentDate = new Date();
                    let tomorrowDate = new Date();
                    tomorrowDate.setDate(currentDate.getDate() + 1);

                    // Disable today and tomorrow
                    let isCurrentOrTomorrow = (
                        date.toDateString() === currentDate.toDateString() ||
                        date.toDateString() === tomorrowDate.toDateString()
                    );
                    if (isCurrentOrTomorrow) {
                        return { enabled: false };
                    }

                    // Disable dates outside the current month and the next six months
                    let currentMonth = currentDate.getMonth();
                    let maxAllowedMonth = currentMonth + 6;
                    let lastDayMaxAllowedMonth = new Date(currentDate.getFullYear(), maxAllowedMonth + 1, 0);
                    let isOutsideAllowedRange = (
                        date.getMonth() < currentMonth || date > lastDayMaxAllowedMonth
                    );
                    if (isOutsideAllowedRange) {
                        return { enabled: false };
                    }

                // Enable all other days
                return { enabled: true }; 
                }
            });
        });
  </script>

  <script>
    $(document).ready(function() {
        let vehicleCount = 1;
        const maxVehicles = 3;

        // Add Vehicle button click event
        $('#addVehicleBtn').click(function() {
            if (vehicleCount >= maxVehicles) {
                alert('You have reached the maximum number of vehicles.');
                return;
            }
            
            //Create new vehicle row 
            const newVehicleRow = `
                
                <div class="row g-3 vehicleRow">
                    <h4 class="mb-3 mt-4">Vehicle Detail ${vehicleCount}</h4>
                    <div class="col-12">
                    <label class="form-label" for="maker_${vehicleCount}">Vehicle Maker ${vehicleCount}</label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" id="make_${vehicleCount}" name="vehicles[${vehicleCount}][make]">
                        </div>
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="model_${vehicleCount}">Vehicle Model ${vehicleCount}<span class="text-muted"></span></label>
                        <input type="text" class="form-control" id="model_${vehicleCount}" name="vehicles[${vehicleCount}][model]">
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="model_${vehicleCount}">Vehicle Type ${vehicleCount}<span class="text-muted"></span></label>
                        <select class="form-select" id="type_${vehicleCount}" name="vehicles[${vehicleCount}][type]" required>
                            <option value="">Choose...</option>
                            <option>Sedan</option>
                            <option>SUV</option>
                            <option>Hatchback</option>
                            <option>MPV</option>
                            <option>Pickup Truck</option>
                            <option>Coupe</option>
                            <option>Van</option>
                            <option>Wagon</option>
                            <option>Limousine</option>
                        </select>
                    </div> 
                    <div class="col-12">
                        <label class="form-label" for="make_year_${vehicleCount}">Make Year ${vehicleCount}<span class="text-muted"></span></label>
                        <input type="number" class="form-control datepicker" id="make_year_${vehicleCount}" name="vehicles[${vehicleCount}][make_year]"/>
                    </div> 
                    <div class="col-12">
                        <label class="form-label" for="plate_${vehicleCount}">Number Plate ${vehicleCount}<span class="text-muted"></span></label>
                        <input type="text" class="form-control" id="plate_${vehicleCount}" name="vehicles[${vehicleCount}][plate]" >
                    </div> 
                    <div class="d-flex align-items-end justify-content-end mt-4">
                        <button class="w-40 btn btn-primary btn-md removeVehicleBtn" type="button">Remove</button>
                    </div>
                </div>
            `;

            // Append the new vehicle row to the container
            $('#vehicleContainer').append(newVehicleRow);

            vehicleCount++; // Increment vehicleCount

            // Attach datepicker to the newly added input
            $('.datepicker').datepicker({
                format: "yyyy",
                viewMode: "years", 
                minViewMode: "years",
                startDate: '1900',
                endDate: new Date(),
                autoclose:true
            });

            $(document).on('click', '.removeVehicleBtn', function() {
                // Remove the vehicle row
                $(this).closest('.vehicleRow').remove();
                if (vehicleCount > 1) {
                    vehicleCount--; // Decrement vehicleCount
                }
            });
        });

        // Attach datepicker to the initial input
        $('.datepicker').datepicker({
            format: "yyyy",
            viewMode: "years", 
            minViewMode: "years",
            startDate: '1900',
            endDate: new Date(),
            autoclose:true
        });
    });
  </script>
 
</body>
</html>