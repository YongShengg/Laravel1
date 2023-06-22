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
        var currentPage = 1;
        function fetchOrders(page) {
            // Perform an AJAX request to fetch the latest order data
            $.ajax({
                type: 'GET',
                url: "{{ route('adminOrders') }}", // Replace with your server endpoint URL
                data: { page: page },
                dataType: 'json',
                success: function(response) {

                // Clear the table body
                $('#orderTable tbody').empty();
                    
                    // Iterate through the orders and add rows to the table
                    $.each(response.orders, function(index, order) {
                        var row = $('<tr>');
                        row.append($('<td>').text(order.load_id));
                        row.append($('<td>').text(order.name));
                        // console.log(order.progress_status);
                        var statusBadge;
                        if (order.progress_status == 0) {
                            statusBadge = $('<span>').addClass('badge bg-secondary').text('Pending');
                        } else if (order.progress_status == 1) {
                            statusBadge = $('<span>').addClass('badge bg-primary').text('Driver Assigned');
                        } else if (order.progress_status == 2) {
                            statusBadge = $('<span>').addClass('badge bg-warning text-dark').text('Out Delivery');
                        } else if (order.progress_status == 3) {
                            statusBadge = $('<span>').addClass('badge bg-info text-dark').text('Arrived');
                        } else if (order.progress_status == 4) {
                            statusBadge = $('<span>').addClass('badge bg-success').text('Delivered');
                        } else if (order.progress_status == 5) {
                            statusBadge = $('<span>').addClass('badge bg-danger').text('Cancelled');
                        } else if (order.progress_status == 6) {
                            statusBadge = $('<span>').addClass('badge bg-danger').text('On Hold');
                        } else if (order.progress_status == 7) {
                            statusBadge = $('<span>').addClass('badge bg-dark').text('Rejected');
                        } else {
                            statusBadge = $('<span>').addClass('badge bg-dark').text('Unknown Status');
                        }
                        var statusCell = $('<td>').append(statusBadge);
                        row.append(statusCell);
                    
                        var statusPriceBadge;
                        if (order.price_quote_status == 0) {
                            statusPriceBadge = $('<span>').addClass('badge bg-secondary').text('Not Sent');
                        } else if (order.price_quote_status == 1) {
                            statusPriceBadge = $('<span>').addClass('badge bg-primary').text('Sent');
                        } else if (order.price_quote_status == 2) {
                            statusPriceBadge = $('<span>').addClass('badge bg-warning text-dark').text('Accepted');
                        } else if (order.price_quote_status == 3) {
                            statusPriceBadge = $('<span>').addClass('badge bg-danger').text('Rejected');
                        } else if (order.price_quote_status == 4) {
                            statusPriceBadge = $('<span>').addClass('badge bg-dark').text('Expired');
                        } else {
                            statusPriceBadge = $('<span>').addClass('badge bg-dark').text('Unknown Status');
                        }
                        var statusPriceCell = $('<td>').append(statusPriceBadge);
                        row.append(statusPriceCell);

                        var statusPaymentBadge;
                        if (order.payment_progress_status == 0) {
                            statusPaymentBadge = $('<span>').addClass('badge bg-secondary').text('Not Sent');
                        } else if (order.payment_progress_status == 1) {
                            statusPaymentBadge = $('<span>').addClass('badge bg-primary').text('Sent');
                        } else if (order.payment_progress_status == 2) {
                            statusPaymentBadge = $('<span>').addClass('badge bg-warning text-dark').text('Accepted');
                        } else if (order.payment_progress_status == 3) {
                            statusPaymentBadge = $('<span>').addClass('badge bg-danger').text('Rejected');
                        } else if (order.payment_progress_status == 4) {
                            statusPaymentBadge = $('<span>').addClass('badge bg-dark').text('Expired');
                        } else {
                            statusPaymentBadge = $('<span>').addClass('badge bg-dark').text('Unknown Status');
                        }
                        var statusPaymentCell = $('<td>').append(statusPaymentBadge);
                        row.append(statusPaymentCell);

                        row.append($('<td>').text(order.created_at));
                        
                        row.append($('<td>').html('<a href="/adminOrderDetail/' + order.load_id + '" class="btn btn-primary btn-sm" target="_blank">Details</a>'));
                        row.append($('<td>').html('<a class="btn btn-danger btn-sm text-white btnReject" data-order-id="' + order.load_id + '">Reject</a>'));
                        
                        
                            
                        // Add more columns as needed

                        // Append the row to the table body
                        $('#orderTable tbody').append(row);
                    });
                    updatePagination(response.pagination);
                    console.log(response.pagination);
                },
                error: function(error) {
                console.log(error);
                }
            });
            }

            function updatePagination(pagination) {
                var paginationLinks = '<ul class="pagination justify-content-end">';
                    // console.log(pagination);
                // Create the previous page link
                if (pagination.prev_page) {
                    paginationLinks += '<li class="page-item"><a class="page-link" href="#" data-page="' + pagination.prev_page + '">Previous</a></li>';
                } else {
                    paginationLinks += '<li class="page-item disabled"><span class="page-link">Previous</span></li>';
                }
                
                // Create the individual page links
                for (var i = 1; i <= pagination.last_page; i++) {
                    if (pagination.current_page === i) {
                    paginationLinks += '<li class="page-item active"><span class="page-link">' + i + '</span></li>';
                    } else {
                    paginationLinks += '<li class="page-item"><a class="page-link" href="#" data-page="' + i + '">' + i + '</a></li>';
                    }
                }
                
                // Create the next page link
                if (pagination.next_page) {
                    //console.log(pagination.next_page);
                    paginationLinks += '<li class="page-item"><a class="page-link" href="#" data-page="' + (pagination.current_page + 1) + '">Next</a></li>';
                } else {
                    paginationLinks += '<li class="page-item disabled"><span class="page-link">Next</span></li>';
                }
                
                paginationLinks += '</ul>';
                
                // Update the pagination links in the HTML
                $('#paginationLinks').html(paginationLinks);
            }


            // Handle pagination click event
            $(document).on('click', '.page-link', function(e) {
                e.preventDefault();
                var page = $(this).data('page');
                currentPage = page;
                fetchOrders(page);
            });

            // Call fetchOrders initially to populate the table
            fetchOrders(currentPage);

            // Schedule periodic updates
            setInterval(function() {
                fetchOrders(currentPage);
            }, 5000); // Fetch orders every 5 seconds (adjust as needed)



        $(document).ready(function() {
            $(document).on('click', '.btnReject', function(e) {
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
                        console.log(response);
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