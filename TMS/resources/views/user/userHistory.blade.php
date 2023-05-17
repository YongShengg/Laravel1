@extends('layout')
@section('title', 'Home')
@section('content')

<div class="main-content">
<div class="container mt-5">
    <div class="row">

        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                <h3 class="mb-0 p-2">Order Hisotry</h3>
                </div>

                <div class="table-responsive p-4">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Status</th>
                        <th scope="col">Vehicle</th>
                        <th scope="col">Driver</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                    <tr>
                        <th scope="row">
                        <div class="media align-items-center">{{ $item['load_id'] }}</div>
                        </th>
                        <td>
                            @if ($item['progress_status'] == 0)
                            <span class="badge bg-secondary">Pending</span>
                            @elseif ($item['progress_status'] == 1)
                            <span class="badge bg-primary">Driver Assigned</span>
                            @elseif ($item['progress_status'] == 2)
                            <span class="badge bg-warning text-dark">Out Delivery</span>
                            @elseif ($item['progress_status'] == 3)
                            <span class="badge bg-info text-dark">Arrived</span>
                            @elseif ($item['progress_status'] == 4)
                            <span class="badge bg-success">Delivered</span>
                            @elseif ($item['progress_status'] == 5)
                            <span class="badge bg-danger">Cancelled</span>
                            @elseif ($item['progress_status'] == 6)
                            <span class="badge bg-danger">On Hold</span>
                            @elseif ($item['progress_status'] == 7)
                            <span class="badge bg-dark">Rejected</span>
                            @else
                            <span class="badge bg-dark">Unknown Status</span>
                            @endif
                        </td>
                        <td>
                            {{ $item['vehicle_maker'] }} {{ $item['vehicle_model'] }} {{ $item['vehicle_year'] }}
                        </td>

                        <td>
                            {{ $item['vehicle_maker'] }}
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>

                <div class="card-footer py-4">
                <nav aria-label="...">
                    <ul class="pagination justify-content-end mb-0">
                        {{-- {{ $data->links('pagination::bootstrap-5') }} --}}
                    </ul>
                </nav>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>


@endsection