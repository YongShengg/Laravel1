<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Auth Laravel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/carousel.css') }}" rel="stylesheet">

    <link href="{{ asset('bootstrap-datepicker/dist/css/bootstrap-datepicker.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('dist/vendors/simplebar/css/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/vendors/simplebar.css') }}">
    <link href="{{ asset('dist/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dist/vendors/@coreui/chartjs/css/coreui-chartjs.css') }}">

</head>

<body>
    @include('include.adminHeader')
    @yield('content')

    <script src="{{ asset('js/jquery3.6.4.js') }}"></script>


    <script src="{{ asset('dist/vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/vendors/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('dist/vendors/chart.js/js/chart.min.js') }}"></script>
    <script src="{{ asset('dist/vendors/@coreui/chartjs/js/coreui-chartjs.js') }}"></script>
    <script src="{{ asset('dist/vendors/@coreui/utils/js/coreui-utils.js') }}"></script>
    <script src="{{ asset('dist/js/main.js') }}"></script>

    
    <script src="{{ asset('bootstrap-datepicker/dist/js/bootstrap-datepicker.js') }}"></script>
    {{-- <script type="module" src="./app.js"></script> --}}

    <script>
        $(document).ready(function() {
            $('.btnReject').click(function(e) {
                e.preventDefault(); // Prevent the default behavior of the anchor tag

                // Retrieve the Order ID from the data attribute
                var orderId = $(this).data('order-id');

                console.log('orderId:', orderId); // Check if the order ID is correctly retrieved

                // Set the Order ID in the modal for reference
                $('#orderIdPlaceholder').text(orderId);
                $('#confirmRejectModal').data('order-id', orderId);

                // Open the modal
                $('#confirmRejectModal').modal('show');
            });

            $('#confirmRejectBtn').click(function() {
                // Retrieve the Order ID from the modal
                var orderId = $('#confirmRejectModal').data('order-id');

                console.log('orderId:', orderId); // Check if the order ID is correctly retrieved

                // Perform your AJAX request
                $.ajax({
                    type: 'POST',
                    url: "{{ route('adminOrderReject.post') }}",
                    data: {
                        orderId: orderId
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // Handle the success response
                        alert('Order ' + orderId + ' rejected successfully');
                        // Refresh the page or update the UI as needed
                    },
                    error: function(error) {
                        // Handle the error response
                        alert('An error occurred while rejecting the order.');
                        // console.log(error.responseText);
                    }
                }).done(function() {
                    // Close the modal
                    $('#confirmRejectModal').modal('hide');
                });
            });
        });
            
    </script>

</body>
</html>