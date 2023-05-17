@extends('layout')
@section('title', 'Home')
@section('content')
    <!-- Section: Timeline -->
<style>
    .timeline-1 {
    border-left: 3px solid #0099ff;
    border-bottom-right-radius: 4px;
    border-top-right-radius: 4px;
    /* background: rgba(177, 99, 163, 0.09); */
    /* margin: 0 auto; */
    margin: 0 auto 0 60px;
    position: relative;
    padding: 20px;
    padding-bottom: 0;
    padding-right: 0;
    list-style: none;
    text-align: left;
    max-width: 100%;
    }

        @media (max-width: 767px) {
        .timeline-1 {
            max-width: 98%;
            padding: 25px;
            margin-left: 3px;
            padding-bottom: 0;
            padding-right: 0;
        }
    }

    .timeline-1 .event {
    /* border-bottom: 1px dashed #000;
    padding-bottom: 25px;
    margin-bottom: 25px; */
    position: relative;
    }

        @media (max-width: 767px) {
        .timeline-1 .event {
            padding-top: 30px;
        }
    }

    .timeline-1 .event:last-of-type {
    padding-bottom: 0;
    margin-bottom: 0;
    border: none;
    }

    .timeline-1 .event:before,
    .timeline-1 .event:after {
    position: absolute;
    display: block;
    top: 0;
    }

    .timeline-1 .event:before {
    left: -173px;
    content: attr(data-date);
    text-align: right;
    font-weight: 100;
    font-size: 0.9em;
    min-width: 120px;
    }

        @media (max-width: 767px) {
        .timeline-1 .event:before {
            left: 0px;
            text-align: left;
        }
    }

    .timeline-1 .event:after {
    -webkit-box-shadow: 0 0 0 3px #0099ff;
    box-shadow: 0 0 0 3px #0099ff;
    left: -25.8px;
    background: #fff;
    border-radius: 50%;
    height: 9px;
    width: 9px;
    content: "";
    top: 5px;
    }

        @media (max-width: 767px) {
        .timeline-1 .event:after {
            left: -30.8px;
        }
    }
</style>
{{-- @foreach ($data as $item) --}}

<div class="container pt-5">
    <div class="col-md-5">
        <div class="overflow-auto">
            @foreach ($data as $item)
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col-12 p-4 d-flex flex-column position-static">
                    <h6 class="mb-0">ID: {{ $item['load_id'] }}</h6>
                    <div class="container d-flex justify-content-between align-items-center">
                    <div class="mb-1 mt-1 text-muted">{{ $item['vehicle_maker'] }} {{ $item['vehicle_model'] }} {{ $item['vehicle_year'] }}</div>
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
                    </div>
                    <ul class="timeline-1 text-black">
                        <li class="event" data-date="12:30">
                            <p>B6 Jalan Sri Perkasa 2/18 Taman Tampoi Utama Johor Bahru</p>
                        </li>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $data->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>

  <!-- Section: Timeline -->
@endsection