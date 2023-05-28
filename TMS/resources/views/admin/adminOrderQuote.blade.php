@extends('admin.adminLayout')
@section('title', 'Home')
@section('content')
<div class="body flex-grow-1 px-3">
    <div class="card mb-4">
        <div class="card-header"><strong>Table Price Quote</strong></div>
        <div class="card-body">
            <p class="text-medium-emphasis small">Using the most basic table markup, here’s how <code>.table</code>-based tables look in Bootstrap.</p>
            <div class="tab-content rounded-bottom">
                <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-557">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#ORDER ID</th>
                                <th scope="col">Progress Status</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                                <th scope="col">Handle</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <th>{{ $item['load_id'] }}</th>
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
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                <td>@mdo</td>
                                <td><a href="{{ route('adminOrderDetail', ['load_id' => $item['load_id']]) }}" class="btn btn-primary btn-sm">Details</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
